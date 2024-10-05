<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <link rel="shortcut icon" href="{{asset('asset/img/icon.png')}}">
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
</head>
<body  class=" d-flex flex-column">
<script src="{{asset('dist/js/demo-theme.min.js?1692870487')}}"></script>
<div class="page page-center">
    <div class="container container-normal py-4">
        <div class="row align-items-center g-4">
            <div class="col-lg">
                <div class="container-tight">
                    <div class="text-center mb-4">
                        <a href="." class="navbar-brand navbar-brand-autodark"><img src="{{asset('asset/img/logo.png')}}" height="100" alt=""></a>
                    </div>
                    <div class="card card-md">
                        <div class="card-body">
                            <h2 class="h2 text-center mb-4">Đăng nhập</h2>
                            <form action="./" method="get" autocomplete="off" novalidate>
                                <div class="mb-3">
                                    <label class="form-label">Tài khoản</label>
                                    <input type="email" class="form-control" placeholder="nguyenvana@email.com" autocomplete="off">
                                </div>
                                <div class="mb-2">
                                    <label class="form-label">Mật khẩu
                                        <span class="form-label-description">
                                            <a href="{{asset('forgot-password.html')}}">Quên mật khẩu?</a>
                                        </span>
                                    </label>
                                    <div class="input-group input-group-flat">
                                        <input type="password" id="pwd-input" class="form-control"  placeholder="Nva@123"  autocomplete="off">
                                    </div>
                                </div>

                                <div class="mb-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="showPwdCheckbox">
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
</script>
</body>
</html>
