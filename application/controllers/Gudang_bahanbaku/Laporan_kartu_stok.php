<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_kartu_stok extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        // check_not_login();
        $this->load->model('M_gudang_bahanbaku/M_barang');
        $this->load->model('M_gudang_bahanbaku/M_laporan_kartu_stok');
    }

    public function index($tgl = null, $tgl2 = null)
    {
        // $data['row'] = $this->customer_m->get();

        $tgl_sebelum = date('Y-m-d', strtotime('-1 days', strtotime($tgl)));
        $data['result'] = $this->M_barang->get()->result_array();
        for ($i = 0; $i < count($data['result']); $i++) {
            $d['id_barang'] = $data['result'][$i]['id_barang'];
            $d['tgl'] = $tgl_sebelum;
            $jml_barang_masuk = $this->M_laporan_kartu_stok->jml_barang_masuk($d)->row_array();
            $jml_barang_keluar = $this->M_laporan_kartu_stok->jml_barang_keluar($d)->row_array();

            // $data['result'][$i]['masuk'] = $jml_barang_masuk['tot_barang_masuk'];
            // $data['result'][$i]['keluar'] = $jml_barang_keluar['tot_barang_keluar'];
            $data['result'][$i]['stok'] = $jml_barang_masuk['tot_barang_masuk'] - $jml_barang_keluar['tot_barang_keluar'];

            $d['tgl1'] = $tgl;
            $d['tgl2'] = $tgl2;
            $jml_barang_masuk_setelah = $this->M_laporan_kartu_stok->jml_barang_masuk_setelah($d)->row_array();
            $jml_barang_keluar_setelah = $this->M_laporan_kartu_stok->jml_barang_keluar_setelah($d)->row_array();

            $data['result'][$i]['masuk'] = $jml_barang_masuk_setelah['tot_barang_masuk'];
            $data['result'][$i]['keluar'] = $jml_barang_keluar_setelah['tot_barang_keluar'];
        }
        $data['tgl'] = $tgl;
        $data['tgl2'] = $tgl2;

        $this->template->load('template', 'content/gudang_bahanbaku/barang/laporan_kartu_stok', $data);
    }

    public function pdf_laporan_kartu_stok($tgl = null, $tgl2 = null)
    {
        $mpdf = new \Mpdf\Mpdf();

        $tgl_sebelum = date('Y-m-d', strtotime('-1 days', strtotime($tgl)));
        $data['result'] = $this->M_barang->get()->result_array();
        for ($i = 0; $i < count($data['result']); $i++) {
            $d['id_barang'] = $data['result'][$i]['id_barang'];
            $d['tgl'] = $tgl_sebelum;
            $jml_barang_masuk = $this->M_laporan_kartu_stok->jml_barang_masuk($d)->row_array();
            $jml_barang_keluar = $this->M_laporan_kartu_stok->jml_barang_keluar($d)->row_array();
            $data['result'][$i]['stok'] = $jml_barang_masuk['tot_barang_masuk'] - $jml_barang_keluar['tot_barang_keluar'];

            $d['tgl1'] = $tgl;
            $d['tgl2'] = $tgl2;
            $jml_barang_masuk_setelah = $this->M_laporan_kartu_stok->jml_barang_masuk_setelah($d)->row_array();
            $jml_barang_keluar_setelah = $this->M_laporan_kartu_stok->jml_barang_keluar_setelah($d)->row_array();

            $data['result'][$i]['masuk'] = $jml_barang_masuk_setelah['tot_barang_masuk'];
            $data['result'][$i]['keluar'] = $jml_barang_keluar_setelah['tot_barang_keluar'];
        }
        $data['tgl'] = $tgl;
        $data['tgl2'] = $tgl2;

        $d = $this->load->view('laporan/barang/page_laporan_kartu_stok', $data, TRUE);
        $mpdf->AddPage("P", "", "", "", "", "15", "15", "5", "15", "", "", "", "", "", "", "", "", "", "", "", "A4");
        $mpdf->setFooter('Halaman {PAGENO}');
        $mpdf->WriteHTML($d);
        $mpdf->Output();
    }
}
