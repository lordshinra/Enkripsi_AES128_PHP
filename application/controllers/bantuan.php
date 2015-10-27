<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bantuan extends CI_Controller {

	public function __construct(){
            parent::__construct();
    }

	public function index(){
		if($this->session->userdata('isLogin') == FALSE){
	    	redirect('login');
	    } else {
			$data['contents'] = "bantuan";
			$this->load->view("dashboard",$data);
        }
    }
}
