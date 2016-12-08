<?php

Class Img_upload_model extends CI_Model {
    public function image_upload_model($user_file){
        if($this->session->userdata('member_id')){
            $dir_name = 'static/upload/'.$this->session->userdata('member_id').'/';
        } else {
            $dir_name = 'static/upload/temporarily/';
        }

        //디렉토리 생성

        if(is_dir($dir_name) != 1) {
            mkdir($dir_name, 0777, TRUE);
        }

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

        $origin_file_name = $_FILES['user_file']['name'];
        $config['upload_path'] = $dir_name;
        // git,jpg,png 파일만 업로드를 허용한다.
        $config['allowed_types'] = 'gif|jpg|png';
        // 허용되는 파일의 최대 사이즈
        $config['max_size'] = '1000';
        // 이미지인 경우 허용되는 최대 폭
        $config['overwrite'] = FALSE;
        $config['remove_spaces'] = true;

        $config['file_name'] = get_random_string();
        $this->load->library('upload', $config);
        if(!$this->upload->do_upload("user_file")){
            $error = "1";
            return $error;
        } else {
            $data = $this->upload->data();
            $data_file_name = array(
                'a' => $dir_name,
                'b' => $data['file_name'],
                'c' => $origin_file_name
            );
            return $data_file_name;
        }
    }
    public function thumbnail_upload_model($user_file){
        $dir_name = 'static/upload/temporarily/';
        //디렉토리 생성

        if(is_dir($dir_name) != 1) {
            mkdir($dir_name, 0777, TRUE);
        }

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

        $origin_file_name = $_FILES['user_file']['name'];
        $config['upload_path'] = $dir_name;
        // git,jpg,png 파일만 업로드를 허용한다.
        $config['allowed_types'] = 'gif|jpg|png';
        // 허용되는 파일의 최대 사이즈
        $config['max_size'] = '1000';
        // 이미지인 경우 허용되는 최대 폭
        $config['overwrite'] = FALSE;
        $config['remove_spaces'] = true;

        $config['file_name'] = get_random_string();
        $this->load->library('upload', $config);
        $this->load->library('image_lib');

        if(!$this->upload->do_upload("user_file")){
            $error = "1";
            return $error;
        } else {
            $data = $this->upload->data();
            list($w, $h) = getimagesize($dir_name.'/'.$data['file_name']);
            if($w > $h){
                $width = ($w - $h)/2;
                $height = '0';
            } else if($w < $h){
                $width = '0';
                $height = ($h - $w)/2;
            } else if($w == $h){
                $width = '0';
                $height = '0';
            }
            $config['image_library'] = 'imagemagick';
            $config['library_path'] = '/usr/bin/';
            $config['source_image'] = $dir_name.'/'.$data['file_name'];
            $config['x_axis'] = $width;
            $config['y_axis'] = $height;
            $this->image_lib->initialize($config);

            if ( ! $this->image_lib->crop())
            {
                echo $this->image_lib->display_errors();
            } else {
                $config['image_library'] = 'ImageMagick';
                $config['library_path'] = '/usr/bin/';
                $config['source_image'] = $dir_name.'/'.$data['file_name'];
                $config['rotation_angle'] = 'hor';
                $this->image_lib->initialize($config);

                if ( ! $this->image_lib->rotate())
                {
                    echo $this->image_lib->display_errors();
                } else {
                    $config['image_library'] = 'ImageMagick';
                    $config['library_path'] = '/usr/bin/';
                    $config['source_image'] = $dir_name.'/'.$data['file_name'];
                    $config['rotation_angle'] = 'vrt';
                    $this->image_lib->initialize($config);

                    if ( ! $this->image_lib->rotate())
                    {
                        echo $this->image_lib->display_errors();
                    } else {
                        $config['image_library'] = 'imagemagick';
                        $config['library_path'] = '/usr/bin/';
                        $config['source_image'] = $dir_name.'/'.$data['file_name'];
                        $config['x_axis'] = $width;
                        $config['y_axis'] = $height;
                        $this->image_lib->initialize($config);

                        if ( ! $this->image_lib->crop())
                        {
                            echo $this->image_lib->display_errors();
                        } else {
                            $config['image_library'] = 'ImageMagick';
                            $config['library_path'] = '/usr/bin/';
                            $config['source_image'] = $dir_name.'/'.$data['file_name'];
                            $config['rotation_angle'] = 'hor';
                            $this->image_lib->initialize($config);

                            if ( ! $this->image_lib->rotate())
                            {
                                echo $this->image_lib->display_errors();
                            } else {
                                $config['image_library'] = 'ImageMagick';
                                $config['library_path'] = '/usr/bin/';
                                $config['source_image'] = $dir_name.'/'.$data['file_name'];
                                $config['rotation_angle'] = 'vrt';
                                $this->image_lib->initialize($config);

                                if ( ! $this->image_lib->rotate())
                                {
                                    echo $this->image_lib->display_errors();
                                }
                            }
                        }
                    }
                }
            }

           /* $config['image_library'] = 'gd2';
            $config['source_image'] = $dir_name.'/'.$data['file_name'];
            $config['create_thumb'] = FALSE;
            $config['maintain_ratio'] = TRUE;
            $config['width']         = 360;
            $config['height']       = 360;

            $this->load->library('image_lib', $config);

            $this->image_lib->resize();*/
            $data_file_name = array(
                'a' => $dir_name,
                'b' => $data['file_name'],
                'c' => $origin_file_name,
                'd' => $height
            );
            return $data_file_name;
        }
    }
    public function multi_img_upload_model($user_file){
        $this->load->library('upload');
        $user_file = $_FILES;
        $user_file_count = count($_FILES['user_file']['name']);
        if($this->session->userdata('member_id')){
            $dir_name = 'static/upload/'.$this->session->userdata('member_id').'/';
        } else {
            $dir_name = 'static/upload/temporarily/';
        }
        //디렉토리 생성
        if(is_dir($dir_name) != 1) {
            mkdir($dir_name, 0777, TRUE);
        }
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
        for($i = 0 ; $i < $user_file_count ; $i++){
            $user_file_name = $user_file['user_file']['name'][$i];
            $a = explode('.',$user_file_name);
            $b = array_pop($a);
            $filename_ext = strtolower($b);
            $_FILES['user_file']['name']	 = get_random_string().".".$filename_ext;
            $_FILES['user_file']['type']	 = $user_file['user_file']['type'][$i];
            $_FILES['user_file']['tmp_name'] = $user_file['user_file']['tmp_name'][$i];
            $_FILES['user_file']['error']	 = $user_file['user_file']['error'][$i];
            $_FILES['user_file']['size']	 = $user_file['user_file']['size'][$i];

            $upload_config = Array(
                'upload_path' 	=> $dir_name,
                'allowed_types' => 'gif|jpg|jpeg|png',
                'max_size' 		=> '1000',
                'overwrite'     => FALSE,
                'remove_spaces' => true
            );

            $this->upload->initialize($upload_config);
            if( ! $this->upload->do_upload('user_file')) {
                echo $this->upload->display_errors();
            }
            $data[] =
                array(
                    'a' => $dir_name,
                    'b' => $_FILES['user_file']['name'],
                    'c' => $user_file_name

                );
        }
        return $data;
    }
}
