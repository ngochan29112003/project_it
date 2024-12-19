<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
class DiemDanhController extends Controller
{
    public function getViewDiemDanh($ma_hoc_phan , $ten_lop_hoc_phan)
    {
        // Lấy danh sách sinh viên đã ghi danh
        $dsSinhVienDaGhiDanh = DB::table('ghi_danh')
            ->join('nguoi_dung', 'ghi_danh.ma_nguoi_dung', '=', 'nguoi_dung.ma_nguoi_dung')
            ->where('ghi_danh.ma_hoc_phan', $ma_hoc_phan)
            ->where('nguoi_dung.ma_quyen', 3)
            ->select('nguoi_dung.ma_nguoi_dung','nguoi_dung.ten_nguoi_dung')
            ->get();

        // Ngày hiện tại
        $today = Carbon::now()->format('d/m/Y');

        // Lấy danh sách ngày đã điểm danh (tất cả)
        $allDays = DB::table('diem_danh')
            ->where('ma_hoc_phan', $ma_hoc_phan)
            ->select('ngay_di_hoc')
            ->distinct()
            ->pluck('ngay_di_hoc')
            ->toArray();

        // Nếu ngày hôm nay chưa có trong CSDL, thêm vào danh sách
        if (!in_array($today, $allDays)) {
            $allDays[] = $today;
        }

        // Sắp xếp ngày giảm dần và lấy tối đa 5 ngày gần nhất
        $allDaysCarbon = array_map(function($d) {
            return Carbon::createFromFormat('d/m/Y', $d);
        }, $allDays);
        usort($allDaysCarbon, function($a, $b) {
            return $b->timestamp - $a->timestamp;
        });
        $allDaysCarbon = array_slice($allDaysCarbon, 0, 5);

        $dsNgayHoc = array_map(function($d) {
            return $d->format('d/m/Y');
        }, $allDaysCarbon);

        // Lấy dữ liệu điểm danh cho những ngày này
        $diemDanhData = DB::table('diem_danh')
            ->where('ma_hoc_phan', $ma_hoc_phan)
            ->whereIn('ngay_di_hoc', $dsNgayHoc)
            ->get();

        // attendanceMap[ngay][ma_sinh_vien] = di_hoc (0 hoặc 1)
        $attendanceMap = [];
        foreach ($dsNgayHoc as $day) {
            $attendanceMap[$day] = [];
        }
        foreach ($diemDanhData as $record) {
            $attendanceMap[$record->ngay_di_hoc][$record->ma_nguoi_dung] = $record->di_hoc;
        }

        return view('diem-danh', compact('ma_hoc_phan','ten_lop_hoc_phan','dsSinhVienDaGhiDanh','dsNgayHoc','attendanceMap','today'));
    }

    public function storeDiemDanh(Request $request)
    {
        $ma_hoc_phan = $request->input('ma_hoc_phan');
        $today = $request->input('ngay_di_hoc');
        $attendance = $request->input('attendance', []);
        // attendance[$today] là một mảng các ma_nguoi_dung được tick

        // Lấy danh sách sinh viên ghi danh để biết ai cần kiểm tra
        $dsSinhVien = DB::table('ghi_danh')
            ->join('nguoi_dung', 'ghi_danh.ma_nguoi_dung', '=', 'nguoi_dung.ma_nguoi_dung')
            ->where('ghi_danh.ma_hoc_phan', $ma_hoc_phan)
            ->where('nguoi_dung.ma_quyen', 3)
            ->select('nguoi_dung.ma_nguoi_dung')
            ->get();

        // Duyệt tất cả sinh viên, nếu có trong attendance[$today] thì di_hoc = 1, ngược lại = 0
        $presentUsers = isset($attendance[$today]) ? $attendance[$today] : [];

        foreach ($dsSinhVien as $sv) {
            $di_hoc = in_array($sv->ma_nguoi_dung, $presentUsers) ? 1 : 0;

            // Kiểm tra xem record đã tồn tại chưa
            $exists = DB::table('diem_danh')
                ->where('ma_hoc_phan', $ma_hoc_phan)
                ->where('ma_nguoi_dung', $sv->ma_nguoi_dung)
                ->where('ngay_di_hoc', $today)
                ->first();

            if ($exists) {
                // Cập nhật
                DB::table('diem_danh')
                    ->where('id', $exists->id)
                    ->update(['di_hoc' => $di_hoc]);
            } else {
                // Chèn mới
                DB::table('diem_danh')->insert([
                    'ma_hoc_phan' => $ma_hoc_phan,
                    'ma_nguoi_dung' => $sv->ma_nguoi_dung,
                    'ngay_di_hoc' => $today,
                    'di_hoc' => $di_hoc,
                ]);
            }
        }

        return redirect()->back()->with('success', 'Đã lưu điểm danh thành công!');
    }

    public function exportExcel($ma_hoc_phan, $ten_lop_hoc_phan)
    {
        // Lấy danh sách sinh viên
        $dsSinhVien = DB::table('ghi_danh')
            ->join('nguoi_dung', 'ghi_danh.ma_nguoi_dung', '=', 'nguoi_dung.ma_nguoi_dung')
            ->where('ghi_danh.ma_hoc_phan', $ma_hoc_phan)
            ->where('nguoi_dung.ma_quyen', 3)
            ->select('nguoi_dung.ma_nguoi_dung', 'nguoi_dung.ten_nguoi_dung')
            ->orderBy('nguoi_dung.ten_nguoi_dung')
            ->get();

        // Lấy tất cả các ngày điểm danh
        $allDays = DB::table('diem_danh')
            ->where('ma_hoc_phan', $ma_hoc_phan)
            ->select('ngay_di_hoc')
            ->distinct()
            ->pluck('ngay_di_hoc')
            ->toArray();

        // Sắp xếp ngày tăng dần
        $allDaysCarbon = [];
        foreach ($allDays as $d) {
            $allDaysCarbon[] = \Carbon\Carbon::createFromFormat('d/m/Y', $d);
        }
        usort($allDaysCarbon, function($a, $b) {
            return $a->timestamp - $b->timestamp;
        });
        $allDays = array_map(function ($d) {
            return $d->format('d/m/Y');
        }, $allDaysCarbon);

        // Lấy dữ liệu điểm danh
        $diemDanhData = DB::table('diem_danh')
            ->where('ma_hoc_phan', $ma_hoc_phan)
            ->get();

        $attendanceMap = [];
        foreach ($diemDanhData as $record) {
            $attendanceMap[$record->ma_nguoi_dung][$record->ngay_di_hoc] = $record->di_hoc ? 'X' : '';
        }

        // Tạo Spreadsheet
        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Tiêu đề dòng đầu tiên
        $sheet->setCellValue('A1', 'STT');
        $sheet->setCellValue('B1', 'Tên sinh viên');
        $sheet->setCellValue('C1', 'Ngày học');

        // Hợp nhất ô "STT" và "Tên sinh viên" trên dòng 1 và 2
        $sheet->mergeCells('A1:A2');
        $sheet->mergeCells('B1:B2');

        // Hợp nhất ô "Ngày học" trên dòng 1
        $sheet->mergeCells('C1:' . \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex(count($allDays) + 2) . '1');

        // Thêm các ngày học vào dòng 2
        foreach ($allDays as $colIndex => $day) {
            $columnLetter = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($colIndex + 3); // Cột bắt đầu từ C
            $sheet->setCellValue($columnLetter . '2', $day);
        }

        // Định dạng tiêu đề (căn giữa ngang và dọc)
        $headerStyle = [
            'font' => ['bold' => true],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            ],
            'borders' => ['allBorders' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN]],
        ];
        $sheet->getStyle('A1:' . \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex(count($allDays) + 2) . '2')->applyFromArray($headerStyle);

        // Điền dữ liệu
        $rowIndex = 3; // Bắt đầu từ dòng 3
        foreach ($dsSinhVien as $index => $sv) {
            // STT
            $sheet->setCellValue('A' . $rowIndex, $index + 1);
            // Tên sinh viên
            $sheet->setCellValue('B' . $rowIndex, $sv->ten_nguoi_dung);

            $colIndexData = 3; // Bắt đầu từ cột thứ 3 cho ngày
            foreach ($allDays as $day) {
                $di_hoc = $attendanceMap[$sv->ma_nguoi_dung][$day] ?? '';
                $columnLetter = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($colIndexData);
                $sheet->setCellValue($columnLetter . $rowIndex, $di_hoc);
                $colIndexData++;
            }
            $rowIndex++;
        }

        // Định dạng toàn bộ bảng (căn giữa ngang và dọc cho dữ liệu)
        $tableStyle = [
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            ],
            'borders' => ['allBorders' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN]],
        ];
        $sheet->getStyle('A1:' . \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex(count($allDays) + 2) . $rowIndex)->applyFromArray($tableStyle);

        // Căn chỉnh cột "Tên sinh viên" sang trái
        $sheet->getStyle('B3:B' . $rowIndex)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);

        // Tự động điều chỉnh độ rộng cột
        foreach (range(1, count($allDays) + 2) as $colIndex) {
            $columnLetter = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($colIndex);
            $sheet->getColumnDimension($columnLetter)->setAutoSize(true);
        }

        $filename = 'DiemDanh_' . $ten_lop_hoc_phan . '.xlsx';

        // Gửi file về client
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header("Content-Disposition: attachment; filename=\"$filename\"");
        header('Cache-Control: max-age=0');

        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
        $writer->save('php://output');
        exit;
    }





}
