<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_packing_masuk extends CI_Model
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
        $sql = "SELECT * FROM tb_packing_masuk WHERE is_deleted = 0 ORDER BY created_at ASC";

        return $this->db->query($sql);
    }

    public function add($data)
    {
        $id_user = $this->id_user();
        $sql = "
        INSERT INTO `tb_packing_masuk`(`no_msk`, `size`,`kw_cap`,`kw_body`, `warna_cap`,`warna_body`, `no_packing`, `no_batch`, `print`,`jumlah`, `jenis_pack`, `status_sk`,`created_at`, `created_by`, `updated_at`, `updated_by`, `is_deleted`) 
        VALUES ('$data[no_msk]','$data[size]','$data[kw_cap]','$data[kw_body]','$data[warna_cap]','$data[warna_body]','$data[no_packing]','$data[no_batch]','$data[print]','$data[jumlah]','$data[jenis_pack]','blm_sk',NOW(),'$id_user','0000-00-00 00:00:00','','0')
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

    public function add_sk($data)
    {
        $id_user = $this->id_user();
        $sql = "
        INSERT INTO `tb_stock_keeper`(`id_pack`, `no_msk`,`tahun_sk`,`created_at`, `created_by`, `updated_at`, `updated_by`, `is_deleted`) 
        VALUES ('$data[id_pack]','$data[no_msk]','$data[tahun_sk]',NOW(),'$id_user','0000-00-00 00:00:00','','0')
        ";
        return $this->db->query($sql);
    }

    public function update_status_sk($id_pack, $status_sk)
    {
        $sql = "
        UPDATE `tb_packing_masuk`
        SET `status_sk`='$status_sk'
        WHERE `id_pack`='$id_pack';
        ";
        return $this->db->query($sql);
    }

    public function get_approval($id_pack)
    {
        $sql = "
            SELECT a.* FROM tb_packing_masuk a
            WHERE a.is_deleted = 0 AND id_pack = " . $id_pack . " ORDER BY a.id_pack ASC";
        return $this->db->query($sql);
    }

}
