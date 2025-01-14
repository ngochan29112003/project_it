<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\NguoiDungModel;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;

class QuanLySinhVienController extends Controller
{
    public function getViewDsSinhVien()
    {
        $modelSinhVien = new NguoiDungModel();
        $list_sv = $modelSinhVien->getSinhVien();
        $list_khoa = $modelSinhVien->getKhoa();
        $list_lop = $modelSinhVien->getLop();
//        dd($list_sv->toArray());
        return view('admin.ql_sv.danh-sach',
        compact('list_sv','list_khoa','list_lop'));
    }

    function addSinhVien(Request $request)
    {
        $validate = $request->validate([
            'ten_nguoi_dung'=>'required|string',
            'ma_khoa'=>'required|int',
            'ma_lop'=>'required|int',
            'gioi_tinh'=>'required|string|in:Nam,Nữ',
            'noi_sinh'=>'string',
            'ngay_sinh'=>[
                'required',
                'date',
                function ($attribute, $value, $fail) {
                    $minAgeDate = now()->subYears(18)->format('Y-m-d');
                    if ($value > $minAgeDate) {
                        $fail('Ngày sinh phải đủ 18 tuổi.');
                    }
                },
            ],
            'ho_khau_thuong_tru'=>'nullable|string|max:255',
            'cccd' => [
                'required',
                'string',
                'regex:/^0[0-9]{11}$/', // Đảm bảo chỉ chứa đúng 12 chữ số
            ],
            'sdt'=>[
                'required',
                'string',
                'regex:/^0[0-9]{9}$/', // Định dạng số điện thoại bắt đầu bằng 0 và có 10 chữ số
            ],
            'email'=>[
                'required',
                'regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.(com|net|org|vn|edu|gov)$/',
                'max:255',
            ],
        ],[
                'ngay_sinh.required' => 'Ngày sinh là bắt buộc.',
                'ngay_sinh.date' => 'Ngày sinh phải là một ngày hợp lệ.',
                'email.required' => 'Email là bắt buộc.',
                'email.regex' => 'Email đảm bảo có @ và có đuôi miền hợp lệ như .com, .vn, .org, ...',
                'email.max' => 'Email không được vượt quá 255 ký tự.',
                'sdt.regex' => 'Số điện thoại phải bắt đầu bằng số 0 và có đúng 10 chữ số.',
                'cccd.regex' => 'Căn cước công dân phải bắt đầu bằng số 0 và có đúng 12 chữ số.',
            ]);


        // Thêm ma_quyen với giá trị mặc định là 3
        $validate['ma_quyen'] = 3;
        $validate['hinh_anh'] = "user.png";

        // Tạo mới sinh viên với dữ liệu đã validate
        NguoiDungModel::create($validate);
        return response()->json([
            'success' => true,
            'status' => 200,
            'message' => 'Thêm thành công!',
        ]);
    }

    function deleteSinhVien($id)
    {
        $sinhvien = NguoiDungModel::findOrFail($id);

        $sinhvien->delete();

        return response()->json([
            'success' => true,
            'message' => 'Xóa thành công'
        ]);
    }

    public function editSinhVien($id)
    {
        $sinhvien = NguoiDungModel::findOrFail($id);
        return response()->json([
            'sinhvien' => $sinhvien
        ]);
    }

    public function updateSinhVien(Request $request, $id)
    {
        $validated = $request->validate([
            'ten_nguoi_dung'=>'required|string',
            'ma_khoa'=>'required|int',
            'ma_lop'=>'required|int',
            'gioi_tinh'=>'required|string|in:Nam,Nữ',
            'noi_sinh'=>'string',
            'ngay_sinh'=>[
                'required',
                'date',
                function ($attribute, $value, $fail) {
                    $minAgeDate = now()->subYears(18)->format('Y-m-d');
                    if ($value > $minAgeDate) {
                        $fail('Ngày sinh phải đủ 18 tuổi.');
                    }
                },
            ],
            'ho_khau_thuong_tru'=>'nullable|string|max:255',
            'cccd' => [
                'required',
                'string',
                'regex:/^0[0-9]{11}$/', // Đảm bảo chỉ chứa đúng 12 chữ số
            ],
            'sdt'=>[
                'required',
                'string',
                'regex:/^0[0-9]{9}$/', // Định dạng số điện thoại bắt đầu bằng 0 và có 10 chữ số
            ],
            'email'=>[
                'required',
                'regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.(com|net|org|vn|edu|gov)$/',
                'max:255',
            ],
        ],[
                'ngay_sinh.required' => 'Ngày sinh là bắt buộc.',
                'ngay_sinh.date' => 'Ngày sinh phải là một ngày hợp lệ.',
                'email.required' => 'Email là bắt buộc.',
                'email.regex' => 'Email đảm bảo có @ và có đuôi miền hợp lệ như .com, .vn, .org, ...',
                'email.max' => 'Email không được vượt quá 255 ký tự.',
                'sdt.regex' => 'Số điện thoại phải bắt đầu bằng số 0 và có đúng 10 chữ số.',
                'cccd.regex' => 'Căn cước công dân phải bắt đầu bằng số 0 và có đúng 12 chữ số.',
            ]);

        $validated['ma_quyen'] = 3;

        $sinhvien = NguoiDungModel::findOrFail($id);
        $sinhvien->update($validated);

        return response()->json([
            'success' => true,
            'sinhvien' => $sinhvien,
        ]);
    }

    public function exportSinhVien()
    {
        $inputFileName = public_path('excel/bangsinhvien.xlsx');
        $inputFileType = IOFactory::identify($inputFileName);
        $objReader = IOFactory::createReader($inputFileType);

        $excel = $objReader->load($inputFileName);
        $excel->setActiveSheetIndex(0);
        $excel->getDefaultStyle()->getFont()->setName('Times New Roman');

        $stt = 1;
        $cell = $excel->getActiveSheet();

        $model = new NguoiDungModel();
        $leave_report = $model->getSinhVien();
        $khoaList = $model->getKhoa();

        // Tạo một mảng mã khoa => tên khoa để tra cứu
        $khoaMap = [];
        foreach ($khoaList as $khoa) {
            $khoaMap[$khoa->ma_khoa] = $khoa->ten_khoa;
        }

        $num_row = 2;

        foreach ($leave_report as $row) {
            $cell->setCellValue('A'.$num_row, $stt++);
            $cell->setCellValue('B'.$num_row, $row->ten_nguoi_dung);
            
            // Lấy tên khoa từ mã khoa
            $tenKhoa = isset($khoaMap[$row->ma_khoa]) ? $khoaMap[$row->ma_khoa] : 'Không xác định';
            $cell->setCellValue('C'.$num_row, $tenKhoa);

            $cell->setCellValue('D'.$num_row, $row->gioi_tinh);
            $cell->setCellValue('E'.$num_row, $row->ngay_sinh);
            $cell->setCellValue('F'.$num_row, $row->ho_khau_thuong_tru);
            $cell->setCellValue('G'.$num_row, $row->cccd);
            $cell->setCellValue('H'.$num_row, $row->sdt);
            $cell->setCellValue('I'.$num_row, $row->email);

            $borderStyle = $cell->getStyle('A' . $num_row . ':I' . $num_row)->getBorders();
            $borderStyle->getAllBorders()->setBorderStyle(Border::BORDER_THIN);
            $cell->getStyle('A' . $num_row . ':I' . $num_row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);

            $num_row++;
        }

        foreach (range('A', 'I') as $columnID) {
            $excel->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);
        }

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        $filename = "danh-sach-sinh-vien.xlsx";
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        
        ob_end_clean();

        $writer = IOFactory::createWriter($excel, 'Xlsx');
        $writer->save('php://output');
    }
}
