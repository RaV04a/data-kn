<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_hasil_pemeriksaan_pw extends CI_Model
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
            SELECT a.*,b.id_barang,b.id_pb,b.tgl,b.no_surat_jalan,b.no_batch,b.status,b.dok_pendukung,b.op_gudang,b.jenis_kemasan,b.jml_kemasan,b.ditolak_kemasan,b.qty,b.ditolak_qty,b.exp,b.mfg,b.tutup,b.wadah,b.label,c.nama_supplier,d.nama_barang,d.jenis_bahan FROM tb_hasil_ujipewarna a
            LEFT JOIN tb_pemeriksaan_bahan b ON a.id_barang = b.id_barang
            LEFT JOIN tb_supplier c ON a.id_supplier = c.id_supplier
            LEFT JOIN tb_barang d ON a.id_barang = d.id_barang
            WHERE a.is_deleted = 0 ORDER BY a.tgl_uji ASC";
        return $this->db->query($sql);
    }

    public function add_ujipw($data)
    {
        $id_user = $this->id_user();
        $sql = "
        INSERT INTO `tb_hasil_ujipewarna`(`id_pb`,`id_barang`,`id_supplier`,`tgl_uji`,`no_analis`,`penguji`,`pemerian`,`kelarutan`, `ident_air`,`ident_hcip`,`ident_naohp`,`ident_h2so4p`,`ident_t_larutan`,`s_pengeringan`,`p_kadar`,`kesamaan_std`,`kondisi_py`) 
        VALUES ('$data[id_pb]','$data[id_barang]','$data[id_supplier]','$data[tgl_uji]','$data[no_analis]','$data[nama_operator]','$data[pemerian]','$data[kelarutan]','$data[ident_air]','$data[ident_hcip]','$data[ident_naohp]','$data[ident_h2so4p]','$data[ident_t_larutan]','$data[s_pengeringan]','$data[p_kadar]','$data[kesamaan_std]','$data[kondisi_py]')
        ";
        return $this->db->query($sql);
    }

    public function approval_rilis($data)
    {
        $id_user = $this->id_user();
        // $sql = "
        // INSERT INTO `tb_barang_masuk`(`no_batch`,`no_surat_jalan`, `tgl`, `nama_barang`, `nama_supplier`, `op_gudang`, `dok_pendukung`, `jenis_kemasan`, `jml_kemasan`, `tutup`, `wadah`, `label`, `qty`,`exp`, `mfg`, `created_at`, `created_by`, `updated_at`, `updated_by`, `is_deleted`,`tgl_rilis`) 
        // VALUES ('$data[no_batch]','$data[no_surat_jalan]','$data[tgl]','$data[id_barang]','$data[id_supplier]','$data[op_gudang]','$data[dok_pendukung]','$data[jenis_kemasan]','$data[jml_kemasan]','$data[tutup]','$data[wadah]','$data[label]','$data[qty]','$data[exp]','$data[mfg]',NOW(),'$id_user','0000-00-00 00:00:00','','0','$data[tgl_rilis]')
        // ";
        $sql = "
        UPDATE `tb_hasil_ujipewarna`
        SET `tgl_rilis`='$data[tgl_rilis]',`tgl_uu`='$data[tgl_uu]'
        WHERE `id_ujipewarna`='$data[id_ujipewarna]';
        ";
        return $this->db->query($sql);
    }

    public function approval_ditolak($data)
    {
        $id_user = $this->id_user();
        $sql = "
        UPDATE `tb_hasil_ujipewarna`
        SET `tgl_reject`='$data[tgl_reject]'
        WHERE `id_ujipewarna`='$data[id_ujipewarna]';
        ";
        return $this->db->query($sql);
    }

    public function ambil_label($no_surat_jalan)
    {
        $sql = "
        SELECT a.*,b.id_pb,b.no_batch,b.tgl,b.status,b.dok_pendukung,b.op_gudang,b.jenis_kemasan,b.jml_kemasan,b.jml_kemasan,b.qty,b.exp,b.mfg,b.tutup,b.wadah,b.label,c.nama_supplier,d.nama_barang,d.satuan,d.qty_pack FROM tb_hasil_ujipewarna a
        LEFT JOIN tb_pemeriksaan_bahan b ON a.id_barang = b.id_barang
        LEFT JOIN tb_supplier c ON a.id_supplier = c.id_supplier
        LEFT JOIN tb_barang d ON a.id_barang = d.id_barang
            WHERE a.is_deleted = 0 AND b.no_surat_jalan = '$no_surat_jalan' ORDER BY a.tgl_uji ASC";
        return $this->db->query($sql);
    }

    public function ambil_hasil($no_surat_jalan)
    {
        $sql = "
        SELECT a.*,b.id_pb,b.no_batch,b.tgl,b.status,b.dok_pendukung,b.op_gudang,b.jenis_kemasan,b.jml_kemasan,b.jml_kemasan,b.qty,b.exp,b.mfg,b.tutup,b.wadah,b.label,c.nama_supplier,d.nama_barang,d.satuan,d.nama_produsen,d.negara_produsen FROM tb_hasil_ujipewarna a
        LEFT JOIN tb_pemeriksaan_bahan b ON a.id_barang = b.id_barang
        LEFT JOIN tb_supplier c ON a.id_supplier = c.id_supplier
        LEFT JOIN tb_barang d ON a.id_barang = d.id_barang
            WHERE a.is_deleted = 0 AND b.no_surat_jalan = '$no_surat_jalan' ORDER BY a.tgl_uji ASC";
        return $this->db->query($sql);
    }
}
