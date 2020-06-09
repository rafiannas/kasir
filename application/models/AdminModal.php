<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class AdminModal extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function getAdmin()
    {
        return $this->db->query("SELECT karyawan.*, active.keterangan, active.warna, karyawan_role.role FROM karyawan,active, karyawan_role
        WHERE karyawan.role_id = karyawan_role.id AND karyawan.is_active = active.id
        ORDER BY karyawan.is_active ASC
        ")->result_array();
    }
    public function getDetail($id)
    {
        return $this->db->query("SELECT karyawan.*, active.keterangan, karyawan_role.role FROM karyawan,active, karyawan_role
        WHERE karyawan.role_id = karyawan_role.id AND karyawan.is_active = active.id AND karyawan.id = $id
        ")->row_array();
    }
    public function getMenu()
    {
        return $this->db->query("SELECT * FROM kategori WHERE kategori_aktif =1")->result_array();
    }
    public function getKategori($id)
    {
        $q = "SELECT kategori.nama_kategori, menu.* FROM kategori, menu
        WHERE kategori.id = menu.id_kategori AND menu.id_kategori = $id
        ";
        return $this->db->query($q)->result_array();
    }
    public function getKategoriOnly($id)
    {
        return $this->db->query("SELECT * FROM kategori WHERE id = $id")->row_array();
    }
    public function getPerKategori($id)
    {
        return $this->db->get_where('menu', ['id' => $id])->row_array();
    }
    public function getKat()
    {
        return $this->db->query("SELECT * FROM kategori WHERE kategori_aktif =1")->result_array();
    }
}
