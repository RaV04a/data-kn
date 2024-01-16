<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_transaksi_melting extends CI_Model
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
        $sql = "
        SELECT a.*,b.no_transfer_slip,c.nama_barang,d.nama_alat,e.no_cr,e.print,e.tinta,e.no_batch,f.nama_customer,g.kode_warna_cap,g.warna_cap,h.kode_warna_body,h.warna_body FROM tb_penimbangan a
        LEFT JOIN tb_melting_masuk b ON a.id_mm = b.id_mm
        LEFT JOIN tb_barang c ON b.id_barang = c.id_barang
        LEFT JOIN tb_alat_kalibrasi d ON a.id_kalibrasi = d.id_kalibrasi
        LEFT JOIN tb_schedulemarketing e ON a.id_sch = e.id_sch
        LEFT JOIN tb_customer f ON e.id_customer = f.id_customer
        LEFT JOIN tb_kw_cap g ON e.id_kw_cap = g.id_kw_cap
        LEFT JOIN tb_kw_body h ON e.id_kw_body = h.id_kw_body
        WHERE a.is_deleted = 0 ORDER BY a.tgl_timbang ASC";

        return $this->db->query($sql);
    }

    public function trans_masuk($data)
    {
        $id_user = $this->id_user();
        $post_data = array(
            'id_mm' => $data['id_mm'],
            'qty' => $data['qty'],
            'status' => 'masuk',
            'created_by' => $id_user,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_by' => '',
            'updated_at' => '0000-00-00 00:00:00',
            'is_deleted' => '0'
        );
        $this->db->insert('tb_transaksi_melting', $post_data);
        $insert_id = $this->db->insert_id();

        return $insert_id;
    }

    public function trans_keluar($data)
    {
        $id_user = $this->id_user();
        $post_data = array(
            'id_mm' => $data['id_mm'],
            'qty' => $data['qty'],
            'status' => 'keluar',
            'created_by' => $id_user,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_by' => '',
            'updated_at' => '0000-00-00 00:00:00',
            'is_deleted' => '0'
        );
        $this->db->insert('tb_transaksi_melting', $post_data);
        $insert_id = $this->db->insert_id();

        return $insert_id;
    }
    public function update($data)
    {
        $id_user = $this->id_user();
        $post_data = array(
            'id_mm' => $data['id_mm'],
            'qty' => $data['qty'],
            'updated_by' => $id_user,
            'updated_at' => date("Y-m-d H:i:s")
        );
        $this->db->where('id_ts_melt', $data['id_ts_melt']);
        $this->db->where('status', 'keluar');
        $this->db->update('tb_transaksi_melting', $post_data);
    }

    public function qty_masuk($data)
    {
        $sql = "
        SELECT sum(qty) tot_masuk FROM `tb_transaksi_melting`
        WHERE id_mm = '$data[id_mm]' AND status = 'masuk'";

        return $this->db->query($sql);
    }

    public function qty_keluar($data)
    {
        $sql = "
        SELECT sum(qty) tot_keluar FROM `tb_transaksi_melting`
        WHERE id_mm = '$data[id_mm]' AND status = 'keluar'";

        return $this->db->query($sql);
    }

    public function tess($data)
    {
        $sql = "
        SELECT a.* FROM tb_transaksi_melting a
        LEFT JOIN tb_melting_masuk b ON a.id_mm = b.id_mm
        WHERE a.status = 'keluar'";

        return $this->db->query($sql);
    }

    public function delete($id_ts_melt)
    {
        $id_user = $this->id_user();
        $this->db->where('id_ts_melt', $id_ts_melt);
        $this->db->where('status', 'keluar');
        $this->db->delete('tb_transaksi_melting');
    }
}
