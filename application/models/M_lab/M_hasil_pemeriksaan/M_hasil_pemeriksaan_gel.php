<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_hasil_pemeriksaan_gel extends CI_Model
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
            SELECT a.*,b.tgl,b.no_surat_jalan,b.no_batch,b.status,b.dok_pendukung,b.op_gudang,b.jenis_kemasan,b.jml_kemasan,b.jml_kemasan,b.ditolak_kemasan,b.qty,b.ditolak_qty,b.exp,b.mfg,b.tutup,b.wadah,b.label,c.nama_supplier,d.nama_barang,d.jenis_bahan FROM tb_hasil_ujigel a
            LEFT JOIN tb_pemeriksaan_bahan b ON a.id_pb = b.id_pb
            LEFT JOIN tb_supplier c ON a.id_supplier = c.id_supplier
            LEFT JOIN tb_barang d ON a.id_barang = d.id_barang
            WHERE a.is_deleted = 0 ORDER BY a.tgl_uji ASC";
        return $this->db->query($sql);
    }

    public function add_ujigel($data)
    {
        $id_user = $this->id_user();
        $sql = "
        INSERT INTO `tb_hasil_ujigel`(`id_pb`,`id_barang`,`id_supplier`,`tgl_uji`,`no_analis`,`penguji`,`pemerian`,`kelarutan`, `identifikasi`, `bauzat_tl_air`, `trans_larutan`, `s_pengeringan`, `bloom_st`, `viscost`, `viscost_bd`, `ph`, `t_isl`, `sett_point`, `keasaman`,`sulfur_do`, `sisa_pmj`, `uk_part_mesh4`, `uk_part_mesh40`, `kndtv`, `arsen`, `timbal`, `peroksida`, `besi`, `cromium`, `zinc`, `cm_dna_babi`, `m_tb`, `m_akk`, `m_ec`, `m_salmon`, `wd_py`) 
        VALUES ('$data[id_pb]','$data[id_barang]','$data[id_supplier]','$data[tgl_uji]','$data[no_analis]','$data[nama_operator]','$data[pemerian]','$data[kelarutan]','$data[identifikasi]','$data[bauzat_tl_air]','$data[trans_larutan]','$data[s_pengeringan]','$data[bloom_st]','$data[viscost]','$data[viscost_bd]','$data[ph]','$data[t_isl]','$data[sett_point]','$data[keasaman]','$data[sulfur_do]','$data[sisa_pmj]','$data[uk_part_mesh4]','$data[uk_part_mesh40]','$data[kndtv]','$data[arsen]','$data[timbal]','$data[peroksida]','$data[besi]', '$data[cromium]', '$data[zinc]','$data[cm_dna_babi]','$data[m_tb]','$data[m_akk]','$data[m_ec]','$data[m_salmon]','$data[wd_py]')
        ";
        return $this->db->query($sql);
    }

    public function approval_rilis($data)
    {
        $sql = "
        UPDATE `tb_hasil_ujigel`
        SET `tgl_rilis`='$data[tgl_rilis]',`tgl_uu`='$data[tgl_uu]'
        WHERE `id_ujigel`='$data[id_ujigel]';
        ";
        return $this->db->query($sql);
    }

    public function approval_ditolak($data)
    {
        $id_user = $this->id_user();
        $sql = "
        UPDATE `tb_hasil_ujigel`
        SET `tgl_reject`='$data[tgl_reject]'
        WHERE `id_ujigel`='$data[id_ujigel]';
        ";
        return $this->db->query($sql);
    }

    public function ambil_label($no_surat_jalan)
    {
        $sql = "
        SELECT a.*,b.id_pb,b.no_batch,b.tgl,b.status,b.dok_pendukung,b.op_gudang,b.jenis_kemasan,b.jml_kemasan,b.jml_kemasan,b.qty,b.exp,b.mfg,b.tutup,b.wadah,b.label,c.nama_supplier,d.nama_barang,d.satuan,d.qty_pack FROM tb_hasil_ujigel a
        LEFT JOIN tb_pemeriksaan_bahan b ON a.id_barang = b.id_barang
        LEFT JOIN tb_supplier c ON a.id_supplier = c.id_supplier
        LEFT JOIN tb_barang d ON a.id_barang = d.id_barang
            WHERE a.is_deleted = 0 AND b.no_surat_jalan = '$no_surat_jalan' ORDER BY a.tgl_uji ASC";
        return $this->db->query($sql);
    }

    public function ambil_hasil($no_surat_jalan)
    {
        $sql = "
        SELECT a.*,b.id_pb,b.no_batch,b.tgl,b.status,b.dok_pendukung,b.op_gudang,b.jenis_kemasan,b.jml_kemasan,b.jml_kemasan,b.qty,b.exp,b.mfg,b.tutup,b.wadah,b.label,c.nama_supplier,d.nama_barang,d.satuan,d.nama_produsen,d.negara_produsen,d.jenis_gel FROM tb_hasil_ujigel a
        LEFT JOIN tb_pemeriksaan_bahan b ON a.id_barang = b.id_barang
        LEFT JOIN tb_supplier c ON a.id_supplier = c.id_supplier
        LEFT JOIN tb_barang d ON a.id_barang = d.id_barang
            WHERE a.is_deleted = 0 AND b.no_surat_jalan = '$no_surat_jalan' ORDER BY a.tgl_uji ASC";
        return $this->db->query($sql);
    }
}
