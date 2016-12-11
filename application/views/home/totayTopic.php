<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Ssum: today's topic</title>
</head>
<body>
	<?php include_once("./application/views/include/navigation.php") ?>
	<?php foreach ($data as $daily_topic) {?>
	<main class="main">
		<section>
			<h1 class="readable-hidden">Today's Topic</h1>

			<article class="ssum-ex">
				<h2 class="readable-hidden">topic ex</h2>

				<p class="date"><?=$daily_topic->public_date?> <?=$daily_topic->am_pm?></p>
				<p class="topic"><?=$daily_topic->topic?></p>
				<p class="content">
					<?=$daily_topic->topic_content?>
				</p>
				<p class="author">- 시작의 끝 -</p>
				<a href="/Home/write_page/<?=$topic_seq?>" class="btn-write"><img src="" alt="글 쓰기"></a>

			</article>

			<section class="box-bringin-ssum-list">
				<?php foreach ($data2 as $topic_list) { ?>
					<a class="bringin" href="/Home/detailSsum/<?=$topic_list->seq?>">
						<p class="topic"><?=$daily_topic->topic?></p>
						<p class="">
							<?=$topic_list->daily_contant?>
						</p>
						<p class="pen-name">pen</p>
						<p class="date"><?=$topic_list->creat_date?></p>
					</a>
				<?php } ?>
			</section>
		</section>
	</main>
	<?php } ?>
	<footer class="footer">
		<h1 class="readable-hidden">Footer</h1>
	</footer>
	<?php include_once("./application/views/include/script/script.php") ?>
</body>
</html>