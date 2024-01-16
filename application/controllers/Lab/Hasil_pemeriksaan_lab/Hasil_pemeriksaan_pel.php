<?php
defined('BASEPATH') or exit('No direct script access allowed');

class hasil_pemeriksaan_pel extends CI_Controller
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
        $this->load->model('M_lab/M_hasil_pemeriksaan/M_hasil_pemeriksaan_pel');
        $this->load->model('M_gudang_bahanbaku/M_karantina');
    }

    private function convertDate($date)
    {
        return explode('/', $date)[2] . "-" . explode('/', $date)[1] . "-" . explode('/', $date)[0];
    }

    public function index()
    {
        // $data['row'] = $this->customer_m->get();
        $data['result'] = $this->M_hasil_pemeriksaan_pel->get()->result_array();
        $data['res_barang'] = $this->M_barang->get()->result_array();
        $data['res_supplier'] = $this->M_supplier->get()->result_array();
        $data['res_user'] = $this->M_users->get()->result_array();
        $data['res_pb'] = $this->M_pemeriksaan_bahan->get()->result_array();
        $this->template->load('template', 'content/lab/hasil_pemeriksaan/hasil_pemeriksaan_pel.php', $data);
    }

    // Uji Pelarut (Pel)
    public function add_ujipel()
    {
        $data['id_pb'] = $this->input->post('id_pb', TRUE);
        $data['id_barang'] = $this->input->post('id_barang', TRUE);
        $data['id_supplier'] = $this->input->post('id_supplier', TRUE);
        $data['tgl_uji'] = $this->convertDate($this->input->post('tgl_uji', TRUE));
        $data['no_analis'] = $this->input->post('no_analis', TRUE);
        $data['no_surat_jalan'] = $this->input->post('no_surat_jalan', TRUE);
        $data['no_batch'] = $this->input->post('no_batch', TRUE);
        $data['nama_operator'] = $this->input->post('nama_operator', TRUE);
        $data['pemerian'] = $this->input->post('pemerian', TRUE);
        $data['aroma'] = $this->input->post('aroma', TRUE);
        $data['berat_jenis'] = $this->input->post('berat_jenis', TRUE);

        $respon = $this->M_hasil_pemeriksaan_pel->add_ujipel($data);

        $this->M_pemeriksaan_bahan->update_status_pb($data['id_pb'], "Proses");


        if ($respon) {
            header('location:' . base_url('lab/Pemeriksaan_bahan') . '?alert=success&msg=Selamat anda berhasil melakukan Uji Bahan Pelarut');
        } else {
            header('location:' . base_url('lab/Pemeriksaan_bahan') . '?alert=error&msg=Maaf anda gagal melakukan Uji Bahan Pelarut');
        }
    }

    public function add()
    {
        $data['id_ujipel'] = $this->input->post('id_ujipel', TRUE);
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
        $respon = $this->M_hasil_pemeriksaan_pel->approval_rilis($data);

        if ($respon) {
            header('location:' . base_url('lab/Hasil_pemeriksaan_lab/Hasil_pemeriksaan_pel') . '?alert=success&msg=Selamat anda berhasil menambah Barang Masuk Bahan Pelarut');
        } else {
            header('location:' . base_url('lab/Hasil_pemeriksaan_lab/Hasil_pemeriksaan_pel') . '?alert=error&msg=Maaf anda gagal menambah Barang Masuk Bahan Pelarut');
        }
    }

    public function ditolak()
    {
        $data['id_ujipel'] = $this->input->post('id_ujipel', TRUE);
        $data['id_pb'] = $this->input->post('id_pb', TRUE);
        $data['no_batch'] = $this->input->post('no_batch', TRUE);
        $data['tgl_reject'] = $this->convertDate($this->input->post('tgl_reject', TRUE));
        // $data['tgl_reject'] = $this->input->post('tgl_reject', TRUE);
        $data['no_surat_jalan'] = $this->input->post('no_surat_jalan', TRUE);

        $this->M_pemeriksaan_bahan->update_status_pb($data['id_pb'], "Di Tolak");
        $respon = $this->M_hasil_pemeriksaan_pel->approval_ditolak($data);

        if ($respon) {
            header('location:' . base_url('lab/Hasil_pemeriksaan_lab/Hasil_pemeriksaan_pel') . '?alert=success&msg=Selamat anda berhasil Reject Bahan Pelarut');
        } else {
            header('location:' . base_url('lab/Hasil_pemeriksaan_lab/Hasil_pemeriksaan_pel') . '?alert=error&msg=Maaf anda gagal Reject Bahan Pelarut');
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

        $data['detail'] = $this->M_hasil_pemeriksaan_pel->ambil_label($no_surat_jalan)->result_array();

        $d = $this->load->view('laporan/hasil_pemeriksaan/hasil_pemeriksaan_pel/page_released', $data, TRUE);
        $mpdf->AddPage("P", "", "", "", "", "15", "15", "5", "15", "", "", "", "", "", "", "", "", "", "", "", "A4");
        $mpdf->WriteHTML($d);
        $mpdf->Output();
    }

    public function pdf_label_reject($no_sj = null)
    {
        $no_surat_jalan = str_replace("--", "/", $no_sj);
        $mpdf = new \Mpdf\Mpdf();

        $data['detail'] = $this->M_hasil_pemeriksaan_pel->ambil_label($no_surat_jalan)->result_array();

        $d = $this->load->view('laporan/hasil_pemeriksaan/hasil_pemeriksaan_pel/page_reject', $data, TRUE);
        $mpdf->AddPage("P", "", "", "", "", "15", "15", "5", "15", "", "", "", "", "", "", "", "", "", "", "", "A4");
        $mpdf->WriteHTML($d);
        $mpdf->Output();
    }

    public function pdf_label_hasil($no_sj = null)
    {
        $no_surat_jalan = str_replace("--", "/", $no_sj);
        $mpdf = new \Mpdf\Mpdf();

        $data['detail'] = $this->M_hasil_pemeriksaan_pel->ambil_hasil($no_surat_jalan)->result_array();

        $d = $this->load->view('laporan/hasil_pemeriksaan/hasil_pemeriksaan_pel/page_hasil', $data, TRUE);
        $mpdf->AddPage("P", "", "", "", "", "15", "15", "5", "15", "", "", "", "", "", "", "", "", "", "", "", "A4");
        $mpdf->WriteHTML($d);
        $mpdf->Output();
    }
}
