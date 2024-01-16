<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_laporan_barang_masuk extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    function nama_operator()
    {
        return $this->session->userdata("nama_operator");
    }
    public function get($tgl = null, $tgl2 = null, $name = null)
    {
        $where = array();
        if ($tgl != null && $tgl2 != null) {
            $tgl = explode("/", $tgl);
            $tgl = "$tgl[2]-$tgl[1]-$tgl[0]";
            $tgl2 = explode("/", $tgl2);
            $tgl2 = "$tgl2[2]-$tgl2[1]-$tgl2[0]";
            $where[] = "AND a.tgl >= '$tgl' AND  a.tgl <= '$tgl2'";
        } else {
            return array();
        }

        if ($name) {
            $where[] = "AND c.nama_barang = '$name'";
        }

        $where = implode(" ", $where);

        $sql = "
            SELECT a.*,b.nama_supplier,c.nama_barang,c.satuan,c.qty_pack FROM tb_barang_masuk a
            LEFT JOIN tb_supplier b ON a.id_supplier = b.id_supplier
            LEFT JOIN tb_barang c ON a.id_barang = c.id_barang
            WHERE a.is_deleted = 0 $where ORDER BY a.tgl ASC";

        return $this->db->query($sql)->result_array();
    }

    public function get_filter_brng()
    {
        $sql = "
            SELECT a.*,b.nama_barang FROM tb_barang_masuk a
            LEFT JOIN tb_barang b ON a.id_barang = b.id_barang
            WHERE a.is_deleted = 0 ORDER BY a.tgl ASC";
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
    function multisave($id_barang_masuk, $category)
    {
        $query = "insert into tb_barang_masuk values($id_barang_masuk,$category)";
        $this->db->query($query);
    }
}
