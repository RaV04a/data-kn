<?php
defined('BASEPATH') or exit('No direct script access allowed');

class melt_spesifikasi extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('M_qa/M_doc/M_melt/M_melt_spesifikasi');
	}

	public function index()
	{
		$data['result'] = $this->M_melt_spesifikasi->get()->result_array();
		$this->template->load('template', 'content/qa/doc/melting/melt_spesifikasi_data', $data);
	}

	public function add()
	{
		$data['jenis_doc_melt'] = $this->input->post('jenis_doc_melt', TRUE);
		$data['nama_doc_melt'] = $this->input->post('nama_doc_melt', TRUE);
		$data['tgl_berlaku'] = $this->convertdate($this->input->post('tgl_berlaku', TRUE));
		$data['tgl_review'] = $this->convertdate($this->input->post('tgl_review', TRUE));
		$respon = $this->M_melt_spesifikasi->add($data);

		if ($respon) {
			header('location:' . base_url('QA/Doc/Doc_melting/melt_spesifikasi') . '?alert=success&msg=Selamat anda berhasil menambah Data Spesifikasi');
		} else {
			header('location:' . base_url('QA/Doc/Doc_melting/melt_spesifikasi') . '?alert=error&msg=Maaf anda gagal menambah Data Spesifikasi');
		}
	}

	public function update()
	{
		$data['id_doc_melt'] = $this->input->post('id_doc_melt', TRUE);
		$data['jenis_doc_melt'] = $this->input->post('jenis_doc_melt', TRUE);
		$data['nama_doc_melt'] = $this->input->post('nama_doc_melt', TRUE);
		$data['tgl_berlaku'] = $this->convertdate($this->input->post('tgl_berlaku', TRUE));
		$data['tgl_review'] = $this->convertdate($this->input->post('tgl_review', TRUE));
		$respon = $this->M_melt_spesifikasi->update($data);

		if ($respon) {
			header('location:' . base_url('QA/Doc/Doc_melting/melt_spesifikasi') . '?alert=success&msg=Selamat anda berhasil mengubah Data Spesifikasi');
		} else {
			header('location:' . base_url('QA/Doc/Doc_melting/melt_spesifikasi') . '?alert=error&msg=Maaf anda gagal mengubah Data Spesifikasi');
		}
	}
	public function delete($id_doc_melt)
	{
		$data['id_doc_melt'] = $id_doc_melt;
		$respon = $this->M_melt_spesifikasi->delete($data);

		if ($respon) {
			header('location:' . base_url('QA/Doc/Doc_melting/melt_spesifikasi') . '?alert=success&msg=Selamat anda berhasil menghapus Data Spesifikasi');
		} else {
			header('location:' . base_url('QA/Doc/Doc_melting/melt_spesifikasi') . '?alert=error&msg=Maaf anda gagal menghapus Data Spesifikasi');
		}
	}

	private function convertDate($date)
	{
		return explode('/', $date)[2] . "-" . explode('/', $date)[1] . "-" . explode('/', $date)[0];
	}
}
