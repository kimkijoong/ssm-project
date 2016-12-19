<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->model('Member_model');
        $this->load->model('Img_upload_model');
    }
    function index()
    {
        $this->load->view('member/login');
    }
    function login_page()
    {
        $this->load->view('member/login');
    }
    function join_page()
    {
        $this->load->view('member/join');
    }
    function find_pw_page()
    {
        $this->load->view('member/find_pw');
    }
    function my_page()
    {
        $this->load->view('member/setProfile');
    }
    function login(){
        $user_email = $this->input->POST('user_email');
        $user_pw = $this->input->POST('user_pw');
        $data = $this->Member_model->member_login($user_email, $user_pw);

        if($data == "0"){
            $this->session->set_flashdata('message', '일치하는 아이디가 없습니다.');
//            redirect($this->session->userdata('referer_url'));
        } else if($data == "1") {
            $this->session->set_flashdata('message', '비밀번호가 일치하지 않습니다.');
//            redirect($this->session->userdata('referer_url'));
        } else {
            foreach($data as $member){
                $newdata = array(
                    'user_name'     => $member->user_name,
                    'user_email'     => $member->user_email,
                    'user_seq'     => $member->seq,
                    'user_profile' => $member->user_profile,
                    'is_login' => TRUE
                );
            }
            $this->session->set_userdata($newdata);
            redirect("/Home");
        }

    }
    function logout()
    {
        $return_url = $this->input->POST('return_url');
        $this->session->sess_destroy();
        redirect($return_url);
    }
    function join_id_select()
    {
        $user_email = $this->input->POST('user_email');
        $data = $this->Member_model->id_select($user_email);
        echo  $data;
    }
    function join_name_select()
    {
        $user_name = $this->input->POST('user_name');
        $data = $this->Member_model->name_select($user_name);
        echo  $data;
    }
    function join()
    {
        $user_email = $this->input->POST('user_email');
        $user_pw = $this->input->POST('user_pw');
        $user_name = $this->input->POST('user_name');
        $data = $this->Member_model->insert_member($user_email, $user_pw, $user_name);
        if($data == true){
            $this->session->set_flashdata('message', '회원가입이 완료되었습니다.');
            redirect($this->session->userdata('new_url'));
        }
        /*function counsel_check()
        {
            $seq = $this->input->POST('seq');
            $counsel_check = $this->input->POST('counsel_check');
            $data = $this->Member_model->insert_member($seq, $counsel_check);
            if ($data == true) {
                $this->load->helper('url');
                redirect('/Home');
            }
        }*/
    }
    public function profile_upload()
    {
        $user_file = $this->input->POST('user_file');
        $data = $this->Img_upload_model->thumbnail_upload_model($user_file);
        echo json_encode($data);
        /*echo $data;*/
    }
    function mypage()
    {
        $category = "mypage";
        $category2 = "mypage";
        $user_seq = $this->session->userdata('member_seq');
        $data = $this->Member_model->select_member($user_seq);
        $this->load->view('admin/include/header_start');
        $this->load->view('admin/include/style/admin_style');/*css 등의 코드삽입공간*/
        $this->load->view('admin/include/style/profile_style');/*css 등의 코드삽입공간*/
        $this->load->view('admin/include/header_end');
        $this->load->view('include/navigation');
        $this->load->view('member/mypage', array('data'=> $data, 'user_seq' => $user_seq, 'category' => $category, 'category2' => $category2));
        $this->load->view('admin/include/script/admin_script');/*자바스크립트 삽입공간*/
        $this->load->view('admin/include/script/profile_script');/*자바스크립트 삽입공간*/
        $this->load->view('admin/include/html_end');
    }
    function user_pw_change()
    {
        $seq = $this->input->POST('seq');
        $old_pw = $this->input->POST('old_password');
        $new_pw = $this->input->POST('new_password');
        $data = $this->Member_model->pw_change($seq, $old_pw, $new_pw);
        echo json_encode($data);
    }
    function user_edit_profile()
    {
        $seq = $this->input->POST('seq');
        $user_name = $this->input->POST('user_name');
        $member_about = $this->input->POST('member_about');
        $member_profile_img = $this->input->POST('member_profile_img');
        $data = $this->Member_model->member_user_profile_update($seq, $member_about, $user_name, $member_profile_img);
        echo json_encode($data);
    }
    function pw_change_send_mail()
    {
        $user_email = $this->input->POST('user_email');

        $data = $this->Member_model->id_select($user_email);
        if($data == "1"){
            $data2 = $this->Member_model->user_pw_change($user_email);
            $this->load->library('email');
            if($data2 == "0"){

            } else {
                $this->email->from('kjh0102321@gmail.com', '관리자');
                $this->email->to($user_email);

                $this->email->subject('임시 비밀번호입니다.');
                $this->email->message('임시 비밀번호는 '.$data2.' 입니다.');

                $this->email->send();
            }
            echo json_encode($data);
        } else {
            echo json_encode($data);
        }
    }

    function setting()
    {
        $this->load->view('member/setting');
    }
}