<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mm_bt_td extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        // check_not_login();
        $this->load->model('M_melting/M_barang_masuk_melting');
        $this->load->model('M_gudang_bahanbaku/M_permintaan_barang_gudang');
        $this->load->model('M_melting/M_permintaan_barang_melting');
        $this->load->model('M_melting/M_transaksi_melting');
        $this->load->model('M_melting/M_penimbangan');
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
        $name = "Titanium Dioxide";
        $data['result'] = $this->M_barang_masuk_melting->get($name)->result_array();
        for ($i = 0; $i < count($data['result']); $i++) {
            $d['id_mm'] = $data['result'][$i]['id_mm'];
            $melting_masuk = $this->M_transaksi_melting->qty_masuk($d)->row_array();
            $melting_keluar = $this->M_transaksi_melting->qty_keluar($d)->row_array();
            if ($melting_keluar['tot_keluar'] === NULL) {
                $melting_keluar['tot_keluar'] = 0;
            }
            $stok = $melting_masuk['tot_masuk'] - $melting_keluar['tot_keluar'];
            $data['result'][$i]['sisa'] = $stok;
            $data['result'][$i]['masuk'] = $melting_masuk['tot_masuk'];
            $data['result'][$i]['keluar'] = $melting_keluar['tot_keluar'];
        }
        $data['res_barang'] = $this->M_barang->get()->result_array();
        $data['res_supplier'] = $this->M_supplier->get()->result_array();
        $data['res_user'] = $this->M_users->get()->result_array();
        $this->template->load('template', 'content/melting/barang_masuk_melting/masuk_melting_bahan_tambahan/mm_titanium_dioxide', $data);
        // print_r($data); 



    }

    public function update()
    {
        $data['id_barang_masuk'] = $this->input->post('id_barang_masuk', TRUE);
        $data['no_batch'] = $this->input->post('no_batch', TRUE);
        $data['no_surat_jalan'] = $this->input->post('no_surat_jalan', TRUE);
        $data['tgl'] = $this->convertDate($this->input->post('tgl', TRUE));
        $data['id_barang'] = $this->input->post('id_barang', TRUE);
        $data['id_supplier'] = $this->input->post('id_supplier', TRUE);
        $data['nama_operator'] = $this->input->post('nama_operator', TRUE);
        $data['dok_pendukung'] = implode(",", $this->input->post('dok_pendukung', TRUE));
        $data['jenis_kemasan'] = $this->input->post('jenis_kemasan', TRUE);
        $data['jml_kemasan'] = $this->input->post('jml_kemasan', TRUE);
        $data['tutup'] = $this->input->post('tutup', TRUE);
        $data['wadah'] = $this->input->post('wadah', TRUE);
        $data['label'] = $this->input->post('label', TRUE);
        $data['qty'] = $this->input->post('qty', TRUE);
        $data['exp'] = $this->convertDate($this->input->post('exp', TRUE));
        $data['mfg'] = $this->convertDate($this->input->post('mfg', TRUE));
        $respon = $this->M_barang_masuk->update($data);
        // echo $respon;
        if ($respon) {
            header('location:' . base_url('barang_masuk') . '?alert=success&msg=Selamat anda berhasil meng-update barang masuk');
        } else {
            header('location:' . base_url('barang_masuk') . '?alert=danger&msg=Maaf anda gagal meng-update barang masuk');
        }
    }
    public function delete($id_barang_masuk)
    {
        $data['id_barang_masuk'] = $id_barang_masuk;
        $respon = $this->M_barang_masuk->delete($data);

        if ($respon) {
            header('location:' . base_url('barang_masuk') . '?alert=success&msg=Selamat anda berhasil menghapus barang masuk');
        } else {
            header('location:' . base_url('barang_masuk') . '?alert=danger&msg=Maaf anda gagal menghapus barang masuk');
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
