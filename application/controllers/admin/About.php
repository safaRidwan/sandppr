<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller {
    public function __construct(){
        parent::__construct();
        if($this->session->userdata('level')==NULL){
            redirect('auth');
        }
    }
	public function index(){
        $this->db->from('about');
        $konfigabout = $this->db->get()->row();

        $this->db->from('profil_team');
        $profil = $this->db->get()->result_array();

        $this->db->from('about2');
        $foto_about = $this->db->get()->result_array();
        
        $data = array(
            'judul_halaman' => 'About Admin | Sandpaper Holiday Trans',
            'konfigabout'   => $konfigabout,
            'profil'   => $profil,
            'foto_about'   => $foto_about,
        );
		$this->template->load('template_admin','admin/about',$data);
	}

    public function updateFoto(){
        $namafoto = date('YmdHis').'.jpg';
        $config['upload_path'] = 'asset/upload/about/';
        $config['max_size'] = 3000 * 1024;
        $config['file_name'] = $namafoto;
        $config['allowed_types'] = '*';
        $this->load->library('upload', $config);
    
        if ($_FILES['foto_about']['size'] >= 3000 * 1024) {
            // Handle the size validation error here
            // ...
        } elseif (!$this->upload->do_upload('foto_about')) {
            $error = array('error' => $this->upload->display_errors());
            // Handle the upload error here
            // ...
        } else {
            // Get the current foto_about value
            $this->db->from('about2');
            $this->db->where('id_foto', 1);
            $old_foto = $this->db->get()->row()->foto_about;
    
            // Delete the old file if it exists
            $old_file_path = 'asset/upload/about/' . $old_foto;
            if (file_exists($old_file_path) && is_file($old_file_path)) {
                unlink($old_file_path); // Menghapus file lama
            }
    
            // Update the database with the new data
            $where = array('id_foto' => 1);
            $data = array(
                'foto_about' => $namafoto
            );
            $this->db->update('about2', $data, $where);
    
            // Set success flash message
            $this->session->set_flashdata('alert', '
                <div class="alert alert-primary alert-dismissible" role="alert">
                    Pembaruan Foto About Berhasil
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            ');
            redirect('admin/about');
        }
    }


    public function simpan(){
        $namafoto = date('YmdHis').'.jpg';
        $config['upload_path']      = 'asset/upload/profil/';
        $config['max_size']         = 3000 * 1024; //3 * 1024 * 1024; //3mb; 0=unlimited
        $config['file_name']        = $namafoto;
        $config['allowed_types']    = '*';
        $this->load->library('upload', $config);
        if($_FILES['foto_profil']['size'] >= 3000 * 1024){
            $this->session->set_flashdata('alert', '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fa fa-check me-2"></i>Maaf, Upload foto dengan ukuran yang kurang dari 500kb!!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>'); 
            redirect('admin/about');
        }elseif(!$this->upload->do_upload('foto_profil')){
            $error = array('error' => $this->upload->display_errors());
        }else{
            $data = array('upload_data' => $this->upload->data());
        }
        $this->db->from('profil_team');
        $this->db->where('id_profil',$this->input->post('id_profil'));
        $cek = $this->db->get()->result_array();
        if($cek<>NULL){
            $this->session->set_flashdata('alert','
                <div class="alert alert-danger alert-dismissible" role="alert">
                        Judul sudah ada
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                ');
                redirect('admin/about');
        }
        $data = array(
            'nama' => $this->input->post('nama'),
            'jabatan' => $this->input->post('jabatan'),
            'facebook' => $this->input->post('facebook'),
            'instagram' => $this->input->post('instagram'),
            'tiktok' => $this->input->post('tiktok'),
            'foto_profil' => $namafoto,
        );
        $this->db->insert('profil_team',$data);
        $this->session->set_flashdata('alert','
        <div class="alert alert-primary alert-dismissible" role="alert">
                Berhasil menambahkan Profil Leader
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        ');
        redirect('admin/about');
    }


    public function delete_leader($id){
        $filename=FCPATH.'/asset/upload/profil/'.$id;
            if(file_exists($filename)){
                unlink("./asset/upload/profil/".$id);
            }
        $where = array(
            'foto_profil' => $id
        );
        $this->db->delete('profil_team',$where);
        $this->session->set_flashdata('alert','
            <div class="alert alert-primary alert-dismissible" role="alert">
                    Hapus Berhasil
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        '); 
            redirect('admin/about');
    }


    public function edit_leader(){
        $namafoto = $this->input->post('nama_foto');//diambil dari input type HIDDEN 'name="nama_foto"', dari views "konten_index"-->
        $config['upload_path']      = 'asset/upload/profil/';
        $config['max_size']         = 3000 * 1024; //3 * 1024 * 1024; //3mb; 0=unlimited-->
        $config['file_name']        = $namafoto;
        $config['overwrite']        = true;
        $config['allowed_types']    = '*';
        $this->load->library('upload', $config);
        if($_FILES['foto_profil']['size'] >= 3000 * 1024){//'foto' diambil dari input type text 'name="foto"', dari views "konten_index"-->
            $this->session->set_flashdata('alert', '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fa fa-check me-2"></i>Maaf, Upload foto dengan ukuran yang kurang dari 500kb!!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>'); 
            redirect('admin/about');
        }elseif(!$this->upload->do_upload('foto_profil')){
            $error = array('error' => $this->upload->display_errors());
        }else{
            $data = array('upload_data' => $this->upload->data());
        }
        $data = array(
            'nama' => $this->input->post('nama'),
            'jabatan' => $this->input->post('jabatan'),
            'instagram' => $this->input->post('instagram'),
            'facebook' => $this->input->post('facebook'),
            'tiktok' => $this->input->post('tiktok'),
            'foto_profil' => $namafoto
        );
        $where = array(
            'foto_profil' => $this->input->post('nama_foto')
        );

        $this->db->update('profil_team',$data,$where);
        $this->session->set_flashdata('alert','
        <div class="alert alert-primary alert-dismissible" role="alert">
            Data Leader Berhasil di Update
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        ');
        redirect('admin/about');
    }







    public function perbarui(){
        $where = array('id_about'   => 1);
        $data = array(
            'visi' => $this->input->post('visi'),
            'misi' => $this->input->post('misi'),
            'youtube' => $this->input->post('youtube'),
            'member' => $this->input->post('member'),
            'armada' => $this->input->post('armada'),
            'perjalanan' => $this->input->post('perjalanan'),
        );
        $this->db->update('about',$data,$where);
        
        $this->session->set_flashdata('alert','
            <div class="alert alert-primary alert-dismissible" role="alert">
                    Pembaruan Konten Halaman About Berhasil
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        ');
            redirect('admin/about');
    }

}
