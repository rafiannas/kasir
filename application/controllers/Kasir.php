<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kasir extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->library('form_validation');
    cek_login();
    $this->load->model('KasirModal');
  }

  public function index()
  {

    $data['saya_karyawan'] = $this->db->get_where('karyawan', ['id' => $this->session->userdata('id_karyawan')])->row_array();
    $data['listPesanan'] = $this->KasirModal->getkasirNow()->result_array();

    $this->load->view('templates/header_ref');
    $this->load->view('templates/slidebar');
    $this->load->view('templates/topbar', $data, $data);
    $this->load->view('kasir/home_ks', $data);
    $this->load->view('templates/footer');
  }
  public function detail_ks($id)
  {

    $data['saya_karyawan'] = $this->db->get_where('karyawan', ['id' => $this->session->userdata('id_karyawan')])->row_array();
    $data['rinci'] = $this->KasirModal->getDetail($id)->result_array();
    $data['dipilih'] = $this->KasirModal->getGantiKs($id)->row_array();
    $data['pilihan2'] = $this->db->get('status')->result_array();

    $this->form_validation->set_rules('id_p', 'Id_p', 'required|trim');

    if ($this->form_validation->run() == false) {

      $this->load->view('templates/header');
      $this->load->view('templates/slidebar');
      $this->load->view('templates/topbar', $data);
      $this->load->view('kasir/detail_ks', $data);
      $this->load->view('templates/footer');
    } else {
      $id_p = $this->input->post('id_p');
      $id_s = $this->input->post('status2');

      $update = [
        'id_status' => $id_s,
        'kasir' => $this->session->userdata('id_karyawan')
      ];

      $this->db->where('id', $id_p);
      $this->db->update('pesanan', $update);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Mengubah Status Bayar</div>');
      redirect('kasir/index');
    }
  }

  public function riwayat_pembayaran()
  {
    $data['saya_karyawan'] = $this->db->get_where('karyawan', ['id' => $this->session->userdata('id_karyawan')])->row_array();
    $data['listPesanan'] = $this->KasirModal->getkasirDone()->result_array();

    $this->load->view('templates/header');
    $this->load->view('templates/slidebar');
    $this->load->view('templates/topbar', $data);
    $this->load->view('kasir/home_ks', $data);
    $this->load->view('templates/footer');
  }
  public function cek_kembalian()
  {
    $this->form_validation->set_rules('cek', 'Cek', 'required|trim');
    if($this->form_validation->run() == false){
      redirect('detail_ks');
    } else {
      
    }
  }


}
