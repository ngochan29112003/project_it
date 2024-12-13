@extends('master')

@section('contents')
    <div class="card mb-4">
        <div class="card-body pt-xl-4">
            <h2 class="submission-title text-danger fw-bold">Chuẩn Bị Làm Bài Kiểm Tra</h2>
            <span>Vui lòng kiểm tra lại các thông tin trước khi bắt đầu làm bài trắc nghiệm.</span>

            <!-- Thông tin bài kiểm tra -->
            <div class="exam-info mb-4 pt-xl-4">
                <h4 class="text-primary">Thông Tin Bài Kiểm Tra</h4>
                <table class="table table-bordered">
                    <tbody>
                    <tr>
                        <td class="fw-bold">Tên Bài Kiểm Tra:</td>
                        <td><span>Bài Kiểm Tra 10% Lần 1</span></td>
                    </tr>
                    <tr>
                        <td class="fw-bold">Môn Học:</td>
                        <td><span>Công Nghệ Thông Tin</span></td>
                    </tr>
                    <tr>
                        <td class="fw-bold">Số Câu Hỏi:</td>
                        <td><span>20 câu</span></td>
                    </tr>
                    <tr>
                        <td class="fw-bold">Thời Gian Làm Bài:</td>
                        <td><span>60 phút</span></td>
                    </tr>
                    <tr>
                        <td class="fw-bold">Hạn Chót:</td>
                        <td><span>{{ \Carbon\Carbon::now()->addMinutes(60)->format('d/m/Y, h:i A') }}</span></td>
                    </tr>
                    </tbody>
                </table>
            </div>

            <!-- Hướng dẫn trước khi bắt đầu -->
            <div class="exam-guidelines mb-4">
                <h4 class="text-primary">Hướng Dẫn Làm Bài</h4>
                <ul>
                    <li>Đảm bảo bạn có đủ thời gian để hoàn thành bài kiểm tra.</li>
                    <li>Đọc kỹ từng câu hỏi và các lựa chọn trả lời.</li>
                    <li>Bạn có thể quay lại các câu hỏi đã trả lời sau khi làm xong.</li>
                    <li>Nếu bạn gặp sự cố kỹ thuật, hãy thông báo ngay lập tức cho giảng viên.</li>
                </ul>
            </div>

            <!-- Nút bắt đầu bài kiểm tra -->
            <div class="start-exam d-flex justify-content-center">
                <a href="{{ route('kiem-tra-trac-nghiem') }}" class="btn btn-success btn-lg">Bắt Đầu Bài Kiểm Tra</a>
            </div>

            <!-- Thông tin về sự hỗ trợ -->
            <div class="support-info mt-4">
                <h4 class="text-danger">Cần Hỗ Trợ?</h4>
                <p>Liên hệ với giảng viên nếu bạn gặp bất kỳ khó khăn nào trong quá trình làm bài.</p>
            </div>
        </div>
    </div>
@endsection
