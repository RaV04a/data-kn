<?php
defined('BASEPATH') or exit('No direct script access allowed');

class frm_tabel extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('M_qa/M_doc/M_frm/M_frm_tabel');
	}

	public function index()
	{
		$data['result'] = $this->M_frm_tabel->get()->result_array();
		$this->template->load('template', 'content/qa/doc/forming/frm_tabel_data', $data);
	}

	public function add()
	{
		$data['jenis_doc_frm'] = $this->input->post('jenis_doc_frm', TRUE);
		$data['nama_doc_frm'] = $this->input->post('nama_doc_frm', TRUE);
		$data['tgl_berlaku'] = $this->convertdate($this->input->post('tgl_berlaku', TRUE));
		$data['tgl_review'] = $this->convertdate($this->input->post('tgl_review', TRUE));
		$respon = $this->M_frm_tabel->add($data);

		if ($respon) {
			header('location:' . base_url('QA/Doc/Doc_forming/frm_tabel') . '?alert=success&msg=Selamat anda berhasil menambah Data Tabel');
		} else {
			header('location:' . base_url('QA/Doc/Doc_forming/frm_tabel') . '?alert=error&msg=Maaf anda gagal menambah Data Tabel');
		}
	}

	public function update()
	{
		$data['id_doc_frm'] = $this->input->post('id_doc_frm', TRUE);
		$data['jenis_doc_frm'] = $this->input->post('jenis_doc_frm', TRUE);
		$data['nama_doc_frm'] = $this->input->post('nama_doc_frm', TRUE);
		$data['tgl_berlaku'] = $this->convertdate($this->input->post('tgl_berlaku', TRUE));
		$data['tgl_review'] = $this->convertdate($this->input->post('tgl_review', TRUE));
		$respon = $this->M_frm_tabel->update($data);

		if ($respon) {
			header('location:' . base_url('QA/Doc/Doc_forming/frm_tabel') . '?alert=success&msg=Selamat anda berhasil mengubah Data Tabel');
		} else {
			header('location:' . base_url('QA/Doc/Doc_forming/frm_tabel') . '?alert=error&msg=Maaf anda gagal mengubah Data Tabel');
		}
	}
	public function delete($id_doc_frm)
	{
		$data['id_doc_frm'] = $id_doc_frm;
		$respon = $this->M_frm_tabel->delete($data);

		if ($respon) {
			header('location:' . base_url('QA/Doc/Doc_forming/frm_tabel') . '?alert=success&msg=Selamat anda berhasil menghapus Data Tabel');
		} else {
			header('location:' . base_url('QA/Doc/Doc_forming/frm_tabel') . '?alert=error&msg=Maaf anda gagal menghapus Data Tabel');
		}
	}

	private function convertDate($date)
	{
		return explode('/', $date)[2] . "-" . explode('/', $date)[1] . "-" . explode('/', $date)[0];
	}
}
