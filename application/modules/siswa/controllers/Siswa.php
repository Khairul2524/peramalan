<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Siswa extends MX_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Siswa_model', 'siswa');
	}

	public function index()
	{

		$data = array(
			// 'role' => $this->db->get('role')->result(),
			'data' => $this->siswa->getall(),
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
			'tahunpenerimaan' => $this->input->post('ta'),
			'jumlah'		=> $this->input->post('js')
		);
		$cek = $this->db->get_where('jumlahsiswa', ['tahunpenerimaan' => $this->input->post('ta')])->row();
		if (!$cek) {
			$this->siswa->insert($data);
			$this->session->set_flashdata('berhasil', 'Data Berhasil Ditambah!');
			redirect('siswa');
		} else {
			$this->session->set_flashdata('gagal', 'Data Gagal Ditambah!');
			redirect('siswa');
		}
	}
	public function ubah()
	{
		$id = $_POST['id'];
		echo json_encode($this->siswa->getid($id));
	}
	public function simpanubah()
	{
		$data = array(
			'tahunpenerimaan' => $this->input->post('ta'),
			'jumlah'		=> $this->input->post('js')
		);

		$this->siswa->update($this->input->post('id'), $data);
		$this->session->set_flashdata('berhasil', 'Data Berhasil Diubah!');
		redirect('siswa');
	}
	public function hapus($id)
	{
		$this->siswa->delete($id);
		$this->session->set_flashdata('berhasil', 'Data Berhasil DiHapus!');
		redirect('siswa');
	}
	public function register()
	{
		// $password = password_hash($this->input->post('password'));
		$data = array(
			'username' => htmlspecialchars($this->input->post('username')),
			'password' => htmlspecialchars(password_hash($this->input->post('password'), PASSWORD_DEFAULT)),
			'idstatus' => htmlspecialchars($this->input->post('status'))
		);
		// var_dump($data);
		$insert = $this->user->insert($data);
		redirect('daftar');
	}
}
