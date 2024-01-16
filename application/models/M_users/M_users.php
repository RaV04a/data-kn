<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_users extends CI_Model
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
        $sql = "SELECT * FROM tb_user WHERE is_deleted = 0 ORDER BY nama_operator ASC";

        return $this->db->query($sql);
    }

    public function add($data)
    {
        $id_user = $this->id_user();
        $sql = "
        INSERT INTO `tb_user`(`username`, `password`, `nama_operator`, `level`,`jabatan`,`alamat`, `created_at`, `created_by`, `updated_at`, `updated_by`, `is_deleted`) 
        VALUES ('$data[username]','$data[password]','$data[nama_operator]','$data[level]','$data[jabatan]','$data[alamat]',NOW(),'$id_user','0000-00-00 00:00:00','','0')
        ";

        return $this->db->query($sql);
    }
    public function update($data)
    {
        $id_user = $this->id_user();
        $sql = "

            UPDATE `tb_user` SET 
            `username`='$data[username]',
            `password`='$data[password]',
            `nama_operator`='$data[nama_operator]',
            `alamat`='$data[alamat]',
            `level`='$data[level]',
            `jabatan`='$data[jabatan]',
            `updated_at`= NOW(),
            `updated_by`='$id_user' 
            WHERE `id_user`='$data[id_user]'
        ";
        return $this->db->query($sql);
        // return $sql;
    }


    public function delete($data)
    {
        $id_user = $this->id_user();
        $sql = "
        DELETE FROM `tb_user`
        WHERE `id_user`='$data[id_user]'
        ";
        return $this->db->query($sql);
    }
    public function ganti_password($data)
    {
        $id_user = $this->id_user();
        $password = md5($data['password_baru']);
        $sql = "
            UPDATE `tb_user`
            SET `password`='$password',`updated_at`= NOW(),`updated_by`='$id_user' 
            WHERE `id_user`='$data[id_user]'
        ";
        return $this->db->query($sql);
    }
}
