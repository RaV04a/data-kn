<?php
defined('BASEPATH') or exit('No direct script access allowed');

class pac_protap extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('M_qa/M_doc/M_pac/M_pac_protap');
	}

	public function index()
	{
		$data['result'] = $this->M_pac_protap->get()->result_array();
		$this->template->load('template', 'content/qa/doc/packing/pac_protap_data', $data);
	}

	public function add()
	{
		$data['jenis_doc_pac'] = $this->input->post('jenis_doc_pac', TRUE);
		$data['nama_doc_pac'] = $this->input->post('nama_doc_pac', TRUE);
		$data['tgl_berlaku'] = $this->convertdate($this->input->post('tgl_berlaku', TRUE));
		$data['tgl_review'] = $this->convertdate($this->input->post('tgl_review', TRUE));
		$respon = $this->M_pac_protap->add($data);

		if ($respon) {
			header('location:' . base_url('QA/Doc/Doc_packing/pac_protap') . '?alert=success&msg=Selamat anda berhasil menambah Data Protap');
		} else {
			header('location:' . base_url('QA/Doc/Doc_packing/pac_protap') . '?alert=error&msg=Maaf anda gagal menambah Data Protap');
		}
	}

	public function update()
	{
		$data['id_doc_pac'] = $this->input->post('id_doc_pac', TRUE);
		$data['jenis_doc_pac'] = $this->input->post('jenis_doc_pac', TRUE);
		$data['nama_doc_pac'] = $this->input->post('nama_doc_pac', TRUE);
		$data['tgl_berlaku'] = $this->convertdate($this->input->post('tgl_berlaku', TRUE));
		$data['tgl_review'] = $this->convertdate($this->input->post('tgl_review', TRUE));
		$respon = $this->M_pac_protap->update($data);

		if ($respon) {
			header('location:' . base_url('QA/Doc/Doc_packing/pac_protap') . '?alert=success&msg=Selamat anda berhasil mengubah Data Protap');
		} else {
			header('location:' . base_url('QA/Doc/Doc_packing/pac_protap') . '?alert=error&msg=Maaf anda gagal mengubah Data Protap');
		}
	}
	public function delete($id_doc_pac)
	{
		$data['id_doc_pac'] = $id_doc_pac;
		$respon = $this->M_pac_protap->delete($data);

		if ($respon) {
			header('location:' . base_url('QA/Doc/Doc_packing/pac_protap') . '?alert=success&msg=Selamat anda berhasil menghapus Data Protap');
		} else {
			header('location:' . base_url('QA/Doc/Doc_packing/pac_protap') . '?alert=error&msg=Maaf anda gagal menghapus Data Protap');
		}
	}

	private function convertDate($date)
	{
		return explode('/', $date)[2] . "-" . explode('/', $date)[1] . "-" . explode('/', $date)[0];
	}
}
