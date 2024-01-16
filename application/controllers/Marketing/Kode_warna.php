<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kode_warna extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		// check_not_login();
		$this->load->model('M_marketing/M_kode_warna');
	}

	public function index()
	{
		// $data['row'] = $this->customer_m->get();
		$data['result'] = $this->M_kode_warna->getcap()->result_array();
		$this->template->load('template', 'content/marketing/input_kodewarna/kode_warna', $data);
	}

	public function add()
	{
		$data['id_kw_cap'] = $this->input->post('id_kw_cap', TRUE);
		$data['id_kw_body'] = $this->input->post('id_kw_body', TRUE);
		$data['kode_warna'] = $this->input->post('kode_warna', TRUE);
		$data['warna'] = $this->input->post('warna', TRUE);
		$data['ti02'] = $this->input->post('ti02', TRUE);
		$data['r1'] = $this->input->post('r1', TRUE);
		$data['r3'] = $this->input->post('r3', TRUE);
		$data['y5'] = $this->input->post('y5', TRUE);
		$data['b1'] = $this->input->post('b1', TRUE);
		$data['y10'] = $this->input->post('y10', TRUE);
		$data['sf'] = $this->input->post('sf', TRUE);
		$respon = $this->M_kode_warna->add_cap($data);
		$respon = $this->M_kode_warna->add_body($data);

		if ($respon) {
			header('location:' . base_url('Marketing/Kode_warna') . '?alert=success&msg=Selamat anda berhasil menambah Kode Warna');
		} else {
			header('location:' . base_url('Marketing/Kode_warna') . '?alert=error&msg=Maaf anda gagal menambah Kode Warna');
		}
	}

	public function findcap($kode_warna)
	{
		$warna = $this->M_kode_warna->findcap($kode_warna)->result_array();
		if (count($warna) > 0) {
			echo json_encode($warna[0]);
			return;
		}
		return null;
	}

	public function findbody($kode_warna)
	{
		$warna = $this->M_kode_warna->findbody($kode_warna)->result_array();
		if (count($warna) > 0) {
			echo json_encode($warna[0]);
			return;
		}
		return null;
	}

	public function update()
	{
		$data['id_kw_cap'] = $this->input->post('id_kw_cap', TRUE);
		$data['id_kw_body'] = $this->input->post('id_kw_cap', TRUE);
		$data['kode_warna'] = $this->input->post('kode_warna', TRUE);
		$data['warna'] = $this->input->post('warna', TRUE);
		$data['ti02'] = $this->input->post('ti02', TRUE);
		$data['r1'] = $this->input->post('r1', TRUE);
		$data['r3'] = $this->input->post('r3', TRUE);
		$data['y5'] = $this->input->post('y5', TRUE);
		$data['b1'] = $this->input->post('b1', TRUE);
		$data['y10'] = $this->input->post('y10', TRUE);
		$data['sf'] = $this->input->post('sf', TRUE);
		$respon = $this->M_kode_warna->update_cap($data);
		$respon = $this->M_kode_warna->update_body($data);
		// echo $respon;
		if ($respon) {
			header('location:' . base_url('Marketing/Kode_warna') . '?alert=success&msg=Selamat anda berhasil meng-update Kode Warna');
		} else {
			header('location:' . base_url('Marketing/Kode_warna') . '?alert=error&msg=Maaf anda gagal meng-update Kode Warna');
		}
	}
	public function delete($id_kw_cap)
	{
		$data['id_kw_cap'] = $id_kw_cap;
		$data['id_kw_body'] = $id_kw_cap;
		$respon = $this->M_kode_warna->delete_cap($data);
		$respon = $this->M_kode_warna->delete_body($data);

		if ($respon) {
			header('location:' . base_url('Marketing/Kode_warna') . '?alert=success&msg=Selamat anda berhasil menghapus Kode Warna');
		} else {
			header('location:' . base_url('Marketing/Kode_warna') . '?alert=error&msg=Maaf anda gagal menghapus Kode Warna');
		}
	}
	private function convertDate($date)
	{
		return explode('/', $date)[2] . "-" . explode('/', $date)[1] . "-" . explode('/', $date)[0];
	}
}
