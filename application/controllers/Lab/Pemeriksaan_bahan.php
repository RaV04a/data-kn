<?php
defined('BASEPATH') or exit('No direct script access allowed');

class pemeriksaan_bahan extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        // check_not_login();
        $this->load->model('M_lab/M_pemeriksaan_bahan');
        $this->load->model('M_lab/M_hasil_pemeriksaan/M_hasil_pemeriksaan_gel');
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
        $data['result'] = $this->M_pemeriksaan_bahan->get()->result_array();
        $cek_karantina = $this->M_pemeriksaan_bahan->cek_karantina()->row_array(0);
        $data['res_barang'] = $this->M_barang->get()->result_array();
        $data['res_supplier'] = $this->M_supplier->get()->result_array();
        $data['res_user'] = $this->M_users->get()->result_array();
        $this->template->load('template', 'content/lab/pemeriksaan_bahan.php', $data);
        // print_r($data); 
    }

    public function update()
    {
        $data['id_barang_masuk'] = $this->input->post('id_barang_masuk', TRUE);
        $data['no_batch'] = $this->input->post('no_batch', TRUE);
        $data['no_surat_jalan'] = $this->input->post('no_surat_jalan', TRUE);
        $data['tgl_uji'] = $this->convertDate($this->input->post('tgl_uji', TRUE));
        $data['id_barang'] = $this->input->post('id_barang', TRUE);
        $data['id_supplier'] = $this->input->post('id_supplier', TRUE);
        $data['nama_operator'] = $this->input->post('nama_operator', TRUE);
        $data['dok_pendukung'] = implode(",", $this->input->post('dok_pendukung', TRUE));
        $data['jenis_kemasan'] = $this->input->post('jenis_kemasan', TRUE);
        $data['jml_kemasan'] = $this->input->post('jml_kemasan', TRUE);
        $data['tutup'] = $this->input->post('tutup', TRUE);
        $data['wadah'] = $this->input->post('wadah', TRUE);
        $data['label'] = $this->input->post('label', TRUE);
        $data['qty'] = $this->input->post('qty', TRUE);
        $data['exp'] = $this->convertDate($this->input->post('exp', TRUE));
        $data['mfg'] = $this->convertDate($this->input->post('mfg', TRUE));
        $respon = $this->M_pemeriksaan_bahan->update($data);
        if ($respon) {
            header('location:' . base_url('gudang_bahanbaku/barang_masuk') . '?alert=success&msg=Selamat anda berhasil meng-update barang masuk');
        } else {
            header('location:' . base_url('gudang_bahanbaku/barang_masuk') . '?alert=danger&msg=Maaf anda gagal meng-update barang masuk');
        }
    }
    public function delete($id_pb)
    {
        $data['id_pb'] = $id_pb;
        $respon = $this->M_pemeriksaan_bahan->delete($data);

        $this->M_pemeriksaan_bahan->update_status_pb($data['id_pb'], "Karantina");
        $respon = $this->M_pemeriksaan_bahan->delete($data);

        $this->M_pemeriksaan_bahan->update_status_pb($data['id_pb'], "Karantina");
        $respon = $this->M_pemeriksaan_bahan->delete_pw($data);

        $this->M_pemeriksaan_bahan->update_status_pb($data['id_pb'], "Karantina");
        $respon = $this->M_pemeriksaan_bahan->delete_pel($data);

        $this->M_pemeriksaan_bahan->update_status_pb($data['id_pb'], "Karantina");
        $respon = $this->M_pemeriksaan_bahan->delete_tp($data);

        $this->M_pemeriksaan_bahan->update_status_pb($data['id_pb'], "Karantina");
        $respon = $this->M_pemeriksaan_bahan->delete_csf($data);

        $this->M_pemeriksaan_bahan->update_status_pb($data['id_pb'], "Karantina");
        $respon = $this->M_pemeriksaan_bahan->delete_leca($data);

        $this->M_pemeriksaan_bahan->update_status_pb($data['id_pb'], "Karantina");
        $respon = $this->M_pemeriksaan_bahan->delete_sls($data);

        $this->M_pemeriksaan_bahan->update_status_pb($data['id_pb'], "Karantina");
        $respon = $this->M_pemeriksaan_bahan->delete_titan($data);

        $this->M_pemeriksaan_bahan->update_status_pb($data['id_pb'], "Karantina");
        $respon = $this->M_pemeriksaan_bahan->delete_nb($data);

        $this->M_pemeriksaan_bahan->update_status_pb($data['id_pb'], "Karantina");
        $respon = $this->M_pemeriksaan_bahan->delete_mepa($data);

        if ($respon) {
            header('location:' . base_url('lab/pemeriksaan_bahan') . '?alert=success&msg=Selamat anda berhasil menghapus barang dari pengujian');
        } else {
            header('location:' . base_url('lab/pemeriksaan_bahan') . '?alert=danger&msg=Maaf anda gagal menghapus barang dari pengujian');
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
}
