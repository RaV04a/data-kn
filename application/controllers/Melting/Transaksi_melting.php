<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi_melting extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        // check_not_login();
        $this->load->model('M_melting/M_permintaan_barang_melting');
        $this->load->model('M_users/M_users');
    }
    private function convertDate($date)
    {
        return explode('/', $date)[2] . "-" . explode('/', $date)[1] . "-" . explode('/', $date)[0];
    }

    function id_user()
    {
        return $this->session->userdata("id_user");
    }

    public function update()
    {
        $data['id_permintaan_barang'] = $this->input->post('id_permintaan_barang', TRUE);
        $data['no_batch'] = $this->input->post('no_batch', TRUE);
        $data['tgl'] = $this->convertDate($this->input->post('tgl', TRUE));
        $data['id_barang'] = $this->input->post('id_barang', TRUE);
        $data['id_supplier'] = $this->input->post('id_supplier', TRUE);
        $data['status'] = $this->input->post('status', TRUE);
        $data['qty'] = $this->input->post('qty', TRUE);
        $this->M_barang_masuk->update($data);
    }
    public function delete($no_transfer_slip)
    {
        $data['no_transfer_slip'] = str_replace('--', '/', $no_transfer_slip);
        $this->M_permintaan_barang_melting->delete($data);
    }

    public function cek_stok()
    {
        $qty_dibutuhkan = $this->input->post('qty_dibutuhkan', TRUE);
        $id_mm = $this->input->post('id_mm', TRUE);
        $melting_masuk = $this->M_transaksi_melting->qty_masuk($id_mm)->row_array();
        $melting_keluar = $this->M_transaksi_melting->qty_keluar($id_mm)->row_array();
        if ($melting_keluar['tot_keluar'] === NULL) {
            $melting_keluar['tot_keluar'] = 0;
        }
        $stok = $melting_masuk['tot_masuk'] - $melting_keluar['tot_keluar'];
        // $row = $this->M_transaksi_melting->cek_stok($id_mm)->row_array();
        if ($qty_dibutuhkan >= $stok) {
            echo "false";
        } else {
            echo "true";
        }
    }
}
