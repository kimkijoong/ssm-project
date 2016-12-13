<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<title>Ssum: My Ssum List</title>
</head>
<body data-ng-app="ButProjectApp">
	<?php include_once("./application/views/include/navigation.php") ?>

	<main class="main" data-ng-controller="PostListController">
		<section class="">
			<h1 class="readable-hidden">My Ssum of this month</h1>

			<div class="">
				<p class="today-topic">11월<span>의</span><span>나의 씀</span></p>
				<button class="btn-cancel"> &lt; 이전달</button>
				<button class="btn-submit">다음달 &gt;</button>
			</div>

			<div class="">
				<!--<?php /*foreach ($data as $my_ssm_list) { */?>
					<a class="my-ssum" href="/Home/mySsm_page/<?/*= $my_ssm_list->seq */?>">
						<h3><?/*=$my_ssm_list->topic*/?></h3>
						<div class="open"><?php /*if($my_ssm_list->open_post) { */?> 비공개 <?php /*} else { */?> 공개 <?php /*} */?></div>
						<p><?/*=$my_ssm_list->creat_date*/?>2016년 11월 23일 12시</p>
						<hr>
						<p>
							<?/*=$my_ssm_list->daily_contant*/?>
						</p>
					</a>
				<?php /*} */?>-->
				<input class="user_seq" ng-model="user_seq" type="hidden" value="<?=$this->session->userdata('user_seq');?>">
				<div class="" data-ng-repeat="List in PostList.postData | filter:filter_user">
					<div class="open-ssum">
						<a href="/Home/openSsm_page/{{List.seq}}">
							<h3>{{List.topic}}</h3>
							<div class="numbering">#632</div>
							<p>{{List.creat_date}} {{List.category}}</p>
							<p>{{List.daily_contant}}</p>
							<hr>
						</a>
					</div>
				</div>
			</div>
		</section>
	</main>

	<footer class="footer">
		<h1 class="readable-hidden">Footer</h1>
	</footer>
	<?php include_once("./application/views/include/script/script.php") ?>
</body>
</html>