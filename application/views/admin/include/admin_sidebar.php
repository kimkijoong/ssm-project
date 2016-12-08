<!-- START PAGE SIDEBAR -->
<div class="page-sidebar">
    <!-- START X-NAVIGATION -->
    <ul class="x-navigation">
        <li class="xn-logo">
            <a href="/Admin">ADMIN</a>
            <a href="#" class="x-navigation-control"></a>
        </li>
        <li class="xn-profile">
            <a href="#" class="profile-mini">
                <img src="<?php echo $this->session->userdata('member_profile_img')?>" alt="John Doe"/>
            </a>
            <div class="profile">
                <div class="profile-image">
                    <img src="<?php echo $this->session->userdata('member_profile_img')?>" alt="John Doe"/>
                </div>
                <div class="profile-data">
                    <div class="profile-data-name"><?php echo $this->session->userdata('member_name')?></div>
                    <div class="profile-data-title">Web Developer/Designer</div>
                </div>
                <div class="profile-controls">
                    <a href="/Admin/user_edit_profile_page/<?=$this->session->userdata('member_seq')?>/user_admin/user_list" class="profile-control-left"><span class="fa fa-info"></span></a>
                    <a href="pages-messages.html" class="profile-control-right"><span class="fa fa-envelope"></span></a>
                </div>
            </div>
        </li>
        <li class="xn-title">Navigation</li>
        <!--<li class="xn-openable">
            <a href="#"><span class="fa fa-dashboard"></span> <span class="xn-text">Dashboards</span></a>
            <ul>
                <li><a href="index.html"><span class="xn-text">Dashboard 1</span></a></li>
            </ul>
        </li>-->
        <li class="xn-openable user_admin">
            <a href="#"><span class="fa fa-files-o"></span> <span class="xn-text">회원 관리</span></a>
            <ul>
                <li class="user_list"><a href="/Admin/user_list/user_admin/user_list"><span class="fa fa-users"></span>회원 리스트</a></li>
            </ul>
        </li>
        <!--<li class="xn-openable boarder_admin">
            <a href="#"><span class="fa fa-files-o"></span> <span class="xn-text">게시판 관리</span></a>
            <ul>
                <li class="boarder_admin_page"><a href="/Admin/boarder_admin_page/boarder_admin/boarder_admin_page"><span class="fa fa-users"></span>게시판관리</a></li>
            </ul>
        </li>-->
        <li class="xn-openable post_admin">
            <a href="#"><span class="fa fa-files-o"></span> <span class="xn-text">게시글 관리</span></a>
            <?php
                foreach($categorys as $boarder_category){
            ?>
                    <ul>
                        <li class="<?echo $boarder_category->boarder_name?>"><a href="/Admin/boarder_post_list/<?echo $boarder_category->seq?>/0/post_admin/<?echo $boarder_category->boarder_name?>"><span class="fa fa-users"></span><?echo $boarder_category->boarder_name?></a></li>
                    </ul>
            <?php
                }
            ?>
        </li>
    </ul>
    <!-- END X-NAVIGATION -->
</div>
<!-- END PAGE SIDEBAR -->
<!-- PAGE CONTENT -->
<div class="page-content">