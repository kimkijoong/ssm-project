<?php
if($this->session->userdata('member_name')){
    $login_check = "1";
} else {
    $login_check = "0";
};

if($this->session->flashdata('message')){
    ?>
    <script>
        alert("<?=$this->session->flashdata('message')?>");
    </script>
<?}?>
<div class="modal fade pg-show-modal" id="modal_login" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Modal title</h4>
            </div>
            <div class="modal-body">
                <div class="panel-group" id="panels1">
                    <div class="panel panel-default">
                        <div class="panel-heading login_modal_title">
                            <h4 class="panel-title"> <a id="login_open_btn" data-toggle="collapse" data-parent="#panels1" href="#collapse1">LOGIN<br></a> </h4>
                        </div>
                        <div id="collapse1" class="panel-collapse collapse in">
                            <form action="/Member/member_login" method="POST" id="login_form" class="login_form">
                                <div class="form-group">
                                    <label class="control-label" for="formInput9">아이디</label>
                                    <input type="email" name="member_id" class="form-control login_id" id="formInput9" placeholder="아이디를 입력해주세요.">
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="formInput9">비밀번호
                                        <br>
                                    </label>
                                    <input type="password" name="member_pw" class="form-control login_pw" id="formInput9" placeholder="비밀번호를 입력해주세요.">
                                    <a id="join_open_btn" class="join_open_btn" href="#">회원가입</a> | <a id="pw_find_btn" class="pw_find_btn" href="#">비밀번호 찾기</a>
                                </div>
                                <button type="button" class="btn btn-primary login_btn">로그인</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">닫기</button>
                            </form>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading login_modal_title">
                            <h4 class="panel-title"> <a id="join_open_btn2" data-toggle="collapse" data-parent="#panels1" href="#collapse2">join</a> </h4>
                        </div>
                        <div id="collapse2" class="panel-collapse collapse">
                            <form action="/Member/member_join" method="POST" id="join_form" class="join_form">
                                <input type="hidden" class="form-control member_profile_img" id="formInput9" name="member_profile_img" value="NULL">
                                <div class="join_title_war">
                                    <h3>회원가입</h3>
                                </div>
                                <div class="form-group" >
                                    <label class="control-label" for="formInput9">E-MAIL
                                        <br>
                                    </label>
                                    <input type="email" class="form-control insert_id" id="formInput9" name="member_id" placeholder="아이디를 입력해주세요.">
                                    <span class="insert_id_text"></span>

                                </div>
                                <div class="form-group" >
                                    <label class="control-label" for="formInput9">비밀번호
                                        <br>
                                    </label>
                                    <input type="password" class="form-control insert_pw" name="member_pw" id="formInput9" placeholder="비밀번호를 입력해주세요.">
                                </div>
                                <div class="form-group" >
                                    <label class="control-label" for="formInput9">비밀번호 확인
                                        <br>
                                    </label>
                                    <input type="password" class="form-control insert_pw2" id="formInput9" placeholder="다시한번 비밀번호를 입력해주세요.">
                                    <span class="insert_pw_text"></span>
                                </div>
                                <div class="form-group" >
                                    <label class="control-label" for="formInput9">닉네임
                                        <br>
                                    </label>
                                    <input type="text" name="member_name" class="form-control insert_name" id="formInput9" placeholder="닉네임을 입력해주세요.">
                                    <span class="insert_name_text"></span>
                                </div>
                                <div class="form-group">
                                    <input type="checkbox"><span>개인정보 취급방침에 동의합니다.</span><sapn>[자세히보기]</sapn>
                                </div>
                                <button type="button" class="btn btn-primary join_btn">회원가입</button>
                                <button type="button" class="btn btn-default close_join_btn">취소</button>
                            </form>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading login_modal_title">
                            <h4 class="panel-title"> <a id="pw_find_open" data-toggle="collapse" data-parent="#panels1" href="#collapse3">비밀번호 찾기</a> </h4>
                        </div>
                        <div id="collapse3" class="panel-collapse collapse">
                            <form action="/Member/pw_change_send_mail" method="POST" id="pw_change_send_mail_form" class="pw_change_send_mail_form">
                                <div class="join_title_war">
                                    <h3>회원가입</h3>
                                </div>
                                <div class="form-group" >
                                    <label class="control-label" for="formInput9">E-MAIL
                                        <br>
                                    </label>
                                    <input type="text" class="form-control insert_id" id="formInput9" name="member_id" placeholder="아이디를 입력해주세요.">
                                    <span class="">가입때 사용한 E-MAIL을 입력해주세요.</span>

                                </div>
                                <div class="form-group" >
                                    <span>입력하신 메일로 임시 비밀번호가 전송됩니다. 임시 비밀번호로 로그인 후 비밀번호를 변경해주시기 바랍니다.</span>
                                </div>
                                <button type="submit" class="btn btn-primary change_pw_btn">임시비밀번호 받기</button>
                                <button type="button" class="btn btn-default close_join_btn">취소</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>
<div class="modal fade pg-show-modal" id="profile_modal" tabindex="1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                <h4 class="modal-title">프로필 이미지업로드</h4>
            </div>
            <form role="form" action="/Member/profile_upload" enctype="multipart/form-data" class="profile_img_upload_form" method="POST" >
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label" for="exampleInputFile">File input</label>

                        <input type="file" name="user_file" id="exampleInputFile">
                        <p class="help-block">Example block-level help text here.</p>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">업로드</button>
                    <button type="button" class="btn btn-default profile_close_btn" data-dismiss="modal">취소</button>
                </div>
            </form>
        </div>
    </div>
</div>
<header id="header-2" class="soft-scroll header-2">
    <nav class="main-nav navbar navbar-default navbar-static-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="/">
                    <img src="/static/lib/images/einheads_logo.png" class="brand-img img-responsive">
                </a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="nav-item active">
                        <a href="/">Home</a>
                    </li>
                    <li class="nav-item dropdown" >
                        <a class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false" href="#">Pages <i class="fa fa-angle-down"></i></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="/Boarder/boarder_list/2/0">카드형 게시판</a>
                            </li>
                            <li>
                                <a href="/Boarder/boarder_list/1/0">일반 게시판</a>
                            </li>
                        </ul>
                    </li>
                    <?php
                    if($login_check == "0"){
                        ?>
                        <li class="nav-item">
                            <a href="" data-target="#modal_login" data-toggle="modal">login</a>
                        </li>
                        <?php
                    } else {
                        ?>
                        <li class="nav-item dropdown" >
                            <a class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false" href="#"><?php echo $this->session->userdata('member_name')."님";?><!--<i class="fa fa-angle-down"></i>--></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="/Member/mypage">마이페이지</a>
                                </li>
                                <li class="nav-item">
                                    <a href="/Member/member_logout">logout</a>
                                </li>
                            </ul>
                        </li>

                        <?php
                    }
                    ?>


                    <!-- /.dropdown -->
                    <!--<li class="nav-item">
                        <a href="#">Contact</a>
                    </li>-->
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
</header>