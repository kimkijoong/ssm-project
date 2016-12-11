        <div class="container boarder_padding_top_container">
            <div class="row">
                <div class="col-md-12">
                        <form action="/Boarder/insert_post" id="boarder_insert_form" class="boarder_insert_form form-horizontal" method="post" enctype="multipart/form-data">
                            <input type="hidden" class="form-control thumbnail_profile_img" name="boarder_post_thumbnail_img" placeholder="Placeholder text" value="/static/lib/images/unimages_post.jpg">
                            <div class="panel panel-default">
                                <div class="panel-body form-group-separated">

                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">카테고리</label>
                                        <div class="col-md-6 col-xs-12">
                                            <select name="boarder_seq" class="form-control select">
                                                <?php
                                                foreach($data2 as $data2){
                                                    ?>
                                                    <option value="<?=$data2->seq?>" ><?=$data2->boarder_name?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                            <span class="help-block">Select box example</span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">대표이미지</label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <img src="" class="img-responsive thumbnail_view_img" data-target="#modal1" data-toggle="modal" />
                                                <br/>
                                                <span class="btn btn-primary" data-target="#modal1" data-toggle="modal">이미지 업로드</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">제목</label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" class="form-control insert_post_title" name="insert_post_title" value=""/>
                                            </div>
                                            <span class="help-block">This is sample of text field</span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">비밀글</label>
                                        <div class="col-md-6 col-xs-12">
                                            <label class="check"><input type="checkbox" class="icheckbox" name="boarder_post_secret" value="1" checked="checked"/> 이 글을 비밀로 작성 하겠습니다.</label>
                                        </div>
                                    </div>

                                    <div class="form-group password_form_group">
                                        <label class="col-md-3 col-xs-12 control-label">비밀번호</label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-unlock-alt"></span></span>
                                                <input type="password" class="form-control insert_post_pw" name="insert_post_pw" value=""/>
                                            </div>
                                            <span class="help-block">Password field sample</span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">부제목</label>
                                        <div class="col-md-6 col-xs-12">
                                            <textarea  name="boarder_post_sub_title" class="form-control boarder_post_sub_title" id="boarder_post_sub_title" rows="5"></textarea>
                                            <span class="help-block">Default textarea field</span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">내용</label>
                                        <div class="col-md-6 col-xs-12">
                                            <textarea id="ir1" class="form-control" name="insert_post_textarea"  rows="5"></textarea>
                                            <span class="help-block">Default textarea field</span>
                                        </div>
                                    </div>
                                    <!--<div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">File</label>
                                        <div class="col-md-6 col-xs-12">
                                            <input type="file" class="fileinput btn-primary" name="filename" id="filename" title="Browse file"/>
                                            <span class="help-block">Input type file</span>
                                        </div>
                                    </div>-->
                                </div>
                                <div class="panel-footer">
                                    <button type="button" class="btn btn-success multi_upload_btn" data-target="#modal2" data-toggle="modal">이미지 선택</button>
                                    <a class="btn btn-default form_clear_btn">Clear Form</a>
                                    <button class="btn btn-primary pull-right insert_post_btn">Submit</button>
                                </div>
                            </div>
                        </form>

                </div>
            </div>
        </div>
        <!--대 표 이 미 지 업 로 드-->
        <div class="modal fade pg-show-modal" id="modal1" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog"> 
                <div class="modal-content"> 
                    <div class="modal-header"> 
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>                         
                        <h4 class="modal-title">대표이미지 업로드</h4> 
                    </div>
                    <form role="form" action="/Boarder/img_upload" method="post" class="img_upload_form" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="underlined-title text-left">
                                <input type="file" class="form-control user_file" name="user_file" placeholder="Placeholder text">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default thumbnail_close_btn" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary thumbnail_upload_btn">업로드</button>
                        </div>
                    </form>
                </div>
            </div>             
        </div>
        <!--컨 텐 츠 이 미 지 업 로 드-->
        <div class="modal fade pg-show-modal" id="modal2" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">이미지 업로드</h4>
                    </div>
                    <form role="form" action="/Boarder/multi_img_upload" method="post" class="multi_upload_form" enctype="multipart/form-data">
                        <div class="modal-body">
                            <!--<div class="col-md-12">
                                <ul class="pager upload_input_pager">
                                    <li>
                                        <a class="multi_upload_inputfile_append" href="#">+</a>
                                    </li>
                                    <li>
                                        <a class="multi_upload_inputfile_subtract" href="#">-</a>
                                    </li>

                                </ul>
                            </div>-->
                            <div class="underlined-title text-left multi_upload_inputfile_war">
                                <input type="file" class="form-control multi_user_file" name="user_file[]" placeholder="Placeholder text" multiple>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default thumbnail_close_btn" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary thumbnail_upload_btn">업로드</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--파 일 업 로 드-->
        <div class="modal fade pg-show-modal" id="modal3" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">파일 업로드</h4>
                    </div>
                    <form role="form" action="/Boarder/multi_img_upload" method="post" class="multi_upload_form" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="underlined-title text-left multi_upload_inputfile_war">
                                <input type="file" class="form-control multi_user_file" name="user_file[]" placeholder="Placeholder text" multiple>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default thumbnail_close_btn" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary thumbnail_upload_btn">업로드</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

