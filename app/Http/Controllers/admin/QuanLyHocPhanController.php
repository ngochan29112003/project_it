<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\HocPhanModel;
use App\Models\NguoiDungModel;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;

class QuanLyHocPhanController extends Controller
{
    public function getViewDsHocPhan()
    {
        $list_hp = HocPhanModel::all();
        return view('admin.ql_hoc_phan.danh-sach',
        compact('list_hp'));
    }

    function addHocPhan(Request $request)
    {
//        dd($request);
        $validate = $request->validate([
            'ma_hoc_phan' =>'string',
            'ten_hoc_phan' => 'string',
            'so_chi_ly_thuyet' => 'int',
            'so_chi_thuc_hanh' => 'int',
        ]);

        HocPhanModel::create($validate);
        return response()->json([
            'success' => true,
            'status' => 200,
            'message' => 'Thêm thành công!',
        ]);
    }

    function deleteHocPhan($id)
    {
        $hocphan = HocPhanModel::findOrFail($id);

        $hocphan->delete();

        return response()->json([
            'success' => true,
            'message' => 'Xóa thành công'
        ]);
    }

    public function editHocPhan($id)
    {
        $hocphan = HocPhanModel::findOrFail($id);
        return response()->json([
            'hocphan' => $hocphan
        ]);
    }

    public function updateHocPhan(Request $request, $id)
    {
        $validated = $request->validate([
            'ma_hoc_phan' =>'string',
            'ten_hoc_phan' => 'string',
            'so_chi_ly_thuyet' => 'int',
            'so_chi_thuc_hanh' => 'int',
        ]);

        $hocphan = HocPhanModel::findOrFail($id);
        $hocphan->update($validated);

        return response()->json([
            'success' => true,
            'hocphan' => $hocphan,
        ]);
    }

    public function exportHocPhan()
    {
        $inputFileName = public_path('excel/banghocphan.xlsx');
        $inputFileType = IOFactory::identify($inputFileName);
        $objReader = IOFactory::createReader($inputFileType);

        $excel = $objReader->load($inputFileName);

        $excel->setActiveSheetIndex(0);
        $excel->getDefaultStyle()->getFont()->setName('Times New Roman');

        $stt=1;
        $cell = $excel->getActiveSheet();

        $model = new HocPhanModel();
        $leave_report = $model->getHocPhan();
        $num_row = 2;

        foreach($leave_report as $row){
            $cell->setCellValue('A'.$num_row, $stt++);
            $cell->setCellValue('B'.$num_row, $row->ma_hoc_phan);
            $cell->setCellValue('C'.$num_row, $row->ten_hoc_phan);
            $cell->setCellValue('D'.$num_row, $row->so_chi_ly_thuyet);
            $cell->setCellValue('E'.$num_row, $row->so_chi_thuc_hanh);

            $borderStyle = $cell->getStyle('A' . $num_row . ':E' . $num_row)->getBorders();
            $borderStyle->getAllBorders()->setBorderStyle(Border::BORDER_THIN);
            $cell->getStyle('A' . $num_row .':E' .$num_row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);

            $num_row++;
        }
        foreach(range('A','E')as $columnID){
            $excel->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);
        }
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        $filename = "danh-sach-hoc-phan" . '.xlsx';
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        // Xóa tất cả buffer trước khi xuất dữ liệu
        ob_end_clean();

        $writer = IOFactory::createWriter($excel, 'Xlsx');
        $writer->save('php://output');
    }
}
