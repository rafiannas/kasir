<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Manager extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    cek_login();
    $this->load->library('form_validation');
    $this->load->model('ServerModal');
    $this->load->model('AdminModal');

    // $this->load->model('chart_model');
  }

  public function index()
  {
    $data['title'] = 'Dashboard';
    $data['saya_karyawan'] = $this->db->get_where('karyawan', ['id' => $this->session->userdata('id_karyawan')])->row_array();
    // $data['listPesanan'] = $this->KasirModal->getkasirNow()->result_array();
    $this->load->view('templates/header', $data);
    $this->load->view('templates/navbar', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('manager/index', $data);
    $this->load->view('templates/quick_sidebar', $data);
    $this->load->view('templates/footer', $data);
  }

  // public function index()
  // {
  //   $data = [
  //     'id_def' => 4
  //   ];
  //   $this->session->set_userdata($data);
  //   redirect('server/home');
  // }
  // public function temp($id)
  // {
  //   $data = [
  //     'id_def' => $id
  //   ];
  //   $this->session->set_userdata($data);
  //   redirect('server/home');
  // }

  // public function home()
  // {
  //   $def = $this->session->userdata('id_def');
  //   $id_karyawan = $this->session->userdata('id_karyawan');

  //   $data['saya_karyawan'] = $this->db->get_where('karyawan', ['id' => $id_karyawan])->row_array();

  //   $cek_awal = $this->ServerModal->cekAwal($id_karyawan);
  //   //klo ga ada
  //   if (!$cek_awal) {
  //     $isi = [
  //       'id_status' => 1,
  //       'server' => $id_karyawan
  //     ];
  //     $this->db->insert('pesanan', $isi);
  //     //klo ada
  //   }

  //   $ada = $this->ServerModal->cekAwal($id_karyawan);

  //   $id = $ada['id'];

  //   $data['listPesanan'] = $this->ServerModal->listPesanan($id);

  //   $data['kategori'] = $this->AdminModal->getMenu();

  //   $data['judulMenu'] = $this->db->get('kategori', ['id' => $def])->row_array();
  //   $data['byMenu'] =  $this->ServerModal->getMenuBy($def);


  //   $this->form_validation->set_rules('qty', 'Qty', 'required|trim|integer');

  //   if ($this->form_validation->run() == false) {
  //     $this->load->view('templates/header');
  //     $this->load->view('templates/slidebar');
  //     $this->load->view('templates/topbar', $data);
  //     $this->load->view('server/top_home', $data);
  //     $this->load->view('templates/footer');
  //   } else {
  //     $jmh_brg = $this->input->post('qty');
  //     $id_men = $this->input->post('id_b');

  //     $cekDulu = $this->db->query("SELECT * FROM detail_pesanan WHERE id_menu = $id_men AND id_pesanan = $id")->row_array();
  //     $id_det = $cekDulu['id'];
  //     $dikeranjang_skrg = $cekDulu['jumlah'];

  //     //cek stok barang
  //     $cekMenu = $this->ServerModal->cekMenu($id_men);
  //     $stokMenu = $cekMenu['stok'];
  //     if ($stokMenu < $jmh_brg) {
  //       $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Stok Tidak Cukup !</div>');
  //       redirect('server/home');
  //     }

  //     //nambah barang yg udh ada
  //     if ($cekDulu) {

  //       $upd_jmh = $dikeranjang_skrg + $jmh_brg;
  //       $this->db->set('jumlah', $upd_jmh);
  //       $this->db->where('id', $id_det);
  //       $this->db->update('detail_pesanan');

  //       $upd_stok = $stokMenu - $jmh_brg;
  //       $this->db->set('stok', $upd_stok);
  //       $this->db->where('id', $id_men);
  //       $this->db->update('menu');

  //       //nambah braang baru
  //     } else {
  //       $isi = [
  //         'id_pesanan' => $id,
  //         'id_menu' => $id_men,
  //         'jumlah' => $jmh_brg,
  //       ];
  //       $this->db->insert('detail_pesanan', $isi);
  //       $cek_menu = $this->db->get_where('menu', ['id' => $id_men])->row_array();
  //       $stok_now = $cek_menu['stok'];
  //       $stok_update = $stok_now - $jmh_brg;

  //       $this->db->set('stok', $stok_update);
  //       $this->db->where('id', $id_men);
  //       $this->db->update('menu');
  //     }

  //     redirect('server/home');
  //   }
  // }

  // public function hapus_barang($id)
  // {
  //   $cekDetPesanan = $this->ServerModal->cekDetPesanan($id);
  //   $id_men = $cekDetPesanan['id_menu'];
  //   $jmh = $cekDetPesanan['jumlah'];

  //   $cekMenu = $this->ServerModal->cekMenu($id_men);
  //   $stokMenu = $cekMenu['stok'];
  //   $upd_stok = $stokMenu + $jmh;

  //   $this->db->set('stok', $upd_stok);
  //   $this->db->where('id', $id_men);
  //   $this->db->update('menu');


  //   $this->db->where('id', $id);
  //   $this->db->delete('detail_pesanan');


  //   redirect('server/home');
  // }


  // public function get_cek()
  // {
  //   $ok = $this->ServerModal->get()->row_array();

  //   $result['cek'] = $ok;
  //   $result['msg'] = "Berhasil";
  //   echo json_encode($result);
  // }
  // public function cek_status_masak()
  // {
  //   $ok = $this->ServerModal->riwayat();

  //   $result['cek'] = $ok;
  //   $result['msg'] = "Berhasil";
  //   echo json_encode($result);
  // }


  // public function riwayat_pesanan()
  // {
  //   $data['saya_karyawan'] = $this->db->get_where('karyawan', ['id' => $this->session->userdata('id_karyawan')])->row_array();
  //   $data['riwayatPesanan'] = $this->ServerModal->riwayat();

  //   $this->load->view('templates/header');
  //   $this->load->view('templates/slidebar');
  //   $this->load->view('templates/topbar', $data);
  //   $this->load->view('server/riwayat', $data);
  //   $this->load->view('templates/footer');
  // }
  // public function konfirmasi()
  // {
  //   $data['saya_karyawan'] = $this->db->get_where('karyawan', ['id' => $this->session->userdata('id_karyawan')])->row_array();
  //   $id_saya = $data['saya_karyawan']['id'];

  //   $ini_pesanan = $this->db->query("SELECT * FROM pesanan WHERE id_status =1 AND server = $id_saya")->row_array();

  //   $id_pesanan = $ini_pesanan['id'];
  //   $data['pesan'] = $this->db->get_where('pesanan', ['id' => $id_pesanan])->row_array();

  //   $data['konfirm'] = $this->ServerModal->getKonfirmasi($id_pesanan);
  //   $temp =  $data['konfirm'];
  //   $i = 1;
  //   $j = 0;
  //   $tot = 0;

  //   foreach ($temp as $t) {
  //     $j = $t['harga'] * $t['jumlah'];
  //     $tot += $j;
  //     $i += 1;
  //   }


  //   $jmh = count($temp);
  //   date_default_timezone_set('Asia/Jakarta');
  //   $tgl2 = date("Y-m-d H:i:s");
  //   //echo $tgl2;

  //   $th = [
  //     'th' => $tot,
  //     'id_pth' =>  $id_pesanan
  //   ];
  //   $this->session->set_userdata($th);


  //   // $jmh= $data['konfirm']['']
  //   $this->form_validation->set_rules('hid', 'Hid', 'trim|integer');
  //   if ($this->form_validation->run() == false) {
  //     $this->load->view('templates/header');
  //     $this->load->view('templates/slidebar');
  //     $this->load->view('templates/topbar', $data);
  //     $this->load->view('server/konfirmasi', $data);
  //     $this->load->view('templates/footer');
  //   } else {


  //     $inp = [
  //       'jumlah_pesanan' => $jmh,
  //       'tanggal' => $tgl2,
  //       'total_harga' => $tot,
  //       'id_status' => 2, //status server&kasie
  //       'id_status2' => 1, //status dapur
  //       'server' => $this->session->userdata('id_karyawan'),
  //     ];

  //     $this->db->where('id', $id_pesanan);
  //     $this->db->update('pesanan', $inp);
  //     $sd = [
  //       'id_sd' => $id_pesanan
  //     ];
  //     $this->session->set_userdata($sd);

  //     $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pesanan Berhasil !</div>');
  //     redirect('server/invoice');
  //   }
  // }

  // function cek()
  // {

  //   $bayar = $this->input->post('bayar');
  //   echo $bayar;


  //   $th = $this->session->userdata('th');
  //   $pth = $this->session->userdata('id_pth');
  //   $kembali = $bayar - $th;
  //   echo $th;
  //   echo $pth;
  //   echo $kembali;

  //   $upd = [
  //     'uang_bayar' => $bayar,
  //     'uang_kembali' => $kembali
  //   ];
  //   $this->db->where('id', $pth);
  //   $this->db->update('pesanan', $upd);

  //   redirect('Server/konfirmasi');
  // }

  // function s_detail($id)
  // {
  //   $sd = [
  //     'id_sd' => $id
  //   ];
  //   $this->session->set_userdata($sd);
  //   redirect('server/detail');
  // }

  // public function detail()
  // {
  //   $data['saya_karyawan'] = $this->db->get_where('karyawan', ['id' => $this->session->userdata('id_karyawan')])->row_array();

  //   $id_sd = $this->session->userdata('id_sd');

  //   $data['pesanan'] = $this->ServerModal->getPesanan($id_sd)->row_array();

  //   $data['rinci'] = $this->ServerModal->getDetail($id_sd)->result_array();


  //   $this->load->view('templates/header');
  //   $this->load->view('templates/slidebar');
  //   $this->load->view('templates/topbar', $data);
  //   $this->load->view('server/detail', $data);
  //   $this->load->view('templates/footer');
  // }

  // public function invoice()
  // {
  //   $data['saya_karyawan'] = $this->db->get_where('karyawan', ['id' => $this->session->userdata('id_karyawan')])->row_array();

  //   $id_sd = $this->session->userdata('id_sd');

  //   $data['pesanan'] = $this->ServerModal->getPesanan($id_sd)->row_array();

  //   $data['rinci'] = $this->ServerModal->getDetail($id_sd)->result_array();



  //   $this->load->view('templates/header');
  //   $this->load->view('templates/slidebar');
  //   $this->load->view('templates/topbar', $data);
  //   $this->load->view('server/invoice', $data);
  //   $this->load->view('templates/footer');
  // }
}
