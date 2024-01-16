<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_compressor extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    function id_user()
    {
        return $this->session->userdata("id_user");
    }
    public function get($tgl = null, $tgl2 = null, $name = null)
    {
        if ($tgl != null && $tgl2 != null) {
            $tgl = explode("/", $tgl);
            $tgl = "$tgl[2]-$tgl[1]-$tgl[0]";
            $tgl2 = explode("/", $tgl2);
            $tgl2 = "$tgl2[2]-$tgl2[1]-$tgl2[0]";
            $where[] = "WHERE tgl >= '$tgl' AND tgl <= '$tgl2'";
        } else {
            $where = "WHERE jenis_mesin = 'COMPRESSOR'";
        }
        if ($name) {
            $where[] = "AND nama_mesin = '$name'";

            $where = implode(" ", $where);
        }

        $sql = "SELECT * FROM tb_hm_utility $where ORDER BY tgl ASC";

        return $this->db->query($sql)->result_array();
    }

    public function add($data)
    {
        $id_user = $this->id_user();
        $sql = "
        INSERT INTO `tb_hm_utility`(`tgl`, `nama_mesin`, `jenis_mesin`, `masalah`, `penyebab`, `tindakan`, `nama_operator`, `created_at`, `created_by`, `updated_at`, `updated_by`, `is_deleted`) 
        VALUES ('$data[tgl]','$data[nama_mesin]','$data[jenis_mesin]','$data[masalah]','$data[penyebab]','$data[tindakan]','$data[nama_operator]','NOW()','$id_user','0000-00-00 00:00:00','','0')
        ";

        return $this->db->query($sql);
    }
    public function update($data)
    {
        $id_user = $this->id_user();
        $sql = "
            UPDATE `tb_hm_utility` 
            SET `tgl`='$data[tgl]',
                `nama_mesin`='$data[nama_mesin]',
                `jenis_mesin`='$data[jenis_mesin]',
                `masalah`='$data[masalah]',
                `penyebab`='$data[penyebab]',
                `tindakan`='$data[tindakan]',
                `updated_at`=NOW(),`updated_by`='$id_user' 
            WHERE `id_hmu`='$data[id_hmu]'
        ";
        return $this->db->query($sql);
    }


    public function delete($data)
    {
        $id_user = $this->id_user();
        $sql = "
        DELETE FROM `tb_hm_utility`
         WHERE `id_hmu`='$data[id_hmu]'
        ";
        return $this->db->query($sql);
    }

    public function ambil_label()
    {
        $sql = "
        SELECT a.* FROM tb_hm_utility a
            WHERE a.is_deleted = 0 ORDER BY a.tgl ASC";
        return $this->db->query($sql);
    }
}
