<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Karantina extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        // check_not_login();
        $this->load->model('M_gudang_bahanbaku/M_karantina');
        $this->load->model('M_gudang_bahanbaku/M_permintaan_barang_gudang');
        $this->load->model('M_gudang_bahanbaku/M_barang');
        $this->load->model('M_purchasing/M_supplier');
        $this->load->model('M_users/M_users');
    }
    private function convertDate($date)
    {
        return explode('/', $date)[2] . "-" . explode('/', $date)[1] . "-" . explode('/', $date)[0];
    }
    public function index()
    {
        // $data['row'] = $this->customer_m->get();
        $data['result'] = $this->M_karantina->get()->result_array();
        $data['res_barang'] = $this->M_barang->get()->result_array();
        $data['res_supplier'] = $this->M_supplier->get()->result_array();
        $data['res_user'] = $this->M_users->get()->result_array();
        $this->template->load('template', 'content/gudang_bahanbaku/karantina/karantina_data', $data);
        // print_r($data); 
    }

    public function update()
    {
        $data['id_pb'] = $this->input->post('id_pb', TRUE);
        $data['no_batch'] = $this->input->post('no_batch', TRUE);
        $data['no_surat_jalan'] = $this->input->post('no_surat_jalan', TRUE);
        $data['tgl'] = $this->convertDate($this->input->post('tgl', TRUE));
        $data['id_barang'] = $this->input->post('id_barang', TRUE);
        $data['id_supplier'] = $this->input->post('id_supplier', TRUE);
        $data['op_gudang'] = $this->input->post('op_gudang', TRUE);
        $data['dok_pendukung'] = $this->input->post('dok_pendukung', TRUE);
        $data['jenis_kemasan'] = $this->input->post('jenis_kemasan', TRUE);
        $data['jml_kemasan'] = $this->input->post('diterima_kemasan', TRUE);
        $data['ditolak_kemasan'] = $this->input->post('ditolak_kemasan', TRUE);
        $data['tutup'] = $this->input->post('tutup', TRUE);
        $data['wadah'] = $this->input->post('wadah', TRUE);
        $data['label'] = $this->input->post('label', TRUE);
        $data['qty'] = $this->input->post('diterima_bahan', TRUE);
        $data['ditolak_qty'] = $this->input->post('ditolak_bahan', TRUE);
        $data['exp'] = $this->convertDate($this->input->post('exp', TRUE));
        $data['mfg'] = $this->convertDate($this->input->post('mfg', TRUE));
        $respon = $this->M_karantina->update($data);
        // echo $respon;
        if ($respon) {
            header('location:' . base_url('gudang_bahanbaku/karantina') . '?alert=success&msg=Selamat anda berhasil meng-update Barang Masuk');
        } else {
            header('location:' . base_url('gudang_bahanbaku/karantina') . '?alert=error&msg=Maaf anda gagal meng-update Barang Masuk');
        }
    }

    public function delete($id_pb)
    {
        $data['id_pb'] = $id_pb;
        $respon = $this->M_karantina->delete($data);

        if ($respon) {
            header('location:' . base_url('gudang_bahanbaku/karantina') . '?alert=success&msg=Selamat anda berhasil menghapus barang masuk');
        } else {
            header('location:' . base_url('gudang_bahanbaku/karantina') . '?alert=danger&msg=Maaf anda gagal menghapus barang masuk');
        }
    }

    public function pdf_label_karantina($no_sj = null)
    {
        $no_surat_jalan = str_replace("--", "/", $no_sj);
        $mpdf = new \Mpdf\Mpdf();

        $data['detail'] = $this->M_karantina->ambil_label($no_surat_jalan)->result_array();

        $d = $this->load->view('laporan/karantina/page_karantina', $data, TRUE);
        $mpdf->AddPage("P", "", "", "", "", "15", "15", "5", "15", "", "", "", "", "", "", "", "", "", "", "", "A4");
        $mpdf->WriteHTML($d);
        $mpdf->Output();
    }
}
