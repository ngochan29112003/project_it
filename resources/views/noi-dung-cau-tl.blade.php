@extends('master')

@section('contents')
    <div class="container-fluid">
        <div class="card">
            <div class="d-flex justify-content-between p-3 position-relative pt-3">
                <div class="d-flex flex-column">
                    <h2 class="text-danger fw-bold mb-0 me-3">
                        NỘI DUNG CÂU TRẢ LỜI SINH VIÊN / <span class="text-primary">{{$ten_nguoi_lam_bai->ten_nguoi_dung}} - Điểm: {{$ten_nguoi_lam_bai->diem}}</span>
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
                                    <th class="text-center w-auto">Câu hỏi</th>
                                    <th class="text-center w-auto">Câu trả lời</th>
                                    <th class="text-center w-auto">Kết quả</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($ndcautl as $index => $i)
                                    <tr>
                                        <td class="text-center w-auto">{{ $index + 1 }}</td>
                                        <td class="text-center w-auto">{{ $i->cau_hoi }}</td>
                                        <td class="text-center w-auto">{{ $i->cau_tra_loi }}</td>
                                        <td class="text-center w-auto">
                                            @if(trim($i->cau_tra_loi) == trim($i->dap_an_dung))
                                                <span class="text-success">Đúng</span>
                                            @else
                                                <span class="text-danger">Sai</span>
                                            @endif
                                        </td>
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
