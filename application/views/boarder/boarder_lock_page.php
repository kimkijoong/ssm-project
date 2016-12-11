<div class="lockscreen-container">

    <div class="lockscreen-box animated fadeInDown">

        <div class="lsb-access">
            <div class="lsb-box">
                <div class="fa fa-lock"></div>
                <div class="user animated fadeIn">
                    <?php
                    $user_profile_img = $this->session->userdata('member_profile_img');
                    if(isset($user_profile_img)){
                    ?>
                        <img src="<?php echo $this->session->userdata('member_profile_img')?>"/>
                    <?php } else {?>
                        <img src="/static/lib/images/unimages.PNG"/>
                    <?php
                    }
                    ?>

                </div>
            </div>
        </div>

        <div class="lsb-form animated fadeInDown">
            <form action="/Boarder/view_post_page/<?php echo $bo_table?>/<?php echo $page_seq?>" method="post" class="form-horizontal">
                <div class="form-group">
                    <div class="col-md-12">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <span class="fa fa-lock"></span>
                            </div>
                            <input type="password" name="boarder_post_pw" class="form-control" placeholder="Password"/>
                        </div>
                    </div>
                </div>
                <input type="submit" class="hidden"/>
            </form>
        </div>

    </div>

</div>