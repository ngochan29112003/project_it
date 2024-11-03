@extends('e')
@section('contents')
    <style>
        .fp-site-customdesc {
            background-color: #f8f9fa; /* Màu nền nhạt */
            padding: 2rem; /* Thêm padding */
        }

        .carousel-caption {
            background: linear-gradient(180deg, rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.7));
            padding: 20px;
            border-radius: 8px;
            max-width: 80%; /* Giới hạn chiều rộng cho caption */
            text-align: center;
        }

        .caption-title {
            font-size: 2rem;
            font-weight: bold;
            color: #f9f9f9;
            margin-bottom: 10px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.8);
        }

        .caption-text {
            font-size: 1.1rem;
            color: #e0e0e0;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.7);
        }
    </style>
    <div class="page-body ">
        <div id="carousel-captions" class="carousel slide" data-bs-ride="carousel"
             style="max-height: 400px; overflow: hidden;">
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="3000">
                    <img class="d-block w-100" style="height: 400px; object-fit: cover;"
                         src="{{asset('/assets/img/news-1.jpg')}}"/>
                    <div class="carousel-caption d-none d-md-block text-center text-white">
                        <h3 class="caption-title">Tri thức</h3>
                        <p class="caption-text">Nơi hội tụ kiến thức và nguồn cảm hứng học tập bất tận.</p>
                    </div>
                </div>
                <div class="carousel-item" data-bs-interval="3000">
                    <img class="d-block w-100" style="height: 400px; object-fit: cover;"
                         src="{{asset('/assets/img/news-2.jpg')}}"/>
                    <div class="carousel-caption d-none d-md-block text-center text-white">
                        <h3 class="caption-title">Sáng tạo</h3>
                        <p class="caption-text">Mở ra lối đi mới với kiến thức đa dạng và bài học thực tế.</p>
                    </div>
                </div>
                <div class="carousel-item" data-bs-interval="3000">
                    <img class="d-block w-100" style="height: 400px; object-fit: cover;"
                         src="{{asset('/assets/img/news-3.jpg')}}"/>
                    <div class="carousel-caption d-none d-md-block text-center text-white">
                        <h3 class="caption-title">Phát triển</h3>
                        <p class="caption-text">Đồng hành và phát triển cùng những khóa học hàng đầu.</p>
                    </div>
                </div>
                <div class="carousel-item" data-bs-interval="3000">
                    <img class="d-block w-100" style="height: 400px; object-fit: cover;"
                         src="{{asset('/assets/img/news-4.jpg')}}"/>
                    <div class="carousel-caption d-none d-md-block text-center text-white">
                        <h3 class="caption-title">Hội nhập</h3>
                        <p class="caption-text">Tiến tới thành công với kiến thức toàn cầu và kỹ năng chuyên sâu.</p>
                    </div>
                </div>
                <div class="carousel-item" data-bs-interval="3000">
                    <img class="d-block w-100" style="height: 400px; object-fit: cover;"
                         src="{{asset('/assets/img/news-5.jpg')}}"/>
                    <div class="carousel-caption d-none d-md-block text-center text-white">
                        <h3 class="caption-title">Tương lai</h3>
                        <p class="caption-text">Chuẩn bị cho tương lai với nền tảng kiến thức vững chắc.</p>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" data-bs-target="#carousel-captions" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </a>
            <a class="carousel-control-next" data-bs-target="#carousel-captions" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </a>
        </div>

        <div class="fp-site-customdesc d-flex align-items-center justify-content-center text-center py-5">
            <div class="container">
                <h1 class="display-4 fw-bold mb-3 text-primary text-center"
                    style="font-size: 2.5rem; text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);">
                    Hệ thống LMS - VLUTE</h1>
                <p class="lead text-secondary">Chào mừng bạn đến với Hệ Thống Đào Tạo giảng dạy trực tuyến. Khám phá
                    những kiến thức mới nhất và nâng cao kỹ năng của bạn.</p>
            </div>
        </div>

        <div class="container">
            <div class="container my-5">
                <h3 class="text-danger fw-bold">
                    KHÓA HỌC MỚI
                </h3>
            </div>
            <div class="row">
                <div class="col-md-3 mb-4">
                    <div class="card" style="height: 20rem;">
                        <img src="{{asset('/assets/img/book.jpg')}}" class="card-img-top mx-auto d-block"
                             style="height: 10rem; width: auto;" alt="...">
                        <div class="card-body text-center">
                            <h5 class="text-danger">Lập trình mạng</h5>
                            <p class="card-text">241_1TH1314_KS2A_02_tructiep</p>
                            <a href="#" class="btn btn-danger">Xem Chi Tiết</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 mb-4">
                    <div class="card" style="height: 20rem;">
                        <img src="{{asset('/assets/img/book.jpg')}}" class="card-img-top mx-auto d-block"
                             style="height: 10rem; width: auto;" alt="...">
                        <div class="card-body text-center">
                            <h5 class="text-danger">Lập trình mạng</h5>
                            <p class="card-text">241_1TH1314_KS2A_02_tructiep</p>
                            <a href="#" class="btn btn-danger">Xem Chi Tiết</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 mb-4">
                    <div class="card" style="height: 20rem;">
                        <img src="{{asset('/assets/img/book.jpg')}}" class="card-img-top mx-auto d-block"
                             style="height: 10rem; width: auto;" alt="...">
                        <div class="card-body text-center">
                            <h5 class="text-danger">Lập trình mạng</h5>
                            <p class="card-text">241_1TH1314_KS2A_02_tructiep</p>
                            <a href="#" class="btn btn-danger">Xem Chi Tiết</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 mb-4">
                    <div class="card" style="height: 20rem;">
                        <img src="{{asset('/assets/img/book.jpg')}}" class="card-img-top mx-auto d-block"
                             style="height: 10rem; width: auto;" alt="...">
                        <div class="card-body text-center">
                            <h5 class="text-danger">Lập trình mạng</h5>
                            <p class="card-text">241_1TH1314_KS2A_02_tructiep</p>
                            <a href="#" class="btn btn-danger">Xem Chi Tiết</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 mb-4">
                    <div class="card" style="height: 20rem;">
                        <img src="{{asset('/assets/img/book.jpg')}}" class="card-img-top mx-auto d-block"
                             style="height: 10rem; width: auto;" alt="...">
                        <div class="card-body text-center">
                            <h5 class="text-danger">Lập trình mạng</h5>
                            <p class="card-text">241_1TH1314_KS2A_02_tructiep</p>
                            <a href="#" class="btn btn-danger">Xem Chi Tiết</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 mb-4">
                    <div class="card" style="height: 20rem;">
                        <img src="{{asset('/assets/img/book.jpg')}}" class="card-img-top mx-auto d-block"
                             style="height: 10rem; width: auto;" alt="...">
                        <div class="card-body text-center">
                            <h5 class="text-danger">Lập trình mạng</h5>
                            <p class="card-text">241_1TH1314_KS2A_02_tructiep</p>
                            <a href="#" class="btn btn-danger">Xem Chi Tiết</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 mb-4">
                    <div class="card" style="height: 20rem;">
                        <img src="{{asset('/assets/img/book.jpg')}}" class="card-img-top mx-auto d-block"
                             style="height: 10rem; width: auto;" alt="...">
                        <div class="card-body text-center">
                            <h5 class="text-danger">Lập trình mạng</h5>
                            <p class="card-text">241_1TH1314_KS2A_02_tructiep</p>
                            <a href="#" class="btn btn-danger">Xem Chi Tiết</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 mb-4">
                    <div class="card" style="height: 20rem;">
                        <img src="{{asset('/assets/img/book.jpg')}}" class="card-img-top mx-auto d-block"
                             style="height: 10rem; width: auto;" alt="...">
                        <div class="card-body text-center">
                            <h5 class="text-danger">Lập trình mạng</h5>
                            <p class="card-text">241_1TH1314_KS2A_02_tructiep</p>
                            <a href="#" class="btn btn-danger">Xem Chi Tiết</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 mb-4">
                    <div class="card" style="height: 20rem;">
                        <img src="{{asset('/assets/img/book.jpg')}}" class="card-img-top mx-auto d-block"
                             style="height: 10rem; width: auto;" alt="...">
                        <div class="card-body text-center">
                            <h5 class="text-danger">Lập trình mạng</h5>
                            <p class="card-text">241_1TH1314_KS2A_02_tructiep</p>
                            <a href="#" class="btn btn-danger">Xem Chi Tiết</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 mb-4">
                    <div class="card" style="height: 20rem;">
                        <img src="{{asset('/assets/img/book.jpg')}}" class="card-img-top mx-auto d-block"
                             style="height: 10rem; width: auto;" alt="...">
                        <div class="card-body text-center">
                            <h5 class="text-danger">Lập trình mạng</h5>
                            <p class="card-text">241_1TH1314_KS2A_02_tructiep</p>
                            <a href="#" class="btn btn-danger">Xem Chi Tiết</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 mb-4">
                    <div class="card" style="height: 20rem;">
                        <img src="{{asset('/assets/img/book.jpg')}}" class="card-img-top mx-auto d-block"
                             style="height: 10rem; width: auto;" alt="...">
                        <div class="card-body text-center">
                            <h5 class="text-danger">Lập trình mạng</h5>
                            <p class="card-text">241_1TH1314_KS2A_02_tructiep</p>
                            <a href="#" class="btn btn-danger">Xem Chi Tiết</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 mb-4">
                    <div class="card" style="height: 20rem;">
                        <img src="{{asset('/assets/img/book.jpg')}}" class="card-img-top mx-auto d-block"
                             style="height: 10rem; width: auto;" alt="...">
                        <div class="card-body text-center">
                            <h5 class="text-danger">Lập trình mạng</h5>
                            <p class="card-text">241_1TH1314_KS2A_02_tructiep</p>
                            <a href="#" class="btn btn-danger">Xem Chi Tiết</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container mt-5">
            <h3 class="text-danger fw-bold">TIN TỨC CHUNG</h3>

            <div class="bg-white p-4 rounded shadow mb-4">
                <div class="forumpost clearfix firstpost starter mb-3">
                    <h4 class="text-primary">HƯỚNG DẪN KHÔI PHỤC MẬT KHẨU DÀNH CHO SINH VIÊN</h4>
                </div>
                <div class="content mb-4">
                    <h5>Nội dung:</h5>
                    <ul class="list-unstyled">
                        <li>🔑 Hướng dẫn khôi phục mật khẩu Elearning.</li>
                        <li>🔑 Hướng dẫn khôi phục mật khẩu Gmail.</li>
                    </ul>
                </div>
                <div class="attachments mb-4">
                    <h5>Tài liệu đính kèm:</h5>
                    <a href="#" class="btn btn-outline-primary">
                        HƯỚNG DẪN XIN CẤP LẠI MẬT KHẨU MAIL VÀ ELARNING.pdf
                    </a>
                </div>
                <div class="footer mt-3">
                    <div class="permalink mb-2">
                        <a class="text-muted" rel="bookmark" href="#">Permalink</a>
                    </div>
                    <div class="discussion-link">
                        <a class="text-muted" href="#">Xem thảo luận</a> (0 phản hồi)
                    </div>
                </div>
            </div>

            <div class="bg-white p-4 rounded shadow mb-4">
                <div class="forumpost clearfix firstpost starter mb-3">
                    <h4 class="text-primary">QUY ĐỊNH CHUNG KHI SỬ DỤNG HỆ THỐNG</h4>
                </div>
                <div class="content mb-4">
                    <h5>Nội dung:</h5>
                    <ul class="list-unstyled">
                        <li>🛡️ Người dùng phải bảo vệ tài khoản của mình, phải chịu trách nhiệm nếu cố tình để tài khoản
                            của mình cho người khác lợi dụng sử dụng trái phép hoặc với mục đích xấu (phải đặt mật khẩu
                            an toàn và không cung cấp cho bất kỳ ai).
                        </li>
                        <li>📚 Chỉ sử dụng với mục đích học tập, không đưa nội dung không liên quan đến môn học lên
                            website này.
                        </li>
                        <li>💬 Khi thảo luận trên các diễn đàn phải sử dụng lời lẽ lịch sự, tôn trọng Thầy Cô và bạn bè,
                            không tuyên truyền nội dung xấu, vi phạm quy định nhà nước.
                        </li>
                        <li>🆔 Khai báo thông tin cá nhân phải chính xác, không dùng bí danh, họ tên tiếng Anh (trừ các
                            bạn nước ngoài).
                        </li>
                        <li>✅ Thực hiện đúng, đầy đủ các qui định do Giáo viên đưa ra đối với từng môn học.</li>
                    </ul>
                </div>
                <div class="footer mt-3">
                    <div class="permalink mb-2">
                        <a class="text-muted" rel="bookmark" href="#">Permalink</a>
                    </div>
                    <div class="discussion-link">
                        <a class="text-muted" href="#">Xem thảo luận</a> (0 phản hồi)
                    </div>
                </div>
            </div>
        </div>

        <div class="container mt-4">
            <h3 class="text-danger fw-bold mb-4">CÁC KHÓA HỌC CỦA TÔI</h3>

            <div class="coursebox card mb-4" data-courseid="3870" data-type="1">
                <div class="card-body">
                    <h5 class="card-title" style="font-family: 'Roboto', sans-serif;">
                        <a class="text-primary" href="#">TOÁN CAO CẤP A1-211_1CB1106_11</a>
                    </h5>
                    <p class="card-text text-muted">Giáo viên: Nguyễn Thanh Hoàng</p>
                    <p class="card-text text-muted">Thời gian: Bắt đầu từ 01/11/2024</p>
                    <p class="card-text"><small class="text-success">Bạn đã tham gia khóa học. Chúc bạn học tốt!</small>
                    </p>
                </div>
            </div>

            <div class="coursebox card mb-4" data-courseid="3871" data-type="1">
                <div class="card-body">
                    <h5 class="card-title" style="font-family: 'Roboto', sans-serif;">
                        <a class="text-primary" href="#">VẬT LÝ HỌC CƠ SỞ 1</a>
                    </h5>
                    <p class="card-text text-muted">Giáo viên: Phan Tấn Trung</p>
                    <p class="card-text text-muted">Thời gian: Bắt đầu từ 01/11/2024</p>
                    <p class="card-text"><small class="text-success">Bạn đã tham gia khóa học. Chúc bạn học tốt!</small>
                    </p>
                </div>
            </div>

            <div class="coursebox card mb-4" data-courseid="3872" data-type="1">
                <div class="card-body">
                    <h5 class="card-title" style="font-family: 'Roboto', sans-serif;">
                        <a class="text-primary" href="#">HÓA HỌC ỨNG DỤNG</a>
                    </h5>
                    <p class="card-text text-muted">Giáo viên: Nguyễn Thị Hồng Nhung</p>
                    <p class="card-text text-muted">Thời gian: Bắt đầu từ 01/11/2024</p>
                    <p class="card-text"><small class="text-success">Bạn đã tham gia khóa học. Chúc bạn học tốt!</small>
                    </p>
                </div>
            </div>

            <div class="container mt-4 text-center">
                <div class="paging paging-morelink">
                    <a href="#" class="btn btn-outline-primary px-4 py-2 fw-bold rounded-pill">
                        Các khóa học của tôi
                    </a>
                </div>
            </div>
        </div>
    </div>
    <script>

    </script>
@endsection
