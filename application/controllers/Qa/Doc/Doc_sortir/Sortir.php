<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sortir extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('M_qa/M_doc/M_sor/M_sortir');
	}

	public function index()
	{
		$data['result'] = $this->M_sortir->get()->result_array();
		$this->template->load('template', 'content/qa/doc/sortir/sortir_data', $data);
	}

	public function add()
	{
		$data['jenis_doc_sor'] = $this->input->post('jenis_doc_sor', TRUE);
		$data['nama_doc_sor'] = $this->input->post('nama_doc_sor', TRUE);
		$data['tgl_berlaku'] = $this->convertdate($this->input->post('tgl_berlaku', TRUE));
		$data['tgl_review'] = $this->convertdate($this->input->post('tgl_review', TRUE));
		$respon = $this->M_sortir->add($data);

		if ($respon) {
			header('location:' . base_url('QA/Doc/Doc_sortir/Sortir') . '?alert=success&msg=Selamat anda berhasil menambah Data Sortir');
		} else {
			header('location:' . base_url('QA/Doc/Doc_sortir/Sortir') . '?alert=error&msg=Maaf anda gagal menambah Data Sortir');
		}
	}
	public function update()
	{
		$data['id_doc_sor'] = $this->input->post('id_doc_sor', TRUE);
		$data['jenis_doc_sor'] = $this->input->post('jenis_doc_sor', TRUE);
		$data['nama_doc_sor'] = $this->input->post('nama_doc_sor', TRUE);
		$data['tgl_berlaku'] = $this->convertdate($this->input->post('tgl_berlaku', TRUE));
		$data['tgl_review'] = $this->convertdate($this->input->post('tgl_review', TRUE));
		$respon = $this->M_sortir->update($data);

		if ($respon) {
			header('location:' . base_url('QA/Doc/Doc_sortir/Sortir') . '?alert=success&msg=Selamat anda berhasil mengubah Data Sortir');
		} else {
			header('location:' . base_url('QA/Doc/Doc_sortir/Sortir') . '?alert=error&msg=Maaf anda gagal mengubah Data Sortir');
		}
	}
	public function delete($id_doc_sor)
	{
		$data['id_doc_sor'] = $id_doc_sor;
		$respon = $this->M_sortir->delete($data);

		if ($respon) {
			header('location:' . base_url('QA/Doc/Doc_sortir/Sortir') . '?alert=success&msg=Selamat anda berhasil menghapus Data Sortir');
		} else {
			header('location:' . base_url('QA/Doc/Doc_sortir/Sortir') . '?alert=error&msg=Maaf anda gagal menghapus Data Sortir');
		}
	}

	private function convertDate($date)
	{
		return explode('/', $date)[2] . "-" . explode('/', $date)[1] . "-" . explode('/', $date)[0];
	}

}
