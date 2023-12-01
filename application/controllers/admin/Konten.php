<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konten extends CI_Controller {
    public function __construct(){
        parent::__construct();
        if($this->session->userdata('level')==NULL){
            redirect('auth');
        }
    }
	public function index(){
        $this->db->from('kategori');
        $this->db->order_by('nama_kategori','ASC');
        $kategori = $this->db->get()->result_array();

        $this->db->from('konten a');
        $this->db->join('kategori b','a.id_kategori=b.id_kategori','left');
        $this->db->join('user c','a.username=c.username','left');
        $this->db->order_by('tanggal','ASC');
        $konten = $this->db->get()->result_array();
        $data = array(
            'judul_halaman' => 'Armada Admin | Sandpaper Holiday Trans',
            'kategori' => $kategori,
            'konten' => $konten
        );
		$this->template->load('template_admin','admin/konten_index',$data);
	}



    public function simpan(){
        $namafoto = date('YmdHis').'.jpg';
        $config['upload_path']      = 'asset/upload/konten/';
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
            redirect('admin/konten');
        }elseif(!$this->upload->do_upload('foto')){
            $error = array('error' => $this->upload->display_errors());
        }else{
            $data = array('upload_data' => $this->upload->data());
        }
        $this->db->from('konten');
        $this->db->where('judul',$this->input->post('judul'));
        $cek = $this->db->get()->result_array();
        if($cek<>NULL){
            $this->session->set_flashdata('alert','
                <div class="alert alert-danger alert-dismissible" role="alert">
                        Judul sudah ada
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                ');
                redirect('admin/konten');
        }
        $data = array(
            'judul' => $this->input->post('judul'),
            'merk' => $this->input->post('merk'),
            'kursi' => $this->input->post('kursi'),
            'id_kategori' => $this->input->post('id_kategori'),
            'keterangan' => $this->input->post('keterangan'),
            'tanggal' => date('Y-m-d'),
            'username' => $this->session->userdata('username'),
            'slug' => str_replace(' ','-',$this->input->post('keterangan')),
            'foto' => $namafoto
        );
        $this->db->insert('konten',$data);
        
        $this->session->set_flashdata('alert','
        <div class="alert alert-primary alert-dismissible" role="alert">
                Berhasil menambahkan Konten
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        ');
        redirect('admin/konten');
    }



    public function delete_data($id,$id_konten){
        $filename=FCPATH.'/asset/upload/konten/'.$id;
            if(file_exists($filename)){
                unlink("./asset/upload/konten/".$id);
            }
        $where = array(
            'id_konten' => $id_konten
        );
        
        $this->db->from('detail')->where('id_konten',$id_konten);
        $data = $this->db->get()->result_array();
        foreach($data as $aa){
            $filename=FCPATH.'/asset/upload/detail/'.$aa['foto_detail'];
            if(file_exists($filename)){
                unlink("./asset/upload/detail/".$aa['foto_detail']);
            }
        }
        $this->db->delete('konten',$where);
        $this->db->delete('detail',$where);
        $this->db->delete('booking',$where);
        $this->session->set_flashdata('alert','
            <div class="alert alert-primary alert-dismissible" role="alert">
                    Hapus Konten Berhasil
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        '); 
            redirect('admin/konten');
    }

    public function update(){
        $namafoto = $this->input->post('nama_foto');//diambil dari input type HIDDEN 'name="nama_foto"', dari views "konten_index"-->
        $config['upload_path']      = 'asset/upload/konten/';
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
            redirect('admin/konten');
        }elseif(!$this->upload->do_upload('foto')){
            $error = array('error' => $this->upload->display_errors());
        }else{
            $data = array('upload_data' => $this->upload->data());
        }
        $data = array(
            'judul' => $this->input->post('judul'),
            'merk' => $this->input->post('merk'),
            'kursi' => $this->input->post('kursi'),
            'id_kategori' => $this->input->post('id_kategori'),
            'keterangan' => $this->input->post('keterangan'),
            'slug' => str_replace(' ','-',$this->input->post('keterangan')),
            'foto' => $namafoto
        );
        $where = array(
            'foto' => $this->input->post('nama_foto')
        );

        $this->db->update('konten',$data,$where);
        $this->session->set_flashdata('alert','
        <div class="alert alert-primary alert-dismissible" role="alert">
                Berhasil Edit Konten
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        ');
        redirect('admin/konten');
    }


}
