<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang_masuk extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        // check_not_login();
        $this->load->model('M_gudang_bahanbaku/M_barang_masuk');
        $this->load->model('M_gudang_bahanbaku/M_barang_keluar');
        $this->load->model('M_gudang_bahanbaku/M_permintaan_barang_gudang');
        $this->load->model('M_gudang_bahanbaku/M_barang');
        $this->load->model('M_purchasing/M_supplier');
        $this->load->model('M_users/M_users');
        $this->load->model('M_lab/M_pemeriksaan_bahan');
    }
    private function convertDate($date)
    {
        return explode('/', $date)[2] . "-" . explode('/', $date)[1] . "-" . explode('/', $date)[0];
    }
    public function index()
    {
        // $data['row'] = $this->customer_m->get();
        $data['result'] = $this->M_barang_masuk->get()->result_array();
        for ($i = 0; $i < count($data['result']); $i++) {
            $no_batch = $data['result'][$i]['no_batch'];
            $jml_barang_keluar = $this->M_barang_keluar->jml_barang_keluar($no_batch)->row_array();
            $stok = $data['result'][$i]['qty'] - $jml_barang_keluar['tot_barang_keluar'];
            $data['result'][$i]['tot_barang_keluar'] = $jml_barang_keluar['tot_barang_keluar'];
            $data['result'][$i]['sisa'] = $stok;
        }
        $data['res_barang'] = $this->M_barang->get()->result_array();
        $data['res_supplier'] = $this->M_supplier->get()->result_array();
        $data['res_user'] = $this->M_users->get()->result_array();
        $this->template->load('template', 'content/gudang_bahanbaku/barang_masuk/barang_masuk_data', $data);
        // print_r($data); 
    }

    public function getOne($id)
    {
        $data['detail'] = $this->M_barang_masuk->findOneById($id)->result_array()[0];
        $d['no_batch'] = $data['detail']['no_batch'];
        $jml_permintaan_barang = $this->M_permintaan_barang_gudang->jml_permintaan_barang($d)->row_array();
        $stok = $data['detail']['qty'] - $jml_permintaan_barang['tot_permintaan_barang'];
        $data['detail']['tot_permintaan_barang'] = $jml_permintaan_barang['tot_permintaan_barang'];
        $data['detail']['stok'] = $stok;
        echo json_encode($data);
        return;
    }

    public function add()
    {
        $data = $this->input->post();

        if ($data['wadah'] === "true") {
            $data['wadah'] = "Tidak Rusak";
        } else {
            $data['wadah'] = "Rusak";
        }

        if ($data['tutup'] === "true") {
            $data['tutup'] = "Rapat";
        } else {
            $data['tutup'] = "Tidak Rapat";
        }

        if ($data['label'] === "true") {
            $data['label'] = "Terbaca";
        } else {
            $data['label'] = "Tidak Terbaca";
        }

        $data['no_batch'] = $this->input->post('no_batch', TRUE);
        $data['no_surat_jalan'] = $this->input->post('no_surat_jalan', TRUE);
        $data['tgl'] = $this->convertDate($this->input->post('tgl', TRUE));
        $data['id_barang'] = $this->input->post('id_barang', TRUE);
        $data['id_supplier'] = $this->input->post('id_supplier', TRUE);
        $data['nama_operator'] = $this->input->post('op_gudang', TRUE);
        $data['dok_pendukung'] = implode(",", $this->input->post('dok_pendukung', TRUE));
        $data['tutup'];
        $data['wadah'];
        $data['label'];
        $data['qty'] = $this->input->post('diterima_bahan', TRUE);
        $data['ditolak_qty'] = $this->input->post('ditolak_bahan', TRUE);
        $data['jenis_kemasan'] = $this->input->post('jenis_kemasan', TRUE);
        $data['jml_kemasan'] = $this->input->post('diterima_kemasan', TRUE);
        $data['ditolak_kemasan'] = $this->input->post('ditolak_kemasan', TRUE);
        $data['exp'] = $this->convertDate($this->input->post('exp', TRUE));
        $data['mfg'] = $this->convertDate($this->input->post('mfg', TRUE));

        $respon = $this->M_pemeriksaan_bahan->add($data);
        if ($respon) {
            header('location:' . base_url('gudang_bahanbaku/barang_masuk') . '?alert=success&msg=Selamat anda berhasil menambah Barang Masuk');
        } else {
            header('location:' . base_url('gudang_bahanbaku/barang_masuk') . '?alert=error&msg=Maaf anda gagal menambah Barang Masuk');
        }
        // echo json_encode($data);
        // die;
    }
    public function update()
    {
        $data['id_barang_masuk'] = $this->input->post('id_barang_masuk', TRUE);
        $data['no_batch'] = $this->input->post('no_batch', TRUE);
        $data['no_surat_jalan'] = $this->input->post('no_surat_jalan', TRUE);
        $data['tgl'] = $this->convertDate($this->input->post('tgl', TRUE));
        $data['id_barang'] = $this->input->post('id_barang', TRUE);
        $data['id_supplier'] = $this->input->post('nama_supplier', TRUE);
        $data['nama_operator'] = $this->input->post('nama_operator', TRUE);
        $data['dok_pendukung'] = implode(",", $this->input->post('dok_pendukung', TRUE));
        $data['jenis_kemasan'] = $this->input->post('jenis_kemasan', TRUE);
        $data['jml_kemasan'] = $this->input->post('diterima_kemasan', TRUE);
        $data['ditolak_kemasan'] = $this->input->post('ditolak_kemasan', TRUE);
        $data['tutup'] = $this->input->post('tutup', TRUE);
        $data['wadah'] = $this->input->post('wadah', TRUE);
        $data['label'] = $this->input->post('label', TRUE);
        $data['qty'] = $this->input->post('diterima_bahan', TRUE);
        $data['ditolak_qty'] = $this->input->post('ditolak_bahan', TRUE);
        $data['exp'] = $this->convertDate($this->input->post('exp', TRUE));
        $data['mfg'] = $this->convertDate($this->input->post('mfg', TRUE));
        $respon = $this->M_barang_masuk->update($data);
        // echo $respon;
        if ($respon) {
            header('location:' . base_url('gudang_bahanbaku/Barang_masuk') . '?alert=success&msg=Selamat anda berhasil meng-update Barang Masuk');
        } else {
            header('location:' . base_url('gudang_bahanbaku/Barang_masuk') . '?alert=error&msg=Maaf anda gagal meng-update Barang Masuk');
        }
    }
    public function delete($id_barang_masuk)
    {
        $data['id_barang_masuk'] = $id_barang_masuk;
        $respon = $this->M_barang_masuk->delete($data);

        if ($respon) {
            header('location:' . base_url('gudang_bahanbaku/barang_masuk') . '?alert=success&msg=Selamat anda berhasil menghapus Barang Masuk');
        } else {
            header('location:' . base_url('gudang_bahanbaku/barang_masuk') . '?alert=error&msg=Maaf anda gagal menghapus Barang Masuk');
        }
    }
    public function cek_surat_jalan()
    {
        $no_surat_jalan = $this->input->post('no_surat_jalan', TRUE);
        $row = $this->M_barang_masuk->cek_surat_jalan($no_surat_jalan)->row_array();
        if ($row['count_sj'] == 0) {
            echo "false";
        } else {
            echo "true";
        }
    }
    public function cek_no_batch()
    {
        $no_batch = $this->input->post('no_batch', TRUE);
        $row = $this->M_barang_masuk->cek_no_batch($no_batch)->row_array();
        if ($row['count_sj'] == 0) {
            echo "false";
        } else {
            echo "true";
        }
    }
}
