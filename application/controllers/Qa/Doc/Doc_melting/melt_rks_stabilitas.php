<?php
defined('BASEPATH') or exit('No direct script access allowed');

class melt_rks_stabilitas extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('M_qa/M_doc/M_melt/M_melt_rks_stabilitas');
	}

	public function index()
	{
		$data['result'] = $this->M_melt_rks_stabilitas->get()->result_array();
		$this->template->load('template', 'content/qa/doc/melting/melt_rks_stabilitas_data', $data);
	}

	public function add()
	{
		$data['jenis_doc_melt'] = $this->input->post('jenis_doc_melt', TRUE);
		$data['nama_doc_melt'] = $this->input->post('nama_doc_melt', TRUE);
		$data['tgl_berlaku'] = $this->convertdate($this->input->post('tgl_berlaku', TRUE));
		$data['tgl_review'] = $this->convertdate($this->input->post('tgl_review', TRUE));
		$respon = $this->M_melt_rks_stabilitas->add($data);

		if ($respon) {
			header('location:' . base_url('QA/Doc/Doc_melting/melt_rks_stabilitas') . '?alert=success&msg=Selamat anda berhasil menambah Data Rks Stabilitas');
		} else {
			header('location:' . base_url('QA/Doc/Doc_melting/melt_rks_stabilitas') . '?alert=error&msg=Maaf anda gagal menambah Data Rks Stabilitas');
		}
	}

	public function update()
	{
		$data['id_doc_melt'] = $this->input->post('id_doc_melt', TRUE);
		$data['jenis_doc_melt'] = $this->input->post('jenis_doc_melt', TRUE);
		$data['nama_doc_melt'] = $this->input->post('nama_doc_melt', TRUE);
		$data['tgl_berlaku'] = $this->convertdate($this->input->post('tgl_berlaku', TRUE));
		$data['tgl_review'] = $this->convertdate($this->input->post('tgl_review', TRUE));
		$respon = $this->M_melt_rks_stabilitas->update($data);

		if ($respon) {
			header('location:' . base_url('QA/Doc/Doc_melting/melt_rks_stabilitas') . '?alert=success&msg=Selamat anda berhasil mengubah Data Rks Stabilitas');
		} else {
			header('location:' . base_url('QA/Doc/Doc_melting/melt_rks_stabilitas') . '?alert=error&msg=Maaf anda gagal mengubah Data Rks Stabilitas');
		}
	}
	public function delete($id_doc_melt)
	{
		$data['id_doc_melt'] = $id_doc_melt;
		$respon = $this->M_melt_rks_stabilitas->delete($data);

		if ($respon) {
			header('location:' . base_url('QA/Doc/Doc_melting/melt_rks_stabilitas') . '?alert=success&msg=Selamat anda berhasil menghapus Data Rks Stabilitas');
		} else {
			header('location:' . base_url('QA/Doc/Doc_melting/melt_rks_stabilitas') . '?alert=error&msg=Maaf anda gagal menghapus Data Rks Stabilitas');
		}
	}

	private function convertDate($date)
	{
		return explode('/', $date)[2] . "-" . explode('/', $date)[1] . "-" . explode('/', $date)[0];
	}
}
