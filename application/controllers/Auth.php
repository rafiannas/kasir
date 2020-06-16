<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        //cek_login();
    }

    public function index()
    {
        // if ($this->session->userdata('email')) {
        //     redirect('user');
        // }
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login Page';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        } else {
            $this->_login();
        }
    }
    private function _login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->db->get_where('karyawan', ['username' => $username])->row_array();
        //jika usernya ada
        if ($user)
        //jika usernya aktif
        {
            if ($user['is_active'] == 1) {
                //cek password
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'id_karyawan' => $user['id'],
                        'role_id' => $user['role_id']
                    ];
                    $this->session->set_userdata($data); //simpen data di session
                    if ($user['role_id'] == 1) {
                        redirect('admin');
                    } else if ($user['role_id'] == 2) {
                        redirect('manager');
                    } else if ($user['role_id'] == 3) {
                        redirect('kasir');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Salah !</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Akun sedang Tidak Aktif !</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Akun Tidak Terdaftar !</div>');
            redirect('auth');
        }
    }

    public function temp()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('auth/temp');
        } else {

            $username = $this->input->post('username');


            $data = [
                'username' => $username,
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT)
            ];
            $this->db->insert('karyawan', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your account has been created</div>');
            redirect('auth');
        }
    }
    public function logout()
    {
        $this->session->unset_userdata('id_karyawan');
        $this->session->unset_userdata('role_id');
        $this->session->unset_userdata('id_def');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Keluar</div>');
        redirect('auth');
    }
    public function blocked()
    {
        $this->load->view('auth/blocked');
    }
}
