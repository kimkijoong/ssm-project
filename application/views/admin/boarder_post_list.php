                <ul class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Tables</a></li>
                    <li class="active">Export</li>
                </ul>
                <!-- END BREADCRUMB -->
                
                <!-- PAGE TITLE -->
                <div class="page-title">                    
                    <h2><span class="fa fa-arrow-circle-o-left"></span> 게시글관리</h2>
                </div>
                <!-- END PAGE TITLE -->                
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                
                    
                    
                    <div class="row">
                        <div class="col-md-12">
                            
                            <!-- START DATATABLE EXPORT -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><?php echo $category2 ?></h3>
                                    <!--<div class="btn-group pull-right">
                                        <button class="btn btn-danger dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i> Export Data</button>
                                        <ul class="dropdown-menu">
                                            <li><a href="#" onClick ="$('#customers2').tableExport({type:'json',escape:'false'});"><img src='/static/lib/bootstrap/img/icons/json.png' width="24"/> JSON</a></li>
                                            <li><a href="#" onClick ="$('#customers2').tableExport({type:'json',escape:'false',ignoreColumn:'[2,3]'});"><img src='/static/lib/bootstrap/img/icons/json.png' width="24"/> JSON (ignoreColumn)</a></li>
                                            <li><a href="#" onClick ="$('#customers2').tableExport({type:'json',escape:'true'});"><img src='/static/lib/bootstrap/img/icons/json.png' width="24"/> JSON (with Escape)</a></li>
                                            <li class="divider"></li>
                                            <li><a href="#" onClick ="$('#customers2').tableExport({type:'xml',escape:'false'});"><img src='/static/lib/bootstrap/img/icons/xml.png' width="24"/> XML</a></li>
                                            <li><a href="#" onClick ="$('#customers2').tableExport({type:'sql'});"><img src='/static/lib/bootstrap/img/icons/sql.png' width="24"/> SQL</a></li>
                                            <li class="divider"></li>
                                            <li><a href="#" onClick ="$('#customers2').tableExport({type:'csv',escape:'false'});"><img src='/static/lib/bootstrap/img/icons/csv.png' width="24"/> CSV</a></li>
                                            <li><a href="#" onClick ="$('#customers2').tableExport({type:'txt',escape:'false'});"><img src='/static/lib/bootstrap/img/icons/txt.png' width="24"/> TXT</a></li>
                                            <li class="divider"></li>
                                            <li><a href="#" onClick ="$('#customers2').tableExport({type:'excel',escape:'false'});"><img src='/static/lib/bootstrap/img/icons/xls.png' width="24"/> XLS</a></li>
                                            <li><a href="#" onClick ="$('#customers2').tableExport({type:'doc',escape:'false'});"><img src='/static/lib/bootstrap/img/icons/word.png' width="24"/> Word</a></li>
                                            <li><a href="#" onClick ="$('#customers2').tableExport({type:'powerpoint',escape:'false'});"><img src='/static/lib/bootstrap/img/icons/ppt.png' width="24"/> PowerPoint</a></li>
                                            <li class="divider"></li>
                                            <li><a href="#" onClick ="$('#customers2').tableExport({type:'png',escape:'false'});"><img src='/static/lib/bootstrap/img/icons/png.png' width="24"/> PNG</a></li>
                                            <li><a href="#" onClick ="$('#customers2').tableExport({type:'pdf',escape:'false'});"><img src='/static/lib/bootstrap/img/icons/pdf.png' width="24"/> PDF</a></li>
                                        </ul>
                                    </div>     -->
                                    
                                </div>
                                <div class="">
                                        <div class="row">
                                            <div class="col-md-12 table_col">
                                                <table class="table">
                                                    <thead>
                                                    <tr>
                                                        <th class="center_th_aligh">번호</th>
                                                        <th class="center_th_aligh">글 제목</th>
                                                        <th class="center_th_aligh">작성자</th>
                                                        <th class="center_th_aligh">작성날짜</th>
                                                        <th class="center_th_aligh">조회수</th>
                                                        <th width="170">actions</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                    $i = count ($data);
                                                    foreach($data as $boarder_num){
                                                        ?>
                                                        <tr id="<?php echo $boarder_num->seq?>">
                                                            <td class="center_th_aligh"><?php echo $boarder_num->new_seq ?></td>
                                                            <td class="center_th_aligh">
                                                                <?php
                                                                if($boarder_num->boarder_post_secret == "1"){
                                                            ?>
                                                                    <a href="/Admin/boarder_edit_post/<?php echo $boarder_num->seq ?>/<?php echo $category ?>/<?php echo $category2 ?>"><?php echo $boarder_num->boarder_post_title?></a> <i class="fa fa-lock"></i>
                                                            <?php
                                                                } else {
                                                            ?>
                                                                    <a href="/Admin/boarder_edit_post/<?php echo $boarder_num->seq ?>/<?php echo $category ?>/<?php echo $category2 ?>"><?php echo $boarder_num->boarder_post_title?></a></i>
                                                            <?php
                                                                }
                                                                ?>
                                                            </td>
                                                            <td class="center_th_aligh"><?php echo $boarder_num->boarder_post_create_member?></td>
                                                            <td class="center_th_aligh"><?php echo $boarder_num->boarder_post_create_date?></td>
                                                            <td class="center_th_aligh"><?php echo $boarder_num->boarder_post_hits?></td>
                                                            <td>
                                                                <button class="btn btn-default btn-rounded btn-condensed btn-sm"><a href="/Admin/boarder_edit_post/<?=$boarder_num->seq?>/<?php echo $category ?>/<?php echo $category2 ?>"><span class="fa fa-pencil"></span></a></button>
                                                                <button class="btn btn-danger btn-rounded btn-condensed btn-sm" onClick="delete_post('<?=$boarder_num->seq?>');"><span class="fa fa-times"></span></button>
                                                            </td>
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
                                                        <a href="/Admin/boarder_post_list/<?php echo $boarder_seq?>/0/<?php echo $category?>/<?php echo $category2?>">&laquo;</a>
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
                                                            <a href="/Admin/boarder_post_list/<?php echo $boarder_seq?>/<?php echo $i-1?>/<?php echo $category?>/<?php echo $category2?>"><?php echo $i?> <span class="sr-only">(current)</span></a>
                                                        </li>

                                                    <?php } ?>
                                                    <li>
                                                        <a href="/Admin/boarder_post_list/<?php echo $boarder_seq?>/<?php echo $bo_table_page-1?>/<?php echo $category?>/<?php echo $category2?>">&raquo;</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    <!--<div class="col-md-4 col-md-offset-4 text-center">
                                        <select class="search_category" name="search_category">
                                            <option value="all">전체</option>
                                            <option value="boarder_post_title">제목</option>
                                            <option value="boarder_post_create_member">작성자</option>
                                        </select>
                                        <input type="hidden" class="bo_table" name="bo_table" value="<?php /*echo $boarder_seq*/?>"/>
                                        <input type="text" class="boarder_list_search_input" name="boarder_list_search_input" placeholder="Search..."/>
                                    </div>-->
                                </div>
                            </div>
                            <!-- END DATATABLE EXPORT -->                            
                            
                            <!-- START DEFAULT TABLE EXPORT -->
                            <!-- END DEFAULT TABLE EXPORT -->

                        </div>
                    </div>

                </div>         
                <!-- END PAGE CONTENT WRAPPER -->
            </div>            
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->    

        <!-- MESSAGE BOX-->
        <div class="message-box animated fadeIn" data-sound="alert" id="mb-remove-row">
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title"><span class="fa fa-times"></span> Remove <strong>Data</strong> ?</div>
                    <div class="mb-content">
                        <p>Are you sure you want to remove this row?</p>                    
                        <p>Press Yes if you sure.</p>
                    </div>
                    <div class="mb-footer">
                        <div class="pull-right">
                            <button class="btn btn-success btn-lg mb-control-yes">Yes</button>
                            <button class="btn btn-default btn-lg mb-control-close">No</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MESSAGE BOX-->        
        
        <!-- MESSAGE BOX-->
        <div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title"><span class="fa fa-sign-out"></span> Log <strong>Out</strong> ?</div>
                    <div class="mb-content">
                        <p>Are you sure you want to log out?</p>                    
                        <p>Press No if youwant to continue work. Press Yes to logout current user.</p>
                    </div>
                    <div class="mb-footer">
                        <div class="pull-right">
                            <a href="pages-login.html" class="btn btn-success btn-lg">Yes</a>
                            <button class="btn btn-default btn-lg mb-control-close">No</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MESSAGE BOX-->






