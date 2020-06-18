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

    public function getSupplierById($id)
    {
        $query = "SELECT * FROM `supplier` WHERE `supplier`.`id` = $id";
        return $this->db->query($query)->row_array();
    }

    public function getSatuanById($id)
    {
        $query = "SELECT obat_satuan.* 
        FROM `obat_satuan` WHERE `id` = $id";
        return $this->db->query($query)->row_array();
    }

    public function getTipeById($id)
    {
        $query = "SELECT * 
        FROM `obat_tipe` WHERE `id` = $id";
        return $this->db->query($query)->row_array();
    }

    public function getTipe()
    {
        return $this->db->query("SELECT *
        FROM obat_tipe
        ORDER BY tipe ASC")->result_array();
    }

    public function getObatById($id)
    {
        $query = "SELECT daftar_obat.*
        FROM daftar_obat
        where daftar_obat.id = $id";
        return $this->db->query($query)->row_array();
    }

    public function getObat()
    {
        return $this->db->query("SELECT daftar_obat.*
        FROM daftar_obat
        ORDER BY nama_obat ASC")->result_array();
    }

    public function getObatStok()
    {
        return $this->db->query("SELECT stok.*, daftar_obat.nama_obat, obat_satuan.satuan, obat_tipe.tipe
        FROM stok, daftar_obat, obat_satuan, obat_tipe
        where stok.id_daftar_obat = daftar_obat.id
        and obat_satuan.id = stok.id_satuan
        and obat_tipe.id = stok.id_tipe
        ORDER BY nama_obat ASC")->result_array();
    }

    public function getKatalog()
    {
        return $this->db->query("SELECT daftar_obat.*, obat.*, supplier.nama_supplier, obat_tipe.tipe, obat_satuan.satuan
        FROM daftar_obat, obat_tipe, obat, supplier, obat_satuan
        WHERE obat.id_daftar_obat = daftar_obat.id
        AND obat.id_supplier = supplier.id
        AND obat.id_tipe = obat_tipe.id
        AND obat.id_satuan = obat_satuan.id
        ORDER BY nama_obat ASC")->result_array();
    }

    public function getStok()
    {
        return $this->db->query("SELECT  stok.*, daftar_obat.nama_obat, obat_satuan.satuan, obat_tipe.tipe
        FROM stok, daftar_obat, obat_satuan, obat_tipe
        WHERE stok.id_daftar_obat = daftar_obat.id
        AND obat_satuan.id = stok.id_satuan
        AND obat_tipe.id = stok.id_tipe
        ORDER BY nama_obat ASC")->result_array();
    }

    public function getHistori()
    {
        return $this->db->query("SELECT  history_stok.tgl_ubah, history_stok.harga_sebelum, history_stok.harga_sesudah, karyawan.nama, daftar_obat.nama_obat, obat_tipe.tipe, stok.netto, obat_satuan.satuan
        FROM `history_stok`, stok, karyawan, daftar_obat, obat_tipe, obat_satuan
        WHERE history_stok.id_stok = stok.id
        AND karyawan.id = history_stok.id_karyawan
        AND daftar_obat.id = stok.id_daftar_obat
        AND obat_tipe.id = stok.id_tipe
        AND obat_satuan.id = stok.id_satuan")->result_array();
    }

    public function getStokById($id)
    {
        return $this->db->query("SELECT  stok.*, daftar_obat.nama_obat, obat_satuan.satuan, obat_tipe.tipe
        FROM stok, daftar_obat, obat_satuan, obat_tipe
        WHERE stok.id_daftar_obat = daftar_obat.id
        AND obat_satuan.id = stok.id_satuan
        AND obat_tipe.id = stok.id_tipe
        AND stok.id = $id
        ORDER BY nama_obat ASC")->row_array();
    }

    public function getKeyword($title)
    {
        $q = "SELECT obat.*, obat_satuan.satuan
        FROM obat, obat_satuan
        WHERE obat_satuan.id = obat.id_satuan
        AND nama_obat LIKE '%$title%'
        ";

        return $this->db->query($q)->result();

        // $this->db->like('nama_obat', $title);
        // return $this->db->get('obat')->result();

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
