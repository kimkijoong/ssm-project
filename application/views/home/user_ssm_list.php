<!DOCTYPE html>
<html lang="ko">
<body>
<?php include_once("./application/views/include/navigation.php") ?>

<main class="main">
	<?php foreach ($data as $my_ssm_list) { ?>
	<?php } ?>
	<section class="">
		<h1 class="readable-hidden">user Ssum of this month</h1>

		<div class="">
			<p class="today-topic">11월<span>의</span><span><?= $my_ssm_list->user_name ?>의 씀</span></p>
			<button class="btn-cancel"> &lt; 이전달</button>
			<button class="btn-submit">다음달 &gt;</button>
		</div>
		<?php foreach ($data as $my_ssm_list) { ?>
		<div class="">
			<a class="my-ssum" href="/Home/detailSsum/<?= $my_ssm_list->seq ?>">
				<h3><?=$my_ssm_list->topic?></h3>
				<div class="open"><?php if($my_ssm_list->open_post) { ?> 비공개 <?php } else { ?> 공개 <?php } ?></div>
				<p><?=$my_ssm_list->creat_date?><!--2016년 11월 23일 12시--></p>
				<hr>
				<p>
					<?=$my_ssm_list->daily_contant?>
				</p>
			</a>
		</div>
		<?php } ?>
	</section>
</main>

<footer class="footer">
	<h1 class="readable-hidden">Footer</h1>
</footer>
<?php include_once("./application/views/include/script/script.php") ?>
</body>
<head>
	<meta charset="UTF-8">
	<title>Ssum: My Ssum List</title>
</head>
</html>