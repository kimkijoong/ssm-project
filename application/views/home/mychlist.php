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
    <main class="main main-magintop padding-top">
        <section  data-ng-cloak data-ng-repeat="List in TopicList.topicData">
            <div class="container">
                <div class="row">
                    <div class="xs-col-4 sm-col-11 md-col-11">
                        <section class="row">
                            <div class="md-push-1 sm-push-1 md-col-9 sm-col-9 xs-col-4 one-card-align">
                                <article class="md-col-9 sm-col-9 xs-col-4">
                                    <a href="#" class="content-card">
                                        <div class="card-content-01">
                                            <div>
                                                <img class="profile-img-content" src="/static/images/userprofile/user_0003.png" alt="">
                                                <p class="content-username">Username</p>
                                            </div>
                                            <div>
                                                <button class="btn-default btn-content-cancle openclosebtn" aria-hidden="true">공개취소</button>
                                                <button class="btn-default btn-content-cancle openclosebtn" aria-hidden="false">공개하기</button>
                                            </div>
                                        </div>
                                        <div class="open-ch-content-wrap">
                                            <div class="line-horizon"></div>
                                            <div class="content-title">
                                                " 생각의 경계 "
                                            </div>
                                            <div class="content-contents">
                                                <p>
                                                    당신의 내면 작업 일지를 펴서 두 개의 리스트를<br>
                                                    <br>
                                                    만들어 보라. 첫째로 어른이 되어서 당신이 시작<br>
                                                    <br>
                                                    끝내지 못한 중요한<br>
                                                    <br>
                                                    프로젝트의 리스트를 만들어 보라.<br>
                                                    <br>
                                                    그러고 나서 당신이 완성한<br>
                                                    <br>
                                                    프로젝트의 리스트를 만들어 보라.
                                                </p>
                                            </div>
                                            <div class="content-info">
                                                <div>username</div>
                                                <div>16년 11월 24일 20시</div>
                                            </div>
                                        </div>
                                    </a>
                                </article>
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
