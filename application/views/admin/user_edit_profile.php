                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Pages</a></li>
                    <li><a href="#">Edit Profile</a></li>
                    <li class="active">John Doe</li>
                </ul>
                <!-- END BREADCRUMB -->                                                
                
                <!-- PAGE TITLE -->
                <div class="page-title">                    
                    <h2><span class="fa fa-cogs"></span> Edit Profile</h2>
                </div>
                <!-- END PAGE TITLE -->                     
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                    <?php
                        foreach($data as $data){
                    ?>
                    <!--<div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-warning" role="alert">
                                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                <strong>Important!</strong> Main feature of this page is "Change photo" function. Press button "Change photo" and try to use this awesome feature.
                            </div>                            
                        </div>
                    </div>     -->
                    
                    <div class="row">                        
                        <div class="col-md-5 col-sm-12 col-xs-12">
                            <form action="#" class="form-horizontal">
                            <div class="panel panel-default">                                
                                <div class="panel-body">
                                    <h3><span class="fa fa-user"></span> <?php echo $data->member_name?></h3>
                                    <p>Web Developer / Administrator</p>
                                    <div class="text-center" id="user_image">
                                        <img class="profile_view_img img-responsive" src="<?php echo $data->member_profile_img;?>" class="img-thumbnail"/>
                                    </div>                                    
                                </div>
                                <div class="panel-body form-group-separated">
                                    
                                    <div class="form-group">                                        
                                        <div class="col-md-12 col-xs-12">
                                            <a href="#" class="btn btn-primary btn-block btn-rounded" data-toggle="modal" data-target="#modal_change_photo">Change Photo</a>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">#ID</label>
                                        <div class="col-md-9 col-xs-7">
                                            <input type="text" value="<?php echo $data->member_id?>" class="form-control" disabled/>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">닉네임</label>
                                        <div class="col-md-9 col-xs-7">
                                            <input type="text" value="<?php echo $data->member_name?>" class="form-control" disabled/>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">회원등급</label>
                                        <div class="col-md-9 col-xs-7">
                                            <input type="text" value="<?php echo $data->member_level?>" class="form-control" disabled/>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">                                        
                                        <div class="col-md-12 col-xs-12">
                                            <a href="#" class="btn btn-danger btn-block btn-rounded" data-toggle="modal" data-target="#modal_change_password">Change password</a>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            </form>
                            
                        </div>
                        <div class="col-md-7 col-sm-12 col-xs-12">
                            
                            <form action="/Admin/user_edit_profile" class="form-horizontal profile_update_form" method="POST">
                                <input type="hidden" name="seq" value="<?php echo $user_seq;?>">
                                <input type="hidden" class="member_profile_img" name="member_profile_img" value="<?php echo $data->member_profile_img;?>">
                                <div class="panel panel-default">
                                <div class="panel-body">
                                    <h3><span class="fa fa-pencil"></span> Profile</h3>
                                    <p>This information lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer faucibus, est quis molestie tincidunt, elit arcu faucibus erat.</p>
                                </div>
                                <div class="panel-body form-group-separated">
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">닉네임</label>
                                        <div class="col-md-9 col-xs-7">
                                            <input type="text" name="member_name" value="<?php echo $data->member_name?>" class="form-control member_name"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">회원등급</label>
                                        <div class="col-md-9 col-xs-7">
                                            <select name="member_level" class="form-control select">
                                                <option value="10" <?php if($data->member_level == 10){ ?>selected<?php } ?>>관리자</option>
                                                <option value="1" <?php if($data->member_level == 1){ ?>selected<?php } ?>>일반</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">About me</label>
                                        <div class="col-md-9 col-xs-7">
                                            <textarea class="form-control" name="member_about" rows="5"><?php  $about = $data->member_about; if($about == "" || $about == NULL){} else { echo $about; } ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12 col-xs-12">
                                            <button type="submit" class="btn btn-primary btn-rounded pull-right">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </form>
                            

                        </div>
                        

                    </div>
                    <?php
                        }
                    ?>
                </div>
                <!-- END PAGE CONTENT WRAPPER -->                                                 
            </div>            
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->

        <!-- MODALS -->
                <div class="modal animated fadeIn" id="modal_change_photo" tabindex="-1" role="dialog" aria-labelledby="smallModalHead" aria-hidden="true">
                    <form role="form" action="/Member/profile_upload" enctype="multipart/form-data" class="profile_img_upload_form" method="POST" >
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                    <h4 class="modal-title" id="smallModalHead">프로필 이미지업로드</h4>
                                </div>
                                <div class="modal-body form-horizontal form-group-separated">
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">New Photo</label>
                                        <div class="col-md-4">
                                            <input type="file" class="fileinput btn-info" name="user_file" id="cp_photo" data-filename-placement="inside" title="Select file"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success">업로드</button>
                                    <button type="button" class="btn btn-default profile_close_btn" data-dismiss="modal">취소</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

        <div class="modal animated fadeIn" id="modal_change_password" tabindex="-1" role="dialog" aria-labelledby="smallModalHead" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="/Admin/user_pw_change" class="pw_change_form" id="pw_change_form" method="post">
                        <input type="hidden" class="pw_change_seq" name="seq" value="<?php echo $user_seq?>">
                        <input type="hidden" class="admin_pw_chk" name="pw_chk" value="">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <h4 class="modal-title" id="smallModalHead">Change password</h4>
                        </div>
                        <div class="modal-body form-horizontal form-group-separated">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Old Password</label>
                                <div class="col-md-9">
                                    <input type="password" class="form-control pw_change_old_password" name="old_password"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">New Password</label>
                                <div class="col-md-9">
                                    <input type="password" class="form-control admin_insert_pw pw_change_new_password" name="new_password"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Repeat New</label>
                                <div class="col-md-9">
                                    <input type="password" class="form-control admin_insert_pw2" name="re_password"/>
                                    <span class="admin_insert_pw_text">비밀번호를 입력하세요.</span>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-danger pw_change_btn">Proccess</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>        
        <!-- EOF MODALS -->






