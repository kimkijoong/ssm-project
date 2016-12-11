<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Ssum: bring in Ssum</title>
</head>
<body>
	<?php include_once("./application/views/include/navigation.php") ?>
	<main class="main">
		<section>
			<h1 class="">구독 목록</h1>

			<div class="box-tab">
				<!-- 담아온 글 탭 활성화: active -->
				<button class="btn-bring-in active" type="button">담아온 글</button>
				<button class="btn-subscribe-writer" type="button">구독작가</button>
			</div>
			
			<!-- 담아온 씀 활성화 상태 -->
			<section class="box-bringin-ssum-list active">
				<article class="bringin">
					<p class="topic">잠깐</p>
					<p class="">
						Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
						cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
						proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
					</p>
					<p class="pen-name">pen</p>
					<p class="date">2016년 11월 24</p>
				</article>
				<article class="bringin">
					<p class="topic">휴식</p>
					<p class="">
						Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sequi aperiam repudiandae molestias et, libero numquam alias sunt corporis incidunt, tempora, eligendi iste, beatae accusamus nisi repellat ipsam magnam illum soluta dicta! Id possimus expedita facilis at amet, tempora perferendis porro, ea explicabo accusamus ut iste ratione soluta. Fugiat minus, eveniet. Reiciendis vero, quod suscipit eos ullam unde reprehenderit minus voluptas minima perferendis provident voluptatum mollitia aspernatur quibusdam illum accusantium recusandae odit non perspiciatis eveniet nam assumenda magni. Voluptates esse explicabo, facere possimus. Consectetur unde inventore obcaecati porro vero quam. Nam unde enim, ad sint beatae, fuga ab at alias aspernatur.
					</p>
					<p class="pen-name">누구든</p>
					<p class="date">2016년 11월 23</p>
				</article>
				<article class="bringin">
					<p class="topic">케익</p>
					<p class="">
						Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore earum saepe vitae eveniet alias ipsa, asperiores tempora perspiciatis quia animi dolorum ea quidem voluptatum suscipit eligendi eum omnis ex, assumenda quae, culpa ad maxime soluta facilis nisi? Quae, perferendis, enim!
					</p>
					<p class="pen-name">토토</p>
					<p class="date">2016년 11월 21</p>
				</article>
			</section>

			<!-- 담아온 글 -->
			<section class="">
				<h2 class="">담아온 글</h2>

				<div class="box-subscribe-writer-list">
					<div class="subscribing">
						<p class="pen-name">벼랑위의 뽀뇨</p>
						<button class="btn-subscribing" type="button">구독 중</button>
					</div>
					<div class="subscribing">
						<p class="pen-name">채숨쉴</p>
						<button class="btn-subscribing" type="button">구독 중</button>
					</div>
					<div class="subscribing">
						<p class="pen-name">숨결이바람될때</p>
						<button class="btn-subscribing" type="button">구독 중</button>
					</div>
				</div>
			</section>
		</section>
	</main>

	<footer class="footer">
		<h1 class="readable-hidden">Footer</h1>
	</footer>
	<?php include_once("./application/views/include/script/script.php") ?>
</body>
</html>