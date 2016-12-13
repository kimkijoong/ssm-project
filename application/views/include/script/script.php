<script type="text/javascript" src="/static/lib/js/jquery-1.11.1.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/angularjs/1.5.9/angular.min.js"></script>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/angularjs/1.5.9/angular-resource.js"></script>
<script type="text/javascript" src="/static/lib/js/jquery.form.min.js"></script>
<script type="text/javascript" src="/static/js/main.bundle.js"></script>

<!--<script type="text/javascript" src="/static/lib/js/jquery-1.11.1.min.js"></script>-->
<!--<script type="text/javascript" src="/static/lib/js/bootstrap.js"></script>-->
<!--<script type="text/javascript" src="/static/lib/js/plugins.js"></script>-->
<!--<script src="https://maps.google.com/maps/api/js?sensor=true"></script>-->
<!--<script type="text/javascript" src="/static/lib/js/bskit-scripts.js"></script>-->
<!--<script type="text/javascript" src="/static/lib/js/jquery.form.min.js"></script>-->
<script>
    $( function() {
        $( "#datepicker" ).datepicker({
            dateFormat: "yy-mm-dd"
        });
    });
    $( function() {
        $( "#datepicker2" ).datepicker({
            dateFormat: "yy-mm-dd"
        });
    });
</script>


<!--<script>
    jQuery(document).ready( function() {
        function redirect_session (){
            <?php
/*            if($this->session->userdata('referer_url')){
            */?>
            var referer_url = "<?/*=$this->session->userdata('new_url')*/?>";
            <?php
/*            } else {
            */?>
            var referer_url = "<?/*=current_url()*/?>";
            <?php
/*            }
            */?>
            var new_url = "<?/*=current_url()*/?>";
            jQuery.ajax({
                url: '/Boarder/redirect_session',
                dataType: "json",
                data:{referer_url : referer_url, new_url : new_url},
                type: 'POST',
                success: function(data){
                }
            });
        }
        redirect_session();


        jQuery(".close_join_btn").click(function(e){
            e.preventDefault();
            jQuery("#login_open_btn").trigger("click");
        });
        jQuery("#join_open_btn").click(function(e){
            e.preventDefault();
            jQuery("#join_open_btn2").trigger("click");
        });
        jQuery("#pw_find_btn").click(function(e){
            e.preventDefault();
            jQuery("#pw_find_open").trigger("click");
        });

        <?php
/*        if(isset($bo_table)){
        */?>
        jQuery(".boarder_list_insert_btn").click(function () {
            jQuery(location).attr("href", "/Boarder/insert/<?php /*echo $bo_table*/?>");
        })

        <?php
/*        }
        */?>
        function validateEmail(email) {
            var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
            return re.test(email);
        }
        jQuery(".login_btn").click(function(){
            var login_id = jQuery(".login_id").val();
            var login_pw = jQuery(".login_pw").val();
            if(login_id == ""||!validateEmail(login_id)){
                alert("올바른 아이디를 입력해주세요.");
            } else if(login_pw == ""){
                alert("비밀번호를 입력하세요.");
            } else {
                jQuery(".login_form")[0].submit();
            }
        })
        jQuery(".join_btn").click(function(){
            var insert_id = jQuery(".insert_id").val();
            var insert_pw = jQuery(".insert_pw").val();
            var insert_name = jQuery(".insert_name").val();
            var select_id = ajax_select_id("1");
            var comparison_pw = ajax_comparison_pw();
            var select_name = ajax_select_name("1");
            if(insert_id == ""||!validateEmail(insert_id)){
                alert("올바른 아이디를 이렵해주세요.");
            } else if(insert_pw == ""){
                alert("비밀번호를 입력하세요.");
            } else if(insert_name == ""){
                alert("닉네임을 입력하세요.");
            } else if(select_id != "1"){
                alert("다른 아이디를 사용해주세요.");
            } else if(comparison_pw != "1"){
                alert("비밀번호가 다릅니다.");
            } else if(select_name != "1"){
                alert("다른 닉네임을 사용해주세요.");
            } else {
                jQuery(".join_form")[0].submit();
            }
        })
        jQuery(".close_join_btn").click(function(){
            jQuery(".join_form")[0].reset();
        })

        /*======================아이디 중복확인=======================*/
        jQuery(".insert_id").keyup(ajax_select_id);

        /*======================비밀번호확인=======================*/
        jQuery(".insert_pw2").keyup(ajax_comparison_pw);

        /*======================닉네임 중복확인=======================*/
        jQuery(".insert_name").keyup(ajax_select_name);


        function ajax_select_id(ajax){
            var ajax_val = ajax;
            if(ajax_val != "1"){
                ajax_val = true;
            } else {
                ajax_val = false;
            }
            var select_id = jQuery(".insert_id").val();
            var id_chk;
            if(select_id == ""||!validateEmail(select_id)){
                jQuery(".insert_id_text").text("아이디를 입력하세요.").css("color","black");
                id_chk = "0";
            } else {
                jQuery.ajax({
                    url: '/Member/join_id_select',
                    dataType: "json",
                    async: ajax_val,
                    data:{member_id: select_id},
                    type: 'POST',
                    success: function(data){
                        if(data =="0"){
                            jQuery(".insert_id_text").text("사용가능한 아이디 입니다.").css("color","blue");
                            id_chk = "1";
                        } else if(data =="1"){
                            jQuery(".insert_id_text").text("중복된 아이디 입니다.").css("color","red");
                            id_chk = "0";
                        }
                    }
                });

            }
            return id_chk;
        }

        function ajax_select_name(ajax){
            var ajax_val = ajax;
            if(ajax_val != "1"){
                ajax_val = true;
            } else {
                ajax_val = false;
            }
            var select_name = jQuery(".insert_name").val();
            if(select_name == ""){
                jQuery(".insert_name_text").text("닉네임을 입력하세요.").css("color","black");
                id_chk = "0";
            } else {
                jQuery.ajax({
                    url: '/Member/join_name_select',
                    dataType: "json",
                    async: ajax_val,
                    data:{member_name: select_name},
                    type: 'POST',
                    success: function(data){
                        if(data =="0"){
                            jQuery(".insert_name_text").text("사용가능한 닉네임 입니다.").css("color","blue");
                            id_chk = "1";
                        } else if(data =="1"){
                            jQuery(".insert_name_text").text("중복된 닉네임 입니다.").css("color","red");
                            id_chk = "0";
                        }
                    }
                });
            }
            return id_chk
        }

        function ajax_comparison_pw(){
            var select_pw = jQuery(".insert_pw").val();
            var select_pw2 = jQuery(".insert_pw2").val();
            if(select_pw2 == ""){
                jQuery(".insert_pw_text").text("비밀번호를 입력하세요.").css("color","black");
                pw_chk = "0";
            } else if(select_pw2 == select_pw) {
                jQuery(".insert_pw_text").text("사용가능합니다.").css("color","blue");
                pw_chk = "1";
            } else if(select_pw2 != select_pw) {
                jQuery(".insert_pw_text").text("비밀번호가 다릅니다.").css("color","red");
                pw_chk = "0";
            }
            return pw_chk;
        }

    });
    $(function(){
        //ajax form submit
        $('.profile_img_upload_form').ajaxForm({
            beforeSubmit: function (data,form,option) {
                //validation체크
                //막기위해서는 return false를 잡아주면됨
                return true;
            },
            dataType:  'json',
            success: function(data){
                if(data == "1"){
                    alert("이미지업로드에 실패하였습니다.");
                } else {
                    jQuery(".member_profile_img").val("/"+data["b"]);
                    jQuery(".profile_view_img").attr("src", "/"+data["a"]+data["b"]);
                    jQuery(".profile_close_btn").trigger("click");
                    jQuery('.profile_img_upload_form')[0].reset();
                }
            },
            error: function(){
                //에러발생을 위한 code페이지
            }
        });
    });
    $(function(){
        //ajax form submit
        $('.pw_change_send_mail_form').ajaxForm({
            beforeSubmit: function (data,form,option) {
                //validation체크
                //막기위해서는 return false를 잡아주면됨
                return true;
            },
            dataType:  'json',
            success: function(data){
                if(data == "1"){
                    alert("전송되었습니다.");
                } else {
                    alert("아이디가 없습니다.");
                }
            },
            error: function(){
                //에러발생을 위한 code페이지
            }
        });
    });
</script>-->