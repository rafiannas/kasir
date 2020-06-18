<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();

    // cek_login();

    $this->load->library('form_validation');
    $this->load->model('AdminModal');
    $this->load->model('ServerModal');
    $this->load->library('Excel'); //load librari excel
    //cek_login();
    // $this->load->model('chart_model');
  }


  public function index()
  {
    $data['title'] = 'Dashboard';
    $data['saya_karyawan'] = $this->db->get_where('karyawan', ['id' => $this->session->userdata('id_karyawan')])->row_array();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/navbar', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('admin/index', $data);
    $this->load->view('templates/quick_sidebar', $data);
    $this->load->view('templates/footer', $data);
  }

  public function fetch_hargaobat()
  {
    if ($this->input->post('id_obat')) {
      echo $this->AdminModal->harga_obat($this->input->post('id_obat'));
    }
  }

  public function manage_user()
  {
    $data['title'] = 'Managemen User';
    $data['saya_karyawan'] = $this->db->get_where('karyawan', ['id' => $this->session->userdata('id_karyawan')])->row_array();
    $data['daftarKaryawan'] = $this->AdminModal->getAdmin();
    $data['active'] = $this->db->get('active')->result_array();
    $data['akses'] = $this->db->get('karyawan_role')->result_array();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/navbar', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('admin/manage_user', $data);
    $this->load->view('templates/quick_sidebar', $data);
    $this->load->view('templates/footer', $data);
  }

  public function obat()
  {
    $data['title'] = 'Pembelian Obat';
    $data['saya_karyawan'] = $this->db->get_where('karyawan', ['id' => $this->session->userdata('id_karyawan')])->row_array();
    $data['obat'] = $this->AdminModal->getObat();
    $data['katalog'] = $this->AdminModal->getKatalog();


    $this->form_validation->set_rules('namaobat', 'Nama Obat', 'required|trim');
    $this->form_validation->set_rules('satuan', 'Satuan Obat', 'required|trim');
    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/navbar', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('admin/obat', $data);
      $this->load->view('templates/quick_sidebar', $data);
      $this->load->view('templates/footer', $data);
    } else {
      $nama = $this->input->post('namaobat');
      $satuan = $this->input->post('satuan');
      $tambah = [
        'nama_obat' => $nama,
        'id_satuan' => $satuan,
      ];
      $this->db->insert('daftar_obat', $tambah);
      $this->session->set_flashdata('message', '<div class="tutup alert alert-success" role="alert"> Berhasil menambahkan obat <b>' . $nama . '</b> </div>');
      redirect('admin/obat');
    }
  }

  public function stok()
  {
    $data['title'] = 'Stok Obat';
    $data['saya_karyawan'] = $this->db->get_where('karyawan', ['id' => $this->session->userdata('id_karyawan')])->row_array();
    $data['stok_obat'] = $this->AdminModal->getStok();

    $this->form_validation->set_rules('namaobat', 'Nama Obat', 'required|trim');
    $this->form_validation->set_rules('satuan', 'Satuan Obat', 'required|trim');
    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/navbar', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('admin/stok', $data);
      $this->load->view('templates/quick_sidebar', $data);
      $this->load->view('templates/footer', $data);
    } else {
      $nama = $this->input->post('namaobat');
      $satuan = $this->input->post('satuan');
      $tambah = [
        'nama_obat' => $nama,
        'id_satuan' => $satuan,
      ];
      $this->db->insert('stok', $tambah);
      $this->session->set_flashdata('message', '<div class="tutup alert alert-success" role="alert"> Berhasil menambahkan obat <b>' . $nama . '</b> </div>');
      redirect('admin/stok');
    }
  }

  public function histori_perubahan()
  {
    $data['title'] = 'Stok Obat';
    $data['saya_karyawan'] = $this->db->get_where('karyawan', ['id' => $this->session->userdata('id_karyawan')])->row_array();
    $data['histori'] = $this->AdminModal->getHistori();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/navbar', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('admin/histori_perubahan', $data);
    $this->load->view('templates/quick_sidebar', $data);
    $this->load->view('templates/footer', $data);
  }

  public function katalog_obat()
  {
    $data['title'] = 'Katalog Obat';
    $data['saya_karyawan'] = $this->db->get_where('karyawan', ['id' => $this->session->userdata('id_karyawan')])->row_array();
    $data['obat'] = $this->AdminModal->getObat();

    $this->form_validation->set_rules('namaobat', 'Nama Obat', 'required|trim');
    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/navbar', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('admin/katalog_obat', $data);
      $this->load->view('templates/quick_sidebar', $data);
      $this->load->view('templates/footer', $data);
    } else {
      $nama = $this->input->post('namaobat');
      $tambah = [
        'nama_obat' => $nama,
      ];
      $this->db->insert('daftar_obat', $tambah);
      $this->session->set_flashdata('message', '<div class="tutup alert alert-success" role="alert"> Berhasil menambahkan obat <b>' . $nama . '</b> </div>');
      redirect('admin/katalog_obat');
    }
  }

  public function tambah_obat()
  {
    $data['title'] = 'Obat';
    $data['saya_karyawan'] = $this->db->get_where('karyawan', ['id' => $this->session->userdata('id_karyawan')])->row_array();
    $data['satuanobat'] = $this->AdminModal->getSatuan();
    $data['tipeobat'] = $this->AdminModal->getTipe();
    $data['supplier'] = $this->AdminModal->getSupplier();
    $data['obat'] = $this->AdminModal->getObat();
    $this->load->view('templates/header', $data);
    $this->load->view('templates/navbar', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('admin/tambah_obat', $data);
    $this->load->view('templates/quick_sidebar', $data);
    $this->load->view('templates/footer', $data);
  }


  public function add_obat()
  {
    date_default_timezone_set('Asia/Jakarta');
    $idobat = $this->input->post('obat');
    $supplier = $this->input->post('supplier');
    $tipe = $this->input->post('tipe');
    $satuan = $this->input->post('satuan');
    $netto = $this->input->post('netto');
    $tambah = [
      'id_daftar_obat' =>  $idobat,
      'id_supplier' => $supplier,
      'harga_beli' => $this->input->post('hargabeli'),
      'id_tipe' => $tipe,
      'id_satuan' => $satuan,
      'jumlah_obat' => $this->input->post('stok'),
      'netto' => $netto,
      'tgl_input' => date('Y-m-d H:i:s'),
    ];
    $this->db->insert('obat', $tambah);
    $query = "SELECT * FROM stok 
    where id_daftar_obat = $idobat 
    and id_supplier = $supplier
    and id_tipe = $tipe
    and id_satuan = $satuan
    and netto = $netto";

    $check = $this->db->query($query)->row_array();
    if ($check) {
      $update = $check['stok'] + $this->input->post('stok');
      $updata = [
        'stok' => $update,
        'harga_jualan' => $this->input->post('harga_jualan'),
      ];
      $this->db->where('id_daftar_obat', $idobat);
      $this->db->update('stok', $updata);
    } else {
      $tambah2 = [
        'id_daftar_obat' => $idobat,
        'id_supplier' => $supplier,
        'id_tipe' => $tipe,
        'id_satuan' => $satuan,
        'stok' => $this->input->post('stok'),
        'netto' => $netto,
        'harga_jualan' => $this->input->post('harga_jualan'),
      ];
      $this->db->insert('stok', $tambah2);
    }
    $this->session->set_flashdata('message', '<div class="tutup alert alert-success" role="alert"> Berhasil menambahkan obat!</div>');
    redirect('admin/obat');
  }


  public function obat_tipe()
  {
    $data['title'] = 'Katalog Obat';
    $data['saya_karyawan'] = $this->db->get_where('karyawan', ['id' => $this->session->userdata('id_karyawan')])->row_array();
    $data['tipeobat'] = $this->AdminModal->getTipe();

    $this->form_validation->set_rules('tipe_obat', 'Tipe Obat', 'required|trim');
    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/navbar', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('admin/obat_tipe', $data);
      $this->load->view('templates/quick_sidebar', $data);
      $this->load->view('templates/footer', $data);
    } else {
      $nama = $this->input->post('tipe_obat');
      $tambah = [
        'tipe' => $nama,
      ];
      $this->db->insert('obat_tipe', $tambah);
      $this->session->set_flashdata('message', '<div class="tutup alert alert-success" role="alert"> Berhasil menambahkan tipe obat <b>' . $nama . '</b> </div>');
      redirect('admin/obat_tipe');
    }
  }

  public function obat_satuan()
  {
    $data['title'] = 'Katalog Obat';
    $data['saya_karyawan'] = $this->db->get_where('karyawan', ['id' => $this->session->userdata('id_karyawan')])->row_array();
    $data['obatsatuan'] = $this->AdminModal->getSatuan();

    $this->form_validation->set_rules('satuan', 'Satuan Obat', 'required|trim');
    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/navbar', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('admin/obat_satuan', $data);
      $this->load->view('templates/quick_sidebar', $data);
      $this->load->view('templates/footer', $data);
    } else {
      $nama = $this->input->post('satuan');
      $tambah = [
        'satuan' => $nama,
      ];
      $this->db->insert('obat_satuan', $tambah);
      $this->session->set_flashdata('message', '<div class="tutup alert alert-success" role="alert"> Berhasil menambahkan satuan <b>' . $nama . '</b> </div>');
      redirect('admin/obat_Satuan');
    }
  }

  public function penjualan()
  {
    $data['title'] = 'Penjualan';
    $data['saya_karyawan'] = $this->db->get_where('karyawan', ['id' => $this->session->userdata('id_karyawan')])->row_array();
    $data['supplier'] = $this->AdminModal->getSupplier();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/navbar', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('admin/penjualan', $data);
    $this->load->view('templates/quick_sidebar', $data);
    $this->load->view('templates/footer', $data);
  }

  public function laporan_penjualan()
  {
    $data['title'] = 'Laporan Penjualan';
    $data['saya_karyawan'] = $this->db->get_where('karyawan', ['id' => $this->session->userdata('id_karyawan')])->row_array();
    $data['supplier'] = $this->AdminModal->getSupplier();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/navbar', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('admin/laporan_penjualan', $data);
    $this->load->view('templates/quick_sidebar', $data);
    $this->load->view('templates/footer', $data);
  }

  public function laporan_stok()
  {
    $data['title'] = 'Laporan Stok';
    $data['saya_karyawan'] = $this->db->get_where('karyawan', ['id' => $this->session->userdata('id_karyawan')])->row_array();
    $data['supplier'] = $this->AdminModal->getSupplier();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/navbar', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('admin/laporan_stok', $data);
    $this->load->view('templates/quick_sidebar', $data);
    $this->load->view('templates/footer', $data);
  }

  public function tambahpenjualan()
  {
    $data['title'] = 'Penjualan';
    $data['saya_karyawan'] = $this->db->get_where('karyawan', ['id' => $this->session->userdata('id_karyawan')])->row_array();
    $data['supplier'] = $this->AdminModal->getSupplier();
    $data['dataobat'] = $this->AdminModal->getObatStok();

    $cek_awal = $this->ServerModal->cekAwal($this->session->userdata('id_karyawan'));
    if (!$cek_awal) {
      $isi = [
        'id_status' => 1,
        'id_karyawan' => $this->session->userdata('id_karyawan')
      ];
      $this->db->insert('penjualan', $isi);
      $id_penjualan = $this->db->insert_id();
    } else {
      $id_penjualan = $cek_awal['id'];
    }
    $data_pen = [
      'id_penjualan' => $id_penjualan
    ];
    $this->session->set_userdata($data_pen);


    $data['rincian_penjualan'] = $this->ServerModal->listpenjualan($id_penjualan);

    $this->form_validation->set_rules('jumlah', 'Jumlah', 'trim');
    $this->form_validation->set_rules('obat', 'Obat', 'trim');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/navbar', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('admin/tambah_penjualan', $data);
      $this->load->view('templates/quick_sidebar', $data);
      $this->load->view('templates/footer', $data);
    } else {
      $obat = $this->input->post('obat');
      $cek_barang = $this->ServerModal->cekBarang($obat);
      $info_obat = $this->db->query("SELECT stok.*, daftar_obat.nama_obat 
      FROM stok, daftar_obat 
      WHERE stok.id_daftar_obat = daftar_obat.id
      AND stok.id_daftar_obat = $obat")->row_array();

      if ($cek_barang) {
        $upd = [
          'jumlah' => $this->input->post('jumlah') + $cek_barang['jumlah'],
          'harga_per_obat' => $info_obat['harga_jualan']
        ];
        $this->db->where('id', $cek_barang['id']);
        $this->db->update('detail_penjualan', $upd);
        $this->session->set_flashdata('message', '<div class="alert alert-success tutup" role="alert">Berhasil menambahkan obat !</div>');
        redirect('admin/tambahpenjualan');
      } else {
        $inp = [
          'id_penjualan' => $id_penjualan,
          'id_daftar_obat' => $obat,
          'jumlah' => $this->input->post('jumlah'),
          'obat' => $info_obat['nama_obat'],
          'harga_per_obat' =>  $info_obat['harga_jualan']
        ];
        $this->db->insert('detail_penjualan', $inp);
        $this->session->set_flashdata('message', '<div class="alert alert-success tutup" role="alert">Berhasil menambahkan obat !</div>');
        redirect('admin/tambahpenjualan');
      }
    }
  }

  public function checkout()
  {
    date_default_timezone_set('Asia/Jakarta');
    $upd = [
      'tgl' => date('Y-m-d H:i:s'),
      'ppn' => $this->input->post('ppn'),
      'total_harga' => $this->input->post('total_harga'),
      'total+ppn' => $this->input->post('total+ppn'),
      'total_bayar' => $this->input->post('uang_bayar'),
      'jumlah_beli' => $this->input->post('jumlah_beli'),
      'kembalian' => $this->input->post('x'),
      'catatan' => $this->input->post('catatan')
    ];

    $this->db->where('id', $this->session->userdata('id_penjualan'));
    $this->db->update('penjualan', $upd);
    redirect('admin');
  }

  function add_to_cart()
  { //fungsi Add To Cart
    $data = array(
      'nama_supplier' => $this->input->post('nama_supplier'),
      'nota' => $this->input->post('nota'),
      'obat' => $this->input->post('obat'),
      'harga_beli' => $this->input->post('harga_beli'),
      'satuan' => $this->input->post('satuan'),
      'jumlah' => $this->input->post('jumlah')
    );
    $this->cart->insert($data);
    echo $this->show_cart(); //tampilkan cart setelah added
  }

  function show_cart()
  { //Fungsi untuk menampilkan Cart
    $output = '';
    $no = 0;
    foreach ($this->cart->contents() as $items) {
      $no++;
      $output .= '
				<tr>
					<td>' . $items['obat'] . '</td>
					<td>' . number_format($items['harga_beli']) . '</td>
					<td>' . $items['c'] . '</td>
					<td>' . number_format($items['d']) . '</td>
          <td><button type="button" id="' . $items['a'] . '" class="hapus_cart btn btn-danger btn-xs">Batal</button></td>
				</tr>
			';
    }
    $output .= '
			<tr>
				<th colspan="3">Total</th>
				<th colspan="2">' . 'Rp ' . number_format($this->cart->total()) . '</th>
			</tr>
		';
    return $output;
  }

  function load_cart()
  { //load data cart
    echo $this->show_cart();
  }

  function hapus_cart()
  { //fungsi untuk menghapus item cart
    $data = array(
      'rowid' => $this->input->post('row_id'),
      'qty' => 0,
    );
    $this->cart->update($data);
    echo $this->show_cart();
  }

  function get_autocomplete()
  {

    if (isset($_GET['term'])) {
      $result = $this->AdminModal->getKeyword($_GET['term']);

      if (count($result) > 0) {
        foreach ($result as $row)
          $result_array[] = array(
            'label' => $row->nama_obat,
            'harga_beli' => $row->harga_beli,
            'satuan' => $row->satuan,
          );
        echo json_encode($result_array);
      }
    }
  }

  public function supplier()
  {
    $data['title'] = 'Supplier';
    $data['saya_karyawan'] = $this->db->get_where('karyawan', ['id' => $this->session->userdata('id_karyawan')])->row_array();
    $data['supplier'] = $this->AdminModal->getSupplier();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/navbar', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('admin/supplier', $data);
    $this->load->view('templates/quick_sidebar', $data);
    $this->load->view('templates/footer', $data);
  }


  public function geteditsupplier()
  {
    $this->load->model('AdminModal', 'supplier');
    echo json_encode($this->supplier->getSupplierById($_POST['id']));
  }

  public function edit_supplier()
  {
    $input_id = $_POST['id'];
    $input_alamat = $_POST['alamatsu'];
    $input_nama = $_POST['namasu'];
    $input_nomor = $_POST['no_kontaksu'];
    $query = "UPDATE `supplier` SET `nama_supplier` = '$input_nama', `alamat` = '$input_alamat', `no_kontak` = '$input_nomor' WHERE `id` ='$input_id' ";
    $this->db->query($query);
    $this->session->set_flashdata('message', '<div class="tutup alert alert-success" role="alert">Supplier berhasil di updated!</div>');
    redirect('admin/supplier');
  }

  public function update_harga()
  {

    $input_id = $_POST['id'];
    $input_harga = $_POST['hargajual'];
    $data['stok'] = $this->db->get_where('stok', ['id' => $input_id])->row_array();
    $harga_awal =  $data['stok']['harga_jualan'];
    $input_nama = $_POST['namaobat'];

    $query = "UPDATE `stok` SET `harga_jualan` = '$input_harga' WHERE `id` ='$input_id' ";
    $this->db->query($query);

    if ($harga_awal == $input_harga) {
      $this->session->set_flashdata('message', '<div class="tutup alert alert-success" role="alert">Harga jual <b>' . $input_nama . '</b> berhasil di updated!</div>');
      redirect('admin/stok');
    } else {
      date_default_timezone_set('Asia/Jakarta');
      $data = [
        'id_stok' => $input_id,
        'harga_sebelum' => $harga_awal,
        'harga_sesudah' => $input_harga,
        'id_karyawan' =>   $this->session->userdata('id_karyawan'),
        'tgl_ubah' => date('Y-m-d H:i:s'),
      ];
      $this->db->insert('history_stok', $data);
      $this->session->set_flashdata('message', '<div class="tutup alert alert-success" role="alert">Harga jual <b>' . $input_nama . '</b> berhasil di updated!</div>');
      redirect('admin/stok');
    }
  }

  public function geteditharga()
  {
    $this->load->model('AdminModal', 'stok');
    echo json_encode($this->stok->getStokById($_POST['id']));
  }

  public function geteditobat()
  {
    $this->load->model('AdminModal', 'daftar_obat');
    echo json_encode($this->daftar_obat->getObatById($_POST['id']));
  }

  public function edit_obat()
  {
    $input_id = $_POST['id'];
    $input_namaobat = $_POST['namaobatku'];
    $query = "UPDATE `daftar_obat` SET `nama_obat` = '$input_namaobat' WHERE `id` ='$input_id' ";
    $this->db->query($query);
    $this->session->set_flashdata('message', '<div class="tutup alert alert-success" role="alert">Obat berhasil di updated!</div>');
    redirect('admin/katalog_obat');
  }

  public function geteditsatuan()
  {
    $this->load->model('AdminModal', 'obat_satuan');
    echo json_encode($this->obat_satuan->getSatuanById($_POST['id']));
  }

  public function edit_satuan()
  {
    $input_id = $_POST['id'];
    $input_satuan = $_POST['satuan'];
    $query = "UPDATE `obat_satuan` SET `satuan` = '$input_satuan' WHERE `id` ='$input_id' ";
    $this->db->query($query);
    $this->session->set_flashdata('message', '<div class="tutup alert alert-success" role="alert">Satuan obat berhasil di updated!</div>');
    redirect('admin/obat_satuan');
  }

  public function get_tipe()
  {
    $this->load->model('AdminModal', 'obat_tipe');
    echo json_encode($this->obat_tipe->getTipeById($_POST['id']));
  }

  public function edit_tipe()
  {
    $input_id = $_POST['id'];
    $input_tipe = $_POST['tpobat'];
    $query = "UPDATE `obat_tipe` SET `tipe` = '$input_tipe' WHERE `id` ='$input_id' ";
    $this->db->query($query);
    $this->session->set_flashdata('message', '<div class="tutup alert alert-success" role="alert">Tipe obat berhasil di updated!</div>');
    redirect('admin/obat_tipe');
  }

  public function tambah_supplier()
  {
    $nama = $this->input->post('nama');
    $tambah = [
      'nama_supplier' => $nama,
      'alamat' => $this->input->post('alamat'),
      'no_kontak' => $this->input->post('no_kontak'),
    ];
    $this->db->insert('supplier', $tambah);
    $this->session->set_flashdata('message', '<div class="tutup alert alert-success" role="alert"> Berhasil menambahkan supplier <b>' . $nama . '</b> </div>');
    redirect('admin/supplier');
  }

  public function beforeDetail($id)
  {
    $flag = ['id_detail' => $id];
    $this->session->set_userdata($flag);
    redirect('admin/detail_user');
  }
  public function detail_user()
  {
    $id = $this->session->userdata('id_detail');
    $data['title'] = 'Managemen User';
    $data['saya_karyawan'] = $this->db->get_where('karyawan', ['id' => $this->session->userdata('id_karyawan')])->row_array();

    $data['detail'] = $this->AdminModal->getDetail($id);
    $data['akses'] = $this->db->get('karyawan_role')->result_array();
    $data['active'] = $this->db->get('active')->result_array();

    $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
    $this->form_validation->set_rules('username', 'Username', 'required|trim');
    $this->form_validation->set_rules('no_hp', 'No_hp', 'required|trim');
    $this->form_validation->set_rules('posisi', 'Posisi', 'required|trim');
    $this->form_validation->set_rules('status', 'Status', 'required|trim');


    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/navbar', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('admin/detail_user', $data);
      $this->load->view('templates/quick_sidebar', $data);
      $this->load->view('templates/footer', $data);
    } else {
      $pass = $this->input->post('pass');
      $idus = $this->input->post('id');
      if ($pass) {
        $edit = [
          'nama' => $this->input->post('nama'),
          'username' => $this->input->post('username'),
          'no_hp' => $this->input->post('no_hp'),
          'role_id' => $this->input->post('posisi'),
          'is_active' => $this->input->post('status'),
          'password' => password_hash($pass, PASSWORD_DEFAULT)
        ];
        $this->db->where('id', $idus);
        $this->db->update('karyawan', $edit);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil di Ubah !</div>');
        redirect('admin/manage_user');
      } else {
        //klo ga masukin pass (ga ganti pass)
        $edit = [
          'nama' => $this->input->post('nama'),
          'username' => $this->input->post('username'),
          'no_hp' => $this->input->post('no_hp'),
          'role_id' => $this->input->post('posisi'),
          'is_active' => $this->input->post('status'),
        ];
        $this->db->where('id', $idus);
        $this->db->update('karyawan', $edit);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil di Ubah !</div>');
        redirect('admin/manage_user');
      }
    }
  }

  public function tambah_user()
  {
    $data['title'] = 'Managemen User';
    $data['saya_karyawan'] = $this->db->get_where('karyawan', ['id' => $this->session->userdata('id_karyawan')])->row_array();
    $data['active'] = $this->db->get('active')->result_array();
    $data['akses'] = $this->db->get('karyawan_role')->result_array();

    $this->form_validation->set_rules('namauser', 'Nama', 'required|trim');
    $this->form_validation->set_rules(
      'username',
      'Username',
      'required|trim|is_unique[karyawan.username]',
      [
        'is_unique'     => 'Username sudah terdaftar!'
      ]
    );
    $this->form_validation->set_rules('status', 'Status User', 'required|trim');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/navbar', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('admin/tambah_user');
      $this->load->view('templates/quick_sidebar', $data);
      $this->load->view('templates/footer', $data);
    } else {
      $nama = $this->input->post('namauser');
      $tambah = [
        'nama' => $this->input->post('namauser'),
        'username' => $this->input->post('username'),
        'jenis_kelamin' => $this->input->post('gender'),
        'no_hp' => $this->input->post('no_hp'),
        'role_id' => $this->input->post('posisi'),
        'is_active' => $this->input->post('status'),
        'password' => password_hash($this->input->post('password2'), PASSWORD_DEFAULT)
      ];
      $this->db->insert('karyawan', $tambah);
      $this->session->set_flashdata('message', '<div class="tutup alert alert-success" role="alert"> Berhasil Menambahkan <b>' . $nama . '</b> </div>');
      redirect('admin/manage_user');
    }
  }

  public function daftar_menu()
  {
    $data['saya_karyawan'] = $this->db->get_where('karyawan', ['id' => $this->session->userdata('id_karyawan')])->row_array();
    $data['kategori'] = $this->AdminModal->getMenu();
    $this->load->view('templates/header', $data);
    $this->load->view('templates/navbar', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('admin/daftar_menu');
    $this->load->view('templates/quick_sidebar', $data);
    $this->load->view('templates/footer', $data);

    // $this->load->view('templates/header');
    // $this->load->view('templates/slidebar');
    // $this->load->view('templates/topbar', $data);
    // $this->load->view('admin/daftar_menu');
    // $this->load->view('templates/footer');
  }

  public function beforeEdit($id)
  {
    $flag = ['id_kategori' => $id];
    $this->session->set_userdata($flag);
    redirect('admin/edit_kategori');
  }

  public function edit_kategori()
  {
    $data['saya_karyawan'] = $this->db->get_where('karyawan', ['id' => $this->session->userdata('id_karyawan')])->row_array();
    $id = $this->session->userdata('id_kategori');
    $data['kategori'] = $this->AdminModal->getKategoriOnly($id);
    $this->form_validation->set_rules('nama', 'Nama', 'required|trim');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header');
      $this->load->view('templates/slidebar');
      $this->load->view('templates/topbar', $data);
      $this->load->view('admin/edit_kategori', $data);
      $this->load->view('templates/footer');
    } else {
      $edit = [
        'nama_kategori' => $this->input->post('nama')
      ];
      $this->db->where('id', $id);
      $this->db->update('kategori', $edit);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kategori Berhasil di Ubah !</div>');
      redirect('admin/daftar_menu');
    }
  }
  public function tambah_kategori()
  {
    $data['saya_karyawan'] = $this->db->get_where('karyawan', ['id' => $this->session->userdata('id_karyawan')])->row_array();
    $this->form_validation->set_rules('nama', 'Nama', 'required|trim');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header');
      $this->load->view('templates/slidebar');
      $this->load->view('templates/topbar', $data);
      $this->load->view('admin/tambah_kategori', $data);
      $this->load->view('templates/footer');

      // $this->load->view('templates/header');
      // $this->load->view('templates/slidebar');
      // $this->load->view('templates/topbar', $data);
      // $this->load->view('admin/tambah_kategori');
      // $this->load->view('templates/footer');
    } else {

      $add = [
        'nama_kategori' => $this->input->post('nama'),
        'kategori_aktif' => 1

      ];
      $this->db->insert('kategori', $add);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kategori Berhasil di tambahkan !</div>');
      redirect('admin/daftar_menu');
    }
  }
  public function before_per_kategori($id)
  {
    $flag = ['id_kategori' => $id];
    $this->session->set_userdata($flag);
    redirect('admin/per_kategori');
  }

  public function per_kategori()
  {
    $data['saya_karyawan'] = $this->db->get_where('karyawan', ['id' => $this->session->userdata('id_karyawan')])->row_array();
    $id = $this->session->userdata('id_kategori');
    $data['kategori'] = $this->AdminModal->getKategori($id);
    $data['kategoriOnly'] = $this->AdminModal->getKategoriOnly($id);

    $this->load->view('templates/header');
    $this->load->view('templates/slidebar');
    $this->load->view('templates/topbar', $data);
    $this->load->view('admin/per_kategori', $data);
    $this->load->view('templates/footer');


    // $this->load->view('templates/header');
    // $this->load->view('templates/slidebar');
    // $this->load->view('templates/topbar', $data);
    // $this->load->view('admin/per_kategori');
    // $this->load->view('templates/footer');
  }

  public function before_edit_per_kategori($id)
  {
    $flag = ['id_menu' => $id];
    $this->session->set_userdata($flag);
    redirect('admin/edit_per_kategori');
  }

  public function edit_per_kategori()
  {
    $data['saya_karyawan'] = $this->db->get_where('karyawan', ['id' => $this->session->userdata('id_karyawan')])->row_array();
    $id = $this->session->userdata('id_menu');
    $data['perKategori'] = $this->AdminModal->getPerKategori($id);
    $data['kategori'] = $this->AdminModal->getKat();

    $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
    $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|trim');
    $this->form_validation->set_rules('kategori', 'Kategori', 'trim');
    $this->form_validation->set_rules('harga', 'Harga', 'required|trim');

    if ($this->form_validation->run() == false) {

      $this->load->view('templates/header');
      $this->load->view('templates/slidebar');
      $this->load->view('templates/topbar', $data);
      $this->load->view('admin/edit_per_kategori');
      $this->load->view('templates/footer');

      // $this->load->view('templates/header');
      // $this->load->view('templates/slidebar');
      // $this->load->view('templates/topbar', $data);
      // $this->load->view('admin/edit_per_kategori');
      // $this->load->view('templates/footer');
    } else {

      $upload = $_FILES['image']['name'];

      if ($upload) {
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size']     = '2048';
        // $config['max_width'] 	= '1024';
        // $config['max_height'] 	= '768';
        $config['upload_path'] = './assets/img_menu/';

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('image')) {

          $new_image = $this->upload->data('file_name');
          $this->db->set('foto', $new_image);
        }
      }

      $edit = [
        'nama_menu' => $this->input->post('nama'),
        'deskripsi' => $this->input->post('deskripsi'),
        'id_kategori' => $this->input->post('kategori'),
        'harga' => $this->input->post('harga'),
      ];
      $this->db->where('id', $id);
      $this->db->update('menu', $edit);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Menu Berhasil di Ubah !</div>');
      redirect('admin/per_kategori');
    }
  }

  public function hapus_barang($id)
  {
    $this->db->where('id', $id);
    $this->db->delete('detail_penjualan');

    $this->session->set_flashdata('message', '<div class="tutup alert alert-success tutup" role="alert">Berhasil Menghapus obat ! </div>');
    redirect('admin/tambahpenjualan');
  }

  public function hapus_karyawan($id)
  {
    $this->db->where('id', $id);
    $this->db->delete('karyawan');

    $this->session->set_flashdata('message', '<div class="tutup alert alert-success" role="alert">Berhasil Menghapus Karyawan</div>');
    redirect('admin/manage_user');
  }
  public function hapus_kategori($id)
  {
    $this->db->where('id', $id);
    $this->db->delete('kategori');

    $this->session->set_flashdata('message', '<div class="tutup alert alert-success" role="alert">Berhasil Menghapus Kategori</div>');
    redirect('admin/daftar_menu');
  }


  public function tambah_per_kategori()
  {
    $data['saya_karyawan'] = $this->db->get_where('karyawan', ['id' => $this->session->userdata('id_karyawan')])->row_array();
    $data['kategori'] = $this->AdminModal->getKat();

    $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
    $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|trim');
    $this->form_validation->set_rules('kategori', 'Kategori', 'trim');
    $this->form_validation->set_rules('harga', 'Harga', 'required|trim');

    if ($this->form_validation->run() == false) {

      $this->load->view('templates/header');
      $this->load->view('templates/slidebar');
      $this->load->view('templates/topbar', $data);
      $this->load->view('admin/tambah_per_kategori');
      $this->load->view('templates/footer');

      // $this->load->view('templates/header');
      // $this->load->view('templates/slidebar');
      // $this->load->view('templates/topbar', $data);
      // $this->load->view('admin/tambah_per_kategori');
      // $this->load->view('templates/footer');
    } else {
      $upload = $_FILES['image']['name'];

      if ($upload) {
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size']     = '2048';
        // $config['max_width'] 	= '1024';
        // $config['max_height'] 	= '768';
        $config['upload_path'] = './assets/img_menu/';

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('image')) {

          $new_image = $this->upload->data('file_name');
          //$this->db->set('foto', $new_image);
        } else {
          echo $this->upload->display_error();
        }
      }

      $add = [
        'nama_menu' => $this->input->post('nama'),
        'deskripsi' => $this->input->post('deskripsi'),
        'id_kategori' => $this->input->post('kategori'),
        'harga' => $this->input->post('harga'),
        'foto' => $new_image
      ];
      $this->db->insert('menu', $add);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil menambahkan menu !</div>');
      redirect('admin/per_kategori');
    }
  }
  public function import_obat()
  {
    $config['upload_path'] = realpath('assets/import_obat/');
    $config['allowed_types'] = 'xlsx|xls|csv';
    $config['max_size'] = '10000';
    $config['encrypt_name'] = true;

    $this->load->library('upload', $config);

    if (!$this->upload->do_upload()) {

      //upload gagal
      $this->session->set_flashdata('message', '<div class="tutup alert alert-danger"><b>PROSES IMPORT GAGAL!</b> ' . $this->upload->display_errors() . '</div>');
      //redirect halaman
      redirect('admin/katalog_obat');
    } else {

      $data_upload = $this->upload->data();

      $excelreader     = new PHPExcel_Reader_Excel2007();
      $loadexcel         = $excelreader->load('assets/import_obat/' . $data_upload['file_name']); // Load file yang telah diupload ke folder excel
      $sheet             = $loadexcel->getActiveSheet()->toArray(null, true, true, true);

      $data = array();

      $numrow = 1;
      foreach ($sheet as $row) {
        if ($numrow > 2) {
          array_push($data, array(
            'nama_obat' => $row['B'],
          ));
        }
        $numrow++;
      }
      $this->db->insert_batch('daftar_obat', $data);
      //delete file from server
      unlink(realpath('assets/import_obat/' . $data_upload['file_name']));

      //upload success
      $this->session->set_flashdata('message', '<div class="tutup alert alert-success"><b>PROSES IMPORT BERHASIL!</b> Data obat berhasil diimport!</div>');
      //redirect halaman
      redirect('admin/katalog_obat');
    }
  }

  public function download_format()
  {
    force_download('assets/master_file/Format_Import_Obat.xlsx', NULL);
  }
}
