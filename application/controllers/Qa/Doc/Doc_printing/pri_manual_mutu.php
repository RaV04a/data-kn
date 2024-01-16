<?php
defined('BASEPATH') or exit('No direct script access allowed');

class pri_manual_mutu extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('M_qa/M_doc/M_pri/M_pri_manual_mutu');
	}

	public function index()
	{
		$data['result'] = $this->M_pri_manual_mutu->get()->result_array();
		$this->template->load('template', 'content/qa/doc/printing/pri_manual_mutu_data', $data);
	}

	public function add()
	{
		$data['jenis_doc_pri'] = $this->input->post('jenis_doc_pri', TRUE);
		$data['nama_doc_pri'] = $this->input->post('nama_doc_pri', TRUE);
		$data['tgl_berlaku'] = $this->convertdate($this->input->post('tgl_berlaku', TRUE));
		$data['tgl_review'] = $this->convertdate($this->input->post('tgl_review', TRUE));
		$respon = $this->M_pri_manual_mutu->add($data);

		if ($respon) {
			header('location:' . base_url('QA/Doc/Doc_printing/pri_manual_mutu') . '?alert=success&msg=Selamat anda berhasil menambah Data Manual Mutu');
		} else {
			header('location:' . base_url('QA/Doc/Doc_printing/pri_manual_mutu') . '?alert=error&msg=Maaf anda gagal menambah Data Manual Mutu');
		}
	}

	public function update()
	{
		$data['id_doc_pri'] = $this->input->post('id_doc_pri', TRUE);
		$data['jenis_doc_pri'] = $this->input->post('jenis_doc_pri', TRUE);
		$data['nama_doc_pri'] = $this->input->post('nama_doc_pri', TRUE);
		$data['tgl_berlaku'] = $this->convertdate($this->input->post('tgl_berlaku', TRUE));
		$data['tgl_review'] = $this->convertdate($this->input->post('tgl_review', TRUE));
		$respon = $this->M_pri_manual_mutu->update($data);

		if ($respon) {
			header('location:' . base_url('QA/Doc/Doc_printing/pri_manual_mutu') . '?alert=success&msg=Selamat anda berhasil mengubah Data Manual Mutu');
		} else {
			header('location:' . base_url('QA/Doc/Doc_printing/pri_manual_mutu') . '?alert=error&msg=Maaf anda gagal mengubah Data Manual Mutu');
		}
	}
	public function delete($id_doc_pri)
	{
		$data['id_doc_pri'] = $id_doc_pri;
		$respon = $this->M_pri_manual_mutu->delete($data);

		if ($respon) {
			header('location:' . base_url('QA/Doc/Doc_printing/pri_manual_mutu') . '?alert=success&msg=Selamat anda berhasil menghapus Data Manual Mutu');
		} else {
			header('location:' . base_url('QA/Doc/Doc_printing/pri_manual_mutu') . '?alert=error&msg=Maaf anda gagal menghapus Data Manual Mutu');
		}
	}

	private function convertDate($date)
	{
		return explode('/', $date)[2] . "-" . explode('/', $date)[1] . "-" . explode('/', $date)[0];
	}
}
