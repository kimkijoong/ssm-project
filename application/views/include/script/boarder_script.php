<script>
    jQuery(document).ready( function() {
        jQuery(".boarder_list_chk").click(function(){
            if(jQuery(".boarder_list_chk").prop("checked")){
                jQuery(".boarder_list_chk_list").prop("checked",true);
            } else {
                jQuery(".boarder_list_chk_list").prop("checked",false);
            }
        })

    })
    function comment_btn (comment_seq){
        jQuery(".comment_content"+comment_seq).css("display", "none");
        jQuery(".comment_content_textarea"+comment_seq).css("display", "block");
        jQuery(".comment_change_update_btn"+comment_seq).css("display", "block");
        jQuery(".comment_secret_btn"+comment_seq).css("display", "block");
    }
    $(function(){
        //ajax form submit
        $('.comment_view_form').ajaxForm({
            beforeSubmit: function (data,form,option) {
                //validation체크
                //막기위해서는 return false를 잡아주면됨
                return true;
            },
            dataType:  'json',
            success: function(data){
                location.reload();
            },
            error: function(){
                //에러발생을 위한 code페이지
            }
        });
    });
    function comment_delete_btn (comment_seq){
        var new_url = "<?=$this->session->userdata('new_url')?>";
        var seq = comment_seq;
        jQuery.ajax({
            url: '/Boarder/delete_comment',
            async: true,
            dataType: "json",
            data:{seq : seq},
            type: 'POST',
            success: function(data){
                if(data){
                    location.reload();
                }
            }
        });
    }
    function delete_post (){
        jQuery(".page_view_post_deleteform").attr("action", "/Boarder/delete_post");
        jQuery(".page_view_post_deleteform").submit();
    }
    function update_post_write (){
        jQuery(".page_view_post_writeform").attr("action", "/Boarder/update_post_write");
        jQuery(".page_view_post_writeform").submit();
    }
    jQuery(".boarder_list_search_input").keyup(function(event){
        if(event.keyCode == 13){
            var category = jQuery(".search_category").val();
            var boarder_list_search_input = jQuery(".boarder_list_search_input").val();
            var bo_table = jQuery(".bo_table").val();
            if(boarder_list_search_input == ""){
                alert("검색어를 입력해주세요.")
            } else {
                jQuery(location).attr("href","/Boarder/boarder_post_search/"+bo_table+"/0/"+category+"/"+boarder_list_search_input);
            }
        }
    })
</script>