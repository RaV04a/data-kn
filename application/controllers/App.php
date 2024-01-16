<?php
defined('BASEPATH') or exit('No direct script access allowed');

class App extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	function __construct()
	{
		parent::__construct();
		// check_not_login();
		$this->load->model('M_dashboard');
	}
	public function index()
	{
		$hariini = date('Y-m-d');
		$tot_barang_masuk = $this->M_dashboard->tot_barang_masuk($hariini)->row_array();
		$data['tot_barang_masuk'] = $tot_barang_masuk['tot_barang_masuk'];

		$tot_transfer_slip = $this->M_dashboard->tot_transfer_slip($hariini)->row_array();
		$data['tot_transfer_slip'] = $tot_transfer_slip['tot_transfer_slip'];

		$tot_permintaan_barang = $this->M_dashboard->tot_permintaan_barang($hariini)->row_array();
		$data['tot_permintaan_barang'] = $tot_permintaan_barang['tot_permintaan_barang'];

		$tot_barang = $this->M_dashboard->tot_barang()->row_array();
		$data['tot_barang'] = $tot_barang['tot_barang'];
		$tot_supplier = $this->M_dashboard->tot_supplier()->row_array();
		$data['tot_supplier'] = $tot_supplier['tot_supplier'];

		$data['users'] = $this->M_dashboard->users()->result_array();
		// print_r($data);
		$this->template->load('template', 'content/dashboard', $data);
		// echo "string";
	}
}
