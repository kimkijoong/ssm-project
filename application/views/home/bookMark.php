<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <title>But: book-mark</title>
    <?php include_once("./application/views/include/style/style.php") ?>
    <link rel="stylesheet" type="text/css" href="/static/css/view.css">
</head>
<body class="" data-ng-app="ButProjectApp">
<!--<div class="grid-box base-line"></div>-->
<div class="outer"
     data-ng-cloak
     data-ng-controller="TopicListController">
    <?php include_once("./application/views/include/navigation.php") ?>
    <main class="main">
		<section>

		<div class="container">
			<div class="row">
				<div class="main-content xs-col-4 sm-col-11 md-col-11">
                    <section class="row">
                        <div class="md-push-1 sm-push-1 md-col-9 sm-col-9 xs-col-4">
                            <div class="page-top-section">
                                <h1 class="txt-page-title">구독 목록</h1>
                            </div>
                            <div>
                                <ul class="tab-list txt-tab-normal" role="tablist">
                                    <li id="tab1" role="tab" aria-controls="section1" aria-selected="true" tabindex="0" class="waves-effect waves-mint">담아온글</li>
                                    <li id="tab2" role="tab" aria-controls="section2" aria-selected="false" tabindex="0" class="waves-effect waves-mint">구독작가</li>
                                </ul>
                            </div>
                            <div class="tab-contnents">
                                <section class="row" id="section1" role="tabpanel" aria-labelledby="tab1">
                                    <div class="md-col-9 sm-col-9 xs-col-4 one-card-align">
                                        <article class="md-col-9 sm-col-9 xs-col-4">
                                            <a href="#" class="bk-wrting-card">
                                                <div class="bookmark-section1">
                                                    <img class="profile-img" src="/static/images/userprofile/user_0001.png" alt="">
                                                    <p class="username">gongyou</p>
                                                </div>
                                                <div class="bookmark-section2">
                                                    <p class="card-content-heading">끌림에 대하여</p>
                                                    <p class="card-content-text">
                                                        현실 보다 더 중요한 것이 이상이라며 고집하다가 이상만큼 중요한 것이 현실이라고 인정할 수밖에 없는 날. 난 그런 날에 살면서 살아야할 이유를 찾는다. 내 삶과 내 가슴이 남김없이 불타오를 거룩한 사랑 …
                                                    </p>
                                                    <p class="card-info-date">
                                                        16.11.23 (낮)
                                                    </p>
                                                </div>
                                            </a>
                                        </article>
                                        <article class="md-col-9 sm-col-9 xs-col-4">
                                            <a href="#" class="bk-wrting-card">
                                                <div class="bookmark-section1">
                                                    <img class="profile-img" src="/static/images/userprofile/user_0001.png" alt="">
                                                    <p class="username">gongyou</p>
                                                </div>
                                                <div class="bookmark-section2">
                                                    <p class="card-content-heading">끌림에 대하여</p>
                                                    <p class="card-content-text">
                                                        현실 보다 더 중요한 것이 이상이라며 고집하다가 이상만큼 중요한 것이 현실이라고 인정할 수밖에 없는 날. 난 그런 날에 살면서 살아야할 이유를 찾는다. 내 삶과 내 가슴이 남김없이 불타오를 거룩한 사랑 …
                                                    </p>
                                                    <p class="card-info-date">
                                                        16.11.23 (낮)
                                                    </p>
                                                </div>
                                            </a>
                                        </article>
                                        <article class="md-col-9 sm-col-9 xs-col-4">
                                            <a href="#" class="bk-wrting-card">
                                                <div class="bookmark-section1">
                                                    <img class="profile-img" src="/static/images/userprofile/user_0001.png" alt="">
                                                    <p class="username">gongyou</p>
                                                </div>
                                                <div class="bookmark-section2">
                                                    <p class="card-content-heading">끌림에 대하여</p>
                                                    <p class="card-content-text">
                                                        현실 보다 더 중요한 것이 이상이라며 고집하다가 이상만큼 중요한 것이 현실이라고 인정할 수밖에 없는 날. 난 그런 날에 살면서 살아야할 이유를 찾는다. 내 삶과 내 가슴이 남김없이 불타오를 거룩한 사랑 …
                                                    </p>
                                                    <p class="card-info-date">
                                                        16.11.23 (낮)
                                                    </p>
                                                </div>
                                            </a>
                                        </article>
                                    </div>
                                </section>
                                <section class="row unvisual" id="section2" class="unvisual" role="tabpanel" aria-labelledby="tab2">
                                    <div class="md-col-9 sm-col-9 xs-col-4 three-card-align">
                                        <article class="md-col-3 sm-col-3 xs-col-4">
                                            <a href="#" class="bk-author-card">
                                                <div>
                                                    <img class="profile-img-author" src="/static/images/userprofile/user_0003.png" alt="">
                                                    <p class="book-mark-author-username">Username</p>
                                                    <p class="book-mark-author-caption">내일 일을 오늘 걱정하지 말라 어제의 비로 오늘의 옷을 적시지말라</p>
                                                </div>
                                                <button class="btn-default btn-bookmark-cancle">구독취소</button>
                                            </a>
                                        </article>
                                        <article class="md-col-3 sm-col-3 xs-col-4">
                                            <a href="#" class="bk-author-card">
                                                <div>
                                                    <img class="profile-img-author" src="/static/images/userprofile/user_0003.png" alt="">
                                                    <p class="book-mark-author-username">Username</p>
                                                    <p class="book-mark-author-caption">내일 일을 오늘 걱정하지 말라 어제의 비로 오늘의 옷을 적시지말라</p>
                                                </div>
                                                <button class="btn-default btn-bookmark-cancle">구독취소</button>
                                            </a>
                                        </article>
                                        <article class="md-col-3 sm-col-3 xs-col-4">
                                            <a href="#" class="bk-author-card">
                                                <div>
                                                    <img class="profile-img-author" src="/static/images/userprofile/user_0003.png" alt="">
                                                    <p class="book-mark-author-username">Username</p>
                                                    <p class="book-mark-author-caption">내일 일을 오늘 걱정하지 말라 어제의 비로 오늘의 옷을 적시지말라</p>
                                                </div>
                                                <button class="btn-default btn-bookmark-cancle">구독취소</button>
                                            </a>
                                        </article>
                                        <article class="md-col-3 sm-col-3 xs-col-4">
                                            <a href="#" class="bk-author-card">
                                                <div>
                                                    <img class="profile-img-author" src="/static/images/userprofile/user_0003.png" alt="">
                                                    <p class="book-mark-author-username">Username</p>
                                                    <p class="book-mark-author-caption">내일 일을 오늘 걱정하지 말라 어제의 비로 오늘의 옷을 적시지말라</p>
                                                </div>
                                                <button class="btn-default btn-bookmark-cancle">구독취소</button>
                                            </a>
                                        </article>
                                        <article class="md-col-3 sm-col-3 xs-col-4">
                                            <a href="#" class="bk-author-card">
                                                <div>
                                                    <img class="profile-img-author" src="/static/images/userprofile/user_0003.png" alt="">
                                                    <p class="book-mark-author-username">Username</p>
                                                    <p class="book-mark-author-caption">내일 일을 오늘 걱정하지 말라 어제의 비로 오늘의 옷을 적시지말라</p>
                                                </div>
                                                <button class="btn-default btn-bookmark-cancle">구독취소</button>
                                            </a>
                                        </article>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </section>
			</div>
		</div>
		</section>
	</main>
</div>
<?php include_once("./application/views/include/script/script.php") ?>
<script src="/static/js/module.js"></script>
<script src="/static/js/tab-ui.js"></script>
</body>
</html>
