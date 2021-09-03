<?php
defined('BASEPATH') or exit('No direct script access allowed');
class User_model extends CI_Model
{
    public $tabel = 'user';
    public $id  = 'iduser';
    public function insert($data)
    {
        $username = htmlspecialchars($this->input->post('username'));
        $cek = $this->db->get_where('user', ['username' => $username])->row();
        if (!$cek) {
            $this->db->insert($this->tabel, $data);
        } else {
            echo "username sudah ada";
        }
    }
}
