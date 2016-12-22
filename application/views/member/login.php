<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="/static/css/view.css">
     <link rel="stylesheet" href="/static/css/login.css">
    <title>but-intro</title>
</head>
<body>
    <div class="form-wrap login-bg">
        <form class="form-position" action="/Member/login" method="POST">
            <fieldset>
                <h1 class="readable-hidden">로그인</h1>
                <div class="login-text">
                    <p class="login-subtitle">당신의 글쓰기 친구</p>
                    <p class="login-title">벗 시작하기</p>
                    <p class="login-caption">하루에 두번, 낮과 밤 시간에<br>당신의 생각과 감성을 펼쳐주세요.</p>
                </div>
                <div class="input-position">
                    <div class="input-group">
                        <label for="login-user-email">이메일</label>
                        <input id="login-user-email" name="user_email" type="email" required placeholder="이메일을 입력해주세요">
                    </div>
                    <div class="input-group">
                        <label for="login-user-pw">비밀번호</label>
                        <input id="login-user-pw" name="user_pw" type="password" required placeholder="비밀번호를 입력해주세요">
                    </div>
                </div>
            </fieldset>
            <div class="login-btns-position">
                <div class="login-btn-wrap">
                    <button class="btn-login" type="submit">로그인</button>
                    <a class="btn-join" href="/Member/join_page" title="회원가입 페이지 링크">회원가입</a>
                </div>
                <a class="findpw" href="/Member/find_pw_page" title="비밀번호 찾기 페이지 링크">비밀번호 찾기</a>
            </div>
        </form>
    </div>
</body>
</html>
