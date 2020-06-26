<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class ServerModal extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function get()
    {
        $q = "SELECT COUNT(id) as jmh FROM user";
        return $this->db->query($q);
    }
    public function getStatusMasak()
    {
        $q = "SELECT * FROM karyawan";
        return $this->db->query($q);
    }

    public function getPesanan($id)
    {
        $q = "SELECT pesanan.*,karyawan.nama
		FROM pesanan, karyawan
        WHERE pesanan.id = $id
        AND pesanan.server = karyawan.id
        ";
        return $this->db->query($q);
    }

    public function getDetail($id)
    {
        $q = "SELECT * FROM detail_pesanan, menu 
        WHERE id_pesanan = $id
        AND detail_pesanan.id_menu = menu.id";
        return $this->db->query($q);
    }

    public function cekAwal($id)
    {
        $q = "SELECT * FROM penjualan
         WHERE id_status = 1
        AND id_karyawan = $id
        ";
        return $this->db->query($q)->row_array();
    }

    public function cekBarang($obat, $id_pen)
    {
        $q = "SELECT * FROM detail_penjualan
                WHERE id_daftar_obat = '$obat'
                AND id_penjualan = $id_pen
        ";
        return $this->db->query($q)->row_array();
    }

    public function listpenjualan($id)
    {
        $q = "SELECT daftar_obat.nama_obat, detail_penjualan.*
        FROM detail_penjualan, daftar_obat
        WHERE detail_penjualan.id_daftar_obat = daftar_obat.id 
        AND detail_penjualan.id_penjualan = $id
        ";

        return $this->db->query($q)->result_array();
    }

    public function Checkout($id)
    {
        $q = "SELECT * FROM penjualan
            WHERE id_karyawan = $id
            AND id_status
        ";
        return $this->db->query($q)->row_array();
    }


    public function listCheckout($id)
    {
        $q = "SELECT * FROM detail_penjualan
            WHERE id_penjualan = $id
        ";
        return $this->db->query($q)->result_array();
    }

    public function cekMenu($id)
    {
        return $this->db->get_where('menu', ['id' => $id])->row_array();
    }
    public function cekDetPesanan($id)
    {
        return $this->db->get_where('detail_pesanan', ['id' => $id])->row_array();
    }

    //riwayat
    public function riwayat()
    {
        $q = "SELECT pesanan.*, karyawan.nama
        FROM pesanan, karyawan
        WHERE pesanan.server = karyawan.id
        AND pesanan.id_status !=1
        
      
        ";
        return $this->db->query($q)->result_array();
    }

    public function getKonfirmasi($id_pesanan)
    {

        $qu = "SELECT * FROM detail_pesanan, menu 
        WHERE id_pesanan = $id_pesanan
        AND detail_pesanan.id_menu = menu.id
        ";
        return $this->db->query($qu)->result_array();
    }

    //-----------------------------new
    public function getMenuBy($id)
    {
        return $this->db->query("SELECT * FROM menu WHERE id_kategori = $id")->result_array();
    }
}
