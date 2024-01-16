<?php
defined('BASEPATH') or exit('No direct script access allowed');

class frm_prosedur_proses extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('M_qa/M_doc/M_frm/M_frm_prosedur_proses');
	}

	public function index()
	{
		$data['result'] = $this->M_frm_prosedur_proses->get()->result_array();
		$this->template->load('template', 'content/qa/doc/forming/frm_prosedur_proses_data', $data);
	}
	public function add()
	{
		$data['jenis_doc_frm'] = $this->input->post('jenis_doc_frm', TRUE);
		$data['nama_doc_frm'] = $this->input->post('nama_doc_frm', TRUE);
		$data['tgl_berlaku'] = $this->convertdate($this->input->post('tgl_berlaku', TRUE));
		$data['tgl_review'] = $this->convertdate($this->input->post('tgl_review', TRUE));
		$respon = $this->M_frm_prosedur_proses->add($data);

		if ($respon) {
			header('location:' . base_url('QA/Doc/Doc_forming/frm_prosedur_proses') . '?alert=success&msg=Selamat anda berhasil menambah Data Prosedur Proses');
		} else {
			header('location:' . base_url('QA/Doc/Doc_forming/frm_prosedur_proses') . '?alert=error&msg=Maaf anda gagal menambah Data Prosedur Proses');
		}
	}
	public function update()
	{
		$data['id_doc_frm'] = $this->input->post('id_doc_frm', TRUE);
		$data['jenis_doc_frm'] = $this->input->post('jenis_doc_frm', TRUE);
		$data['nama_doc_frm'] = $this->input->post('nama_doc_frm', TRUE);
		$data['tgl_berlaku'] = $this->convertdate($this->input->post('tgl_berlaku', TRUE));
		$data['tgl_review'] = $this->convertdate($this->input->post('tgl_review', TRUE));
		$respon = $this->M_frm_prosedur_proses->update($data);

		if ($respon) {
			header('location:' . base_url('QA/Doc/Doc_forming/frm_prosedur_proses') . '?alert=success&msg=Selamat anda berhasil mengubah Data Prosedur Proses');
		} else {
			header('location:' . base_url('QA/Doc/Doc_forming/frm_prosedur_proses') . '?alert=error&msg=Maaf anda gagal mengubah Data Prosedur Proses');
		}
	}
	public function delete($id_doc_frm)
	{
		$data['id_doc_frm'] = $id_doc_frm;
		$respon = $this->M_frm_prosedur_proses->delete($data);

		if ($respon) {
			header('location:' . base_url('QA/Doc/Doc_forming/frm_prosedur_proses') . '?alert=success&msg=Selamat anda berhasil menghapus Data Prosedur Proses');
		} else {
			header('location:' . base_url('QA/Doc/Doc_forming/frm_prosedur_proses') . '?alert=error&msg=Maaf anda gagal menghapus Data Prosedur Proses');
		}
	}

	private function convertDate($date)
	{
		return explode('/', $date)[2] . "-" . explode('/', $date)[1] . "-" . explode('/', $date)[0];
	}
}
