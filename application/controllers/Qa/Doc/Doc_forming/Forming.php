<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Forming extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		// check_not_login();
		$this->load->model('M_qa/M_doc/M_frm/M_forming');
	}

	public function index()
	{
		$data['result'] = $this->M_forming->get()->result_array();
		$this->template->load('template', 'content/qa/doc/forming/forming_data', $data);
	}

	public function add()
	{
		$data['jenis_doc_frm'] = $this->input->post('jenis_doc_frm', TRUE);
		$data['nama_doc_frm'] = $this->input->post('nama_doc_frm', TRUE);
		$data['tgl_berlaku'] = $this->convertdate($this->input->post('tgl_berlaku', TRUE));
		$data['tgl_review'] = $this->convertdate($this->input->post('tgl_review', TRUE));
		$respon = $this->M_forming->add($data);

		if ($respon) {
			header('location:' . base_url('QA/Doc/Doc_forming/Forming') . '?alert=success&msg=Selamat anda berhasil menambah Data Forming');
		} else {
			header('location:' . base_url('QA/Doc/Doc_forming/Forming') . '?alert=error&msg=Maaf anda gagal menambah Data Forming');
		}
	}
	public function update()
	{
		$data['id_doc_frm'] = $this->input->post('id_doc_frm', TRUE);
		$data['jenis_doc_frm'] = $this->input->post('jenis_doc_frm', TRUE);
		$data['nama_doc_frm'] = $this->input->post('nama_doc_frm', TRUE);
		$data['tgl_berlaku'] = $this->convertdate($this->input->post('tgl_berlaku', TRUE));
		$data['tgl_review'] = $this->convertdate($this->input->post('tgl_review', TRUE));
		$respon = $this->M_forming->update($data);

		if ($respon) {
			header('location:' . base_url('QA/Doc/Doc_forming/Forming') . '?alert=success&msg=Selamat anda berhasil mengubah Data Forming');
		} else {
			header('location:' . base_url('QA/Doc/Doc_forming/Forming') . '?alert=error&msg=Maaf anda gagal mengubah Data Forming');
		}
	}
	public function delete($id_doc_frm)
	{
		$data['id_doc_frm'] = $id_doc_frm;
		$respon = $this->M_forming->delete($data);

		if ($respon) {
			header('location:' . base_url('QA/Doc/Doc_forming/Forming') . '?alert=success&msg=Selamat anda berhasil menghapus Data Forming');
		} else {
			header('location:' . base_url('QA/Doc/Doc_forming/Forming') . '?alert=error&msg=Maaf anda gagal menghapus Data Forming');
		}
	}

	private function convertDate($date)
	{
		return explode('/', $date)[2] . "-" . explode('/', $date)[1] . "-" . explode('/', $date)[0];
	}
}
