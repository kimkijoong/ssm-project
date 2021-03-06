<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <title>But: My-Channel-Detail</title>
    <?php include_once("./application/views/include/style/style.php") ?>
    <link rel="stylesheet" type="text/css" href="/static/css/view.css">
</head>
<body class="" data-ng-app="ButProjectApp">
<!-- <div class="grid-box base-line"></div> -->
<div class="outer"
     data-ng-cloak
     data-ng-controller="TopicListController">
    <?php include_once("./application/views/include/navigation.php") ?>
    <main class="main main-magintop">
        <section>
            <div class="container">
                <div class="row">
                    <div class="main-content xs-col-4 sm-col-11 md-col-11">
                        <?php foreach ( $data as $item ) {?>
                        <section class="row">
                            <div class="md-push-1 sm-push-1 md-col-9 sm-col-9 xs-col-4 one-card-align">
                                <article class="md-col-9 sm-col-9 xs-col-4">
                                    <div class="content-card">
                                        <div class="content-title">
                                            " <?=$item->topic?> "
                                        </div>
                                        <div class="content-contents" style="text-align: <?=$item->text_align?>">
                                            <?=$item->daily_contant?>
                                        </div>
                                        <div class="content-info">
                                            <div><?=$item->user_name?></div>
                                            <div><?=$item->creat_date?></div>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        </section>
                        <?php }?>
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
