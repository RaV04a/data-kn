<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penimbangan extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		// check_not_login();
		$this->load->model('M_melting/M_penimbangan');
		$this->load->model('M_marketing/M_print_schedule');
		$this->load->model('M_melting/M_barang_masuk_melting');
		$this->load->model('M_lab/M_alat_kalibrasi');
		$this->load->model('M_melting/M_transaksi_melting');
	}

	public function index()
	{
		$data['result'] = $this->M_penimbangan->get()->result_array();
		$data['res_cr'] = $this->M_print_schedule->get_cr();
		$data['res_mm'] = $this->M_barang_masuk_melting->get_barang()->result_array();
		$data['res_barang'] = $this->M_barang_masuk_melting->get_barang()->result_array();
		$data['res_alat'] = $this->M_alat_kalibrasi->get()->result_array();
		$this->template->load('template', 'content/melting/proses/penimbangan/penimbangan_data', $data);
	}

	private function convertDate($date)
	{
		return explode('/', $date)[2] . "-" . explode('/', $date)[1] . "-" . explode('/', $date)[0];
	}

	public function add()
	{
		$kebersihan_ruangan = $data['kebersihan_ruangan'] = $this->input->post('kebersihan_ruangan', TRUE);
		if ($kebersihan_ruangan === "Bersih") {
			$kebersihan_ruangan = "Bersih";
		} else {
			$kebersihan_ruangan = "Tidak Bersih";
		}
		$label_kebersihan = $data['label_kebersihan'] = $this->input->post('label_kebersihan', TRUE);
		if ($label_kebersihan === "Ada") {
			$label_kebersihan = "Ada";
		} else {
			$label_kebersihan = "Tidak Ada";
		}
		$label_kalibrasi = $data['label_kalibrasi'] = $this->input->post('label_kalibrasi', TRUE);
		if ($label_kalibrasi === "Ada") {
			$label_kalibrasi = "Ada";
		} else {
			$label_kalibrasi = "Tidak Ada";
		}
		$data['id_mm'] = $this->input->post('id_mm', TRUE);
		$data['id_kalibrasi'] = $this->input->post('id_kalibrasi', TRUE);
		$data['qty_dibutuhkan'] = $this->input->post('qty_dibutuhkan', TRUE);
		$data['qty_ditimbang'] = $this->input->post('qty_ditimbang', TRUE);
		$data['tgl_timbang'] = $this->convertDate($this->input->post('tgl_timbang', TRUE));
		$data['label_kebersihan'] = $label_kebersihan;
		$data['label_kalibrasi'] = $label_kalibrasi;
		$data['op_penimbangan'] = $this->input->post('op_penimbangan', TRUE);
		$data['suhu_ruangan'] = $this->input->post('suhu_ruangan', TRUE);
		$data['kelembapan_ruangan'] = $this->input->post('kelembapan_ruangan', TRUE);
		$data['kebersihan_ruangan'] = $kebersihan_ruangan;
		$data['id_transaksi'] = $this->M_transaksi_melting->trans_keluar(array(
			'id_mm' => $data['id_mm'],
			'qty' => $data['qty_dibutuhkan'],
		));
		$respon = $this->M_penimbangan->add($data);

		if ($respon) {
			header('location:' . base_url('melting/Penimbangan') . '?alert=success&msg=Selamat anda berhasil menambah Bahan Penimbangan');
		} else {
			header('location:' . base_url('melting/Penimbangan') . '?alert=error&msg=Maaf anda gagal menambah Bahan Penimbangan');
		}
	}
	public function update()
	{
		$data['id_penimbangan'] = $this->input->post('id_penimbangan', TRUE);
		$data['id_mm'] = $this->input->post('id_mm', TRUE);
		$data['id_kalibrasi'] = $this->input->post('id_kalibrasi', TRUE);
		$data['id_ts_melt'] = $this->input->post('id_ts_melt', TRUE);
		$data['qty_dibutuhkan'] = $this->input->post('qty_dibutuhkan', TRUE);
		$data['qty_ditimbang'] = $this->input->post('qty_ditimbang', TRUE);
		$data['tgl_timbang'] = $this->convertDate($this->input->post('tgl_timbang', TRUE));
		$data['label_kebersihan'] = $this->input->post('label_kebersihan', TRUE) ? 'Ada' : 'Tidak Ada';
		$data['label_kalibrasi'] = $this->input->post('label_kalibrasi', TRUE) ? 'Ada' : 'Tidak Ada';
		$data['op_penimbangan'] = $this->input->post('op_penimbangan', TRUE);
		$data['suhu_ruangan'] = $this->input->post('suhu_ruangan', TRUE);
		$data['kelembapan_ruangan'] = $this->input->post('kelembapan_ruangan', TRUE);
		$data['kebersihan_ruangan'] = $this->input->post('kebersihan_ruangan', TRUE) ? 'Bersih' : 'Tidak Bersih';
		// $this->M_transaksi_melting->update(array('id_ts_melt' => $data['id_ts_melt'], 'id_mm' => $data['id_mm'], 'qty' => $data['qty_dibutuhkan']));
		$respon = $this->M_penimbangan->update($data);
		if ($respon) {
			header('location:' . base_url('melting/Penimbangan') . '?alert=success&msg=Selamat anda berhasil meng-update Bahan Penimbangan');
		} else {
			header('location:' . base_url('melting/Penimbangan') . '?alert=error&msg=Maaf anda gagal meng-update Bahan Penimbangan');
		}
	}

	public function delete($id_ts_melt)
	{
		$this->M_transaksi_melting->delete($id_ts_melt);
		$respon = $this->M_penimbangan->delete($id_ts_melt);

		if ($respon) {
			header('location:' . base_url('melting/Penimbangan') . '?alert=success&msg=Selamat anda berhasil menghapus Bahan Penimbangan');
		} else {
			header('location:' . base_url('melting/Penimbangan') . '?alert=success&msg=Maaf anda gagal menghapus Bahan Penimbangan');
		}
	}
}
