<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Permintaan_barang_melting extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        // check_not_login();
        $this->load->model('M_melting/M_permintaan_barang_melting');
        $this->load->model('M_gudang_bahanbaku/M_permintaan_barang_gudang');
        $this->load->model('M_gudang_bahanbaku/M_barang_masuk');
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
        $data['result'] = $this->M_permintaan_barang_melting->get1()->result_array();
        $data['user'] = $this->M_users->get()->result_array();
        $data['bm'] = $this->M_barang_masuk->get()->result_array(); {
            // for ($i = 0; $i < count($data['bm']); $i++) {
            //     $d['no_batch'] = $data['bm'][$i]['no_batch'];
            //     $jml_permintaan_barang = $this->M_permintaan_barang_gudang->jml_permintaan_barang($d)->row_array();
            //     $stok = $data['bm'][$i]['qty'] - $jml_permintaan_barang['tot_permintaan_barang'];
            //     $data['bm'][$i]['stok'] = $stok;
            // }
        }

        $this->template->load('template', 'content/melting/permintaan_barang_melting/permintaan_barang_melting_data', $data);
        // print_r($data['bm']);
    }
    public function data_permintaan_barang()
    {
        $no_transfer_slip = $this->input->post('no_transfer_slip', TRUE);

        $result = $this->M_permintaan_barang_melting->data_permintaan_barang($no_transfer_slip)->result_array();
        /*for($i=0; $i<count($result);$i++){
            $data['id_penerima'] = $result[$i]['id_penerima'];
            $donasi = $this->m_penerima->data_donasi($data)->result_array();
            $a=0;
            for($o=0; $o<count($donasi);$o++){
                $a+=$donasi[$o]['donasi'];
            }
            $result[$i]['hasil_donasi']=$a;
        }*/
        echo json_encode($result);
    }
    public function cek_transfer_slip()
    {
        $no_transfer_slip = $this->input->post('no_transfer_slip', TRUE);

        $row = $this->M_permintaan_barang_melting->cek_transfer_slip($no_transfer_slip)->row_array();
        if ($row['count_sj'] == 0) {
            echo "false";
        } else {
            echo "true";
        }
    }
    public function add()
    {
        $data['no_transfer_slip'] = $this->input->post('no_transfer_slip', TRUE);
        $data['nama_operator'] = $this->input->post('nama_operator', TRUE);
        $data['tgl'] = $this->convertDate($this->input->post('tgl', TRUE));
        $data['id_barang_masuk'] = $this->input->post('id_barang_masuk', TRUE);
        $data['id_barang'] = $this->input->post('id_barang', TRUE);
        $data['id_supplier'] = $this->input->post('id_supplier', TRUE);
        $data['no_batch'] = $this->input->post('no_batch', TRUE);
        $data['qty'] = $this->input->post('qty', TRUE);

        // print_r($data['no_batch']);

        // echo $data['tgl'];
        $respon = $this->M_permintaan_barang_melting->add_transfer_slip($data);


        if ($respon) {
            for ($i = 0; $i < count($data['qty']); $i++) {
                // echo $data['qty'][$i]."<br>";
                $d['no_transfer_slip'] = $data['no_transfer_slip'];
                $d['tgl'] = $data['tgl'];
                $d['id_barang_masuk'] = $data['id_barang_masuk'][$i];
                $d['id_barang'] = $data['id_barang'][$i];
                $d['id_supplier'] = $data['id_supplier'][$i];
                $d['no_batch'] = $data['no_batch'][$i];
                $d['qty'] = $data['qty'][$i];

                $respon = $this->M_permintaan_barang_gudang->add_permintaan_barang($d);
            }
            header('location:' . base_url('melting/permintaan_barang_melting') . '?alert=success&msg=Selamat anda berhasil menambah Permintaan Barang Melting');
        } else {
            header('location:' . base_url('melting/permintaan_barang_melting') . '?alert=error&msg=Maaf anda gagal menambah Permintaan Barang Melting');
        }
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
        $respon = $this->M_barang_masuk->update($data);

        if ($respon) {
            header('location:' . base_url('melting/Permintaan_barang_melting') . '?alert=success&msg=Selamat anda berhasil meng-update Permintaan Barang Melting');
        } else {
            header('location:' . base_url('melting/Permintaan_barang_melting') . '?alert=error&msg=Maaf anda gagal meng-update Permintaan Barang Melting');
        }
    }
    public function delete($no_transfer_slip)
    {
        $data['no_transfer_slip'] = str_replace('--', '/', $no_transfer_slip);
        $respon = $this->M_permintaan_barang_melting->delete($data);

        if ($respon) {
            header('location:' . base_url('melting/permintaan_barang_melting') . '?alert=success&msg=Selamat anda berhasil menghapus Permintaan Barang Melting');
        } else {
            header('location:' . base_url('melting/permintaan_barang_melting') . '?alert=error&msg=Maaf anda gagal menghapus Permintaan Barang Melting');
        }
        // echo $no_transfer_slip;
    }
}
