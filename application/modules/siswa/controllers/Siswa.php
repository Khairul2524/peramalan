<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class siswa extends MX_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Siswa_model', 'siswa');
	}

	public function index()
	{

		$data = array(
			'data' => $this->siswa->get(),
			'tahunakademik' => $this->db->get('tahunakademik')->result()
		);
		// var_dump($data['role']);
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
			'idta' => $this->input->post('idta'),
			'jumlah'     => $this->input->post('jumlah'),
		);
		// print_r($data);
		// die;
		$cek = $this->db->get_where('jumlahsiswa', ['idta' => htmlspecialchars($this->input->post('idta'))])->row();
		// var_dump($cek);
		if (!$cek) {
			$this->siswa->insert($data);
			$this->session->set_flashdata('berhasil', 'Siswa Berhasil Ditambah!');
			redirect('siswa');
		} else {
			$this->session->set_flashdata('gagal', 'Siswa Gagal Ditambah!');
			redirect('siswa');
		}
	}
	public function getubah()
	{
		$id = $_POST['id'];
		echo json_encode($this->siswa->getid($id));
	}
	public function ubah()
	{
		$data = array(
			'ids' => htmlspecialchars($this->input->post('id')),
			'idta' => $this->input->post('idta'),
			'jumlah'     => $this->input->post('jumlah'),

		);
		// print_r($data);
		// die;
		$cek = $this->db->get_where('jumlahsiswa', $data)->row();
		// var_dump($cek);
		if (!$cek) {
			$this->siswa->update(htmlspecialchars($this->input->post('id')), $data);
			$this->session->set_flashdata('berhasil', 'Data Berhasil Diubah!');
			redirect('siswa');
		} else {
			$this->session->set_flashdata('gagal', 'Data Gagal Diubah!');
			redirect('siswa');
		}
	}
	public function hapus($id)
	{
		// var_dump($id);
		// die;
		$this->siswa->delete($id);
		$this->session->set_flashdata('berhasil', 'Siswa Berhasil Dihapus!');
		redirect('siswa');
	}
}
