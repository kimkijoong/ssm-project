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
<!-- <div class="grid-box base-line"></div> -->
<div class="outer"
     data-ng-cloak
     data-ng-controller="TopicListController">
    <?php include_once("./application/views/include/navigation.php") ?>
    <main class="main">
		<section  data-ng-cloak data-ng-repeat="List in TopicList.topicData track by $index" ng-show="$last">

		<div class="container">
			<div class="row">
				<div class="main-content xs-col-4 sm-col-11 md-col-11">
					<h1 class="readable-hidden">Main: Day Topic</h1>


				</div>
			</div>
		</div>
		</section>
	</main>
</div>
<?php include_once("./application/views/include/script/script.php") ?>
<script src="/static/js/module.js"></script>
</body>
</html>
