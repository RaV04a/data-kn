<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_barang_masuk extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        // check_not_login();
        $this->load->model('M_gudang_bahanbaku/M_laporan_barang_masuk');
        $this->load->model('M_gudang_bahanbaku/M_barang_masuk');
        $this->load->model('M_gudang_bahanbaku/M_barang');
        $this->load->model('M_purchasing/M_supplier');
    }
    public function index()
    {
        $tgl = $this->input->get('date_from');
        $tgl2 = $this->input->get('date_until');
        $name = $this->input->get('name');

        $data['res_barang'] = $this->M_barang->get();
        $data['result'] = $this->M_laporan_barang_masuk->get($tgl, $tgl2, $name);
        $data['fil_barang'] = $this->M_laporan_barang_masuk->get_filter_brng()->result_array();
        $data['res_barang'] = $this->M_barang->get()->result_array();
        $data['res_supplier'] = $this->M_supplier->get()->result_array();

        $data['tgl'] = $tgl;
        $data['tgl2'] = $tgl2;
        $data['name'] = $name;
        $this->template->load('template', 'content/gudang_bahanbaku/barang_masuk/laporan_barang_masuk_data', $data);
    }

    public function pdf_laporan_barang_masuk($tgl = null, $tgl2 = null, $name = null)
    {
        $mpdf = new \Mpdf\Mpdf();

        $tgl = $this->input->get('date_from');
        $tgl2 = $this->input->get('date_until');
        $name = $this->input->get('name');

        $data['result'] = $this->M_laporan_barang_masuk->get($tgl, $tgl2, $name);
        // for ($i = 0; $i < count($data['result']); $i++) {
        //     $d['no_batch'] = $data['result'][$i]['no_batch'];
        //     $jml_barang_keluar = $this->M_barang_keluar->jml_barang_keluar($d)->row_array();
        //     $stok = $data['result'][$i]['qty'] - $jml_barang_keluar['tot_barang_keluar'];
        //     $data['result'][$i]['tot_barang_keluar'] = $jml_barang_keluar['tot_barang_keluar'];
        //     $data['result'][$i]['stok'] = $stok;
        // }
        $data['res_barang'] = $this->M_barang->get()->result_array();
        $data['res_supplier'] = $this->M_supplier->get()->result_array();

        $data['tgl'] = $tgl;
        $data['tgl2'] = $tgl2;
        $data['name'] = $name;

        $d = $this->load->view('laporan/barang_masuk/page_laporan_barang_masuk', $data, TRUE);
        $mpdf->AddPage("P", "", "", "", "", "15", "15", "5", "15", "", "", "", "", "", "", "", "", "", "", "", "A4");
        $mpdf->setFooter('Halaman {PAGENO}');
        $mpdf->WriteHTML($d);
        $mpdf->Output();
    }
}
