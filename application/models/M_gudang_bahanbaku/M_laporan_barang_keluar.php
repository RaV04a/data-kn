<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_laporan_barang_keluar extends CI_Model
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
            $where[] = "AND b.nama_barang = '$name'";
        }

        $where = implode(" ", $where);

        $sql = "
            SELECT a.*,b.nama_barang,b.satuan,b.qty_pack,d.exp,d.mfg,d.no_surat_jalan,d.op_gudang,d.dok_pendukung,d.jenis_kemasan,d.jml_kemasan,d.ditolak_kemasan,d.tutup,d.wadah,d.label,d.ditolak_qty,e.status FROM tb_permintaan_barang a
            LEFT JOIN tb_barang b ON a.id_barang = b.id_barang
            LEFT JOIN tb_supplier c ON a.id_supplier = c.id_supplier
            LEFT JOIN tb_barang_masuk d ON a.id_barang_masuk = d.id_barang_masuk
            LEFT JOIN tb_transfer_slip e ON a.no_transfer_slip = e.no_transfer_slip
            WHERE d.is_deleted = 0 AND e.status = 'DiSetujui' $where ORDER BY d.tgl ASC";
        return $this->db->query($sql)->result_array();
    }

    public function get_filter_brng()
    {
        $sql = "
            SELECT a.*,b.nama_barang FROM tb_permintaan_barang a
            LEFT JOIN tb_barang b ON a.id_barang = b.id_barang
            WHERE a.is_deleted = 0 ORDER BY a.tgl ASC";
        return $this->db->query($sql);
    }

    public function data_barang_keluar($no_transfer_slip)
    {
        $sql = "
            SELECT a.*,c.nama_barang,c.satuan,d.nama_supplier FROM tb_barang_keluar a
            LEFT JOIN tb_barang_masuk b ON a.no_batch = b.no_batch
            LEFT JOIN tb_barang c ON b.id_barang = c.id_barang
            LEFT JOIN tb_supplier d ON b.id_supplier = d.id_supplier
            WHERE a.no_transfer_slip = '$no_transfer_slip' AND a.is_deleted = 0 ORDER BY a.created_at DESC";
        return $this->db->query($sql);
    }
    public function add_transfer_slip($data)
    {
        $nama_operator = $this->nama_operator();
        $sql = "
        INSERT INTO `tb_transfer_slip`(`no_transfer_slip`, `tgl`, `nama_operator`, `note`, `exp`, `created_at`, `created_by`, `updated_at`, `updated_by`, `is_deleted`) 
        VALUES ('$data[no_transfer_slip]','$data[tgl]','$data[nama_operator]','$data[note]','$data[exp]',NOW(),'$nama_operator','0000-00-00 00:00:00','','0')
        ";
        return $this->db->query($sql);
    }
    public function add_barang_keluar($data)
    {
        $nama_operator = $this->nama_operator();
        $sql = "
        INSERT INTO `tb_barang_keluar`(`no_batch`, `no_transfer_slip`, `qty`, `created_at`, `created_by`, `updated_at`, `updated_by`, `is_deleted`)
        VALUES ('$data[no_batch]','$data[no_transfer_slip]','$data[qty]',NOW(),'$nama_operator','0000-00-00 00:00:00','','0')
        ";
        return $this->db->query($sql);
    }
    public function update($data)
    {
        $nama_operator = $this->nama_operator();
        $sql = "
            UPDATE `tb_barang_masuk` 
            SET `no_batch`='$data[no_batch]',`tgl`='$data[tgl]',`id_barang`='$data[id_barang]',`id_supplier`='$data[id_supplier]',`status`='$data[status]',`qty`='$data[qty]',`qty`='$data[qty]',`updated_at`=NOW(),`updated_by`='$nama_operator' 
            WHERE `id_barang_masuk`='$data[id_barang_masuk]'
        ";
        return $this->db->query($sql);
        // return $sql;
    }


    public function delete($data)
    {
        $nama_operator = $this->nama_operator();
        $sql = "
            UPDATE `tb_barang_masuk` 
            SET `is_deleted`='1',`updated_at`=NOW(),`updated_by`='$nama_operator' 
            WHERE `id_barang_masuk`='$data[id_barang_masuk]'
        ";
        return $this->db->query($sql);
    }

    public function jml_barang_keluar($data)
    {
        $sql = "
            SELECT sum(qty) tot_barang_keluar FROM `tb_barang_keluar` WHERE no_batch='$data[no_batch]' AND is_deleted = 0";
        return $this->db->query($sql);
    }
    public function jml_barang_keluar2($data)
    {
        $sql = "
            SELECT sum(a.qty) tot_barang_keluar FROM `tb_barang_keluar` a 
            LEFT JOIN tb_barang_masuk b ON a.no_batch = b.no_batch 
            WHERE b.id_barang ='$data[id_barang]' AND a.is_deleted = 0";
        return $this->db->query($sql);
    }
}
