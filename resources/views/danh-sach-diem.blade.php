@extends('master')
@section('contents')
    <div class="container-fluid">
        <div class="card">
            <div class="d-flex justify-content-between p-3 position-relative pt-3">
                <div class="d-flex flex-column">
                    <h2 class="text-danger fw-bold mb-0 me-3">
                        DANH SÁCH ĐIỂM CỦA SINH VIÊN / <span class="text-primary">{{$ten_bai_kiem_tra}}</span>
                    </h2>
                </div>
            </div>
            <div class="row row-deck row-cards px-4">
                <div class="col-12">
                    <div class="card">
                        <div class="table-responsive p-2">
                            <table id="table" class="table table-vcenter text-center">
                                <thead>
                                <tr>
                                    <th class="text-center w-auto">STT</th>
                                    <th class="text-center w-auto">Tên sinh viên</th>
                                    <th class="text-center w-auto">Số câu đúng</th>
                                    <th class="text-center w-auto">Điểm</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($dsDiemSV as $index => $i)
                                    <tr>
                                        <td class="text-center w-auto">{{ $index + 1 }}</td>
                                        <td class="text-center w-auto">{{ $i->ten_nguoi_dung }}</td>
                                        <td class="text-center w-auto">{{ $i->so_cau_dung }}</td>
                                        <td class="text-center w-auto">{{ $i->diem }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            var table = $('#table').DataTable({
                "language": {
                    "emptyTable": "Không có dữ liệu trong bảng",
                    "search": "Tìm kiếm:",
                    "lengthMenu": "Hiển thị _MENU_ câu hỏi mỗi trang",
                    "zeroRecords": "Không tìm thấy kết quả",
                    "infoEmpty": "Không có dữ liệu"
                }
            });
        });
    </script>
@endsection

