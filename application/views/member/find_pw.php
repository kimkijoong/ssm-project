<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>find_password</title>
    <link rel="stylesheet" href="../../../static/css/view.css">
    <!-- <link rel="stylesheet" href="../../../static/css/findpw.css"> -->
</head>
<body>
    <div class="form-pw-wrap password-bg">
        <form class="form-pw-position" action="" method="POST">
            <fieldset>
                <h1 class="readable-hidden">비밀번호 찾기</h1>
                <div class="pw-text">
                    <p class="pw-subtitle">당신의 글쓰기 친구</p>
                    <p class="pw-title">벗 비밀번호 찾기</p>
                </div>
                <div class="pw-input-group">
                    <label for="user-email">이메일</label>
                    <input class="input-width" type="email" id="user-email" placeholder="이메일을 입력해주세요" required>
                </div>
            </fieldset>
            <div class="fwfind-wrap">
                <button class="find-pw-btn" type="submit">비밀번호 찾기</button>
            </div>
            <div class="btn-fw-wrap">
                <a class="fw-btn-login" href="/Member/login_page" title="로그인 페이지 링크">로그인</a>
                <a class="fw-btn-join" href="/Member/join_page" title="회원가입 페이지 링크">회원가입</a>
            </div>
        </form>
    </div>
    <script type="text/javascript" src="/static/lib/js/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="/static/lib/js/jquery.form.min.js"></script>
    <script>
        $('.find-pw-btn').on("click", function(){
            var user_email = $(".user-email").val();
            jQuery.ajax({
                url: '/Member/pw_change_send_mail',
                dataType: "json",
                data:{user_email: user_email},
                type: 'POST',
                success: function(data){
                    if(data =="0"){
                        window.alert("메일주소가 올바른지 확인해주세요.");
                    } else if(data =="1"){
                        console.log("임시 비밀번호가 메일로 발송 되었습니다.")
                        window.alert("임시 비밀번호가 메일로 발송 되었습니다.");
                    }
                }
            });
        })

    </script>
</body>
</html>
