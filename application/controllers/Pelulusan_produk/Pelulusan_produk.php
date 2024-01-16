<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelulusan_produk extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		// check_not_login();
		$this->load->model('M_pelulusan_produk/M_pelulusan_produk');
	}

	public function index()
	{
		// $data['row'] = $this->customer_m->get();
		$data['result'] = $this->M_pelulusan_produk->get()->result_array();
		$this->template->load('template', 'content/pelulusan_produk/pelulusan_produk_data', $data);
		// print_r($data);

	}

	public function add()
	{
		$data['kode_barang'] = $this->input->post('kode_barang', TRUE);
		$data['nama_barang'] = $this->input->post('nama_barang', TRUE);
		$data['nama_produsen'] = $this->input->post('nama_produsen', TRUE);
		$data['negara_produsen'] = $this->input->post('negara_produsen', TRUE);
		$data['jenis_bahan'] = $this->input->post('jenis_bahan', TRUE);
		$data['jenis_gel'] = $this->input->post('jenis_gel', TRUE);
		$data['qty_pack'] = $this->input->post('qty_pack', TRUE);
		$data['satuan'] = $this->input->post('satuan', TRUE);
		$data['sertif_halal'] = $this->input->post('sertif_halal', TRUE);
		$data['no_seri'] = $this->input->post('no_seri', TRUE);
		$data['ed_sertif'] = $this->convertDate($this->input->post('ed_sertif', TRUE));
		$data['penerbit_halal'] = $this->input->post('penerbit_halal', TRUE);
		$respon = $this->M_barang->add($data);

		if ($respon) {
			header('location:' . base_url('Barang') . '?alert=success&msg=Selamat anda berhasil menambah Barang');
		} else {
			header('location:' . base_url('Barang') . '?alert=error&msg=Maaf anda gagal menambah Barang');
		}
	}
	public function update()
	{
		$data['id_barang'] = $this->input->post('id_barang', TRUE);
		$data['kode_barang'] = $this->input->post('kode_barang', TRUE);
		$data['nama_barang'] = $this->input->post('nama_barang', TRUE);
		$data['nama_produsen'] = $this->input->post('nama_produsen', TRUE);
		$data['negara_produsen'] = $this->input->post('negara_produsen', TRUE);
		$data['jenis_bahan'] = $this->input->post('jenis_bahan', TRUE);
		$data['jenis_gel'] = $this->input->post('jenis_gel', TRUE);
		$data['qty_pack'] = $this->input->post('qty_pack', TRUE);
		$data['satuan'] = $this->input->post('satuan', TRUE);
		$data['sertif_halal'] = $this->input->post('sertif_halal', TRUE);
		$data['no_seri'] = $this->input->post('no_seri', TRUE);
		$data['ed_sertif'] = $this->convertDate($this->input->post('ed_sertif', TRUE));
		$data['penerbit_halal'] = $this->input->post('penerbit_halal', TRUE);
		$respon = $this->M_barang->update($data);
		// echo $respon;
		if ($respon) {
			header('location:' . base_url('Barang') . '?alert=success&msg=Selamat anda berhasil meng-update Barang');
		} else {
			header('location:' . base_url('Barang') . '?alert=error&msg=Maaf anda gagal meng-update Barang');
		}
	}
	public function delete($id_barang)
	{
		$data['id_barang'] = $id_barang;
		$respon = $this->M_barang->delete($data);

		if ($respon) {
			header('location:' . base_url('Barang') . '?alert=success&msg=Selamat anda berhasil menghapus Barang');
		} else {
			header('location:' . base_url('Barang') . '?alert=error&msg=Maaf anda gagal menghapus Barang');
		}
	}
	private function convertDate($date)
	{
		return explode('/', $date)[2] . "-" . explode('/', $date)[1] . "-" . explode('/', $date)[0];
	}

	public function cek_kode_barang(){
        $kode_barang = $this->input->post('kode_barang',TRUE);

        $row = $this->M_barang->cek_kode_barang($kode_barang)->row_array();
        if ($row['count_sj']==0) {
            echo "false";
        }else{
            echo "true";
        }
    }
}
