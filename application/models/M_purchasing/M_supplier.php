<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_supplier extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    function id_user(){
        return $this->session->userdata("id_user");
    }
    public function get($id = null){
        // $kode_user = $this->kode_user();
        $sql = "SELECT * FROM tb_supplier WHERE is_deleted = 0 ORDER BY created_at ASC";

        return $this->db->query($sql);
    }

    public function add($data)
    {
        $id_user = $this->id_user();
        $sql = "
        INSERT INTO `tb_supplier`( `kode_supplier`, `nama_supplier`, `negara`, `alamat`, `created_at`, `created_by`, `updated_at`, `updated_by`, `is_deleted`) 
        VALUES ('$data[kode_supplier]','$data[nama_supplier]','$data[negara]','$data[alamat]',NOW(),'$id_user','0000-00-00 00:00:00','','0')
        ";

        return $this->db->query($sql);
    }
    public function update($data)
    {
        $id_user = $this->id_user();
        $sql = "
            UPDATE `tb_supplier` 
            SET `kode_supplier`='$data[kode_supplier]',`nama_supplier`='$data[nama_supplier]',`negara`='$data[negara]',`alamat`='$data[alamat]',`updated_at`=NOW(),`updated_by`='$id_user' 
            WHERE `id_supplier`='$data[id_supplier]'
        ";
        return $this->db->query($sql);
        // return $sql;
    }


    public function delete($data)
    {
        $id_user = $this->id_user();
        $sql = "
        DELETE FROM `tb_supplier`
        WHERE `id_supplier`='$data[id_supplier]'
        ";
        return $this->db->query($sql);
    }

    public function cek_kode_supplier($kode_supplier){
        $sql = "
            SELECT COUNT(a.kode_supplier) count_sj FROM tb_supplier a
            WHERE a.kode_supplier = '$kode_supplier' AND a.is_deleted = 0";
        return $this->db->query($sql);
    }
}
