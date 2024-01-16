<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_alat_kalibrasi extends CI_Model
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
        $sql = "
        SELECT a.* FROM tb_alat_kalibrasi a
        WHERE a.is_deleted = 0 ORDER BY a.tgl_kalibrasi ASC";

        return $this->db->query($sql);
    }

    public function add($data)
    {
        $id_user = $this->id_user();
        $sql = "
        INSERT INTO `tb_alat_kalibrasi`(`kode_alat`, `nama_alat`, `no_sertif`, `tgl_kalibrasi`,`ed_kalibrasi`, `created_at`, `created_by`, `updated_at`, `updated_by`, `is_deleted`) 
        VALUES ('$data[kode_alat]','$data[nama_alat]','$data[no_sertif]','$data[tgl_kalibrasi]','$data[ed_kalibrasi]',NOW(),'$id_user','0000-00-00 00:00:00','','0')
        ";

        return $this->db->query($sql);
    }

    public function update($data)
    {
        $id_user = $this->id_user();
        $sql = "
            UPDATE `tb_alat_kalibrasi` 
            SET `kode_alat`='$data[kode_alat]',
                `nama_alat`='$data[nama_alat]',
                `no_sertif`='$data[no_sertif]',
                `tgl_kalibrasi`='$data[tgl_kalibrasi]',
                `ed_kalibrasi`='$data[ed_kalibrasi]',
                `updated_at`= NOW(),`updated_by`='$id_user' 
            WHERE `id_kalibrasi`='$data[id_kalibrasi]'
        ";
        return $this->db->query($sql);
    }

    public function delete($data)
    {
        $id_user = $this->id_user();
        $sql = "
        DELETE FROM `tb_alat_kalibrasi`
         WHERE `id_kalibrasi`='$data[id_kalibrasi]'
        ";
        return $this->db->query($sql);
    }
}
