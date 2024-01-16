<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        // check_not_login();
        $this->load->model('M_auth');
    }

    public function signin()
    {
        $this->load->view('auth/signin.php');
    }
    public function psignin()
    {
        $data['username'] = $this->input->post('username', TRUE);
        $data['password'] = md5($this->input->post('password', TRUE));
        $row = $this->M_auth->check($data)->row_array();

        // echo count($row);
        if ($row['c'] > 0) {
            $d = $this->M_auth->data($data)->row_array();
            $newdata = array(
                'id_user'  => $d['id_user'],
                'username'  => $d['username'],
                'nama_operator'     => $d['nama_operator'],
                'alamat'     => $d['alamat'],
                'level'     => $d['level'],
                'jabatan'     => $d['jabatan'],
                'logged_in' => TRUE
            );
            $this->session->set_userdata($newdata);
            // echo $this->session->userdata('username');
            header('location:' . base_url() . '?alert=success&msg=Selamat anda berhasil masuk');
        } else {
            header('location:' . base_url('auth/signin') . '?alert=info&msg=Maaf user tidak ada');
        }
        // 

    }
    public function signout()
    {
        $this->session->unset_userdata('id_user');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('nama_operator');
        $this->session->unset_userdata('alamat');
        $this->session->unset_userdata('level');
        $this->session->unset_userdata('jabatan');
        $this->session->unset_userdata('logged_in');
        header('location:' . base_url('auth/signin') . '?alert=success&msg=Selamat anda berhasil keluar');
    }
}
