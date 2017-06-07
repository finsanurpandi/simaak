<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('m_mahasiswa');
		$this->load->library('upload');	
	}

	function configImage($url)
	{
		$user = $this->session->username;
		$nmfile = "img_".$user."_".time();
		$config['upload_path']   =   "./assets/uploads/".$url."/";
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

	function check_pembayaran()
	{

		// $this->pembayaran = $this->m_mahasiswa->getAllData('mhs_pembayaran', array('nim' => $this->session->username, 'tahun_ajaran' => $this->session->tahun_ajaran, 'status' => 1))->result_array();
		$this->pembayaran = $this->m_mahasiswa->getDataOrder('mhs_pembayaran', array('nim' => $this->session->username, 'tahun_ajaran' => $this->session->tahun_ajaran, 'status' => 1), array('id' => 'DESC'))->result_array();	

		return $this->pembayaran;

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
		$user_akun = $this->m_mahasiswa->getMahasiswa($this->session->userdata('username'));
		// $user_alamat = $this->m_mahasiswa->getAlamatMahasiswa($this->session->userdata('username'));
		$user_profil = $this->m_mahasiswa->getDataUser('mhs_profil', array('nim' => $this->session->username));
		$user_ortu = $this->m_mahasiswa->getDataUser('mhs_orangtua', array('nim' => $this->session->username));
		$user_upload = $this->m_mahasiswa->getDataUser('mhs_upload', array('nim' => $this->session->username));
		$pengumuman = $this->m_mahasiswa->getAllDataOrder('pengumuman', array('role' => $this->session->role, 'status' => 1), array('created', 'DESC'));
		// $session = $this->session->userdata('login_in');
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


		// if ($session == TRUE  && $this->session->role == 1) {
		// 	$this->load->view('header', $data);
		// 	$this->load->view('sidenav', $data);
		// 	$this->load->view('mahasiswa/home', $data);
		// 	$this->load->view('footer');
		// } else {
		// 	redirect('login', 'refresh');
		// }

		$this->set_view('mahasiswa/home', $data);	
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
		$data['dosenwali'] = $this->m_mahasiswa->getAllData('dosen', array('nidn' => $user_akun['nidn']))->result_array();
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

		// if ($session == TRUE) {
		// 	$this->load->view('header', $data);
		// 	$this->load->view('sidenav', $data);
		// 	$this->load->view('mahasiswa/profil', $data);
		// 	$this->load->view('mahasiswa/modal', $data);
		// 	$this->load->view('footer');
		// } else {
		// 	redirect('login', 'refresh');
		// }

		$this->set_view('mahasiswa/profil', $data);	
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

		// if ($session == TRUE) {
		// 	$this->load->view('header', $data);
		// 	$this->load->view('sidenav', $data);
		// 	$this->load->view('mahasiswa/orangtua', $data);
		// 	$this->load->view('mahasiswa/modal', $data);
		// 	$this->load->view('footer');
		// } else {
		// 	redirect('login', 'refresh');
		// }

		$this->set_view('mahasiswa/orangtua', $data);	

	}

	function dokumen()
	{
		$user_akun = $this->m_mahasiswa->getMahasiswa($this->session->userdata('username'));
		// $user_alamat = $this->m_mahasiswa->getAlamatMahasiswa($this->session->userdata('username'));
		$user_upload = @$this->m_mahasiswa->getAllData('mhs_upload', array('nim' => $this->session->username))->result_array()[0];
		
		$session = $this->session->userdata('login_in');

		$data['user'] = $user_akun;
		// $data['alamat'] = $user_alamat;
		$data['upload'] = @$user_upload;

		$data['role'] = $this->session->role;

		$data['error'] = $this->upload->display_errors();

		if ( (empty($user_upload['pas_photo'])) || (empty($user_upload['ijazah'])) ) {
			$this->session->set_userdata('mhs_upload', FALSE);
		} else {
			$this->session->set_userdata('mhs_upload', TRUE);
		}


		// if ($session == TRUE) {
		// 	$this->load->view('header', $data);
		// 	$this->load->view('sidenav', $data);
		// 	$this->load->view('mahasiswa/dokumen', $data);
		// 	$this->load->view('mahasiswa/modal', $data);
		// 	$this->load->view('footer');
		// } else {
		// 	redirect('login', 'refresh');
		// }

		$this->set_view('mahasiswa/dokumen', $data);	

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

		$this->configImage('profiles');


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

		$this->check_pembayaran();
		$data['pembayaran'] = $this->pembayaran;

		if ($session == TRUE && $this->session->role == 1 && $this->session->mhs_profil == TRUE && $this->session->mhs_ortu == TRUE && $this->session->mhs_upload == TRUE) {
			$this->load->view('header', $data);
			$this->load->view('sidenav', $data);
			$this->load->view('mahasiswa/studi', $data);
			$this->load->view('footer');
		} else {
			redirect('login', 'refresh');
		}	
	}


// MENU HASIL STUDI ----------------------------------
function ips()
	{
		$user_akun = $this->m_mahasiswa->getMahasiswa($this->session->userdata('username'));
		$user_alamat = $this->m_mahasiswa->getAlamatMahasiswa($this->session->userdata('username'));
		$session = $this->session->userdata('login_in');
		
		$tahun_ajaran = $this->m_mahasiswa->getDistinctDataOrder('nilai', array('nim' => $this->session->username), 'tahun_ajaran', array('tahun_ajaran' => 'DESC'))->result_array();

		$t_ajaran = $this->input->post('submit_ta');
		
		$historinilai = $this->m_mahasiswa->getAllData('nilai', array('nim' => $this->session->username, 'tahun_ajaran' => $this->session->tahun_ajaran))->result_array();				

		if (isset($t_ajaran)) {

			$datanilai = $this->m_mahasiswa->getAllData('nilai', array('nim' => $this->session->username, 'tahun_ajaran' => $this->input->post('tahun_ajaran')))->result_array();				

			if (empty($datanilai)) {
				$nilai = $this->m_mahasiswa->getAllData('perwalian', array('nim' => $this->session->username, 'tahun_ajaran' => $this->session->tahun_ajaran))->result_array();
			} else {
				$nilai = $datanilai;
			}
			
		} else {
			// if ($tahun_ajaran[0]['tahun_ajaran'] !== $this->session->tahun_ajaran) {
			// 	$nilai = $this->m_mahasiswa->getAllData('perwalian', array('nim' => $this->session->username, 'tahun_ajaran' => $this->session->tahun_ajaran))->result_array();
			// } 
			if (empty($historinilai)) {
				$nilai = $this->m_mahasiswa->getAllData('perwalian', array('nim' => $this->session->username, 'tahun_ajaran' => $this->session->tahun_ajaran))->result_array();
			} else {
				$nilai = $this->m_mahasiswa->getAllData('nilai', array('nim' => $this->session->username, 'tahun_ajaran' => $this->session->tahun_ajaran))->result_array();				
			}
		}



		// $perwalian = $this->m_mahasiswa->getAllData('perwalian', array('nim' => $this->session->username, 'tahun_ajaran' => $this->session->tahun_ajaran))->result_array();
		// $totalSks = $this->m_mahasiswa->getTotalSks('perwalian', array('nim' => $this->session->username, 'tahun_ajaran' => $this->session->tahun_ajaran));

		$data['user'] = $user_akun;
		$data['alamat'] = $user_alamat;
		// $data['jadwal'] = $jadwal;
		// $data['semester'] = $semester;
		$data['role'] = $this->session->role;
		// $data['statusperwalian'] = @$statusperwalian[0];
		$data['ta'] = @$nilai[0]['tahun_ajaran'];
		$data['tahun_ajaran'] = $tahun_ajaran;
		$data['nilai'] = $nilai;
		$data['dosenwali'] = $this->m_mahasiswa->getAllData('dosen', array('nidn' => $user_akun['nidn']))->result_array();
		// $data['totalsks'] = $totalSks;

		$this->check_pembayaran();
		$data['pembayaran'] = $this->pembayaran;

		if ($session == TRUE && $this->session->role == 1 && $this->session->mhs_profil == TRUE && $this->session->mhs_ortu == TRUE && $this->session->mhs_upload == TRUE) {
			$this->load->view('header', $data);
			$this->load->view('sidenav', $data);
			$this->load->view('mahasiswa/hasilstudi-s', $data);
			$this->load->view('mahasiswa/modal', $data);
			$this->load->view('footer');
		} else {
			redirect('login', 'refresh');
		}	

		
	}

function ipk()
	{
		$user_akun = $this->m_mahasiswa->getMahasiswa($this->session->userdata('username'));
		$user_alamat = $this->m_mahasiswa->getAlamatMahasiswa($this->session->userdata('username'));
		$session = $this->session->userdata('login_in');
		// $jadwal = $this->m_mahasiswa->getDataOrder('jadwal', array('kode_prodi' => $this->session->kode_prodi, 'tahun_ajaran' => $this->session->tahun_ajaran), array('semester' => 'ASC', 'kode_matkul' => 'ASC', 'kelas' => 'ASC'))->result_array();
		// $semester = $this->m_mahasiswa->getDistinctData('jadwal', 'semester')->result_array();
		// $statusperwalian = $this->m_mahasiswa->getAllData('status_perwalian', array('nim' => $this->session->username))->result_array();
		$tahun_ajaran = $this->m_mahasiswa->getDistinctDataOrder('nilai', array('nim' => $this->session->username), 'tahun_ajaran', array('tahun_ajaran' => 'DESC'))->result_array();

		$nilai = $this->m_mahasiswa->getMatkulKeseluruhan("'".$this->session->username."'")->result_array();
		// $nilai = $this->m_mahasiswa->getAllDataOrder('nilai', array('nim' => $this->session->username), array('kode_matkul' => 'ASC'));				


		$data['user'] = $user_akun;
		$data['alamat'] = $user_alamat;
		// $data['jadwal'] = $jadwal;
		// $data['semester'] = $semester;
		$data['role'] = $this->session->role;
		$data['nilai'] = $nilai;
		$data['dosenwali'] = $this->m_mahasiswa->getAllData('dosen', array('nidn' => $user_akun['nidn']))->result_array();

		$this->check_pembayaran();
		$data['pembayaran'] = $this->pembayaran;

		if ($session == TRUE && $this->session->role == 1 && $this->session->mhs_profil == TRUE && $this->session->mhs_ortu == TRUE && $this->session->mhs_upload == TRUE) {
			$this->load->view('header', $data);
			$this->load->view('sidenav', $data);
			$this->load->view('mahasiswa/hasilstudi-k', $data);
			$this->load->view('mahasiswa/modal', $data);
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
		$statusperwalian = $this->m_mahasiswa->getAllData('status_perwalian', array('nim' => $this->session->username, 'tahun_ajaran' => $this->session->tahun_ajaran))->result_array();
		$perwalian = $this->m_mahasiswa->getAllData('perwalian', array('nim' => $this->session->username, 'tahun_ajaran' => $this->session->tahun_ajaran))->result_array();
		// $totalSks = $this->m_mahasiswa->getTotalSks('perwalian', array('nim' => $this->session->username, 'tahun_ajaran' => $this->session->tahun_ajaran));

		$data['user'] = $user_akun;
		$data['alamat'] = $user_alamat;
		$data['jadwal'] = $jadwal;
		$data['semester'] = $semester;
		$data['role'] = $this->session->role;
		$data['statusperwalian'] = @$statusperwalian[0];
		$data['perwalian'] = $perwalian;
		$data['dosenwali'] = $this->m_mahasiswa->getAllData('dosen', array('nidn' => $user_akun['nidn']))->result_array();
		// $data['totalsks'] = $totalSks;

		$this->check_pembayaran();
		$data['pembayaran'] = $this->pembayaran;

		if ($session == TRUE && $this->session->role == 1 && $this->session->mhs_profil == TRUE && $this->session->mhs_ortu == TRUE && $this->session->mhs_upload == TRUE && !empty($this->pembayaran)) {
			$this->load->view('header', $data);
			$this->load->view('sidenav', $data);
			$this->load->view('mahasiswa/perwalian', $data);
			$this->load->view('mahasiswa/modal', $data);
			$this->load->view('footer');
		} else {
			redirect('login', 'refresh');
		}	

		$submit_perwalian = $this->input->post('submitperwalian');

		if (isset($submit_perwalian)) {
			date_default_timezone_set("Asia/Bangkok");
			$date = new DateTime();
			$tglperwalian = $date->format('Y-m-d H:i:s');

			$data = array();

			for ($i = 0; $i < count($this->input->post('id_jadwal')); $i++) {
	            $data[$i] = array(
	            	'nim' => $this->session->username,
	            	'nama_mhs' => $user_akun['nama'],
	                'kode_matkul' => $this->input->post('kode_matkul')[$i],
	                'nama_matkul' => $this->input->post('nama_matkul')[$i],
	                'sks' => $this->input->post('sks')[$i],
	                'nidn' => $this->input->post('nidn')[$i],
	                'nama_dosen' => $this->input->post('nama_dosen')[$i],
	                'kelas' => $this->input->post('kelas')[$i],
	                'id_jadwal' => $this->input->post('id_jadwal')[$i],
	                'semester' => $this->input->post('semester')[$i],
	                'tahun_ajaran' => $this->session->tahun_ajaran,
	                'kode_prodi' => $this->session->kode_prodi
	            );
	        };

	        $data2 = array(
	        	'nim' => $this->session->username,
	        	'nidn' => $user_akun['nidn'],
	        	'tahun_ajaran' => $this->session->tahun_ajaran,
	        	'tgl_perwalian' => $tglperwalian
	        	);

	        $this->m_mahasiswa->insertMultiple('perwalian', $data, 'status_perwalian', $data2);

	        redirect($this->uri->uri_string());
		}
	}

// MENU JADWAL KULIAH ----------------------------------
	function perkuliahan()
	{
		$user_akun = $this->m_mahasiswa->getMahasiswa($this->session->userdata('username'));
		$user_alamat = $this->m_mahasiswa->getAlamatMahasiswa($this->session->userdata('username'));
		$session = $this->session->userdata('login_in');
		$jadwalmhs = $this->m_mahasiswa->getJadwalMhs(array('nim' => $this->session->username, 'jadwal.tahun_ajaran' => $this->session->tahun_ajaran));
		$statusperwalian = $this->m_mahasiswa->getAllData('status_perwalian', array('nim' => $this->session->username))->result_array();

		$data['user'] = $user_akun;
		$data['alamat'] = $user_alamat;
		$data['jadwal'] = $jadwalmhs;
		$data['role'] = $this->session->role;
		$data['statusperwalian'] = @$statusperwalian[0];
		$data['dosenwali'] = $this->m_mahasiswa->getAllData('dosen', array('nidn' => $user_akun['nidn']))->result_array();

		$this->check_pembayaran();
		$data['pembayaran'] = $this->pembayaran;

		if ($session == TRUE && $this->session->role == 1 && $this->session->mhs_profil == TRUE && $this->session->mhs_ortu == TRUE && $this->session->mhs_upload == TRUE) {
			$this->load->view('header', $data);
			$this->load->view('sidenav', $data);
			$this->load->view('mahasiswa/jadwal', $data);
			$this->load->view('footer');
		} else {
			redirect('login', 'refresh');
		}	
	}

// MENU UPLOAD BUKTI PEMBAYARAN ----------------------------------
	function pembayaran()
	{
		$user_akun = $this->m_mahasiswa->getMahasiswa($this->session->userdata('username'));
		// $user_alamat = $this->m_mahasiswa->getAlamatMahasiswa($this->session->userdata('username'));
		$user_upload = @$this->m_mahasiswa->getAllData('mhs_pembayaran', array('nim' => $this->session->username, 'tahun_ajaran' => $this->session->tahun_ajaran))->result_array()[0];
		
		$session = $this->session->userdata('login_in');

		$data['user'] = $user_akun;
		// $data['alamat'] = $user_alamat;
		$data['upload'] = @$user_upload;

		$data['role'] = $this->session->role;

		$data['error'] = $this->upload->display_errors();

		if ( empty($user_upload['pas_photo']) ) {
			$this->session->set_userdata('mhs_pembayaran', FALSE);
		} else {
			$this->session->set_userdata('mhs_pembayaran', TRUE);
		}

		
		$this->check_pembayaran();
		$data['pembayaran'] = $this->pembayaran;
		$data['stt_pembayaran'] = $this->m_mahasiswa->getDataOrder('mhs_pembayaran', array('nim' => $this->session->username, 'tahun_ajaran' => $this->session->tahun_ajaran), array('id' => 'DESC'))->result_array();	

		if ($session == TRUE && $this->session->role == 1 && $this->session->mhs_profil == TRUE && $this->session->mhs_ortu == TRUE && $this->session->mhs_upload == TRUE) {
			$this->load->view('header', $data);
			$this->load->view('sidenav', $data);
			$this->load->view('mahasiswa/pembayaran', $data);
			$this->load->view('footer');
		} else {
			redirect('login', 'refresh');
		}


	}

	function upload_bukti()
	{
		$this->configImage('documents/mahasiswa');

		if (!$this->upload->do_upload('bukti_pembayaran')) {
			redirect('mahasiswa/pembayaran','refresh');
		} else {
			$image_info = $this->upload->data();

			//set date
			date_default_timezone_set("Asia/Bangkok");
			$date = new DateTime();
			$log = $date->format('Y-m-d H:i:s');

			$bukti = array (
				'nim' => $this->session->username,
				'kode_prodi' => $this->session->kode_prodi,
				'tahun_ajaran' => $this->session->tahun_ajaran,
				'image' => $image_info['file_name'],
				'status' => 'Menunggu Validasi',
				'log' => $log
				);

			$this->m_mahasiswa->insertAllData('mhs_pembayaran', $bukti);
		}

		redirect('mahasiswa/pembayaran','refresh');
	}

	function editPembayaran()
	{
		$username = $this->session->username;
		$img_path = $this->input->post('path');

		$this->configImage('documents/mahasiswa');


		if (!$this->upload->do_upload('img_pembayaran')) {
			$this->pembayaran();
		} else {

			$fileinfo = $this->upload->data();

			$data = array ('image' => $fileinfo['file_name']);
			$this->m_mahasiswa->updateImage('mhs_pembayaran', $data, array('nim' => $this->session->username, 'tahun_ajaran' => $this->session->tahun_ajaran));

			@unlink("./assets/uploads/documents/mahasiswa/". $img_path);
			redirect('mahasiswa/pembayaran', 'refresh');
		}

	}

// MENU CETAK ----------------------------------
	function cetak()
	{
		$user_akun = $this->m_mahasiswa->getMahasiswa($this->session->userdata('username'));
		// $user_alamat = $this->m_mahasiswa->getAlamatMahasiswa($this->session->userdata('username'));
		$user_upload = @$this->m_mahasiswa->getAllData('mhs_pembayaran', array('nim' => $this->session->username, 'tahun_ajaran' => $this->session->tahun_ajaran))->result_array()[0];
		
		$session = $this->session->userdata('login_in');

		$data['user'] = $user_akun;
		// $data['alamat'] = $user_alamat;
		$data['upload'] = @$user_upload;

		$data['role'] = $this->session->role;
		
		$this->check_pembayaran();
		$data['pembayaran'] = @$this->pembayaran;
		$data['stt_pembayaran'] = $this->m_mahasiswa->getDataOrder('mhs_pembayaran', array('nim' => $this->session->username, 'tahun_ajaran' => $this->session->tahun_ajaran), array('id' => 'DESC'))->result_array();	

		if ($session == TRUE && $this->session->role == 1 && $this->session->mhs_profil == TRUE && $this->session->mhs_ortu == TRUE && $this->session->mhs_upload == TRUE) {
			$this->load->view('header', $data);
			$this->load->view('sidenav', $data);
			$this->load->view('mahasiswa/cetak', $data);
			$this->load->view('footer');
		} else {
			redirect('login', 'refresh');
		}


	}

}