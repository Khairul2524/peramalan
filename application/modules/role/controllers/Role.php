<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Role extends MX_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Role_model', 'role');
	}

	public function index()
	{

		$data = array(
			'data' => $this->role->get()
		);
		// var_dump($data['data']);
		// die();
		$this->load->view('template/header');
		$this->load->view('template/navbar', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('index', $data);
		$this->load->view('template/footer');
	}

	public function tambah()
	{
		$data = array(
			'role' => htmlspecialchars($this->input->post('role')),
		);
		// print_r($data);
		// die;
		$cek = $this->db->get_where('role', ['role' => htmlspecialchars($this->input->post('role'))])->row();
		// var_dump($cek);
		if (!$cek) {
			$this->role->insert($data);
			$this->session->set_flashdata('berhasil', 'Role Berhasil Ditambah!');
			redirect('role');
		} else {
			$this->session->set_flashdata('gagal', 'Role Gagal Ditambah!');
			redirect('role');
		}
	}
	public function getubah()
	{
		$id = $_POST['id'];
		echo json_encode($this->role->getid($id));
	}
	public function ubah()
	{
		$data = array(
			'idrole' => htmlspecialchars($this->input->post('id')),
			'role' => htmlspecialchars($this->input->post('role')),
		);
		$cek = $this->db->get_where('role', ['role' => htmlspecialchars($this->input->post('role'))])->row();
		// var_dump($cek);
		if (!$cek) {
			$this->role->update(htmlspecialchars($this->input->post('id')), $data);
			$this->session->set_flashdata('berhasil', 'Role Berhasil Diubah!');
			redirect('role');
		} else {
			$this->session->set_flashdata('gagal', 'Role Gagal Diubah!');
			redirect('role');
		}
	}
	public function hapus($id)
	{
		// var_dump($id);
		// die;
		$this->dusun->delete($id);
		$this->session->set_flashdata('berhasil', 'Role Berhasil Dihapus!');
		redirect('role');
	}
}
