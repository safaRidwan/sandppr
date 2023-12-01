<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detail extends CI_Controller {
    public function __construct(){
        parent::__construct();
        if($this->session->userdata('level')==NULL){
            redirect('auth');
        }
    }

    public function detail_armada($id) {
        $this->db->from('konten');
        $this->db->where('id_konten',$id);
        $konten = $this->db->get()->row();

        $this->db->from('detail a');
        $this->db->join('konten b','a.id_konten=b.id_konten','left');
        $this->db->where('a.id_konten',$id);
        $detail = $this->db->get()->result_array();
        // Di sini Anda dapat mengambil data berdasarkan $judul dan mengirimkannya ke view
        $data = array(
            'judul_halaman' => 'Detail Admin | Sandpaper Holiday Trans',
            'judul' => $id,
            'konten' => $konten,
            'detail' => $detail,
        );
        // Load view yang sesuai untuk menampilkan halaman booking
        $this->template->load('template_admin','admin/detail',$data);
    }


    public function simpan(){
        $namafoto = date('YmdHis').'.jpg';
        $config['upload_path']      = 'asset/upload/detail/';
        $config['max_size']         = 3000 * 1024; //3 * 1024 * 1024; //3mb; 0=unlimited
        $config['file_name']        = $namafoto;
        $config['allowed_types']    = '*';
        $this->load->library('upload', $config);
        if($_FILES['foto_detail']['size'] >= 3000 * 1024){
            $this->session->set_flashdata('alert', '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fa fa-check me-2"></i>Maaf, Upload foto_detail dengan ukuran yang kurang dari 500kb!!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>'); 
            redirect('admin/detail');
        }elseif(!$this->upload->do_upload('foto_detail')){
            $error = array('error' => $this->upload->display_errors());
        }else{
            $data = array('upload_data' => $this->upload->data());
        }
        $data = array(
            
            'id_konten' => $this->input->post('id_konten'),
            'foto_detail' => $namafoto,
            'judul_detail' => $this->input->post('judul_detail')
        );
        $this->db->insert('detail',$data);
        $this->session->set_flashdata('alert','
        <div class="alert alert-primary alert-dismissible" role="alert">
                Berhasil menambahkan Caraousel
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        ');
        redirect('admin/detail/detail_armada/'.$this->input->post('id_konten'));
    }


    public function delete_data($id,$id_konten){
        $filename=FCPATH.'/asset/upload/detail/'.$id;
            if(file_exists($filename)){
                unlink("./asset/upload/detail/".$id);
            }
        $where = array(
            'foto_detail' => $id
        );
        $this->db->delete('detail',$where);
        $this->session->set_flashdata('alert','
            <div class="alert alert-primary alert-dismissible" role="alert">
                    Hapus Berhasil
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        '); 
        redirect('admin/detail/detail_armada/'.$id_konten);
    }

}
