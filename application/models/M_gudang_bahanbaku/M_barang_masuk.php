<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_barang_masuk extends CI_Model
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
            SELECT a.*,b.jml_kemasan,b.qty,b.status,c.kode_barang,c.nama_barang,c.satuan,c.qty_pack,d.nama_supplier FROM tb_barang_masuk a
            LEFT JOIN tb_pemeriksaan_bahan b ON a.no_batch = b.no_batch
            LEFT JOIN tb_barang c ON a.id_barang = c.id_barang
            LEFT JOIN tb_supplier d ON a.id_supplier = d.id_supplier
            WHERE a.is_deleted = 0 ORDER BY a.tgl ASC";
        return $this->db->query($sql);
    }

    public function add($data)
    {
        $id_user = $this->id_user();
        $sql = "
        INSERT INTO `tb_barang_masuk`(`id_barang`, `id_supplier`,`no_batch`,`no_surat_jalan`, `tgl`,`op_gudang`, `dok_pendukung`, `jenis_kemasan`, `jml_kemasan`,`ditolak_kemasan`, `tutup`, `wadah`, `label`, `qty`,`stok`,`ditolak_qty`,`exp`, `mfg`,`created_at`, `created_by`, `updated_at`, `updated_by`, `is_deleted`) 
        VALUES ('$data[id_barang]','$data[id_supplier]','$data[no_batch]','$data[no_surat_jalan]','$data[tgl]','$data[op_gudang]','$data[dok_pendukung]','$data[jenis_kemasan]','$data[jml_kemasan]','$data[ditolak_kemasan]','$data[tutup]','$data[wadah]','$data[label]','$data[qty]','$data[stok]','$data[ditolak_qty]','$data[exp]','$data[mfg]',NOW(),'$id_user','0000-00-00 00:00:00','','0')
        ";
        return $this->db->query($sql);
    }

    public function findOneById($id)
    {
        $sql = "
            SELECT a.*,c.kode_barang,c.nama_barang,c.satuan,c.qty_pack FROM tb_barang_masuk a
            LEFT JOIN tb_barang c ON a.nama_barang = c.nama_barang
            WHERE a.is_deleted = 0 AND id_barang_masuk = " . $id . " ORDER BY a.tgl ASC";
        return $this->db->query($sql);
    }

    public function update($data)
    {
        $id_user = $this->id_user();
        $sql = "
            UPDATE `tb_barang_masuk` 
            SET `no_batch`='$data[no_batch]',
            `no_surat_jalan`='$data[no_surat_jalan]',
            `tgl`='$data[tgl]',
            `op_gudang`='$data[nama_operator]',
            `dok_pendukung`='$data[dok_pendukung]',
            `jenis_kemasan`='$data[jenis_kemasan]',
            `jml_kemasan`='$data[jml_kemasan]',
            `ditolak_kemasan`='$data[ditolak_kemasan]',
            `tutup`='$data[tutup]',
            `wadah`='$data[wadah]',
            `label`='$data[label]',
            `qty`='$data[qty]',
            `ditolak_qty`='$data[ditolak_qty]',
            `exp`='$data[exp]',
            `mfg`='$data[mfg]',
            `updated_at`= NOW(),`updated_by`='$id_user' 
            WHERE `id_barang_masuk`='$data[id_barang_masuk]'
        ";
        return $this->db->query($sql);
        // return $sql;
    }


    public function delete($data)
    {
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
        $sql = "
            SELECT COUNT(a.no_surat_jalan) count_sj FROM tb_pemeriksaan_bahan a
            WHERE a.no_surat_jalan = '$no_surat_jalan' AND a.is_deleted = 0";
        return $this->db->query($sql);
    }
    public function cek_no_batch($no_batch)
    {
        $sql = "
            SELECT COUNT(a.no_surat_jalan) count_sj FROM tb_pemeriksaan_bahan a
            WHERE a.no_batch = '$no_batch' AND a.is_deleted = 0";
        return $this->db->query($sql);
    }

    public function update_stok($data)
    {
        $id_user = $this->id_user();
        $sql = "
            UPDATE `tb_barang_masuk` 
            SET `stok`=(`stok` - '$data[qty]')
            WHERE `id_barang_masuk`='$data[id_barang_masuk]'
        ";
        return $this->db->query($sql);
        // return $sql;
    }
}
