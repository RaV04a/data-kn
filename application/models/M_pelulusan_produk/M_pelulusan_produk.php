<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_pelulusan_produk extends CI_Model
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
        SELECT a.*,b.qty,b.stok FROM tb_barang a
        LEFT JOIN tb_barang_masuk b ON a.id_barang = b.id_barang
        WHERE a.is_deleted = 0 ORDER BY a.created_at ASC";

        return $this->db->query($sql);
    }

    // public function get_per($id = null)
    // {
    //     // $kode_user = $this->kode_user();
    //     $sql = "
    //     SELECT b.*,c.qty,c.stok FROM tb_barang a
    //     LEFT JOIN tb_permintaan_barang b ON a.id_barang = b.id_barang
    //     LEFT JOIN tb_barang_masuk c ON a.id_barang_masuk = c.id_barang_masuk
    //     LEFT JOIN tb_transfer_slip d ON a.no_transfer_slip = d.no_transfer_slip
    //     WHERE b.is_deleted = 0 ORDER BY b.created_at ASC";

    //     return $this->db->query($sql);
    // }

    public function add($data)
    {
        $id_user = $this->id_user();
        $sql = "
        INSERT INTO `tb_barang`(`kode_barang`, `nama_barang`, `nama_produsen`, `negara_produsen`,`satuan`,`jenis_bahan`,`jenis_gel`,`qty_pack`,`sertif_halal`, `no_seri`,`ed_sertif`,`penerbit_halal`, `created_at`, `created_by`, `updated_at`, `updated_by`, `is_deleted`) 
        VALUES ('$data[kode_barang]','$data[nama_barang]','$data[nama_produsen]','$data[negara_produsen]','$data[satuan]','$data[jenis_bahan]','$data[jenis_gel]','$data[qty_pack]','Ada','$data[no_seri]','$data[ed_sertif]','$data[penerbit_halal]',NOW(),'$id_user','0000-00-00 00:00:00','','0')
        ";

        return $this->db->query($sql);
    }
    public function update($data)
    {
        $id_user = $this->id_user();
        $sql = "
            UPDATE `tb_barang` 
            SET `kode_barang`='$data[kode_barang]',
                `nama_barang`='$data[nama_barang]',
                `nama_produsen`='$data[nama_produsen]',
                `negara_produsen`='$data[negara_produsen]',
                `satuan`='$data[satuan]',
                `jenis_bahan`='$data[jenis_bahan]',
                `jenis_gel`='$data[jenis_gel]',
                `qty_pack`='$data[qty_pack]',
                `no_seri`='$data[no_seri]',
                `ed_sertif`='$data[ed_sertif]',
                `penerbit_halal`='$data[penerbit_halal]',
                `updated_at` = NOW(),`updated_by`='$id_user' 
            WHERE `id_barang`='$data[id_barang]'
        ";
        return $this->db->query($sql);
        // return $sql;
    }


    public function delete($data)
    {
        $id_user = $this->id_user();
        //$sql = "
        //  UPDATE `tb_barang` 
        // SET `is_deleted`='1',`updated_at`=NOW(),`updated_by`='$id_user' 
        //WHERE `id_barang`='$data[id_barang]'
        //";
        $sql = "
        DELETE FROM `tb_barang`
         WHERE `id_barang`='$data[id_barang]'
        ";
        return $this->db->query($sql);
    }

    public function cek_kode_barang($kode_barang){
        $sql = "
            SELECT COUNT(a.kode_barang) count_sj FROM tb_barang a
            WHERE a.kode_barang = '$kode_barang' AND a.is_deleted = 0";
        return $this->db->query($sql);
    }
}
