<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang_stok extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        // check_not_login();
        $this->load->model('M_gudang_bahanbaku/M_barang');
        $this->load->model('M_gudang_bahanbaku/M_barang_masuk');
        $this->load->model('M_gudang_bahanbaku/M_permintaan_barang_gudang');
    }

    public function index()
    {
        // $data['row'] = $this->customer_m->get();
        $data['result'] = $this->M_barang->get()->result_array();
        // $data['res_permintaan'] = $this->M_barang->get_per()->result_array();
        for ($i = 0; $i < count($data['result']); $i++) {
            $id_barang = $data['result'][$i]['id_barang'];

            $jml_permintaan_barang = $this->M_permintaan_barang_gudang->jml_permintaan_barang($id_barang)->row_array();
            $stok = $data['result'][$i]['qty'] - $jml_permintaan_barang['tot_permintaan_barang'];
            $data['result'][$i]['tot_permintaan_barang'] = $jml_permintaan_barang['tot_permintaan_barang'];
            $data['result'][$i]['sisa'] = $stok;
        }
        $this->template->load('template', 'content/gudang_bahanbaku/barang/barang_stok', $data);
    }

    public function update()
    {
        $data['id_barang'] = $this->input->post('id_barang', TRUE);
        $data['kode'] = $this->input->post('kode', TRUE);
        $data['nama'] = $this->input->post('nama', TRUE);
        $data['satuan'] = $this->input->post('satuan', TRUE);
        $respon = $this->M_barang->update($data);
        // echo $respon;
        if ($respon) {
            header('location:' . base_url('gudang_bahanbaku/barang') . '?alert=success&msg=Selamat anda berhasil meng-update customer');
        } else {
            header('location:' . base_url('gudang_bahanbaku/barang') . '?alert=error&msg=Maaf anda gagal meng-update customer');
        }
    }
}
