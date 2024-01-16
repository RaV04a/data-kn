<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Print_schedule extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		// check_not_login();
		$this->load->model('M_marketing/M_print_schedule');
		$this->load->model('M_marketing/M_customer');
		$this->load->model('M_marketing/M_kode_warna');
	}

	public function index($tgl = null, $tgl2 = null)
	{
		// $data['row'] = $this->customer_m->get();
		$data['result'] = $this->M_print_schedule->get($tgl, $tgl2);
		$data['res_kodewarna_cap'] = $this->M_kode_warna->getcap()->result_array();
		$data['res_kodewarna_body'] = $this->M_kode_warna->getbody()->result_array();
		$data['res_customer'] = $this->M_customer->get()->result_array();

		$data['tgl'] = $tgl;
		$data['tgl2'] = $tgl2;
		$this->template->load('template', 'content/marketing/print_schedule/print_data', $data);
	}

	public function add()
	{
		$print = ($data['print']);
		if ($print != 0) {
			$print;
		} else {
			$print = "";
		}
		$data['id_customer'] = $this->input->post('id_customer', TRUE);
		$data['id_kw_cap'] = $this->input->post('id_kw_cap', TRUE);
		$data['id_kw_body'] = $this->input->post('id_kw_body', TRUE);
		$data['no_cr'] = $this->input->post('no_cr', TRUE);
		$data['no_batch'] = $this->input->post('no_batch', TRUE);
		$data['tgl_sch'] = $this->convertDate($this->input->post('tgl_sch', TRUE));
		$data['size'] = $this->input->post('size', TRUE);
		$data['mesin'] = $this->input->post('mesin', TRUE);
		$data['jumlah'] = $this->input->post('jumlah', TRUE);
		$data['cek_print'] = $this->input->post('cek_print', TRUE);
		$data['print'] = $print;
		$data['tinta'] = $this->input->post('tinta', TRUE);
		$data['jenis_box'] = $this->input->post('jenis_box', TRUE);
		$data['jenis_zak'] = $this->input->post('jenis_zak', TRUE);
		$data['minyak'] = $this->input->post('minyak', TRUE);
		$data['tgl_kirim'] = $this->convertDate($this->input->post('tgl_kirim', TRUE));
		$data['tgl_prd'] = $this->convertDate($this->input->post('tgl_prd', TRUE));
		$data['keterangan'] = $this->input->post('keterangan', TRUE);
		$respon = $this->M_tambah_schedule->add($data);

		if ($respon) {
			header('location:' . base_url('tambah_schedule') . '?alert=success&msg=Selamat anda berhasil menambah Schedule Marketing');
		} else {
			header('location:' . base_url('tambah_schedule') . '?alert=success&msg=Maaf anda gagal menambah Schedule Marketing');
		}
	}
	public function update()
	{
		$data['id_sch'] = $this->input->post('id_sch', TRUE);
		$data['id_customer'] = $this->input->post('id_customer', TRUE);
		$data['id_kw_cap'] = $this->input->post('id_kw_cap', TRUE);
		$data['id_kw_body'] = $this->input->post('id_kw_body', TRUE);
		$data['no_cr'] = $this->input->post('no_cr', TRUE);
		$data['no_batch'] = $this->input->post('no_batch', TRUE);
		$data['tgl_sch'] = $this->convertDate($this->input->post('tgl_sch', TRUE));
		$data['size'] = $this->input->post('size', TRUE);
		$data['mesin'] = $this->input->post('mesin', TRUE);
		$data['jumlah'] = $this->input->post('jumlah', TRUE);
		$data['cek_print'] = $this->input->post('cek_print', TRUE);
		$data['print'] = $this->input->post('print', TRUE);
		$data['tinta'] = $this->input->post('tinta', TRUE);
		$data['jenis_box'] = $this->input->post('jenis_box', TRUE);
		$data['jenis_zak'] = $this->input->post('jenis_zak', TRUE);
		$data['minyak'] = $this->input->post('minyak', TRUE);
		$data['tgl_kirim'] = $this->convertDate($this->input->post('tgl_kirim', TRUE));
		$data['tgl_prd'] = $this->convertDate($this->input->post('tgl_prd', TRUE));
		$data['keterangan'] = $this->input->post('keterangan', TRUE);
		$respon = $this->M_tambah_schedule->update($data);
		// echo $respon;
		if ($respon) {
			header('location:' . base_url('tambah_schedule') . '?alert=success&msg=Selamat anda berhasil meng-update Schedule Marketing');
		} else {
			header('location:' . base_url('tambah_schedule') . '?alert=success&msg=Maaf anda gagal meng-update Schedule Marketing');
		}
	}

	public function cek_no_cr()
	{
		$no_cr = $this->input->post('no_cr', TRUE);

		$row = $this->M_tambah_schedule->cek_no_cr($no_cr)->row_array();
		if ($row['count_cr'] == 0) {
			echo "false";
		} else {
			echo "true";
		}
	}

	public function delete($id_sch)
	{
		$data['id_sch'] = $id_sch;
		$respon = $this->M_tambah_schedule->delete($data);

		if ($respon) {
			header('location:' . base_url('tambah_schedule') . '?alert=success&msg=Selamat anda berhasil menghapus Schedule Marketing');
		} else {
			header('location:' . base_url('tambah_schedule') . '?alert=success&msg=Maaf anda gagal menghapus Schedule Marketing');
		}
	}
	private function convertDate($date)
	{
		return explode('/', $date)[2] . "-" . explode('/', $date)[1] . "-" . explode('/', $date)[0];
	}

	public function pdf_print_schedule($tgl = null, $tgl2 = null)
	{
		$mpdf = new \Mpdf\Mpdf();
		$data['tgl'] = $tgl;
		$data['tgl2'] = $tgl2;
		$data['detail'] = $this->M_print_schedule->ambil_print($tgl, $tgl2)->result_array();

		$d = $this->load->view('laporan/schedule/print_schedule', $data, TRUE);
		$mpdf->AddPage("L", "", "", "", "", "15", "15", "5", "15", "", "", "", "", "", "", "", "", "", "", "", "A4");
		$mpdf->WriteHTML($d);
		$mpdf->Output();
	}
}
