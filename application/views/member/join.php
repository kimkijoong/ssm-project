<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>join</title>
</head>
<body>
<form action="/Member/join" method="POST" class="join-form">
    <fieldset>
        <h1>회원가입</h1>
        <div class="input-group">
            <label for="user-email">이메일</label><input name="user_email" class="user-email" id="user-email" type="text">
            <span class="user-email-text"></span>
        </div>
        <div class="input-group">
            <label for="user-name">작가명</label><input name="user_name" class="user-name" id="user-name" type="text">
            <span class="user-name-text"></span>
        </div>
        <div class="input-group">
            <label for="user-pw">비밀번호</label><input class="user-pw" id="user-pw" name="user_pw" type="password">
        </div>
        <div class="input-group">
            <label for="user-pw2">비밀번호 확인</label><input name="user_pw2" class="user-pw2" id="user-pw2" type="password">
            <span class="user-pw-text"></span>
        </div>
    </fieldset>
    <button type="submit">회원가입</button>
    <a href="/Member/login_page" title="로그인 페이지 링크">로그인</a>
    <a href="/Member/find_pw_page" title="회원가입 페이지 링크">비밀번호 찾기</a>
</form>
<script type="text/javascript" src="/static/lib/js/jquery-1.11.1.min.js"></script>
<script src="/static/js/script.js"></script>
</body>
</html>
