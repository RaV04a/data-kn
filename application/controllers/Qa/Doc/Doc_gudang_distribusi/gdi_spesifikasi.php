<?php
defined('BASEPATH') or exit('No direct script access allowed');

class gdi_spesifikasi extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('M_qa/M_doc/M_gdi/M_gdi_spesifikasi');
	}

	public function index()
	{
		$data['result'] = $this->M_gdi_spesifikasi->get()->result_array();
		$this->template->load('template', 'content/qa/doc/gudang_distribusi/gdi_spesifikasi_data', $data);
	}

	public function add()
	{
		$data['jenis_doc_gdi'] = $this->input->post('jenis_doc_gdi', TRUE);
		$data['nama_doc_gdi'] = $this->input->post('nama_doc_gdi', TRUE);
		$data['tgl_berlaku'] = $this->convertdate($this->input->post('tgl_berlaku', TRUE));
		$data['tgl_review'] = $this->convertdate($this->input->post('tgl_review', TRUE));
		$respon = $this->M_gdi_spesifikasi->add($data);

		if ($respon) {
			header('location:' . base_url('QA/Doc/Doc_gudang_distribusi/gdi_spesifikasi') . '?alert=success&msg=Selamat anda berhasil menambah Data Spesifikasi');
		} else {
			header('location:' . base_url('QA/Doc/Doc_gudang_distribusi/gdi_spesifikasi') . '?alert=error&msg=Maaf anda gagal menambah Data Spesifikasi');
		}
	}

	public function update()
	{
		$data['id_doc_gdi'] = $this->input->post('id_doc_gdi', TRUE);
		$data['jenis_doc_gdi'] = $this->input->post('jenis_doc_gdi', TRUE);
		$data['nama_doc_gdi'] = $this->input->post('nama_doc_gdi', TRUE);
		$data['tgl_berlaku'] = $this->convertdate($this->input->post('tgl_berlaku', TRUE));
		$data['tgl_review'] = $this->convertdate($this->input->post('tgl_review', TRUE));
		$respon = $this->M_gdi_spesifikasi->update($data);

		if ($respon) {
			header('location:' . base_url('QA/Doc/Doc_gudang_distribusi/gdi_spesifikasi') . '?alert=success&msg=Selamat anda berhasil mengubah Data Spesifikasi');
		} else {
			header('location:' . base_url('QA/Doc/Doc_gudang_distribusi/gdi_spesifikasi') . '?alert=error&msg=Maaf anda gagal mengubah Data Spesifikasi');
		}
	}
	public function delete($id_doc_gdi)
	{
		$data['id_doc_gdi'] = $id_doc_gdi;
		$respon = $this->M_gdi_spesifikasi->delete($data);

		if ($respon) {
			header('location:' . base_url('QA/Doc/Doc_gudang_distribusi/gdi_spesifikasi') . '?alert=success&msg=Selamat anda berhasil menghapus Data Spesifikasi');
		} else {
			header('location:' . base_url('QA/Doc/Doc_gudang_distribusi/gdi_spesifikasi') . '?alert=error&msg=Maaf anda gagal menghapus Data Spesifikasi');
		}
	}

	private function convertDate($date)
	{
		return explode('/', $date)[2] . "-" . explode('/', $date)[1] . "-" . explode('/', $date)[0];
	}
}
