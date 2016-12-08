<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<title>Ssum: Open Ssum</title>
</head>
<body>
	<?php include_once("./application/views/include/navigation.php") ?>

	<main class="main">
		<section class="">
			<h1 class="readable-hidden">Open Ssum (다른 사람들의 공개 씀)</h1>

			<div class="">
				<p class="today-topic">11월<span>의</span><span>공개 씀</span></p>
				<button class="btn-cancel"> &lt; 이전달</button>
				<button class="btn-submit">다음달 &gt;</button>
			</div>

			<div class="">
				<?php foreach ( $data as $topic_list){?>
				<div class="open-ssum">
					<a href="/Home/openSsm_page/<?=$topic_list->seq?>">
						<h3><?=$topic_list->topic?></h3>
						<div class="numbering">#632</div>
						<p><?=$topic_list->public_date?> <?=$topic_list->am_pm?></p>
						<hr>
					</a>
				</div>
				<?php } ?>
			</div>
		</section>
	</main>

	<footer class="footer">
		<h1 class="readable-hidden">Footer</h1>
	</footer>
	<?php include_once("./application/views/include/script/script.php") ?>
</body>
</html>