<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Left_sidebar extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        // check_not_login();
        $this->load->model('M_pemeriksaan_bahan');
        $this->load->model('M_permintaan_barang_gudang');
        $this->load->model('M_barang');
        $this->load->model('M_supplier');
        $this->load->model('M_users');
    }

    public function index()
    {
        $notif_pb['cek_karantina'] = $this->M_pemeriksaan_bahan->cek_karantina()->row_array(0);
        $notif_pb['cek_released'] = $this->M_pemeriksaan_bahan->cek_released()->row_array(0);
        $notif_pb['jml_notif'] = ($notif_pb['cek_karantina'] + ($notif_pb['cek_released']));
        var_dump($notif_pb);
        die;
        $this->template->load('template', 'layout/left_sidebar.php', $notif_pb);
        // print_r($data); 
    }
}
