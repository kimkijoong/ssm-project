<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <title>But: Open-Channel</title>
    <?php include_once("./application/views/include/style/style.php") ?>
    <link rel="stylesheet" type="text/css" href="/static/css/view.css">
</head>
<body class="" data-ng-app="ButProjectApp">
<div class="outer"
     data-ng-cloak
     data-ng-controller="TopicListController">
    <?php include_once("./application/views/include/navigation.php") ?>
    <main class="main">
            <section>
                <div class="container">
                    <div class="row">
                        <div class="bookmark-header xs-col-4 sm-col-11 md-col-11 ">
                            <div class="page-top-margin my-page-top">
                                <h1 class="txt-page-title">" 공개 씀 "</h1>
                            </div>
                        </div>
                        <div class="main-content xs-col-4 sm-col-11 md-col-11 mychml">
                            <section class="row">
                                <div class="md-push-1 sm-push-1 md-col-9 sm-col-9 xs-col-4 one-card-align my-cards-top">
                                    <?php foreach ( $data as $list ){ ?>
                                    <article class="md-col-9 sm-col-9 xs-col-4">
                                        <a href="#" class="content-card">
                                            <div class="card-content-01">
                                                <div>
                                                    <img class="profile-img-content" src="<?= $list->user_profile?>" alt="">
                                                    <p class="content-username"><?= $list->user_name?></p>
                                                </div>
                                                <div>
                                                    <button class="btn-default btn-content-cancle openclosebtn" aria-hidden="true">구독취소</button>
                                                    <button class="btn-default btn-content-cancle openclosebtn" aria-hidden="false">구독하기</button>
                                                </div>
                                            </div>
                                            <div class="open-ch-content-wrap">
                                                <div class="line-horizon"></div>
                                                <div class="content-title">
                                                    " <?= $list->topic?> "
                                                </div>
                                                <div class="content-contents" style="text-align:<?=$list->text_align?>;">
                                                    <?= $list->daily_contant?>
                                                </div>
                                                <div class="content-info">
                                                    <div><?= $list->user_name?></div>
                                                    <div><?= $list->creat_date?></div>
                                                </div>
                                            </div>
                                        </a>
                                    </article>
                                    <?php } ?>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </section>
    </main>
</div>
<?php include_once("./application/views/include/script/script.php") ?>
<script src="/static/js/module.js"></script>
<script src="/static/js/mychlist.js" charset="utf-8"></script>
</body>
</html>
