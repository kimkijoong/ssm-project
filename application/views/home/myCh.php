<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <title>But: My-Channel</title>
    <?php include_once("./application/views/include/style/style.php") ?>
    <link rel="stylesheet" type="text/css" href="/static/css/view.css">
</head>
<body class="" data-ng-app="ButProjectApp">
<div class="grid-box base-line"></div>
<div class="outer"
     data-ng-cloak
     data-ng-controller="myTopicController"
     >
    <?php include_once("./application/views/include/navigation.php") ?>
    <main class="main">
        <section  data-ng-cloak>
            <div class="container">
                <div class="row">
                    <div class="main-content xs-col-4 sm-col-11 md-col-11">
                        <section class="row">
                            <div class="md-push-1 sm-push-1 md-col-9 sm-col-9 xs-col-4 three-card-align">
                                <article class="md-col-3 sm-col-3 xs-col-4 motif-position" data-ng-repeat="List in PostList.postData">
                                    <a href="/Home/myChDetail/{{List.seq}}" class="motif-card">
                                        <p class="topic-list-time" ng-switch on="List.category">
                                            <span ng-switch-when="0">낮</span><span ng-switch-default>밤</span>의 주제
                                        </p>
                                        <p class="topic-list-title">
                                            {{List.topic}}
                                        </p>
                                        <div class="topic-list-info">
                                            <span>#{{List.seq}}</span>
                                            <span>/</span>
                                            <span>{{List.new_creat_date}}</span>
                                        </div>
                                    </a>
                                    <div class="motif-btn-position">
                                      <a href="/Home/write/{{List.topic_seq}}" class="motif-write-btn waves-effect waves-mint">
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
