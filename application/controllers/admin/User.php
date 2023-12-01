<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        if ($this->session->userdata('level') <> 'Admin') {
            redirect('auth');
        }
    }
    public function index()
    {
        $this->db->from('user');
        $this->db->order_by('nama', 'ASC');
        $user = $this->db->get()->result_array();
        $data = array(
            'judul_halaman' => 'Data Pengguna Admin | Sandpaper Holiday Trans',
            'user' => $user
        );
        $this->template->load('template_admin', 'admin/user_index', $data);
    }

    public function simpan()
    {
        $this->db->from('user');
        $this->db->where('username', $this->input->post('username'));
        $cek = $this->db->get()->result_array();
        if ($cek <> NULL) {
            $this->session->set_flashdata('alert', '
                <div class="alert alert-danger alert-dismissible" role="alert">
                        Username sudah digunakan
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                ');
            redirect('admin/user');
        }
        $this->User_model->simpan(); //akan lari ke models/User_model/simpan

        $this->session->set_flashdata('alert', '
        <div class="alert alert-primary alert-dismissible" role="alert">
                Input Data User Berhasil
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        ');
        redirect('admin/user');
    }

    public function delete_data($id)
    {
        $where = array(
            'id_user' => $id
        );
        $this->db->delete('user', $where);
        $this->session->set_flashdata('alert', '
            <div class="alert alert-primary alert-dismissible" role="alert">
                    Hapus Data User Berhasil
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        ');
        redirect('admin/user');

    }

    public function update()
    {
        $this->User_model->edit(); //akan lari ke models/User_model/edit
        
        $this->session->set_flashdata('alert', '
            <div class="alert alert-primary alert-dismissible" role="alert">
                    Pembaruan Berhasil
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        ');
        redirect('admin/user');
    }
}