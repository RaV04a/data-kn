<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Packing_masuk extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        // check_not_login();
		$this->load->model('M_packing/M_packing_masuk');
    }
    private function convertDate($date)
    {
        return explode('/', $date)[2] . "-" . explode('/', $date)[1] . "-" . explode('/', $date)[0];
    }
    public function index()
    {
        // $data['row'] = $this->customer_m->get();
        $data['result'] = $this->M_packing_masuk->get()->result_array();
        $this->template->load('template', 'content/packing/packing_masuk/packing_masuk_data', $data);
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
        $data['no_msk'] = $this->input->post('no_msk', TRUE);
        $data['size'] = $this->input->post('size', TRUE);
        $data['kw_cap'] = $this->input->post('kw_cap', TRUE);
        $data['kw_body'] = $this->input->post('kw_body', TRUE);
        $data['warna_cap'] = $this->input->post('warna_cap', TRUE);
        $data['warna_body'] = $this->input->post('warna_body', TRUE);
        $data['no_packing'] = $this->input->post('no_packing', TRUE);
        $data['no_batch'] = $this->input->post('no_batch', TRUE);
        $data['print'] = $this->input->post('print', TRUE);
        $data['jumlah'] = $this->input->post('jumlah', TRUE);
        $data['jenis_pack'] = $this->input->post('jenis_pack', TRUE);

        $respon = $this->M_packing_masuk->add($data);
        if ($respon) {
            header('location:' . base_url('packing/packing_masuk') . '?alert=success&msg=Selamat anda berhasil menambah Packing Masuk');
        } else {
            header('location:' . base_url('packing/packing_masuk') . '?alert=error&msg=Maaf anda gagal menambah Packing Masuk');
        }

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

    public function add_sk()
    {
        $data = $this->input->post();
        $data['id_pack'] = $this->input->post('id_pack', TRUE);
        $data['no_msk'] = $this->input->post('no_msk', TRUE);
        $data['tahun_sk'] = $this->input->post('tahun_sk', TRUE);

        $respon = $this->M_packing_masuk->add_sk($data);

        $this->M_packing_masuk->update_status_sk($data['id_pack'], "Done");

        if ($respon) {
            header('location:' . base_url('accounting/stock_keeper') . '?alert=success&msg=Selamat anda berhasil menambah Stock Keeper');
        } else {
            header('location:' . base_url('accounting/stock_keeper') . '?alert=error&msg=Maaf anda gagal menambah Stock Keeper');
        }

    }

    public function pm_approval($id_pack)
    {
        // $data['row'] = $this->customer_m->get();

        $data['result'] = $this->M_packing_masuk->get_approval($id_pack)->result_array();
        
        $this->template->load('template', 'content/packing/packing_masuk/pm_approval_data', $data);
        // print_r($data);
    }
}
