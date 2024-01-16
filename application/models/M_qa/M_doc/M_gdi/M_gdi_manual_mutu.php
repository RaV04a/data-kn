<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_gdi_manual_mutu extends CI_Model
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
        $sql = "
        SELECT * FROM tb_doc_gdi WHERE jenis_doc_gdi IN ('Manual Mutu')
        ";
        
        return $this->db->query($sql);
    }
        
    public function add($data)
    {
        $id_user = $this->id_user();
        $sql = "
        INSERT INTO `tb_doc_gdi`(`jenis_doc_gdi`, `nama_doc_gdi`, `tgl_berlaku`, `tgl_review`, `created_at`, `created_by`, `updated_at`, `updated_by`, `is_deleted`) 
        VALUES ('Manual Mutu','$data[nama_doc_gdi]','$data[tgl_berlaku]','$data[tgl_review]','NOW()','$id_user','0000-00-00 00:00:00','$id_user','0')
        ";

        return $this->db->query($sql);
    }

    public function update($data)
    {
        $id_user = $this->id_user();
        $sql = "
            UPDATE `tb_doc_gdi` 
            SET `jenis_doc_gdi`='$data[jenis_doc_gdi]',
                `nama_doc_gdi`='$data[nama_doc_gdi]',
                `tgl_berlaku`='$data[tgl_berlaku]',
                `tgl_review`='$data[tgl_review]',
                `updated_at`= NOW(),`updated_by`='$id_user' 
            WHERE `id_doc_gdi`='$data[id_doc_gdi]'
        ";
        return $this->db->query($sql);
    }


    public function delete($data)
    {
        $id_user = $this->id_user();
        $sql = "
        DELETE FROM `tb_doc_gdi`
         WHERE `id_doc_gdi`='$data[id_doc_gdi]'
        ";
        return $this->db->query($sql);
    }
}
