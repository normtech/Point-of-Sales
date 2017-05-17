<?php
define('THIS_PAGE','index');
require 'includes/config.inc.php';
$array = array();
$array['module'] = 'login';

if(isset($_POST['login'])){
	$post_array = $_POST;
	$array['post'] = $post_array;
	$post_array['user_password']=sha1(md5($post_array['user_password']));
	$employee->user_login($post_array);
	if(error())
    {
        $array['error_msg'] = error('single');
    }
    elseif(msg())
    {
    	$array['success_msg'] = msg('single');
    }
}
include_login_template_file('login.php',$array);
