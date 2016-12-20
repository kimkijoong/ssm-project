<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @property  input
 */
class Home extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        /*if(!$this->session->userdata("is_login")){
            $this->load->helper('url');
            redirect('/Login');
        }*/
        $this->load->model('Boarder_model');
        $this->allow = array('index', 'main','openSsmList','detailSsum','openSsm_page', 'openSsmList_select', 'TopicList', 'TodayTopic', 'PostList','bookmark','opench', 'mychdetail','topiclistview','mych', 'write', 'setting');
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
/*    public function index()
    {
        $this->load->view('include/header_start');
        $this->load->view('admin/include/style/admin_style');
        $this->load->view('include/style/home_style');
        $this->load->view('include/header_end');
        $this->load->view('include/navigation');
        $this->load->view('home');
        $this->load->view('include/footer');
        $this->load->view('include/script/script');
        $this->load->view('include/script/home_script');
        $this->load->view('include/html_end');
    }*/
/*    public function index()
    {
        $this->load->view('home/intro');
    }*/
    public function index()
    {
        $data = $this->Boarder_model->daily_topic_select();
        $this->load->view('home/main',array('data' => $data));
    }
    public function main()
    {
        $data = $this->Boarder_model->daily_topic_select();
        $this->load->view('home/main',array('data' => $data));
    }
    public function openSsmList()
    {
        $this->load->view('home/openSsumList');
    }
    public function openSsmList_select()
    {
        $data = $this->Boarder_model->daily_topic_select();
//        print_r($data);
        echo json_encode($data);
    }
    public function openSsm_page($topic_seq)
    {
        $data = $this->Boarder_model->topic_select($topic_seq);
        $data2 = $this->Boarder_model->today_topic_list_select($topic_seq);
        $this->load->view('home/totayTopic', array('data' => $data,'data2' => $data2, 'topic_seq' => $topic_seq));
    }
    public function detailSsum($notebook_seq)
    {
        $data = $this->Boarder_model->open_one_note_book_select($notebook_seq);
        $this->load->view('home/detailSsum', array('data' => $data));
    }
    public function write_page($daily_seq)
    {
        $data = $this->Boarder_model->topic_select($daily_seq);
        $this->load->view('home/new_write', array('daily_seq' => $daily_seq, 'data' => $data));
    }
    public function update_write_page($post_seq)
    {
        $data = $this->Boarder_model->topic_select($post_seq);
        $this->load->view('home/new_write', array('data' => $data));
    }
    public function new_write()
    {
        $user_seq = $this->input->POST('user_seq');
        $topic_seq = $this->input->POST('topic_seq');
        $text_align = $this->input->POST('text_align');
        $open_post = $this->input->POST('open_post');
        $daily_contant = $this->input->POST('daily_contant');
        $data = $this->Boarder_model->topic_write($user_seq, $topic_seq, $text_align, $open_post, $daily_contant);
        //글쓰기가 실패하면 jone 데이터로 0을 리턴하여 스크립트상으로 실페경고를 띄워주며 성공할경우 작성글 상세페이지로 이동한다.
        $new_post_seq = $data["data"][0]->seq;
        if(!$data["insert_success"]){
            echo  json_encode($data["insert_success"]);
        } else {
            redirect('/Home/mychdetail/'.$new_post_seq);
        }
    }
    public function update_write()
    {
        $seq = $this->input->POST('seq');
        $text_align = $this->input->POST('text_align');
        $open_post = $this->input->POST('open_post');
        $daily_contant = $this->input->POST('daily_contant');
        $data = $this->Boarder_model->topic_update_write($seq, $text_align, $open_post, $daily_contant);
        //글쓰기가 실패하면 jone 데이터로 0을 리턴하여 스크립트상으로 실페경고를 띄워주며 성공할경우 작성글 상세페이지로 이동한다.

        if(!$data["insert_success"]){
            echo  json_encode($data["insert_success"]);
        } else {
            redirect('/Home/mychdetail/'.$seq);
        }
    }
    public function mySsmList()
    {
        $this->load->view('home/mySsumList');
    }
    public function mySsm_page($notebook_seq)
    {
        $data = $this->Boarder_model->one_note_book_select($notebook_seq);

        if( $data == false ){
            redirect("/Home");
        } else {
            $this->load->view('home/mySsum', array('data' => $data));
        }
    }
    public function user_ssm_list_page($user_seq)
    {
        $data = $this->Boarder_model->user_ssm_list_select($user_seq);
        $this->load->view('home/user_ssm_list', array('data' => $data));
    }
    public function post_open_update()
    {
        $seq = $this->input->POST('seq');
        $open_post = $this->input->POST('open_post');
        $return_url = $this->input->POST('return_url');
        $this->Boarder_model->post_open_update($seq, $open_post);
        redirect($return_url);
    }
    public function bringInSsm()
    {
        $this->load->view('home/bringInSsum');
    }
    public function write($post_seq)
    {
        $data = $this->Boarder_model->one_topic_select($post_seq);
        $this->load->view('home/write', array('data' => $data));
    }

    public function bookmark()
    {
        $this->load->view('home/bookMark');
    }

    public function opench()
    {
        $this->load->view('home/openCh');
    }

    public function mychdetail($topic_seq)
    {
        $data = $this->Boarder_model->myTopicOne($topic_seq);
        $this->load->view('home/myChDetail', array('data' => $data));
    }

    public function topiclistview()
    {
        $this->load->view('home/topicList');
    }

    public function mych()
    {
        $this->load->view('home/myCh');
    }
    public function setting()
    {
        $this->load->view('home/setting');
    }

    //앵귤러 controller
    public function TopicList(){
        //주제들을 모두 가져온다.
        $data = $this->Boarder_model->TopicList();
        echo json_encode($data);
    }
    public function TodayTopic(){
        //그날의 주제를 가져온다.
        $data = $this->Boarder_model->TodayTopic();
        echo json_encode($data);
    }
    public function PostList(){
        //그날의 주제를 가져온다.
        $data = $this->Boarder_model->PostList();
        echo json_encode($data);
    }
    public function myTopicList(){
        $user_seq = $this->session->userdata('user_seq');
        $data = $this->Boarder_model->myTopicList($user_seq);
        echo json_encode($data);
    }
    public function myTopicOne($topic_seq){
        $data = $this->Boarder_model->myTopicOne($topic_seq);
        echo json_encode($data);
    }
}
