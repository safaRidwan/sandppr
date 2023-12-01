<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Caraousel extends CI_Controller {
    public function __construct(){
        parent::__construct();
        if($this->session->userdata('level')==NULL){
            redirect('auth');
        }
    }
	public function index(){
        $this->db->from('caraousel');
        $caraousel = $this->db->get()->result_array();
        $data = array(
            'judul_halaman' => 'Caraousel Admin | Sandpaper Holiday Trans',
            'caraousel' => $caraousel
        );
		$this->template->load('template_admin','admin/caraousel',$data);
	}

    public function simpan(){
        $namafoto = date('YmdHis').'.jpg';
        $config['upload_path']      = 'asset/upload/caraousel/';
        $config['max_size']         = 3000 * 1024; //3 * 1024 * 1024; //3mb; 0=unlimited
        $config['file_name']        = $namafoto;
        $config['allowed_types']    = '*';
        $this->load->library('upload', $config);
        if($_FILES['foto']['size'] >= 3000 * 1024){
            $this->session->set_flashdata('alert', '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fa fa-check me-2"></i>Maaf, Upload foto dengan ukuran yang kurang dari 500kb!!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>'); 
            redirect('admin/caraousel');
        }elseif(!$this->upload->do_upload('foto')){
            $error = array('error' => $this->upload->display_errors());
        }else{
            $data = array('upload_data' => $this->upload->data());
        }
        $data = array(
            'judul' => $this->input->post('judul'),
            'foto' => $namafoto
        );
        $this->db->insert('caraousel',$data);
        $this->session->set_flashdata('alert','
        <div class="alert alert-primary alert-dismissible" role="alert">
                Berhasil menambahkan Caraousel
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        ');
        redirect('admin/caraousel');
    }


    public function delete_data($id){
        $filename=FCPATH.'/asset/upload/caraousel/'.$id;
            if(file_exists($filename)){
                unlink("./asset/upload/caraousel/".$id);
            }
        $where = array(
            'foto' => $id
        );
        $this->db->delete('caraousel',$where);
        $this->session->set_flashdata('alert','
            <div class="alert alert-primary alert-dismissible" role="alert">
                    Hapus Berhasil
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        '); 
            redirect('admin/caraousel');
    }


    public function update(){
        $namafoto = $this->input->post('nama_foto');//diambil dari input type HIDDEN 'name="nama_foto"', dari views "konten_index"-->
        $config['upload_path']      = 'asset/upload/caraousel/';
        $config['max_size']         = 3000 * 1024; //3 * 1024 * 1024; //3mb; 0=unlimited-->
        $config['file_name']        = $namafoto;
        $config['overwrite']        = true;
        $config['allowed_types']    = '*';
        $this->load->library('upload', $config);
        if($_FILES['foto']['size'] >= 3000 * 1024){//'foto' diambil dari input type text 'name="foto"', dari views "konten_index"-->
            $this->session->set_flashdata('alert', '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fa fa-check me-2"></i>Maaf, Upload foto dengan ukuran yang kurang dari 500kb!!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>'); 
            redirect('admin/caraousel');
        }elseif(!$this->upload->do_upload('foto')){
            $error = array('error' => $this->upload->display_errors());
        }else{
            $data = array('upload_data' => $this->upload->data());
        }
        $data = array(
            'judul' => $this->input->post('judul'),
            'foto' => $namafoto
        );
        $where = array(
            'foto' => $this->input->post('nama_foto')
        );

        $this->db->update('caraousel',$data,$where);
        $this->session->set_flashdata('alert','
        <div class="alert alert-primary alert-dismissible" role="alert">
                Berhasil Edit Caraousel
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        ');
        redirect('admin/caraousel');
    }


}
