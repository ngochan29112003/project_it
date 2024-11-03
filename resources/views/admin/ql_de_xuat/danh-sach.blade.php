@extends('admin.master')
@section('contents')
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        QUẢN LÝ ĐỀ XUẤT
                    </h2>
                </div>
            </div>
            <div class="row mt-2 mb-0">
                <div class="col-auto">
{{--                    <a href="#" class="btn btn-primary">--}}
{{--                        <span>--}}
{{--                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-user-plus">--}}
{{--                              <path stroke="none" d="M0 0h24v24H0z" fill="none" />--}}
{{--                              <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />--}}
{{--                              <path d="M16 19h6" />--}}
{{--                              <path d="M19 16v6" />--}}
{{--                              <path d="M6 21v-2a4 4 0 0 1 4 -4h4" />--}}
{{--                            </svg>--}}
{{--                        </span>--}}
{{--                        Thêm mới --}}
{{--                    </a>--}}
                    <a href="#" class="btn btn-success">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-table-export">
                              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                              <path d="M12.5 21h-7.5a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v7.5" />
                              <path d="M3 10h18" />
                              <path d="M10 3v18" />
                              <path d="M16 19h6" />
                              <path d="M19 16l3 3l-3 3" />
                            </svg>
                        </span>
                        Xuất excel
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="page-body">
        <div class="container-xl">
            <div class="row row-deck row-cards">

                <div class="col-12">
                    <div class="card">
                        <div class="table-responsive p-2">
                            <table id="tableDeXuat" class="table table-vcenter card-table table-striped">
                                <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Họ tên</th>
                                    <th>Nội dung đề xuất</th>
                                    <th>Trạng thái</th>
                                    <th class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
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
        var table = $('#tableDeXuat').DataTable({
            "language": {
                "emptyTable": "Không có dữ liệu trong bảng",
                "search": "Tìm kiếm:",
                "lengthMenu": "Hiển thị _MENU_ đề xuất mỗi trang",
                "zeroRecords": "Không tìm thấy kết quả",
                "infoEmpty": "Không có dữ liệu"
            }
        });
    </script>
@endsection

