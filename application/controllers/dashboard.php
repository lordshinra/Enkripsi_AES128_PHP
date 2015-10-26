<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct(){
            parent::__construct();
            $this->load->library('encrypt');
    }

	public function index(){
		if($this->session->userdata('isLogin') == FALSE){
	    	redirect('login');
	    } else {
			$data = array(
				"contents" => "home",
			);
			$this->load->view("dashboard",$data);
        }
    }

	public function logout(){
        // menghapus session dan mengembalikan ke login_form
        $this->session->sess_destroy();
        redirect('login/index');
    }
}
