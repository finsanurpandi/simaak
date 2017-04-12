<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('m_dosen');
		$this->load->library('upload');
	}

// CONFIGURATION --------------------------------
// UPLOAD IMAGE  --------------------------------

	function configImage()
	{
		$user = $this->session->username;
		$nmfile = "img_".$user."_".time();
		$config['upload_path']   =   "./assets/img/profiles/";
		$config['allowed_types'] =   "gif|jpg|jpeg|png"; 
		$config['max_size']      =   "1000";
		$config['max_width']     =   "1907";
		$config['max_height']    =   "1280";
		$config['file_name']     =   $nmfile;
 
		$this->upload->initialize($config);
	}

// CONFIG PAGINATION ------------------------------------

	function configPagination($total, $limit, $url)
	{
		$config['base_url'] = base_url($url);
		$config['total_rows'] = $total;
		$config['per_page'] = $limit;
		$config['uri_segment'] = 3;
		$choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);

		//config for bootstrap pagination class integration
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

		$this->pagination->initialize($config);	

	}

	function index()
	{
		$user_akun = $this->m_dosen->getDosen($this->session->userdata('username'));
		// $user_alamat = $this->m_dosen->getAlamatDosen($this->session->userdata('username'));
		$session = $this->session->userdata('login_in');

		$data['user'] = $user_akun;
		// $data['alamat'] = $user_alamat;

		$data['role'] = $this->session->role;

		if ($session == TRUE) {
			$this->load->view('header', $data);
			$this->load->view('sidenav', $data);
			$this->load->view('dosen/home', $data);
			$this->load->view('footer');
		} else {
			redirect('login', 'refresh');
		}	
	}

// MENU PROFIL ----------------------------------
	function profil()
	{
		$user_akun = $this->m_dosen->getDosen($this->session->userdata('username'));
		// $user_alamat = $this->m_dosen->getAlamatDosen($this->session->userdata('username'));
		$session = $this->session->userdata('login_in');

		$data['error'] = $this->upload->display_errors();

		$data['user'] = $user_akun;
		// $data['alamat'] = $user_alamat;

		$data['role'] = $this->session->role;

		if ($session == TRUE) {
			$this->load->view('header', $data);
			$this->load->view('sidenav', $data);
			$this->load->view('dosen/profil', $data);
			$this->load->view('dosen/modal', $data);
			$this->load->view('footer');
		} else {
			redirect('login', 'refresh');
		}
	}


	function editPicture()
	{
		$username = $this->session->username;
		$img_path = $this->input->post('path');

		$this->configImage();


		if (!$this->upload->do_upload('gambar')) {
			$this->profil();
		} else {

			$fileinfo = $this->upload->data();

			$data = array ('image' => $fileinfo['file_name']);
			$this->m_dosen->updateProfileImage($data, $username);

			unlink("./assets/img/profiles/". $img_path);
			redirect('dosen/profil', 'refresh');
		}
 
			
	}

	function ubahPassword()
	{	
		$username = $this->session->username;
		$newPass = md5($this->input->post('new_pass'));
		$data = array('password' => $newPass);

		$this->m_dosen->updatePassword($data, $username);
		redirect('login/logout', 'refresh');
	}


// MENU MAHASISWA ----------------------------------

	function mahasiswa()
	{
		$nidn = $this->session->userdata('username');

		//pagination
		$total = $this->m_dosen->getDataMahasiswa('mhs', array('nidn' => $nidn))->num_rows();
		$limit = 20;
		$url = 'dosen/mahasiswa';
		$config = $this->configPagination($total, $limit, $url);
		//-------

		$data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;		

		$user_akun = $this->m_dosen->getDosen($nidn);
		$session = $this->session->userdata('login_in');

		//SEARCH 
		$search = $this->input->post('search');

		if (isset($search)) {
			if ($this->input->post('search_key') == null) {
				$mhs = $this->m_dosen->getDataMahasiswa('mhs', array('nidn' => $nidn))->result_array();	
				$data['link'] = $this->pagination->create_links();
			} else {
				$mhs = $this->m_dosen->searchData('mhs', array('nidn' => $nidn), $this->input->post('search_key'), $this->input->post('search_category'));
				$data['link'] = null;
			}
		} else {
			$mhs = $this->m_dosen->getDataMahasiswa('mhs', array('nidn' => $nidn), $limit, $data['page'])->result_array();	
			$data['link'] = $this->pagination->create_links();
		}
		
		//$dosen = $this->m_dosen->getAllData('dosen')->result_array();

		$data['user'] = $user_akun;
		$data['mhs'] = $mhs;
		//$data['dosen'] = $dosen;
		$data['role'] = $this->session->role;
		// $data['link'] = $this->pagination->create_links();

		if ($session == TRUE) {
			$this->load->view('header', $data);
			$this->load->view('sidenav', $data);
			$this->load->view('dosen/mahasiswa', $data);
			$this->load->view('dosen/modal', $data);
			$this->load->view('footer');
		} else {
			redirect('login', 'refresh');
		}
	}

	function detailmahasiswa($nim)
	{
		$user_akun = $this->m_dosen->getDosen($this->session->userdata('username'));
		$session = $this->session->userdata('login_in');

		$key_nim = $this->encrypt->decode($nim);
		$mhs = $this->m_dosen->getDataUser('mhs', array('nim' => $key_nim));
		$alamat = $this->m_dosen->getDataUser('mhs_alamat', array('nim' => $key_nim));

		$data['user'] = $user_akun;
		$data['mhs'] = $mhs;
		$data['alamat'] = $alamat;
		$data['role'] = $this->session->role;
		
		if ($session == TRUE) {
			$this->load->view('header', $data);
			$this->load->view('sidenav', $data);
			$this->load->view('dosen/detailmahasiswa', $data);
			$this->load->view('footer');
		} else {
			redirect('login', 'refresh');
		}
	}


// MENU STUDI ----------------------------------
// function studi()
// 	{
// 		$user_akun = $this->m_mahasiswa->getMahasiswa($this->session->userdata('username'));
// 		$user_alamat = $this->m_mahasiswa->getAlamatMahasiswa($this->session->userdata('username'));
// 		$session = $this->session->userdata('login_in');

// 		$data['user'] = $user_akun;
// 		$data['alamat'] = $user_alamat;

// 		$data['role'] = $this->session->role;

// 		if ($session == TRUE) {
// 			$this->load->view('header', $data);
// 			$this->load->view('sidenav', $data);
// 			$this->load->view('mahasiswa/studi', $data);
// 			$this->load->view('footer');
// 		} else {
// 			redirect('login', 'refresh');
// 		}	
// 	}




}