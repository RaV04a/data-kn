<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_karantina extends CI_Model
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
            SELECT a.*,b.nama_supplier,c.kode_barang,c.nama_barang,c.satuan,c.qty_pack FROM tb_pemeriksaan_bahan a
            LEFT JOIN tb_supplier b ON a.id_supplier = b.id_supplier
            LEFT JOIN tb_barang c ON a.id_barang = c.id_barang
            WHERE a.is_deleted = 0 ORDER BY a.tgl ASC";
        return $this->db->query($sql);
    }

    public function add($data)
    {
        $id_user = $this->id_user();
        $sql = "
        INSERT INTO `tb_pemeriksaan_bahan`(`no_batch`,`no_surat_jalan`, `tgl`, `id_barang`, `id_supplier`, `nama_operator`, `dok_pendukung`, `jenis_kemasan`, `jml_kemasan`, `tutup`, `wadah`, `label`, `qty`,`exp`, `mfg`,`status`,`created_at`, `created_by`, `updated_at`, `updated_by`, `is_deleted`) 
        VALUES ('$data[no_batch]','$data[no_surat_jalan]','$data[tgl]','$data[id_barang]','$data[id_supplier]','$data[nama_operator]','$data[dok_pendukung]','$data[jenis_kemasan]','$data[jml_kemasan]','$data[tutup]','$data[wadah]','$data[label]','$data[qty]','$data[exp]','$data[mfg]','New',NOW(),'$id_user','0000-00-00 00:00:00','','0')
        ";
        return $this->db->query($sql);
    }
    public function update($data)
    {
        $id_user = $this->id_user();
        $sql = "
            UPDATE `tb_barang_masuk` 
            SET `no_batch`='$data[no_batch]',`no_surat_jalan`='$data[no_surat_jalan]',`tgl`='$data[tgl]',`nama_operator`='$data[nama_operator]',`dok_pendukung`='$data[dok_pendukung]',`jenis_kemasan`='$data[jenis_kemasan]',`jml_kemasan`='$data[jml_kemasan]',`tutup`='$data[tutup]',`wadah`='$data[wadah]',`label`='$data[label]',`qty`='$data[qty]',`exp`='$data[exp]',`mfg`='$data[mfg]',`updated_at`=NOW(),`updated_by`='$id_user' 
            WHERE `id_barang_masuk`='$data[id_barang_masuk]'
        ";
        return $this->db->query($sql);
        // return $sql;
    }


    public function delete($data)
    {
        $id_user = $this->id_user();
        // $sql = "
        // UPDATE `tb_barang_masuk` 
        // SET `is_deleted`='1',`updated_at`=NOW(),`updated_by`='$id_user' 
        // WHERE `id_barang_masuk`='$data[id_barang_masuk]'
        // ";

        $sql = "
        DELETE FROM `tb_barang_masuk`
         WHERE `id_barang_masuk`='$data[id_barang_masuk]'
        ";
        return $this->db->query($sql);
    }


    public function jml_barang_masuk($data)
    {
        // $kode_user = $this->kode_user();
        $sql = "
            SELECT sum(qty) tot_barang_masuk FROM `tb_barang_masuk`
            WHERE id_barang = '$data[id_barang]' AND  is_deleted = 0";
        return $this->db->query($sql);
    }
    public function cek_surat_jalan($no_surat_jalan)
    {
        $sql = "  p
            SELECT COUNT(a.no_surat_jalan) count_sj FROM tb_barang_masuk a
            WHERE a.no_surat_jalan = '$no_surat_jalan' AND a.is_deleted = 0";
        return $this->db->query($sql);
    }

    public function ambil_label($no_surat_jalan)
    {
        $sql = "
            SELECT a.*,b.nama_supplier,c.kode_barang,c.nama_barang,c.satuan FROM tb_pemeriksaan_bahan a
            LEFT JOIN tb_supplier b ON a.id_supplier = b.id_supplier
            LEFT JOIN tb_barang c ON a.id_barang = c.id_barang
            WHERE a.is_deleted = 0 AND a.no_surat_jalan = '$no_surat_jalan' ORDER BY a.tgl ASC";
        return $this->db->query($sql);
    }
}
