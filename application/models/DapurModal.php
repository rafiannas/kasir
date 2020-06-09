<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class DapurModal extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function getDapur()
    {
        $q = "SELECT pesanan.*, `status2`.`ket`,`status2`.`class2`, `status2`.`simbol2` FROM pesanan, `status2` WHERE pesanan.id_status2 <> 3
        AND pesanan.id_status2 = `status2`.`id`   
        ORDER BY id DESC
        ";
        return $this->db->query($q);
    }

    public function getRiwayatMasakan()
    {
        $q = "SELECT pesanan.*, `status2`.`ket`,`status2`.`class2`, `status2`.`simbol2` FROM pesanan, `status2` WHERE pesanan.id_status2 = 3
        AND pesanan.id_status2 = `status2`.`id`   
        ORDER BY id DESC
        ";
        return $this->db->query($q);
    }



    public function getDetail($id)
    {
        $q = "SELECT detail_pesanan.*, menu.nama_menu FROM detail_pesanan, menu WHERE id_pesanan = $id
        AND detail_pesanan.id_menu = menu.id";
        return $this->db->query($q);
    }
    public function getGanti($id)
    {
        $q = "SELECT pesanan.*, status2.ket FROM pesanan, status2
        WHERE pesanan.id = $id AND
        pesanan.id_status2 = status2.id 
        
        ";
        return $this->db->query($q);
    }
}
