<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Perhitungan extends MX_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Perhitungan_model', 'hitung');
	}

	public function index()
	{

		$data = array(
			'a' => $this->hitung->geta(),
			'siswa' => $this->hitung->getsiswa(),
		);
		// var_dump($data['username']);
		// die();
		$this->load->view('template/header');
		$this->load->view('template/navbar');
		$this->load->view('template/sidebar');
		$this->load->view('index', $data);
		$this->load->view('template/footer');
	}
	public function hasil()
	{

		$data = array(
			'a' => $this->hitung->geta(),
			'e' => $this->hitung->geta(),
			'siswa' => $this->hitung->getsiswa(),
		);
		// var_dump($data['username']);
		// die();
		$this->load->view('template/header');
		$this->load->view('template/navbar');
		$this->load->view('template/sidebar');
		$this->load->view('hasil', $data);
		$this->load->view('template/footer');
	}
}
