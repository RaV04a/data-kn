<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_auth extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    function kode_user(){
        return $this->session->userdata("kode_user");
    }
    public function check($data){
        // $kode_user = $this->kode_user();
        $sql = "SELECT COUNT(id_user) AS c FROM tb_user WHERE username='$data[username]' AND password='$data[password]'";

        return $this->db->query($sql);
    }
    public function data($data){
        // $kode_user = $this->kode_user();
        $sql = "SELECT * FROM tb_user WHERE username='$data[username]' AND password='$data[password]'";
        return $this->db->query($sql);
    }

    // public function add($data)
    // {

    //     $sql = "
    //     INSERT INTO `tb_supplier`( `kode_supplier`, `nama_supplier`, `phone`, `alamat`, `created_at`, `created_by`, `updated_at`, `updated_by`, `is_deleted`) 
    //     VALUES ('$data[kode]','$data[nama]','$data[phone]','$data[alamat]',NOW(),'1','0000-00-00 00:00:00','','0')
    //     ";

    //     return $this->db->query($sql);
    // }


    // public function del($id)
    // {
    //     $this->db->where('idsupplier', $id);
    //     $this->db->delete('supplier');
    // }


}
