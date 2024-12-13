@extends('master')
@section('contents')
    <div class="container mt-5">
        <h2 class="text-center"><b>Điểm Danh Sinh Viên </b></h2>

        <!-- Hiển thị ngày hiện tại -->
        <div class="text-center mb-4">
            <h5>Ngày: {{ \Carbon\Carbon::now()->format('d/m/Y') }}</h5>
        </div>

        <form action="{{ route('diem-danh') }}" method="POST">
            @csrf
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Tên Sinh Viên</th>
                    <th>Trạng Thái</th>
                </tr>
                </thead>
                <tbody>
                <!-- Dữ liệu set cứng cho sinh viên -->
                <tr>
                    <td>STT</td>
                    <td>Nguyễn Văn A</td>
                    <td>
                        <select name="" class="form-select">
                            <option value="present">Có Mặt</option>
                            <option value="absent">Vắng Mặt</option>
                            <option value="excused">Xin Phép</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Trần Thị B</td>
                    <td>
                        <select name="" class="form-select">
                            <option value="present">Có Mặt</option>
                            <option value="absent">Vắng Mặt</option>
                            <option value="excused">Xin Phép</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Lê Minh C</td>
                    <td>
                        <select name="" class="form-select">
                            <option value="present">Có Mặt</option>
                            <option value="absent">Vắng Mặt</option>
                            <option value="excused">Xin Phép</option>
                        </select>
                    </td>
                </tr>
                <!-- Thêm sinh viên khác nếu cần -->
                </tbody>
            </table>
            <button type="submit" class="btn btn-primary">Lưu Điểm Danh</button>
        </form>
    </div>
@endsection
