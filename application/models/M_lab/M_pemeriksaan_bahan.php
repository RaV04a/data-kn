<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_pemeriksaan_bahan extends CI_Model
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
            SELECT a.*,b.nama_supplier,c.kode_barang,c.nama_barang,c.satuan,c.qty_pack,c.jenis_bahan FROM tb_pemeriksaan_bahan a
            LEFT JOIN tb_supplier b ON a.id_supplier = b.id_supplier
            LEFT JOIN tb_barang c ON a.id_barang = c.id_barang
            
            WHERE a.is_deleted = 0 ORDER BY a.tgl ASC";
        return $this->db->query($sql);
    }

    public function add($data)
    {
        $id_user = $this->id_user();
        $sql = "
        INSERT INTO `tb_pemeriksaan_bahan`(`no_batch`,`no_surat_jalan`, `tgl`, `id_barang`, `id_supplier`, `op_gudang`, `dok_pendukung`, `jenis_kemasan`, `jml_kemasan`,`ditolak_kemasan`, `tutup`, `wadah`, `label`, `qty`,`ditolak_qty`,`status`,`exp`, `mfg`, `created_at`, `created_by`, `updated_at`, `updated_by`, `is_deleted`) 
        VALUES ('$data[no_batch]','$data[no_surat_jalan]','$data[tgl]','$data[id_barang]','$data[id_supplier]','$data[nama_operator]','$data[dok_pendukung]','$data[jenis_kemasan]','$data[jml_kemasan]','$data[ditolak_kemasan]','$data[tutup]','$data[wadah]','$data[label]','$data[qty]','$data[ditolak_qty]','Karantina','$data[exp]','$data[mfg]',NOW(),'$id_user','0000-00-00 00:00:00','','0')
        ";
        return $this->db->query($sql);
    }

    public function update_status_pb($id_pb, $status)
    {
        $sql = "
        UPDATE `tb_pemeriksaan_bahan`
        SET `status`='$status'
        WHERE `id_pb`='$id_pb';
        ";
        return $this->db->query($sql);
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
        DELETE FROM `tb_hasil_ujigel`
         WHERE `id_pb`='$data[id_pb]'
        ";
        return $this->db->query($sql);
    }

    public function delete_pw($data)
    {
        $id_user = $this->id_user();
        // $sql = "
        // UPDATE `tb_barang_masuk` 
        // SET `is_deleted`='1',`updated_at`=NOW(),`updated_by`='$id_user' 
        // WHERE `id_barang_masuk`='$data[id_barang_masuk]'
        // ";

        $sql = "
        DELETE FROM `tb_hasil_ujipewarna`
         WHERE `id_pb`='$data[id_pb]'
        ";
        return $this->db->query($sql);
    }

    public function delete_pel($data)
    {
        $id_user = $this->id_user();
        // $sql = "
        // UPDATE `tb_barang_masuk` 
        // SET `is_deleted`='1',`updated_at`=NOW(),`updated_by`='$id_user' 
        // WHERE `id_barang_masuk`='$data[id_barang_masuk]'
        // ";

        $sql = "
        DELETE FROM `tb_hasil_ujipel`
         WHERE `id_pb`='$data[id_pb]'
        ";
        return $this->db->query($sql);
    }

    public function delete_tp($data)
    {
        $id_user = $this->id_user();
        // $sql = "
        // UPDATE `tb_barang_masuk` 
        // SET `is_deleted`='1',`updated_at`=NOW(),`updated_by`='$id_user' 
        // WHERE `id_barang_masuk`='$data[id_barang_masuk]'
        // ";

        $sql = "
        DELETE FROM `tb_hasil_ujitp`
         WHERE `id_pb`='$data[id_pb]'
        ";
        return $this->db->query($sql);
    }

    public function delete_csf($data)
    {
        $id_user = $this->id_user();
        // $sql = "
        // UPDATE `tb_barang_masuk` 
        // SET `is_deleted`='1',`updated_at`=NOW(),`updated_by`='$id_user' 
        // WHERE `id_barang_masuk`='$data[id_barang_masuk]'
        // ";

        $sql = "
        DELETE FROM `tb_hasil_ujibt_candurinsilverfine`
         WHERE `id_pb`='$data[id_pb]'
        ";
        return $this->db->query($sql);
    }

    public function delete_leca($data)
    {
        $id_user = $this->id_user();
        // $sql = "
        // UPDATE `tb_barang_masuk` 
        // SET `is_deleted`='1',`updated_at`=NOW(),`updated_by`='$id_user' 
        // WHERE `id_barang_masuk`='$data[id_barang_masuk]'
        // ";

        $sql = "
        DELETE FROM `tb_hasil_ujibt_lecithinadlec`
         WHERE `id_pb`='$data[id_pb]'
        ";
        return $this->db->query($sql);
    }
    public function delete_sls($data)
    {
        $id_user = $this->id_user();
        // $sql = "
        // UPDATE `tb_barang_masuk` 
        // SET `is_deleted`='1',`updated_at`=NOW(),`updated_by`='$id_user' 
        // WHERE `id_barang_masuk`='$data[id_barang_masuk]'
        // ";

        $sql = "
        DELETE FROM `tb_hasil_ujibt_sodiumlaunilsulfat`
         WHERE `id_pb`='$data[id_pb]'
        ";
        return $this->db->query($sql);
    }
    public function delete_titan($data)
    {
        $id_user = $this->id_user();
        // $sql = "
        // UPDATE `tb_barang_masuk` 
        // SET `is_deleted`='1',`updated_at`=NOW(),`updated_by`='$id_user' 
        // WHERE `id_barang_masuk`='$data[id_barang_masuk]'
        // ";

        $sql = "
        DELETE FROM `tb_hasil_ujibt_titaniumdioxide`
         WHERE `id_pb`='$data[id_pb]'
        ";
        return $this->db->query($sql);
    }

    public function delete_nb($data)
    {
        $id_user = $this->id_user();
        // $sql = "
        // UPDATE `tb_barang_masuk` 
        // SET `is_deleted`='1',`updated_at`=NOW(),`updated_by`='$id_user' 
        // WHERE `id_barang_masuk`='$data[id_barang_masuk]'
        // ";

        $sql = "
        DELETE FROM `tb_hasil_ujibt_natriumbenzoat`
         WHERE `id_pb`='$data[id_pb]'
        ";
        return $this->db->query($sql);
    }

    public function delete_mepa($data)
    {
        $id_user = $this->id_user();
        // $sql = "
        // UPDATE `tb_barang_masuk` 
        // SET `is_deleted`='1',`updated_at`=NOW(),`updated_by`='$id_user' 
        // WHERE `id_barang_masuk`='$data[id_barang_masuk]'
        // ";

        $sql = "
        DELETE FROM `tb_hasil_ujibt_methylparaben`
         WHERE `id_pb`='$data[id_pb]'
        ";
        return $this->db->query($sql);
    }

    public function cek_karantina()
    {
        $sql = "
            SELECT COUNT(status) as tot_status_karantina FROM `tb_pemeriksaan_bahan` WHERE status = 'Karantina' AND is_deleted = 0";
        return $this->db->query($sql);
    }

    public function cek_proses()
    {
        $sql = "
            SELECT COUNT(status) as tot_status_proses FROM `tb_pemeriksaan_bahan` WHERE status = 'Proses' AND is_deleted = 0";
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
            SELECT COUNT(a.no_surat_jalan) count_sj FROM tb_barang_masuk a
            WHERE a.no_surat_jalan = '$no_surat_jalan' AND a.is_deleted = 0";
        return $this->db->query($sql);
    }
}
