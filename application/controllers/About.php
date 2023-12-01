<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller {
	public function index(){
        $this->db->from('konfigurasi');
        $konfig = $this->db->get()->row();

        $this->db->from('about');
        $konfigabout = $this->db->get()->row();

        $this->db->from('profil_team');
        $profil = $this->db->get()->result_array();

        $this->db->from('about2');
        $konfigfoto = $this->db->get()->result_array();

        $this->db->from('logo');
        $fotologo = $this->db->get()->result_array();

        $this->db->from('kategori');
        $kategori = $this->db->get()->result_array();
        $this->db->from('konten a');
        $this->db->join('kategori b','a.id_kategori=b.id_kategori','left');
        $this->db->join('user c','a.username=c.username','left');
        $this->db->order_by('judul','ASC');
        $data = array(
            'judul_halaman' => 'Tentang | Sandpaper Holiday Trans',
            'konfig' => $konfig,
            'kategori' => $kategori,
            'konfigabout' => $konfigabout,
            'konfigfoto' => $konfigfoto,
            'profil' => $profil,
            'fotologo' => $fotologo,
        );
		$this->load->view('about',$data);
	}
}
