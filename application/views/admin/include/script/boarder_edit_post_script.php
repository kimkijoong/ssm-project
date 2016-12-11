<script type="text/javascript" src="/static/lib/bootstrap/js/plugins/bootstrap/bootstrap-select.js"></script>
<script type="text/javascript" src="/static/lib/bootstrap/js/plugins/tagsinput/jquery.tagsinput.min.js"></script>
<script type="text/javascript" src="/static/lib/bootstrap/js/plugins/bootstrap/bootstrap-file-input.js"></script>
<script type="text/javascript" src="/static/lib/tinymce/tinymce.js" charset="utf-8"></script>
<script type="text/javascript" src="/static/lib/js/jquery.form.min.js"></script>

<script>
    jQuery(document).ready( function() {
        tinymce.init({
            selector:'#ir1',
            theme: "modern",
            language: "ko_KR",
            menubar:false,
            plugins: "autolink  code link media image table textcolor autoresize textpattern",
            toolbar: "formatselect fontselect fontsizeselect | forecolor bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | table link media custom_image code ",
            setup: function(editor) {
                editor.addButton('custom_image', {
                    title: '이미지삽입',
                    icon: 'image',
                    onclick: function() {
                        jQuery(".multi_upload_btn").trigger("click");
                    }
                });
            }
        });
        jQuery(".form_clear_btn").click(function(e){
            e.preventDefault();
            jQuery(".boarder_insert_form")[0].reset();
            jQuery("input").val("");
            jQuery("textarea").html("");
        });

        /*비 밀 번 호 입 력 창 컨 트 롤 러*/
        pw_checked();
        jQuery(".iCheck-helper, .check").click(function(){
            pw_checked();
        })
        function pw_checked (){
            if(jQuery(".icheckbox_minimal-grey").hasClass("checked")){
                jQuery(".password_form_group").show("slow",function(){
                    $(this).css("display","block");
                });
            } else {
                jQuery(".password_form_group").hide("slow",function(){
                    $(this).css("display","none");
                    $(".boarder_post_pw").val("");
                });
            }
        }
        /*비 밀 번 호 입 력 창 컨 트 롤 러*/


        jQuery(".multi_upload_inputfile_append").click(function(e){
            e.preventDefault();
            var input_uploadfile = "<input type='file' class='form-control multi_user_file' name='user_file[]' placeholder='Placeholder text' multiple>"
            jQuery(".multi_upload_inputfile_war").append(input_uploadfile);
        })

        jQuery(".multi_upload_inputfile_subtract").click(function(e){
            e.preventDefault();
            jQuery(".multi_user_file:last-child").remove();
        })
        function fnChkByte(obj, maxByte){
            var str = obj.value;
            var str_len = str.length;

            var rbyte = 0;
            var rlen = 0;
            var one_char = "";
            var str2 = "";

            for(var i=0; i<str_len; i++){
                one_char = str.charAt(i);
                if(escape(one_char).length > 4){
                    rbyte += 2;                                         //한글2Byte
                }else{
                    rbyte++;                                            //영문 등 나머지 1Byte
                }

                if(rbyte <= maxByte){
                    rlen = i+1;                                          //return할 문자열 갯수
                }
            }

            if(rbyte > maxByte){
                alert("한글 "+(maxByte/2)+"자 / 영문 "+maxByte+"자를 초과 입력할 수 없습니다.");
                str2 = str.substr(0,rlen);                                  //문자열 자르기
                obj.value = str2;
                fnChkByte(obj, maxByte);
            }else{
                /*document.getElementById('boarder_post_sub_title').innerText = rbyte;*/
            }
        }
        jQuery(".boarder_post_sub_title").keyup(function(){
            fnChkByte(this, '80');
        })
        jQuery(".insert_post_title").keyup(function(){
            fnChkByte(this, '30');
        })
    });
    /*프로필이미지 업로드*/
    $(function(){
        //ajax form submit
        $('.img_upload_form').ajaxForm({
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
                    jQuery(".thumbnail_profile_img").val("/"+data["a"]+data["b"]);
                    jQuery(".thumbnail_view_img").attr("src", "/"+data["a"]+data["b"]);
                    jQuery(".thumbnail_close_btn").trigger("click");
                    jQuery('.img_upload_form')[0].reset();
                }
            },
            error: function(){
                //에러발생을 위한 code페이지
            }
        });
    });
    /*프로필이미지 업로드*/
    $(function(){
        //ajax form submit
        $('.multi_upload_form').ajaxForm({
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
                    for(var i = 0 ; i < data.length ; i++){
                        /*jQuery(".thumbnail_profile_img").val("/"+data["b"]);
                         jQuery(".thumbnail_view_img").attr("src", "/"+data[i]["a"]+data[i]["b"]);*/
                        tinymce.activeEditor.execCommand("mceInsertContent",'false','<img src="/'+data[i]["a"]+data[i]["b"]+'"/>');
                        jQuery(".boarder_insert_form").prepend("<input type='hidden' class='form-control' name='boarder_seq' placeholder='Placeholder text' value='/"+data[i]["a"]+data[i]["b"]+"'/>")
                    }
                    jQuery(".thumbnail_close_btn").trigger("click");
                    jQuery('.multi_upload_form')[0].reset();
                }
            },
            error: function(){
                //에러발생을 위한 code페이지
            }
        });
    });

</script>
