<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_tambah_schedule extends CI_Model
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
        SELECT a.*,b.kode_warna_cap,b.warna_cap,c.kode_warna_body,c.warna_body,d.nama_customer,d.negara FROM tb_schedulemarketing a
            LEFT JOIN tb_kw_cap b ON a.id_kw_cap = b.id_kw_cap
            LEFT JOIN tb_kw_body c ON a.id_kw_body = c.id_kw_body
            LEFT JOIN tb_customer d ON a.id_customer = d.id_customer
            WHERE a.is_deleted = 0 ORDER BY a.created_at ASC";
        return $this->db->query($sql);
    }

    public function add($data)
    {
        $id_user = $this->id_user();
        $sql = "
        INSERT INTO `tb_schedulemarketing`(`id_customer`, `id_kw_cap`, `id_kw_body`, `no_cr`,`no_batch`,`tgl_sch`,`size`,`mesin`,`jumlah`,`cek_print`, `print`,`tinta`,`jenis_box`,`jenis_zak`,`tgl_kirim`,`keterangan`,`tgl_prd`,`minyak`,`sisa`,`created_at`, `created_by`, `updated_at`, `updated_by`, `is_deleted`) 
        VALUES ('$data[id_customer]','$data[id_kw_cap]','$data[id_kw_body]','$data[no_cr]','$data[no_batch]','$data[tgl_sch]','$data[size]','$data[mesin]','$data[jumlah]','$data[cek_print]','$data[print]','$data[tinta]','$data[jenis_box]','$data[jenis_zak]','$data[tgl_kirim]','$data[keterangan]','$data[tgl_prd]','$data[minyak]','$data[sisa]',NOW(),'$id_user','0000-00-00 00:00:00','','0')
        ";

        return $this->db->query($sql);
    }
    public function update($data)
    {
        $id_user = $this->id_user();
        $sql = "
            UPDATE `tb_schedulemarketing` 
            SET `id_customer`='$data[id_customer]',
                `id_kw_cap`='$data[id_kw_cap]',
                `id_kw_body`='$data[id_kw_body]',
                `no_cr`='$data[no_cr]',
                `no_batch`='$data[no_batch]',
                `tgl_sch`='$data[tgl_sch]',
                `size`='$data[size]',
                `mesin`='$data[mesin]',
                `jumlah`='$data[jumlah]',
                `sisa`='$data[sisa]',
                `cek_print`='$data[cek_print]',
                `print`='$data[print]',
                `tinta`='$data[tinta]',
                `jenis_box`='$data[jenis_box]',
                `jenis_zak`='$data[jenis_zak]',
                `tgl_kirim`='$data[tgl_kirim]',
                `keterangan`='$data[keterangan]',
                `tgl_prd`='$data[tgl_prd]',
                `minyak`='$data[minyak]',
                `updated_at`= NOW(),`updated_by`='$id_user' 
            WHERE `id_sch`='$data[id_sch]'
        ";
        return $this->db->query($sql);
        // return $sql;
    }

    public function cek_no_cr($no_cr)
    {
        $sql = "
            SELECT COUNT(a.no_cr) count_cr FROM tb_schedulemarketing a
            WHERE a.no_cr = '$no_cr' AND a.is_deleted = 0";
        return $this->db->query($sql);
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
        DELETE FROM `tb_schedulemarketing`
         WHERE `id_sch`='$data[id_sch]'
        ";
        return $this->db->query($sql);
    }
}
