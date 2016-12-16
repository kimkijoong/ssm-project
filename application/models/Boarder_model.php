<?php

Class Boarder_model extends CI_Model {
    public function daily_topic_select(){
        $this->db->select("*");
        $this->db->from("daily_topic");
        $this->db->where_in('public_date > CURRENT_DATE( )');
        $this->db->order_by('public_date DESC');
        $this->db->limit("1");
        $query = $this->db->get();
        $boarder_content = $query->result();
        $data = $boarder_content;
        return $data;
    }
    public function topic_select($daily_seq){
        $this->db->select("*");
        $this->db->from("daily_topic");
        $this->db->where_in('seq', $daily_seq);
        $query = $this->db->get();
        $boarder_content = $query->result();
        $data = $boarder_content;
        return $data;
    }
    public function topic_list_select(){
        $this->db->select("*");
        $this->db->from("daily_topic");
        $query = $this->db->get();
        $boarder_content = $query->result();
        $data = $boarder_content;
        return $data;
    }
    public function today_topic_list_select($topic_seq){
        $this->db->select("*");
        $this->db->from("notebook");
        $this->db->where_in('topic_seq', $topic_seq);
        $query = $this->db->get();
        $boarder_content = $query->result();
        $data = $boarder_content;
        return $data;
    }
    public function my_ssm_list_select($user_seq){
        $data =$this->db->query('SELECT a.seq as seq, a.topic_seq, a.user_seq, a.daily_contant, a.open_post, a.text_align, a.bg_img_url, a.creat_date , b.seq as bseq, b.topic, b.am_pm FROM notebook a left join daily_topic b on a.topic_seq = b.seq WHERE a.user_seq = '.$user_seq.' order by a.creat_date DESC')->result();
        return $data;
    }
    public function user_ssm_list_select($user_seq){
        $data =$this->db->query('SELECT a.seq as seq, a.topic_seq, a.user_seq, a.daily_contant, a.open_post, a.text_align, a.bg_img_url, a.creat_date , b.seq as bseq, b.topic, b.am_pm , d.seq as user_seq, d.user_name FROM notebook a left join daily_topic b on a.topic_seq = b.seq left join member d on a.user_seq = d.seq WHERE a.user_seq = '.$user_seq.' order by a.creat_date DESC')->result();
        return $data;
    }
    public function topic_write($user_seq, $topic_seq, $text_align, $open_post, $daily_contant){
        $data = array(
            'user_seq' => $user_seq,
            'topic_seq' => $topic_seq,
            'text_align' => $text_align,
            'open_post' => $open_post,
            'daily_contant' => $daily_contant
        );
        $insert_success = $this->db->insert('notebook', $data);
        $this->db->select("seq");
        $this->db->from("notebook");
        $this->db->where_in('user_seq', $user_seq);
        $this->db->order_by('creat_date DESC');
        $this->db->limit("1");
        $query = $this->db->get();
        $boarder_content = $query->result();
        $data = $boarder_content;
        return $data = array('data' => $data, 'insert_success' => $insert_success);
    }
    public function topic_update_write($seq, $text_align, $open_post, $daily_contant){
        $data = array(
            'seq' => $seq,
            'text_align' => $text_align,
            'open_post' => $open_post,
            'daily_contant' => $daily_contant
        );
        $update_success = $this->db->update('notebook', $data);
        return $update_success;
    }
    public function one_note_book_select($notebook_seq){
        /*상세페이지 글 불러오기*/
        $user_seq = $this->session->userdata('user_seq');
        $user_check =$this->db->query('SELECT seq FROM notebook where seq = '.$notebook_seq.' and user_seq ='.$user_seq)->num_rows();
        if($user_check){
            $data =$this->db->query('SELECT a.seq as seq, a.topic_seq, a.user_seq, a.daily_contant, a.open_post, a.text_align, a.bg_img_url, a.creat_date , b.seq as topic_seq, b.topic, b.am_pm, d.seq as user_seq, d.user_name FROM notebook a left join daily_topic b on a.topic_seq = b.seq left join member d on a.user_seq = d.seq WHERE a.seq = '.$notebook_seq)->result();
        } else {
            $data = false;
        }
        return $data;
    }
    public function open_one_note_book_select($notebook_seq){
        /*상세페이지 글 불러오기*/
        $data =$this->db->query('SELECT a.seq as seq, a.topic_seq, a.user_seq, a.daily_contant, a.open_post, a.text_align, a.bg_img_url, a.creat_date , b.seq as topic_seq, b.topic, b.am_pm, d.seq as user_seq, d.user_name FROM notebook a left join daily_topic b on a.topic_seq = b.seq left join member d on a.user_seq = d.seq WHERE a.seq = '.$notebook_seq)->result();
        return $data;
    }
    public function post_open_update($seq, $open_post){
        /*공개여부 설정*/
        $this->db->query('UPDATE notebook SET open_post= '.$open_post.' WHERE seq = '.$seq);
    }
    public function boarder_list_select($bo_table, $boarder_page){
        $boarder_page_count = $this->db->query('SELECT * FROM boarder_post WHERE 	boarder_seq = "'.$bo_table.'" ORDER BY seq DESC')->num_rows();
        $boarder_page_num = ceil($boarder_page_count/10);
        if($boarder_page == "0"){
            $boarder_page_list = 0;
        } else {
            $boarder_page_list = $boarder_page*10;
        }
        $this->db->select("t.*, @rownum:=@rownum+1 as new_seq  " , false);
        $this->db->from("(SELECT * FROM boarder_post order by boarder_post_create_date)t, (SELECT @rownum:=0) R", false);
        $this->db->where_in('boarder_seq', $bo_table);
        $this->db->order_by('new_seq DESC');
        $this->db->limit("10", $boarder_page_list);
        $query = $this->db->get();
        $boarder_content = $query->result();
        $data = array("boarder_content"=>$boarder_content, "boarder_page_num"=>$boarder_page_num, "boarder_page"=>$boarder_page);
        return $data;
    }
    public function boarder_post_search($bo_table, $boarder_page, $category, $boarder_list_search_input){
        if($category == "all"){
            $boarder_page_count = $this->db->query('SELECT * FROM boarder_post WHERE boarder_seq = "'.$bo_table.'" AND boarder_post_title LIKE "%'.$boarder_list_search_input.'%" or boarder_seq = "'.$bo_table.'" AND boarder_post_create_member LIKE "%'.$boarder_list_search_input.'%" ORDER BY seq DESC')->num_rows();
        } else if($category == "boarder_post_title"){
            $boarder_page_count = $this->db->query('SELECT * FROM boarder_post WHERE boarder_seq = "'.$bo_table.'" AND boarder_post_title LIKE "%'.$boarder_list_search_input.'%"	ORDER BY seq DESC')->num_rows();
        } else if($category == "boarder_post_create_member"){
            $boarder_page_count = $this->db->query('SELECT * FROM boarder_post WHERE boarder_seq = "'.$bo_table.'" AND boarder_post_create_member LIKE "%'.$boarder_list_search_input.'%"	ORDER BY seq DESC')->num_rows();
        }
        $boarder_page_num = ceil($boarder_page_count/10);
        if($boarder_page == "0"){
            $boarder_page_list = 0;
        } else {
            $boarder_page_list = $boarder_page*10;
        }
        $this->db->select("t.*, @rownum:=@rownum+1 as new_seq  " , false);
        $this->db->from("(SELECT * FROM boarder_post order by boarder_post_create_date)t, (SELECT @rownum:=0) R", false);
        if($category == "all"){
            $this->db->where('boarder_seq', $bo_table);
            $this->db->like('boarder_post_title', $boarder_list_search_input, 'both');
            $this->db->or_where('boarder_seq', $bo_table);
            $this->db->like('boarder_post_create_member', $boarder_list_search_input, 'both');
        } else if($category == "boarder_post_title"){
            $this->db->where('boarder_seq', $bo_table);
            $this->db->like('boarder_post_title', $boarder_list_search_input, 'both');
        } else if($category == "boarder_post_create_member"){
            $this->db->where('boarder_seq', $bo_table);
            $this->db->like('boarder_post_create_member', $boarder_list_search_input, 'both');
        }
        $this->db->order_by('new_seq DESC');
        $this->db->limit("10", $boarder_page_list);
        $query = $this->db->get();
        $boarder_content = $query->result();
        /*$boarder_content = $this->db->query('SELECT * FROM boarder_post WHERE 	boarder_seq = "'.$bo_table.'" ORDER BY seq DESC Limit '.$boarder_page_list.', 10 ')->result();*/
        $data = array("boarder_content"=>$boarder_content, "boarder_page_num"=>$boarder_page_num, "boarder_page"=>$boarder_page);
        return $data;
    }
    public function admin_boarder_post_select(){
        $this->db->select("*, @rownum:=@rownum+1 as new_seq  " , false);
        $this->db->from("boarder_post, (SELECT @rownum:=0) R", false);
        $this->db->order_by('boarder_post_create_date DESC');
        $query = $this->db->get();
        $data = $query->result();
        return $data;
    }
    public function boarder_select($page_seq){
        /*전체내용조회*/
        $this->db->select("*" , false);
        $this->db->from("boarder_post", false);
        $this->db->where_in('seq', $page_seq);
        $query = $this->db->get();
        $boarder_content = $query->result();
        $data =  $boarder_content;
        return $data;
    }
    public function boarder_view_count_update($page_seq){
        /*조회수증가 */
        $this->db->query('UPDATE boarder_post SET boarder_post_hits=boarder_post_hits+1  WHERE seq = "'.$page_seq.'"');
    }
    public function admin_boarder_select($page_seq){
        /*전체내용조회*/
        $this->db->select("*" , false);
        $this->db->from("boarder_post", false);
        $this->db->where_in('seq', $page_seq);
        $query = $this->db->get();
        $boarder_content = $query->result();
        $data =  $boarder_content;
        return $data;
    }
    public function comment_select($page_seq){

        /*댓글내용조회 member 테이블과 조인*/
        $this->db->select("*" , false);
        $this->db->from("ein_member", false);
        $this->db->join('boarder_comment', 'boarder_comment.comment_insert_member_seq = ein_member.seq');
        $this->db->where('post_seq', $page_seq);
        $query = $this->db->get();
        $boarder_comment = $query->result();
        /*$boarder_content = $this->db->query('SELECT * FROM boarder_post WHERE 	boarder_seq = "'.$bo_table.'" ORDER BY seq DESC Limit '.$boarder_page_list.', 10 ')->result();*/
        $data =  $boarder_comment;
        return $data;
    }

    public function thumbnail_img_move($boarder_post_thumbnail_img){
        $dir_name = 'static/upload/'.$this->session->userdata('member_id').'/thumbnail/';
        if(is_dir($dir_name) != 1) {
            mkdir($dir_name, 0777, TRUE);
        }
        $name = explode('/', $boarder_post_thumbnail_img);
        $file_name = end($name);
        $config['image_library'] = 'imagemagick';
        $config['library_path'] = '/usr/bin/';
        $config['source_image'] = $boarder_post_thumbnail_img;
        $config['new_image'] = $dir_name.$file_name;
        $config['create_thumb'] = FALSE;
        $config['maintain_ratio'] = TRUE;
        $config['width']         = 360;
        $config['height']       = 360;

        $this->load->library('image_lib', $config);

        if ( ! $this->image_lib->resize())
        {
            echo $this->image_lib->display_errors();
        }


        return '/'.$dir_name.$file_name;
    }
    public function boarder_post_insert($boarder_post_title, $boarder_post_secret, $boarder_post_content, $boarder_seq, $boarder_post_sub_title, $boarder_post_thumbnail_img, $boarder_post_pw){
        if($boarder_post_secret != "" || $boarder_post_secret != NULL || $boarder_post_secret != 'undefined'){
            $boarder_post_level = "10";
        } else {
            $boarder_post_level = "1";
            $boarder_post_secret = "0";
        }
        $boarder_post_create_member = $this->session->userdata('member_id');
        $boarder_post_create_date = date("Y-m-d H:i:s",time());
        $data = array(
            'boarder_seq' => $boarder_seq,
            'boarder_post_title' => $boarder_post_title,
            'boarder_post_secret' => $boarder_post_secret,
            'boarder_post_pw' => $boarder_post_pw,
            'boarder_post_content' => $boarder_post_content,
            'boarder_post_level' => $boarder_post_level,
            'boarder_post_create_date' => $boarder_post_create_date,
            'boarder_post_create_member' => $boarder_post_create_member,
            'boarder_post_sub_title' => $boarder_post_sub_title,
            'boarder_post_thumbnail_img' => $boarder_post_thumbnail_img
        );

        $this->db->insert('boarder_post', $data);
    }
    public function boarder_post_update($seq, $boarder_post_title, $boarder_post_secret, $boarder_post_content, $boarder_seq, $boarder_post_sub_title, $boarder_post_thumbnail_img, $boarder_post_pw){
        if($boarder_post_secret != "" || $boarder_post_secret != NULL || $boarder_post_secret != 'undefined'){
            $boarder_post_level = "10";
        } else {
            $boarder_post_level = "1";
            $boarder_post_secret = "0";
        }
        $boarder_post_change_date = date("Y-m-d H:i:s",time());
        $data = array(
            'boarder_post_title' => $boarder_post_title,
            'boarder_post_secret' => $boarder_post_secret,
            'boarder_post_pw' => $boarder_post_pw,
            'boarder_post_content' => $boarder_post_content,
            'boarder_seq' => $boarder_seq,
            'boarder_post_sub_title' => $boarder_post_sub_title,
            'boarder_post_change_date' => $boarder_post_change_date,
            'boarder_post_level' => $boarder_post_level,
            'boarder_post_thumbnail_img' => $boarder_post_thumbnail_img
        );

        $this->db->where('seq', $seq);
        $this->db->update('boarder_post', $data);
    }

    public function boarder_delete($data){
        if(is_array($data)){
            foreach($data as $data2){
                $num = $this->db->query('DELETE FROM boarder_post WHERE seq ="'.$data2.'"');
            }
        } else{
            $num = $this->db->query('DELETE FROM boarder_post WHERE seq ="'.$data.'"');
        }

        return $num;
    }
    public  function boarder_delete_comment($seq){
        return $num = $this->db->query('DELETE FROM boarder_comment WHERE seq ="'.$seq.'"');
    }
    public function boarder_comment_insert($post_seq, $comment_insert_member_seq, $comment, $comment_secret){
        if($comment_secret == "" || $comment_secret == NULL || $comment_secret == 'undefined'){
            $comment_secret = "0";
        } else {

        }
        $comment_insert_date = date("Y-m-d H:i:s",time());
        $data = array(
            'post_seq' => $post_seq,
            'comment_insert_member_seq' => $comment_insert_member_seq,
            'comment' => $comment,
            'comment_secret' => $comment_secret,
            'comment_insert_date' => $comment_insert_date
        );

        $data2 = $this->db->insert('boarder_comment', $data);
        return $data2;
    }

    public function boarder_comment_update($comment_seq, $comment, $comment_secret){
        if($comment_secret == "" || $comment_secret == NULL || $comment_secret == 'undefined'){
            $comment_secret = "0";
        } else {

        }
        $comment_update_date = date("Y-m-d H:i:s",time());
        $data = array(
            'seq' => $comment_seq,
            'comment' => $comment,
            'comment_secret' => $comment_secret,
            'comment_change_date' => $comment_update_date
        );
        $data2 = $this->db->query('UPDATE boarder_comment SET comment= "'.$comment.'", comment_secret= "'.$comment_secret.'", comment_change_date= "'.$comment_update_date.'" WHERE seq = "'.$comment_seq.'"');
        return $data2;
    }
    public function boarder_category_select(){
        $data = $this->db->query('SELECT * FROM boarder_list')->result();
        return $data;
    }


    //앵귤러 모델
    public function TopicList(){
        //주제들을 모두 가져온다.
        $result = $this->db->query('SELECT * FROM daily_topic')->result();
        return $result;
    }
    public function TodayTopic(){
        // 그날의 주제를 가져온다.
        $result = $this->db->query("SELECT DATE_FORMAT(public_date,'%Y-%m-%d') new_public_date, group_concat(topic), group_concat(seq), group_concat(category) FROM daily_topic GROUP BY new_public_date")->result();
        return $result;
    }
    public function PostList(){
        // 그날의 주제를 가져온다.
        $result =$this->db->query('SELECT a.seq as seq, a.topic_seq, a.user_seq, a.daily_contant, a.open_post, a.text_align, a.bg_img_url, a.creat_date , b.seq as bseq, b.topic, b.category FROM notebook a left join daily_topic b on a.topic_seq = b.seq order by a.creat_date DESC')->result();
        return $result;
    }
    public function myTopicList($user_seq){
        // 그날의 주제를 가져온다.
        $result =$this->db->query('SELECT a.seq as seq, a.topic_seq, a.user_seq, a.daily_contant, a.open_post, a.text_align, a.bg_img_url, a.creat_date , b.seq as bseq, b.topic, b.category FROM notebook a left join daily_topic b on a.topic_seq = b.seq WHERE user_seq '.$user_seq.' order by a.creat_date DESC')->result();
        return $result;
    }
}