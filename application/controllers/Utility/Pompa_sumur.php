<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pompa_sumur extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        // check_not_login();
        $this->load->model('M_utility/M_pompa_sumur');
    }

    public function index()
    {
        $tgl = $this->input->get('date_from');
        $tgl2 = $this->input->get('date_until');
        $name = $this->input->get('name');

        $data['result'] = $this->M_pompa_sumur->get($tgl, $tgl2, $name);
        $data['tgl'] = $tgl;
        $data['tgl2'] = $tgl2;
        $data['name'] = $name;
        $this->template->load('template', 'content/utility/pompa_sumur/pompa_sumur_data', $data);
    }

    public function add()
    {
        $data['tgl'] = $this->convertDate($this->input->post('tgl', TRUE));
        $data['nama_mesin'] = $this->input->post('nama_mesin', TRUE);
        $data['jenis_mesin'] = $this->input->post('jenis_mesin', TRUE);
        $data['masalah'] = $this->input->post('masalah', TRUE);
        $data['penyebab'] = $this->input->post('penyebab', TRUE);
        $data['tindakan'] = $this->input->post('tindakan', TRUE);
        $data['nama_operator'] = $this->input->post('nama_operator', TRUE);
        $respon = $this->M_pompa_sumur->add($data);

        if ($respon) {
            header('location:' . base_url('Utility/Pompa_sumur') . '?alert=success&msg=Selamat anda berhasil menambah History Mesin POMPA SUMUR');
        } else {
            header('location:' . base_url('Utility/Pompa_sumur') . '?alert=error&msg=Maaf anda gagal menambah History Mesin POMPA SUMUR');
        }
    }
    public function update()
    {
        $data['id_hmu'] = $this->input->post('id_hmu', TRUE);
        $data['tgl'] = $this->convertDate($this->input->post('tgl', TRUE));
        $data['nama_mesin'] = $this->input->post('nama_mesin', TRUE);
        $data['jenis_mesin'] = $this->input->post('jenis_mesin', TRUE);
        $data['masalah'] = $this->input->post('masalah', TRUE);
        $data['penyebab'] = $this->input->post('penyebab', TRUE);
        $data['tindakan'] = $this->input->post('tindakan', TRUE);
        $data['operator'] = $this->input->post('nama_operator', TRUE);
        $respon = $this->M_pompa_sumur->update($data);
        if ($respon) {
            header('location:' . base_url('Utility/Pompa_sumur') . '?alert=success&msg=Selamat anda berhasil meng-update History Mesin POMPA SUMUR');
        } else {
            header('location:' . base_url('Utility/Pompa_sumur') . '?alert=error&msg=Maaf anda gagal meng-update History Mesin POMPA SUMUR');
        }
    }
    public function delete($id_hmu)
    {
        $data['id_hmu'] = $id_hmu;
        $respon = $this->M_pompa_sumur->delete($data);

        if ($respon) {
            header('location:' . base_url('Utility/Pompa_sumur') . '?alert=success&msg=Selamat anda berhasil menghapus History Mesin POMPA SUMUR');
        } else {
            header('location:' . base_url('Utility/Pompa_sumur') . '?alert=error&msg=Maaf anda gagal menghapus History Mesin POMPA SUMUR');
        }
    }
    private function convertDate($date)
    {
        return explode('/', $date)[2] . "-" . explode('/', $date)[1] . "-" . explode('/', $date)[0];
    }

    public function pdf_page_print()
    {
        $mpdf = new \Mpdf\Mpdf();

        $tgl = $this->input->get('date_from');
        $tgl2 = $this->input->get('date_until');
        $name = $this->input->get('name');

        $data['detail'] = $this->M_pompa_sumur->get($tgl, $tgl2, $name);
        $data['tgl'] = $tgl;
        $data['tgl2'] = $tgl2;
        $data['name'] = $name;

        $d = $this->load->view('laporan/utility/pompa_sumur/page_print', $data, TRUE);
        $mpdf->AddPage("L", "", "", "", "", "15", "15", "5", "15", "", "", "", "", "", "", "", "", "", "", "", "A4");
        $mpdf->WriteHTML($d);
        $mpdf->Output();
    }
}
