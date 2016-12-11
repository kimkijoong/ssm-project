/**
 * Created by kwon on 2016-11-30.
 */

function validateEmail(email) {
    var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    return re.test(email);
}

jQuery(".join_btn").click(function(){
    var insert_id = jQuery(".user-email").val();
    var insert_pw = jQuery(".user-pw").val();
    var insert_name = jQuery(".user-name").val();
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
        jQuery(".join-form")[0].submit();
    }
})
// jQuery(".close_join_btn").click(function(){
//     jQuery(".join_form")[0].reset();
// })

/*======================아이디 중복확인=======================*/
jQuery(".user-email").keyup(ajax_select_id);

/*======================비밀번호확인=======================*/
jQuery(".user-pw2").keyup(ajax_comparison_pw);

/*======================닉네임 중복확인=======================*/
jQuery(".user-name").keyup(ajax_select_name);


function ajax_select_id(ajax){
    var ajax_val = ajax;
    if(ajax_val != "1"){
        ajax_val = true;
    } else {
        ajax_val = false;
    }
    var select_id = jQuery(".user-email").val();
    var id_chk;
    if(select_id == ""||!validateEmail(select_id)){
        jQuery(".user-email-text").text("아이디를 입력하세요.").css("color","black");
        id_chk = "0";
    } else {
        jQuery.ajax({
            url: '/Member/join_id_select',
            dataType: "json",
            async: ajax_val,
            data:{user_email: select_id},
            type: 'POST',
            success: function(data){
                if(data =="0"){
                    jQuery(".user-email-text").text("사용가능한 아이디 입니다.").css("color","blue");
                    id_chk = "1";
                } else if(data =="1"){
                    jQuery(".user-email-text").text("중복된 아이디 입니다.").css("color","red");
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
    var select_name = jQuery(".user-name").val();
    if(select_name == ""){
        jQuery(".user-name-text").text("닉네임을 입력하세요.").css("color","black");
        id_chk = "0";
    } else {
        jQuery.ajax({
            url: '/Member/join_name_select',
            dataType: "json",
            async: ajax_val,
            data:{user_name: select_name},
            type: 'POST',
            success: function(data){
                if(data =="0"){
                    jQuery(".user-name-text").text("사용가능한 닉네임 입니다.").css("color","blue");
                    id_chk = "1";
                } else if(data =="1"){
                    jQuery(".user-name-text").text("중복된 닉네임 입니다.").css("color","red");
                    id_chk = "0";
                }
            }
        });
    }
    return id_chk
}

function ajax_comparison_pw(){
    var select_pw = jQuery(".user-pw").val();
    var select_pw2 = jQuery(".user-pw2").val();
    if(select_pw2 == ""){
        jQuery(".user-pw-text").text("비밀번호를 입력하세요.").css("color","black");
        pw_chk = "0";
    } else if(select_pw2 == select_pw) {
        jQuery(".user-pw-text").text("사용가능합니다.").css("color","blue");
        pw_chk = "1";
    } else if(select_pw2 != select_pw) {
        jQuery(".user-pw-text").text("비밀번호가 다릅니다.").css("color","red");
        pw_chk = "0";
    }
    return pw_chk;
}