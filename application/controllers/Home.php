<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function index(){
        $this->db->from('konfigurasi');
        $konfig = $this->db->get()->row();

        $this->db->from('about');
        $konfigabout = $this->db->get()->row();

        $this->db->from('home');
        $fotohome = $this->db->get()->result_array();

        $this->db->from('logo');
        $fotologo = $this->db->get()->result_array();

        $this->db->from('caraousel');
        $caraousel = $this->db->get()->result_array();

        $this->db->from('kategori');
        $kategori = $this->db->get()->result_array();
        
        $this->db->from('konten a');
        $this->db->join('kategori b','a.id_kategori=b.id_kategori','left');
        $this->db->join('user c','a.username=c.username','left');
        $this->db->order_by('judul','ASC');
        $konten = $this->db->get()->result_array();
        $data = array(
            'judul_halaman' => 'Beranda | Sandpaper Holiday Trans',
            'konfig' => $konfig,
            'caraousel' => $caraousel,
            'kategori' => $kategori,
            'konten' => $konten,
            'konfigabout' => $konfigabout,
            'fotohome' => $fotohome,
            'fotologo' => $fotologo,
        );
		$this->load->view('home',$data);
	}
}
