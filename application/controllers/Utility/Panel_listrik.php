<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Panel_listrik extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        // check_not_login();
        $this->load->model('M_utility/M_panel_listrik');
    }

    public function index()
    {
        $tgl = $this->input->get('date_from');
        $tgl2 = $this->input->get('date_until');
        $name = $this->input->get('name');

        $data['result'] = $this->M_panel_listrik->get($tgl, $tgl2, $name);
        $data['tgl'] = $tgl;
        $data['tgl2'] = $tgl2;
        $data['name'] = $name;
        $this->template->load('template', 'content/utility/panel_listrik/panel_listrik_data', $data);
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
        $respon = $this->M_panel_listrik->add($data);

        if ($respon) {
            header('location:' . base_url('Utility/Panel_listrik') . '?alert=success&msg=Selamat anda berhasil menambah History Mesin PANEL LISTRIK');
        } else {
            header('location:' . base_url('Utility/Panel_listrik') . '?alert=error&msg=Maaf anda gagal menambah History Mesin PANEL LISTRIK');
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
        $respon = $this->M_panel_listrik->update($data);
        if ($respon) {
            header('location:' . base_url('Utility/Panel_listrik') . '?alert=success&msg=Selamat anda berhasil meng-update History Mesin PANEL LISTRIK');
        } else {
            header('location:' . base_url('Utility/Panel_listrik') . '?alert=error&msg=Maaf anda gagal meng-update History Mesin PANEL LISTRIK');
        }
    }
    public function delete($id_hmu)
    {
        $data['id_hmu'] = $id_hmu;
        $respon = $this->M_panel_listrik->delete($data);

        if ($respon) {
            header('location:' . base_url('Utility/Panel_listrik') . '?alert=success&msg=Selamat anda berhasil menghapus History Mesin PANEL LISTRIK');
        } else {
            header('location:' . base_url('Utility/Panel_listrik') . '?alert=error&msg=Maaf anda gagal menghapus History Mesin PANEL LISTRIK');
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

        $data['detail'] = $this->M_panel_listrik->get($tgl, $tgl2, $name);
        $data['tgl'] = $tgl;
        $data['tgl2'] = $tgl2;

        $d = $this->load->view('laporan/utility/panel_listrik/page_print', $data, TRUE);
        $mpdf->AddPage("L", "", "", "", "", "15", "15", "5", "15", "", "", "", "", "", "", "", "", "", "", "", "A4");
        $mpdf->WriteHTML($d);
        $mpdf->Output();
    }
}
