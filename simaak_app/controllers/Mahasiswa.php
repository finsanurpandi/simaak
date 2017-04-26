<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('m_mahasiswa');
		$this->load->library('upload');
	}

	function configImage()
	{
		$user = $this->session->username;
		$nmfile = "img_".$user."_".time();
		$config['upload_path']   =   "./assets/uploads/profiles/";
		$config['allowed_types'] =   "gif|jpg|jpeg|png"; 
		$config['max_size']      =   "1000";
		$config['max_width']     =   "1907";
		$config['max_height']    =   "1280";
		$config['file_name']     =   $nmfile;
 
		$this->upload->initialize($config);
	}

	function configDokumen()
	{
		$user = $this->session->username;
		$nmfile = $user."_".time();
		$config['upload_path']   =   "./assets/uploads/documents/mahasiswa";
		$config['allowed_types'] =   "gif|jpg|jpeg|png|pdf"; 
		$config['max_size']      =   "1000";
		$config['file_name']     =   $nmfile;
 
		$this->upload->initialize($config);
	}

	function index()
	{
		$user_akun = $this->m_mahasiswa->getMahasiswa($this->session->userdata('username'));
		// $user_alamat = $this->m_mahasiswa->getAlamatMahasiswa($this->session->userdata('username'));
		$user_profil = $this->m_mahasiswa->getDataUser('mhs_profil', array('nim' => $this->session->username));
		$user_ortu = $this->m_mahasiswa->getDataUser('mhs_orangtua', array('nim' => $this->session->username));
		$user_upload = $this->m_mahasiswa->getDataUser('mhs_upload', array('nim' => $this->session->username));
		$pengumuman = $this->m_mahasiswa->getAllDataOrder('pengumuman', array('role' => $this->session->role, 'status' => 1), array('created', 'DESC'));
		$session = $this->session->userdata('login_in');
		$this->session->set_userdata('kelas', $user_akun['kelas']);


		$data['user'] = $user_akun;
		// $data['alamat'] = $user_alamat;
		$data['profil'] = $user_profil;
		$data['ortu'] = $user_ortu;
		$data['upload'] = $user_upload;

		$data['role'] = $this->session->role;
		$data['pengumuman'] = $pengumuman;

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


		// INSERT DATA PROFIL MAHASISWA
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
			$this->session->set_flashdata('profil_success', true);
			redirect($this->uri->uri_string());

		}

		// UPDATE DATA PROFIL MAHASISWA
		$edit_profil = $this->input->post('submit_edit_profil');

		if (isset($edit_profil)) {
			$data = array(
				'nik' => $this->input->post('nik'),
				'alamat_lengkap' => $this->input->post('alamat_lengkap'),
				'golongan_darah' => $this->input->post('golongan_darah'),
				'no_tlp' => $this->input->post('no_tlp'),
				'email' => $this->input->post('email'),
				'asal_sekolah' => $this->input->post('asal_sekolah'),
				'nomor_induk' => $this->input->post('nomor_induk')
				);

			$this->m_mahasiswa->updateData('mhs_profil', $data, $this->session->username);
			$this->session->set_flashdata('profil_success', true);
			redirect($this->uri->uri_string());
		}

		// UPDATE DATA ORANG TUA MAHASISWA
		// $submit_ortu = $this->input->post('submit_ortu');

		// if (isset($submit_ortu)) {
		// 	$data = array(
		// 		'nim' => $this->session->username,
		// 		'ibu_nama' => $this->input->post('ibu_nama'),
		// 		'ibu_ttl' => $this->input->post('ibu_ttl'),
		// 		'ibu_pendidikan' => $this->input->post('ibu_pendidikan'),
		// 		'ibu_pekerjaan' => $this->input->post('ibu_pekerjaan'),
		// 		'ibu_pendapatan' => $this->input->post('ibu_pendapatan'),
		// 		'ibu_alamat' => $this->input->post('ibu_alamat'),
		// 		'ibu_tlp' => $this->input->post('ibu_tlp'),
		// 		'ayah_nama' => $this->input->post('ayah_nama'),
		// 		'ayah_ttl' => $this->input->post('ayah_ttl'),
		// 		'ayah_pendidikan' => $this->input->post('ayah_pendidikan'),
		// 		'ayah_pekerjaan' => $this->input->post('ayah_pekerjaan'),
		// 		'ayah_pendapatan' => $this->input->post('ayah_pendapatan'),
		// 		'ayah_alamat' => $this->input->post('ayah_alamat'),
		// 		'ayah_tlp' => $this->input->post('ayah_tlp')
		// 		);

		// 	$this->m_mahasiswa->insertData('mhs_orangtua', $data);
		// 	$this->session->set_flashdata('ortu_success', true);
		// 	redirect($this->uri->uri_string());

		// }

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

	function orangtua()
	{
		$user_akun = $this->m_mahasiswa->getMahasiswa($this->session->userdata('username'));
		// $user_alamat = $this->m_mahasiswa->getAlamatMahasiswa($this->session->userdata('username'));
		$user_ortu = $this->m_mahasiswa->getAllData('mhs_orangtua', array('nim' => $this->session->username))->result_array();
		
		$session = $this->session->userdata('login_in');

		$data['user'] = $user_akun;
		// $data['alamat'] = $user_alamat;
		$data['ortu'] = $user_ortu;

		$data['role'] = $this->session->role;

		if (!empty($user_ortu)) {
			$this->session->set_userdata('mhs_ortu', TRUE);
		} else {
			$this->session->set_userdata('mhs_ortu', FALSE);
		}

		// INSERT DATA ORANG TUA MAHASISWA
		$submit_ortu = $this->input->post('submit_ortu');

		if (isset($submit_ortu)) {
			$data = array(
				'nim' => $this->session->username,
				'ibu_nama' => $this->input->post('ibu_nama'),
				'ibu_ttl' => $this->input->post('ibu_ttl'),
				'ibu_pendidikan' => $this->input->post('ibu_pendidikan'),
				'ibu_pekerjaan' => $this->input->post('ibu_pekerjaan'),
				'ibu_pendapatan' => $this->input->post('ibu_pendapatan'),
				'ibu_alamat' => $this->input->post('ibu_alamat'),
				'ibu_tlp' => $this->input->post('ibu_tlp'),
				'ayah_nama' => $this->input->post('ayah_nama'),
				'ayah_ttl' => $this->input->post('ayah_ttl'),
				'ayah_pendidikan' => $this->input->post('ayah_pendidikan'),
				'ayah_pekerjaan' => $this->input->post('ayah_pekerjaan'),
				'ayah_pendapatan' => $this->input->post('ayah_pendapatan'),
				'ayah_alamat' => $this->input->post('ayah_alamat'),
				'ayah_tlp' => $this->input->post('ayah_tlp')
				);

			$this->m_mahasiswa->insertData('mhs_orangtua', $data);
			$this->session->set_flashdata('ortu_success', true);
			redirect($this->uri->uri_string());

		}

		// UPDATE DATA IBU MAHASISWA
		$submit_ibu = $this->input->post('submit_edit_ibu');

		if (isset($submit_ibu)) {
			$data = array(
				'ibu_nama' => $this->input->post('ibu_nama'),
				'ibu_ttl' => $this->input->post('ibu_ttl'),
				'ibu_pendidikan' => $this->input->post('ibu_pendidikan'),
				'ibu_pekerjaan' => $this->input->post('ibu_pekerjaan'),
				'ibu_pendapatan' => $this->input->post('ibu_pendapatan'),
				'ibu_alamat' => $this->input->post('ibu_alamat'),
				'ibu_tlp' => $this->input->post('ibu_tlp')
				);

			$this->m_mahasiswa->updateData('mhs_orangtua', $data, $this->session->username);
			$this->session->set_flashdata('ortu_success', true);
			redirect($this->uri->uri_string());

		}

		// UPDATE DATA AYAH MAHASISWA
		$submit_ayah = $this->input->post('submit_edit_ayah');

		if (isset($submit_ayah)) {
			$data = array(
				'ayah_nama' => $this->input->post('ayah_nama'),
				'ayah_ttl' => $this->input->post('ayah_ttl'),
				'ayah_pendidikan' => $this->input->post('ayah_pendidikan'),
				'ayah_pekerjaan' => $this->input->post('ayah_pekerjaan'),
				'ayah_pendapatan' => $this->input->post('ayah_pendapatan'),
				'ayah_alamat' => $this->input->post('ayah_alamat'),
				'ayah_tlp' => $this->input->post('ayah_tlp')
				);

			$this->m_mahasiswa->updateData('mhs_orangtua', $data, $this->session->username);
			$this->session->set_flashdata('ortu_success', true);
			redirect($this->uri->uri_string());

		}

		if ($session == TRUE) {
			$this->load->view('header', $data);
			$this->load->view('sidenav', $data);
			$this->load->view('mahasiswa/orangtua', $data);
			$this->load->view('mahasiswa/modal', $data);
			$this->load->view('footer');
		} else {
			redirect('login', 'refresh');
		}

	}

	function dokumen()
	{
		$user_akun = $this->m_mahasiswa->getMahasiswa($this->session->userdata('username'));
		// $user_alamat = $this->m_mahasiswa->getAlamatMahasiswa($this->session->userdata('username'));
		$user_upload = $this->m_mahasiswa->getAllData('mhs_upload', array('nim' => $this->session->username))->result_array()[0];
		
		$session = $this->session->userdata('login_in');

		$data['user'] = $user_akun;
		// $data['alamat'] = $user_alamat;
		$data['upload'] = $user_upload;

		$data['role'] = $this->session->role;

		$data['error'] = $this->upload->display_errors();

		if (($user_upload['pas_photo'] == null) || ($user_upload['ijazah'] == null)) {
			$this->session->set_userdata('mhs_upload', FALSE);
		} else {
			$this->session->set_userdata('mhs_upload', TRUE);
		}


		if ($session == TRUE) {
			$this->load->view('header', $data);
			$this->load->view('sidenav', $data);
			$this->load->view('mahasiswa/dokumen', $data);
			$this->load->view('mahasiswa/modal', $data);
			$this->load->view('footer');
		} else {
			redirect('login', 'refresh');
		}

	}

	function addDocument($row)
	{
		$totalRow = $this->m_mahasiswa->getNumRows('mhs_upload', array('nim' => $this->session->username));
		$pathimg = $this->input->post('path');
				
			$this->configDokumen();

			if (!$this->upload->do_upload($row)) {
				$this->dokumen();
			} else {

			$fileinfo = $this->upload->data();

			if ($row == 'pas_photo') {
				$data = array(
					'nim' => $this->session->username,
					$row => $fileinfo['file_name']
					);
			}elseif ($row == 'ijazah') {
				$data = array(
					'nim' => $this->session->username,
					$row => $fileinfo['file_name']
					);
			}

		if ($totalRow == 1) {
			@unlink("./assets/uploads/documents/mahasiswa/". $pathimg);

			$this->m_mahasiswa->updateData('mhs_upload', $data, $this->session->username);
		} else {
			$this->m_mahasiswa->insertAllData('mhs_upload', $data);
		}

			redirect('mahasiswa/dokumen', 'refresh');
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
			$this->m_mahasiswa->updateProfileImage($data, $username);

			@unlink("./assets/uploads/profiles/". $img_path);
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
		$jadwal = $this->m_mahasiswa->getDataOrder('jadwal', array('kode_prodi' => $this->session->kode_prodi, 'tahun_ajaran' => $this->session->tahun_ajaran), array('semester' => 'ASC', 'kode_matkul' => 'ASC', 'kelas' => 'ASC'))->result_array();
		$semester = $this->m_mahasiswa->getDistinctData('jadwal', 'semester')->result_array();

		$data['user'] = $user_akun;
		$data['alamat'] = $user_alamat;
		$data['jadwal'] = $jadwal;
		$data['semester'] = $semester;
		$data['role'] = $this->session->role;

		if ($session == TRUE) {
			$this->load->view('header', $data);
			$this->load->view('sidenav', $data);
			$this->load->view('mahasiswa/perwalian', $data);
			$this->load->view('mahasiswa/modal', $data);
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
		$jadwal = $this->m_operator->getDataOrder('jadwal', array('kode_prodi' => $this->session->kode_prodi, 'tahun_ajaran' => $this->session->tahun_ajaran), array('semester' => 'ASC', 'kode_matkul' => 'ASC', 'kelas' => 'ASC'))->result_array();

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