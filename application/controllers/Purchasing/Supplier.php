<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        // check_not_login();
        $this->load->model('M_purchasing/M_supplier');

    }

	public function index()
	{
		// $data['row'] = $this->supplier_m->get();
		$result = 
		$data['result'] = $this->M_supplier->get()->result_array();
		$this->template->load('template', 'content/purchasing/supplier/supplier_data',$data);

	}

	public function add()
	{
		$data['kode_supplier'] = $this->input->post('kode_supplier',TRUE);
        $data['nama_supplier'] = $this->input->post('nama_supplier',TRUE);
        $data['negara'] = $this->input->post('negara',TRUE);
        $data['alamat'] = $this->input->post('alamat',TRUE);
		$data['sertif_halal'] = $this->input->post('sertif_halal',TRUE);
        $respon = $this->M_supplier->add($data);

        if($respon){
        	header('location:'.base_url('purchasing/supplier').'?alert=success&msg=Selamat anda berhasil menambah supplier');
        }else{
        	header('location:'.base_url('purchasing/supplier').'?alert=success&msg=Maaf anda gagal menambah supplier');
        }
	}
	public function update()
	{
		$data['id_supplier'] = $this->input->post('id_supplier',TRUE);
		$data['kode_supplier'] = $this->input->post('kode_supplier',TRUE);
        $data['nama_supplier'] = $this->input->post('nama_supplier',TRUE);
		$data['negara'] = $this->input->post('negara',TRUE);
        $data['alamat'] = $this->input->post('alamat',TRUE);
        $respon = $this->M_supplier->update($data);
        // echo $respon;
        if($respon){
        	header('location:'.base_url('purchasing/supplier').'?alert=success&msg=Selamat anda berhasil meng-update supplier');
        }else{
        	header('location:'.base_url('purchasing/supplier').'?alert=success&msg=Maaf anda gagal meng-update supplier');
        }
	}
	public function delete($id_supplier)
	{
		$data['id_supplier'] = $id_supplier;
        $respon = $this->M_supplier->delete($data);

        if($respon){
        	header('location:'.base_url('purchasing/supplier').'?alert=success&msg=Selamat anda berhasil menghapus supplier');
        }else{
        	header('location:'.base_url('purchasing/supplier').'?alert=success&msg=Maaf anda gagal menghapus supplier');
        }
	}

	public function cek_kode_supplier(){
        $kode_supplier = $this->input->post('kode_supplier',TRUE);

        $row = $this->M_supplier->cek_kode_supplier($kode_supplier)->row_array();
        if ($row['count_sj']==0) {
            echo "false";
        }else{
            echo "true";
        }
    }
}
