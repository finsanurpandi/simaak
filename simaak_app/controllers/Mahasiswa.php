<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('m_mahasiswa');
		$this->load->library('upload');
	}

	function index()
	{
		$user_akun = $this->m_mahasiswa->getMahasiswa($this->session->userdata('username'));
		// $user_alamat = $this->m_mahasiswa->getAlamatMahasiswa($this->session->userdata('username'));
		$user_profil = $this->m_mahasiswa->getDataUser('mhs_profil', array('nim' => $this->session->username));
		$user_ortu = $this->m_mahasiswa->getDataUser('mhs_orangtua', array('nim' => $this->session->username));
		$user_upload = $this->m_mahasiswa->getDataUser('mhs_upload', array('nim' => $this->session->username));
		$session = $this->session->userdata('login_in');


		$data['user'] = $user_akun;
		// $data['alamat'] = $user_alamat;
		$data['profil'] = $user_profil;
		$data['ortu'] = $user_ortu;
		$data['upload'] = $user_upload;

		$data['role'] = $this->session->role;

		if (!empty($user_profil)) {
			$this->session->set_userdata('mhs_profil', TRUE);
		} else {
			$this->session->set_userdata('mhs_profil', FALSE);
		}

		if (!empty($user_ortu)) {
			$this->session->set_userdata('mhs_ortu', TRUE);
		} else {
			$this->session->set_userdata('mhs_ortu', FALSE);
		}

		if (($user_upload['pas_photo'] == null) || ($user_upload['ijazah'] == null)) {
			$this->session->set_userdata('mhs_upload', FALSE);
		} else {
			$this->session->set_userdata('mhs_upload', TRUE);
		}


		if ($session == TRUE) {
			$this->load->view('header', $data);
			$this->load->view('sidenav', $data);
			$this->load->view('mahasiswa/home', $data);
			$this->load->view('footer');
		} else {
			redirect('login', 'refresh');
		}	
	}

// MENU PROFIL ----------------------------------
	function profil()
	{
		$user_akun = $this->m_mahasiswa->getMahasiswa($this->session->userdata('username'));
		// $user_alamat = $this->m_mahasiswa->getAlamatMahasiswa($this->session->userdata('username'));
		$user_profil = $this->m_mahasiswa->getDataUser('mhs_profil', array('nim' => $this->session->username));
		$user_ortu = $this->m_mahasiswa->getDataUser('mhs_orangtua', array('nim' => $this->session->username));
		$user_upload = $this->m_mahasiswa->getDataUser('mhs_upload', array('nim' => $this->session->username));
		
		$session = $this->session->userdata('login_in');

		$data['error'] = $this->upload->display_errors();

		$data['user'] = $user_akun;
		// $data['alamat'] = $user_alamat;
		$data['profil'] = $user_profil;
		$data['ortu'] = $user_ortu;
		$data['upload'] = $user_upload;

		$data['role'] = $this->session->role;

		if (!empty($user_profil)) {
			$this->session->set_userdata('mhs_profil', TRUE);
		} else {
			$this->session->set_userdata('mhs_profil', FALSE);
		}

		if (!empty($user_ortu)) {
			$this->session->set_userdata('mhs_ortu', TRUE);
		} else {
			$this->session->set_userdata('mhs_ortu', FALSE);
		}

		if (($user_upload['pas_photo'] == null) || ($user_upload['ijazah'] == null)) {
			$this->session->set_userdata('mhs_upload', FALSE);
		} else {
			$this->session->set_userdata('mhs_upload', TRUE);
		}


		// UPDATE DATA ALAMAT MAHASISWA
		$submit_profil = $this->input->post('submit_profil');

		if (isset($submit_profil)) {
			$data = array(
				'nim' => $this->session->username,
				'nik' => $this->input->post('nik'),
				'alamat_lengkap' => $this->input->post('alamat_lengkap'),
				'golongan_darah' => $this->input->post('golongan_darah'),
				'no_tlp' => $this->input->post('no_tlp'),
				'email' => $this->input->post('email'),
				'asal_sekolah' => $this->input->post('asal_sekolah'),
				'nomor_induk' => $this->input->post('nomor_induk')
				);

			$this->m_mahasiswa->insertData('mhs_profil', $data);
			$this->session->set_flashdata('success', true);
			redirect($this->uri->uri_string());

		}

		if ($session == TRUE) {
			$this->load->view('header', $data);
			$this->load->view('sidenav', $data);
			$this->load->view('mahasiswa/profil', $data);
			$this->load->view('mahasiswa/modal', $data);
			$this->load->view('footer');
		} else {
			redirect('login', 'refresh');
		}
	}

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
			$this->m_mahasiswa->updateProfileImage($data, $username);

			@unlink("./assets/img/profiles/". $img_path);
			redirect('mahasiswa/profil', 'refresh');
		}
 
			
	}

	function ubahPassword()
	{	
		$username = $this->session->username;
		$newPass = md5($this->input->post('new_pass'));
		$data = array('password' => $newPass);

		$this->m_mahasiswa->updatePassword($data, $username);
		redirect('login/logout', 'refresh');
	}

// MENU STUDI ----------------------------------
function studi()
	{
		$user_akun = $this->m_mahasiswa->getMahasiswa($this->session->userdata('username'));
		$user_alamat = $this->m_mahasiswa->getAlamatMahasiswa($this->session->userdata('username'));
		$session = $this->session->userdata('login_in');

		$data['user'] = $user_akun;
		$data['alamat'] = $user_alamat;

		$data['role'] = $this->session->role;

		if ($session == TRUE) {
			$this->load->view('header', $data);
			$this->load->view('sidenav', $data);
			$this->load->view('mahasiswa/studi', $data);
			$this->load->view('footer');
		} else {
			redirect('login', 'refresh');
		}	
	}


// MENU PERWALIAN ----------------------------------
function perwalian()
	{
		$user_akun = $this->m_mahasiswa->getMahasiswa($this->session->userdata('username'));
		$user_alamat = $this->m_mahasiswa->getAlamatMahasiswa($this->session->userdata('username'));
		$session = $this->session->userdata('login_in');

		$data['user'] = $user_akun;
		$data['alamat'] = $user_alamat;

		$data['role'] = $this->session->role;

		if ($session == TRUE) {
			$this->load->view('header', $data);
			$this->load->view('sidenav', $data);
			$this->load->view('mahasiswa/perwalian', $data);
			$this->load->view('footer');
		} else {
			redirect('login', 'refresh');
		}	
	}

// MENU JADWAL KULIAH ----------------------------------
function perkuliahan()
	{
		$user_akun = $this->m_mahasiswa->getMahasiswa($this->session->userdata('username'));
		$user_alamat = $this->m_mahasiswa->getAlamatMahasiswa($this->session->userdata('username'));
		$session = $this->session->userdata('login_in');

		$data['user'] = $user_akun;
		$data['alamat'] = $user_alamat;

		$data['role'] = $this->session->role;

		if ($session == TRUE) {
			$this->load->view('header', $data);
			$this->load->view('sidenav', $data);
			$this->load->view('mahasiswa/jadwal', $data);
			$this->load->view('footer');
		} else {
			redirect('login', 'refresh');
		}	
	}

}