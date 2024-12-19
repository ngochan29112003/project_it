<?php

namespace App\Http\Controllers;

use App\Models\LopHocPhanModel;
use App\Models\NganHangCauHoiModel;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use App\Models\SpreadSheetModel;
use Illuminate\Http\Request;

class NganHangCauHoiController extends Controller
{
    public function getViewNganHangCauHoi($id_lop_hoc_phan){
        $modelLHP = new LopHocPhanModel();
        $lhp = $modelLHP->getFirstLHP($id_lop_hoc_phan);

        // Lấy tất cả các câu hỏi liên quan đến lớp học phần
        $cauHoi = NganHangCauHoiModel::where('id_lop_hoc_phan', $id_lop_hoc_phan)->get();

        return view('ngan-hang-cau-hoi', compact('id_lop_hoc_phan','lhp', 'cauHoi'));
    }

    public function add(Request $request){
        $data = $request->validate([
            'cau_hoi' => 'required|string',
            'dap_an_a' => 'required|string',
            'dap_an_b' => 'required|string',
            'dap_an_c' => 'required|string',
            'dap_an_d' => 'required|string',
            'dap_an_dung' => 'required|string|in:A,B,C,D',
            'id_lop_hoc_phan' => 'required|exists:lop_hoc_phan,id_lop_hoc_phan'
        ]);

        $cauhoi = NganHangCauHoiModel::create($data);

        return response()->json([
            'status' => 'success',
            'message' => 'Thêm câu hỏi thành công',
            'data' => $cauhoi
        ]);
    }

    public function delete($id)
    {
        $cauhoi = NganHangCauHoiModel::findOrFail($id);

        $cauhoi->delete();

        return response()->json([
            'success' => true,
            'message' => 'Xóa câu hỏi thành công'
        ]);
    }

    public function edit($id)
    {
        $cauhoi = NganHangCauHoiModel::findOrFail($id);
        return response()->json([
            'cauhoi' => $cauhoi
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'cau_hoi' => 'required|string',
            'dap_an_a' => 'required|string',
            'dap_an_b' => 'required|string',
            'dap_an_c' => 'required|string',
            'dap_an_d' => 'required|string',
            'dap_an_dung' => 'required|string|in:A,B,C,D',
            // 'id_lop_hoc_phan' => 'required|exists:lop_hoc_phan,id_lop_hoc_phan' // Giả sử không thay đổi lớp học phần khi cập nhật
        ]);

        $cauhoi = NganHangCauHoiModel::findOrFail($id);
        $cauhoi->update($data);

        return response()->json([
            'success' => true,
            'message' => 'Cập nhật câu hỏi thành công',
            'data' => $cauhoi,
        ]);
    }

//    composer require "ext-gd:*" --ignore-platform-reqs
//    composer require "ext-fileinfo:*" --ignore-platform-reqs
//    composer require phpoffice/phpspreadsheet --ignore-platform-reqs
    public function import(Request $request, $id)
    {
        try {
            // Kiểm tra file được tải lên
            if (!$request->hasFile('file-excel')) {
                return response()->json(['status' => 400, 'message' => 'Không tìm thấy file để import.']);
            }

            $file = $request->file('file-excel');

            // Kiểm tra định dạng file
            $allowedExtensions = ['xls', 'xlsx', 'csv'];
            $extension = $file->getClientOriginalExtension();

            if (!in_array($extension, $allowedExtensions)) {
                return response()->json(['status' => 400, 'message' => 'Định dạng file không hợp lệ. Chỉ hỗ trợ các định dạng: xls, xlsx, csv.']);
            }

            // Đọc dữ liệu từ file Excel
            $spreadsheet = IOFactory::load($file->getPathname());
            $sheet = $spreadsheet->getActiveSheet();
            $dataRows = $sheet->toArray(null, true, true, true);

            $numRow = 0;
            $dataArray = [];

            foreach ($dataRows as $row) {
                $numRow++;
                if ($numRow == 1) {
                    continue; // Bỏ qua hàng tiêu đề
                }

                // Kiểm tra dữ liệu từng hàng
                if (empty($row['B']) || empty($row['C']) || empty($row['D']) || empty($row['E']) || empty($row['F']) || empty($row['G'])) {
                    return response()->json(['status' => 400, 'message' => "Dữ liệu dòng $numRow không hợp lệ. Vui lòng kiểm tra lại."]);
                }

                $dataArray[] = [
                    'cau_hoi' => trim($row['B']),
                    'dap_an_a' => trim($row['C']),
                    'dap_an_b' => trim($row['D']),
                    'dap_an_c' => trim($row['E']),
                    'dap_an_d' => trim($row['F']),
                    'dap_an_dung' => strtoupper(trim($row['G'])),
                    'id_lop_hoc_phan' => $id,
                ];
            }

            // Lưu dữ liệu vào cơ sở dữ liệu
            if (!empty($dataArray)) {
                foreach ($dataArray as $data) {
                    NganHangCauHoiModel::create($data);
                }
                return response()->json(['status' => 200, 'message' => 'Import dữ liệu thành công.']);
            } else {
                return response()->json(['status' => 400, 'message' => 'Không có dữ liệu hợp lệ để import.']);
            }
        } catch (\Exception $e) {
            return response()->json(['status' => 500, 'message' => 'Đã xảy ra lỗi: ' . $e->getMessage()]);
        }
    }
}
