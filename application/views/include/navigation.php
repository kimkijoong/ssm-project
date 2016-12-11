<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<header class="header">
    <div class="logo">
        <h1 class="readable-hidden">씀 로고(메인화면으로 바로가기)</h1>

        <a href="/Home/main">
            <img src="" alt="씀 로고 - 메인화면으로 가기">씀
        </a>
    </div>

    <!--  menu displayed on the Desktop / Mobile -->
    <nav class="nav">
        <h1 class="readable-hidden">씀 메뉴</h1>

        <button type="button">
            <img src="" alt="메뉴 아이콘">
        </button>

        <section class="box-menu">
            <section>
                <h2 class="readable-hidden">사용자 프로필</h2>

                <a class="profile" href="#">
                    <img class="user-profile" src="<?= $this->session->userdata('user_profile')?>" alt="사용자 프로필 사진">
                    <p class="pen-name"><?= $this->session->userdata('user_name')?></p>
                </a>
            </section>
            <hr>
            <ul class="menu">
                <li><a href="/Home/openSsmList">공개 씀</a></li>
                <li><a href="/Home/mySsmList">나의 씀</a></li>
                <li><a href="/Home/bringInSsm">책갈피</a></li>
            </ul>
            <hr>
            <section>
                <a class="setting" href="/Member/my_page">설정</a>
                <?php if($this->session->userdata('is_login')) { ?>
                    <form action="/Member/logout" method="POST">
                        <fieldset>
                            <input name="return_url" type="hidden" value="<?="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];?>">
                        </fieldset>
                        <button class="logout_btn" type="submit">로그아웃</button>
                    </form>
                <?php  } else { ?>
                    <a href="/Member/login_page">로그인</a>
                <?php } ?>
            </section>
            <section>
                <h2 class="readable-hidden">SSUM SNS</h2>

                <a class="sns-facebook" href="#"><img src="" alt="페이스북"></a>
                <a class="sns-twitter" href="#"><img src="" alt="트위터"></a>
                <a class="sns-instagram" href="#"><img src="" alt="인스타그램"></a>
            </section>
            <button class="menu-close" type="button">X</button>
        </section>
    </nav>


    <!-- <div class="search-bar">
        <button class="search"><img src="" alt="검색"></button>
    </div> -->
    <!-- 검색 클릭 시, -->
    <h1 class="readable-hidden">search</h1>

    <form class="" action="" method="post">
        <fieldset>
            <label class="" for="search">search</label>
            <input id="search" type="text" data-ng-model="search.topic">
            <input id="datepicker" type="text" data-ng-model="dateRange.startDate">
            <input id="datepicker2" type="text" data-ng-model="dateRange.endDate">
        </fieldset>
        <button class="search" type="submit"><img src="" alt="검색"></button>
    </form>
    <div class="date-topic-list" role="오늘의 주제" data-ng-cloak data-ng-repeat="List in TopicList.topicData | dateRange: startDate : endDate">
        <p ng-switch on="List.category">오늘의 주제<br><span ng-switch-when="0">낮</span><span ng-switch-default>밤</span></p>
        <p role="topic">{{List.topic}}</p>
        <a href="/Home/write_page/{{List.seq}}"><img src="" alt="글 작성"></a>
    </div>
    <pre>{{ dateRange | json }}</pre>
</header>