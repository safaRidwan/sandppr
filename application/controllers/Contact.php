<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {
	public function index(){
        $this->db->from('konfigurasi');
        $konfig = $this->db->get()->row();

        $this->db->from('logo');
        $fotologo = $this->db->get()->result_array();

        $this->db->from('kategori');
        $kategori = $this->db->get()->result_array();
        $this->db->join('kategori b','a.id_kategori=b.id_kategori','left');

       

        $data = array(
            'judul_halaman' => 'Kontak | Sandpaper Holiday Trans',
            'kategori' => $kategori,
            'konfig' => $konfig,
            'fotologo' => $fotologo,
        );
		$this->load->view('contact',$data);
	}
}