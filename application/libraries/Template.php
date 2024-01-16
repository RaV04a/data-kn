<?php

#[\AllowDynamicProperties]

class Template
{

    var $template_data = array();

    function set($name, $value)
    {
        $this->template_data[$name] = $value;
    }

    function load($template = '', $view = '', $view_data = array(), $return = FALSE)
    {

        $this->CI = &get_instance();
        $this->CI->load->model('M_lab/M_pemeriksaan_bahan');
        $this->CI->load->model('M_gudang_bahanbaku/M_barang_masuk');
        $this->CI->load->model('M_gudang_bahanbaku/M_permintaan_barang_gudang');
        $view_data['cek_karantina'] = $this->CI->M_pemeriksaan_bahan->cek_karantina()->result_array()[0]['tot_status_karantina'];
        $view_data['cek_proses'] = $this->CI->M_pemeriksaan_bahan->cek_proses()->result_array()[0]['tot_status_proses'];
        $view_data['cek_permintaan'] = $this->CI->M_permintaan_barang_gudang->cek_permintaan()->result_array()[0]['tot_status_proses'];
        $view_data['jml_notif'] = (int)$view_data['cek_karantina'] + (int)$view_data['cek_proses'];
        $this->set('contents', $this->CI->load->view($view, $view_data, TRUE));
        return $this->CI->load->view($template, $this->template_data, $return);
    }
}
