<?php
defined('BASEPATH') or exit('No direct script access allowed');

class pri_kualifikasi extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('M_qa/M_doc/M_pri/M_pri_kualifikasi');
	}

	public function index()
	{
		$data['result'] = $this->M_pri_kualifikasi->get()->result_array();
		$this->template->load('template', 'content/qa/doc/printing/pri_kualifikasi_data', $data);
	}

	public function add()
	{
		$data['jenis_doc_pri'] = $this->input->post('jenis_doc_pri', TRUE);
		$data['nama_doc_pri'] = $this->input->post('nama_doc_pri', TRUE);
		$data['tgl_berlaku'] = $this->convertdate($this->input->post('tgl_berlaku', TRUE));
		$data['tgl_review'] = $this->convertdate($this->input->post('tgl_review', TRUE));
		$respon = $this->M_pri_kualifikasi->add($data);

		if ($respon) {
			header('location:' . base_url('QA/Doc/Doc_printing/pri_kualifikasi') . '?alert=success&msg=Selamat anda berhasil menambah Data Kualifikasi');
		} else {
			header('location:' . base_url('QA/Doc/Doc_printing/pri_kualifikasi') . '?alert=error&msg=Maaf anda gagal menambah Data Kualifikasi');
		}
	}

	public function update()
	{
		$data['id_doc_pri'] = $this->input->post('id_doc_pri', TRUE);
		$data['jenis_doc_pri'] = $this->input->post('jenis_doc_pri', TRUE);
		$data['nama_doc_pri'] = $this->input->post('nama_doc_pri', TRUE);
		$data['tgl_berlaku'] = $this->convertdate($this->input->post('tgl_berlaku', TRUE));
		$data['tgl_review'] = $this->convertdate($this->input->post('tgl_review', TRUE));
		$respon = $this->M_pri_kualifikasi->update($data);

		if ($respon) {
			header('location:' . base_url('QA/Doc/Doc_printing/pri_kualifikasi') . '?alert=success&msg=Selamat anda berhasil mengubah Data kualifikasi');
		} else {
			header('location:' . base_url('QA/Doc/Doc_printing/pri_kualifikasi') . '?alert=error&msg=Maaf anda gagal mengubah Data kualifikasi');
		}
	}
	public function delete($id_doc_pri)
	{
		$data['id_doc_pri'] = $id_doc_pri;
		$respon = $this->M_pri_kualifikasi->delete($data);

		if ($respon) {
			header('location:' . base_url('QA/Doc/Doc_printing/pri_kualifikasi') . '?alert=success&msg=Selamat anda berhasil menghapus Data kualifikasi');
		} else {
			header('location:' . base_url('QA/Doc/Doc_printing/pri_kualifikasi') . '?alert=error&msg=Maaf anda gagal menghapus Data kualifikasi');
		}
	}

	private function convertDate($date)
	{
		return explode('/', $date)[2] . "-" . explode('/', $date)[1] . "-" . explode('/', $date)[0];
	}
}
