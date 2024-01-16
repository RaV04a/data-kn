<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Karantina extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        // check_not_login();
        $this->load->model('M_gudang_bahanbaku/M_karantina');
        $this->load->model('M_gudang_bahanbaku/M_permintaan_barang_gudang');
        $this->load->model('M_gudang_bahanbaku/M_barang');
        $this->load->model('M_purchasing/M_supplier');
        $this->load->model('M_users/M_users');
    }
    private function convertDate($date)
    {
        return explode('/', $date)[2] . "-" . explode('/', $date)[1] . "-" . explode('/', $date)[0];
    }
    public function index()
    {
        // $data['row'] = $this->customer_m->get();
        $data['result'] = $this->M_karantina->get()->result_array();
        $data['res_barang'] = $this->M_barang->get()->result_array();
        $data['res_supplier'] = $this->M_supplier->get()->result_array();
        $data['res_user'] = $this->M_users->get()->result_array();
        $this->template->load('template', 'content/gudang_bahanbaku/karantina/karantina_data.php', $data);
        // print_r($data); 
    }

    public function pdf_label_karantina($no_sj = null)
    {
        $no_surat_jalan = str_replace("--", "/", $no_sj);
        $mpdf = new \Mpdf\Mpdf();

        $data['detail'] = $this->M_karantina->ambil_label($no_surat_jalan)->result_array();

        $d = $this->load->view('laporan/karantina/page_karantina', $data, TRUE);
        $mpdf->AddPage("P", "", "", "", "", "15", "15", "5", "15", "", "", "", "", "", "", "", "", "", "", "", "A4");
        $mpdf->WriteHTML($d);
        $mpdf->Output();
    }
}
