<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class KasirModal extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function getkasirNow()
    {
        $q = "SELECT pesanan.*, `status`.`simbol`,`status`.`keterangan`,`status`.`class` 
         FROM pesanan, `status` 
         WHERE pesanan.id_status =2
        AND pesanan.id_status = `status`.`id`   
        ORDER BY id DESC
        ";
        return $this->db->query($q);
    }
    public function getkasirDone()
    {
        $q = "SELECT pesanan.*, `status`.`simbol`,`status`.`keterangan`,`status`.`class`  FROM pesanan, `status` WHERE pesanan.id_status = 3
        AND pesanan.id_status = `status`.`id`   
        ORDER BY id DESC
        ";
        return $this->db->query($q);
    }

    public function getDetail($id)
    {
        $q = "SELECT * FROM detail_pesanan, menu WHERE id_pesanan = $id
        AND detail_pesanan.id_menu = menu.id";
        return $this->db->query($q);
    }
    public function getGantiKs($id)
    {
        $q = "SELECT pesanan.*, `status`.`keterangan` FROM pesanan, `status` WHERE
        pesanan.id_status = `status`.`id` AND
        pesanan.id = $id
        ";

        return $this->db->query($q);
    }
}
