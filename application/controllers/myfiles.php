<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Myfiles extends CI_Controller {

	public function __construct(){
            parent::__construct();
    }

	public function index(){
		if($this->session->userdata('isLogin') == FALSE){
	    	redirect('login');
	    } else {
			$id_user = $this->session->userdata('id');
			$listfiles = $this->db->get_where("dokumen", array('id_user' => $id_user))->result_array();
			$data = array(
				"contents" 	=> "myfiles",
				"files"		=> $listfiles,
			);
			$this->load->view("dashboard",$data);
        }
    }

	public function download(){
		if($this->session->userdata('isLogin') == FALSE){
	    	redirect('login');
	    } else {
			//print_r($this->uri->segment(3));
			if(!empty($this->uri->segment(3))){
				$id = $this->uri->segment(3);
				$query = $this->db->get_where("dokumen", array('id' => $id))->row();
				$nama = $query->nama_enkrip;
				$file = ($_SERVER['DOCUMENT_ROOT']."/enkrip/uploads/".$nama);

				if (file_exists($file)) {
			    header('Content-Description: File Transfer');
			    header('Content-Type: application/octet-stream');
			    header('Content-Disposition: attachment; filename='.$nama.'.encrypted');
			    header('Content-Transfer-Encoding: binary');
			    header('Expires: 0');
			    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
			    header('Pragma: public');
			    header('Content-Length: ' . filesize($file));
			    readfile($file);
			    exit;
				}
			}
        }
    }
}
