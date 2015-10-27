<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Dekripsi extends CI_Controller {

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
        redirect('dekripsi/file');
    }

	public function file(){

		$dekrip = $this->input->post("dekripfile");
        $password = $this->input->post("pass");

        if(isset($dekrip)){

		$writedir = $_SERVER['DOCUMENT_ROOT']."/enkrip/uploads";

        $id_user = $this->session->userdata('id');
		$passhash = hash("SHA256", $password, true);
		$aesinitv = $this->aesinitvector;
		$namefile = $_FILES["file"]["name"];

        if(is_uploaded_file($_FILES['file']['tmp_name'])){
            $namefile = $_FILES['file']['tmp_name'];
            $allowed =  array('encrypted');
            $filename = $_FILES['file']['name'];
            $ext = pathinfo($filename, PATHINFO_EXTENSION);

            /*if(!in_array($ext,$allowed) ) {
                $alert2 = "Decrypt File Gagal, File yang di Input Bukan File Enkripsi";
            } else {*/
            $sourcesize = filesize($namefile);
            $filesource = fopen($namefile, "rb");
            if ($filesource !== false)
            {
                $filename = ""; $filechar = "";
                while ($filechar != "\1") { $filename .= $filechar; $filechar = fread($filesource, 1); $stream_meta_data = stream_get_meta_data($filesource); if($stream_meta_data['unread_bytes'] <= 0) break;}
                $filesize = ""; $filechar = "";
                while ($filechar != "\1") { $filesize .= $filechar; $filechar = fread($filesource, 1); $stream_meta_data = stream_get_meta_data($filesource); if($stream_meta_data['unread_bytes'] <= 0) break;}
                $filesize = intval($filesize);
                $fileket = ""; $filechar = "";
                while ($filechar != "\1") { $fileket .= $filechar; $filechar = fread($filesource, 1); $stream_meta_data = stream_get_meta_data($filesource); if($stream_meta_data['unread_bytes'] <= 0) break;}
                if($fileket == "enkrip")
                {
                $magicode = fread($filesource, 16);
                $aesinitv = fread($filesource, 16);
                $dmessage = mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $passhash, $magicode, MCRYPT_MODE_CBC, $aesinitv);
                if (rtrim($dmessage) == "magicstring")
                {
                    header('Content-Type: application/octet-stream');
                    header('Content-Disposition: attachment; filename="'.$filename.'"');
                    header('Content-Length: '.$filesize);

                        $filesourcedata = fread($filesource, filesize($namefile));
                        $decodedata = base64_decode($filesourcedata);
                        $aes = new AesCtr();
                        $dmessage = $aes->decrypt($decodedata, $passhash, 128);
                        print($dmessage);

                    fclose($fsrcobjc);
                    exit(0);
                    $data["success"] = "Dekripsi File Berhasil";

                } else {
                $data["alert"] = "Password Salah"; }
                } else {
                $data["alert"] = "bukan file enkrip"; }
            } else {
            $data["alert"] = "error"; }
            }
        //}
        }
        $data["contents"] = "dekrip_file";
		$this->load->view("dashboard",$data);
	}

    public function text(){

		$dekrip = $this->input->post("dekriptext");

        if(isset($dekrip)){
    		$password = $this->input->post("pass");
    		$passhash = hash("SHA256", $password, true);
            $fsrcmesg = $this->input->post("text");
            $hashpass = base64_decode(substr($fsrcmesg,0,44));

            if($hashpass == $passhash){
                $pmessage = base64_decode(substr($fsrcmesg,44));
                $aes = new AesCtr();
                $emessage =$aes->decrypt($pmessage, $passhash, 128);
                $result = $emessage;
                $data["plain"] =  $result;
            }else{
                $data["alert"] =  "Password Salah";
            }
        }

        $data["contents"] =  "dekrip_text";
		$this->load->view("dashboard",$data);
	}
}
