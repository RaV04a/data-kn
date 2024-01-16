<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_laporan_kartu_stok extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    function id_user()
    {
        return $this->session->userdata("id_user");
    }

    // public function get($tgl = null, $tgl2 = null)
    // {
    //     if ($tgl != null && $tgl2 != null) {
    //         $where = "AND b.tgl >= '$tgl' AND  b.tgl <= '$tgl2'";
    //     } else {
    //         return array();
    //     }
    //     $sql = "
    //         SELECT a.*,b.qty,b.stok,c.nama_supplier FROM tb_barang a
    //         LEFT JOIN tb_barang_masuk b ON a.id_barang = b.id_barang
    //         LEFT JOIN tb_supplier c ON b.id_supplier = c.id_supplier
    //         WHERE b.is_deleted = 0 $where ORDER BY b.tgl ASC";

    //     return $this->db->query($sql)->result_array();
    // }

    public function jml_barang_masuk($data)
    {
        if ($data['tgl'] == null) {
            $where = "";
        } else {
            $where = "AND tgl <= '$data[tgl]'";
        }
        $sql = "
            SELECT sum(qty) tot_barang_masuk FROM `tb_barang_masuk`
            WHERE id_barang = '$data[id_barang]' AND  is_deleted = 0 $where";
        return $this->db->query($sql);
    }
    public function jml_barang_keluar($data)
    {
        if ($data['tgl'] == null) {
            $where = "";
        } else {
            $where = "AND c.tgl <= '$data[tgl]'";
        }
        $sql = "
            SELECT sum(a.qty) tot_barang_keluar FROM `tb_permintaan_barang` a 
            LEFT JOIN tb_barang_masuk b ON a.id_barang_masuk = b.id_barang_masuk 
            LEFT JOIN tb_transfer_slip c ON c.no_transfer_slip = a.no_transfer_slip
            WHERE b.id_barang ='$data[id_barang]' AND a.is_deleted = 0 $where";
        return $this->db->query($sql);
    }
    public function jml_barang_masuk_setelah($data)
    {
        if ($data['tgl'] == null) {
            $where = "";
        } else {
            $where = "AND tgl >= '$data[tgl1]' AND tgl <= '$data[tgl2]'";
        }
        $sql = "
            SELECT sum(qty) tot_barang_masuk FROM `tb_barang_masuk`
            WHERE id_barang = '$data[id_barang]' AND  is_deleted = 0 $where";
        return $this->db->query($sql);
    }
    public function jml_barang_keluar_setelah($data)
    {
        if ($data['tgl'] == null) {
            $where = "";
        } else {
            $where = "AND c.tgl>='$data[tgl1]' AND c.tgl<='$data[tgl2]'";
        }
        $sql = "
            SELECT sum(a.qty) tot_barang_keluar FROM `tb_permintaan_barang` a 
            LEFT JOIN tb_barang_masuk b ON a.id_barang_masuk = b.id_barang_masuk 
            LEFT JOIN tb_transfer_slip c ON a.no_transfer_slip = c.no_transfer_slip
            WHERE b.id_barang ='$data[id_barang]' AND a.is_deleted = 0 $where";
        return $this->db->query($sql);
    }
}
