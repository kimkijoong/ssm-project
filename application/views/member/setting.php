<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <title>But: Topic-List</title>
    <?php include_once("./application/views/include/style/style.php") ?>
    <link rel="stylesheet" type="text/css" href="/static/css/view.css">
</head>
<body class="" data-ng-app="ButProjectApp">
<!--<div class="grid-box base-line"></div>-->
<div class="outer"
     data-ng-cloak
     data-ng-controller="TopicListController">
    <?php include_once("./application/views/include/navigation.php") ?>
    <main class="main">
        <section>
            <div class="container">
                <div class="row">
                    <div class="main-content xs-col-4 sm-col-11 md-col-11">
                        <section class="row">
                            <div class="md-push-1 sm-push-1 md-col-9 sm-col-9 xs-col-4 one-card-align">
                                <article class="md-col-9 sm-col-9 xs-col-4">
                                    <div class="setting-card">
                                        <h1 class="readable-hidden">Set Profile</h1>
                                        <div class="setting-profileimg-wrap">
                                            <div class="setting-tooltip setting-aria">
                                                <button class="setting-profileimg-btn" id="profile-layer-open" type="button">
                                                    <img class="setting-profileimg-img tooltip-btn" aria-describedby="notice-tip" src="<?=$this->session->userdata('user_profile')?>" alt="사용자 사진">
                                                </button>
                                                <div id="notice-tip" class="setting-tooltip-content" role="tooltip" aria-hidden="true">
                                                    <p>작가님의 사진을 올려주세요</p>
                                                </div>
                                            </div>
                                        </div>
                                        <form class="form-layout update-form" action="/Member/user_edit_profile" method="post">
                                          <input type="hidden" class="member-profile-img" name="user_profile" value="">
                                            <input type="hidden" name="seq" value="<?=$this->session->userdata('user_seq')?>">
                                            <filedset>
                                                <div>
                                                    <label for="pen-name" class="setting-title author-name">작가명</label>
                                                    <input class="setting-input user-name" type="text" id="author-name" maxlength="8" name="user_name" placeholder="작가명을 지어주세요" required value="<?=$this->session->userdata('user_name')?>">
                                                    <span class="user-name-text"></span>
                                                </div>
                                                <div>
                                                    <label for="my-introduction" class="setting-title">내 소개</label>
                                                    <input class="setting-input" type="text" id="my-introduction" maxlength="32" name="user_about" placeholder="소개글을 입력해주세요" required value="<?=$this->session->userdata('user_about')?>">
                                                </div>
                                                <div>
                                                    <label for="email" class="setting-title">이메일 주소</label>
                                                    <input class="setting-input setting-email" type="email" id="email" placeholder="butmanager@gmali.com" readonly required <?=$this->session->userdata('user_email')?>>
                                                </div>
                                                <div>
                                                    <label for="password" class="setting-title">비밀번호 변경</label>
                                                    <input class="setting-input setting-pw user-pw" type="password" name="" id="password" maxlength="16" placeholder="비밀번호를 입력해주세요" required>
                                                </div>
                                                <div>
                                                    <label for="password" class="setting-title">비밀번호 확인</label>
                                                    <input class="setting-input setting-pw2 user-pw2" type="password" id="password2" maxlength="16" placeholder="비밀번호를 확인해주세요" required>
                                                    <span class="user-pw-text"></span>
                                                </div>
                                            </filedset>
                                        </form>
                                        <div class="setting-btn-wrap">
                                            <button class="secession btn-danger" type="button">탈퇴하기</button>
                                            <button class="modified btn-default update_btn" type="button">수정하기</button>
                                        </div>
                                        <div>
                                </article>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>
<div class="add-photo-position" id="setting-layer" aria-hidden="true" role="dialog" aria-labelledby="dialogTitle">
    <div class="profile-popup-dim" alt="해당 창에서 나가실 수 있습니다"></div>
    <div class="photo-popup-layer">
        <h1 class="readable-hidden" >Set profile image</h1>
        <form class="profile-img-upload-form" enctype="multipart/form-data" action="/Member/profile_upload" method="post">
            <fieldset>
                <div class="file-box">
                    <label for="profile-image-edit">
                        <img src="/static/images/icons/ic_add_a_photo_black_48px.svg" alt="프로필 사진 편집 기능">
                    </label>
                    <input type="file" name="user_file" id="profile-image-edit" required>
                </div>
                <div class="profile-popup-text">
                  <p class="profile-popup-title">
                    작가님의 사진을 올려주세요
                  </p>
                  <p class="profile-popup-caption">
                    사진 파일은 4mb 이하,<br>
                    jpg, png로 올려주시길 바랍니다.
                  </p>
                </div>
                <div class="profile-popup-btns">
                  <button type="submit" name="button" class="btn-default profile-img-sumit-btn">확인</button>
                  <button type="button" name="button" id="setting-layer-close" class="btn-default">취소</button>
                </div>
            </fieldset>
        </form>
    </div>
</div>
<?php include_once("./application/views/include/script/script.php") ?>
<script src="/static/js/module.js"></script>
<script src="/static/js/tooltip.js"></script>
<script src="/static/js/setting-popup.js" charset="utf-8"></script>
<script src="/static/js/script.js"></script>
<script>
    (function(global, $){
        //ajax form submit
//        $(".profile-img-sumit-btn").on("click", function(){
//            $('.profile-img-upload-form')[0].submit();
//        })
        $('.profile-img-upload-form').ajaxForm({
            beforeSubmit: function (data,form,option) {
                //validation체크
                //막기위해서는 return false를 잡아주면됨
                return true;
            },
            dataType:  'json',
            success: function(data){
                if(data == "1"){
                    alert("이미지업로드에 실패하였습니다.");
                } else {
                    $(".member-profile-img").val("/"+data["a"]+data["b"]);
                    $(".setting-profileimg-img").attr("src", "/"+data["a"]+data["b"]);
                    $("#setting-layer-close").trigger("click");
                    $('.profile-img-upload-form')[0].reset();
                }
            },
            error: function(){
                //에러발생을 위한 code페이지
            }
        });
    })(this, this.jQuery);
    var comparison_pw = ajax_comparison_pw();
    $(".update_btn").on("click", function(){
        if(comparison_pw == 1){
            $(".user-pw").attr("name", "user_pw");
        }
        var insert_name = jQuery(".user-name").val();
        var select_name = ajax_select_name("1");
        console.log(select_name);
        if(insert_name == ""){
            alert("닉네임을 입력하세요.");
        } else if(!insert_name == 1) {
            alert("다른 닉네임을 사용하세요.");
        } else {
            jQuery(".update-form")[0].submit();
        }
    })
</script>
</body>
</html>
