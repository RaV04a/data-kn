<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Masak_gelatin extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		// check_not_login();
		$this->load->model('M_melting/M_masak_gelatin');
		$this->load->model('M_marketing/M_print_schedule');
		$this->load->model('M_melting/M_barang_masuk_melting');
		$this->load->model('M_melting/M_transaksi_melting');
		$this->load->model('M_lab/M_alat_kalibrasi');
	}

	public function index()
	{
		// $data['row'] = $this->customer_m->get();
		$data['result'] = $this->M_masak_gelatin->get()->result_array();
		$data['res_cr'] = $this->M_print_schedule->get_cr();
		$data['res_mm'] = $this->M_barang_masuk_melting->get_barang()->result_array();
		$data['res_mm_bhn'] = $this->M_barang_masuk_melting->get_bahan()->result_array();
		$data['res_alat'] = $this->M_alat_kalibrasi->get()->result_array();
		$this->template->load('template', 'content/melting/proses/masak_gel/masak_gel_data', $data);
		// print_r($data);

	}

	public function get_detail_gel()
	{
		$batch_masak = $this->input->post('batch_masak', TRUE);

		$result = $this->M_masak_gelatin->get_detail_gel($batch_masak)->result_array();

		echo json_encode($result);
	}

	public function get_detail_bt()
	{
		$batch_masak = $this->input->post('batch_masak', TRUE);

		$result = $this->M_masak_gelatin->get_detail_bt($batch_masak)->result_array();

		echo json_encode($result);
	}

	private function convertDate($date)
	{
		return explode('/', $date)[2] . "-" . explode('/', $date)[1] . "-" . explode('/', $date)[0];
	}

	public function add()
	{
		$label_bersih = $data['label_bersih'] = $this->input->post('label_bersih', TRUE);
		if ($label_bersih === "Ada") {
			$label_bersih = "Ada";
		} else {
			$label_bersih = "Tidak Ada";
		}
		
		$data['tgl_masak'] = $this->convertDate($this->input->post('tgl_masak', TRUE));
		$data['shift'] = $this->input->post('shift', TRUE);
		$data['batch_masak'] = $this->input->post('batch_masak', TRUE);
		$data['jml_air'] = $this->input->post('jml_air', TRUE);
		$data['temp_pel'] = $this->input->post('temp_pel', TRUE);
		$data['jam_gel'] = $this->input->post('jam_gel', TRUE);
		$data['jam_bt'] = $this->input->post('jam_bt', TRUE);
		$data['mixing1'] = $this->input->post('mixing1', TRUE);
		$data['mixing2'] = $this->input->post('mixing2', TRUE);
		$data['vac1'] = $this->input->post('vac1', TRUE);
		$data['vac2'] = $this->input->post('vac2', TRUE);
		$data['scala_vac'] = $this->input->post('scala_vac', TRUE);
		$data['visco_cps'] = $this->input->post('visco_cps', TRUE);
		$data['visco_c'] = $this->input->post('visco_c', TRUE);
		$data['suhu_ruang'] = $this->input->post('suhu_ruang', TRUE);
		$data['kel_ruang'] = $this->input->post('kel_ruang', TRUE);
		$data['keb_melter'] = $this->input->post('keb_melter', TRUE);
		$data['label_bersih'] = $this->input->post('label_bersih', TRUE);
		$data['op1'] = $this->input->post('op1', TRUE);
		$data['op2'] = $this->input->post('op2', TRUE);
		$data['supervisor'] = $this->input->post('supervisor', TRUE);
		$bahans = $this->input->post('bahan', TRUE);


		foreach ($bahans as $bahan) {
			$id_transaksi = $this->M_transaksi_melting->trans_keluar(array(
				'id_mm' => $bahan['id_mm'],
				'qty' => $bahan['jml_bahan'],
			));

			$d['tgl_masak'] = $data['tgl_masak'];
			$d['shift'] = $data['shift'];
			$d['batch_masak'] = $data['batch_masak'];
			$d['id_mm'] = $bahan['id_mm'];
			$d['jml_bahan'] = $bahan['jml_bahan'];
			$d['jml_air'] = $data['jml_air'];
			$d['temp_pel'] = $data['temp_pel'];
			$d['jam_gel'] = $data['jam_gel'];
			$d['jam_bt'] = $data['jam_bt'];
			$d['mixing1'] = $data['mixing1'];
			$d['mixing2'] = $data['mixing2'];
			$d['vac1'] = $data['vac1'];
			$d['vac2'] = $data['vac2'];
			$d['scala_vac'] = $data['scala_vac'];
			$d['visco_cps'] = $data['visco_cps'];
			$d['visco_c'] = $data['visco_c'];
			$d['suhu_ruang'] = $data['suhu_ruang'];
			$d['kel_ruang'] = $data['kel_ruang'];
			$d['keb_melter'] = $data['keb_melter'];
			$d['label_bersih'] = $data['label_bersih'];
			$d['op1'] = $data['op1'];
			$d['op2'] = $data['op2'];
			$d['supervisor'] = $data['supervisor'];
			$d['id_transaksi'] = $id_transaksi;

			$respon = $this->M_masak_gelatin->add($d);
		}
		if ($respon) {
			header('location:' . base_url('melting/Masak_gelatin') . '?alert=success&msg=Selamat anda berhasil menambah Bahan Masak Gelatin');
		} else {
			header('location:' . base_url('melting/Masak_gelatin') . '?alert=error&msg=Maaf anda gagal menambah Bahan Masak Gelatin');
		}
	}

	public function update()
	{
		$data['id_masak_gel'] = $this->input->post('id_masak_gel', TRUE);
		$data['tgl_masak'] = $this->convertDate($this->input->post('tgl_masak', TRUE));
		$data['shift'] = $this->input->post('shift', TRUE);
		$data['batch_masak'] = $this->input->post('batch_masak', TRUE);
		$data['jml_air'] = $this->input->post('jml_air', TRUE);
		$data['temp_pel'] = $this->input->post('temp_pel', TRUE);
		$data['jam_gel'] = $this->input->post('jam_gel', TRUE);
		$data['jam_bt'] = $this->input->post('jam_bt', TRUE);
		$data['mixing1'] = $this->input->post('mixing1', TRUE);
		$data['mixing2'] = $this->input->post('mixing2', TRUE);
		$data['vac1'] = $this->input->post('vac1', TRUE);
		$data['vac2'] = $this->input->post('vac2', TRUE);
		$data['scala_vac'] = $this->input->post('scala_vac', TRUE);
		$data['visco_cps'] = $this->input->post('visco_cps', TRUE);
		$data['visco_c'] = $this->input->post('visco_c', TRUE);
		$data['suhu_ruang'] = $this->input->post('suhu_ruang', TRUE);
		$data['kel_ruang'] = $this->input->post('kel_ruang', TRUE);
		$data['keb_melter'] = $this->input->post('keb_melter', TRUE);
		$data['label_bersih'] = $this->input->post('label_bersih', TRUE) ? 'Ada' : 'Tidak Ada';
		$data['op1'] = $this->input->post('op1', TRUE); 
		$data['op2'] = $this->input->post('op2', TRUE);
		$data['supervisor'] = $this->input->post('supervisor', TRUE);

		$respon = $this->M_masak_gelatin->update($data);
		if ($respon) {
			header('location:' . base_url('melting/Masak_gelatin') . '?alert=success&msg=Selamat anda berhasil meng-update Bahan Masak Gelatin');
		} else {
			header('location:' . base_url('melting/Masak_gelatin') . '?alert=error&msg=Maaf anda gagal meng-update Bahan Masak Gelatin');
		}
	}

	public function delete($batch_masak)
	{
		$ts_ids = $this->M_masak_gelatin->get_by_batch($batch_masak);
		foreach ($ts_ids as $key => $value) {
			$this->M_transaksi_melting->delete($value['id_ts_melt']);
		}
		$respon = $this->M_masak_gelatin->delete($batch_masak);

		if ($respon) {
			header('location:' . base_url('melting/Masak_gelatin') . '?alert=success&msg=Selamat anda berhasil menghapus Bahan Masak Gelatin');
		} else {
			header('location:' . base_url('melting/Masak_gelatin') . '?alert=error&msg=Maaf anda gagal menghapus Bahan Masak Gelatin');
		}
	}
}
