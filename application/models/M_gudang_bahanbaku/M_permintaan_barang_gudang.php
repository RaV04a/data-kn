<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_permintaan_barang_gudang extends CI_Model
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
            SELECT a.*,b.nama_operator FROM tb_transfer_slip a
            LEFT JOIN tb_user b ON a.nama_operator = b.nama_operator
            WHERE a.is_deleted = 0 ORDER BY a.tgl ASC";
        return $this->db->query($sql);
    }
    public function data_permintaan_barang($no_transfer_slip)
    {
        $sql = "
            SELECT a.*,c.nama_barang,c.satuan,d.nama_supplier,b.mfg,b.exp FROM tb_permintaan_barang a
            LEFT JOIN tb_barang_masuk b ON a.id_barang_masuk = b.id_barang_masuk
            LEFT JOIN tb_barang c ON a.id_barang = c.id_barang
            LEFT JOIN tb_supplier d ON a.id_supplier = d.id_supplier
            LEFT JOIN tb_transfer_slip e ON a.no_transfer_slip = e.no_transfer_slip
            WHERE a.no_transfer_slip = '$no_transfer_slip' AND a.is_deleted = 0 AND e.is_deleted = 0 ORDER BY a.no_batch ASC";
        return $this->db->query($sql);
    }
    public function cek_permintaan()
    {
        $sql = "
            SELECT COUNT(status) as tot_status_proses FROM `tb_transfer_slip` WHERE status = 'Proses' AND is_deleted = 0";
        return $this->db->query($sql);
    }
    public function cek_transfer_slip($no_transfer_slip)
    {
        $sql = "
            SELECT COUNT(a.no_transfer_slip) count_sj FROM tb_transfer_slip a
            WHERE a.no_transfer_slip = '$no_transfer_slip' AND a.is_deleted = 0";
        return $this->db->query($sql);
    }
    public function add_transfer_slip($data)
    {
        $id_user = $this->id_user();
        $sql = "
        INSERT INTO `tb_transfer_slip`(`no_transfer_slip`, `tgl`, `nama_operator`, `note`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`, `is_deleted`) 
        VALUES ('$data[no_transfer_slip]','$data[tgl]','$data[nama_operator]','$data[note]','$data[status]',NOW(),'$id_user','0000-00-00 00:00:00','','0')
        ";
        return $this->db->query($sql);
    }
    public function add_permintaan_barang($data)
    {
        $id_user = $this->id_user();
        $sql = "
        INSERT INTO `tb_permintaan_barang`(`id_barang_masuk`,`id_barang`,`id_supplier`,`no_batch`, `no_transfer_slip`,`tgl`,`qty`, `created_at`, `created_by`, `updated_at`, `updated_by`, `is_deleted`)
        VALUES ('$data[id_barang_masuk]','$data[id_barang]','$data[id_supplier]','$data[no_batch]','$data[no_transfer_slip]','$data[tgl]','$data[qty]',NOW(),'$id_user','0000-00-00 00:00:00','','0')
        ";
        return $this->db->query($sql);
    }

    public function add_approv($data)
    {
        $id_user = $this->id_user();
        // $sql = "
        // INSERT INTO `tb_melting_masuk`(`id_barang_keluar`, `id_barang_masuk`,`id_barang`,`id_supplier`, `no_batch`,`no_transfer_slip`,`tgl`,`qty`,`stok`,`created_at`, `created_by`, `updated_at`, `updated_by`, `is_deleted`)
        // VALUES ('$data[id_barang_keluar]','$data[id_barang_masuk]','$data[id_barang]','$data[id_supplier]','$data[no_batch]','$data[no_transfer_slip]','$data[tgl]','$data[qty]','$data[qty]',NOW(),'$id_user','0000-00-00 00:00:00','','0')
        // ";
        $post_data = array(
            'id_permintaan_barang' => $data['id_permintaan_barang'],
            'id_barang_masuk' => $data['id_barang_masuk'],
            'id_barang' => $data['id_barang'],
            'id_supplier' => $data['id_supplier'],
            'no_batch' => $data['no_batch'],
            'no_transfer_slip' => $data['no_transfer_slip'],
            'tgl' => $data['tgl'],
            'qty' => $data['qty'],
            'created_at' => date("Y-m-d H:i:s"),
            'created_by' => $id_user,
            'updated_at' => '0000-00-00 00:00:00',
            'updated_by' => '',
            'is_deleted' => '0'
        );

        $this->db->insert('tb_melting_masuk', $post_data);
        return $this->db->insert_id();
        // return $this->db->query($sql);
    }

    public function add_approv2($data, $tgl_rilis)
    {
        $id_user = $this->id_user();
        // $sql = "
        // INSERT INTO `tb_melting_masuk`(`id_barang_keluar`, `id_barang_masuk`,`id_barang`,`id_supplier`, `no_batch`,`no_transfer_slip`,`tgl`,`qty`,`stok`,`created_at`, `created_by`, `updated_at`, `updated_by`, `is_deleted`)
        // VALUES ('$data[id_barang_keluar]','$data[id_barang_masuk]','$data[id_barang]','$data[id_supplier]','$data[no_batch]','$data[no_transfer_slip]','$data[tgl]','$data[qty]','$data[qty]',NOW(),'$id_user','0000-00-00 00:00:00','','0')
        // ";
        $post_data = array(
            'id_barang_keluar' => $data['id_barang_keluar'],
            'id_permintaan_barang' => $data['id_permintaan_barang'],
            'id_barang_masuk' => $data['id_barang_masuk'],
            'id_barang' => $data['id_barang'],
            'id_supplier' => $data['id_supplier'],
            'no_batch' => $data['no_batch'],
            'no_transfer_slip' => $data['no_transfer_slip'],
            'tgl' => $data['tgl'],
            'qty' => $data['qty'],
            'tgl_rilis' => $tgl_rilis,
            'created_at' => date("Y-m-d H:i:s"),
            'created_by' => $id_user,
            'updated_at' => '0000-00-00 00:00:00',
            'updated_by' => '',
            'is_deleted' => '0'
        );

        $this->db->insert('tb_barang_keluar', $post_data);
        return $this->db->insert_id();
        // return $this->db->query($sql);
    }

    public function disetujui($no_transfer_slip, $tgl_rilis)
    {
        $sql = "
        UPDATE `tb_permintaan_barang`
        SET `tgl_setuju`='$tgl_rilis'
        WHERE `no_transfer_slip`='$no_transfer_slip';
        ";
        return $this->db->query($sql);
    }

    public function ditolak($no_transfer_slip, $tgl_reject)
    {
        $sql = "
        UPDATE `tb_permintaan_barang`
        SET `tgl_tdksetuju`='$tgl_reject'
        WHERE `no_transfer_slip`='$no_transfer_slip';
        ";
        return $this->db->query($sql);
    }

    public function update_status_ts($no_transfer_slip, $status)
    {
        $sql = "
        UPDATE `tb_transfer_slip`
        SET `status`='$status'
        WHERE `no_transfer_slip`='$no_transfer_slip';
        ";
        return $this->db->query($sql);
    }

    public function update($data)
    {
        $id_user = $this->id_user();
        $sql = "
            UPDATE `tb_barang_masuk` 
            SET `no_batch`='$data[no_batch]',`tgl`='$data[tgl]',`id_barang`='$data[id_barang]',`id_supplier`='$data[id_supplier]',`qty`='$data[qty]',`updated_at` = NOW(),`updated_by`='$id_user' 
            WHERE `id_barang_masuk`='$data[id_barang_masuk]'
        ";
        return $this->db->query($sql);
        // return $sql;
    }


    public function delete($data)
    {
        $id_user = $this->id_user();
        // $sql1 = "
        //     UPDATE `tb_transfer_slip` 
        //     SET `is_deleted`='1',`updated_at`=NOW(),`updated_by`='$id_user' 
        //     WHERE `no_transfer_slip`='$data[no_transfer_slip]'
        // ";
        // $sql = "
        //     UPDATE `tb_permintaan_barang` 
        //     SET `is_deleted`='1',`updated_at`=NOW(),`updated_by`='$id_user' 
        //     WHERE `no_transfer_slip`='$data[no_transfer_slip]'
        // ";
        $sql1 = "
            DELETE FROM `tb_transfer_slip` 
            WHERE `no_transfer_slip`='$data[no_transfer_slip]'
        ";
        $sql = "
           DELETE FROM `tb_permintaan_barang`
            WHERE `no_transfer_slip`='$data[no_transfer_slip]'
        ";
        $this->db->query($sql);
        return $this->db->query($sql1);
    }

    public function jml_permintaan_barang($id_barang)
    {
        $sql = "
            SELECT sum(qty) tot_permintaan_barang FROM `tb_permintaan_barang` WHERE id_barang='$id_barang' AND is_deleted = 0";
        return $this->db->query($sql);
    }
    public function jml_permintaan_barang2($data)
    {
        $sql = "
            SELECT sum(a.qty) tot_permintaan_barang FROM `tb_permintaan_barang` a 
            LEFT JOIN tb_barang_masuk b ON a.id_barang_masuk = b.id_barang_masuk 
            WHERE b.id_barang ='$data[id_barang]' AND a.is_deleted = 0";
        return $this->db->query($sql);
    }
    public function ambil_transfer_slip($no_transfer_slip = null)
    {
        $sql = "
            SELECT a.*,b.nama_operator,b.alamat FROM tb_transfer_slip a
            LEFT JOIN tb_user b ON a.nama_operator = b.nama_operator
            WHERE a.is_deleted = 0 AND a.no_transfer_slip = '$no_transfer_slip' ORDER BY a.created_at DESC";
        return $this->db->query($sql);
    }
}
