<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Water_treatment extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        // check_not_login();
        $this->load->model('M_utility/M_water_treatment');
    }

    public function index()
    {
        $tgl = $this->input->get('date_from');
        $tgl2 = $this->input->get('date_until');
        $name = $this->input->get('name');

        $data['result'] = $this->M_water_treatment->get($tgl, $tgl2, $name);
        $data['tgl'] = $tgl;
        $data['tgl2'] = $tgl2;
        $data['name'] = $name;
        $this->template->load('template', 'content/utility/water_treatment/Water_treatment_data', $data);
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
        $respon = $this->M_water_treatment->add($data);

        if ($respon) {
            header('location:' . base_url('Utility/Water_treatment') . '?alert=success&msg=Selamat anda berhasil menambah History Mesin WATER TREATMENT');
        } else {
            header('location:' . base_url('Utility/Water_treatment') . '?alert=error&msg=Maaf anda gagal menambah History Mesin WATER TREATMENT');
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
        $respon = $this->M_water_treatment->update($data);
        // echo $respon;
        if ($respon) {
            header('location:' . base_url('Utility/Water_treatment') . '?alert=success&msg=Selamat anda berhasil meng-update History Mesin WATER TREATMENT');
        } else {
            header('location:' . base_url('Utility/Water_treatment') . '?alert=error&msg=Maaf anda gagal meng-update History Mesin WATER TREATMENT');
        }
    }
    public function delete($id_hmu)
    {
        $data['id_hmu'] = $id_hmu;
        $respon = $this->M_water_treatment->delete($data);

        if ($respon) {
            header('location:' . base_url('Utility/Water_treatment') . '?alert=success&msg=Selamat anda berhasil menghapus History Mesin WATER TREATMENT');
        } else {
            header('location:' . base_url('Utility/Water_treatment') . '?alert=error&msg=Maaf anda gagal menghapus History Mesin WATER TREATMENT');
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

        $data['detail'] = $this->M_water_treatment->get($tgl, $tgl2, $name);
        $data['tgl'] = $tgl;
        $data['tgl2'] = $tgl2;
        $data['name'] = $name;

        $d = $this->load->view('laporan/utility/water_treatment/page_print', $data, TRUE);
        $mpdf->AddPage("L", "", "", "", "", "15", "15", "5", "15", "", "", "", "", "", "", "", "", "", "", "", "A4");
        $mpdf->WriteHTML($d);
        $mpdf->Output();
    }
}
