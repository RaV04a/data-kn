<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Alat_kalibrasi extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		// check_not_login();
		$this->load->model('M_lab/M_alat_kalibrasi');
	}

	public function index()
	{
		// $data['row'] = $this->customer_m->get();
		$data['result'] = $this->M_alat_kalibrasi->get()->result_array();
		$this->template->load('template', 'content/lab/daftar_alat_kalibrasi/alat_kalibrasi_data', $data);
		// print_r($data);

	}

	public function add()
	{
		$data['kode_alat'] = $this->input->post('kode_alat', TRUE);
		$data['nama_alat'] = $this->input->post('nama_alat', TRUE);
		$data['no_sertif'] = $this->input->post('no_sertif', TRUE);
		$data['tgl_kalibrasi'] = $this->convertDate($this->input->post('tgl_kalibrasi', TRUE));
		$data['ed_kalibrasi'] = $this->convertDate($this->input->post('ed_kalibrasi', TRUE));
		$respon = $this->M_alat_kalibrasi->add($data);

		if ($respon) {
			header('location:' . base_url('lab/Alat_kalibrasi') . '?alert=success&msg=Selamat anda berhasil menambah Alat Kalibrasi');
		} else {
			header('location:' . base_url('lab/Alat_kalibrasi') . '?alert=error&msg=Maaf anda gagal menambah Alat Kalibrasi');
		}
	}
	public function update()
	{
		$data['id_kalibrasi'] = $this->input->post('id_kalibrasi', TRUE);
		$data['kode_alat'] = $this->input->post('kode_alat', TRUE);
		$data['nama_alat'] = $this->input->post('nama_alat', TRUE);
		$data['no_sertif'] = $this->input->post('no_sertif', TRUE);
		$data['tgl_kalibrasi'] = $this->convertDate($this->input->post('tgl_kalibrasi', TRUE));
		$data['ed_kalibrasi'] = $this->convertDate($this->input->post('ed_kalibrasi', TRUE));
		$respon = $this->M_alat_kalibrasi->update($data);
		// echo $respon;
		if ($respon) {
			header('location:' . base_url('lab/Alat_kalibrasi') . '?alert=success&msg=Selamat anda berhasil meng-update Alat Kalibrasi');
		} else {
			header('location:' . base_url('lab/Alat_kalibrasi') . '?alert=error&msg=Maaf anda gagal meng-update Alat Kalibrasi');
		}
	}
	public function delete($id_kalibrasi)
	{
		$data['id_kalibrasi'] = $id_kalibrasi;
		$respon = $this->M_alat_kalibrasi->delete($data);

		if ($respon) {
			header('location:' . base_url('lab/Alat_kalibrasi') . '?alert=success&msg=Selamat anda berhasil menghapus Alat Kalibrasi');
		} else {
			header('location:' . base_url('lab/Alat_kalibrasi') . '?alert=error&msg=Maaf anda gagal menghapus Alat Kalibrasi');
		}
	}
	private function convertDate($date)
	{
		return explode('/', $date)[2] . "-" . explode('/', $date)[1] . "-" . explode('/', $date)[0];
	}
}
