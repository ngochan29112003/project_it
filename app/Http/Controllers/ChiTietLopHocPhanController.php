<?php

namespace App\Http\Controllers;

use App\Models\BaiGiangModel;
use App\Models\DiemDanhmodel;
use App\Models\FileBaiGiangModel;
use App\Models\LopHocPhanModel;
use App\Models\NguoiDungModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;

class ChiTietLopHocPhanController extends Controller
{
    /**
     * Hiển thị chi tiết lớp học phần.
     */
    public function getViewChiTietLopHocPhan($id)
    {
        $chiTietLHP = DB::table('lop_hoc_phan')
            ->join('hoc_phan', 'hoc_phan.id_hoc_phan', '=', 'lop_hoc_phan.id_hoc_phan')
            ->join('nguoi_dung', 'nguoi_dung.ma_nguoi_dung', '=', 'lop_hoc_phan.giang_vien')
            ->join('hoc_ky', 'hoc_ky.ma_hoc_ky', '=', 'lop_hoc_phan.hoc_ki')
            ->where('lop_hoc_phan.id_lop_hoc_phan', '=', $id)
            ->first();


        // Lấy ID người dùng từ session
        $maNguoiDung = session('ma_nguoi_dung');
        $maQuyen = session('ma_quyen');

        // Kiểm tra nếu session không có ma_quyen, lấy từ database
        if (!$maQuyen) {
            $maQuyen = DB::table('nguoi_dung')->where('ma_nguoi_dung', $maNguoiDung)->value('ma_quyen');
            session(['ma_quyen' => $maQuyen]);
        }

        // Kiểm tra xem người dùng đã ghi danh vào lớp học phần chưa
        $daGhiDanh = DB::table('ghi_danh')
            ->where('ma_hoc_phan', $chiTietLHP->id_lop_hoc_phan)
            ->where('ma_nguoi_dung', $maNguoiDung)
            ->exists();

        // Lấy danh sách bài giảng và file bài giảng
        $dsBaiGiang = BaiGiangModel::where('id_lop_hoc_phan', $chiTietLHP->id_lop_hoc_phan)
            ->with('files')
            ->get();


        return view('lop_hoc_phan', compact('chiTietLHP', 'daGhiDanh', 'dsBaiGiang'));
    }

    /**
     * Thêm mới bài giảng.
     */
    public function addBaiGiang(Request $request)
    {
        // Validate các trường dữ liệu
        $validated = $request->validate([
            'id_lop_hoc_phan' => 'required|integer',
            'ten_bai_giang' => 'required|string|max:255',
            'noi_dung_bai_giang' => 'nullable|string',
            'files.*' => 'nullable|mimes:jpg,jpeg,png,pdf,doc,docx,ppt,pptx,txt,xlsx|max:10000',
            'video_path' => 'nullable|url',
            'link' => 'nullable|url',
            'kiem_tra' => 'nullable|string',
            'bai_tap' => 'nullable|string',
            'diem_danh' => 'nullable|date',
            'trang_thai' => 'required|integer'
        ]);

        // Thêm mới bài giảng vào bảng `bai_giang`
        $baiGiang = BaiGiangModel::create([
            'id_lop_hoc_phan' => $validated['id_lop_hoc_phan'],
            'ten_bai_giang' => $validated['ten_bai_giang'],
            'noi_dung_bai_giang' => $validated['noi_dung_bai_giang'],
            'video_path' => $validated['video_path'],
            'link' => $validated['link'],
            'kiem_tra' => $validated['kiem_tra'],
            'bai_tap' => $validated['bai_tap'],
            'diem_danh' => $validated['diem_danh'],
            'trang_thai' => $validated['trang_thai'],
        ]);

        // Kiểm tra và xử lý các file nếu có
        if ($request->hasFile('files')) {
            $folderPath = public_path('/file_bai_giang');

            // Tạo thư mục nếu chưa tồn tại
            if (!file_exists($folderPath)) {
                mkdir($folderPath, 0777, true);
            }

            foreach ($request->file('files') as $file) {
                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->move($folderPath, $fileName);

                // Lưu file vào bảng `bai_giang_files`
                FileBaiGiangModel::create([
                    'file' => $fileName,
                    'ma_bai_giang' => $baiGiang->ma_bai_giang,
                ]);
            }
        }

        return response()->json([
            'success' => true,
            'status' => 200,
            'message' => 'Thêm bài giảng và tài liệu thành công!',
        ]);
    }

    /**
     * Hiển thị bài giảng.
     */
    public function hien($id)
    {
        $baiGiang = BaiGiangModel::findOrFail($id);
        $baiGiang->trang_thai = 0; // Đặt trạng thái là hiển thị
        $baiGiang->save();

        return redirect()->back()->with('success', 'Bài giảng đã được hiển thị.');
    }

    /**
     * Ẩn bài giảng.
     */
    public function an($id)
    {
        $baiGiang = BaiGiangModel::findOrFail($id);
        $baiGiang->trang_thai = 1; // Đặt trạng thái là ẩn
        $baiGiang->save();

        return redirect()->back()->with('success', 'Bài giảng đã được ẩn.');
    }

    /**
     * Xóa bài giảng và các file liên quan.
     */
    public function deleteBaiGiang($id)
    {
        $baiGiang = BaiGiangModel::findOrFail($id);

        if ($baiGiang->files) {
            foreach ($baiGiang->files as $file) {
                $filePath = public_path('file_bai_giang/' . $file->file);
                if (file_exists($filePath)) {
                    unlink($filePath); // Xóa file khỏi hệ thống file
                }
            }
        }

        // Xóa các tệp tin liên quan trong cơ sở dữ liệu
        FileBaiGiangModel::where('ma_bai_giang', $id)->delete();

        $baiGiang->delete();

        return response()->json([
            'success' => true,
            'message' => 'Xóa thành công'
        ]);
    }

    /**
     * Lấy dữ liệu bài giảng để chỉnh sửa.
     */
    public function editBaiGiang($id)
    {
        $baiGiang = BaiGiangModel::with('files')->findOrFail($id);

        return response()->json([
            'baiGiang' => $baiGiang
        ]);
    }

    /**
     * Cập nhật bài giảng và xử lý việc xóa thêm các file nếu có.
     */
    public function updateBaiGiang(Request $request, $id)
    {
        // Xác thực dữ liệu
        $validated = $request->validate([
            'id_lop_hoc_phan' => 'required|integer',
            'ten_bai_giang' => 'required|string|max:255',
            'noi_dung_bai_giang' => 'nullable|string',
            'files.*' => 'nullable|mimes:jpg,jpeg,png,pdf,doc,docx,ppt,pptx,txt,xlsx|max:10000',
            'video_path' => 'nullable|url',
            'link' => 'nullable|url',
            'kiem_tra' => 'nullable|string',
            'bai_tap' => 'nullable|string',
            'diem_danh' => 'nullable|date',
            'trang_thai' => 'required|integer',
            'files_to_delete' => 'nullable|string',
        ]);

        // Tìm bài giảng cần cập nhật
        $baiGiang = BaiGiangModel::findOrFail($id);

        // Xử lý các tệp tin cần xóa
        if ($request->filled('files_to_delete')) {
            $fileIdsToDelete = explode(',', $request->files_to_delete);
            foreach ($fileIdsToDelete as $fileId) {
                $file = FileBaiGiangModel::find($fileId);
                if ($file) {
                    // Xóa tệp tin khỏi hệ thống file
                    $filePath = public_path('file_bai_giang/' . $file->file);
                    if (file_exists($filePath)) {
                        unlink($filePath);
                    }
                    // Xóa bản ghi trong database
                    $file->delete();
                }
            }
        }

        // Cập nhật các trường thông tin khác
        $baiGiang->ten_bai_giang = $validated['ten_bai_giang'];
        $baiGiang->noi_dung_bai_giang = $validated['noi_dung_bai_giang'];
        $baiGiang->diem_danh = $validated['diem_danh'];
        $baiGiang->video_path = $validated['video_path'];
        $baiGiang->link = $validated['link'];
        $baiGiang->kiem_tra = $validated['kiem_tra'];
        $baiGiang->bai_tap = $validated['bai_tap'];
        $baiGiang->trang_thai = $validated['trang_thai'];
        $baiGiang->save();

        // Xử lý các tệp tin mới được tải lên
        if ($request->hasFile('files')) {
            $folderPath = public_path('/file_bai_giang');

            // Tạo thư mục nếu chưa tồn tại
            if (!file_exists($folderPath)) {
                mkdir($folderPath, 0777, true);
            }

            foreach ($request->file('files') as $file) {
                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->move($folderPath, $fileName);

                // Lưu file vào bảng `bai_giang_files`
                FileBaiGiangModel::create([
                    'file' => $fileName,
                    'ma_bai_giang' => $baiGiang->ma_bai_giang,
                ]);
            }
        }

        return response()->json([
            'success' => true,
            'message' => 'Cập nhật bài giảng thành công.',
        ]);
    }

    public function exportDanhSachSVLHP($id)
    {
        // Đường dẫn tới file mẫu Excel
        $inputFileName = public_path('excel/dssvlophocphan.xlsx');

        // Kiểm tra nếu tệp không tồn tại
        if (!file_exists($inputFileName)) {
            return response()->json(['error' => 'File mẫu không tồn tại.'], 404);
        }

        $inputFileType = IOFactory::identify($inputFileName);

        // Đọc file mẫu
        $objReader = IOFactory::createReader($inputFileType);

        $excel = $objReader->load($inputFileName);

        $excel->setActiveSheetIndex(0);
        $excel->getDefaultStyle()->getFont()->setName('Times New Roman');

        $stt = 1;
        $cell = $excel->getActiveSheet();

        $model = new LopHocPhanModel();
        $lophp = $model->getLopHP($id);
        $num_row = 3;

        foreach ($lophp as $row) {
            $cell->setCellValue('A' . $num_row, $stt++); // STT
            $cell->setCellValue('B' . $num_row, $row->ten_nguoi_dung); // Tên sinh viên
            $cell->setCellValue('C' . $num_row, $row->email); // Email

            // Thêm viền cho các ô
            $cell->getStyle('A' . $num_row . ':C' . $num_row)->getBorders()
                ->getAllBorders()->setBorderStyle(Border::BORDER_THIN);

            // Căn chỉnh văn bản
            $cell->getStyle('A' . $num_row . ':C' . $num_row)->getAlignment()
                ->setHorizontal(Alignment::HORIZONTAL_LEFT);

            $num_row++;
        }

        // Tự động điều chỉnh kích thước cột
        foreach (range('A', 'C') as $columnID) {
            $cell->getColumnDimension($columnID)->setAutoSize(true);
        }

        // Xuất file Excel
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        $filename = "danh-sach-sv-lhp" . $id . '.xlsx';
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        // Xóa tất cả buffer trước khi xuất dữ liệu
        ob_end_clean();

        $writer = IOFactory::createWriter($excel, 'Xlsx');
        $writer->save('php://output');
    }
}
