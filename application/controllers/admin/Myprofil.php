<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Myprofil extends CI_Controller {
    public function __construct(){
        parent::__construct();
        if($this->session->userdata('level')==NULL){
            redirect('auth');
        }
    }
	public function index(){

        $data = array(
            'judul_halaman' => 'My Profil Admin | Sandpaper Holiday Trans',
        );
		$this->template->load('template_admin','admin/myprofil',$data);
	}
    
}
