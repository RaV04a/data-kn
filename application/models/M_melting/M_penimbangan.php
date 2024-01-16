<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_penimbangan extends CI_Model
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
        // LEFT JOIN tb_melting_masuk c ON a.id_barang = c.id_barang
        $sql = "
        SELECT a.*,b.no_transfer_slip,c.nama_barang,d.nama_alat FROM tb_penimbangan a
        LEFT JOIN tb_melting_masuk b ON a.id_mm = b.id_mm
        LEFT JOIN tb_barang c ON b.id_barang = c.id_barang
        LEFT JOIN tb_alat_kalibrasi d ON a.id_kalibrasi = d.id_kalibrasi
        WHERE a.is_deleted = 0 ORDER BY a.tgl_timbang ASC";

        return $this->db->query($sql);
    }

    public function add($data)
    {
        $id_user = $this->id_user();
        $sql = "
        INSERT INTO `tb_penimbangan`(`id_mm`, `id_kalibrasi`,`id_ts_melt`, `qty_dibutuhkan`,`qty_ditimbang`,`tgl_timbang`,`label_kebersihan`,`label_kalibrasi`,`op_penimbangan`,`suhu_ruangan`,`kelembapan_ruangan`,`kebersihan_ruangan`,`created_at`, `created_by`, `updated_at`, `updated_by`, `is_deleted`) 
        VALUES ('$data[id_mm]','$data[id_kalibrasi]','$data[id_transaksi]','$data[qty_dibutuhkan]','$data[qty_ditimbang]','$data[tgl_timbang]','$data[label_kebersihan]','$data[label_kalibrasi]','$data[op_penimbangan]','$data[suhu_ruangan]','$data[kelembapan_ruangan]','$data[kebersihan_ruangan]',NOW(),'$id_user','0000-00-00 00:00:00','','0')
        ";

        return $this->db->query($sql);
    }
    public function update($data)
    {
        $id_user = $this->id_user();
        $sql = "
            UPDATE `tb_penimbangan` 
            SET `id_mm`='$data[id_mm]',
                `id_kalibrasi`='$data[id_kalibrasi]',
                `qty_dibutuhkan`='$data[qty_dibutuhkan]',
                `qty_ditimbang`='$data[qty_ditimbang]',
                `tgl_timbang`='$data[tgl_timbang]',
                `label_kebersihan`='$data[label_kebersihan]',
                `label_kalibrasi`='$data[label_kalibrasi]',
                `op_penimbangan`='$data[op_penimbangan]',
                `suhu_ruangan`='$data[suhu_ruangan]',
                `kelembapan_ruangan`='$data[kelembapan_ruangan]',
                `kebersihan_ruangan`='$data[kebersihan_ruangan]',
                `updated_at`= NOW(),`updated_by`='$id_user' 
            WHERE `id_penimbangan`='$data[id_penimbangan]'
        ";
        return $this->db->query($sql);
    }

    public function qty_penimbangan($data)
    {
        $sql = "
        SELECT sum(qty_dibutuhkan) tot_dibutuhkan FROM `tb_penimbangan`
        WHERE id_mm = '$data[id_mm]' AND is_deleted = 0 ORDER BY tgl_timbang ASC";

        return $this->db->query($sql);
    }

    public function delete($id_ts_melt)
    {
        $id_user = $this->id_user();
        $sql = "
        DELETE FROM `tb_penimbangan`
         WHERE `id_ts_melt`='$id_ts_melt'
        ";
        return $this->db->query($sql);
    }
}
