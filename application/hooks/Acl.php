<?php
class Acl {
    function checkPermission() {
        $CI =& get_instance();
        if (isset($CI->allow) && (is_array($CI->allow) === false OR in_array($CI->router->method, $CI->allow) === false)) {
            if (!$CI->session->userdata('user_email')) { // 로그인을 했는지 판단을 하는 로직을 넣으면 되겠죠.
                // redirect url도 알아서...
                redirect("Home");
            }
        } else if (isset($CI->allow2) && (is_array($CI->allow2) === false OR in_array($CI->router->method, $CI->allow2) === false)) {
            if (!$CI->session->userdata('user_email')) { // 로그인을 했는지 판단을 하는 로직을 넣으면 되겠죠.
                // redirect url도 알아서...
                redirect("/Admin/login_page");
            } /*else if($CI->session->userdata('member_level') < 10) {
                $CI->session->set_flashdata('message', '권한이 없습니다.');
                redirect('/Admin/login_page');
            }*/
        }
    }
}
?>