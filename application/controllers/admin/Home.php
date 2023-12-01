<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    public function __construct(){
        parent::__construct();
        if($this->session->userdata('level')==NULL){
            redirect('auth');
        }
    }
	public function index(){

        $data = array(
            'judul_halaman' => 'Dashboard Admin | Sandpaper Holiday Trans',
        );
		$this->template->load('template_admin','admin/dashboard',$data);
	}

    public function updateFoto(){
        $namafoto = date('YmdHis').'.jpg';
        $config['upload_path'] = 'asset/upload/home/';
        $config['max_size'] = 3000 * 1024;
        $config['file_name'] = $namafoto;
        $config['allowed_types'] = '*';
        $this->load->library('upload', $config);
    
        if ($_FILES['foto_home']['size'] >= 3000 * 1024) {
            // Handle the size validation error here
            // ...
        } elseif (!$this->upload->do_upload('foto_home')) {
            $error = array('error' => $this->upload->display_errors());
            // Handle the upload error here
            // ...
        } else {
            // Get the current foto_home value
            $this->db->from('home');
            $this->db->where('id_home', 1);
            $old_foto = $this->db->get()->row()->foto_home;
    
            // Delete the old file if it exists
            $old_file_path = 'asset/upload/home/' . $old_foto;
            if (file_exists($old_file_path) && is_file($old_file_path)) {
                unlink($old_file_path); // Menghapus file lama
            }
    
            // Update the database with the new data
            $where = array('id_home' => 1);
            $data = array(
                'foto_home' => $namafoto
            );
            $this->db->update('home', $data, $where);
    
            // Set success flash message
            $this->session->set_flashdata('alert', '
                <div class="alert alert-primary alert-dismissible" role="alert">
                    Pembaruan Foto Home Berhasil
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            ');
            redirect('admin/konfigurasi');
        }
    }




    public function logo(){
        $namafoto = date('YmdHis').'.jpg';
        $config['upload_path'] = 'asset/upload/logo/';
        $config['max_size'] = 3000 * 1024;
        $config['file_name'] = $namafoto;
        $config['allowed_types'] = '*';
        $this->load->library('upload', $config);
    
        if ($_FILES['foto_logo']['size'] >= 3000 * 1024) {
            // Handle the size validation error here
            // ...
        } elseif (!$this->upload->do_upload('foto_logo')) {
            $error = array('error' => $this->upload->display_errors());
            // Handle the upload error here
            // ...
        } else {
            // Get the current foto_home value
            $this->db->from('logo');
            $this->db->where('id_logo', 1);
            $old_foto = $this->db->get()->row()->foto_logo;
    
            // Delete the old file if it exists
            $old_file_path = 'asset/upload/logo/' . $old_foto;
            if (file_exists($old_file_path) && is_file($old_file_path)) {
                unlink($old_file_path); // Menghapus file lama
            }
    
            // Update the database with the new data
            $where = array('id_logo' => 1);
            $data = array(
                'foto_logo' => $namafoto
            );
            $this->db->update('logo', $data, $where);
    
            // Set success flash message
            $this->session->set_flashdata('alert', '
                <div class="alert alert-primary alert-dismissible" role="alert">
                    Pembaruan Logo Berhasil
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            ');
            redirect('admin/konfigurasi');
        }
    }



    
}
