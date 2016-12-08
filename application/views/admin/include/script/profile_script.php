<!-- START SCRIPTS -->
<!-- START PLUGINS -->
<script type="text/javascript" src="/static/lib/bootstrap/js/plugins/jquery/jquery-migrate.min.js"></script>
<!-- END PLUGINS -->

<!-- START THIS PAGE PLUGINS-->
<script type="text/javascript" src="/static/lib/bootstrap/js/plugins/bootstrap/bootstrap-file-input.js"></script>
<script type="text/javascript" src="/static/lib/bootstrap/js/plugins/form/jquery.form.js"></script>

<script type="text/javascript" src="/static/lib/bootstrap/js/plugins/cropper/cropper.min.js"></script>
<!-- END THIS PAGE PLUGINS-->

<!-- START TEMPLATE -->
<script type="text/javascript" src="/static/lib/bootstrap/js/demo_edit_profile.js"></script>
<script type="text/javascript" src="/static/lib/bootstrap/js/plugins/bootstrap/bootstrap-select.js"></script>


<!-- END TEMPLATE -->

<!-- END SCRIPTS -->
<script>
    jQuery(document).ready( function() {


        /*======================비밀번호확인=======================*/
        jQuery(".admin_insert_pw2").keyup(ajax_comparison_pw);

        /*jQuery(".pw_change_btn").click(function(){
            var insert_pw = jQuery(".insert_pw").val();
            var comparison_pw = ajax_comparison_pw();
            if(insert_pw == ""){
                alert("비밀번호를 입력하세요.");
            } else if(comparison_pw != "1"){
                alert("비밀번호가 다릅니다.");
            } else {
                jQuery('.pw_change_form')[0].submit();
            }
        })*/

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
            var select_pw = jQuery(".admin_insert_pw").val();
            var select_pw2 = jQuery(".admin_insert_pw2").val();
            if(select_pw2 == ""){
                jQuery(".admin_insert_pw_text").text("비밀번호를 입력하세요.").css("color","black");
                jQuery(".admin_pw_chk").val("0");
                pw_chk = "0";
            } else if(select_pw2 == select_pw) {
                jQuery(".admin_insert_pw_text").text("사용가능합니다.").css("color","blue");
                jQuery(".admin_pw_chk").val("1");
                pw_chk = "1";
            } else if(select_pw2 != select_pw) {
                jQuery(".admin_insert_pw_text").text("비밀번호가 다릅니다.").css("color","red");
                jQuery(".admin_pw_chk").val("0");
                pw_chk = "0";
            }
            return pw_chk;
        }

    });

    $(function(){
        //ajax form submit
        $('.pw_change_form').ajaxForm({
            beforeSubmit: function (data,form,option) {
                //validation체크
                //막기위해서는 return false를 잡아주면됨
                var insert_pw = jQuery(".admin_insert_pw").val();
                var comparison_pw = jQuery(".admin_pw_chk").val();
                if(insert_pw == ""){
                    alert("비밀번호를 입력하세요.");
                    return false;
                } else if(comparison_pw != "1"){
                    alert("비밀번호가 다릅니다.");
                    return false;
                } else {
                    return true;
                }
            },
            dataType:  'json',
            success: function(data){
                if(data =="0"){
                    alert("기존 비밀번호가 다릅니다.");
                } else if(data =="1"){
                    alert("비밀번호가 성공적으로 변경되었습니다.");
                    $('.pw_change_form')[0].reset();
                    $(".close").trigger("click");
                }
            },
            error: function(){
                //에러발생을 위한 code페이지
            }
        });
    });
    $(function(){
        //ajax form submit
        $('.profile_update_form').ajaxForm({
            beforeSubmit: function (data,form,option) {
                //validation체크
                //막기위해서는 return false를 잡아주면됨
                var member_name = jQuery(".member_name").val();
                if(member_name == ""){
                    alert("닉네임을 입력하세요.");
                    return false;
                }  else {
                    return true;
                }
            },
            dataType:  'json',
            success: function(data){
                if(data =="0"){
                    alert("변경이 실패하였습니다.");
                } else if(data =="1"){
                    alert("변경이 완료되었습니다.");
                }
            },
            error: function(){
                //에러발생을 위한 code페이지
            }
        });
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
                    jQuery(".member_profile_img").val("/"+data["a"]+data["b"]);
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
</script>