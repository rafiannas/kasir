<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Setting extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        // cek_login();
        $this->load->model('KasirModal');
        $this->load->model('AdminModal');
        $this->load->model('ServerModal');
    }

    public function pengaturan($id)
    {
        $flag = ['id_detail' => $id];
        $this->session->set_userdata($flag);
        redirect('setting/index');
    }

    public function index()
    {
        $data['title'] = 'Setting';
        $id = $this->session->userdata('id_detail');
        $data['saya_karyawan'] = $this->db->get_where('karyawan', ['id' => $this->session->userdata('id_karyawan')])->row_array();
        $data['detail'] = $this->AdminModal->getDetail($id);
        $data['akses'] = $this->db->get('karyawan_role')->result_array();
        $data['active'] = $this->db->get('active')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('setting/pengaturan', $data);
        $this->load->view('templates/quick_sidebar', $data);
        $this->load->view('templates/footer', $data);
    }

    public function update()
    {
        $pass = $this->input->post('pass');
        $idus = $this->input->post('id');
        if ($pass) {
            $edit = [
                'nama' => $this->input->post('nama'),
                'username' => $this->input->post('username'),
                'no_hp' => $this->input->post('no_hp'),
                'password' => password_hash($pass, PASSWORD_DEFAULT)
            ];
            $this->db->where('id', $idus);
            $this->db->update('karyawan', $edit);
            $this->session->set_flashdata('message', '<div class="tutup alert alert-success" role="alert">Pengaturan berhasil!</div>');
            redirect('setting');
        } else {
            //klo ga masukin pass (ga ganti pass)
            $edit = [
                'nama' => $this->input->post('nama'),
                'username' => $this->input->post('username'),
                'no_hp' => $this->input->post('no_hp'),
            ];
            $this->db->where('id', $idus);
            $this->db->update('karyawan', $edit);
            $this->session->set_flashdata('message', '<div class="tutup alert alert-success" role="alert">Pengaturan berhasil!</div>');
            redirect('setting');
        }
    }

    public function batal($id)
    {
        $user = $this->db->get_where('karyawan', ['id' => $id])->row_array();
        //jika usernya ada
        if ($user)
        //jika usernya aktif
        {
            if ($user['is_active'] == 1) {
                if ($user['role_id'] == 1) {
                    redirect('admin');
                } else if ($user['role_id'] == 2) {
                    redirect('manager');
                } else if ($user['role_id'] == 3) {
                    redirect('kasir');
                }
            } else {
                redirect('auth/blocked');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Akun Tidak Terdaftar !</div>');
            redirect('auth/blocked');
        }
    }
}
