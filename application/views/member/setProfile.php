<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Ssum: set profile</title>
</head>
<body>
	<?php include_once("./application/views/include/navigation.php") ?>

	<main class="main">
		<section>
			<h1 class="readable-hidden">Set Profile</h1>
			
			<button class="" type="button"><img src="" alt="사용자 사진"></button>

			<form class="" action="" method="post">
				<filedset>
					<div class="change-penname" role="change pen name">
						<label for="pen-name" class="pen-name">작가명</label>
						<input type="text" id="pen-name">
						<button class="modified" type="submit">수정</button>
					</div>
					<div class="change-my-introduction" role="change my introduction">
						<label for="my-introduction" class="my-introduction">내 소개</label>
						<input type="text" id="my-introduction">
						<button class="modified" type="submit">수정</button>
					</div>
					<div class="change-email" role="change email">
						<label for="email" class="email">이메일 주소</label>
						<input type="email" id="email">
						<button class="modified" type="submit">이메일 주소 변경</button>
					</div>
					<div class="change-password" role="change password">
						<label for="password" class="password">비밀번호 변경</label>
						<input type="password" id="password">
						<button class="modified" type="submit">비밀번호 변경</button>
					</div>

					<button class="secession" type="submit">탈퇴하기</button>
				</filedset>
			</form>
		</section>
	</main>

	<footer class="footer">
		<h1 class="readable-hidden">Footer</h1>
	</footer>
	<?php include_once("./application/views/include/script.php") ?>
</body>
</html>