<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <title>Ssum: main</title>
    <link rel="stylesheet" type="text/css" href="/static/css/libs/but_grid/grid_style.css">
    <link rel="stylesheet" type="text/css" href="/static/css/common.css">
    <link rel="stylesheet" type="text/css" href="/static/css/write.css">
    <?php include_once("./application/views/include/style/style.php") ?>
</head>
<body class="" data-ng-app="ButProjectApp">
<div class="grid-box base-line"></div>
<div class="outer"
     data-ng-cloak
     data-ng-controller="TopicListController">
    <?php include_once("./application/views/include/navigation.php") ?>
    <main class="main">
		<section>

		<div class="container">
			<div class="row">
				<div class="main-content xs-col-4 sm-col11 md-col-11 row">
					<h1 class="readable-hidden">Main: Write</h1>

					<div class="write-box-wrap xs-col-4 sm-col-9 md-col-9">
						<form class="write-box" action="" method="post">
							<legend class="readable-hidden">write</legend>
							<fieldset class="row">
								<div class="xs-col-4 sm-col-9">
									<label class="readable-hidden" for="content">글 작성</label>
									<textarea class="write xs-col-4 sm-col-9" name="" id="content" placeholder="당신의 생각을 입력해주세요."></textarea>
									<!-- cols="30" rows="30" -->
									<!-- toggle 형식 : javascript로 제어 -->
								</div>
							</fieldset>
						</form>

						<button id="align-status" class="left">
							<img src="/static/images/icons/ic_align_left.svg" alt="글 정렬">
						</button>
					</div>

					<!-- form 전송시: javacript로 제어 -->
					<div class="write-bar">
						<div class="write-bar-wrap">
							<p class="write-today-topic">커피</p>
							<button class="btn-cancel">취 소</button>
							<button class="btn-submit">완 료</button>
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
</body>
</html>