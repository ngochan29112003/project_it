<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <link rel="shortcut icon" href="{{asset('assets/img/icon.png')}}">
    <!-- CSS files -->
    <link href="{{asset('dist/css/tabler.min.css?1692870487')}}" rel="stylesheet"/>
    <link href="{{asset('dist/css/tabler-flags.min.css?1692870487')}}" rel="stylesheet"/>
    <link href="{{asset('dist/css/tabler-payments.min.css?1692870487')}}" rel="stylesheet"/>
    <link href="{{asset('dist/css/tabler-vendors.min.css?1692870487')}}" rel="stylesheet"/>
    <link href="{{asset('dist/css/demo.min.css?1692870487')}}" rel="stylesheet"/>
    <style>
        @import url('https://rsms.me/inter/inter.css');
        :root {
            --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
        }
        body {
            font-feature-settings: "cv03", "cv04", "cv11";
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>
<body  class=" d-flex flex-column">
<script src="{{asset('dist/js/demo-theme.min.js?1692870487')}}"></script>
<div class="page page-center">
    <div class="container container-normal py-4">
        <div class="row align-items-center g-4">
            <div class="col-lg">
                <div class="container-tight">
                    <div class="text-center mb-4">
                        <a href="." class="navbar-brand navbar-brand-autodark"><img src="{{asset('assets/img/logo.png')}}" height="100" alt=""></a>
                    </div>
                    <div class="card card-md">
                        <div class="card-body">
                            <h2 class="h2 text-center mb-4">Đăng nhập</h2>
                            <form id="formdangnhap" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label">Tài khoản</label>
                                    <input type="text" name="ten_tai_khoan" class="form-control" tabindex="1" autocomplete="off">
                                </div>
                                <div class="mb-2">
                                    <label class="form-label">Mật khẩu
                                        <span class="form-label-description">
                                            <a href="{{asset('forgot-password.html')}}">Quên mật khẩu?</a>
                                        </span>
                                    </label>
                                    <div class="input-group input-group-flat">
                                        <input type="password" name="mat_khau" id="pwd-input" class="form-control" tabindex="2" autocomplete="off">
                                    </div>
                                </div>

                                <div class="mb-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" tabindex="3" id="showPwdCheckbox">
                                        <label class="form-check-label" for="showPwdCheckbox">
                                            Hiển thị mật khẩu
                                        </label>
                                    </div>
                                </div>
                                <div class="form-footer">
                                    <button type="submit" class="btn btn-primary w-100">Login</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg d-none d-lg-block">
                <img src="{{asset('static/illustrations/undraw_secure_login_pdn4.svg')}}" height="300" class="d-block mx-auto" alt="">
            </div>
        </div>
    </div>
</div>

<script src="{{asset('dist/js/tabler.min.js?1692870487')}}" defer></script>
<script src="{{asset('dist/js/demo.min.js?1692870487')}}" defer></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const pwdInput = document.getElementById('pwd-input');
        const showPwdCheckbox = document.getElementById('showPwdCheckbox');

        if (showPwdCheckbox) {
            showPwdCheckbox.addEventListener('change', function () {
                pwdInput.type = this.checked ? 'text' : 'password';
            });
        }
    });

    $('#formdangnhap').submit(function (e) {
        e.preventDefault();

        $.ajax({
            url: '{{ route('login') }}',
            method: 'POST', // sử dụng POST để tránh lộ thông tin qua URL
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // thêm CSRF token
            },
            data: $(this).serialize(),
            success: function (response) {
                if (response.success) {
                    toastr.success(response.message, "Thành công");
                    setTimeout(function () {
                        window.location.href = response.redirect; // Chuyển hướng người dùng
                    }, 500);
                } else {
                    toastr.error(response.message, "Lỗi");
                }
            },
            error: function (xhr) {
                // Sửa lỗi này bằng cách lấy thông báo chính xác từ phản hồi JSON
                if (xhr.status === 400) {
                    var response = xhr.responseJSON;
                    toastr.error(response.message, "Lỗi");
                } else {
                    // Trường hợp lỗi khác (nếu có)
                    toastr.error("An error occurred", "Lỗi");
                }
            }
        });
    });
</script>
</body>
</html>
