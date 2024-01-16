<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_kode_warna extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    function id_user()
    {
        return $this->session->userdata("id_user");
    }
    public function getcap($id = null)
    {
        $sql = "
        SELECT * FROM tb_kw_cap 
        WHERE is_deleted = 0 ORDER BY created_at ASC";

        return $this->db->query($sql);
    }

    public function getbody($id = null)
    {
        $sql = "
        SELECT * FROM tb_kw_body 
        WHERE is_deleted = 0 ORDER BY created_at ASC";

        return $this->db->query($sql);
    }

    public function add_cap($data)
    {
        $id_user = $this->id_user();
        $sql = "
        INSERT INTO `tb_kw_cap`(`id_kw_cap`, `kode_warna_cap`,`warna_cap`,`ti02`,`r1`,`r3`,`y5`,`b1`,`y10`,`sf`,`created_at`, `created_by`, `updated_at`, `updated_by`, `is_deleted`) 
        VALUES ('$data[id_kw_cap]','$data[kode_warna]','$data[warna]','$data[ti02]','$data[r1]','$data[r3]','$data[y5]','$data[b1]','$data[y10]','$data[sf]',NOW(),'$id_user','0000-00-00 00:00:00','','0')
        ";

        return $this->db->query($sql);
    }

    public function add_body($data)
    {
        $id_user = $this->id_user();
        $sql = "
        INSERT INTO `tb_kw_body`(`id_kw_body`, `kode_warna_body`,`warna_body`,`ti02`,`r1`,`r3`,`y5`,`b1`,`y10`,`sf`,`created_at`, `created_by`, `updated_at`, `updated_by`, `is_deleted`) 
        VALUES ('$data[id_kw_body]','$data[kode_warna]','$data[warna]','$data[ti02]','$data[r1]','$data[r3]','$data[y5]','$data[b1]','$data[y10]','$data[sf]',NOW(),'$id_user','0000-00-00 00:00:00','','0')
        ";

        return $this->db->query($sql);
    }

    public function update_cap($data)
    {
        $id_user = $this->id_user();
        $sql = "
            UPDATE `tb_kw_cap` 
            SET `kode_warna_cap`='$data[kode_warna]',
                `warna_cap`='$data[warna]',
                `ti02`='$data[ti02]',
                `r1`='$data[r1]',
                `r3`='$data[r3]',
                `y5`='$data[y5]',
                `b1`='$data[b1]',
                `y10`='$data[y10]',     
                `sf`='$data[sf]',
                `updated_at`= NOW(),`updated_by`='$id_user' 
            WHERE `id_kw_cap`='$data[id_kw_cap]'
        ";
        return $this->db->query($sql);
        // return $sql;
    }

    public function update_body($data)
    {
        $id_user = $this->id_user();
        $sql = "
            UPDATE `tb_kw_body` 
            SET `kode_warna_body`='$data[kode_warna]',
                `warna_body`='$data[warna]',
                `ti02`='$data[ti02]',
                `r1`='$data[r1]',
                `r3`='$data[r3]',
                `y5`='$data[y5]',
                `b1`='$data[b1]',
                `y10`='$data[y10]',     
                `sf`='$data[sf]',
                `updated_at`= NOW(),`updated_by`='$id_user' 
            WHERE `id_kw_body`='$data[id_kw_body]'
        ";
        return $this->db->query($sql);
        // return $sql;
    }


    public function delete_cap($data)
    {
        $id_user = $this->id_user();
        $sql = "
        DELETE FROM `tb_kw_cap`
         WHERE `id_kw_cap`='$data[id_kw_cap]'
        ";
        return $this->db->query($sql);
    }

    public function delete_body($data)
    {
        $id_user = $this->id_user();
        $sql = "
        DELETE FROM `tb_kw_body`
         WHERE `id_kw_body`='$data[id_kw_body]'
        ";
        return $this->db->query($sql);
    }

    public function findcap($kode_warna)
    {
        $sql = "SELECT * FROM tb_kw_cap WHERE kode_warna = '$kode_warna'";
        return $this->db->query($sql);
    }

    public function findbody($kode_warna)
    {
        $sql = "SELECT * FROM tb_kw_body WHERE kode_warna = '$kode_warna'";
        return $this->db->query($sql);
    }
}
