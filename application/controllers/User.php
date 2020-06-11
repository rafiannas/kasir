<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //cek_login();
        $this->load->library('form_validation');
        $this->load->model('AdminModal');
        $this->load->model('ServerModal');

        // $this->load->model('chart_model');
    }

    public function index()
    {

        $this->form_validation->set_rules('email', 'Email', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');


        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login Page';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('user/index');
            $this->load->view('templates/auth_footer');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');


        $user = $this->db->get_where('karyawan', ['username' => $email])->row_array();
        //jika usernya ada
        if ($user)
        //jika usernya aktif
        {
            if ($user['is_active'] == 1) {
                //cek password
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'id_user' => $user['id'],
                        'email' => $user['email'],
                        'nama' =>  $user['nama'],
                        'role_id' => $user['role_id']
                    ];
                    $this->session->set_userdata($data); //simpen data di session
                    redirect('user/blanja');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Salah !</div>');
                    redirect('user');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Akun sedang Tidak Aktif !</div>');
                redirect('user');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Akun Tidak Terdaftar !</div>');
            redirect('user');
        }
    }

    public function daftar()
    {
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('Phone_Number', 'Phone Number', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'Email sudah terdaftar!'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[4]|matches[password2]', [
            'matches' => 'password tidak sama! ',
            'min_length' => 'password terlalu pendek!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');


        if ($this->form_validation->run() == false) {
            $title['title'] = 'User Registration';
            $this->load->view('templates/auth_header', $title);
            $this->load->view('user/daftar');
            $this->load->view('templates/auth_footer');
        } else {
            $data = [
                'nama' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'no_hp' => htmlspecialchars($this->input->post('Phone_Number', true)),
                'is_active' => 1,
                'role_id' => 9,
                'date_create' => time()
            ];

            $this->db->insert('user', $data);

            //$this->_sendEmail();

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Daftar !</div>');
            redirect('user');
        }
    }

    public function blanja()
    {
        $data = [
            'id_def' => 4
        ];
        $this->session->set_userdata($data);
        redirect('user/belanja');
    }

    public function temp($id)
    {
        $data = [
            'id_def' => $id
        ];
        $this->session->set_userdata($data);
        redirect('user/belanja');
    }

    public function belanja()
    {
        $data['saya_karyawan'] = $this->db->get_where('user', ['id' => $this->session->userdata('id_user')])->row_array();

        $cek_awal = $this->ServerModal->cekAwal($this->session->userdata('id_user'));
        //klo ga ada
        if (!$cek_awal) {
            $isi = [
                'id_status' => 1,
                'server' => $this->session->userdata('id_user')
            ];
            $this->db->insert('pesanan', $isi);
            //klo ada
        }

        $ada = $this->ServerModal->cekAwal($this->session->userdata('id_user'));

        $id = $ada['id'];

        $data['listPesanan'] = $this->ServerModal->listPesanan($id);

        $data['kategori'] = $this->AdminModal->getMenu();
        $def = $this->session->userdata('id_def');

        $data['judulMenu'] = $this->db->get('kategori', ['id' => $def])->row_array();
        $data['byMenu'] =  $this->ServerModal->getMenuBy($def);

        $this->load->view('templates/header');
        $this->load->view('templates/slidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/belanja', $data);
        $this->load->view('templates/footer');
    }
}
