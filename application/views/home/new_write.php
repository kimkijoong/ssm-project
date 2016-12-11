<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<title>Ssum: Write</title>
</head>
<body>
	<?php include_once("./application/views/include/navigation.php") ?>

	<main class="main">
		<section class="">
			<h1 class="readable-hidden">content about topic</h1>
			
			<form class="post-write-form" action="" method="post">
				<fieldset>
					<input name="user_seq" type="hidden" value="<?= $this->session->userdata('user_seq')?>">
					<input name="topic_seq" type="hidden" value="<?=$daily_seq?>">
					<input name="text_align" type="hidden" value="left">
					<input name="open_post" type="hidden" value="1">
					<label for="content">글 작성</label>
					<textarea name="daily_contant" id="content" cols="50" rows="30"></textarea>
				</fieldset>
			</form>

			<!-- toggle 형식 : javascript로 제어 -->
			<button class="text-align-btn">
				<img src="" alt="글 정렬">
			</button>
			<button class="topic-open-btn">
				<img src="" alt="공개">
			</button>

			<!-- form 전송시: javacript로 제어 -->
			<div class="">
				<p class="today-topic">커피</p>
				<button class="btn-cancel">취소</button>
				<button class="btn-submit">완료</button>
			</div>
		</section>
	</main>

	<footer class="footer">
		<h1 class="readable-hidden">Footer</h1>
	</footer>
	<script type="text/javascript" src="/static/lib/js/jquery-1.11.1.min.js"></script>
	<?php include_once("./application/views/include/script/script.php") ?>
	<script type="text/javascript" src="/static/lib/js/jquery.form.min.js"></script>
	<script>
		var post_write_form = $('.post-write-form');
		post_write_form.attr("action", "/Home/new_write");
		$('.btn-submit').on('click',function(){
			post_write_form[0].submit();
		})
	</script>
</body>
</html>