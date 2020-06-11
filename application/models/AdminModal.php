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

    public function getSupplier()
    {
        return $this->db->query("SELECT *
        FROM supplier
        ORDER BY nama_supplier ASC")->result_array();
    }

    public function getObat()
    {
        return $this->db->query("SELECT obat.*, obat_satuan.satuan
        FROM obat, obat_satuan
        where obat.id_satuan = obat_satuan.id
        ORDER BY nama_obat ASC")->result_array();
    }

    // public function getKeyword($title)
    // {
    //     $this->db->select('*');
    //     $this->db->from('obat');
    //     $this->db->like('nama_obat', $title, 'both');
    //     $this->db->order_by('nama_obat', 'asc');
    //     $this->db->limit(10);
    //     return $this->db->get('obat')->result();
    // }

    public function getKeyword($title)
    {

        $this->db->like('nama_obat', $title);
        return $this->db->get('obat')->result();
    }

    // $this->db->select('barang.*, toko.nama_toko');
    // $this->db->from('barang');
    // $this->db->join('toko', 'toko.id = barang.id_toko');
    // $this->db->like('barang.nama_barang', $keyword);
    // $this->db->or_like('toko.nama_toko', $keyword);
    // return $this->db->get()->result();

    // public function harga_obat($id_obat)
    // {
    //     $this->db->where('id', $id_obat);
    //     $query = $this->db->get('obat');
    //     foreach ($query->result() as $k) {
    //         $output =  $k->harga_beli;
    //     }
    //     return $output;
    // }

    public function kabupaten($id_prov)
    {
        $this->db->where('id_prov', $id_prov);
        $this->db->order_by('kabupaten.nama', 'ASC');
        $query = $this->db->get('kabupaten');
        $output = '<option value="">Pilih Kabupaten/Kota</option>';
        foreach ($query->result() as $k) {
            $output .= '<option value="' . $k->id_kab . '">' . $k->nama . '</option>';
        }
        return $output;
    }

    public function getSatuan()
    {
        return $this->db->query("SELECT *
        FROM obat_satuan
        ORDER BY satuan ASC")->result_array();
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
