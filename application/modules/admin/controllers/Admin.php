<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends MX_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model', 'user');
	}

	public function index()
	{

		$data = array(
			'role' => $this->db->get('role')->result(),
		);
		// var_dump($data['username']);
		// die();
		$this->load->view('template/header');
		$this->load->view('template/navbar', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('index', $data);
		$this->load->view('template/footer');
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
