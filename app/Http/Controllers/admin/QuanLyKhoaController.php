<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\KhoaModel;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;

class QuanLyKhoaController extends Controller
{
    public function getViewDsKhoa()
    {
        $modelKhoa = new KhoaModel();
        $list_khoa = $modelKhoa->getKhoa();
//        dd($list_khoa);
        return view('admin.ql_khoa.danh-sach',
            compact('list_khoa'));
    }

    function addKhoa(Request $request)
    {
//        dd($request);
        $validate = $request->validate([
            'ten_khoa'=> 'string',
            'truong_khoa' => 'string'
        ]);


        KhoaModel::create($validate);
        return response()->json([
            'success' => true,
            'status' => 200,
            'message' => 'Thêm thành công!',
        ]);
    }

    function deleteKhoa($id)
    {
        $khoa = KhoaModel::findOrFail($id);

        $khoa->delete();

        return response()->json([
            'success' => true,
            'message' => 'Xóa thành công'
        ]);
    }

    public function editKhoa($id)
    {
        $khoa = KhoaModel::findOrFail($id);
        return response()->json([
            'khoa' => $khoa
        ]);
    }

    public function updateKhoa(Request $request, $id)
    {
        $validated = $request->validate([
            'ten_khoa'=> 'string',
            'truong_khoa' => 'string'
        ]);

        $khoa = KhoaModel::findOrFail($id);
        $khoa->update($validated);

        return response()->json([
            'success' => true,
            'khoa' => $khoa,
        ]);
    }

    public function exportKhoa()
    {
        $inputFileName = public_path('excel/bangkhoa.xlsx');
        $inputFileType = IOFactory::identify($inputFileName);
        $objReader = IOFactory::createReader($inputFileType);

        $excel = $objReader->load($inputFileName);

        $excel->setActiveSheetIndex(0);
        $excel->getDefaultStyle()->getFont()->setName('Times New Roman');

        $stt=1;
        $cell = $excel->getActiveSheet();

        $model = new KhoaModel();
        $leave_report = $model->getKhoa();
        $num_row = 2;

        foreach($leave_report as $row){
            $cell->setCellValue('A'.$num_row, $stt++);
            $cell->setCellValue('B'.$num_row, $row->ten_khoa);
            $cell->setCellValue('C'.$num_row, $row->truong_khoa);

            $borderStyle = $cell->getStyle('A' . $num_row . ':C' . $num_row)->getBorders();
            $borderStyle->getAllBorders()->setBorderStyle(Border::BORDER_THIN);
            $cell->getStyle('A' . $num_row .':C' .$num_row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);

            $num_row++;
        }
        foreach(range('A','C')as $columnID){
            $excel->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);
        }
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        $filename = "danh-sach-khoa" . '.xlsx';
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        // Xóa tất cả buffer trước khi xuất dữ liệu
        ob_end_clean();

        $writer = IOFactory::createWriter($excel, 'Xlsx');
        $writer->save('php://output');
    }
}
