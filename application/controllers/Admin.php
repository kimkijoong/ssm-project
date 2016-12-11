<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->model('Member_model');
        $this->load->model('Boarder_model');
        $this->load->model('Img_upload_model');
        $this->allow2 = array('login_page', 'login');
    }
    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
    public function index()
    {
        $category = "main";
        $category2 = "main";
        $categorys = $this->Boarder_model->boarder_category_select();
        $this->load->view('admin/include/header_start');
        $this->load->view('admin/include/style/admin_style');/*css 등의 코드삽입공간*/
        $this->load->view('admin/include/header_end');
        $this->load->view('admin/include/admin_sidebar', array('categorys'=>$categorys));
        $this->load->view('admin/include/admin_navigation');
        $this->load->view('admin/index', array('category' => $category, 'category2' => $category2));
        $this->load->view('admin/include/script/admin_script');/*자바스크립트 삽입공간*/
        $this->load->view('admin/include/script/admin_dashboard_script');/*자바스크립트 삽입공간*/
        $this->load->view('admin/include/html_end');
    }
    public function login_page()
    {
        $this->load->view('admin/pages-login');
    }
    function login(){
        $member_id = $this->input->POST('member_id');
        $member_pw = $this->input->POST('member_pw');
        $data = $this->Member_model->member_login($member_id, $member_pw);

        if($data == "0"){
            $this->session->set_flashdata('message', '일치하는 아이디가 없습니다.');
            redirect('/Admin');
        } else if($data == "1") {
            $this->session->set_flashdata('message', '비밀번호가 일치하지 않습니다.');
            redirect('/Admin');
        } else {
            foreach($data as $member){
                $newdata = array(
                    'member_code'  => $member->member_code,
                    'member_name'     => $member->member_name,
                    'member_id'     => $member->member_id,
                    'member_seq'     => $member->seq,
                    'member_level'     => $member->member_level,
                    'member_profile_img'     => $member->member_profile_img,
                    'is_login' => TRUE
                );
            }
            $this->session->set_userdata($newdata);
            if($this->session->userdata('member_level') < 10 ){
                $this->session->sess_destroy();
                $this->session->set_flashdata('message', '권한이 없습니다.');
                redirect('/Admin');
            } else {
                redirect('/Admin');
            }
        }
    }
    function logout()
    {
        $this->session->sess_destroy();
        redirect('/Admin');
    }
    function user_list($category, $category2)
    {
        $categorys = $this->Boarder_model->boarder_category_select();
        $data = $this->Member_model->select_member_list();
        $this->load->view('admin/include/header_start');
        $this->load->view('admin/include/style/admin_style');/*css 등의 코드삽입공간*/
        $this->load->view('admin/include/header_end');
        $this->load->view('admin/include/admin_sidebar', array('categorys'=>$categorys));
        $this->load->view('admin/include/admin_navigation');
        $this->load->view('admin/user_list', array('data'=> $data, 'category' => $category, 'category2' => $category2));
        $this->load->view('admin/include/script/admin_script');/*자바스크립트 삽입공간*/
        $this->load->view('admin/include/script/user_script');/*자바스크립트 삽입공간*/
        $this->load->view('admin/include/html_end');
    }
    function user_edit_profile_page($user_seq, $category, $category2)
    {
        $categorys = $this->Boarder_model->boarder_category_select();
        $data = $this->Member_model->select_member($user_seq);
        $this->load->view('admin/include/header_start');
        $this->load->view('admin/include/style/admin_style');/*css 등의 코드삽입공간*/
        $this->load->view('admin/include/style/profile_style');/*css 등의 코드삽입공간*/
        $this->load->view('admin/include/header_end');
        $this->load->view('admin/include/admin_sidebar', array('categorys'=>$categorys));
        $this->load->view('admin/include/admin_navigation');
        $this->load->view('admin/user_edit_profile', array('data'=> $data, 'category' => $category, 'category2' => $category2, 'user_seq' => $user_seq));
        $this->load->view('admin/include/script/admin_script');/*자바스크립트 삽입공간*/
        $this->load->view('admin/include/script/profile_script');/*자바스크립트 삽입공간*/
        $this->load->view('admin/include/html_end');
    }
    function user_edit_profile()
    {
        $seq = $this->input->POST('seq');
        $member_name = $this->input->POST('member_name');
        $member_level = $this->input->POST('member_level');
        $member_about = $this->input->POST('member_about');
        $member_profile_img = $this->input->POST('member_profile_img');
        $data = $this->Member_model->user_profile_update($seq, $member_about, $member_level, $member_name, $member_profile_img);
        echo json_encode($data);
    }
    function user_pw_change()
    {
        $seq = $this->input->POST('seq');
        $old_pw = $this->input->POST('old_password');
        $new_pw = $this->input->POST('new_password');
        $data = $this->Member_model->pw_change($seq, $old_pw, $new_pw);
        echo json_encode($data);
    }
    function delete_member()
    {
        $seq = $this->input->POST('seq');
        $data = $this->Member_model->delete_member($seq);
        echo json_encode($data);
    }
    function boarder_admin_page($category, $category2)
    {
        $categorys = $this->Boarder_model->boarder_category_select();
        $this->load->view('admin/include/header_start');
        $this->load->view('admin/include/style/admin_style');/*css 등의 코드삽입공간*/
        $this->load->view('admin/include/header_end');
        $this->load->view('admin/include/admin_sidebar', array('categorys'=>$categorys));
        $this->load->view('admin/include/admin_navigation');
        $this->load->view('admin/boarder_admin_page', array('categorys'=>$categorys, 'category' => $category, 'category2' => $category2));
        $this->load->view('admin/include/script/admin_script');/*자바스크립트 삽입공간*/
        $this->load->view('admin/include/script/user_script');/*자바스크립트 삽입공간*/
        $this->load->view('admin/include/html_end');
    }
    function boarder_post_list($boarder_seq, $boarder_page, $category, $category2)
    {
        $categorys = $this->Boarder_model->boarder_category_select();
        $data = $this->Boarder_model->boarder_list_select($boarder_seq, $boarder_page);
        $data2 = $this->Boarder_model->boarder_category_select();
        $this->load->view('admin/include/header_start');
        $this->load->view('admin/include/style/admin_style');/*css 등의 코드삽입공간*/
        $this->load->view('admin/include/header_end');
        $this->load->view('admin/include/admin_sidebar', array('categorys'=>$categorys));
        $this->load->view('admin/include/admin_navigation');
        $this->load->view('admin/boarder_post_list', array('data' => $data["boarder_content"], 'boarder_seq' => $boarder_seq, 'bo_table_page' => $data["boarder_page_num"], 'boarder_page' => $data["boarder_page"],'data2'=> $data2, 'category' => $category, 'category2' => $category2, 'boarder_seq' => $boarder_seq));
        $this->load->view('admin/include/script/admin_script');/*자바스크립트 삽입공간*/
        $this->load->view('admin/include/script/user_script');/*자바스크립트 삽입공간*/
        $this->load->view('admin/include/html_end');
    }
    function boarder_edit_post($page_seq, $category, $category2)
    {
        $data = $this->Boarder_model->admin_boarder_select($page_seq);
        $data2 = $this->Boarder_model->boarder_category_select();
        $category = "$category";
        $category2 = "$category2";
        $this->load->view('admin/include/header_start');
        $this->load->view('admin/include/style/admin_style');/*css 등의 코드삽입공간*/
        $this->load->view('admin/include/style/boarder_edit_post_style');/*css 등의 코드삽입공간*/
        $this->load->view('admin/include/header_end');
        $this->load->view('admin/include/admin_sidebar', array('categorys'=>$data2));
        $this->load->view('admin/include/admin_navigation');
        $this->load->view('admin/boarder_edit_post', array('data'=> $data,'data2'=> $data2, 'category' => $category, 'category2' => $category2));
        $this->load->view('admin/include/script/admin_script');/*자바스크립트 삽입공간*/
        $this->load->view('admin/include/script/boarder_edit_post_script');/*자바스크립트 삽입공간*/
        $this->load->view('admin/include/html_end');
    }
    public function delete_post()
    {
        $data = $this->input->POST("seq");
        $data2 = $this->Boarder_model->boarder_delete($data);
        echo json_encode($data2);
    }
}
