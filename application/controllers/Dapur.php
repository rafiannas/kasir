<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dapur extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->library('form_validation');
    cek_login();
    $this->load->model('DapurModal');
  }


  public function index()
  {
    $data['saya_karyawan'] = $this->db->get_where('karyawan', ['id' => $this->session->userdata('id_karyawan')])->row_array();

    $data['listPesanan'] = $this->DapurModal->getDapur()->result_array();

    $this->load->view('templates/header_ref');
    $this->load->view('templates/slidebar');
    $this->load->view('templates/topbar', $data);
    $this->load->view('dapur/home_dp', $data);
    $this->load->view('templates/footer');
  }
  public function detail($id)
  {
    $data['saya_karyawan'] = $this->db->get_where('karyawan', ['id' => $this->session->userdata('id_karyawan')])->row_array();
    $data['rinci'] = $this->DapurModal->getDetail($id)->result_array();
    $data['dipilih'] = $this->db->get_where('pesanan', ['id' => $id])->row_array();

    $this->load->view('templates/header');
    $this->load->view('templates/slidebar_dp');
    $this->load->view('templates/topbar', $data);
    $this->load->view('dapur/detail', $data);
    $this->load->view('templates/footer');
  }
  public function ganti($id)
  {
    $data['saya_karyawan'] = $this->db->get_where('karyawan', ['id' => $this->session->userdata('id_karyawan')])->row_array();
    $data['dipilih'] = $this->DapurModal->getGanti($id)->row_array();
    $data['pilihan'] = $this->db->get('status2')->result_array();

    $this->form_validation->set_rules('id_p', 'Id_p', 'required|trim');
    if ($this->form_validation->run() == false) {

      $this->load->view('templates/header');
      $this->load->view('templates/slidebar_dp');
      $this->load->view('templates/topbar', $data);
      $this->load->view('dapur/ganti', $data);
      $this->load->view('templates/footer');
    } else {
      $id_p = $this->input->post('id_p');
      $id_s = $this->input->post('status2');

      $this->db->set('id_status2', $id_s);
      $this->db->where('id', $id_p);
      $this->db->update('pesanan');
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Mengubah Status</div>');
      redirect('dapur/index');
    }
  }

  public function riwayat_masakan()
  {
    $data['saya_karyawan'] = $this->db->get_where('karyawan', ['id' => $this->session->userdata('id_karyawan')])->row_array();

    $data['listPesanan'] = $this->DapurModal->getRiwayatMasakan()->result_array();

    $this->load->view('templates/header');
    $this->load->view('templates/slidebar');
    $this->load->view('templates/topbar', $data);
    $this->load->view('dapur/home_dp', $data);
    $this->load->view('templates/footer');
  }
}
