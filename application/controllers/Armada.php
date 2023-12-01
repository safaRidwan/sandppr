<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Armada extends CI_Controller {
	public function index(){
        $this->db->from('konfigurasi');
        $konfig = $this->db->get()->row();

        $this->db->from('kategori');
        $kategori = $this->db->get()->result_array();

        $this->db->from('logo');
        $fotologo = $this->db->get()->result_array();
        
        $this->db->from('konten a');
        $this->db->join('kategori b','a.id_kategori=b.id_kategori','left');
        $this->db->order_by('judul','ASC');
        $konten = $this->db->get()->result_array();
        
        $data = array(
            'judul_halaman' => 'Armada | Sandpaper Holiday Trans',
            'konfig' => $konfig,
            'kategori' => $kategori,
            'konten' => $konten,
            'fotologo' => $fotologo,
        );
		$this->load->view('armada',$data);
	}
}
