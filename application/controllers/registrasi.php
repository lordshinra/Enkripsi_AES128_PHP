<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Registrasi extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->library('encrypt');
    }

    public function index(){
    	$this->load->view("registrasi");
    }

    public function cekregistrasi(){
            $username = $this->input->post('username');
            $email = $this->input->post('email');
            $password = hash('SHA256', $this->input->post('password'));
            $this->db->select('*');
            $this->db->from('user');
            $this->db->where('username', $username);
            $this->db->or_where('email', $email);
            $query = $this->db->get();
            //$user = $query->row();
            if($query->num_rows() == 0){
                $data_insert = array(
					'username' => $username,
                    'email' => $email,
					'password' => $password
				);
				$this->db->insert('user', $data_insert);
                $this->session->set_flashdata('sukses', 'Registrasi Berhasil !');
    			redirect('login');
            } else {
                $this->session->set_flashdata('pesan', 'Registrasi gagal !');
                redirect("registrasi");
            }
	}

    public function logout(){
    $this->session->sess_destroy();
    redirect(base_url().'login');
    }
}
