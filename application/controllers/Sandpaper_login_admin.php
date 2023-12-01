<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sandpaper_login_admin extends CI_Controller {
    public function __construct(){
        parent::__construct();
    }
	public function index(){
        if ($this->session->userdata('username'))
        redirect('admin/home');

		$this->load->view('login');
	}

    public function login(){
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));
        $this->db->from('user');
        $this->db->where('username',$username);
        $cek = $this->db->get()->row();
        if($cek==NULL){
            $this->session->set_flashdata('alert','
                <div class="alert alert-danger alert-dismissible" role="alert">
                        Username Tidak ada !
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                ');
                redirect('sandpaper_login_admin');
        }elseif($password==$cek->password){
            $data = array(
                'id_user' => $cek->id_user,
                'nama' => $cek->nama,
                'username' => $cek->username,
                'level' => $cek->level
            );
            $this->session->set_userdata($data);
                redirect('admin/home');
        }else{
            $this->session->set_flashdata('alert','
            <div class="alert alert-danger alert-dismissible" role="alert">
                    Password Salah !
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            ');
            redirect('sandpaper_login_admin');
        }
	}
    public function logout(){
        $this->session->sess_destroy();
        redirect('sandpaper_login_admin');
    }

}
