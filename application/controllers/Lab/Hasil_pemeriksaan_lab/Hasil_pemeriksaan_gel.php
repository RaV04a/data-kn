<?php
defined('BASEPATH') or exit('No direct script access allowed');

class hasil_pemeriksaan_gel extends CI_Controller
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
        $this->load->model('M_lab/M_hasil_pemeriksaan/M_hasil_pemeriksaan_gel');
        $this->load->model('M_gudang_bahanbaku/M_karantina');
    }

    private function convertDate($date)
    {
        return explode('/', $date)[2] . "-" . explode('/', $date)[1] . "-" . explode('/', $date)[0];
    }

    public function index()
    {
        // $data['row'] = $this->customer_m->get();
        $data['result'] = $this->M_hasil_pemeriksaan_gel->get()->result_array();
        $data['res_barang'] = $this->M_barang->get()->result_array();
        $data['res_supplier'] = $this->M_supplier->get()->result_array();
        $data['res_user'] = $this->M_users->get()->result_array();
        $data['res_pb'] = $this->M_pemeriksaan_bahan->get()->result_array();
        $this->template->load('template', 'content/lab/hasil_pemeriksaan/hasil_pemeriksaan_gel.php', $data);
    }

    // Uji Bahan Baku (Gelatin)
    public function add_ujigel()
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
        $data['kelarutan'] = $this->input->post('kelarutan', TRUE);
        $data['identifikasi'] = $this->input->post('identifikasi', TRUE);
        $data['bauzat_tl_air'] = $this->input->post('bauzat_tl_air', TRUE);
        $data['trans_larutan'] = $this->input->post('trans_larutan', TRUE);
        $data['s_pengeringan'] = $this->input->post('s_pengeringan', TRUE);
        $data['bloom_st'] = $this->input->post('bloom_st', TRUE);
        $data['viscost'] = $this->input->post('viscost', TRUE);
        $data['viscost_bd'] = $this->input->post('viscost_bd', TRUE);
        $data['ph'] = $this->input->post('ph', TRUE);
        $data['t_isl'] = $this->input->post('t_isl', TRUE);
        $data['sett_point'] = $this->input->post('sett_point', TRUE);
        $data['keasaman'] = $this->input->post('keasaman', TRUE);
        $data['sulfur_do'] = $this->input->post('sulfur_do', TRUE);
        $data['sisa_pmj'] = $this->input->post('sisa_pmj', TRUE);
        $data['uk_part_mesh4'] = $this->input->post('uk_part_mesh4', TRUE);
        $data['uk_part_mesh40'] = $this->input->post('uk_part_mesh40', TRUE);
        $data['kndtv'] = $this->input->post('kndtv', TRUE);
        $data['arsen'] = $this->input->post('arsen', TRUE);
        $data['timbal'] = $this->input->post('timbal', TRUE);
        $data['peroksida'] = $this->input->post('peroksida', TRUE);
        $data['besi'] = $this->input->post('besi', TRUE);
        $data['cromium'] = $this->input->post('cromium', TRUE);
        $data['zinc'] = $this->input->post('zinc', TRUE);
        $data['cm_dna_babi'] = $this->input->post('cm_dna_babi', TRUE);
        $data['m_tb'] = $this->input->post('m_tb', TRUE);
        $data['m_akk'] = $this->input->post('m_akk', TRUE);
        $data['m_ec'] = $this->input->post('m_ec', TRUE);
        $data['m_salmon'] = $this->input->post('m_salmon', TRUE);
        $data['wd_py'] = $this->input->post('wd_py', TRUE);

        $respon = $this->M_hasil_pemeriksaan_gel->add_ujigel($data);

        $this->M_pemeriksaan_bahan->update_status_pb($data['id_pb'], "Proses");

        if ($respon) {
            header('location:' . base_url('lab/Pemeriksaan_bahan') . '?alert=success&msg=Selamat anda berhasil melakukan Uji Bahan Gelatin (Bahan Baku)');
        } else {
            header('location:' . base_url('lab/Pemeriksaan_bahan') . '?alert=error&msg=Maaf anda gagal melakukan Uji Bahan Gelatin (Bahan Baku)');
        }
    }

    public function add()
    {
        $data['id_ujigel'] = $this->input->post('id_ujigel', TRUE);
        $data['id_pb'] = $this->input->post('id_pb', TRUE);
        $data['id_barang'] = $this->input->post('id_barang', TRUE);
        $data['id_supplier'] = $this->input->post('id_supplier', TRUE);
        $data['no_batch'] = $this->input->post('no_batch', TRUE);
        $data['no_surat_jalan'] = $this->input->post('no_surat_jalan', TRUE);
        $data['tgl'] = $this->convertDate($this->input->post('tgl', TRUE));
        $data['tgl_rilis'] = $this->convertDate($this->input->post('tgl_rilis', TRUE));
        $data['tgl_uu'] = $this->convertDate($this->input->post('tgl_uu', TRUE));
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

        $this->M_hasil_pemeriksaan_gel->approval_rilis($data);
        $respon = $this->M_barang_masuk->add($data);

        if ($respon) {
            header('location:' . base_url('lab/Hasil_pemeriksaan_lab/Hasil_pemeriksaan_gel') . '?alert=success&msg=Selamat anda berhasil menambah Barang Masuk Bahan Gelatin (Bahan Baku)');
        } else {
            header('location:' . base_url('lab/Hasil_pemeriksaan_lab/Hasil_pemeriksaan_gel') . '?alert=error&msg=Maaf anda gagal menambah Barang Masuk Bahan Gelatin (Bahan Baku)');
        }
    }

    public function ditolak()
    {
        $data['id_ujigel'] = $this->input->post('id_ujigel', TRUE);
        $data['id_pb'] = $this->input->post('id_pb', TRUE);
        $data['no_batch'] = $this->input->post('no_batch', TRUE);
        $data['tgl_reject'] = $this->convertDate($this->input->post('tgl_reject', TRUE));
        $data['no_surat_jalan'] = $this->input->post('no_surat_jalan', TRUE);

        $this->M_pemeriksaan_bahan->update_status_pb($data['id_pb'], "Di Tolak");
        $respon = $this->M_hasil_pemeriksaan_gel->approval_ditolak($data);

        if ($respon) {
            header('location:' . base_url('lab/Hasil_pemeriksaan_lab/Hasil_pemeriksaan_gel') . '?alert=success&msg=Selamat anda berhasil Reject Bahan Gelatin (Bahan Baku)');
        } else {
            header('location:' . base_url('lab/Hasil_pemeriksaan_lab/Hasil_pemeriksaan_gel') . '?alert=danger&msg=Maaf anda gagal Reject Bahan Gelatin (Bahan Baku)');
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

        $data['detail'] = $this->M_hasil_pemeriksaan_gel->ambil_label($no_surat_jalan)->result_array();

        $d = $this->load->view('laporan/hasil_pemeriksaan/hasil_pemeriksaan_gel/page_released', $data, TRUE);
        $mpdf->AddPage("P", "", "", "", "", "15", "15", "5", "15", "", "", "", "", "", "", "", "", "", "", "", "A4");
        $mpdf->WriteHTML($d);
        $mpdf->Output();
    }

    public function pdf_label_reject($no_sj = null)
    {
        $no_surat_jalan = str_replace("--", "/", $no_sj);
        $mpdf = new \Mpdf\Mpdf();

        $data['detail'] = $this->M_hasil_pemeriksaan_gel->ambil_label($no_surat_jalan)->result_array();

        $d = $this->load->view('laporan/hasil_pemeriksaan/hasil_pemeriksaan_gel/page_reject', $data, TRUE);
        $mpdf->AddPage("P", "", "", "", "", "15", "15", "5", "15", "", "", "", "", "", "", "", "", "", "", "", "A4");
        $mpdf->WriteHTML($d);
        $mpdf->Output();
    }

    public function pdf_label_hasil($no_sj = null)
    {
        $no_surat_jalan = str_replace("--", "/", $no_sj);
        $mpdf = new \Mpdf\Mpdf();

        $data['detail'] = $this->M_hasil_pemeriksaan_gel->ambil_hasil($no_surat_jalan)->result_array();

        $d = $this->load->view('laporan/hasil_pemeriksaan/hasil_pemeriksaan_gel/page_hasil', $data, TRUE);
        $mpdf->AddPage("P", "", "", "", "", "15", "15", "5", "15", "", "", "", "", "", "", "", "", "", "", "", "A4");
        $mpdf->WriteHTML($d);
        $mpdf->Output();
    }
}
