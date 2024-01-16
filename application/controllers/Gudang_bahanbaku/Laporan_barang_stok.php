<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_barang_stok extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        // check_not_login();
        $this->load->model('M_gudang_bahanbaku/M_barang');
        $this->load->model('M_gudang_bahanbaku/M_laporan_barang_stok');
    }

    public function index($tgl = null)
    {
        // $data['row'] = $this->customer_m->get();
        $data['result'] = $this->M_laporan_barang_stok->get($tgl);
        // for ($i = 0; $i < count($data['result']); $i++) {
        //     $d['id_barang'] = $data['result'][$i]['id_barang'];
        //     $d['tgl'] = $tgl;
        //     $jml_barang_masuk = $this->M_laporan_barang_stok->jml_barang_masuk($d)->row_array();
        //     $jml_barang_keluar = $this->M_laporan_barang_stok->jml_barang_keluar2($d)->row_array();
        //     // $a=0;
        //     // for($o=0; $o<count($donasi);$o++){
        //     //     $a+=$donasi[$o]['donasi'];
        //     // }

        //     $data['result'][$i]['masuk'] = $jml_barang_masuk['tot_barang_masuk'];
        //     $data['result'][$i]['keluar'] = $jml_barang_keluar['tot_barang_keluar'];
        //     $data['result'][$i]['stok'] = $jml_barang_masuk['tot_barang_masuk'] - $jml_barang_keluar['tot_barang_keluar'];

        //     // $stok=$data['result'][$i]['qty']-$jml_barang_keluar['tot_barang_keluar'];
        //     // $data['result'][$i]['tot_barang_keluar']=$jml_barang_keluar['tot_barang_keluar'];
        //     // $data['result'][$i]['stok']=$stok;
        // }
        $data['tgl'] = $tgl;
        $this->template->load('template', 'content/gudang_bahanbaku/barang/laporan_barang_stok', $data);
        // print_r($data);

    }

    public function pdf_laporan_barang_stok($tgl = null)
    {
        $mpdf = new \Mpdf\Mpdf();

        $data['result'] = $this->M_laporan_barang_stok->get($tgl);
        // for ($i = 0; $i < count($data['result']); $i++) {
        //     $d['id_barang'] = $data['result'][$i]['id_barang'];
        //     $d['tgl'] = $tgl;
        //     $jml_barang_masuk = $this->M_laporan_barang_stok->jml_barang_masuk($d)->row_array();
        //     $jml_barang_keluar = $this->M_laporan_barang_stok->jml_barang_keluar2($d)->row_array();
        //     $data['result'][$i]['masuk'] = $jml_barang_masuk['tot_barang_masuk'];
        //     $data['result'][$i]['keluar'] = $jml_barang_keluar['tot_barang_keluar'];
        //     $data['result'][$i]['stok'] = $jml_barang_masuk['tot_barang_masuk'] - $jml_barang_keluar['tot_barang_keluar'];
        // }
        $data['tgl'] = $tgl;

        $d = $this->load->view('laporan/barang/page_laporan_barang_stok', $data, TRUE);
        $mpdf->AddPage("P", "", "", "", "", "15", "15", "5", "15", "", "", "", "", "", "", "", "", "", "", "", "A4");
        $mpdf->setFooter('Halaman {PAGENO}');
        $mpdf->WriteHTML($d);
        $mpdf->Output();
    }
}
