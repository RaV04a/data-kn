<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_frm_tabel extends CI_Model
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
        SELECT * FROM tb_doc_frm WHERE jenis_doc_frm IN ('Tabel')
        ";
        
        return $this->db->query($sql);
    }
        
    public function add($data)
    {
        $id_user = $this->id_user();
        $sql = "
        INSERT INTO `tb_doc_frm`(`jenis_doc_frm`, `nama_doc_frm`, `tgl_berlaku`, `tgl_review`, `created_at`, `created_by`, `updated_at`, `updated_by`, `is_deleted`) 
        VALUES ('Tabel','$data[nama_doc_frm]','$data[tgl_berlaku]','$data[tgl_review]','NOW()','$id_user','0000-00-00 00:00:00','$id_user','0')
        ";

        return $this->db->query($sql);
    }

    public function update($data)
    {
        $id_user = $this->id_user();
        $sql = "
            UPDATE `tb_doc_frm` 
            SET `jenis_doc_frm`='$data[jenis_doc_frm]',
                `nama_doc_frm`='$data[nama_doc_frm]',
                `tgl_berlaku`='$data[tgl_berlaku]',
                `tgl_review`='$data[tgl_review]',
                `updated_at`= NOW(),`updated_by`='$id_user' 
            WHERE `id_doc_frm`='$data[id_doc_frm]'
        ";
        return $this->db->query($sql);
    }


    public function delete($data)
    {
        $id_user = $this->id_user();
        $sql = "
        DELETE FROM `tb_doc_frm`
         WHERE `id_doc_frm`='$data[id_doc_frm]'
        ";
        return $this->db->query($sql);
    }
}
