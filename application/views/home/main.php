<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Ssum: main</title>
</head>
<body dir="ltr" lang="ko-KR" data-ng-app="BipanListApp">
	<?php include_once("./application/views/include/navigation.php") ?>

	<main class="main">
		<section>
			<h1 class="readable-hidden">Day Topic</h1>

			<button class="go-toay-topic" type="button">오늘의 주제</button>
			<section class="box-topic">
				<h2 class="readable-hidden">Day Topic carousel</h2>
				<div class="day-topic" role="오늘의 주제">
					<?php foreach( $data as $today ) { ?>
					<p>오늘의 주제<br><?php if($today->am_pm == "am") { ?> 낮 <?php } else if($today->am_pm == "pm"){ ?> 밤 <?php }?></p>
					<p role="topic"><?= $today->topic?></p>
					<a href="/Home/write_page/<?=$today->seq?>"><img src="" alt="글 작성"></a>
					<?php } ?>
				</div>
			</section>

			<!-- left & right button -->
			<div class="btn-prevNnext" role="prevNnext">
				<button type="button" class="prev">&lt;</button>
				<button type="button" class="next">&gt;</button>
			</div>

			<div class="btn-slide" role="슬라이드 버튼">
				<button type="button" class="">1</button>
				<button type="button" class="">2</button>
				<button type="button" class="">3</button>
				<button type="button" class="">4</button>
				<button type="button" class="">5</button>
				<button type="button" class="">6</button>
			</div>
		</section>
	</main>
	<section class="box-topic"
			 data-ng-cloak
			 data-ng-controller="ListController">
		<h2>Day Topic carousel</h2>
		<div class="day-topic" role="오늘의 주제" data-ng-repeat="test in test_data">
				<p>오늘의 주제<br></p>
				<p role="topic">{{test[0].topic}}</p>
				<a href="/Home/write_page/{{test[0].seq}}"><img src="" alt="글 작성"></a>
		</div>
	</section>
	<footer class="footer">
		<h1 class="readable-hidden">Footer</h1>
	</footer>
	<?php include_once("./application/views/include/script/script.php") ?>

	<script type="text/javascript" src="/static/js/main.bundle.js"></script>
</body>
</html>