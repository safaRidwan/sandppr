<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detail extends CI_Controller {
	public function detail_armada($id){
        $this->db->from('konten');
        $this->db->where('id_konten',$id);
        $konten = $this->db->get()->row();

        $this->db->from('konfigurasi');
        $konfig = $this->db->get()->row();

        $this->db->from('kategori');
        $kategori = $this->db->get()->result_array();

        $this->db->from('detail');
        $this->db->where('id_konten',$id);
        $caraousel_detail = $this->db->get()->result_array();

        $this->db->from('booking a');
        $this->db->join('konten b','a.id_konten=b.id_konten','left');
        $this->db->where('a.id_konten',$id);
        $booking = $this->db->get()->result_array();

        $this->db->from('konten');
        $this->db->where('id_konten',$id);
        $detail = $this->db->get()->row();

        $this->db->from('logo');
        $fotologo = $this->db->get()->result_array();

        $this->db->from('konten a');
        $this->db->join('kategori b','a.id_kategori=b.id_kategori','left');
        $this->db->order_by('judul','ASC');
        $kntn = $this->db->get()->row();

        $data = array(
            'judul_halaman' => 'Detail | Sandpaper Holiday Trans',
            'judul' => $id,
            'kategori' => $kategori,
            'konten' => $konten,
            'detail' => $detail,
            'konfig' => $konfig,
            'caraousel_detail' => $caraousel_detail,
            'booking' => $booking,
            'kntn' => $kntn,
            'fotologo' => $fotologo,
        );

		$this->load->view('detail',$data);
	}

}
