<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_laporan_barang_stok extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    function id_user()
    {
        return $this->session->userdata("id_user");
    }

    public function get($tgl = null)
    {
        $where = array();
        if ($tgl != null) {
            $where = "AND a.created_at >= '$tgl'";
        } else {
            return array();
        }

        $sql = "
        SELECT a.*,b.qty,b.stok FROM tb_barang a
        LEFT JOIN tb_barang_masuk b ON a.id_barang = b.id_barang
            WHERE a.is_deleted = 0 $where ORDER BY a.created_at ASC";

        return $this->db->query($sql)->result_array();
    }
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
    public function jml_barang_keluar2($data)
    {
        if ($data['tgl'] == null) {
            $where = "";
        } else {
            $where = "AND c.tgl<='$data[tgl]'";
        }
        $sql = "
            SELECT sum(a.qty) tot_barang_keluar FROM `tb_permintaan_barang` a 
            LEFT JOIN tb_transfer_slip c ON c.no_transfer_slip = a.no_transfer_slip
            LEFT JOIN tb_barang_masuk b ON a.no_batch = b.no_batch 
            WHERE b.id_barang ='$data[id_barang]' AND a.is_deleted = 0 $where";
        return $this->db->query($sql);
    }
}
