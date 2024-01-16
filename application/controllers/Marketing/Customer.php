<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customer extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		// check_not_login();
		$this->load->model('M_marketing/M_customer');
	}

	public function index()
	{
		$result =
			$data['result'] = $this->M_customer->get()->result_array();
		$this->template->load('template', 'content/marketing/customer/customer_data', $data);
	}

	public function add()
	{
		$data['kode_customer'] = $this->input->post('kode_customer', TRUE);
		$data['nama_customer'] = $this->input->post('nama_customer', TRUE);
		$data['negara'] = $this->input->post('negara', TRUE);
		$data['alamat'] = $this->input->post('alamat', TRUE);
		$respon = $this->M_customer->add($data);

		if ($respon) {
			header('location:' . base_url('Marketing/Customer') . '?alert=success&msg=Selamat anda berhasil menambah Customer');
		} else {
			header('location:' . base_url('Marketing/Customer') . '?alert=error&msg=Maaf anda gagal menambah Customer');
		}
	}
	public function update()
	{
		$data['id_customer'] = $this->input->post('id_customer', TRUE);
		$data['kode_customer'] = $this->input->post('kode_customer', TRUE);
		$data['nama_customer'] = $this->input->post('nama_customer', TRUE);
		$data['negara'] = $this->input->post('negara', TRUE);
		$data['alamat'] = $this->input->post('alamat', TRUE);
		$respon = $this->M_customer->update($data);
		// echo $respon;
		if ($respon) {
			header('location:' . base_url('Marketing/Customer') . '?alert=success&msg=Selamat anda berhasil meng-update Customer');
		} else {
			header('location:' . base_url('Marketing/Customer') . '?alert=error&msg=Maaf anda gagal meng-update Customer');
		}
	}
	public function delete($id_customer)
	{
		$data['id_customer'] = $id_customer;
		$respon = $this->M_customer->delete($data);

		if ($respon) {
			header('location:' . base_url('Marketing/Customer') . '?alert=success&msg=Selamat anda berhasil menghapus Customer');
		} else {
			header('location:' . base_url('Marketing/Customer') . '?alert=error&msg=Maaf anda gagal menghapus Customer');
		}
	}

	public function cek_kode_customer(){
        $kode_customer = $this->input->post('kode_customer',TRUE);

        $row = $this->M_customer->cek_kode_customer($kode_customer)->row_array();
        if ($row['count_sj']==0) {
            echo "false";
        }else{
            echo "true";
        }
    }
}
