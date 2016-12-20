<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <title>Ssum: main</title>
    <?php include_once("./application/views/include/style/style.php") ?>
    <link rel="stylesheet" type="text/css" href="/static/css/write.css">
</head>
<body class="" data-ng-app="ButProjectApp">
<div class="grid-box base-line"></div>
<div class="outer"
     data-ng-cloak
     >
    <?php include_once("./application/views/include/navigation.php") ?>
    <main class="main">
		<section>
		<?php foreach ( $data as $item){?>
		<div class="container">
			<div class="row">
				<div class="main-content xs-col-4 sm-col11 md-col-11 row">
					<h1 class="readable-hidden">Main: Write</h1>

					<div class="write-box-wrap xs-col-4 sm-col-9 md-col-9">
						<form class="write-box" action="" method="post">
							<input type="hidden" name="topic_seq" value="<?= $item->seq ?>">
							<input type="hidden" name="user_seq" value="<?= $this->session->userdata('user_seq') ?>">
							<input type="hidden" name="text_align" value="<?= $item->text_align ?>">
							<input type="hidden" name="open_post" value="<?= $item->open_post ?>">
							<legend class="readable-hidden">write</legend>
							<fieldset class="row">
								<div class="xs-col-4 sm-col-9">
									<label class="readable-hidden" for="content">글 작성</label>
									<textarea class="write xs-col-4 sm-col-9" name="daily_contant" id="content" placeholder="당신의 생각을 입력해주세요."></textarea>
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
							<p class="write-today-topic"><?=$item->topic?></p>
							<button class="btn-cancel">취 소</button>
							<button class="btn-submit">완 료</button>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php } ?>
		</section>
	</main>
</div>
<?php include_once("./application/views/include/script/script.php") ?>
<script type="text/javascript" src="/static/js/module.js"></script>
<script>
	var write_box = $('.write-box');
	write_box.attr("action", "/Home/new_write");
	$('.btn-submit').on('click',function(){
		var content = document.querySelector(".write").value;

		function replaceAll(str, target, replacement) {
			return str.split(target).join(replacement);
		};

		var replacement = replaceAll(content, '<br/>', '\n');
		$(".write").val(replacement);

		write_box[0].submit();
	})
	$(".btn-cancel").on("click",function(){
		history.go(-1);
	})
</script>
</body>
</html>
