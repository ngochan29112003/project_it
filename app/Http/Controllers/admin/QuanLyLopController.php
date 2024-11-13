<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\LopModel;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;

class QuanLyLopController extends Controller
{
    public function getViewDsLop()
    {
        $Lopmodel = new LopModel();
        $list_khoa = $Lopmodel->getKhoa();
        $list_lop = $Lopmodel->getLop();
        return view('admin.ql_lop.danh-sach',
        compact('list_khoa', 'list_lop'));
    }

    function addLop(Request $request)
    {
//        dd($request);
        $validate = $request->validate([
            'ma_khoa'=>'int',
            'ten_lop'=>'string',
            'nam_hoc'=>'string'
        ]);

        LopModel::create($validate);
        return response()->json([
            'success' => true,
            'status' => 200,
            'message' => 'Thêm thành công!',
        ]);
    }

    public function editLop($id)
    {
        $lop = LopModel::findOrFail($id);
        return response()->json([
            'lop' => $lop
        ]);
    }

    public function updateLop(Request $request, $id)
    {
        $validated = $request->validate([
            'ma_khoa'=>'int',
            'ten_lop'=>'string',
            'nam_hoc'=>'string'
        ]);

        $lop = LopModel::findOrFail($id);
        $lop->update($validated);

        return response()->json([
            'success' => true,
            'lop' => $lop,
        ]);
    }
    public function exportLop()
    {
        $inputFileName = public_path('excel/banglop.xlsx');
        $inputFileType = IOFactory::identify($inputFileName);
        $objReader = IOFactory::createReader($inputFileType);

        $excel = $objReader->load($inputFileName);

        $excel->setActiveSheetIndex(0);
        $excel->getDefaultStyle()->getFont()->setName('Times New Roman');

        $stt=1;
        $cell = $excel->getActiveSheet();

        $model = new LopModel();
        $leave_report = $model->getLop();
        $num_row = 2;

        foreach($leave_report as $row){
            $cell->setCellValue('A'.$num_row, $stt++);
            $cell->setCellValue('B'.$num_row, $row->ten_lop);
            $cell->setCellValue('C'.$num_row, $row->ten_khoa);
            $cell->setCellValue('D'.$num_row, $row->nam_hoc);

            $borderStyle = $cell->getStyle('A' . $num_row . ':D' . $num_row)->getBorders();
            $borderStyle->getAllBorders()->setBorderStyle(Border::BORDER_THIN);
            $cell->getStyle('A' . $num_row .':D' .$num_row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);

            $num_row++;
        }
        foreach(range('A','D')as $columnID){
            $excel->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);
        }
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        $filename = "danh-sach-lop" . '.xlsx';
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        // Xóa tất cả buffer trước khi xuất dữ liệu
        ob_end_clean();

        $writer = IOFactory::createWriter($excel, 'Xlsx');
        $writer->save('php://output');
    }
}
