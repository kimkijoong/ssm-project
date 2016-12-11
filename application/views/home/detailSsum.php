<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Ssum: read user ssum</title>
</head>
<body>
	<?php include_once("./application/views/include/navigation.php") ?>
	<main class="main">
		<?php foreach ($data as $data) { ?>
		<section>
			<h1 class="readable-hidden">씀 :..</h1>

			<div class="go-otherpage">
				<button class="embedding" type="submit">&#35; 담아가기</button>
				<a href="/Home/user_ssm_list_page/<?=$data->user_seq?>" class="user-ssum"><?=$data->user_name?>의 씀 &gt;</a>
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