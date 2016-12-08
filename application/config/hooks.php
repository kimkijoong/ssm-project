<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$hook['post_controller_constructor'][] = array(
    'class'     => 'Acl', // 뭐 이름은 Acl이라고는 했는데 적당히.. ㅎㅎ
    'function'  => 'checkPermission',
    'filename'  => 'Acl.php',
    'filepath'  => 'hooks'
);
/*
| -------------------------------------------------------------------------
| Hooks
| -------------------------------------------------------------------------
| This file lets you define "hooks" to extend CI without hacking the core
| files.  Please see the user guide for info:
|
|	http://codeigniter.com/user_guide/general/hooks.html
|
*/
