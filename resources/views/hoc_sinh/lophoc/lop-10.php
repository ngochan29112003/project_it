@extends('hoc_sinh.master')
@section('contents')
<style>@font-face{font-family:RobotoCondensed-Regular;src:local("RobotoCondensed-Regular"),url(https://www.luyenthi123.com/static/fonts/RobotoCondensed-Regular.ttf) format("truetype")}@font-face{font-family:RobotoCondensed-Bold;src:local("RobotoCondensed-Bold"),url(https://www.luyenthi123.com/static/fonts/RobotoCondensed-Bold.ttf) format("truetype")}@font-face{font-family:Roboto-Regular;src:local("Roboto-Regular"),local("Roboto-Regular"),url(https://www.luyenthi123.com/static/fonts/Roboto-Regular.ttf) format("truetype")}@font-face{font-family:Roboto-Bold;src:local("Roboto-Bold"),local("Roboto-Bold"),url(https://www.luyenthi123.com/static/fonts/Roboto-Bold.ttf) format("truetype")}@font-face{font-family:Pacifico-Regular;src:local("Pacifico-Regular"),local("Pacifico-Regular"),url(https://www.luyenthi123.com/static/fonts/Pacifico-Regular.ttf) format("truetype")}*,::after,::before{box-sizing:border-box}html{line-height:1.15;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;-ms-overflow-style:scrollbar;-webkit-tap-highlight-color:transparent}@-ms-viewport{width:device-width}body{font-family:Roboto-Regular;font-size:15px;line-height:1.5;color:#3a4353;text-align:left;padding:0; margin:0px}h1,h2,h3,h4,strong,.f-bold{font-weight:400;font-family:Roboto-Bold}h1{font-size:22px}h1,h2,h3,h4{margin:10px 0}a{text-decoration:none;color:#474747;padding:0;margin:0}div,li,p,span,ul{padding:0;margin:0}li,ol,ul{list-style-type:none}table{border-collapse:collapse;border-spacing:0}.space10{width:100%;height:10px;clear:both}.header-left{float:left;position:relative;z-index:1}.header-left .m-icon{width:250px;height:82px;display:block}.top-head-cloud1{position:absolute;left:-100px;top:68px;width:169px;height:79px}.top-head-cloud2{position:absolute;right:-80px;top:60px;width:206px;height:101px}._showmemberac{width:200px;height:270px;position:absolute;border-radius:5px;-webkit-border-radius:5px;-moz-border-radius:5px;margin-top:-25px;display:none}._showmemberac::after{content:"";position:absolute;top:-20px;width:155px;right:5px;height:50px}._showmemberac::before{bottom:100%;left:73%;border:solid transparent;content:" ";height:0;width:0;position:absolute;pointer-events:none;border-color:rgba(136,183,213,0);border-bottom-color:#038441;border-width:5px}._showmemberac a{width:82%;clear:both;display:block;text-align:justify;font-family:Roboto-Regular;font-size:14px;color:#5c4600;background-position:top 11px left 12px;padding-left:35px;height:32px;line-height:32px;position:relative}._showmemberac a:after{background:#e5d191;content:"";position:absolute;height:1px;width:90%;left:5%}._showmemberac a:hover:after{background:#fff}._showmemberac a:hover{background-color:#fff}._showmemberac ._memwalltit:after{background:0 0;height:0;width:0}._showmemberac ._memwalltit:hover{color:#fff;background-color:#038441}._showmemberac a:last-child{border-bottom:none}._showmemberac ._memwalltit{background-color:#038441;color:#fff;margin:0;width:100%;padding:5px 10px;border-radius:5px 5px 0 0;-webkit-border-radius:5px 5px 0 0;-moz-border-radius:5px 5px 0 0;padding-left:18px}#act-del-hdn:before,._showmemberac ._membtt::before,._showmemberac ._memcard::before,._showmemberac ._memhb::before,._showmemberac ._meminfo::before,._showmemberac ._memmess::before,._showmemberac ._memout::before,._showmemberac ._memwall::before,.like_hd::before,.navigation_tree .nav_tree_links:before,.reply_hd::before{background-image:url(https://www.luyenthi123.com/static/image/icon_cate_2.png);position:relative;content:"";position:absolute;top:9px;left:6px}._showmemberac ._memhb::before{background-position:-262px -130px;width:16px;height:13px}._showmemberac ._memwall::before{background-position:-178px -176px;width:15px;height:18px}._showmemberac ._membtt::before{background-position:-306px -139px;width:16px;height:19px;top:7px}._showmemberac ._memmess::before{background-position:-142px -176px;width:16px;height:11px}._showmemberac ._memcard::before{background-position:-261px -164px;width:17px;height:13px}._showmemberac ._meminfo::before{background-position:-306px -181px;width:17px;height:19px}._showmemberac ._memout::before{background-position:-306px -218px;width:15px;height:18px;top:5px}#footer{margin:0 auto;position:relative;bottom:0;background:url(https://www.luyenthi123.com/static/image/home/footer.png) top center no-repeat #ffffe7;clear:both}#top-footer{width:1000px;height:48px;line-height:48px;margin:0 auto;font-weight:700;color:#ffcf8f}#top-footer a{color:#ffcf8f;font-weight:700}#center-footer{line-height:24px;width:1000px;padding-top:10px;margin:0 auto;}#center-footer .foo-title-class{font-family:Roboto-Bold;color:#d55;text-transform:uppercase}#center-footer .foo-list-class li a{color:#564d38;font-size:12px}.foo-list-class{float:left;width:240px}#bottom-footer{width:1000px;margin:0 auto;height:95px;padding-bottom:30px}#bottom-footer .b_logo,._box_user_r ._ttstar,._star,.box_member_top,.box_member_top .top_messenger.non::before,.box_member_top .top_messenger::before,.fb_icon,.icon_bh,.iconhd,.m-icon,.pvc_box_user_bh ._box_top ._info .ttht_hint,.social_foo .ct_icon,.vip_banner,.vip_user{background-image:url(https://www.luyenthi123.com/static/image/icon_cate_2.png)}#bottom-footer .b_logo{background-position:0 0;background-repeat:no-repeat;width:250px;height:82px;float:left}#bottom-footer .info_foo{width:540px;float:left;padding-left:55px;padding-right:55px}#bottom-footer .foo_text_info{font-size:11px;color:#bf9843;text-align:justify}#bottom-footer .foo_add{font-size:11px;color:#010101;text-align:justify}#bottom-footer .social_foo{position:absolute;right:20%;bottom:20%}.fb_icon{background-position:-193px -95px;float:right;margin-top:5px;width:31px;height:31px}.social_foo .ct_icon{background-position:-14px -94px;display:inline-block;width:164px;height:61px;position:relative;margin-left:0}.social_foo a{margin-left:20px}.box_section{width:790px;display:inline-block;margin-left:15px;vertical-align:top;border-right:1px solid #f5cac8}.box_sidebar{display:inline-block;height:auto;padding-left:10px;padding-right:0;width:260px}@keyframes bling{0%{background-position:0 3px}100%{background-position:0 -28px}}.box_member_top{border-radius:10px;background-position:0 -509px}.box_member_top .top_username:after{content:"";border:5px solid transparent;border-top:5px solid #a4c99a;position:absolute;top:5px;margin-left:40px}.box_member_top .top_messenger{animation:bling 1s infinite steps(2);color:grey;font-size:12px;display:inline-block;position:relative;padding-left:22px;position:absolute;bottom:5px;margin-left:10px}.box_member_top .top_messenger.non{position:relative;animation:none}.box_member_top .top_messenger.non::before,.box_member_top .top_messenger::before{content:"";left:0;top:3px;width:16px;height:11px;position:absolute}.box_member_top .top_messenger::before{background-position:-106px -176px}.box_member_top .top_messenger.non::before{background-position:-70px -176px}.box_member_top .top_messenger span{color:#d55;font-weight:700}.box_member_top .top_messenger.non span{color:#b7b7b7;font-weight:700}.box_card{font-size:12px;margin-top:10px;text-align:center;float:right}.box_card .link_napthe{font-size:12px;color:#d55}.box_card a{text-decoration:none;color:#474747;padding:5px}.box_card a:hover{text-decoration:underline}.box_side1{background-color:#fff}.vip_banner{background-position:0 -343px;width:250px;height:149px;padding-top:5px;display:block;margin:0 auto}.box_hoidap{width:250px;background-color:#fff;height:auto;padding-top:5px}.hoidapnhanh{margin:15px auto;margin-top:5px;text-align:justify;border-top:1px solid #ededed}.area_hd{border:1px solid #c2c2c2;height:55px;margin:15px 0;padding:12px 24px;resize:none;width:100%}#suggesstion-box{position:relative;z-index:1}#faq-suggestion-list{float:left;list-style:none;margin:0;padding:0;max-height:156px;overflow-x:hidden;overflow-y:auto;position:absolute;border:1px solid #ccc;width:248px}#faq-suggestion-list li{padding:10px;background:#fafafa;border-bottom:#f0f0f0 1px solid}#faq-suggestion-list li:hover{background:#f0f0f0}.btn_send_hoidap{border:none;background-color:#d55;min-width:95px;height:28px;color:#fff;border-radius:2px;text-align:center;line-height:27px;margin:0 auto;font-size:14px;cursor:pointer;-webkit-border-radius:2px;-moz-border-radius:2px;display:block;padding:0 30px;margin-top:10px;position:relative}.btn_send_hoidap:disabled{background-color:#474747}.btn_send_hoidap:active,.btn_send_hoidap:hover{box-shadow:0 0 5px 0 #0070e5}.btn_send_hoidap:active{top:2px}.btn_send_hoidap[disabled]:active,.btn_send_hoidap[disabled]:hover{box-shadow:none}.ques,.ques a{color:#d55}#act-del-hdn{border-radius:10px;position:relative;color:#333;cursor:pointer;padding:2px 20px}#act-del-hdn:before{background-position:-152px -217px;width:13px;height:15px;left:3px;top:1px}#act-del-hdn:hover{background-color:#d55;color:#fff;background-image:none}#act-spam-hdn{cursor:pointer;padding:2px 8px;color:#ff8b13}#act-spam-hdn:hover{border:1px solid #50a0a0;border-radius:10px;-webkit-border-radius:10px;-moz-border-radius:10px}.ctrl-hoidap{width:276px;margin:0 auto;padding-bottom:5px;text-align:center}.ctrl-hoidap a{font-size:14px;padding-right:5px}.ctrl-hoidap a:hover{text-decoration:underline}#hdn-error{color:#d55;width:90%;margin:5px auto;font-size:12px;text-align:justify;min-height:10px}#hdn-reply-error{color:#d55;margin:5px auto;font-size:12px;text-align:center}.ques{border-bottom:1px solid #ededed;padding:10px 0 5px 5px;position:relative}.vip_user{background-position:-10px -176px;display:inline-block;height:21px;position:absolute;width:40px}.username_hd{font-family:Arial;font-size:14px}.text_hoidap{color:#000;font-family:Arial;font-size:13px;margin:5px 0;padding-bottom:2px;word-wrap:break-word}.text_hoidap.time{color:#777;display:none}.control_hd{height:20px;font-family:Arial;font-size:12px;padding-top:8px;text-align:left}.like_hd{background-color:#eee;border-radius:10px;color:#afafaf;position:relative;padding:3px 10px 3px 20px;cursor:pointer;-webkit-border-radius:10px;-moz-border-radius:10px}.like_hd::before{background-position:-210px -194px;width:14px;height:15px;left:3px;top:1px}.like_hd:active,.like_hd:hover{border-radius:2px;background-color:#1fb1ef!important;color:#fff}.reply_hd{border-radius:10px;color:#333;padding:3px 10px 3px 30px;cursor:pointer;border:1px solid transparent;position:relative}.reply_hd::before{background-position:-148px -198px;width:18px;height:15px;left:3px;top:1px}.reply_hd:active,.reply_hd:hover{background-color:#ffeeae;border-radius:1px;color:#919191;-webkit-border-radius:1px;-moz-border-radius:1px;border-color:#ccc}.action_reply_hoidap{width:290px;left:-11px;background-color:#fff;height:auto;position:absolute;z-index:99999;border-radius:1px;margin-top:5px;padding:0;display:none;border:1px solid #dedede}.action_reply_hoidap.show{display:block}.hoidap_reply_head{background-color:#ffeeae;height:24px;position:relative}.hoidap_reply_head .fa{color:#868686;cursor:pointer;font-size:19px;position:absolute;right:5px;top:2px}.hoidap_reply_head .fa:active{top:4px}.box_hd_reply{padding:15px 15px 10px 15px;text-align:right;background-color:#f5f5f5;border-top:1px solid #eee}.box_hd_reply button{font-size:11px;display:inline-block;border:none;margin-right:20px;padding:4px 8px;cursor:pointer;color:#fff;width:70px}.box_hd_reply .cancel_hd_reply{background-color:#1fb1ef}.box_hd_reply .send_hd_reply{background-color:#d55;border-radius:2px;color:#fff;margin-top:4px;min-width:95px;padding:6px 10px;position:relative;margin-right:0;font-size:16px}.box_hd_reply .send_hd_reply:disabled{background-color:#4c4c4c}.box_hd_reply .area_hd_reply{width:236px;resize:none;margin:0;outline:0;font-family:inherit;font-size:inherit;padding:11px;border-color:#ddd}.hoidap_reply{overflow:auto;resize:vertical;padding:0;min-height:210px;max-height:300px}.hoidap_reply .hd_reply{padding:8px 15px;position:relative;border-bottom:1px solid #f5f3f5}.hd_reply .like_hd{background-color:#fff}.hd_reply .text_hoidap{text-align:justify;word-wrap:break-word}#act-del-rplhdn{cursor:pointer;padding:2px 8px;margin-left:5px}#act-del-rplhdn:hover{padding:2px 8px;border:1px solid #50a0a0;border-radius:10px;-webkit-border-radius:10px;-moz-border-radius:10px}.num_rep:active{color:#fff}.bottom_hd{width:220px;height:35px;margin:0 auto;font-size:14px;padding-bottom:10px}.new_hd{color:#333;background-color:#eee;width:75px;height:35px;text-align:center;line-height:34px;display:inline-block;padding-left:10px}.num_hd{width:45px;background-color:#eee;color:#333;display:inline-block;height:35px;line-height:34px;text-align:center}.old_hd{background-color:#eee;color:#333;display:inline-block;width:80px;text-align:center;height:34px;line-height:35px}.bottom_hd a:active{color:#ffa146}.navigation_tree{background-color:#fff;padding:10px 40px}.navigation_tree a{margin-right:9px}.navigation_tree a:hover{text-decoration:underline}.navigation_tree .nav_tree_links{color:#494949;display:inline-block;position:relative;padding-right:10px}.navigation_tree .nav_tree_links_ac{color:#e23f3d}.navigation_tree .nav_tree_links:before{background-position:-243px -216px;width:7px;height:11px;top:6px;right:-5px;left:auto}#main-menu{max-width:1114px;height:61px;margin:0 auto;background-color:#f14d41;border-radius:50px;-webkit-border-radius:50px;-moz-border-radius:50px;position:relative;z-index:998;display:block}.navigation_menu{width:1099px;height:48px;color:#fff;margin:0 auto;border:1px dashed #f39992;position:relative;top:6px;border-radius:50px;-webkit-border-radius:50px;-moz-border-radius:50px}.nav_menu,.nav_menu li,.nav_menu ul,.nav_menu>a{line-height:32px}.nav_menu{height:100%;display:block;border-radius:5px;max-width:1030px;margin:0 auto;text-transform:uppercase;-webkit-border-radius:5px;-moz-border-radius:5px}.nav_menu ul li{cursor:pointer;float:left;position:relative;padding-right:5px;margin-right:6px;font-family:Arial;font-size:15px}.nav_menu>ul>li>a{outline:0;display:block;position:relative;text-align:center;text-decoration:none;color:#fff;padding:8px 20px}.nav_menu ul li.p-has-sub>a::before{content:"";position:absolute;top:21px;right:4px;border:4px solid transparent;border-top:6px solid #fff}.nav_menu ul li.p-has-sub:hover>a::after{content:"";position:absolute;top:35px;width:140px;right:5px;height:50px}.nav_menu ul li.has-sub:hover>div,.nav_menu ul li.p-has-sub:hover ul{display:block}.nav_menu ul li div,.nav_menu ul li ul{display:none;width:auto;position:absolute;top:56px;background:#fff;z-index:999;padding:10px 0;padding-top:0;box-shadow:1px 1px 2px #c4c8ca;-moz-box-shadow:1px 1px 2px #c4c8ca;-webkit-box-shadow:1px 1px 2px #c4c8ca}.nav_menu ul li ul{width:170px;background-color:#ec5c51;-webkit-border-radius:15px;-moz-border-radius:15px;border-radius:15px;padding:15px 10px;margin-left:-35px}.nav_menu ul ul ul{position:absolute}.nav_menu ul ul li:hover ul{left:100%;top:-10px;border-radius:5px;-webkit-border-radius:5px;-moz-border-radius:5px}.nav_menu ul li ul li{display:block;list-style:inside none;margin:0 auto;padding:0;width:148px;height:37px;line-height:37px;background-color:#d23327;margin-bottom:5px;-webkit-border-radius:15px;-moz-border-radius:15px;border-radius:15px}.nav_menu ul li>ul li:hover{background-color:#ffb770}.nav_menu ul li>ul li:hover a{color:#000}.nav_menu ul li>ul li a{display:block;color:#fff;padding-left:15px;text-transform:none;font-size:16px}.nav_menu>ul>li.has-sub>a:hover:before{border-top:8px solid #d55}.clear{clear:both}.nav_menu li span{display:inline-block;vertical-align:middle}.nav_menu li span.m-icon{margin-right:10px}li.ic_lophoc .m-icon{width:28px;height:24px;background-position:-103px -217px}li.ic_kiemtra .m-icon{width:25px;height:28px;background-position:-306px -10px}li.ic_thidau .m-icon{width:28px;height:25px;background-position:-55px -217px}li.ic_toanvui .m-icon{width:28px;height:25px;background-position:-305px -58px}li.ic_bachocnhi .m-icon{width:24px;height:30px;background-position:-262px -10px}li.ic_huongdan .m-icon{width:26px;height:25px;background-position:-10px -264px}#open_quick_ques_ans{width:100%;height:42px;font-size:14px;cursor:pointer;border-radius:0 0 5px 5px;color:#117dad;position:relative;background-color:#c5edff;background-repeat:no-repeat;background-position:-91px -295px}#open_quick_ques_ans span{display:block;padding-left:54px;line-height:44px}.title_hoidap{width:100%;height:46px;border-radius:5px 5px 0 0;cursor:pointer;background-color:#e1f5fe;background-repeat:no-repeat;background-position:-90px -246px;position:relative}.title_hoidap:after{top:18px;right:1px;border:solid transparent;content:" ";height:0;width:0;position:absolute;pointer-events:none;border-left-color:#dd5454;border-width:5px}.title_hoidap.show:after{top:20px;right:9px;border:solid transparent;content:" ";height:0;width:0;position:absolute;pointer-events:none;border-top-color:#dd5454;border-width:5px}#box_quick_ques_ans{display:none}#btn_close_quick_ques_ans{width:100%;height:34px;border-radius:0 0 5px 5px;cursor:pointer;text-align:center;position:relative;background-color:#e1f5fe;line-height:34px;color:#253942;font-size:14px;margin-top:20px}#btn_close_quick_ques_ans:after{top:11px;right:85px;border:solid transparent;content:" ";height:0;width:0;position:absolute;pointer-events:none;border-bottom-color:#253942;border-width:5px}._boxcontent{background-color:#fff;border-radius:5px;box-shadow:0 1px 8px 0 #a4b594;height:auto;padding:10px 0 20px;width:100%}.pvc_content_list{position:relative;width:780px}.pvc_content_box_list{margin-top:15px;padding-left:14px}.pvc_content_box_list_left{width:50%;border-right:1px solid #ebebeb;float:left}.pvc_content_box_list_left .pvc_content_item{margin-right:16px}.pvc_content_box_list_right{float:left;width:49%}.pvc_content_box_list_right .pvc_content_item{margin-left:16px}.icon_bh{width:5px;height:5px;background-position:-232px -146px;display:inline-block;vertical-align:top;margin-top:10px;margin-right:10px}.have_baigiang .icon_bh{background-position:-217px -217px;display:inline-block;width:12px;height:9px;vertical-align:top;margin-top:7px;margin-right:5px}.pvc_content_list ._pvctit1{border-bottom:1px solid #cecece;color:#54a9d8;float:left;font-family:Roboto-Bold;font-size:21px;margin-bottom:10px;margin-left:17px;text-transform:uppercase}.pvc_content_list ._pvctitdetail{clear:left;color:#8c8c8c;float:left;font-size:14px;margin-left:17px}.pvc_content_list ._pvctitdetail ._bold{font-weight:700;color:#404040}.pvc_content_list ._pvctitdetail ._bold1{font-weight:700;color:#656565}.pvc_content_item{border-bottom:1px solid #cecece;display:inline-block}.pvc_content_item:last-child{border-bottom:none}.pvc_content_item ._pvctit2{color:#000;font-size:16px;font-family:Arial;font-weight:700;margin-bottom:10px;margin-top:14px}.pvc_ul_item li a{font-size:17px;color:#323333;font-family:Arial;flex:1;display:inline-block}.pvc_ul_item li a.active,.pvc_ul_item li a:hover{color:#d55}.pvc_ul_item li{padding-bottom:10px;flex:1;display:flex}.pvc_ul_item li._titlephan{background:0 0;padding-left:0}.pvc_ul_item li._titlephan a{color:#000;cursor:auto}.pvc_ul_item li._titlephan .nolink{font-family:Roboto-Bold;font-size:16px}.pvc_ul_item li._titlephan ._pvc_ptb{display:none}._titlephan .icon_bh{background:0 0;width:0;margin-right:0;margin-left:-10px}ul.pvc_ul_item{padding-left:10px}._pvc_ptb{color:#fff;border-radius:25px;-webkit-border-radius:25px;-moz-border-radius:25px;width:36px;height:36px;line-height:36px;text-align:center}._pvc_ptb._non{width:30px;height:30px;line-height:30px}._non{background-color:#ffbd7d!important}._5{background-color:#e43d44!important}._6{background-color:#fff981!important;color:grey!important;border:1px solid #cecece}._7{background-color:#feffe8!important;color:grey!important;border:1px solid #cecece}._8{background-color:#def9b4!important;color:#58960f!important;border:1px solid #cecece}._9{background-color:#afd860!important}._10{background-color:#599712!important}.pvc_sb_bxh{clear:both;width:250px;margin:0 auto 10px}.pvc_sb_bxh ._title{background-color:#3897ce;color:#fff;font-size:17px;font-family:Roboto-Bold;padding:10px 0;text-align:center;text-transform:uppercase;width:100%}.more_rank{clear:both}.pvc_sb_bxh .more_rank a{font-size: 18px;border-bottom: 1px solid #9c9797;font-family: Roboto-Bold;}.pvc_sb_bxh .mem_rank{margin:10px 0;color:#212121;font-family:Roboto-Bold}.pvc_sb_bxh ._content,.pvc_sb_bxh ._content_mem_rank{margin-bottom:25px}.pvc_sb_bxh ._content_mem_rank li{background-color:#fffae9;box-shadow:2px 2px 3px #ddd;clear:both;height:60px;margin-top:5px;position:relative}.pvc_sb_bxh ._content_mem_rank ._stt{background-color:#3897ce;border-radius:25px;color:#fff;float:left;font-family:Roboto-Bold;line-height:25px;padding:0 8px;position:absolute;z-index:1;top:4px;left:5px}.pvc_sb_bxh ._content_mem_rank ._info{left:20px;margin:6px 0 6px 6px;position:absolute;width:165px;border-right:1px solid #fee4e6}.pvc_sb_bxh ._content_mem_rank ._point{color:#e62940;font-family:Roboto-Bold;height:60px;line-height:60px;position:absolute;right:0;width:50px}.pvc_sb_bxh .level_filter{display:inline-block}.pvc_sb_bxh .level_filter .star_{background-repeat:no-repeat;border-radius:25px;display:inline-block;height:14px;margin:10px 3px;padding:8px}.pvc_sb_bxh .level_filter .star_.active,.pvc_sb_bxh .level_filter .star_:hover{background-color:#f26d7d}.pvc_sb_bxh ._content li{margin-top:5px;box-shadow:2px 2px 3px #ddd;clear:both;height:60px;background-color:#fff}.pvc_sb_bxh ._content li.top{background-color:#fff2f2}.pvc_sb_bxh ._content ._stt{background-color:#3897ce;color:#fff;float:left;height:60px;line-height:60px;padding:0 8px;font-family:Roboto-Bold}.pvc_sb_bxh ._content ._info{border-right:1px solid #fee4e6;margin:6px 0 6px 6px;float:left;width:165px}.pvc_sb_bxh ._info a img{border-radius:50px;clear:both;height:38px;width:38px;display:inline-block}.pvc_sb_bxh ._detail ._name a{color:#353535;font-family:Arial;font-size:13px}.pvc_sb_bxh ._detail ._name a:hover{color:#d55}.pvc_sb_bxh ._hd{display:inline-block;height:25px;line-height:25px;margin:2px 8px 2px 0;width:54px}.pvc_sb_bxh ._hd span,.pvc_sb_bxh ._tt span{display:inline-block;font-size:13px;margin-left:3px;vertical-align:middle}.pvc_sb_bxh ._name{text-transform: lowercase;}.pvc_sb_bxh ._hd .icon_hd{width:15px;height:16px;background-position:-262px -61px}.pvc_sb_bxh ._tt{display:inline-block;height:25px;line-height:25px;margin:2px 0;width:44px}.pvc_sb_bxh ._tt .icon_tt{width:14px;height:11px;background-position:-214px -176px;display:inline-block}.pvc_sb_bxh ._info ._detail{vertical-align:top;margin-left:5px;display:inline-block}.pvc_sb_bxh ._info ._detail .name{width: 110px;overflow-y: hidden; height: 22px;}.pvc_sb_bxh ._content ._point{color:#e62940;display:inline-block;font-family:Roboto-Bold;width:50px;height:60px;font-size:14px;line-height:60px;text-align:center}.pvc_sb_bxh ._content_mem_rank a{color:#3680a0;font-family:Arial;font-size:13px}.pvc_box_user_bh{margin:15px 60px 10px 25px;padding-bottom:10px;padding-top:10px;border-bottom:1px solid #d8d8d8}._box_user_r{color:#212121;display:inline-block;font-family:OpenSans-Regular,sans-serif;font-size:15px;line-height:24px;margin-left:0;vertical-align:top;border-left:3px solid #d55;padding-left:10px}._box_user_r .per_complete{color:#74b358;font-weight:700}._box_user_r .point_tbc{color:#d55;font-weight:700}._box_user_r ._ttht{color:#555}._box_user_r ._tttb{color:#d55}._box_user_r ._box_bottom a{color:#3493bc}._box_user_r ._bhdanghoc span{color:#9d9d9d}._box_user_r ._ttstar{width:14px;height:15px;background-position:-262px -96px;margin-left:2px;display:inline-block}._box_user_r ._ttstar._s3{width:42px}._box_user_r ._ttstar._s2{width:28px}._box_user_r ._ttstar._s1{width:14px}.pvc_box_user_bh ._box_top ._info .progress_ttht{position:relative;width:148px;height:10px;display:inline-block;background-color:#ddd}.pvc_box_user_bh ._box_top ._info .ttht_hint{width:16px;height:16px;background-position:-262px -60px;display:inline-block}.pvc_box_user_bh ._box_top ._info .memBar{position:absolute;width:0%;height:100%;background-color:#4caf50}.pvc_box_user_bh ._box_top ._info ._ttht{color:#555;display:inline-block}.pvc_box_user_bh ._box_top ._point_tb{display:inline-block;text-transform:uppercase;margin-left:10px;width:195px}.pvc_box_user_bh ._box_top .p_star1{display:inline-block;margin:0 10px 0 0}.pvc_box_user_bh ._box_top .p_star{display:inline-block;margin:0 10px;background-color:#fff;padding:0 10px;color:#888;border-radius:20px}.pvc_box_user_bh ._box_top .p_100{display:inline-block;margin:0 10px;padding:0 10px;color:#888}.pvc_box_user_bh ._box_top ._info{border-right:1px solid #c1dda9;float:left;width:465px}.pvc_box_user_bh ._box_top ._point_tb ._detail{background-color:#d55;border-radius:50%;color:#fff;display:block;height:50px;line-height:50px;margin:8px auto;width:50px}.pvc_box_user_bh ._box_top ._point_tb{display:inline-block;text-align:center;text-transform:uppercase;width:145px}.pvc_box_user_bh ._box_top ._red{font-weight:700;color:#d55}.pvc_box_user_bh ._box_bottom{padding-top:10px;line-height:28px}.intro_monhoc{padding:5px 60px 5px 25px;text-align:justify;color:#313131}.intro_monhoc a{text-decoration:underline}.baigiang-banner div{margin-left:25px;position:relative}#txt_lecture{color:#fff;font-family:Pacifico-Regular;font-size:22px;position:absolute;left:116px;top:40px;width:692px}.icon-play{width:26px;height:27px;background-position:-10px -217px;display:inline-block;margin-top:9px;margin-right:9px;vertical-align:text-top}.box_subject_more{margin-top:15px}.box_subject_more .box_subject_item{color:#fff;display:inline-block;background-color:#56a03c;padding:10px 15px;border-radius:3px;width:338px}.box_subject_more .box_subject_item.gbt{background-color:#56a03c}.box_subject_more .box_subject_item.kt{background-color:#2c757d}.box_subject_more a:nth-child(odd){margin-left:25px;margin-right:12px}.box_subject_more .box_subject_item ._title{font-family:Roboto-Bold;font-size:16px}.box_subject_more .box_subject_item ._intro{font-size:11px;opacity:.8}.icon-go-to-top{background-position:-223px -702px;width:50px;height:50px;position:fixed;bottom:4px;right:21px}.error_hd{cursor:pointer;background-image:url(https://www.luyenthi123.com/static/image/icon_error.png);background-repeat:no-repeat;background-position:center;width:22px;height:15px;display:inline-block;position:absolute}.act-report-hdn span{visibility:hidden}._box{margin:30px 32px 10px 15px;text-align:center}._box a{display:inline-block;margin:0 auto;width:31%;vertical-align:top;position:relative}._box ._bt_prefix{width:214px;border-radius:15px;border:3px solid #fff;display:inline-block;vertical-align:top}._box ._bt_prefix:hover{border:3px solid #c2deeb}._box ._headinfo{background-color:#3493bc;border-radius:13px 13px 0 0;padding-top:12px;text-align:center;color:#fff;display:block}._headinfo h3{text-transform:uppercase;font-size:14px;height:50px}._ceninfo{width:208px;height:207px;background-position:-10px -146px;display:block}._ceninfo ._icon_hatde{display:block;padding-top:20px;height:130px;width:100%}._box ._headinfo p{text-transform:uppercase;color:#fff200}._headinfo h2._no{font-size:13px;line-height:145%}._box ._bt_prefix ._fooinfo{height:128px;border:1px solid #d6dfd4;background-color:#fafafa;text-align:justify;padding:0 15px;padding-top:5px;border-radius:0 0 13px 13px;display:block;font-size:14px}._fooinfo p{margin-bottom:6px}._fooinfo_b span{color:#d55}._box ._bt_prefix._2s ._headinfo{background-color:#d55}._box ._bt_prefix._3s ._headinfo{background-color:#ee7600}._box_heso .heso_item{display:inline-block;margin:0 auto;width:32%;vertical-align:top;position:relative;font-size:14px}.bh_tooltip{width:16px;height:16px;background-position:-238px -146px;display:inline-block;vertical-align:middle}.bh_tooltip:hover .bh_tooltiptext{visibility:visible}.bh_tooltip .bh_tooltiptext{background-color:#000;border-radius:6px;bottom:150%;color:#fff;margin-right:-35px;padding:10px 20px;position:absolute;right:50%;text-align:justify;visibility:hidden;width:196px;z-index:1}._box_heso{text-align:center;margin-bottom:20px;padding:0 42px 10px 15px}.bh_tooltip .bh_tooltiptext::after{content:"";position:absolute;top:100%;left:50%;margin-left:78px;border-width:5px;border-style:solid;border-color:#000 transparent transparent transparent}._star{background:-283px -467px;display:inline-block;width:24px;height:24px;margin-top:5px}._hd .m-icon{background-position:-263px -61px;width:14px;height:14px}._tt .m-icon{background-position:-214px -177px;width:14px;height:14px}.space5{width:100%;height:5px;clear:both}.box_member_top{width:211px;height:48px;float:right;position:relative}#header{width:1000px;height:100px;margin:0 auto;padding-top:15px;position:relative}.wrapper{background-image:linear-gradient(to bottom,#abe6e2,#ddf6d0);background-color:#e7f8e9}.header-right{float:right;position:relative;z-index:9999}.box_member_top .top_avatar img{width:48px;height:48px;border-radius:50%}.box_member_top .top_username{font-weight:700;color:#d55;font-size:14px;display:inline-block;position:absolute;width:65%;margin-left:10px;top:4px}.body_content{width:1100px;margin:0 auto;padding-bottom:30px;margin-top:20px}#page_top .btn-login, #page_top .btn-register{display: inline-block;width: 150px;height: 40px;text-align: center;line-height: 39px;font-weight: 700;font-size: .9rem;background-position: -187px -628px;}#page_top .btn-login {background-position: -188px -574px;color: #fff;}#page_top .link-top {margin-bottom: 10px;}.header-top-link{font-size: 13px;text-align: center;margin-bottom: 10px;}.box_class_new{background-color:#fff;margin:15px 0;margin-left:25px}.box_class_new .box_class_title{margin-top:30px;margin-bottom:24px;font-size:20px;font-family:Roboto-Bold;text-transform:uppercase;color:#e24d42}.box_class_new ._title{color:#2e2e2e;font-family:Roboto-Bold;font-size:20px;margin:10px}.box_class_new ._intro{font-size:14px;text-align:justify;margin:10px}.box_class_new ._item_class_new{vertical-align:top;position:relative;box-shadow:3px 0 8px rgba(0,0,0,.4);display:inline-block;height:122px;width:360px;margin-bottom:20px;margin-right:20px;border-radius:5px;background-color:#fff}
        </style> 
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        LỚP 10
                    </h2>
                </div>
            </div>
            <div class="container banner">
	<a href ="https://www.tienganh123.com" target="_blank" rel="nofollow" title="Học tiếng Anh online - Học tiếng Anh trên mạng - Học tiếng Anh trực tuyến">
    <picture>
        <source type="image/webp" srcset="/static/image/banner/banner-pc4.webp">
        <source type="image/png" srcset="/static/image/banner/banner-pc4.png">
        <img src="/static/image/banner/banner-pc4.png" alt="Học tập trực tuyến - Nâng cao kiến thức">
    </picture>
	</a>
</div>
<div class="body_content">    
    <div class="_boxcontent">
        <div class="navigation_tree"><a class="nav_tree_links" href="https://www.luyenthi123.com/" title="Luyện Thi 123">Home</a><a href="#" title="Lớp 10" class="nav_tree_links_ac">Lớp 10</a></div>
        
        <div class="box_section">
            <div class="box_class_new">
                
                <h3 class="box_class_title">Môn Toán lớp 10 - Sách Kết nối tri thức</h3>
                <!-- BOX LUYEN TAP -->
                <a href="https://www.luyenthi123.com/toan-lop-10-sach-kntt" title="Bài luyện tập Toán lớp 10 - Sách Kết nối tri thức">
                    <div class="_item_class_new lt">
                        <div class="_title">Bài luyện tập Toán lớp 10 - Sách Kết nối tri thức</div>
                        <div class="_intro">Hơn 14.200 bài luyện tập Toán lớp 10 - Sách Kết nối tri thức từ dễ đến khó tương ứng với các bài học trong SGK để học sinh luyện tập</div>
                    </div>
                </a>
                <!-- BOX GIAI BAI TAP -->
                

                <!-- BOX VIDEO -->
                

                <!-- BOX KIEM TRA -->
                

                
                
                <h3 class="box_class_title">Môn Toán lớp 10</h3>
                <!-- BOX LUYEN TAP -->
                <a href="https://www.luyenthi123.com/toan-lop-10" title="Bài luyện tập Toán lớp 10">
                    <div class="_item_class_new lt">
                        <div class="_title">Bài luyện tập Toán lớp 10</div>
                        <div class="_intro">Hơn 14.200 bài luyện tập Toán lớp 10 từ dễ đến khó tương ứng với các bài học trong SGK để học sinh luyện tập</div>
                    </div>
                </a>
                <!-- BOX GIAI BAI TAP -->
                
                <a href="https://www.chuabaitap.com/giai-bai-tap-sgk-toan-10" title="Giải bài tập SGK Toán 10" target="_blank">
                    <div class="_item_class_new gbt">
                        <div class="_title">Giải bài tập SGK Toán 10</div>
                        <div class="_intro">Giải bài tập SGK môn Toán lớp 10 – Hướng dẫn giải chi tiết bài tập SGK môn Toán lớp 10 đầy đủ, chính xác và bám sát chương trình SGK trên lớp.</div>
                    </div>
                </a>
                

                <!-- BOX VIDEO -->
                
                <a href="https://www.luyenthi123.com/bai-giang/toan-lop-10" title="Video bài giảng Toán lớp 10">
                    <div class="_item_class_new video">
                        <div class="_title">Video bài giảng Toán lớp 10</div>
                        <div class="_intro">Bộ video đầy đủ các bài học trên lớp được trình bày ngắn gọn, súc tích và dễ hiểu giúp các em củng cố lại kiến thức Toán lớp 10</div>
                    </div>
                </a>
                

                <!-- BOX KIEM TRA -->
                
                <a href="https://www.luyenthi123.com/de-kiem-tra-toan-lop-10" title="Đề kiểm tra Toán lớp 10">
                    <div class="_item_class_new kt">
                        <div class="_title">Đề kiểm tra Toán lớp 10</div>
                        <div class="_intro">Đề kiểm tra 15 phút, 1 tiết môn Toán lớp 10 giúp HS kiểm tra lại kiến thức đã học</div>
                    </div>
                </a>
                

                
                
                <h3 class="box_class_title">Môn Vật lý 10</h3>
                <!-- BOX LUYEN TAP -->
                <a href="https://www.luyenthi123.com/vat-ly-10" title="Bài luyện tập Vật lý 10">
                    <div class="_item_class_new lt">
                        <div class="_title">Bài luyện tập Vật lý 10</div>
                        <div class="_intro">Hơn 1.250 bài luyện tập Vật lý 10 từ dễ đến khó với đầy đủ các bài học trong SGK để học sinh luyện tập</div>
                    </div>
                </a>
                <!-- BOX GIAI BAI TAP -->
                

                <!-- BOX VIDEO -->
                

                <!-- BOX KIEM TRA -->
                

                
                
                <h3 class="box_class_title">Môn Vật Lý 10 (sách cũ)</h3>
                <!-- BOX LUYEN TAP -->
                <a href="https://www.luyenthi123.com/vat-ly-10-sach-cu" title="Bài luyện tập Vật Lý 10 (sách cũ)">
                    <div class="_item_class_new lt">
                        <div class="_title">Bài luyện tập Vật Lý 10 (sách cũ)</div>
                        <div class="_intro">Hơn 1.250 bài luyện tập Vật Lý 10 (sách cũ) từ dễ đến khó với đầy đủ các bài học trong SGK để học sinh luyện tập</div>
                    </div>
                </a>
                <!-- BOX GIAI BAI TAP -->
                
                <a href="https://www.chuabaitap.com/giai-bai-tap-sgk-vat-ly-10" title="Giải bài tập SGK Vật lý 10" target="_blank">
                    <div class="_item_class_new gbt">
                        <div class="_title">Giải bài tập SGK Vật lý 10</div>
                        <div class="_intro">Hướng dẫn giải chi tiết bài tập SGK môn vật lý lớp 10 đầy đủ, chính xác và bám sát chương trình SGK trên lớp.</div>
                    </div>
                </a>
                

                <!-- BOX VIDEO -->
                

                <!-- BOX KIEM TRA -->
                

                
                
                <h3 class="box_class_title">Môn Hóa học 10</h3>
                <!-- BOX LUYEN TAP -->
                <a href="https://www.luyenthi123.com/hoa-hoc-10" title="Bài luyện tập Hóa học 10">
                    <div class="_item_class_new lt">
                        <div class="_title">Bài luyện tập Hóa học 10</div>
                        <div class="_intro">Hơn 1.250 bài luyện tập Hóa học 10 từ dễ đến khó với đầy đủ các bài học trong SGK để học sinh luyện tập</div>
                    </div>
                </a>
                <!-- BOX GIAI BAI TAP -->
                

                <!-- BOX VIDEO -->
                

                <!-- BOX KIEM TRA -->
                

                
                
                <h3 class="box_class_title">Môn Hóa Học 10 (Sách cũ)</h3>
                <!-- BOX LUYEN TAP -->
                <a href="https://www.luyenthi123.com/hoa-hoc-10-sach-cu" title="Bài luyện tập Hóa Học 10 (Sách cũ)">
                    <div class="_item_class_new lt">
                        <div class="_title">Bài luyện tập Hóa Học 10 (Sách cũ)</div>
                        <div class="_intro">Hơn 1.250 bài luyện tập Hóa Học 10 (Sách cũ) từ dễ đến khó với đầy đủ các bài học trong SGK để học sinh luyện tập</div>
                    </div>
                </a>
                <!-- BOX GIAI BAI TAP -->
                
                <a href="https://www.chuabaitap.com/giai-bai-tap-sgk-hoa-hoc-10" title="Giải bài tập SGK Hóa học 10" target="_blank">
                    <div class="_item_class_new gbt">
                        <div class="_title">Giải bài tập SGK Hóa học 10</div>
                        <div class="_intro">Hướng dẫn giải chi tiết bài tập SGK môn Hóa học lớp 10 đầy đủ, chính xác và bám sát chương trình SGK trên lớp</div>
                    </div>
                </a>
                

                <!-- BOX VIDEO -->
                

                <!-- BOX KIEM TRA -->
                

                
                
                <h3 class="box_class_title">Môn Địa lí lớp 10</h3>
                <!-- BOX LUYEN TAP -->
                <a href="https://www.luyenthi123.com/dia-li-10" title="Bài luyện tập Địa lí lớp 10">
                    <div class="_item_class_new lt">
                        <div class="_title">Bài luyện tập Địa lí lớp 10</div>
                        <div class="_intro">Hơn 1.250 bài luyện tập Địa lí lớp 10 từ dễ đến khó với đầy đủ các bài học trong SGK để học sinh luyện tập</div>
                    </div>
                </a>
                <!-- BOX GIAI BAI TAP -->
                
                <a href="https://www.chuabaitap.com/giai-bai-tap-sgk-dia-ly-10" title="Giải bài tập sgk môn Địa lí lớp 10" target="_blank">
                    <div class="_item_class_new gbt">
                        <div class="_title">Giải bài tập sgk môn Địa lí lớp 10</div>
                        <div class="_intro">Giải bài tập SGK Địa lí lớp 10 – Hướng dẫn giải chi tiết bài tập SGK Địa lí lớp 10 đầy đủ, chính xác</div>
                    </div>
                </a>
                

                <!-- BOX VIDEO -->
                

                <!-- BOX KIEM TRA -->
                

                
                
                <h3 class="box_class_title">Môn Sinh học 10</h3>
                <!-- BOX LUYEN TAP -->
                <a href="https://www.luyenthi123.com/sinh-hoc-10" title="Bài luyện tập Sinh học 10">
                    <div class="_item_class_new lt">
                        <div class="_title">Bài luyện tập Sinh học 10</div>
                        <div class="_intro">Hơn 1.250 bài luyện tập Sinh học 10 từ dễ đến khó với đầy đủ các bài học trong SGK để học sinh luyện tập</div>
                    </div>
                </a>
                <!-- BOX GIAI BAI TAP -->
                
                <a href="https://www.chuabaitap.com/giai-bai-tap-sgk-sinh-hoc-10" title="Giải bài tập sgk Sinh học 10" target="_blank">
                    <div class="_item_class_new gbt">
                        <div class="_title">Giải bài tập sgk Sinh học 10</div>
                        <div class="_intro">Giải bài tập SGK Sinh học lớp 10 – Hướng dẫn giải chi tiết bài tập SGK Sinh học lớp 10 đầy đủ, chính xác</div>
                    </div>
                </a>
                

                <!-- BOX VIDEO -->
                

                <!-- BOX KIEM TRA -->
                

                
                
                <h3 class="box_class_title">Môn Lịch sử lớp 10</h3>
                <!-- BOX LUYEN TAP -->
                <a href="https://www.luyenthi123.com/lich-su-10" title="Bài luyện tập Lịch sử lớp 10">
                    <div class="_item_class_new lt">
                        <div class="_title">Bài luyện tập Lịch sử lớp 10</div>
                        <div class="_intro">Hơn 1.250 bài luyện tập Lịch sử lớp 10 từ dễ đến khó với đầy đủ các bài học trong SGK để học sinh luyện tập</div>
                    </div>
                </a>
                <!-- BOX GIAI BAI TAP -->
                
                <a href="https://www.chuabaitap.com/giai-bai-tap-sgk-lich-su-10" title="Giải bài tập sgk Lịch sử 10" target="_blank">
                    <div class="_item_class_new gbt">
                        <div class="_title">Giải bài tập sgk Lịch sử 10</div>
                        <div class="_intro">Giải bài tập SGK Lịch sử lớp 10 – Hướng dẫn giải chi tiết bài tập SGK Lịch sử lớp 10 đầy đủ, chính xác</div>
                    </div>
                </a>
                

                <!-- BOX VIDEO -->
                

                <!-- BOX KIEM TRA -->
                

                
                
                
            </div>
        </div>
    <br />
</div>


<!--JS CHO BANG VANG THANG-->
<!--<script src="http://dev.luyenthi123.com/static/js/bjqs.min.js"></script>
<script>
                jQuery(document).ready(function ($) {
                    // =========== parse slider ==========
                    $('._renslider').each(function (i, e) {
                        $(this).bjqs({
                            animtype: 'slide',
                            height: $(this).height(),
                            width: $(this).width(),
                            automatic: false,
                            responsive: false,
                            randomstart: false
                        });
                    });
                });
</script>-->

    </div>
</div>
<style>.box_class_new ._item_class_new{height: 170px !important}</style>
</div>              
<!-- thong ke trang-->
@endsection

@section('scripts')
<script src="static/js/jquery.min.js"></script>
<script type="text/javascript">            
    var l = window.location;
    var base_urlroot = l.protocol + "//" + l.host + "/";           
    var data_notification_gt = false;
    const badWord = [];
</script>
<script>
	(function (i, s, o, g, r, a, m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	(i[r].q=i[r].q||[]).push(arguments)}, i[r].l = 1 * new Date();
	a = s.createElement(o),
			m = s.getElementsByTagName(o)[0]; a.async = 1; a.src = g; m.parentNode.insertBefore(a, m)
	})(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');
			ga('create', 'UA-81628303-1', 'auto');
	ga('send', 'pageview');
</script>  			
<script type="text/javascript">
$(document).ready(function(){
	if($('.top_username').length ==1){
		var num_mess = $('.top_messenger span').text();
		if (num_mess == 0) {
			$('.top_messenger').addClass('non');
		}
		// === sub - mem ===
		$('.top_username').mouseover(function () {
			$('._showmemberac').show();
		});
		$('._showmemberac').mouseleave(function () {
			$('._showmemberac').hide();
		});
		//log out
		$('a._memout').on('click', function () {
			if (confirm('Bạn có chắc chắn muốn thoát tài khoản!')) {
				$.post(base_urlroot + 'login/out', function (a) {
					if (a == 1) {
						//alert('Đăng xuất thành công!');
						window.location.assign(base_urlroot);
					}
				});
			} else
				return false;
		});
	}
});
function show_napthe() {
	window.location.href = base_urlroot + "nap-the.html";
}
</script>
@endsection