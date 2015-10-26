<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Enkripsi extends CI_Controller {

    public function __construct(){
            parent::__construct();
            $this->load->library('encrypt');
            $this->load->library('aes');
            if($this->session->userdata('isLogin') == FALSE){
    	    	redirect('login');
    	    }
            $this->aesinitvector = openssl_random_pseudo_bytes(16);
    }

    public function index(){
        redirect('enkripsi/file');
    }

	public function file(){

		$enkrip = $this->input->post("enkripfile");
        $password = $this->input->post("pass");

        if(isset($enkrip) && !empty($password)){

		$writedir = $_SERVER['DOCUMENT_ROOT']."/enkrip/uploads";

        $id_user = $this->session->userdata('id');
		$passhash = hash("SHA256", $password, true); //password di hash dengan SHA256
		$aesinitv = $this->aesinitvector;
		$namefile = $_FILES["file"]["name"];

			if (($_FILES["file"]["error"] < 1) && ($_FILES["file"]["size"] < 3145728)){ //max size file
				while (1)
				{
					$pinncode = mt_rand(10,100000);
                    $enkripname = $pinncode."_".$_FILES["file"]["name"].".encrypted";
					$filename = ($writedir."/".$enkripname);
					if (!file_exists($filename)) { break; }
				}
				$filesize = $_FILES['file']['tmp_name'];
				$filesource = fopen($_FILES["file"]["tmp_name"], "rb");
				$filenew = fopen($filename, "wb");

                $data_insert = array(
					'nama_dokumen' => $namefile,
                    'id_user' => $id_user,
					'dokumen_id' => $pinncode,
                    'nama_enkrip' => $enkripname
				);
				$this->db->insert('dokumen', $data_insert);

				if (($filesource !== false) && ($filenew !== false)){
					fwrite($filenew, "".$_FILES["file"]["name"].""); # filename as string (unknown length)
					fwrite($filenew, "\1"); # non-printable separator (1 byte)
					fwrite($filenew, "".$_FILES["file"]["size"].""); # filesize in bytes (unknown length)
					fwrite($filenew, "\1"); # non-printable separator (1 byte)
					fwrite($filenew, "enkrip"); # filename as string (unknown length)
					fwrite($filenew, "\1"); # non-printable separator (1 byte)
					$magicstring = mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $passhash, "magicstring", MCRYPT_MODE_CBC, $aesinitv);
					fwrite($filenew, $magicstring); # encrypted magic string (16 bytes)
					fwrite($filenew, $aesinitv); # initialization vector (16 bytes)

                    //proses enkripsi//
						$filesourcedata = fread($filesource,filesize($filesize));
						$aes = new AesCtr();
						$enkripdata = $aes->encrypt($filesourcedata, $passhash, 128);
                        $encodedata = base64_encode($enkripdata); //hasil enkripsi di encode dengan BASE64
						fwrite($filenew, $encodedata);
                    //---//

					fclose($filenew);
					fclose($filesource);
                    $data['success'] = "Enkripsi File Berhasil";
				}
            }else{
                $data['alert'] = "Enkripsi File Gagal";
            }
        }

        $data['contents'] = "enkrip_file";
		$this->load->view("dashboard",$data);
	}

    public function text(){

		$enkrip = $this->input->post("enkriptext");

        if(isset($enkrip)){

		$password = $this->input->post("pass");
		$passhash = hash("SHA256", $password, true);

        $fsrcmesg = $this->input->post("text");
        $hashmesg = base64_encode($passhash);

        $aes = new AesCtr();
        $emessage = $aes->encrypt($fsrcmesg, $passhash, 128);
        $encode = base64_encode($emessage);
        $result = $hashmesg.$encode;
        $data["cipher"] =  $result;
        }

        $data["contents"] =  "enkrip_text";
		$this->load->view("dashboard",$data);
	}

    public function email(){

		$enkrip = $this->input->post("enkripmail");

        if(isset($enkrip)){
    		$password = $this->input->post("pass");
    		$passhash = hash("SHA256", $password, true);

            $fsrcmesg = $this->input->post("text");
            $hashmesg = base64_encode($passhash);

            $aes = new AesCtr();
    		$emessage =$aes->encrypt($fsrcmesg, $passhash, 128);
    		$encode = base64_encode($emessage);
    		$result = $hashmesg.$encode;

    		$to = $this->input->post("mail");
    		$subject = $this->input->post("subjek");
            $body=$result;

            $kirim = mail($to,$subject,$body);

    		if($kirim){
    			$data["alert"] = "Email berhasil dikirim";
    		}else{
    			$data["alert"] = "Email gagal dikirim";
    		}
        }

        $data["contents"] =  "enkrip_email";
		$this->load->view("dashboard",$data);
	}
}
