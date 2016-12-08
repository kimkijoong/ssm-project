        <section class="content-block team-1 team-1-2 boarder_padding_top_container">
            <div class="container">
                <div class="underlined-title">
                    <h1>게시판</h1>
                    <hr>
                </div>
                <div class="row">
                    <?php
                    $i = count ($data);
                    foreach($data as $boarder_num){
                    ?>
                        <div class="col-md-4 col-sm-6 team-member-wrap">
                            <div class="team-member">
                                <?php
                                if($boarder_num->boarder_post_secret == "1"){
                                ?>
                                    <div class="thumbnail_img_box"><a href="/Boarder/view_post_page/<?php echo $bo_table ?>/<?php echo $boarder_num->seq ?>"><img src="<?php echo $boarder_num->boarder_post_thumbnail_img ?>" class="img-responsive" alt="Member Image"></a></div>
                                    <div class="team-details">
                                        <a href="/Boarder/view_post_page/<?php echo $bo_table ?>/<?php echo $boarder_num->seq ?>"><h4 class="member-name post_title"><p><?php echo $boarder_num->boarder_post_title?></p></h4></a>
                                        <p class="post_member_name"><?php echo $boarder_num->boarder_post_create_member?></p> <i class="fa fa-lock"></i>
                                        <p class="boarder_card_sub_title"><?php echo $boarder_num->boarder_post_sub_title?></p>
                                    </div>
                                <?php
                                    } else {
                                ?>
                                    <div class="thumbnail_img_box"><a href="/Boarder/view_post_page/<?php echo $bo_table ?>/<?php echo $boarder_num->seq ?>"><img src="<?php echo $boarder_num->boarder_post_thumbnail_img ?>" class="img-responsive" alt="Member Image"></a></div>
                                    <div class="team-details">
                                        <a href="/Boarder/view_post_page/<?php echo $bo_table ?>/<?php echo $boarder_num->seq ?>"><h4 class="member-name post_title"><p><?php echo $boarder_num->boarder_post_title?></p></h4></a>
                                        <p class="post_member_name"><?php echo $boarder_num->boarder_post_create_member?></p>
                                        <p class="boarder_card_sub_title"><?php echo $boarder_num->boarder_post_sub_title?></p>
                                    </div>
                                <?php
                                    }
                                ?>

                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
                <!-- /.row -->
            </div>
            <div class="container">
                <div class="col-md-4 col-md-offset-4 text-center">
                    <ul class="pagination">
                        <li>
                            <a href="/Boarder/boarder_list/<?php echo $bo_table?>/0">&laquo;</a>
                        </li>
                        <?php
                        /*$bo_table_page은 전체페이지수
                          $boarder_page은 현제페이지수 시작은0부터시작
                        */
                        if($bo_table_page < 6){
                            $s = $bo_table_page+1;
                            $i = 1;
                        } else{
                            if($boarder_page < 3){
                                $s = 6;
                                $i = 1;
                            } else if($boarder_page > 2) {
                                $s = $boarder_page+4;
                                $i = $boarder_page-1;
                                if($s >= $bo_table_page+1){
                                    $s = $bo_table_page+1;
                                    $i = $bo_table_page-4;
                                }
                            }
                        }
                        for($i ; $i < $s ; ++$i){
                            ?>

                            <li
                                <?php if($boarder_page == $i-1){?>
                                    class="active"
                                <?php }?>
                            >
                                <a href="/Boarder/boarder_list/<?php echo $bo_table?>/<?php echo $i-1?>"><?php echo $i?> <span class="sr-only">(current)</span></a>
                            </li>

                        <?php } ?>
                        <li>
                            <a href="/Boarder/boarder_list/<?php echo $bo_table?>/<?php echo $bo_table_page-1?>">&raquo;</a>
                        </li>
                    </ul>
                </div>
                <?php
                if($this->session->userdata('member_level')>0){
                    ?>
                    <div class="col-md-4 text-right">
                        <?php
                        if($this->session->userdata('member_level')>5){
                            ?>
                            <button type="submit" class="btn btn-danger">삭제</button>
                            <?php
                        }
                        ?>
                        <button class="btn btn-primary boarder_list_insert_btn" type="button">글쓰기</button>
                    </div>
                    <?php
                }
                ?>
                <!-- /.row -->
            </div>
            <!-- /.container -->
        </section>
