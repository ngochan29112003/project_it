@extends('hoc_sinh.master')
@section('contents')
<div id="ct_pt" class="container box-grade">
<h2  class="txt-white">Chương trình trung học phổ thông</h2>
<p class="txt-white">Video bài giảng và bài tập luyện tập cơ bản đến nâng cao các lớp 10, 11, 12.</p>
<div class="row">
    <div class="col col-3">
        <a href="{{route('index.lop-10')}}" title="Chương trình học lớp 10"><h3 class="bg-10">Lớp 10</h3></a>
         <ul>
            <li><span class="icon icon-math"></span><span>Toán lớp 10</span></li>
            <li><span class="icon icon-vl"></span><span>Vật lý lớp 10</span></li>
            <li><span class="icon icon-hh"></span><span>Hóa học lớp 10</span></li>
            <li><span class="icon icon-sh"></span><span>Sinh học lớp 10</span></li>
            <li><span class="icon icon-nv" style="background-position: -875px -836px;"></span><span>Ngữ văn lớp 10</span></li>
            <li><span class="icon icon-dl"></span><span>Địa lí lớp 10</span></li>
            <li><span class="icon icon-ls"></span><span>Lịch sử lớp 10</span></li>
            <li><span class="icon icon-gdcd" style="background-position: -875px -836px;"></span></span><span>Giáo dục công dân lớp 10</span></li>
        </ul>
    </div>
     <div class="col col-3">
        <a href="https://www.luyenthi123.com/lop-11" title="Chương trình học lớp 11"><h3 class="bg-11">Lớp 11</h3></a>
        <ul>
            <li><span class="icon icon-math"></span><span>Toán lớp 11</span></li>
            <li><span class="icon icon-vl"></span><span>Vật lý lớp 11</span></li>
            <li><span class="icon icon-hh"></span><span>Hóa học lớp 11</span></li>
            <li><span class="icon icon-sh"></span><span>Sinh học lớp 11</span></li>
            <li><span class="icon icon-nv" style="background-position: -875px -836px;"></span></span><span>Ngữ văn lớp 11</span></li>
            <li><span class="icon icon-dl"></span><span>Địa lí lớp 11</span></li>
            <li><span class="icon icon-ls"></span><span>Lịch sử lớp 11</span></li>
            <li><span class="icon icon-gdcd" style="background-position: -875px -836px;">></span><span>Giáo dục công dân lớp 11</span></li>
        </ul>
    </div>
     <div class="col col-3">
        <a href="https://www.luyenthi123.com/lop-12" title="Chương trình học lớp 12"><h3  class="bg-12">Lớp 12</h3></a>
        <ul>
            <li><span class="icon icon-math"></span><span>Toán lớp 12</span></li>
            <li><span class="icon icon-vl"></span><span>Vật lý lớp 12</span></li>
            <li><span class="icon icon-hh"></span><span>Hóa học lớp 12</span></li>
            <li><span class="icon icon-sh"></span><span>Sinh học lớp 12</span></li>
            <li><span class="icon icon-nv" style="background-position: -875px -836px;"></span></span><span>Ngữ văn lớp 12</span></li>
            <li><span class="icon icon-dl"></span><span>Địa lí lớp 12</span></li>
            <li><span class="icon icon-ls"></span><span>Lịch sử lớp 12</span></li>
            <li><span class="icon icon-gdcd" style="background-position: -875px -836px;"></span></span><span>Giáo dục công dân lớp 12</span></li>
        </ul>
    </div>
</div>
</div>
<div class="container br-rad-10" id="box_course_video">
    <h2>Video bài giảng</h2>
    <div class="icon br-bottom"></div>
    <ul>
        <li><a href="https://www.luyenthi123.com/bai-giang/toan-lop-10" title="Videos bài giảng toán lớp 10"><div class="icon icon-vd icon-vd-grade10"></div></a>
            <div class="cont">            
                <h3><a href="https://www.luyenthi123.com/bai-giang/toan-lop-10" title="Videos bài giảng toán lớp 10">Videos bài giảng toán lớp 10</a></h3>
                <div class="txt-green">
                    <span class="icon icon-play"></span><span class="br-right">2 video bài học</span>
                    <span class="icon icon-pr"></span><span>Hơn 4500 bài tập thực hành</span>
                </div>
                <div class="txt-gv"><span class="icon icon-gv"></span><span>GV : <span class="f-bold">Trần Mạnh</span></span></div>
                <div class="f-small">Cử nhân ĐH Sư phạm HN - Khoa Toán</div>
            </div>
        </li>
        <li><a href="https://www.luyenthi123.com/bai-giang/toan-lop-11" title="Videos bài giảng toán lớp 11"><div class="icon icon-vd icon-vd-grade11"></div></a>
            <div class="cont">            
                <h3><a href="https://www.luyenthi123.com/bai-giang/toan-lop-11" title="Videos bài giảng toán lớp 11">Videos bài giảng toán lớp 11</a></h3>
                <div class="txt-green">
                    <span class="icon icon-play"></span><span class="br-right">2 video bài học</span>
                    <span class="icon icon-pr"></span><span>Hơn 4500 bài tập thực hành</span>
                </div>
                <div class="txt-gv"><span class="icon icon-gv"></span><span>GV : <span class="f-bold">Phạm Thị Mai Dung</span></span></div>
                <div class="f-small">Thạc sỹ ĐH Sư phạm Hà nội - Khoa Toán - Chuyên ngành Phương trình vi tích phân</div>
            </div>
        </li>
         <li><a href="https://www.luyenthi123.com/bai-giang/toan-lop-12" title="Videos bài giảng toán lớp 12"><div class="icon icon-vd icon-vd-grade10"></div></a>
            <div class="cont">            
                <h3><a href="https://www.luyenthi123.com/bai-giang/toan-lop-12" title="Videos bài giảng toán lớp 12">Videos bài giảng toán lớp 12</a></h3>
                <div class="txt-green">
                    <span class="icon icon-play"></span><span class="br-right">2 video bài học</span>
                    <span class="icon icon-pr"></span><span>Hơn 4500 bài tập thực hành</span>
                </div>
                <div class="txt-gv"><span class="icon icon-gv"></span><span>GV : <span class="f-bold">Trần Mạnh</span></span></div>
                <div class="f-small">Cử nhân ĐH Sư phạm HN - Khoa Toán</div>
            </div>
        </li>
    </ul>
</div>
@endsection