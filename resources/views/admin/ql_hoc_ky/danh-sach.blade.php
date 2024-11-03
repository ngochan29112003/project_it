@extends('admin.master')
@section('contents')
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        QUẢN LÝ HỌC KỲ
                    </h2>
                </div>
            </div>
            <div class="row mt-2 mb-0">
                <div class="col-auto">
                    <button class="btn btn-success btnAPI" >
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-cloud-down">
                              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                              <path d="M12 18.004h-5.343c-2.572 -.004 -4.657 -2.011 -4.657 -4.487c0 -2.475 2.085 -4.482 4.657 -4.482c.393 -1.762 1.794 -3.2 3.675 -3.773c1.88 -.572 3.956 -.193 5.444 1c1.488 1.19 2.162 3.007 1.77 4.769h.99c1.38 0 2.573 .813 3.13 1.99" />
                              <path d="M19 16v6" />
                              <path d="M22 19l-3 3l-3 -3" />
                            </svg>
                        </span>
                        Đồng bộ học kỳ
                    </button>
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
                            <table id="tableHocKy" class="table table-vcenter card-table table-striped">
                                <thead>
                                <tr>
                                    <th>Mã học kỳ</th>
                                    <th>Tên học kỳ</th>
                                    <th>Năm học</th>
                                    <th>Tuần bắt đầu</th>
                                    <th>Số tuần</th>
                                    <th>Loại học kỳ</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($list_hoc_ky as $item)
                                    <tr>
                                        <td class="align-middle">{{ $item->ma_hoc_ky }}</td>
                                        <td class="align-middle">{{ $item->ten_hoc_ky }}</td>
                                        <td class="align-middle">{{ $item->nam_hoc }}</td>
                                        <td class="align-middle">{{ $item->tuan_bat_dau }}</td>
                                        <td class="align-middle">{{ $item->so_tuan }}</td>
                                        <td class="align-middle">{{ $item->loai_hoc_ky }}</td>
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
        var table = $('#tableHocKy').DataTable({
            "language": {
                "emptyTable": "Không có dữ liệu trong bảng",
                "search": "Tìm kiếm:",
                "lengthMenu": "Hiển thị _MENU_ đề xuất mỗi trang",
                "zeroRecords": "Không tìm thấy kết quả",
                "infoEmpty": "Không có dữ liệu"
            }
        });

        $('.btnAPI').click(function (event){
            event.preventDefault()
            $.ajax({
                url: '{{ route('api-hoc-ky') }}',
                method: 'GET',
                data: $(this).serialize(),
                success: function (response) {
                    if (response.success) {
                        toastr.success(response.message, "Successful");
                        setTimeout(function () {
                            location.reload()
                        }, 500);
                    } else {
                        toastr.error(response.message, "Error");
                    }
                },
                error: function (xhr) {
                    toastr.error(response.message, "Error");
                    if (xhr.status === 400) {
                        var response = xhr.responseJSON;
                        toastr.error(response.message, "Error");
                    } else {
                        toastr.error("An error occurred", "Error");
                    }
                }
            });
        })
    </script>
@endsection

