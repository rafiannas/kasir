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
    $this->load->model('AdminModal');
    $this->load->model('ServerModal');
  }

  public function index()
  {
    $data['title'] = 'Dashboard';
    $data['saya_karyawan'] = $this->db->get_where('karyawan', ['id' => $this->session->userdata('id_karyawan')])->row_array();
    // $data['listPesanan'] = $this->KasirModal->getkasirNow()->result_array();
    $this->load->view('templates/header', $data);
    $this->load->view('templates/navbar', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('kasir/home_ks', $data);
    $this->load->view('templates/quick_sidebar', $data);
    $this->load->view('templates/footer', $data);
  }

  public function penjualan()
  {
    $data['title'] = 'Penjualan';
    $data['saya_karyawan'] = $this->db->get_where('karyawan', ['id' => $this->session->userdata('id_karyawan')])->row_array();
    $data['supplier'] = $this->AdminModal->getSupplier();
    $data['dataobat'] = $this->AdminModal->getObat();

    $cek_awal = $this->ServerModal->cekAwal($this->session->userdata('id_karyawan'));
    if (!$cek_awal) {
      $isi = [
        'id_status' => 1,
        'id_karyawan' => $this->session->userdata('id_karyawan')
      ];
      $this->db->insert('penjualan', $isi);
      $id_pembelian = $this->db->insert_id();
    } else {
      $id_pembelian = $cek_awal['id'];
    }

    $data['rincian_penjualan'] = $this->ServerModal->listPembelian($id_pembelian);

    $this->form_validation->set_rules('jumlah', 'Jumlah', 'trim');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/navbar', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('kasir/penjualan', $data);
      $this->load->view('templates/quick_sidebar', $data);
      $this->load->view('templates/footer', $data);
    } else {
      $obat = $this->input->post('obat');

      $cek_barang = $this->ServerModal->cekBarang($obat);
      if ($cek_barang) {
        $upd = [
          'jumlah' => $this->input->post('jumlah') + $cek_barang['jumlah'],
          'satuan' => $this->input->post('satuan'),
          'harga_per_obat' => ($this->input->post('jumlah') * $this->input->post('harga_beli')) + $cek_barang['harga_per_obat']
        ];

        $this->db->where('id', $cek_barang['id']);
        $this->db->update('detail_penjualan', $upd);
        $this->session->set_flashdata('message', '<div class="alert alert-success tutup" role="alert">Berhasil menambahkan obat !</div>');
        redirect('kasir/penjualan');
      } else {
        $inp = [
          'id_pembelian' => $id_pembelian,
          'obat' => $obat,
          'harga' => $this->input->post('harga_beli'),
          'jumlah' => $this->input->post('jumlah'),
          'satuan' => $this->input->post('satuan'),
          'harga_per_obat' => $this->input->post('jumlah') * $this->input->post('harga_beli')
        ];
        $this->db->insert('detail_penjualan', $inp);
        $this->session->set_flashdata('message', '<div class="alert alert-success tutup" role="alert">Berhasil menambahkan obat !</div>');
        redirect('kasir/penjualan');
      }
    }
  }

  public function checkout()
  {
    $data['title'] = 'Penjualan';
    $data['saya_karyawan'] = $this->db->get_where('karyawan', ['id' => $this->session->userdata('id_karyawan')])->row_array();

    $pembelian = $this->ServerModal->Checkout($this->session->userdata('id_karyawan'));
    $data['rincian_pembelian'] = $this->ServerModal->listCheckout($pembelian['id']);


    $this->load->view('templates/header', $data);
    $this->load->view('templates/navbar', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('admin/checkout', $data);
    $this->load->view('templates/quick_sidebar', $data);
    $this->load->view('templates/footer', $data);
  }

  public function proses_checkout()
  {
    $id_pembelian = $this->input->post('idpembelian');
    date_default_timezone_set('Asia/Jakarta');
    $data = array(
      'tgl'   => date('Y-m-d H:i:s'),
      'ppn' => $this->input->post('ppn'),
      'total_harga' => $this->input->post('total'),
      'total_bayar' => $this->input->post('total_bayar'),
      'kembalian' => $this->input->post('x'),
    );

    $where = array(
      'id' => $id_pembelian,
    );

    $this->KasirModal->update_data($where, $data, 'pembelian');
    redirect('kasir/pdf/' . $id_pembelian);
  }

  public function pdf($id_pembelian)
  {
    $this->load->library('dompdf_gen');
    $data['pembelian'] = $this->KasirModal->getPembelian($id_pembelian);
    $data['detail_beli'] = $this->KasirModal->getDetailPembelian($id_pembelian);
    $this->load->view('kasir/pdf', $data);
    $paper_size = 'A5';
    $orientation = 'landscape';
    $html = $this->output->get_output();
    $this->dompdf->set_paper($paper_size, $orientation);
    $this->dompdf->load_html($html);
    $this->dompdf->render();
    $this->dompdf->stream("Struk_Pesanan.pdf", array('Attachment' => 0));
  }

  public function hapus_barang($id)
  {
    $this->db->where('id', $id);
    $this->db->delete('detail_penjualan');

    $this->session->set_flashdata('message', '<div class="tutup alert alert-success tutup" role="alert">Berhasil Menghapus obat ! </div>');
    redirect('kasir/penjualan');
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
    if ($this->form_validation->run() == false) {
      redirect('detail_ks');
    } else {
    }
  }
}
