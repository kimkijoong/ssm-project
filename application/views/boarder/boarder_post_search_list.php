<div class="container boarder_padding_top_container">
    <form action="/Boarder/delete_post" method="POST">
        <input type="hidden" name="referer_url" value="<?php echo current_url();?>">
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <thead>
                    <tr>
                        <?php
                        if($this->session->userdata('member_id') == "master"){
                            ?>
                            <th>
                                <label>
                                    <input class="control-label boarder_list_chk" type="checkbox" value="">
                                </label>
                            </th>
                        <?php }?>
                        <th class="center_th_aligh">번호</th>
                        <th class="center_th_aligh">글 제목</th>
                        <th class="center_th_aligh">작성자</th>
                        <th class="center_th_aligh">작성날짜</th>
                        <th class="center_th_aligh">조회수</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $i = count ($data);
                    foreach($data as $boarder_num){
                        ?>
                        <tr>
                            <?php
                            if($this->session->userdata('member_id') == "master"){
                                ?>
                                <td>
                                    <label>
                                        <input class="control-label boarder_list_chk_list" type="checkbox" name="seq[]" value="<?php echo $boarder_num->seq ?>">
                                    </label>
                                </td>
                            <?php }?>
                            <td class="center_th_aligh"><?php echo $boarder_num->new_seq ?></td>
                            <td class="center_th_aligh">
                                <?php
                                if($boarder_num->boarder_post_secret == "1"){
                            ?>
                                    <a href="/Boarder/view_post_page/<?php echo $bo_table ?>/<?php echo $boarder_num->seq ?>"><?php echo $boarder_num->boarder_post_title?></a> <i class="fa fa-lock"></i>
                            <?php
                                } else {
                            ?>
                                    <a href="/Boarder/view_post_page/<?php echo $bo_table ?>/<?php echo $boarder_num->seq ?>"><?php echo $boarder_num->boarder_post_title?></a></i>
                            <?php
                                }
                                ?>
                            </td>
                            <td class="center_th_aligh"><?php echo $boarder_num->boarder_post_create_member?></td>
                            <td class="center_th_aligh"><?php echo $boarder_num->boarder_post_create_date?></td>
                            <td class="center_th_aligh"><?php echo $boarder_num->boarder_post_hits?></td>
                        </tr>
                        <?php
                    }
                    ?>

                    </tbody>
                </table>
            </div>
            <div class="col-md-4 col-md-offset-4 text-center">
                <ul class="pagination">
                    <li>
                        <a href="/Boarder/boarder_post_search/<?php echo $bo_table?>/0/<?php echo $category?>/<?php echo $boarder_list_search_input?>">&laquo;</a>
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
                    for($i ; $i < $s ; $i++){
                        ?>

                        <li
                            <?php if($boarder_page == $i-1){?>
                                class="active"
                            <?php }?>
                        >
                            <a href="/Boarder/boarder_post_search/<?php echo $bo_table?>/<?php echo $i-1?>/<?php echo $category?>/<?php echo $boarder_list_search_input?>"><?php echo $i?> <span class="sr-only">(current)</span></a>
                        </li>

                    <?php } ?>
                    <li>
                        <a href="/Boarder/boarder_post_search/<?php echo $bo_table?>/<?php echo $bo_table_page-1?>/<?php echo $category?>/<?php echo $boarder_list_search_input?>">&raquo;</a>
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

        </div>
    </form>
    <div class="col-md-4 col-md-offset-4 text-center">
        <select class="search_category" name="search_category">
            <option value="all">전체</option>
            <option value="boarder_post_title">제목</option>
            <option value="boarder_post_create_member">작성자</option>
        </select>
        <input type="hidden" class="bo_table" name="bo_table" value="<?php echo $bo_table?>"/>
        <input type="text" class="boarder_list_search_input" name="boarder_list_search_input" placeholder="Search..."/>
    </div>
</div>
