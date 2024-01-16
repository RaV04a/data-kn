<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_dashboard extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    function id_user()
    {
        return $this->session->userdata("id_user");
    }
    public function tot_barang_masuk($hariini)
    {
        // $kode_user = $this->kode_user();
        $sql = "SELECT count(id_pb) tot_barang_masuk FROM tb_pemeriksaan_bahan WHERE tgl='$hariini' AND is_deleted = 0";
        return $this->db->query($sql);
    }
    public function tot_transfer_slip($hariini)
    {
        // $kode_user = $this->kode_user();
        $sql = "SELECT count(id_transfer_slip) tot_transfer_slip FROM tb_transfer_slip WHERE tgl='$hariini' AND is_deleted = 0";

        return $this->db->query($sql);
    }
    public function tot_permintaan_barang($hariini)
    {
        // $kode_user = $this->kode_user();
        $sql = "SELECT count(a.id_permintaan_barang) tot_permintaan_barang FROM tb_permintaan_barang a
                LEFT JOIN tb_transfer_slip b ON b.no_transfer_slip = a.no_transfer_slip
                WHERE b.tgl='$hariini' AND a.is_deleted = 0 AND b.is_deleted = 0";
        return $this->db->query($sql);
    }
    public function tot_barang()
    {
        // $kode_user = $this->kode_user();
        $sql = "SELECT count(id_barang) tot_barang FROM tb_barang WHERE is_deleted = 0";
        return $this->db->query($sql);
    }
    public function tot_supplier()
    {
        // $kode_user = $this->kode_user();
        $sql = "SELECT count(id_supplier) tot_supplier FROM tb_supplier WHERE is_deleted = 0";
        return $this->db->query($sql);
    }
    public function users()
    {
        // $kode_user = $this->kode_user();
        $sql = "SELECT * FROM tb_user WHERE is_deleted = 0";
        return $this->db->query($sql);
    }
}
