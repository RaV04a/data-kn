<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_customer extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    function id_user()
    {
        return $this->session->userdata("id_user");
    }
    public function get($id = null)
    {
        // $kode_user = $this->kode_user();
        $sql = "SELECT * FROM tb_customer WHERE is_deleted = 0 ORDER BY created_at ASC";

        return $this->db->query($sql);
    }

    public function add($data)
    {
        $id_user = $this->id_user();
        $sql = "
        INSERT INTO `tb_customer`( `kode_customer`, `nama_customer`, `negara`, `alamat`, `created_at`, `created_by`, `updated_at`, `updated_by`, `is_deleted`) 
        VALUES ('$data[kode_customer]','$data[nama_customer]','$data[negara]','$data[alamat]',NOW(),'$id_user','0000-00-00 00:00:00','','0')
        ";

        return $this->db->query($sql);
    }
    public function update($data)
    {
        $id_user = $this->id_user();
        $sql = "
            UPDATE `tb_customer` 
            SET `kode_customer`='$data[kode_customer]',`nama_customer`='$data[nama_customer]',`negara`='$data[negara]',`alamat`='$data[alamat]',`updated_at`=NOW(),`updated_by`='$id_user' 
            WHERE `id_customer`='$data[id_customer]'
        ";
        return $this->db->query($sql);
        // return $sql;
    }


    public function delete($data)
    {
        $id_user = $this->id_user();
        $sql = "
        DELETE FROM `tb_customer`
        WHERE `id_customer`='$data[id_customer]'
        ";
        return $this->db->query($sql);
    }

    public function cek_kode_customer($kode_customer){
        $sql = "
            SELECT COUNT(a.kode_customer) count_sj FROM tb_customer a
            WHERE a.kode_customer = '$kode_customer' AND a.is_deleted = 0";
        return $this->db->query($sql);
    }
}
