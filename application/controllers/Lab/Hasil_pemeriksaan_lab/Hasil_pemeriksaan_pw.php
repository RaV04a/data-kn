<?php
defined('BASEPATH') or exit('No direct script access allowed');

class hasil_pemeriksaan_pw extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        // check_not_login();
        $this->load->model('M_lab/M_pemeriksaan_bahan');
        $this->load->model('M_gudang_bahanbaku/M_permintaan_barang_gudang');
        $this->load->model('M_gudang_bahanbaku/M_barang');
        $this->load->model('M_gudang_bahanbaku/M_barang_masuk');
        $this->load->model('M_purchasing/M_supplier');
        $this->load->model('M_users/M_users');
        $this->load->model('M_lab/M_hasil_pemeriksaan/M_hasil_pemeriksaan_pw');
        $this->load->model('M_gudang_bahanbaku/M_karantina');
    }

    private function convertDate($date)
    {
        return explode('/', $date)[2] . "-" . explode('/', $date)[1] . "-" . explode('/', $date)[0];
    }

    public function index()
    {
        // $data['row'] = $this->customer_m->get();
        $data['result'] = $this->M_hasil_pemeriksaan_pw->get()->result_array();
        $data['res_barang'] = $this->M_barang->get()->result_array();
        $data['res_supplier'] = $this->M_supplier->get()->result_array();
        $data['res_user'] = $this->M_users->get()->result_array();
        $data['res_pb'] = $this->M_pemeriksaan_bahan->get()->result_array();
        $this->template->load('template', 'content/lab/hasil_pemeriksaan/hasil_pemeriksaan_pw.php', $data);
    }

    // Uji Pewarna (pw)
    public function add_ujipw()
    {
        $data['id_pb'] = $this->input->post('id_pb', TRUE);
        $data['id_barang'] = $this->input->post('id_barang', TRUE);
        $data['id_supplier'] = $this->input->post('id_supplier', TRUE);
        $data['tgl_uji'] = $this->convertDate($this->input->post('tgl_uji', TRUE));
        $data['no_analis'] = $this->input->post('no_analis', TRUE);
        $data['no_surat_jalan'] = $this->input->post('no_surat_jalan', TRUE);
        $data['no_batch'] = $this->input->post('no_batch', TRUE);
        $data['nama_barang'] = $this->input->post('nama_barang', TRUE);
        $data['nama_supplier'] = $this->input->post('nama_supplier', TRUE);
        $data['nama_operator'] = $this->input->post('nama_operator', TRUE);
        $data['pemerian'] = $this->input->post('pemerian', TRUE);
        $data['kelarutan'] = $this->input->post('kelarutan', TRUE);
        $data['ident_air'] = $this->input->post('ident_air', TRUE);
        $data['ident_hcip'] = $this->input->post('ident_hcip', TRUE);
        $data['ident_naohp'] = $this->input->post('ident_naohp', TRUE);
        $data['ident_naohp'] = $this->input->post('ident_naohp', TRUE);
        $data['ident_h2so4p'] = $this->input->post('ident_h2so4p', TRUE);
        $data['ident_t_larutan'] = $this->input->post('ident_t_larutan', TRUE);
        $data['s_pengeringan'] = $this->input->post('s_pengeringan', TRUE);
        $data['p_kadar'] = $this->input->post('p_kadar', TRUE);
        $data['kesamaan_std'] = $this->input->post('kesamaan_std', TRUE);
        $data['kondisi_py'] = $this->input->post('kondisi_py', TRUE);

        $respon = $this->M_hasil_pemeriksaan_pw->add_ujipw($data);

        $this->M_pemeriksaan_bahan->update_status_pb($data['id_pb'], "Proses");

        if ($respon) {
            header('location:' . base_url('lab/pemeriksaan_bahan') . '?alert=success&msg=Selamat anda berhasil melakukan Uji Bahan Pewarna');
        } else {
            header('location:' . base_url('lab/pemeriksaan_bahan') . '?alert=error&msg=Maaf anda gagal melakukan Uji Bahan Pewarna');
        }
    }

    public function add()
    {
        $data['id_ujipewarna'] = $this->input->post('id_ujipewarna', TRUE);
        $data['id_barang'] = $this->input->post('id_barang', TRUE);
        $data['id_pb'] = $this->input->post('id_pb', TRUE);
        $data['id_supplier'] = $this->input->post('id_supplier', TRUE);
        $data['no_batch'] = $this->input->post('no_batch', TRUE);
        $data['no_surat_jalan'] = $this->input->post('no_surat_jalan', TRUE);
        $data['tgl'] = $this->convertDate($this->input->post('tgl', TRUE));
        $data['tgl_rilis'] = $this->convertDate($this->input->post('tgl_rilis', TRUE));
        $data['tgl_uu'] = $this->convertDate($this->input->post('tgl_uu', TRUE));
        $data['nama_barang'] = $this->input->post('nama_barang', TRUE);
        $data['nama_supplier'] = $this->input->post('nama_supplier', TRUE);
        $data['op_gudang'] = $this->input->post('op_gudang', TRUE);
        $data['dok_pendukung'] = $this->input->post('dok_pendukung', TRUE);
        $data['jenis_kemasan'] = $this->input->post('jenis_kemasan', TRUE);
        $data['jml_kemasan'] = $this->input->post('jml_kemasan', TRUE);
        $data['ditolak_kemasan'] = $this->input->post('ditolak_kemasan', TRUE);
        $data['tutup'] = $this->input->post('tutup', TRUE);
        $data['wadah'] = $this->input->post('wadah', TRUE);
        $data['label'] = $this->input->post('label', TRUE);
        $data['qty'] = $this->input->post('qty', TRUE);
        $data['stok'] = $this->input->post('qty', TRUE);
        $data['ditolak_qty'] = $this->input->post('ditolak_qty', TRUE);
        $data['exp'] = $this->convertDate($this->input->post('exp', TRUE));
        $data['mfg'] = $this->convertDate($this->input->post('mfg', TRUE));

        $this->M_pemeriksaan_bahan->update_status_pb($data['id_pb'], "Released");

        $respon = $this->M_barang_masuk->add($data);
        $respon = $this->M_hasil_pemeriksaan_pw->approval_rilis($data);

        if ($respon) {
            header('location:' . base_url('lab/Hasil_pemeriksaan_lab/Hasil_pemeriksaan_pw') . '?alert=success&msg=Selamat anda berhasil menambah Barang Masuk Bahan Pelarut');
        } else {
            header('location:' . base_url('lab/Hasil_pemeriksaan_lab/Hasil_pemeriksaan_pw') . '?alert=error&msg=Maaf anda gagal menambah Barang Masuk Bahan Pelarut');
        }
    }

    public function ditolak()
    {
        $data['id_ujipewarna'] = $this->input->post('id_ujipewarna', TRUE);
        $data['id_barang'] = $this->input->post('id_barang', TRUE);
        $data['id_pb'] = $this->input->post('id_pb', TRUE);
        $data['id_supplier'] = $this->input->post('id_supplier', TRUE);
        $data['no_batch'] = $this->input->post('no_batch', TRUE);
        $data['tgl_reject'] = $this->convertDate($this->input->post('tgl_reject', TRUE));
        $data['no_surat_jalan'] = $this->input->post('no_surat_jalan', TRUE);

        $this->M_pemeriksaan_bahan->update_status_pb($data['id_pb'], "Di Tolak");
        $respon = $this->M_hasil_pemeriksaan_pw->approval_ditolak($data);

        if ($respon) {
            header('location:' . base_url('lab/Hasil_pemeriksaan_lab/Hasil_pemeriksaan_pw') . '?alert=success&msg=Selamat anda berhasil Reject Bahan Pewarna');
        } else {
            header('location:' . base_url('lab/Hasil_pemeriksaan_lab/Hasil_pemeriksaan_pw') . '?alert=error&msg=Maaf anda gagal Reject Bahan Pewarna');
        }
    }

    public function cek_surat_jalan()
    {
        $no_surat_jalan = $this->input->post('no_surat_jalan', TRUE);
        $row = $this->M_pemeriksaan_bahan->cek_surat_jalan($no_surat_jalan)->row_array();
        if ($row['count_sj'] == 0) {
            echo "false";
        } else {
            echo "true";
        }
    }

    public function pdf_label_released($no_sj = null)
    {
        $no_surat_jalan = str_replace("--", "/", $no_sj);
        $mpdf = new \Mpdf\Mpdf();

        $data['detail'] = $this->M_hasil_pemeriksaan_pw->ambil_label($no_surat_jalan)->result_array();

        $d = $this->load->view('laporan/hasil_pemeriksaan/hasil_pemeriksaan_pw/page_released', $data, TRUE);
        $mpdf->AddPage("P", "", "", "", "", "15", "15", "5", "15", "", "", "", "", "", "", "", "", "", "", "", "A4");
        $mpdf->WriteHTML($d);
        $mpdf->Output();
    }

    public function pdf_label_reject($no_sj = null)
    {
        $no_surat_jalan = str_replace("--", "/", $no_sj);
        $mpdf = new \Mpdf\Mpdf();

        $data['detail'] = $this->M_hasil_pemeriksaan_pw->ambil_label($no_surat_jalan)->result_array();

        $d = $this->load->view('laporan/hasil_pemeriksaan/hasil_pemeriksaan_pw/page_reject', $data, TRUE);
        $mpdf->AddPage("P", "", "", "", "", "15", "15", "5", "15", "", "", "", "", "", "", "", "", "", "", "", "A4");
        $mpdf->WriteHTML($d);
        $mpdf->Output();
    }

    public function pdf_label_hasil($no_sj = null)
    {
        $no_surat_jalan = str_replace("--", "/", $no_sj);
        $mpdf = new \Mpdf\Mpdf();

        $data['detail'] = $this->M_hasil_pemeriksaan_pw->ambil_hasil($no_surat_jalan)->result_array();

        $d = $this->load->view('laporan/hasil_pemeriksaan/hasil_pemeriksaan_pw/page_hasil', $data, TRUE);
        $mpdf->AddPage("P", "", "", "", "", "15", "15", "5", "15", "", "", "", "", "", "", "", "", "", "", "", "A4");
        $mpdf->WriteHTML($d);
        $mpdf->Output();
    }
}
