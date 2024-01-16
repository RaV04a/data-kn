<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_pewarnaan extends CI_Model
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
        SELECT * FROM tb_pewarnaan
        ";

        return $this->db->query($sql);
    }

    public function add($data)
    {
        $id_user = $this->id_user();
        $sql = "
        INSERT INTO `tb_pewarnaan`(`no_cr`, `batch_kapsul`, `stock_mesin`, `kode_warna`,`juml_gel`,`no_bg`,`recyc`,`juml_ex_gw`,`batch_ex_gw`, `berat_recyc`,`batch_recyc`,`jam_pewar`,`visc`,`juml_akhir`,`no_trans`, `nama_operator`, `created_at`, `created_by`, `updated_at`, `updated_by`, `is_deleted`)
        VALUES ('$data[no_cr]','$data[batch_kapsul]','$data[stock_mesin]','$data[kode_warna]','$data[juml_gel]','$data[no_bg]','$data[recyc]','$data[juml_ex_gw]','$data[batch_ex_gw]','$data[berat_recyc]','$data[batch_recyc]','$data[jam_pewar]','$data[visc]','$data[juml_akhir]','$data[no_trans]','$data[nama_operator]','NOW()','$id_user','0000-00-00 00:00:00','$id_user','0')
        ";

        return $this->db->query($sql);
    }
    public function update($data)
    {
        $id_user = $this->id_user();
        $sql = "
            UPDATE `tb_pewarnaan` 
            SET `no_cr`='$data[no_cr]',
                `batch_kapsul`='$data[batch_kapsul]',
                `stock_mesin`='$data[stock_mesin]',
                `kode_warna`='$data[kode_warna]',
                `juml_gel`='$data[juml_gel]',
                `no_bg`='$data[no_bg]',
                `recyc`='$data[recyc]',
                `juml_ex_gw`='$data[juml_ex_gw]',
                `batch_ex_gw`='$data[batch_ex_gw]',
                `berat_recyc`='$data[berat_recyc]',
                `batch_recyc`='$data[batch_recyc]',
                `jam_pewar`='$data[jam_pewar]',
                `visc`='$data[visc]',
                `juml_akhir`='$data[juml_akhir]',
                `no_trans`='$data[no_trans]',
                `nama_operator`='$data[nama_operator]',
                `updated_at` = NOW(),`updated_by`='$id_user' 
            WHERE `id_pewarna`='$data[id_pewarna]'
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
        DELETE FROM `tb_pewarnaan`
         WHERE `id_pewarna`='$data[id_pewarna]'
        ";
        return $this->db->query($sql);
    }

    // public function cek_kode_barang($kode_barang){
    //     $sql = "
    //         SELECT COUNT(a.kode_barang) count_sj FROM tb_barang a
    //         WHERE a.kode_barang = '$kode_barang' AND a.is_deleted = 0";
    //     return $this->db->query($sql);
    // }
}