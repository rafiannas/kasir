<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gudang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('GudangModal');
        $this->load->model('ServerModal');
        $this->load->model('AdminModal');
        cek_login();
    }
    public function index()
    {
        $data['saya_karyawan'] = $this->db->get_where('karyawan', ['id' => $this->session->userdata('id_karyawan')])->row_array();
        $data['bahan'] = $this->GudangModal->getBahan();

        $this->load->view('templates/header');
        $this->load->view('templates/slidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('gudang/index');
        $this->load->view('templates/footer');
    }

    public function tambah_bahan()
    {
        $data['saya_karyawan'] = $this->db->get_where('karyawan', ['id' => $this->session->userdata('id_karyawan')])->row_array();
        $id =  $data['saya_karyawan']['id'];

        $cek = $this->GudangModal->getCek($id);
        if ($cek) {
            $id_bhn = $cek['id'];
            $data['listBahan'] = $this->GudangModal->getListBahan($id_bhn);
        } else {
            $buat = [
                'pj' => $id,
                'status' => 1
            ];
            $this->db->insert('bahan', $buat);

            $cek = $this->GudangModal->getCek($id);
            $id_bhn = $cek['id'];
            $data['listBahan'] = $this->GudangModal->getListBahan($id_bhn);
        }

        $this->form_validation->set_rules('nama', 'Nama', 'trim');
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'trim');
        $this->form_validation->set_rules('harga', 'Harga', 'trim');


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header');
            $this->load->view('templates/slidebar');
            $this->load->view('templates/topbar', $data);
            $this->load->view('gudang/tambah_bahan');
            $this->load->view('templates/footer');
        } else {
            $add = [
                'id_bahan' => $id_bhn,
                'nama_bahan' => $this->input->post('nama'),
                'jumlah' => $this->input->post('jumlah'),
                'harga' => $this->input->post('harga')
            ];
            $this->db->insert('detail_bahan', $add);
            redirect('gudang/tambah_bahan');
        }
    }

    public function konfirmasi()
    {
        $data['saya_karyawan'] = $this->db->get_where('karyawan', ['id' => $this->session->userdata('id_karyawan')])->row_array();
        $id =  $data['saya_karyawan']['id'];
        $cek = $this->GudangModal->getCek($id);
        $id_bhn = $cek['id'];
        $data['listBahan'] = $this->GudangModal->getListBahan($id_bhn);
        $i = 0;
        $total = 0;
        foreach ($data['listBahan'] as $cek) {
            $i += 1;
            $total += $cek['harga'];
        }
        $this->form_validation->set_rules('judul', 'Judul', 'trim');
        $this->form_validation->set_rules('catatan', 'Catatan', 'trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header');
            $this->load->view('templates/slidebar');
            $this->load->view('templates/topbar', $data);
            $this->load->view('gudang/konfirmasi');
            $this->load->view('templates/footer');
        } else {
            date_default_timezone_set('Asia/Jakarta');
            $tgl2 = date("Y-m-d H:i:s");
            $oke = [
                'judul' => $this->input->post('judul'),
                'tgl' => $tgl2,
                'jumlah_bahan' => $i,
                'total_harga' => $total,
                'catatan' => $this->input->post('catatan'),
                'status' => 2
            ];
            $this->db->where('id', $id_bhn);
            $this->db->update('bahan', $oke);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Menambahkan Bahan !</div>');
            redirect('gudang/index');
        }
    }
    public function s_detail($id)
    {
        $data = [
            'id_detail' => $id
        ];
        $this->session->set_userdata($data);
        redirect('gudang/detail');
    }

    public function detail()
    {
        $data['saya_karyawan'] = $this->db->get_where('karyawan', ['id' => $this->session->userdata('id_karyawan')])->row_array();
        $id_detail = $this->session->userdata('id_detail');
        $data['bahan'] = $this->GudangModal->getDetail($id_detail);
        $data['listBahan'] = $this->GudangModal->getListBahan($id_detail);

        $this->load->view('templates/header');
        $this->load->view('templates/slidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('gudang/detail');
        $this->load->view('templates/footer');
    }

    public function daftar_stok()
    {
        $data = [
            'id_def' => 4
        ];
        $this->session->set_userdata($data);
        redirect('gudang/daftar_stok2');
    }
    public function temp($id)
    {
        $data = [
            'id_def' => $id
        ];
        $this->session->set_userdata($data);
        redirect('gudang/daftar_stok2');
    }

    public function daftar_stok2()
    {
        $data['saya_karyawan'] = $this->db->get_where('karyawan', ['id' => $this->session->userdata('id_karyawan')])->row_array();
        $def = $this->session->userdata('id_def');
        $data['byMenu'] =  $this->ServerModal->getMenuBy($def);
        $data['kategori'] = $this->AdminModal->getMenu();

        $this->load->view('templates/header');
        $this->load->view('templates/slidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('gudang/daftar_stok');
        $this->load->view('templates/footer');
    }
    public function s_ubah_stok($id)
    {
        $data = [
            'id_ubah' => $id
        ];
        $this->session->set_userdata($data);
        redirect('gudang/ubah_stok');
    }

    public function ubah_stok()
    {
        $id = $this->session->userdata('id_ubah');

        $data['saya_karyawan'] = $this->db->get_where('karyawan', ['id' => $this->session->userdata('id_karyawan')])->row_array();
        $data['i'] = $this->GudangModal->getDetailMenu($id);

        $this->form_validation->set_rules('stok', 'Stok', 'trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header');
            $this->load->view('templates/slidebar');
            $this->load->view('templates/topbar', $data);
            $this->load->view('gudang/ubah_stok');
            $this->load->view('templates/footer');
        } else {
            $upd = [
                'stok' => $this->input->post('stok')
            ];
            $this->db->where('id', $id);
            $this->db->update('menu', $upd);

            date_default_timezone_set('Asia/Jakarta');
            $tgl2 = date("Y-m-d H:i:s");

            $inp = [
                'tgl' => $tgl2,
                'id_menu' => $data['i']['id'],
                'id_kategori' => $data['i']['id_kategori'],
                'sebelum' => $data['i']['stok'],
                'sesudah' => $this->input->post('stok'),
                'pj' => $this->session->userdata('id_karyawan')
            ];
            $this->db->insert('history_stok', $inp);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Ubah Stok Berhasil !</div>');
            redirect('gudang/daftar_stok2');
        }
    }
    public function riwayat_stok()
    {
        $data['saya_karyawan'] = $this->db->get_where('karyawan', ['id' => $this->session->userdata('id_karyawan')])->row_array();

        $data['historyStok'] = $this->GudangModal->getHistoryStok();

        $this->load->view('templates/header');
        $this->load->view('templates/slidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('gudang/riwayat_stok');
        $this->load->view('templates/footer');
    }
}
