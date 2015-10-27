<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Login extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->library('encrypt');
    }

    public function index(){
    	$session = $this->session->userdata('isLogin');
            if($session == FALSE){
                $this->load->view("index");
            }else{
                redirect('dashboard');
            }
    }

	public function Ceklogin(){

        $username = $this->input->post('username');
        $password = hash('SHA256', $this->input->post('password'));
        $query = $this->db->get_where('user', array('username'=> $username, 'password'=> $password));
        $user = $query->row();
        if($query->num_rows() != 0){
            $this->session->set_userdata('isLogin', TRUE);
            $this->session->set_userdata('id',$user->id);
            $this->session->set_userdata('username',$username);
			redirect('dashboard');
        } else {
            $this->session->set_flashdata('pesan', 'Login gagal !');
            redirect("login");
        }
	}

    public function logout(){
    $this->session->sess_destroy();
    redirect(base_url().'login');
    }
}
