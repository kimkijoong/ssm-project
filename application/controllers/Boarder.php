<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Boarder extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->model('Img_upload_model');
        $this->load->model('Boarder_model');
        $this->allow = array('card_list', 'boarder_list','view_post_page', 'redirect_session','boarder_post_search', 'boarder_post_lock_page');
        /*if(!$this->session->userdata("is_login")){
            $this->load->helper('url');
            redirect('/Login');
        }*/
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
    }
    public function redirect_session()
    {
        $referer_url = $this->input->POST('referer_url');
        $new_url = $this->input->POST('new_url');
        $data = array(
            'referer_url' => $referer_url,
            'new_url' => $new_url
        );
        $this->session->set_userdata($data);
    }
    public function card_list($bo_table, $boarder_page)
    {
        $data = $this->Boarder_model->boarder_list_select($bo_table, $boarder_page);
        $this->load->view('include/header_start');
        $this->load->view('admin/include/style/admin_style');/*css 등의 코드삽입공간*/
        $this->load->view('include/header_end');
        $this->load->view('include/navigation');
        $this->load->view('boarder/boarder_card_list', array('data' => $data["boarder_content"], 'bo_table' => $bo_table, 'bo_table_page' => $data["boarder_page_num"], 'boarder_page' => $data["boarder_page"]));
        $this->load->view('include/footer');
        $this->load->view('include/script/script');   /*자바스크립트 삽입공간*/
        $this->load->view('include/html_end');
    }
    public function boarder_list($bo_table, $boarder_page)
    {
        $data = $this->Boarder_model->boarder_list_select($bo_table, $boarder_page);
        $this->load->view('include/header_start');
        $this->load->view('admin/include/style/admin_style');/*css 등의 코드삽입공간*/
        $this->load->view('include/header_end');
        $this->load->view('include/navigation');
        if($bo_table == "1"){
            $this->load->view('boarder/boarder_list', array('data' => $data["boarder_content"], 'bo_table' => $bo_table, 'bo_table_page' => $data["boarder_page_num"], 'boarder_page' => $data["boarder_page"]));
        } else if($bo_table == "2") {
            $this->load->view('boarder/boarder_card_list', array('data' => $data["boarder_content"], 'bo_table' => $bo_table, 'bo_table_page' => $data["boarder_page_num"], 'boarder_page' => $data["boarder_page"]));
        }
        $this->load->view('include/footer');
        $this->load->view('include/script/script');   /*자바스크립트 삽입공간*/
        $this->load->view('include/script/boarder_script');
        $this->load->view('include/html_end');

    }
    public function boarder_post_search($bo_table, $boarder_page, $category, $boarder_list_search_input)
    {
        $data = $this->Boarder_model->boarder_post_search($bo_table, $boarder_page, $category, $boarder_list_search_input);
        $this->load->view('include/header_start');
        $this->load->view('admin/include/style/admin_style');/*css 등의 코드삽입공간*/
        $this->load->view('include/header_end');
        $this->load->view('include/navigation');
        $this->load->view('boarder/boarder_post_search_list', array('data' => $data["boarder_content"], 'bo_table' => $bo_table, 'category' => $category, 'boarder_list_search_input' => $boarder_list_search_input,  'bo_table_page' => $data["boarder_page_num"], 'boarder_page' => $data["boarder_page"]));
        $this->load->view('include/footer');
        $this->load->view('include/script/script');   /*자바스크립트 삽입공간*/
        $this->load->view('include/script/boarder_script');
        $this->load->view('include/html_end');
    }
    public function insert($bo_table)
    {
        $data2 = $this->Boarder_model->boarder_category_select();
        $this->load->view('include/header_start');
        $this->load->view('admin/include/style/admin_style');/*css 등의 코드삽입공간*/
        $this->load->view('include/style/boarder_insert_style');
        $this->load->view('include/header_end');
        $this->load->view('include/navigation');
        $this->load->view('boarder/boarder_insert', array('bo_table'=> $bo_table, 'data2'=>$data2));
        $this->load->view('include/footer');
        $this->load->view('include/script/script');/*자바스크립트 삽입공간*/
        $this->load->view('include/script/boarder_insert_script');
        $this->load->view('include/html_end');
    }

    public function thumbnail_upload()
    {
        $user_file = $this->input->POST('user_file');
        $data = $this->Img_upload_model->thumbnail_upload_model($user_file);
        /*echo json_encode($data);*/
        echo json_encode($data);
    }
    public function img_upload()
    {
        $user_file = $this->input->POST('user_file');
        $data = $this->Img_upload_model->thumbnail_upload_model($user_file);
        /*echo json_encode($data);*/
        echo json_encode($data);
    }
    public function multi_img_upload()
    {
        $user_file = $this->input->POST('user_file[]');
        $data = $this->Img_upload_model->multi_img_upload_model($user_file);
        echo json_encode($data);
    }
    public function insert_post()
    {
        $seq = $this->input->POST('seq');
        $boarder_seq = $this->input->POST('boarder_seq');
        $boarder_post_title = $this->input->POST('insert_post_title');
        $boarder_post_thumbnail_img = $this->input->POST('boarder_post_thumbnail_img');
        $boarder_post_sub_title = $this->input->POST('boarder_post_sub_title');
        $boarder_post_secret = $this->input->POST('boarder_post_secret');
        $boarder_post_pw = $this->input->POST('insert_post_pw');
        $boarder_post_content = $this->input->POST('insert_post_textarea');
        $boarder_post_thumbnail_img = $this->Boarder_model->thumbnail_img_move($boarder_post_thumbnail_img);
        if(!isset($seq)){
            $this->Boarder_model->boarder_post_insert($boarder_post_title, $boarder_post_secret, $boarder_post_content, $boarder_seq, $boarder_post_sub_title, $boarder_post_thumbnail_img, $boarder_post_pw);
        } else {
            $this->Boarder_model->boarder_post_update($seq, $boarder_post_title, $boarder_post_secret, $boarder_post_content,$boarder_seq, $boarder_post_sub_title, $boarder_post_thumbnail_img, $boarder_post_pw);
        }
        redirect('/Boarder/boarder_list/'.$boarder_seq.'/0');
    }
    public function insert_post_cancel(){
        redirect($this->session->userdata('referer_url'));
    }
    public function view_post_page($bo_table,$page_seq)
    {
        $data = $this->Boarder_model->boarder_select($page_seq);
        $data2 = $this->Boarder_model->comment_select($page_seq);
        foreach($data as $data_array){
            $pw = $data_array->boarder_post_pw;
            $secret = $data_array->boarder_post_secret;
            $boarder_seq = $data_array->boarder_seq;
        }
        if($data == Array()){
            redirect("/Boarder/boarder_list/".$bo_table."/0");
        } else {
            if($secret == "1"){
                $boarder_post_pw = $this->input->POST("boarder_post_pw");
                $post_pw = array("post_pw" => $boarder_post_pw);
                if(isset($boarder_post_pw)){
                    $this->session->set_userdata($post_pw);
                }
                if($this->session->userdata('post_pw') == $pw){
                    $this->load->view('include/header_start');
                    $this->load->view('admin/include/style/admin_style');/*css 등의 코드삽입공간*/
                    $this->load->view('include/header_end');
                    $this->load->view('include/navigation');
                    $this->load->view('boarder/boarder_post_view_page', array('data' => $data, 'data2' => $data2, 'page_seq'=>$page_seq,'bo_table'=>$bo_table));
                    $this->load->view('include/footer');
                    $this->load->view('include/script/script');/*자바스크립트 삽입공간*/
                    $this->load->view('include/script/boarder_script');
                    $this->load->view('include/html_end');
                    $this->session->unset_userdata("post_pw");
                    $this->Boarder_model->boarder_view_count_update($page_seq);
                }else{
                    redirect('/Boarder/boarder_post_lock_page/'.$bo_table."/".$page_seq);
                }
            } else {
                $this->load->view('include/header_start');
                $this->load->view('admin/include/style/admin_style');/*css 등의 코드삽입공간*/
                $this->load->view('include/header_end');
                $this->load->view('include/navigation');
                $this->load->view('boarder/boarder_post_view_page', array('data' => $data, 'data2' => $data2, 'page_seq'=>$page_seq,'bo_table'=>$bo_table));
                $this->load->view('include/footer');
                $this->load->view('include/script/script');/*자바스크립트 삽입공간*/
                $this->load->view('include/script/boarder_script');
                $this->load->view('include/html_end');
                $this->Boarder_model->boarder_view_count_update($page_seq);
            }
        }

    }
    public function boarder_post_lock_page($bo_table,$page_seq){
        $data = $this->Boarder_model->boarder_select($page_seq);
        $this->load->view('include/header_start');
        $this->load->view('admin/include/style/admin_style');/*css 등의 코드삽입공간*/
        $this->load->view('include/header_end');
        $this->load->view('include/navigation');
        $this->load->view('boarder/boarder_lock_page', array('data' => $data, 'page_seq'=>$page_seq, 'bo_table'=>$bo_table));
        $this->load->view('include/script/script');/*자바스크립트 삽입공간*/
        $this->load->view('admin/include/script/admin_script');
        $this->load->view('include/html_end');
    }
    public function update_post_write()
    {
        $page_seq= $this->input->POST("seq");
        $bo_table= $this->input->POST("bo_table");
        $data = $this->Boarder_model->boarder_select($page_seq);
        $data2 = $this->Boarder_model->boarder_category_select();
        $this->load->view('include/header_start');
        $this->load->view('include/style/style');/*css 등의 코드삽입공간*/
        $this->load->view('include/style/boarder_insert_style');
        $this->load->view('include/header_end');
        $this->load->view('include/navigation');
        $this->load->view('boarder/boarder_update_page', array('bo_table'=> $bo_table, 'data' => $data, 'data2' => $data2));
        $this->load->view('include/footer');
        $this->load->view('include/script/script');/*자바스크립트 삽입공간*/
        $this->load->view('include/script/boarder_insert_script');
        $this->load->view('include/html_end');
    }

    public function comment_insert()
    {
        $post_seq = $this->input->POST("post_seq");
        $comment_seq = $this->input->POST("comment_seq");
        $comment_insert_member_seq = $this->input->POST("comment_insert_member_seq");
        $comment_secret = $this->input->POST("comment_secret");
        $comment = $this->input->POST("comment");
        if($comment_seq == "0"){
            $data = $this->Boarder_model->boarder_comment_insert($post_seq, $comment_insert_member_seq, $comment, $comment_secret);
        } else {
            $data = $this->Boarder_model->boarder_comment_update($comment_seq, $comment, $comment_secret);
        }
        echo  json_encode($data);
    }
    public function delete_comment()
    {
        $seq = $this->input->POST("seq");
        $data = $this->Boarder_model->boarder_delete_comment($seq);

        echo  json_encode($data);
    }

    public function delete_post()
    {
        $data = $this->input->POST("seq[]");
        $bo_table = $this->input->POST("bo_table");
        /*$num[] = array();
        foreach($data as $data2){
            $num[] =  $data2;
        }*/
        $this->Boarder_model->boarder_delete($data);

        redirect("/Boarder/boarder_list/".$bo_table."/0");
    }
    public function drop_img_popup()
    {
        $this->load->view('boarder/drop_img_upload');
    }

}
