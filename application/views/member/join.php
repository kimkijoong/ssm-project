<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/static/css/view.css">
    <link rel="stylesheet" href="/static/css/join.css">
    <title>join</title>
</head>
<body>
    <div class="form-join-wrap login-bg">
    <form class="form-join-position join-form" action="/Member/join" method="POST">
            <h1 class="readable-hidden">회원가입</h1>
            <div class="join-text">
                <p class="join-subtitle">당신의 글쓰기 친구</p>
                <p class="join-title">벗 회원가입</p>
            </div>
            <div class="join-input-group">
                <label for="join-user-email">이메일</label>
                <input class="input-width" type="email" id="user-email" placeholder="이메일을 입력해주세요" required>
                <span class="user-email-text"></span>
            </div>
            <div class="join-input-group">
                <label for="user-name">작가명</label>
                <input class="input-width" type="text" id="user-name" maxlength="8" placeholder="작가명을 지어주세요" required>
                <span class="user-name-text"></span>
            </div>
            <div class="join-input-group">
                <label for="user-pw">비밀번호</label>
                <input class="input-width" type="password" id="user-pw" maxlength="16" placeholder="비밀번호를 입력해주세요" required>
            </div>
            <div class="join-input-group">
                <label for="user-pw2">비밀번호 확인</label>
                <input class="input-width" type="password" id="user-pw2" maxlength="16" placeholder="비밀번호를 확인해주세요" required>
                <span class="user-pw-text"></span>
            </div>
        </fieldset>
        <div class="">
            <div class="join-btn-wrap">
                <button class="join-btn-join" type="submit">회원가입</button>
                <a class="join-btn-login" href="/Member/login_page" title="로그인 페이지 링크">로그인</a>
            </div>
            <a class="join-findpw" href="/Member/find_pw_page" title="비밀번호 찾기 페이지 링크">비밀번호 찾기</a>
        </div>
    </form>
</div>
<script type="text/javascript" src="/static/lib/js/jquery-1.11.1.min.js"></script>
<script src="/static/js/script.js"></script>
</body>
</html>
