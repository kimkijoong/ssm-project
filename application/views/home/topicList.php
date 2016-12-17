<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <title>But: Topic-List</title>
    <?php include_once("./application/views/include/style/style.php") ?>
    <link rel="stylesheet" type="text/css" href="/static/css/view.css">
</head>
<body class="" data-ng-app="ButProjectApp">
<div class="grid-box base-line"></div>
<div class="outer"
     data-ng-cloak
     data-ng-controller="TopicListController">
    <?php include_once("./application/views/include/navigation.php") ?>
    <main class="main">
        <section  data-ng-cloak data-ng-repeat="List in TopicList.topicData track by $index" ng-show="$last">
            <div class="container">
                <div class="row">
                    <div class="main-content xs-col-4 sm-col-11 md-col-11">
                        <section class="row">
                            <div class="md-push-1 sm-push-1 md-col-9 sm-col-9 xs-col-4 three-card-align">
                                <article class="md-col-3 sm-col-3 xs-col-4 motif-position">
                                    <a href="#" class="motif-card">
                                        <p class="topic-list-time">
                                            낮의 주제
                                        </p>
                                        <p class="topic-list-title">
                                            끌림에 대하여
                                        </p>
                                        <div class="topic-list-info">
                                            <span>#257</span>
                                            <span>/</span>
                                            <span>16.11.29</span>
                                        </div>
                                        <button class="waves-effect waves-mint motif-write-btn" type="button" name="button"><img src="/static/images/icons/write-btn-normal@2x.png" alt=""></button>
                                    </a>
                                    <div class="motif-btn-postion">
                                        <a class="motif-write-btn waves-effect waves-mint" type="button" name="button">
                                            <img src="/static/images/icons/write-btn-normal@2x.png" alt="">
                                        </a>
                                    </div>
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
</body>
</html>
