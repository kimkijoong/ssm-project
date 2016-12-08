<?php
    foreach($data as $boarder_view){
?>
    <div class="container boarder_padding_top_container">
        <div class="row">
            <div class="well"><?php echo $boarder_view->boarder_post_title?></div>
            <div class="col-md-5 text-left">
                <p>작성자: <?php echo $boarder_view->boarder_post_create_member?></p>
            </div>
            <div class="col-md-6 text-right">
                <p>작성날짜: <?php echo $boarder_view->boarder_post_create_date?></p>
            </div>
            <div class="text-right col-md-1">
                <p>조회수: <?php echo $boarder_view->boarder_post_hits?></p>
            </div>
            <div class="col-md-12 post_change_btn">
                <?php
                if($this->session->userdata('member_id') == $boarder_view->boarder_post_create_member || $this->session->userdata('member_id') == "master"){
                    ?>
                    <a href="javascript:update_post_write()">수정</a> | <a href="javascript:delete_post()">삭제</a>
                    <form action="" method="post" class="page_view_post_writeform">
                        <input type="hidden" name="seq" value="<?=$page_seq?>">
                        <input type="hidden" name="bo_table" value="<? echo $boarder_view->boarder_seq?>"/>
                    </form>
                    <form action="" method="post" class="page_view_post_deleteform">
                        <input type="hidden" name="seq[]" value="<?=$page_seq?>">
                        <input type="hidden" name="bo_table" value="<? echo $bo_table?>"/>
                    </form>
                    <?php
                }
                ?>
            </div>
        </div>
        <hr />
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 post_view_content">
                <?php echo $boarder_view->boarder_post_content?>
            </div>
        </div>
        <hr />
    </div>
<?php
    }
?>
<?php
    if($this->session->userdata('member_id')){
?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-1">
                    <p>댓글입력</p>
                </div>
                <form class="comment_view_form" action="/Boarder/comment_insert" method="post">
                    <div class="col-md-9">
                        <input type="hidden" name="comment_seq" value="0">
                        <input type="hidden" name="post_seq" value="<?php echo $page_seq?>"/>
                        <input type="hidden" name="comment_insert_member_seq" value="<?php echo $this->session->userdata('member_seq')?>"/>
                        <input type="hidden" name="referer_url" value="<?php echo current_url();?>">
                        <textarea name="comment" class="form-control" rows="3"></textarea>
                    </div>
                    <div class="col-md-2">
                        <p class="p_tag_nomargin">비밀글 <input class="control-label" type="checkbox" name="comment_secret" value="1"></p>
                        <button type="submit" class="btn btn-default">입력</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
        <?php
    }
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-4">
                <h5>댓글</h5>
            </div>
        </div>

        <?php
            foreach($data2 as $boarder_comment){
        ?>
            <div class="col-md-12 comment_container">
                <form method="post" class="comment_view_form" action="/Boarder/comment_insert">
                    <div class="col-md-1 comment_profile_img_box">
                        <div class="member_profile_img_war">
                            <img class="member_profile_img" src="<?php echo $boarder_comment->member_profile_img?>">
                        </div>
                    </div>
                    <div class="col-md-9">
                        <input type="hidden" class="referer_url" name="referer_url" value="<?php echo current_url();?>">
                        <input type="hidden" name="comment_seq" value="<?php echo $boarder_comment->seq?>">
                        <h5 class="comment_member_name"><?php echo $boarder_comment->member_name?></h5><p class="comment_date"><?php echo $boarder_comment->comment_insert_date?></p>
                        <?php
                            if($boarder_comment->comment_secret == "1"){
                                if($this->session->userdata('member_seq') == $boarder_comment->comment_insert_member_seq || $this->session->userdata('member_seq') == 1){
                        ?>
                                <p class="comment_content comment_content<?php echo $boarder_comment->seq?>"><?php echo $boarder_comment->comment?></p>
                                <textarea name="comment" class="form-control comment_content_textarea comment_content_textarea<?php echo $boarder_comment->seq?>" rows="3"><?php echo $boarder_comment->comment?></textarea>
                        <?php
                                } else {
                        ?>
                                <p class="comment_content">비밀댓글입니다.</p>
                        <?php
                                }
                            } else {
                        ?>
                            <p class="comment_content comment_content<?php echo $boarder_comment->seq?>"><?php echo $boarder_comment->comment?></p>
                            <textarea name="comment" class="form-control comment_content_textarea comment_content_textarea<?php echo $boarder_comment->seq?>" rows="3"><?php echo $boarder_comment->comment?></textarea>
                        <?php
                            }
                        ?>
                    </div>
                    <div class="col-md-2">
                        <?php
                            if($this->session->userdata('member_seq') == $boarder_comment->comment_insert_member_seq || $this->session->userdata('member_seq') == 1){
                        ?>
                            <p><a class="comment_change comment_change<?php echo $boarder_comment->seq?>" href="javascript:comment_btn('<?php echo $boarder_comment->seq?>')">수정</a> | <a class="comment_delete comment_delete<?php echo $boarder_comment->seq?>" href="javascript:comment_delete_btn('<?php echo $boarder_comment->seq?>')">삭제</a></p>
                            <p class="p_tag_nomargin comment_secret_btn comment_secret_btn<?php echo $boarder_comment->seq?>">비밀글 <input class="control-label" type="checkbox" name="comment_secret" <?php if($boarder_comment->comment_secret == "1"){?>checked<?php }?> value="1"></p>
                            <button type="submit" class="btn btn-default comment_change_update_btn comment_change_update_btn<?php echo $boarder_comment->seq?>">입력</button>
                        <?php
                            }
                        ?>
                    </div>
                </form>
            </div>
        <?php
            }
        ?>
    </div>
</div>
