<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Header extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        // check_not_login();
        $this->load->model('M_barang_masuk');
        $this->load->model('M_permintaan_barang_gudang');
        $this->load->model('M_barang');
        $this->load->model('M_supplier');
        $this->load->model('M_users');
        $this->load->model('M_pemeriksaan_bahan');
    }
    private function convertDate($date)
    {
        return explode('/', $date)[2] . "-" . explode('/', $date)[1] . "-" . explode('/', $date)[0];
    }
    public function index()
    {
        // $data['row'] = $this->customer_m->get();
        $data['res_barang'] = $this->M_barang->get()->result_array();
        $data['res_supplier'] = $this->M_supplier->get()->result_array();
        $data['res_user'] = $this->M_users->get()->result_array();
        $data['brng_msk'] = $this->M_barang_masuk->get()->result_array();
        $this->template->load('template', 'layout/header', $data);
        // print_r($data); 
    }
}
