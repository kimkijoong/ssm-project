<?php

Class Member_model extends CI_Model {
    public function member_login($user_email, $user_pw){
        $user_email_num = $this->db->query('SELECT * FROM member WHERE user_email = "'.$user_email.'"')->num_rows();
        if($user_email_num == "1"){
            $user_pw_num = $this->db->query('SELECT * FROM member WHERE user_email = "'.$user_email.'" AND user_pw = "'.$user_pw.'"')->num_rows();
            if($user_pw_num == "1"){
                return $this->db->query('SELECT * FROM member WHERE user_email = "'.$user_email.'" AND user_pw = "'.$user_pw.'"')->result();
            } else {
                return $num ="1";
            }
        } else {
            return $num ="0";
        }
    }
    public function id_select($user_email){
        $user_email_num = $this->db->query('SELECT * FROM member WHERE user_email = "'.$user_email.'"')->num_rows();
        return $user_email_num;
    }
    public function name_select($member_name){
        $member_name_num = $this->db->query('SELECT * FROM member WHERE user_name = "'.$member_name.'"')->num_rows();
        return $member_name_num;
    }
    public function pw_change($seq, $old_pw, $new_pw){
        $data = $this->db->query('SELECT * FROM member WHERE seq = "'.$seq.'" AND user_pw = "'.$old_pw.'"')->num_rows();
        if($data == 1){
            $this->db->query('UPDATE member SET user_pw= "'.$new_pw.'" WHERE seq = "'.$seq.'"');
            $data = $this->db->affected_rows();
            if($data == 1){
                return $data;
            } else {
                $data = 2;
                return $data;
            }
        } else {
            return $data= 0;
        }
    }
    public function user_pw_change($user_email){
        $data = $this->db->query('SELECT * FROM member WHERE user_email = "'.$user_email.'"')->num_rows();
        function get_random_string($type = '', $len = 10) {
            $lowercase = 'abcdefghijklmnopqrstuvwxyz';
            $uppercase = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $numeric = '0123456789';
            $special = '`~!@#$%^&*()-_=+\\|[{]};:\'",<.>/?';
            $key = '';
            $token = '';
            if ($type == '') {
                $key = $lowercase.$uppercase.$numeric;
            } else {
                if (strpos($type,'09') > -1) $key .= $numeric;
                if (strpos($type,'az') > -1) $key .= $lowercase;
                if (strpos($type,'AZ') > -1) $key .= $uppercase;
                if (strpos($type,'$') > -1) $key .= $special;
            }
            for ($i = 0; $i < $len; $i++) {
                $token .= $key[mt_rand(0, strlen($key) - 1)];
            }
            return $token;
        }
        $new_pw = get_random_string();
        if($data == 1){
            $this->db->query('UPDATE member SET user_pw= "'.$new_pw.'" WHERE user_email = "'.$user_email.'"');
            return $new_pw;
        } else {
            return $data= 0;
        }
    }
    public function insert_member($user_email, $user_pw, $user_name){
        $new_file_dir = "/static/img/profile.png";
        $data = array(
            'user_email' => $user_email ,
            'user_pw' => $user_pw ,
            'user_name' => $user_name,
            'user_profile' => $new_file_dir
        );

        $insert_data = $this->db->insert('member', $data);
        return $insert_data;
    }

    public function user_profile_update($seq, $member_about, $member_level, $member_name, $member_profile_img){
        $this->db->query('UPDATE member SET member_about= "'.$member_about.'", member_level= "'.$member_level.'", member_name= "'.$member_name.'", member_profile_img= "'.$member_profile_img.'" WHERE seq = "'.$seq.'"');
        $data = $this->db->affected_rows();
        return $data;
    }
    public function member_user_profile_update($seq, $member_about, $member_name, $member_profile_img){
        $this->db->query('UPDATE member SET member_about= "'.$member_about.'", member_name= "'.$member_name.'", member_profile_img= "'.$member_profile_img.'" WHERE seq = "'.$seq.'"');
        $data = $this->db->affected_rows();
        return $data;
    }
    // Admin
    public function select_member($member_seq){
        $member = $this->db->query('SELECT * FROM member WHERE seq = "'.$member_seq.'"')->result();
        return $member;
    }

    public function select_member_list(){
        $this->db->select("*, @rownum:=@rownum+1 as new_seq " , false);
        $this->db->from("member, (SELECT @rownum:=0) R", false);
        $this->db->order_by('new_seq ASC');
        $query = $this->db->get();
        $member = $query->result();
        return $member;
    }

    public function delete_member($data){
        $num = $this->db->query('DELETE FROM member WHERE seq ="'.$data.'"');
        return $num;
    }
}