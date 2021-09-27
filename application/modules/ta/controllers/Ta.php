<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Ta extends MX_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Ta_model', 'ta');
	}

	public function index()
	{

		$data = array(
			// 'role' => $this->db->get('role')->result(),
			'data' => $this->ta->getall(),
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
			'tahunakademik' => $this->input->post('ta'),
		);
		$cek = $this->db->get_where('tahunakademik', ['tahunakademik' => $this->input->post('ta')])->row();
		if (!$cek) {
			$this->ta->insert($data);
			$this->session->set_flashdata('berhasil', 'Data Berhasil Ditambah!');
			redirect('ta');
		} else {
			$this->session->set_flashdata('gagal', 'Data Gagal Ditambah!');
			redirect('ta');
		}
	}
	public function ubah()
	{
		$id = $_POST['id'];
		echo json_encode($this->ta->getid($id));
	}
	public function simpanubah()
	{
		$data = array(
			'tahunakademik' => $this->input->post('ta'),
		);

		$this->ta->update($this->input->post('id'), $data);
		$this->session->set_flashdata('berhasil', 'Data Berhasil Diubah!');
		redirect('ta');
	}
	public function hapus($id)
	{
		$this->ta->delete($id);
		$this->session->set_flashdata('berhasil', 'Data Berhasil DiHapus!');
		redirect('ta');
	}
}
