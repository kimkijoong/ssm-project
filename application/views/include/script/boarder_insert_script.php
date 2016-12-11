<script type="text/javascript" src="/static/lib/tinymce/tinymce.js" charset="utf-8"></script>

<script>
    jQuery(document).ready( function() {
        tinymce.init({
            selector:'#ir1',
            theme: "modern",
            language: "ko_KR",
            menubar:false,
            relative_urls: false,
            remove_script_host: false,
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

        /*var oEditors = [];
        nhn.husky.EZCreator.createInIFrame({
            oAppRef: oEditors,
            elPlaceHolder: "ir1",
            sSkinURI: "/static/lib/text_editor/SmartEditor2Skin.html",
            fCreator: "createSEditor2"
        });*/
        /*jQuery(".insert_post_btn").click(function(){
                // 에디터의 내용이 textarea에 적용된다.
                oEditors.getById["ir1"].exec("UPDATE_CONTENTS_FIELD", []);

                // 에디터의 내용에 대한 값 검증은 이곳에서
                // document.getElementById("ir1").value를 이용해서 처리한다.
            try {
                    var s = jQuery("#ir1").val();
                    var result = s.replace(/<img src=\"\/static\/upload\/temporarily\//gi, '<img src="/static/upload/thumbnail/');
                    jQuery("#ir1").val(result);
                    /!*jQuery(".boarder_insert_form").submit();*!/
                } catch (e) {

                }
        })*/
        <?php
            if(isset($data)){
                foreach($data as $data){
        ?>
        var seq = "<?=$data->seq?>";
        if(seq == "1"){
            jQuery("#boarder_insert_form")[0].reset();
        }
        <?php
                }
            }
        ?>
        /*파 일 업 로 드 용 량 체 크*/
        /*파 일 업 로 드 용 량 체 크*/
        jQuery(".thumbnail_view_img_btn").click(function(e){
            e.preventDefault();
            jQuery(".thumbnail_fileData").trigger("click");
        })

        jQuery(".upload_inputfile_append").click(function(e){
            e.preventDefault();
            var input_uploadfile = "<input type='file' name='upload_file_name[]' class='form-control upload_file_name' placeholder='Placeholder text'>"
            jQuery(".upload_inputfile_war").append(input_uploadfile);
        })

        jQuery(".upload_inputfile_subtract").click(function(e){
            e.preventDefault();
            jQuery(".upload_file_name:last-child").remove();
        })

        jQuery(".multi_upload_inputfile_append").click(function(e){
            e.preventDefault();
            var input_uploadfile = "<input type='file' class='form-control multi_user_file' name='user_file[]' placeholder='Placeholder text' multiple>"
            jQuery(".multi_upload_inputfile_war").append(input_uploadfile);
        })

        jQuery(".multi_upload_inputfile_subtract").click(function(e){
            e.preventDefault();
            jQuery(".multi_user_file:last-child").remove();
        })

        jQuery(".insert_post_cancel_btn").click(function(){
            jQuery(location).attr("href", "/Boarder/insert_post_cancel")
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
                    jQuery(".thumbnail_profile_img").val(data["a"]+data["b"]);
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
                        /*jQuery(".boarder_insert_form").prepend("<input type='hidden' class='form-control' name='boarder_seq' placeholder='Placeholder text' value='/"+data[i]["a"]+data[i]["b"]+"'/>")*/
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
    /*비 밀 번 호 입 력 창 컨 트 롤 러*/
    pw_checked();
    jQuery(".iCheck-helper, .check").click(function(){
        pw_checked();
    })
    function pw_checked (){
        if(jQuery(".icheckbox").is(":checked")){
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
</script>
