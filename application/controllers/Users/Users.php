<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        // check_not_login();
        $this->load->model('M_users/M_users');
        $this->load->model('M_auth');
    }

    public function index()
    {
        // $data['row'] = $this->customer_m->get();
        $result =
            $data['result'] = $this->M_users->get()->result_array();
        $this->template->load('template', 'content/users/users_data', $data);
    }

    public function add()
    {
        $data['username'] = $this->input->post('username', TRUE);
        $data['password'] = md5($this->input->post('password', TRUE));
        $data['nama_operator'] = $this->input->post('nama_operator', TRUE);
        $data['level'] = $this->input->post('level', TRUE);
        $data['jabatan'] = $this->input->post('jabatan', TRUE);
        $data['alamat'] = $this->input->post('alamat', TRUE);
        $respon = $this->M_users->add($data);

        if ($respon) {
            header('location:' . base_url('users/users') . '?alert=success&msg=Selamat anda berhasil menambah user');
        } else {
            header('location:' . base_url('users/users') . '?alert=success&msg=Maaf anda gagal menambah user');
        }
    }
    public function update()
    {
        $data['id_user'] = $this->input->post('id_user', TRUE);
        $data['username'] = $this->input->post('username', TRUE);
        $data['password'] = md5($this->input->post('password', TRUE));
        $data['nama_operator'] = $this->input->post('nama_operator', TRUE);
        $data['level'] = $this->input->post('level', TRUE);
        $data['jabatan'] = $this->input->post('jabatan', TRUE);
        $data['alamat'] = $this->input->post('alamat', TRUE);
        $respon = $this->M_users->update($data);
        // echo $respon;
        if ($respon) {
            header('location:' . base_url('users/users') . '?alert=success&msg=Selamat anda berhasil meng-update user');
        } else {
            header('location:' . base_url('users/users') . '?alert=success&msg=Maaf anda gagal meng-update user');
        }
    }
    public function delete($id_user)
    {
        $data['id_user'] = $id_user;
        $respon = $this->M_users->delete($data);

        if ($respon) {
            header('location:' . base_url('users/users') . '?alert=success&msg=Selamat anda berhasil menghapus user');
        } else {
            header('location:' . base_url('users/users') . '?alert=success&msg=Maaf anda gagal menghapus user');
        }
    }
    public function update_sendiri()
    {
        $data['id_user'] = $this->input->post('id_user', TRUE);
        $data['username'] = $this->input->post('username', TRUE);
        $data['nama_operator'] = $this->input->post('nama_operator', TRUE);
        $data['level'] = $this->input->post('level', TRUE);
        $data['jabatan'] = $this->input->post('jabatan', TRUE);
        $data['alamat'] = $this->input->post('alamat', TRUE);
        $respon = $this->M_users->update($data);
        // echo $respon;
        if ($respon) {
            $newdata = array(
                'id_user'  => $data['id_user'],
                'username'  => $data['username'],
                'nama_operator'     => $data['nama_operator'],
                'alamat'     => $data['alamat'],
                'level'     => $data['level'],
                'jabatan'     => $data['jabatan'],
                'logged_in' => TRUE
            );
            $this->session->set_userdata($newdata);
            header('location:' . base_url('users/users') . '?alert=success&msg=Selamat anda berhasil meng-update profil');
        } else {
            header('location:' . base_url('users/users') . '?alert=success&msg=Maaf anda gagal meng-update profil');
        }
    }
    public function ganti_password()
    {
        $data['id_user'] = $this->input->post('id_user', TRUE);
        $data['username'] = $this->input->post('username', TRUE);
        $data['password'] = md5($this->input->post('password', TRUE));
        $data['password_baru'] = $this->input->post('password_baru', TRUE);
        $data['ulang_password_baru'] = $this->input->post('ulang_password_baru', TRUE);


        if ($data['password_baru'] != $data['ulang_password_baru']) {
            header('location:' . base_url() . '?alert=warning&msg=Password Tidak Cocok');
        } else {
            $row = $this->M_auth->check($data)->row_array();
            if ($row['c'] > 0) {
                $d = $this->M_users->ganti_password($data);
                if ($d) {
                    header('location:' . base_url('users/users') . '?alert=success&msg=Selamat anda berhasil update password');
                } else {
                    header('location:' . base_url('users/users') . '?alert=danger&msg=Selamat anda gagal update password');
                }
            } else {
                header('location:' . base_url() . '?alert=warning&msg=Password lama salah');
            }
        }

        // 

    }
}
