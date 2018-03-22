<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if ( ! function_exists('check_session'))
{
    function  check_session(){
		$CI = & get_instance();
        if(!$CI->session->userdata('logged_in')){
        redirect('auth');
        }
    }
}
