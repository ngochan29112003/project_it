@extends('master')
@section('contents')
    <div class="container-fluid">
        <div class="card">
            <div class="d-flex justify-content-between p-3 position-relative pt-3">
                <div class="d-flex align-items-center">
                    <h2 class="fw-bold mb-0 me-3">
                        <span class="text-danger">ĐIỂM DANH</span> / <span
                            class="text-primary">{{$ten_lop_hoc_phan}}</span>
                    </h2>
                </div>
                <a type="button" class="btn btn-success mx-2" href="{{ route('diem-danh.export', [$ma_hoc_phan, $ten_lop_hoc_phan]) }}">
                    <i class="bi bi-file-earmark-excel-fill"></i>
                    Xuất Excel
                </a>
            </div>
            <div class="row row-deck row-cards px-4">
                <div class="col-12">
                    <div class="card">
                        <div class="table-responsive p-2">
                            <form action="{{ route('diem-danh.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="ma_hoc_phan" value="{{ $ma_hoc_phan }}">
                                <input type="hidden" name="ngay_di_hoc" value="{{ $today }}">

                                <table id="table" class="table table-vcenter text-center table-bordered">
                                    <thead>
                                    <tr>
                                        <th class="text-center w-auto" rowspan="2">STT</th>
                                        <th class="text-center w-auto" rowspan="2">Tên sinh viên</th>
                                        <th class="text-center w-auto" colspan="{{ count($dsNgayHoc) }}">Ngày học</th>
                                    </tr>
                                    <tr>
                                        @foreach(array_reverse($dsNgayHoc) as $day)
                                            <th class="text-center w-auto">{{ $day }}</th>
                                        @endforeach
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($dsSinhVienDaGhiDanh as $index => $sv)
                                        <tr>
                                            <td class="text-center w-auto">{{ $index + 1 }}</td>
                                            <td class="text-center w-auto">{{ $sv->ten_nguoi_dung }}</td>
                                            @foreach(array_reverse($dsNgayHoc) as $day)
                                                @php
                                                    $di_hoc = $attendanceMap[$day][$sv->ma_nguoi_dung] ?? 0;
                                                    $checked = ($di_hoc == 1) ? 'checked' : '';
                                                    $disabled = ($day !== $today) ? 'disabled' : '';
                                                @endphp
                                                <td class="text-center w-auto">
                                                    <input type="checkbox"
                                                           name="attendance[{{ $day }}][]"
                                                           value="{{ $sv->ma_nguoi_dung }}"
                                                        {{ $checked }} {{ $disabled }}>
                                                </td>
                                            @endforeach
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="mt-3">
                                    <button type="submit" class="btn btn-primary">Lưu điểm danh</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        @if(session('success'))
        toastr.success("{{ session('success') }}");
        @endif
    </script>
@endsection
