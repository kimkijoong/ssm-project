<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>but-intro</title>
</head>
<body>
    <form action="/Member/login" method="POST">
        <fieldset>
            <h1>로그인</h1>
            <div class="input-guorp">
                <label for="user-email">이메일</label><input id="user-email" class="user-email" name="user_email" type="text">
            </div>
            <div class="input-guorp">
                <label for="user-pw">비밀번호</label><input class="user-pw" id="user-pw" name="user_pw" type="password">
            </div>
        </fieldset>
        <button type="submit">로그인</button>
        <a href="/Member/join_page" title="회원가입 페이지 링크">회원가입</a>
        <a href="/Member/find_pw_page" title="비밀번호 찾기 페이지 링크">비밀번호 찾기</a>
    </form>
</body>
</html>
