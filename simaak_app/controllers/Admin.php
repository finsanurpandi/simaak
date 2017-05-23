<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('m_login');
	}

	function set_view($url, $data)
	{
		$this->check_pembayaran();
		$data['pembayaran'] = $this->pembayaran;

		$session = $this->session->userdata('login_in');

		if ($session == TRUE  && $this->session->role == 1) {
			$this->load->view('header', $data);
			$this->load->view('sidenav', $data);
			$this->load->view($url, $data);
			$this->load->view('mahasiswa/modal', $data);
			$this->load->view('footer');
		} else {
			redirect('login', 'refresh');
		}
	}

	function index()
	{
		$user_akun = $this->m_login->ambil_user($this->session->userdata('username'));
		
		$session = $this->session->userdata('login_in');

		$data['user'] = $user_akun;

		if ($session == TRUE) {
			$this->load->view('admin/success', $data);
		} else {
			redirect('login', 'refresh');
		}
	}


}