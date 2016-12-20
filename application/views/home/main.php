<!DOCTYPE html>
<html lang="en">
<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, user-scalable=no">
		<title>Ssum: main</title>
		<link rel="stylesheet" type="text/css" href="/static/css/libs/but_grid/grid_style.css">
		<link rel="stylesheet" type="text/css" href="/static/css/common.css">
		<link rel="stylesheet" type="text/css" href="/static/css/main-style.css">
		<?php include_once("./application/views/include/style/style.php") ?>
</head>
<body class="" data-ng-app="ButProjectApp">
<!--<div class="grid-box base-line"></div>-->
	<div class="outer"
		 data-ng-cloak
		 data-ng-controller="TopicListController">
		<?php include_once("./application/views/include/navigation.php") ?>
		<main class="main">
			<section  data-ng-cloak data-ng-repeat="List in TopicList.topicData track by $index" ng-show="$last">
				<div class="container">
					<div class="row">
						<div class="main-content xs-col-4 sm-col-11 md-col-11">
							<div class="main-wrapper">
								<div class="main-content-position">
									<h1 class="readable-hidden">Main: Day Topic</h1>
									<p class="today-topic" ng-switch on="List.category">오늘의 주제 <span ng-switch-when="0">(낮)</span><span ng-switch-default>(밤)</span></p>
									<h2 class="topic">{{List.topic}}</h2>

									<!-- desktop일 때만 보이기. -->
									<p class="topic-text">
										Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nostrum a inventore rem, voluptatem repellendus quam accusantium labore ullam rerum enim.
									</p>
									<a class="btn-main go-to-write" href="/Home/write/{{List.seq}}">글쓰러 가기</a>
									<a class="btn-main go-to-opench .md-pull-2" href="/Home/opench/{{List.seq}}">공개씀 보기</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
		</main>
	</div>
<?php include_once("./application/views/include/script/script.php") ?>
<script src="/static/js/module.js"></script>
<script src="/static/js/carousel.js"></script>
</body>
</html>
