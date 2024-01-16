<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class stock_keeper extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        // check_not_login();
        $this->load->model('M_accounting/M_stock_keeper');
        $this->load->model('M_packing/M_packing_masuk');

    }

    private function convertDate($date)
    {
        return explode('/', $date)[2]."-".explode('/', $date)[1]."-".explode('/', $date)[0];
    }

	public function index($tgl=null,$tgl2=null)
	{
		// $data['row'] = $this->customer_m->get();
		$data['result'] = $this->M_stock_keeper->get($tgl,$tgl2)->result_array();
        $data['tgl'] = $tgl;
        $data['tgl2'] = $tgl2;
		$this->template->load('template', 'content/accounting/stock_keeper/stock_keeper_data',$data);
        // print_r($data);

	}

    public function pdf_laporan_stock_keeper($tgl=null,$tgl2=null)
    {
        $mpdf = new \Mpdf\Mpdf();

        $data['result'] = $this->M_stock_keeper->get($tgl,$tgl2)->result_array();
        $data['tgl'] = $tgl;
        $data['tgl2'] = $tgl2;


        $d = $this->load->view('laporan/accounting/page_laporan_stock_keeper', $data, TRUE);
        $mpdf->AddPage("P","","","","","15","15","5","15","","","","","","","","","","","","A4");
        $mpdf->setFooter('Halaman {PAGENO}');
        $mpdf->WriteHTML($d);
        $mpdf->Output();

    }

    public function delete($id_pack)
    {
        $data['id_pack'] = $id_pack;

        $this->M_packing_masuk->update_status_sk($data['id_pack'], "blm_sk");
        $respon = $this->M_stock_keeper->delete($data);

        if ($respon) {
            header('location:' . base_url('accounting/stock_keeper') . '?alert=success&msg=Selamat anda berhasil menghapus user');
        } else {
            header('location:' . base_url('accounting/stock_keeper') . '?alert=success&msg=Maaf anda gagal menghapus user');
        }
    }

}