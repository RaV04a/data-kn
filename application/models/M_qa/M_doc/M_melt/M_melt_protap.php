<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_melt_protap extends CI_Model
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
        SELECT * FROM tb_doc_melt WHERE jenis_doc_melt IN ('Protap')
        ";
        
        return $this->db->query($sql);
    }
        
    public function add($data)
    {
        $id_user = $this->id_user();
        $sql = "
        INSERT INTO `tb_doc_melt`(`jenis_doc_melt`, `nama_doc_melt`, `tgl_berlaku`, `tgl_review`, `created_at`, `created_by`, `updated_at`, `updated_by`, `is_deleted`) 
        VALUES ('Protap','$data[nama_doc_melt]','$data[tgl_berlaku]','$data[tgl_review]','NOW()','$id_user','0000-00-00 00:00:00','$id_user','0')
        ";

        return $this->db->query($sql);
    }

    public function update($data)
    {
        $id_user = $this->id_user();
        $sql = "
            UPDATE `tb_doc_melt` 
            SET `jenis_doc_melt`='$data[jenis_doc_melt]',
                `nama_doc_melt`='$data[nama_doc_melt]',
                `tgl_berlaku`='$data[tgl_berlaku]',
                `tgl_review`='$data[tgl_review]',
                `updated_at`= NOW(),`updated_by`='$id_user' 
            WHERE `id_doc_melt`='$data[id_doc_melt]'
        ";
        return $this->db->query($sql);
    }


    public function delete($data)
    {
        $id_user = $this->id_user();
        $sql = "
        DELETE FROM `tb_doc_melt`
         WHERE `id_doc_melt`='$data[id_doc_melt]'
        ";
        return $this->db->query($sql);
    }
}
