<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pewarnaan extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		// check_not_login();
		$this->load->model('M_melting/M_pewarnaan');
	}

	public function index()
	{
		// $data['row'] = $this->customer_m->get();
		$data['result'] = $this->M_pewarnaan->get()->result_array();
		$this->template->load('template', 'content/melting/proses/pewarnaan/pewarnaan_data', $data);
		// print_r($data);

	}

	public function add()
	{
		$data['no_cr'] = $this->input->post('no_cr', TRUE);
		$data['batch_kapsul'] = $this->input->post('batch_kapsul', TRUE);
		$data['stock_mesin'] = $this->input->post('stock_mesin', TRUE);
		$data['kode_warna'] = $this->input->post('kode_warna', TRUE);
		$data['juml_gel'] = $this->input->post('juml_gel', TRUE);
		$data['no_bg'] = $this->input->post('no_bg', TRUE);
		$data['recyc'] = $this->input->post('recyc', TRUE);
		$data['juml_ex_gw'] = $this->input->post('juml_ex_gw', TRUE);
		$data['batch_ex_gw'] = $this->input->post('batch_ex_gw', TRUE);
		$data['berat_recyc'] = $this->input->post('berat_recyc', TRUE);
		$data['batch_recyc'] = $this->input->post('batch_recyc', TRUE);
		$data['jam_pewar'] = $this->input->post('jam_pewar', TRUE);
		$data['visc'] = $this->input->post('visc', TRUE);
		$data['juml_akhir'] = $this->input->post('juml_akhir', TRUE);
		$data['no_trans'] = $this->input->post('no_trans', TRUE);
        $data['nama_operator'] = $this->input->post('nama_operator', TRUE);
		$respon = $this->M_pewarnaan->add($data);

		if ($respon) {
			header('location:' . base_url('Pewarnaan') . '?alert=success&msg=Selamat anda berhasil menambah Pewarnaan');
		} else {
			header('location:' . base_url('Pewarnaan') . '?alert=error&msg=Maaf anda gagal menambah Pewarnaan');
		}
	}

	public function update()
	{
		$data['id_pewarna'] = $this->input->post('id_pewarna', TRUE);
		$data['no_cr'] = $this->input->post('no_cr', TRUE);
		$data['batch_kapsul'] = $this->input->post('batch_kapsul', TRUE);
		$data['stock_mesin'] = $this->input->post('stock_mesin', TRUE);
		$data['kode_warna'] = $this->input->post('kode_warna', TRUE);
		$data['juml_gel'] = $this->input->post('juml_gel', TRUE);
		$data['no_bg'] = $this->input->post('no_bg', TRUE);
		$data['recyc'] = $this->input->post('recyc', TRUE);
		$data['juml_ex_gw'] = $this->input->post('juml_ex_gw', TRUE);
		$data['batch_ex_gw'] = $this->input->post('batch_ex_gw', TRUE);
		$data['berat_recyc'] = $this->input->post('berat_recyc', TRUE);
		$data['batch_recyc'] = $this->input->post('batch_recyc', TRUE);
		$data['jam_pewar'] = $this->input->post('jam_pewar', TRUE);
		$data['visc'] = $this->input->post('visc', TRUE);
		$data['juml_akhir'] = $this->input->post('juml_akhir', TRUE);
		$data['no_trans'] = $this->input->post('no_trans', TRUE);
		$data['nama_operator'] = $this->input->post('nama_operator', TRUE);
		$respon = $this->M_pewarnaan->update($data);
		// echo $respon;
		if ($respon) {
			header('location:' . base_url('Pewarnaan') . '?alert=success&msg=Selamat anda berhasil meng-update Pewarnaan');
		} else {
			header('location:' . base_url('Pewarnaan') . '?alert=error&msg=Maaf anda gagal meng-update Pewarnaan');
		}
	}
	public function delete($id_pewarna)
	{
		$data['id_pewarna'] = $id_pewarna;
		$respon = $this->M_pewarnaan->delete($data);

		if ($respon) {
			header('location:' . base_url('Pewarnaan') . '?alert=success&msg=Selamat anda berhasil menghapus Pewarnaan');
		} else {
			header('location:' . base_url('Pewarnaan') . '?alert=error&msg=Maaf anda gagal menghapus Pewarnaan');
		}
	}	
	private function convertDate($date)
	{
		return explode('/', $date)[2] . "-" . explode('/', $date)[1] . "-" . explode('/', $date)[0];
	}

	// public function cek_kode_barang(){
    //     $kode_barang = $this->input->post('kode_barang',TRUE);

    //     $row = $this->M_barang->cek_kode_barang($kode_barang)->row_array();
    //     if ($row['count_sj']==0) {
    //         echo "false";
    //     }else{
    //         echo "true";
    //     }
    // }
}
