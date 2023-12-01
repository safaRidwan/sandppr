<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Booking extends CI_Controller {
    public function __construct(){
        parent::__construct();
        if($this->session->userdata('level')==NULL){
            redirect('auth');
        }
    }

    public function jadwal($id) {
        $this->db->from('konten');
        $this->db->where('id_konten',$id);
        $konten = $this->db->get()->row();

        $this->db->from('booking a');
        $this->db->join('konten b','a.id_konten=b.id_konten','left');
        $this->db->where('a.id_konten',$id);
        $booking = $this->db->get()->result_array();
        // Di sini Anda dapat mengambil data berdasarkan $judul dan mengirimkannya ke view
        $data = array(
            'judul_halaman' => 'Booking Admin | Sandpaper Holiday Trans',
            'judul' => $id,
            'konten' => $konten,
            'booking' => $booking
        );
        // Load view yang sesuai untuk menampilkan halaman booking
        $this->template->load('template_admin','admin/booking',$data);
    }

    public function simpan(){
        $data = array(
            'tgl_mulai' => $this->input->post('tgl_mulai'),
            'tgl_berakhir' => $this->input->post('tgl_berakhir'),
            'nama_client' => $this->input->post('nama_client'),
            'keterangan_booking' => $this->input->post('keterangan_booking'),
            'id_konten' => $this->input->post('id_konten')

        );
        $this->db->insert('booking',$data);
        $this->session->set_flashdata('alert','
        <div class="alert alert-primary alert-dismissible" role="alert">
                Berhasil Menambahkan booking
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        ');
        redirect('admin/booking/jadwal/'.$this->input->post('id_konten'));
    }


    public function delete_data($id,$id_konten)
    {
        $where = array('id_booking' => $id);
        $this->db->delete('booking', $where);
        $this->session->set_flashdata('alert', '
            <div class="alert alert-primary alert-dismissible" role="alert">
                    Hapus Data User Berhasil
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        ');
        redirect('admin/booking/jadwal/'.$id_konten);

    }
}
