<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Perhitungan_model extends CI_Model
{
    public $tabel = 'a';
    public $id  = 'ida';
    public function geta()
    {
        return $this->db->get($this->tabel)->result();
    }
    public function getsiswa()
    {
        return $this->db->get('jumlahsiswa')->result();
    }
}
