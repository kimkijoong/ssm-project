<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<title>Ssum: My Ssum List</title>
</head>
<body>
	<?php include_once("./application/views/include/navigation.php") ?>

	<main class="main">
		<section class="">
			<h1 class="readable-hidden">My Ssum of this month</h1>

			<div class="">
				<p class="today-topic">11월<span>의</span><span>나의 씀</span></p>
				<button class="btn-cancel"> &lt; 이전달</button>
				<button class="btn-submit">다음달 &gt;</button>
			</div>

			<div class="">
				<?php foreach ($data as $my_ssm_list) { ?>
					<a class="my-ssum" href="/Home/mySsm_page/<?= $my_ssm_list->seq ?>">
						<h3><?=$my_ssm_list->topic?></h3>
						<div class="open"><?php if($my_ssm_list->open_post) { ?> 비공개 <?php } else { ?> 공개 <?php } ?></div>
						<p><?=$my_ssm_list->creat_date?><!--2016년 11월 23일 12시--></p>
						<hr>
						<p>
							<?=$my_ssm_list->daily_contant?>
						</p>
					</a>
				<?php } ?>
<!--				<a class="my-ssum" href="/Home/mySsm_page">-->
<!--					<h3>청년</h3>-->
<!--					<div class="closed">비공개</div>-->
<!--					<p>2016년 11월 21일 19시</p>-->
<!--					<hr>-->
<!--					<p>-->
<!--						Lorem ipsum dolor sit amet, consectetur adipisicing elit. Incidunt neque nulla optio commodi possimus voluptatem perferendis, consequatur deserunt fugit et alias corporis velit, nemo odio numquam doloribus cumque eos a.-->
<!--					</p>-->
<!--				</a>-->
			</div>
		</section>
	</main>

	<footer class="footer">
		<h1 class="readable-hidden">Footer</h1>
	</footer>
	<?php include_once("./application/views/include/script/script.php") ?>
</body>
</html>