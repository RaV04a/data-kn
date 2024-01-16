<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Permintaan_barang_gudang extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        // check_not_login();
        $this->load->model('M_melting/M_permintaan_barang_melting');
        $this->load->model('M_gudang_bahanbaku/M_permintaan_barang_gudang');
        $this->load->model('M_melting/M_transaksi_melting');
        $this->load->model('M_gudang_bahanbaku/M_barang_masuk');
        $this->load->model('M_users/M_users');
    }
    private function convertDate($date)
    {
        return explode('/', $date)[2] . "-" . explode('/', $date)[1] . "-" . explode('/', $date)[0];
    }
    public function index()
    {
        // $data['row'] = $this->customer_m->get();
        $data['result'] = $this->M_permintaan_barang_gudang->get()->result_array();
        $data['user'] = $this->M_users->get()->result_array();
        $data['bm'] = $this->M_barang_masuk->get()->result_array();
        // for ($i = 0; $i < count($data['bm']); $i++) {
        //     $d['no_batch'] = $data['bm'][$i]['no_batch'];
        //     $jml_permintaan_barang = $this->M_permintaan_barang_gudang->jml_permintaan_barang($d)->row_array();
        //     $stok = $data['bm'][$i]['qty'] - $jml_permintaan_barang['tot_permintaan_barang'];
        //     $data['bm'][$i]['stok'] = $stok;
        // }

        $this->template->load('template', 'content/gudang_bahanbaku/permintaan_barang_gudang/permintaan_barang_gudang_data', $data);
        // print_r($data['bm']);
    }
    public function data_permintaan_barang()
    {
        $no_transfer_slip = $this->input->post('no_transfer_slip', TRUE);

        $result = $this->M_permintaan_barang_gudang->data_permintaan_barang($no_transfer_slip)->result_array();
        /*for($i=0; $i<count($result);$i++){
            $data['id_penerima'] = $result[$i]['id_penerima'];
            $donasi = $this->m_penerima->data_donasi($data)->result_array();
            $a=0;
            for($o=0; $o<count($donasi);$o++){
                $a+=$donasi[$o]['donasi'];
            }
            $result[$i]['hasil_donasi']=$a;
        }*/
        echo json_encode($result);
    }
    public function cek_transfer_slip()
    {
        $no_transfer_slip = $this->input->post('no_transfer_slip', TRUE);

        $row = $this->M_permintaan_barang_gudang->cek_transfer_slip($no_transfer_slip)->row_array();
        if ($row['count_sj'] == 0) {
            echo "false";
        } else {
            echo "true";
        }
    }

    public function disetujui()
    {
        $no_transfer_slip = $this->input->post('no_transfer_slip', TRUE);
        $tgl_rilis = $this->convertDate($this->input->post('tgl_rilis', TRUE));
        // $data['id_barang_masuk'] = $this->input->post('id_barang_masuk', TRUE);
        // $data['qty'] = $this->input->post('qty', TRUE);
        // var_dump($data);
        // die;
        $data = $this->M_permintaan_barang_gudang->data_permintaan_barang($no_transfer_slip)->result_array();
        foreach ($data as $k => $value) {
            $per_barang = array('id_barang_masuk' => $value['id_barang_masuk'], 'qty' => $value['qty']);
            $this->M_barang_masuk->update_stok($per_barang);
            $id_mm = $this->M_permintaan_barang_gudang->add_approv($data[$k], $tgl_rilis);
            $id_barang_keluar = $this->M_permintaan_barang_gudang->add_approv2($data[$k], $tgl_rilis);
            $this->M_transaksi_melting->trans_masuk(array('id_mm' => $id_mm, 'qty' => $value['qty']));
        }
        $this->M_permintaan_barang_gudang->disetujui($no_transfer_slip, $tgl_rilis);
        $respon = $this->M_permintaan_barang_gudang->update_status_ts($no_transfer_slip, "DiSetujui");


        if ($respon) {
            header('location:' . base_url('gudang_bahanbaku/Permintaan_barang_gudang') . '?alert=success&msg=Selamat anda berhasil Menyetujui Permintaan Barang Gudang');
        } else {
            header('location:' . base_url('gudang_bahanbaku/Permintaan_barang_gudang') . '?alert=error&msg=Maaf anda gagal Menyetujui Permintaan Barang Gudang');
        }
    }

    public function ditolak()
    {
        $no_transfer_slip = $this->input->post('no_transfer_slip', TRUE);
        $tgl_reject = $this->convertDate($this->input->post('tgl_reject', TRUE));
        $this->M_permintaan_barang_gudang->ditolak($no_transfer_slip, $tgl_reject);
        $respon =  $this->M_permintaan_barang_gudang->update_status_ts($no_transfer_slip, "Tidak DiSetujui");

        if ($respon) {
            header('location:' . base_url('gudang_bahanbaku/Permintaan_barang_gudang') . '?alert=success&msg=Selamat anda berhasil Menolak Permintaan Barang Gudang');
        } else {
            header('location:' . base_url('gudang_bahanbaku/Permintaan_barang_gudang') . '?alert=error&msg=Maaf anda gagal Menolak Permintaan Barang Gudang');
        }
    }

    public function delete($no_transfer_slip)
    {
        $data['no_transfer_slip'] = str_replace('--', '/', $no_transfer_slip);
        $respon = $this->M_permintaan_barang_gudang->delete($data);

        if ($respon) {
            header('location:' . base_url('gudang_bahanbaku/permintaan_barang_gudang') . '?alert=success&msg=Selamat anda berhasil menghapus Permintaan Barang Masuk Gudang');
        } else {
            header('location:' . base_url('gudang_bahanbaku/permintaan_barang_gudang') . '?alert=error&msg=Maaf anda gagal menghapus Permintaan Barang Masuk Gudang');
        }
    }
    public function pdf_trasnfer_slip($no_sj = null)
    {
        $no_transfer_slip = str_replace("--", "/", $no_sj);
        $mpdf = new \Mpdf\Mpdf();

        $data['row'] = $this->M_permintaan_barang_gudang->ambil_transfer_slip($no_transfer_slip)->row_array();
        $data['detail'] = $this->M_permintaan_barang_gudang->data_permintaan_barang_keluar($no_transfer_slip)->result_array();

        $d = $this->load->view('laporan/permintaan_barang_gudang/page_surat_jalan', $data, TRUE);
        $mpdf->AddPage("P", "", "", "", "", "15", "15", "5", "15", "", "", "", "", "", "", "", "", "", "", "", "A4");
        $mpdf->WriteHTML($d);
        $mpdf->Output();
    }
}
