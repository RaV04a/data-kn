<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_stock_keeper extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    function id_user(){
        return $this->session->userdata("id_user");
    }
    public function get($tgl = null,$tgl2 = null){
        if ($tgl ==null && $tgl2 == null) {
            $where = "";
        }else{
            $where = "AND a.tgl>='$tgl' AND  a.tgl<='$tgl2'";
        }
        $sql = "
            SELECT a.*,b.no_msk,b.size,b.kw_cap,b.kw_body,b.warna_cap,b.warna_body,b.no_packing,b.no_batch,b.print,b.jumlah,b.jenis_pack FROM tb_stock_keeper a
            LEFT JOIN tb_packing_masuk b ON a.id_pack = b.id_pack
            WHERE a.is_deleted = 0 ORDER BY a.no_msk ASC";
        return $this->db->query($sql);
    }

    public function delete($data)
    {
        $id_user = $this->id_user();
        $sql = "
        DELETE FROM `tb_stock_keeper`
        WHERE `id_pack`='$data[id_pack]'
        ";
        return $this->db->query($sql);
    }

}
