<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BaiKiemTraModel;
use App\Models\NganHangCauHoiModel;
use App\Models\BaiLamSinhVienModel;
use App\Models\KetQuaKiemTraModel;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class KiemTraTracNghiemController extends Controller
{
    public function getViewKiemTraTracNghiem($id_bai_kiem_tra, $id_bai_giang) {
        $baiKiemTra = BaiKiemTraModel::find($id_bai_kiem_tra);
        if (!$baiKiemTra) {
            return redirect()->back()->with('error', 'Bài kiểm tra không tồn tại.');
        }

        $deadline = Carbon::parse($baiKiemTra->han_chot);
        $currentTime = Carbon::now();
        if ($currentTime->greaterThan($deadline)) {
            return redirect()->back()->with('error', 'Bài kiểm tra đã hết hạn.');
        }

        $questionSessionKey = 'exam_questions_'.$id_bai_kiem_tra;
        $endTimeSessionKey = 'exam_end_time_'.$id_bai_kiem_tra;

        if (!session()->has($questionSessionKey) || !session()->has($endTimeSessionKey)) {
            // Lần đầu vào
            $questions = NganHangCauHoiModel::where('id_lop_hoc_phan', $baiKiemTra->id_lop_hoc_phan)
                ->inRandomOrder()
                ->take($baiKiemTra->so_cau)
                ->get();

            session([$questionSessionKey => $questions->pluck('id')->toArray()]);

            // Thiết lập thời gian kết thúc
            $endTime = time() + ($baiKiemTra->thoi_gian * 60);
            session([$endTimeSessionKey => $endTime]);
        } else {
            // Đã load trước đó, lấy từ session
            $questionIds = session($questionSessionKey);
            // Lấy câu hỏi theo đúng thứ tự ID đã lưu
            $questions = NganHangCauHoiModel::whereIn('id', $questionIds)
                ->orderByRaw("FIELD(id, " . implode(',', $questionIds) . ")")
                ->get();

            $endTime = session($endTimeSessionKey);
        }

        // Tính thời gian còn lại
        $timeRemaining = $endTime - time();
        if ($timeRemaining < 0) {
            $timeRemaining = 0;
        }

        return view('kiem-tra-trac-nghiem', compact('baiKiemTra', 'questions', 'id_bai_kiem_tra', 'id_bai_giang', 'timeRemaining'));
    }


    public function nopBai(Request $request, $id_bai_kiem_tra, $id_bai_giang)
    {
        $baiKiemTra = BaiKiemTraModel::find($id_bai_kiem_tra);
        if (!$baiKiemTra) {
            return redirect()->back()->with('error', 'Bài kiểm tra không tồn tại.');
        }

        $deadline = Carbon::parse($baiKiemTra->han_chot);
        $currentTime = Carbon::now();
        if ($currentTime->greaterThan($deadline)) {
            return redirect()->back()->with('error', 'Bài kiểm tra đã hết hạn.');
        }

        $questionSessionKey = 'exam_questions_'.$id_bai_kiem_tra;
        $questionIds = session($questionSessionKey, []);
        $answers = $request->input('answers', []);

        $ma_nguoi_dung = session('ma_nguoi_dung');

        // Xóa bài làm cũ
        BaiLamSinhVienModel::where('ma_nguoi_dung', $ma_nguoi_dung)
            ->where('bai_kiem_tra', $id_bai_kiem_tra)
            ->where('ma_bai_giang', $id_bai_giang)
            ->delete();

        foreach ($questionIds as $qId) {
            $cauTraLoi = isset($answers[$qId]) ? $answers[$qId] : null;
            BaiLamSinhVienModel::create([
                'ma_nguoi_dung' => $ma_nguoi_dung,
                'id_cau_hoi' => $qId,
                'cau_tra_loi' => $cauTraLoi,
                'id_lhp' => $baiKiemTra->id_lop_hoc_phan,
                'bai_kiem_tra' => $id_bai_kiem_tra,
                'ma_bai_giang' => $id_bai_giang,
            ]);
        }

        // Chấm điểm
        $so_cau_dung = 0;
        $total = count($questionIds);
        if ($total > 0) {
            $cauHoi = NganHangCauHoiModel::whereIn('id', $questionIds)->get()->keyBy('id');
            $baiLam = BaiLamSinhVienModel::where('ma_nguoi_dung', $ma_nguoi_dung)
                ->where('bai_kiem_tra', $id_bai_kiem_tra)
                ->where('ma_bai_giang', $id_bai_giang)
                ->get()->keyBy('id_cau_hoi');

            foreach ($questionIds as $qid) {
                if (isset($cauHoi[$qid], $baiLam[$qid])) {
                    if ($cauHoi[$qid]->dap_an_dung == $baiLam[$qid]->cau_tra_loi) {
                        $so_cau_dung++;
                    }
                }
            }
        }

        $diem = ($so_cau_dung / $total) * 10;

        KetQuaKiemTraModel::updateOrCreate([
            'bai_kiem_tra' => $id_bai_kiem_tra,
            'ma_bai_giang' => $id_bai_giang,
            'ma_nguoi_dung' => $ma_nguoi_dung
        ], [
            'so_cau_dung' => $so_cau_dung,
            'diem' => $diem,
        ]);

        // Sau khi nộp bài, xóa session liên quan (nếu muốn) để lần sau vào sẽ random mới
        session()->forget('exam_questions_'.$id_bai_kiem_tra);
        session()->forget('exam_end_time_'.$id_bai_kiem_tra);

        // Quay về trang trac-nghiem sau khi nộp bài
        return redirect()->route('trac-nghiem', [
            'id' => $baiKiemTra->id_lop_hoc_phan,
            'ma_bai_giang' => $id_bai_giang
        ])->with('success', 'Nộp bài thành công!');
    }
}
