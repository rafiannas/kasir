<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();

    //cek_login();

    $this->load->library('form_validation');
    $this->load->model('AdminModal');
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

    // $this->load->view('templates/header');
    // $this->load->view('templates/slidebar');
    // $this->load->view('templates/topbar', $data);
    // $this->load->view('admin/home_ad');
    // $this->load->view('templates/footer');
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
    $data['status'] = $this->db->get('karyawan_role')->result_array();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/navbar', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('admin/manage_user', $data);
    $this->load->view('templates/quick_sidebar', $data);
    $this->load->view('templates/footer', $data);
  }

  public function dataobat()
  {
    $data['title'] = 'Data Obat';
    $data['saya_karyawan'] = $this->db->get_where('karyawan', ['id' => $this->session->userdata('id_karyawan')])->row_array();
    $data['dataobat'] = $this->AdminModal->getObat();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/navbar', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('admin/data_obat', $data);
    $this->load->view('templates/quick_sidebar', $data);
    $this->load->view('templates/footer', $data);
  }

  public function tambahobat()
  {
    $data['title'] = 'Data Obat';
    $data['saya_karyawan'] = $this->db->get_where('karyawan', ['id' => $this->session->userdata('id_karyawan')])->row_array();
    $data['satuanobat'] = $this->AdminModal->getSatuan();

    $this->form_validation->set_rules('namaobat', 'Nama Obat', 'required|trim');
    $this->form_validation->set_rules('hargabeli', 'Harga Beli', 'required|trim');
    $this->form_validation->set_rules('hargajual', 'Harga Jual', 'trim');
    $this->form_validation->set_rules('minstok', 'Minimal Stok', 'trim');
    $this->form_validation->set_rules('satuan', 'Satuan Obat', 'required|trim');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/navbar', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('admin/tambah_obat', $data);
      $this->load->view('templates/quick_sidebar', $data);
      $this->load->view('templates/footer', $data);
    } else {
      $obat = $this->input->post('namaobat');
      $tambah = [
        'id_satuan' => $this->input->post('satuan'),
        'nama_obat' => $obat,
        'harga_beli' => $this->input->post('hargabeli'),
        'harga_jual' => $this->input->post('hargajual'),
        'minimum_stok' => $this->input->post('minstok'),
      ];
      $this->db->insert('obat', $tambah);
      $this->session->set_flashdata('message', '<div class="tutup alert alert-success" role="alert"> Berhasil menambahkan obat <b>' . $obat . '</b> </div>');
      redirect('admin/dataobat');
    }
  }

  public function datasatuan()
  {
    $data['title'] = 'Data Obat';
    $data['saya_karyawan'] = $this->db->get_where('karyawan', ['id' => $this->session->userdata('id_karyawan')])->row_array();
    $data['obatsatuan'] = $this->AdminModal->getSatuan();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/navbar', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('admin/data_satuan', $data);
    $this->load->view('templates/quick_sidebar', $data);
    $this->load->view('templates/footer', $data);
  }

  public function pembelian()
  {
    $data['title'] = 'Pembelian';
    $data['saya_karyawan'] = $this->db->get_where('karyawan', ['id' => $this->session->userdata('id_karyawan')])->row_array();
    $data['supplier'] = $this->AdminModal->getSupplier();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/navbar', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('admin/pembelian', $data);
    $this->load->view('templates/quick_sidebar', $data);
    $this->load->view('templates/footer', $data);
  }


  function get_autocomplete()
  {
    if (isset($_GET['term'])) {
      $result = $this->AdminModal->getKeyword($_GET['term']);
      if (count($result) > 0) {
        foreach ($result as $row)
          $result_array[] = array(
            'label' => $row->nama_obat,
            'hargabeli' => $row->harga_beli,
            // 'satuan' => strtoupper($row->satuan)
          );
        echo json_encode($result_array);
      }
    }
  }

  public function tambahpembelian()
  {
    $data['title'] = 'Pembelian';
    $data['saya_karyawan'] = $this->db->get_where('karyawan', ['id' => $this->session->userdata('id_karyawan')])->row_array();
    $data['supplier'] = $this->AdminModal->getSupplier();
    $data['dataobat'] = $this->AdminModal->getObat();

    if (isset($_GET['term'])) {
      $result = $this->AdminModel->getKeyword($_GET['term']);
      if (count($result) > 0) {
        foreach ($result as $row)
          $result_array[] = array(
            'hargabeli' => $row->harga_beli,
            'satuan' => strtoupper($row->satuan)
          );
        echo json_encode($result_array);
      }
    }

    $this->load->view('templates/header', $data);
    $this->load->view('templates/navbar', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('admin/tambah_pembelian', $data);
    $this->load->view('templates/quick_sidebar', $data);
    $this->load->view('templates/footer', $data);
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

  public function tambah_satuan()
  {
    $nama = $this->input->post('satuan');
    $tambah = [
      'satuan' => $nama,
    ];
    $this->db->insert('obat_satuan', $tambah);
    $this->session->set_flashdata('message', '<div class="tutup alert alert-success" role="alert"> Berhasil menambahkan satuan <b>' . $nama . '</b> </div>');
    redirect('admin/dataobat');
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
    $data['status'] = $this->db->get('karyawan_role')->result_array();
    $data['active'] = $this->db->get('active')->result_array();

    $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
    $this->form_validation->set_rules('no_hp', 'No_hp', 'required|trim');
    $this->form_validation->set_rules('password', 'Password', 'trim');
    $this->form_validation->set_rules('password1', 'Password1', 'trim');
    $this->form_validation->set_rules('posisi', 'Posisi', 'required|trim');
    $this->form_validation->set_rules('is_active', 'Is_active', 'required|trim');


    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/navbar', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('admin/detail_user', $data);
      $this->load->view('templates/quick_sidebar', $data);
      $this->load->view('templates/footer', $data);
    } else {

      $q_role = $this->db->get_where('karyawan_role', ['role' => $this->input->post('posisi')])->row_array();
      $q_active = $this->db->get_where('active', ['keterangan' => $this->input->post('is_active')])->row_array();

      $pass_lama = $this->input->post('password');
      $pass_lama1 = $data['detail']['password'];
      $pass_baru = $this->input->post('password1');
      if ($pass_lama) {
        if (!$pass_baru) {
          $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Pasword Baru Harus di Isi !</div>');
          redirect('admin/detail');
        }
        //klo masukin password lama (ganti pass)
        if (password_verify($pass_lama, $pass_lama1)) {
          $edit = [
            'nama' => $this->input->post('nama'),
            'no_hp' => $this->input->post('no_hp'),
            'role_id' => $q_role['id'],
            'is_active' => $q_active['id'],
            'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT)
          ];
          $this->db->where('id', $id);
          $this->db->update('karyawan', $edit);
          $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil di Ubah !</div>');
          redirect('admin/daftar_karyawan');
        } else {
          //klo pass ga sama dgn yg lama
          $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Pasword Lama Salah !</div>');
          redirect('admin/detail');
        }
      } else {
        //klo ga masukin pass (ga ganti pass)
        $edit = [
          'nama' => $this->input->post('nama'),
          'no_hp' => $this->input->post('no_hp'),
          'role_id' => $q_role['id'],
          'is_active' => $q_active['id'],
        ];
        $this->db->where('id', $id);
        $this->db->update('karyawan', $edit);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil di Ubah !</div>');
        redirect('admin/daftar_karyawan');
      }
    }
  }
  public function tambah_karyawan()
  {
    $data['saya_karyawan'] = $this->db->get_where('karyawan', ['id' => $this->session->userdata('id_karyawan')])->row_array();
    $data['active'] = $this->db->get('active')->result_array();
    $data['status'] = $this->db->get('karyawan_role')->result_array();

    $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
    $this->form_validation->set_rules(
      'username',
      'Username',
      'required|trim|is_unique[karyawan.username]',
      [
        'is_unique'     => 'Username sudah dipakai !'
      ]
    );
    $this->form_validation->set_rules('no_hp', 'No_hp', 'required|trim');
    $this->form_validation->set_rules('password', 'Password', 'required|trim');
    $this->form_validation->set_rules('posisi', 'Posisi', 'required|trim');
    $this->form_validation->set_rules('is_active', 'Is_active', 'required|trim');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/navbar', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('admin/tambah_karyawan');
      $this->load->view('templates/quick_sidebar', $data);
      $this->load->view('templates/footer', $data);

      // $this->load->view('templates/header');
      // $this->load->view('templates/slidebar');
      // $this->load->view('templates/topbar', $data);
      // $this->load->view('admin/tambah_karyawan');
      // $this->load->view('templates/footer');
    } else {

      $tambah = [
        'nama' => $this->input->post('nama'),
        'username' => $this->input->post('username'),
        'no_hp' => $this->input->post('no_hp'),
        'role_id' => $this->input->post('posisi'),
        'is_active' => $this->input->post('is_active'),
        'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT)
      ];
      $this->db->insert('karyawan', $tambah);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Berhasil Menambahkan Karyawan !</div>');
      redirect('admin/daftar_karyawan');
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

  public function hapus_per_kategori($id)
  {
    $this->db->where('id', $id);
    $this->db->delete('menu');

    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Menghapus kategori</div>');
    redirect('admin/per_kategori');
  }
  public function hapus_karyawan($id)
  {
    $this->db->where('id', $id);
    $this->db->delete('karyawan');

    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Menghapus Karyawan</div>');
    redirect('admin/daftar_karyawan');
  }
  public function hapus_kategori($id)
  {
    $this->db->where('id', $id);
    $this->db->delete('kategori');

    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Menghapus Kategori</div>');
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
}
