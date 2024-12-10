<!-- Fonts -->
<link href="https://fonts.gstatic.com" rel="preconnect">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

<!-- Bootstrap CSS -->
<link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

<!-- Tabler CSS -->
<link href="{{ asset('dist/css/tabler.min.css?1692870487') }}" rel="stylesheet">
<link href="{{ asset('dist/css/tabler-flags.min.css?1692870487') }}" rel="stylesheet">
<link href="{{ asset('dist/css/tabler-payments.min.css?1692870487') }}" rel="stylesheet">
<link href="{{ asset('dist/css/tabler-vendors.min.css?1692870487') }}" rel="stylesheet">

<!-- Icons -->
<!-- Chỉ giữ một trong hai cách để bao gồm Bootstrap Icons -->
<!-- Nếu bạn muốn sử dụng CDN: -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">
<!-- Hoặc nếu bạn muốn sử dụng local asset, hãy bỏ comment dòng dưới và xóa dòng CDN trên -->
<!-- <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet"> -->

<!-- Other CSS Libraries -->
<link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
<link href="{{ asset('assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
<link href="{{ asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
<link href="{{ asset('assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">

<!-- DataTables CSS (External) -->
<link rel="stylesheet" href="https://cdn.datatables.net/2.1.7/css/dataTables.dataTables.css">

<!-- SweetAlert2 CSS (External) -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

<!-- Toastr CSS -->
<link href="{{ asset('dist/css/toastr.css') }}" rel="stylesheet">

<!-- Demo CSS -->
<link href="{{ asset('dist/css/demo.min.css') }}" rel="stylesheet">

<!-- Custom CSS -->
<link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

<!-- Custom Styles -->
<style>
    @import url('https://rsms.me/inter/inter.css');

    :root {
        --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, "San Francisco", "Segoe UI", Roboto, "Helvetica Neue", sans-serif;
    }

    body {
        font-feature-settings: "cv03", "cv04", "cv11";
    }
</style>

<style>
    .dropdown-item:hover {
        background-color: #f0f0f0; /* Màu nền cho menu con khi hover */
        color: #333; /* Màu chữ */
    }

    .nav-item.dropdown:hover,
    .hide-theme-dark:hover,
    .hide-theme-light:hover,
    .nav-item:hover {
        background-color: rgba(240, 240, 240, 0.05); /* Thay đổi màu nền khi hover */
    }
</style>
