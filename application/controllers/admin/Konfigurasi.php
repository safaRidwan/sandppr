<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konfigurasi extends CI_Controller {
    public function __construct(){
        parent::__construct();
        if($this->session->userdata('level')==NULL){
            redirect('auth');
        }
    }
	public function index(){
        $this->db->from('konfigurasi');
        $konfig = $this->db->get()->row();

        $this->db->from('home');
        $foto_home = $this->db->get()->result_array();

        $this->db->from('logo');
        $foto_logo = $this->db->get()->result_array();

        $data = array(
            'judul_halaman' => 'Konfigurasi Admin | Sandpaper Holiday Trans',
            'konfig'        => $konfig,
            'foto_home'   => $foto_home,
            'foto_logo'   => $foto_logo,
        );
		$this->template->load('template_admin','admin/konfigurasi',$data);
	}

    public function update(){
        $where = array('id_konfigurasi'   => 1);
        $data = array(
            'judul_website'         => $this->input->post('judul_website'),
            'profil_website'        => $this->input->post('profil_website'),
            'instagram'             => $this->input->post('instagram'),
            'facebook'              => $this->input->post('facebook'),
            'tiktok'                => $this->input->post('tiktok'),
            'youtube'               => $this->input->post('youtube'),
            'email'                 => $this->input->post('email'),
            'no_wa'                 => $this->input->post('no_wa'),
            'alamat'                => $this->input->post('alamat'),
            'hari_buka'             => $this->input->post('hari_buka'),
            'waktu_buka'            => $this->input->post('waktu_buka'),
            'contact_us'            => $this->input->post('contact_us'),
            'maps'                  => $this->input->post('maps'),
        
        );
        $this->db->update('konfigurasi',$data,$where);
        
        $this->session->set_flashdata('alert','
            <div class="alert alert-primary alert-dismissible" role="alert">
                    Pembaruan Konfigurasi Berhasil
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        ');
            redirect('admin/konfigurasi');
    }

}
