<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Ssum: main</title>
	<?php include_once("./application/views/include/navigation.php") ?>
</head>
<body dir="ltr" lang="ko-KR" data-ng-app="ButProjectApp">
	<div class="app"
		 data-ng-cloak
		 data-ng-controller="TopicListController">
		<?php include_once("./application/views/include/navigation.php") ?>
		<main class="main">
			<section>
				<h1 class="readable-hidden">Day Topic</h1>
				<button class="go-toay-topic" type="button">오늘의 주제</button>
				<section class="box-topic">
					<h2>Day Topic carousel</h2>
					<div class="day-topic" role="오늘의 주제" data-ng-cloak data-ng-repeat="List in TopicList.topicData track by $index">
						<div ng-show="$last">
							<p ng-switch on="List.category">오늘의 주제<br><span ng-switch-when="0">낮</span><span ng-switch-default>밤</span></p>
							<p role="topic">{{List.topic}}</p>
							<a href="/Home/write_page/{{List.seq}}"><img src="" alt="글 작성"></a>
						</div>
					</div>
				</section>
		</main>
		<footer class="footer">
			<h1 class="readable-hidden">Footer</h1>
		</footer>
	</div>
	<?php include_once("./application/views/include/script/script.php") ?>
</body>
</html>