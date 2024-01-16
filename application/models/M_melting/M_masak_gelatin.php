<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_masak_gelatin extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    function id_user()
    {
        return $this->session->userdata("id_user");
    }

    public function get()
    {
        $sql = "
        SELECT a.*,b.no_transfer_slip,c.nama_barang FROM tb_masak_gelatin a
        LEFT JOIN tb_melting_masuk b ON a.id_mm = b.id_mm
        LEFT JOIN tb_barang c ON b.id_barang = c.id_barang
        WHERE a.is_deleted = 0 GROUP BY a.batch_masak ORDER BY a.tgl_masak ASC";

        return $this->db->query($sql);
    }

    public function get_by_batch($batch_masak)
    {
        $this->db->select('id_ts_melt');
        $this->db->where('batch_masak', $batch_masak);
        return $this->db->get('tb_masak_gelatin')->result_array();
    }

    public function get_detail_gel($batch_masak)
    {
        $sql = "
        SELECT a.*,c.nama_barang,c.jenis_gel FROM tb_masak_gelatin a
        LEFT JOIN tb_melting_masuk b ON a.id_mm = b.id_mm
        LEFT JOIN tb_barang c ON b.id_barang = c.id_barang
        WHERE a.batch_masak = '$batch_masak' AND c.jenis_bahan = 'Bahan Baku' ORDER BY a.tgl_masak ASC";

        return $this->db->query($sql);
    }

    public function get_detail_bt($batch_masak)
    {
        $sql = "
        SELECT a.*,c.nama_barang,c.jenis_gel FROM tb_masak_gelatin a
        LEFT JOIN tb_melting_masuk b ON a.id_mm = b.id_mm
        LEFT JOIN tb_barang c ON b.id_barang = c.id_barang
        WHERE a.batch_masak = '$batch_masak' AND c.jenis_bahan = 'Bahan Tambahan' ORDER BY a.tgl_masak ASC";

        return $this->db->query($sql);
    }

    public function add($data)
    {
        $id_user = $this->id_user();
        $sql = "
        INSERT INTO `tb_masak_gelatin`(`id_ts_melt`, `tgl_masak`, `shift`, `batch_masak`,`id_mm`,`jml_bahan`,`jml_air`,`temp_pel`,`jam_gel`,`jam_bt`,`mixing1`,`mixing2`,`vac1`,`vac2`,`scala_vac`,`visco_cps`,`visco_c`,`suhu_ruang`,`kel_ruang`,`keb_melter`,`label_bersih`,`op1`,`op2`,`supervisor`,`created_at`, `created_by`, `updated_at`, `updated_by`, `is_deleted`) 
        VALUES ('$data[id_transaksi]','$data[tgl_masak]','$data[shift]','$data[batch_masak]','$data[id_mm]','$data[jml_bahan]','$data[jml_air]','$data[temp_pel]','$data[jam_gel]','$data[jam_bt]','$data[mixing1]','$data[mixing2]','$data[vac1]','$data[vac2]','$data[scala_vac]','$data[visco_cps]','$data[visco_c]','$data[suhu_ruang]','$data[kel_ruang]','$data[keb_melter]','$data[label_bersih]','$data[op1]','$data[op2]','$data[supervisor]',NOW(),'$id_user','0000-00-00 00:00:00','','0')
        ";

        return $this->db->query($sql);
    }

    public function update($data)
    {
        $id_user = $this->id_user();
        $sql = "
            UPDATE `tb_masak_gelatin` 
            SET `tgl_masak`='$data[tgl_masak]',
                `shift`='$data[shift]',
                `batch_masak`='$data[batch_masak]',
                `jml_air`='$data[jml_air]',
                `temp_pel`='$data[temp_pel]',
                `jam_gel`='$data[jam_gel]',
                `jam_bt`='$data[jam_bt]',
                `mixing1`='$data[mixing1]',
                `mixing2`='$data[mixing2]',
                `vac1`='$data[vac1]',
                `vac2`='$data[vac2]',
                `scala_vac`='$data[scala_vac]',
                `visco_cps`='$data[visco_cps]',
                `visco_c`='$data[visco_c]',
                `suhu_ruang`='$data[suhu_ruang]',
                `kel_ruang`='$data[kel_ruang]',
                `keb_melter`='$data[keb_melter]',
                `label_bersih`='$data[label_bersih]',
                `op1`='$data[op1]',
                `op2`='$data[op2]',
                `supervisor`='$data[supervisor]',
                `updated_at`= NOW(),`updated_by`='$id_user' 
                 WHERE `id_masak_gel`='$data[id_masak_gel]'
        ";
        return $this->db->query($sql);
    }


    public function delete($batch_masak)
    {
        $id_user = $this->id_user();
        $sql = "
        DELETE FROM `tb_masak_gelatin`
         WHERE `batch_masak`='$batch_masak'
        ";
        return $this->db->query($sql);
    }
}
