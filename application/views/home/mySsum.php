<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Ssum: my ssum</title>
</head>
<body>
	<?php include_once("./application/views/include/navigation.php") ?>
	<main class="main">
		<?php foreach ($data as $data) {
			if($data->open_post) {
				$open_post = 0;
				$open_post_text = "&#35; 공개취소";
			} else {
				$open_post = 1;
				$open_post_text = "&#35; 공개하기";
			}
			?>
		<section>
			<h1 class="readable-hidden">씀 :..</h1>
			<div class="go-otherpage">
				<form action="/Home/post_open_update" method="post">
					<input name="seq" type="hidden" value="<?=$data->seq?>">
					<input name="open_post" type="hidden" value="<?=$open_post?>">
					<input name="return_url" type="hidden" value="<?="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];?>">
					<button class="embedding" type="submit"><?=$open_post_text?></button>
				</form>
				<a href="/Home/update_write_page/<?=$data->seq?>" class="user-ssum">수정</a> |
				<button class="remove" type="button">삭제</button>
			</div>
			<article class="">
				<h1 class="topic"><?=$data->topic?></h1>
				<p class="">
					<?=$data->daily_contant?>
				</p>
				<p class="pen-name"><?=$data->user_name?></p>
				<p class="date"><?=$data->creat_date?></p>
			</article>
		</section>
		<?php } ?>
	</main>

	<footer class="footer">
		<h1 class="readable-hidden">Footer</h1>
	</footer>
	<?php include_once("./application/views/include/script/script.php") ?>
</body>
</html>