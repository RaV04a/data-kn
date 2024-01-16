<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_barang_keluar extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        // check_not_login();
        $this->load->model('M_gudang_bahanbaku/M_laporan_barang_keluar');
        $this->load->model('M_gudang_bahanbaku/M_barang');
        $this->load->model('M_gudang_bahanbaku/M_barang_masuk');
        $this->load->model('M_users/M_users');
    }
    private function convertDate($date)
    {
        return explode('/', $date)[2] . "-" . explode('/', $date)[1] . "-" . explode('/', $date)[0];
    }
    public function index()
    {
        $tgl = $this->input->get('date_from');
        $tgl2 = $this->input->get('date_until');
        $name = $this->input->get('name');

        $data['res_keluar'] = $this->M_barang->get()->result_array();
        $data['result'] = $this->M_laporan_barang_keluar->get($tgl, $tgl2, $name);
        $data['fil_barang'] = $this->M_laporan_barang_keluar->get_filter_brng()->result_array();
        $data['user'] = $this->M_users->get()->result_array();

        $data['tgl'] = $tgl;
        $data['tgl2'] = $tgl2;
        $data['name'] = $name;
        $this->template->load('template', 'content/gudang_bahanbaku/barang_keluar/laporan_barang_keluar_data', $data);
    }

    public function pdf_laporan_barang_keluar($tgl = null, $tgl2 = null, $name = null)
    {
        $mpdf = new \Mpdf\Mpdf();

        $tgl = $this->input->get('date_from');
        $tgl2 = $this->input->get('date_until');
        $name = $this->input->get('name');

        $data['result'] = $this->M_laporan_barang_keluar->get($tgl, $tgl2, $name);
        $data['user'] = $this->M_users->get()->result_array();
        $data['bm'] = $this->M_barang_masuk->get()->result_array();

        $data['tgl'] = $tgl;
        $data['tgl2'] = $tgl2;
        $data['name'] = $name;
        // for ($i = 0; $i < count($data['result']); $i++) {
        //     $no_transfer_surat = $data['result'][$i]['no_transfer_surat'];
        //     $data_barang_keluar = $this->M_laporan_barang_keluar->data_barang_keluar($no_transfer_surat)->result_array();
        //     $data['result'][$i]['detail'] = $data_barang_keluar;
        // }
        // for ($i = 0; $i < count($data['bm']); $i++) {
        //     $d['no_batch'] = $data['bm'][$i]['no_batch'];
        //     $jml_barang_keluar = $this->M_barang_keluar->jml_barang_keluar($d)->row_array();
        //     $stok = $data['bm'][$i]['qty'] - $jml_barang_keluar['tot_barang_keluar'];
        //     $data['bm'][$i]['stok'] = $stok;
        // }

        // print_r($data['result']);
        // $d = $this->template->load('template', 'content/barang_keluar/laporan_barang_keluar',$data);

        $d = $this->load->view('laporan/barang_keluar/page_laporan_barang_keluar', $data, TRUE);
        $mpdf->AddPage("P", "", "", "", "", "15", "15", "5", "15", "", "", "", "", "", "", "", "", "", "", "", "A4");
        $mpdf->setFooter('Halaman {PAGENO}');
        $mpdf->WriteHTML($d);
        $mpdf->Output();
    }
}
