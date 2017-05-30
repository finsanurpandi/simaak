<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Operator extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('m_operator');
		$this->load->model('m_mahasiswa');
		$this->load->library('upload');
	}

// CONFIGURATION --------------------------------
// UPLOAD IMAGE  --------------------------------

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

	function checkSession($url, $data)
	{
		$session = $this->session->userdata('login_in');

		if ($session == TRUE) {
			$this->load->view('header', $data);
			$this->load->view('sidenav', $data);
			$this->load->view('operator/'.$url, $data);
			$this->load->view('operator/modal', $data);
			$this->load->view('footer');
		} else {
			redirect('login', 'refresh');
		}	
	}


// MENU HOME ----------------------------------
	function index()
	{
		$user_akun = $this->m_operator->getOperator($this->session->userdata('username'));
		// $user_alamat = $this->m_dosen->getAlamatDosen($this->session->userdata('username'));
		$session = $this->session->userdata('login_in');

		$data['user'] = $user_akun;
		// $data['alamat'] = $user_alamat;

		$data['role'] = $this->session->role;

		// if ($session == TRUE) {
		// 	$this->load->view('header', $data);
		// 	$this->load->view('sidenav', $data);
		// 	$this->load->view('operator/home', $data);
		// 	$this->load->view('footer');
		// } else {
		// 	redirect('login', 'refresh');
		// }	
		$this->checkSession('home', $data);
	}


// MENU PROFIL ----------------------------------
	function profil()
	{
		$user_akun = $this->m_operator->getOperator($this->session->userdata('username'));
		$user_alamat = $this->m_operator->getDataUser('operator_alamat', array('username' => $this->session->userdata('username')));
		// $session = $this->session->userdata('login_in');

		$data['error'] = $this->upload->display_errors();

		$data['user'] = $user_akun;
		$data['alamat'] = $user_alamat;

		$data['role'] = $this->session->role;
		$data['prodi'] = $this->m_operator->getDataUser('program_studi', array('kode_prodi' => $this->session->kode_prodi));

		// if ($session == TRUE) {
		// 	$this->load->view('header', $data);
		// 	$this->load->view('sidenav', $data);
		// 	$this->load->view('operator/profil', $data);
		// 	$this->load->view('operator/modal', $data);
		// 	$this->load->view('footer');
		// } else {
		// 	redirect('login', 'refresh');
		// }
		$this->checkSession('profil', $data);
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
			$this->m_operator->updateProfileImage($data, $username);

			@unlink("./assets/uploads/profiles/". $img_path);
			redirect('operator/profil', 'refresh');
		}
 
			
	}

	function ubahPassword()
	{	
		$username = $this->session->username;
		$newPass = md5($this->input->post('new_pass'));
		$data = array('password' => $newPass);

		$this->m_operator->updatePassword($data, $username);
		redirect('login/logout', 'refresh');
	}


// MENU MAHASISWA ------------------------------------

	function mahasiswa()
	{
		//pagination
		$total = $this->m_operator->getAllData('mhs', array('kode_prodi' => $this->session->kode_prodi))->num_rows();
		$limit = 20;
		$url = 'operator/mahasiswa';
		$config = $this->configPagination($total, $limit, $url);
		//-------

		$data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;		

		$user_akun = $this->m_operator->getOperator($this->session->userdata('username'));
		$session = $this->session->userdata('login_in');

		//SEARCH 
		$search = $this->input->post('search');

		if (isset($search)) {
			if ($this->input->post('search_key') == null) {
				$mhs = $this->m_operator->getAllData('mhs', array('kode_prodi' => $this->session->kode_prodi), $limit, $data['page'])->result_array();	
				$data['link'] = $this->pagination->create_links();
			} else {
				$mhs = $this->m_operator->searchData('mhs', array('kode_prodi' => $this->session->kode_prodi), $this->input->post('search_key'), $this->input->post('search_category'));
			}
		} else {
			$mhs = $this->m_operator->getAllData('mhs', array('kode_prodi' => $this->session->kode_prodi), $limit, $data['page'])->result_array();	
			$data['link'] = $this->pagination->create_links();
		}
		
		$dosen = $this->m_operator->getAllData('dosen', array('kode_prodi' => $this->session->kode_prodi))->result_array();
		$prodi = $this->m_operator->getDataUser('program_studi', array('kode_prodi' => $this->session->kode_prodi));

		$data['user'] = $user_akun;
		$data['mhs'] = $mhs;
		$data['dosen'] = $dosen;
		$data['role'] = $this->session->role;
		$data['prodi'] = $prodi;
		// $data['link'] = $this->pagination->create_links();

		if ($session == TRUE) {
			$this->load->view('header', $data);
			$this->load->view('sidenav', $data);
			$this->load->view('operator/mahasiswa', $data);
			$this->load->view('operator/modal', $data);
			$this->load->view('footer');
		} else {
			redirect('login', 'refresh');
		}

		//TAMBAH DATA MAHASISWA
		$tambah = $this->input->post('tambahMahasiswa');	

		if (isset($tambah)) {
			$nim = $this->input->post('nim');

			$account = array (
				'username' => $nim,
				'password' => md5($nim),
				'role' => 1,
				'kode_prodi' => $this->input->post('kode_prodi'),
				'status' => 1
				);

			$mahasiswa = array (
				'nim' => $this->input->post('nim'),
				'nama' => $this->input->post('nama'),
				'angkatan' => $this->input->post('angkatan'),
				'jenjang' => $this->input->post('jenjang'),
				'kode_prodi' => $this->input->post('kode_prodi'),
				'kelas' => $this->input->post('kelas'),
				'jenis_kelamin' => $this->input->post('jenis_kelamin'),
				'tempat_lahir' => ucfirst($this->input->post('tempat_lahir')),
				'tanggal_lahir' => $this->input->post('tanggal_lahir'),
				'nidn' => $this->input->post('dosen_wali')
				);

			$status_keuangan = array (
				'nim' => $this->input->post('nim'),
				'kode_prodi' => $this->input->post('kode_prodi'),
				'tahun_ajaran' => $this->input->post('tahun_ajaran'),
				'status' => '0%'
				);

			$this->m_operator->insertMahasiswa($account, $mahasiswa);
			redirect($this->uri->uri_string());
		}

	}

	// function tambahMahasiswa()
	// {
	// 	$nim = $this->input->post('nim');

	// 	$account = array (
	// 		'username' => $nim,
	// 		'password' => md5($nim),
	// 		'role' => '1'
	// 		);

	// 	$mahasiswa = array (
	// 		'nim' => $this->input->post('nim'),
	// 		'nama' => $this->input->post('nama'),
	// 		'angkatan' => $this->input->post('angkatan'),
	// 		'jenjang' => $this->input->post('jenjang'),
	// 		'prodi' => $this->input->post('prodi'),
	// 		'jenis_kelamin' => $this->input->post('jenis_kelamin'),
	// 		'tempat_lahir' => ucfirst($this->input->post('tempat_lahir')),
	// 		'tanggal_lahir' => $this->input->post('tanggal_lahir'),
	// 		'nidn' => $this->input->post('dosen_wali')
	// 		);

	// 	$this->m_operator->insertMahasiswa($account, $mahasiswa);
	// 	redirect('operator/mahasiswa', 'refresh');
		
	// }

	function detailMahasiswa($nim)
	{
		$user_akun = $this->m_operator->getOperator($this->session->userdata('username'));
		$session = $this->session->userdata('login_in');

		$key_nim = $this->encrypt->decode($nim);
		$mhs = $this->m_operator->getDataUser('mhs', array('nim' => $key_nim));
		$dosen = $this->m_operator->getAllData('dosen', array('kode_prodi' => $this->session->kode_prodi))->result_array();
		$prodi = $this->m_operator->getAllData('program_studi')->result_array();
		// $jenjang = $this->m_operator->getAllData('jenjang_akademik')->result_array();
		

		$data['user'] = $user_akun;
		$data['mhs'] = $mhs;
		$data['dosen'] = $dosen;
		$data['prodi'] = $prodi;
		// $data['jenjang'] = $jenjang;
		$data['role'] = $this->session->role;
		$data['key'] = $key_nim;

		if ($session == TRUE) {
			$this->load->view('header', $data);
			$this->load->view('sidenav', $data);
			$this->load->view('operator/detailMahasiswa', $data);
			$this->load->view('footer');
		} else {
			redirect('login', 'refresh');
		}

		$submit = $this->input->post('submit');

		if (isset($submit)) {
			$mahasiswa = array (
				'nim' => $this->input->post('nim'),
				'nama' => $this->input->post('nama'),
				'angkatan' => $this->input->post('angkatan'),
				'kelas' => $this->input->post('kelas'),
				'jenjang' => $this->input->post('jenjang'),
				'jenis_kelamin' => $this->input->post('jenis_kelamin'),
				'tempat_lahir' => ucfirst($this->input->post('tempat_lahir')),
				'tanggal_lahir' => $this->input->post('tanggal_lahir'),
				'nidn' => $this->input->post('dosen_wali')
			);

			$this->m_operator->updateData('mhs', $mahasiswa, array('nim' => $key_nim));

			$this->session->set_flashdata('success', true);
			
			redirect($this->uri->uri_string());

		}	
	}

	function detailStudi($nim)
	{
		$nim = $this->encrypt->decode($nim);

		$user_akun = $this->m_operator->getOperator($this->session->userdata('username'));
		$mhs = $this->m_operator->getAllData('mhs', array('nim' => $nim))->result_array();
		$session = $this->session->userdata('login_in');
		
		$tahun_ajaran = $this->m_mahasiswa->getDistinctDataOrder('nilai', array('nim' => $nim), 'tahun_ajaran', array('tahun_ajaran' => 'DESC'))->result_array();

		$t_ajaran = $this->input->post('submit_ta');
		
		$historinilai = $this->m_mahasiswa->getAllData('nilai', array('nim' => $nim, 'tahun_ajaran' => $this->session->tahun_ajaran))->result_array();				

		if (isset($t_ajaran)) {

			$datanilai = $this->m_mahasiswa->getAllData('nilai', array('nim' => $nim, 'tahun_ajaran' => $this->input->post('tahun_ajaran')))->result_array();				

			if (empty($datanilai)) {
				$nilais = $this->m_mahasiswa->getAllData('perwalian', array('nim' => $nim, 'tahun_ajaran' => $this->session->tahun_ajaran))->result_array();
			} else {
				$nilais = $datanilai;
			}
			
		} else {
			// if ($tahun_ajaran[0]['tahun_ajaran'] !== $this->session->tahun_ajaran) {
			// 	$nilai = $this->m_mahasiswa->getAllData('perwalian', array('nim' => $this->session->username, 'tahun_ajaran' => $this->session->tahun_ajaran))->result_array();
			// } 
			if (empty($historinilai)) {
				$nilais = $this->m_mahasiswa->getAllData('perwalian', array('nim' => $nim, 'tahun_ajaran' => $this->session->tahun_ajaran))->result_array();
			} else {
				$nilais = $this->m_mahasiswa->getAllData('nilai', array('nim' => $nim, 'tahun_ajaran' => $this->session->tahun_ajaran))->result_array();				
			}
		}

		$nilaik = $this->m_mahasiswa->getMatkulKeseluruhan($nim)->result_array();



		// $perwalian = $this->m_mahasiswa->getAllData('perwalian', array('nim' => $this->session->username, 'tahun_ajaran' => $this->session->tahun_ajaran))->result_array();
		// $totalSks = $this->m_mahasiswa->getTotalSks('perwalian', array('nim' => $this->session->username, 'tahun_ajaran' => $this->session->tahun_ajaran));

		$data['user'] = $user_akun;
		$data['mhs'] = $mhs[0];
		$data['nim'] = $nim;
		// $data['alamat'] = $user_alamat;
		// $data['jadwal'] = $jadwal;
		// $data['semester'] = $semester;
		$data['role'] = $this->session->role;
		// $data['statusperwalian'] = @$statusperwalian[0];
		$data['ta'] = @$nilais[0]['tahun_ajaran'];
		$data['tahun_ajaran'] = $tahun_ajaran;
		$data['nilais'] = $nilais;
		$data['nilaik'] = $nilaik;
		// $data['totalsks'] = $totalSks;

		if ($session == TRUE && $this->session->role == 3) {
			$this->load->view('header', $data);
			$this->load->view('sidenav', $data);
			$this->load->view('operator/detailStudi', $data);
			$this->load->view('operator/modal', $data);
			$this->load->view('footer');
		} else {
			redirect('login', 'refresh');
		}
	}

// MENU DOSEN ----------------------------------------

	function dosen()
	{
		//pagination
		$total = $this->m_operator->getAllData('dosen', array('kode_prodi' => $this->session->kode_prodi))->num_rows();
		$limit = 20;
		$url = 'operator/dosen';
		$config = $this->configPagination($total, $limit, $url);
		//-------

		$data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;		

		$user_akun = $this->m_operator->getOperator($this->session->userdata('username'));
		$session = $this->session->userdata('login_in');

		//SEARCH 
		$search = $this->input->post('search');

		$kdprodi = strtolower($this->session->kode_prodi);
		$alldosen = $this->m_operator->getSisaDosen('dosen_'.$kdprodi);

		// if (isset($search)) {
		// 	if ($this->input->post('search_key') == null) {
		// 		$dosen = $this->m_operator->getAllData('dosen', array('kode_prodi' => $this->session->kode_prodi),$limit, $data['page'])->result_array();	
		// 		$data['link'] = $this->pagination->create_links();
		// 	} else {
		// 		$dosen = $this->m_operator->searchData('dosen', array('kode_prodi' => $this->session->kode_prodi),$this->input->post('search_key'), $this->input->post('search_category'));
		// 	}
		// } else {
		// 	$dosen = $this->m_operator->getAllData('dosen', array('kode_prodi' => $this->session->kode_prodi),$limit, $data['page'])->result_array();	
		// 	$data['link'] = $this->pagination->create_links();
		// }
		if (isset($search)) {
			if ($this->input->post('search_key') == null) {
				$dosen = $this->m_operator->getLeftJoinDosen('dosen_'.$kdprodi, array('status_dosen' => 'ASC'), $limit, $data['page']);	
				$data['link'] = $this->pagination->create_links();
			} else {
				$dosen = $this->m_operator->searchDataJoin('dosen_'.$kdprodi, $this->input->post('search_key'), $this->input->post('search_category'));
			}
		} else {
			$dosen = $this->m_operator->getLeftJoinDosen('dosen_'.$kdprodi, array('status_dosen' => 'ASC'), $limit, $data['page']);	
			$data['link'] = $this->pagination->create_links();
		}
		
		// $dosen = $this->m_operator->getAllData('dosen')->result_array();
		$prodi = $this->m_operator->getDataUser('program_studi', array('kode_prodi' => $this->session->kode_prodi));

		$data['user'] = $user_akun;
		// $data['mhs'] = $mhs;
		$data['dosen'] = $dosen;
		$data['role'] = $this->session->role;
		$data['prodi'] = $prodi;
		$data['alldosen'] = $alldosen;
		// $data['link'] = $this->pagination->create_links();

		if ($session == TRUE) {
			$this->load->view('header', $data);
			$this->load->view('sidenav', $data);
			$this->load->view('operator/dosen', $data);
			$this->load->view('operator/modal', $data);
			$this->load->view('footer');
		} else {
			redirect('login', 'refresh');
		}

		//TAMBAH DATA DOSEN
		$tambah = $this->input->post('tambahDosen');	

		if (isset($tambah)) {
			// $nidn = $this->input->post('nidn');

			// $account = array (
			// 	'username' => $nidn,
			// 	'password' => md5($nidn),
			// 	'role' => 2,
			// 	'kode_prodi' => $this->input->post('kode_prodi'),
			// 	'status' => 1
			// 	);

			// $dosen = array (
			// 	'nidn' => $this->input->post('nidn'),
			// 	'nik' => $this->input->post('nik'),
			// 	'nama' => $this->input->post('nama'),
			// 	'gelar_depan' => $this->input->post('gelar_depan'),
			// 	'gelar_belakang' => $this->input->post('gelar_belakang'),
			// 	'kode_prodi' => $this->input->post('kode_prodi'),
			// 	'jenis_kelamin' => $this->input->post('jenis_kelamin'),
			// 	'jabatan_fungsional' => $this->input->post('jabatan_fungsional'),
			// 	'golongan' => $this->input->post('golongan'),
			// 	'jenis_dosen' => $this->input->post('jenis_dosen'),
			// 	'jabatan_struktural' => $this->input->post('jabatan_struktural')
			// 	);

			// $this->m_operator->insertDosen($account, $dosen);
			$data = array(
				'nidn' => $this->input->post('nidn'),
				'status_dosen' => $this->input->post('status_dosen')
			);

			$this->m_operator->insertAllData('dosen_'.$kdprodi, $data);
			redirect($this->uri->uri_string());
		}

		//HAPUS DATA DOSEN
		$hapus = $this->input->post('hapusDosen');

		if (isset($hapus)) {
			$this->m_operator->deleteData('dosen_'.$kdprodi, array('nidn' => $this->input->post('nidn')));
			redirect($this->uri->uri_string());
		}
	}

	function detailDosen($nidn)
	{
		$user_akun = $this->m_operator->getOperator($this->session->userdata('username'));
		$session = $this->session->userdata('login_in');

		$key_nidn = $this->encrypt->decode($nidn);
		$dosen = $this->m_operator->getDataUser('dosen', array('nidn' => $key_nidn));
		$prodi = $this->m_operator->getAllData('program_studi')->result_array();
		$jabfung = $this->m_operator->getAllData('jabatan_fungsional')->result_array();
		$golongan = $this->m_operator->getDataWhere('golongan', array('jabatan_fungsional' => $dosen['jabatan_fungsional']));
		// $pendidikan = $this->m_operator->getAllData('dosen_pendidikan', array('nidn' => $key_nidn), null, null, array('tahun_lulus' => 'DESC'));
		$pendidikan = $this->m_operator->getDataOrder('dosen_pendidikan', array('nidn' => $key_nidn), array('tahun_lulus' => 'DESC'));
		// $penelitian = $this->m_operator->getDataOrder('dosen_penelitian', array('nidn' => $key_nidn), array('tahun' => 'DESC'));

		$data['user'] = $user_akun;
		$data['dosen'] = $dosen;
		$data['prodi'] = $prodi;
		$data['jabfung'] = $jabfung;
		$data['golongan'] = $golongan;
		$data['role'] = $this->session->role;
		$data['key'] = $key_nidn;
		$data['nidndosen'] = $dosen['nidn'];
		$data['pendidikan'] = $pendidikan->result_array();
		// $data['penelitian'] = $penelitian->result_array();

		if ($session == TRUE) {
			$this->load->view('header', $data);
			$this->load->view('sidenav', $data);
			$this->load->view('operator/detailDosen', $data);
			$this->load->view('operator/modal', $data);
			$this->load->view('footer');
		} else {
			redirect('login', 'refresh');
		}

		//EDIT DATA DOSEN
		$submit = $this->input->post('submit');

		if (isset($submit)) {
			$dosen = array (
				'nik' => $this->input->post('nik'),
				'nama' => $this->input->post('nama'),
				'gelar_depan' => $this->input->post('gelar_depan'),
				'gelar_belakang' => $this->input->post('gelar_belakang'),
				'jenis_kelamin' => $this->input->post('jenis_kelamin'),
				'jabatan_fungsional' => $this->input->post('jabatan_fungsional'),
				'golongan' => $this->input->post('golongan'),
				'jenis_dosen' => $this->input->post('jenis_dosen'),
				'jabatan_struktural' => $this->input->post('jabatan_struktural')
				);

			$this->m_operator->updateData('dosen', $dosen, array('nidn' => $key_nidn));

			$this->session->set_flashdata('success', true);

			redirect($this->uri->uri_string());

		}	

		// ADD DATA PENDIDIKAN DOSEN
		$addPendidikan = $this->input->post('tambahPendidikanDosen');

		if (isset($addPendidikan)) {
			$dosen = array (
				'nidn' => $this->input->post('nidn'),
				'jenjang' => $this->input->post('jenjang'),
				'perguruan_tinggi' => $this->input->post('perguruan_tinggi'),
				'fakultas' => $this->input->post('fakultas'),
				'program_studi' => $this->input->post('program_studi'),
				'ipk' => $this->input->post('ipk'),
				'gelar' => $this->input->post('gelar'),
				'tahun_lulus' => $this->input->post('tahun_lulus')
				);

			$this->m_operator->insertAllData('dosen_pendidikan', $dosen);

			redirect($this->uri->uri_string());

		}

		// EDIT DATA PENDIDIKAN DOSEN
		$editPendidikan = $this->input->post('editPendidikanDosen');

		if (isset($editPendidikan)) {
			$dosen = array (
				'jenjang' => $this->input->post('jenjang'),
				'perguruan_tinggi' => $this->input->post('perguruan_tinggi'),
				'fakultas' => $this->input->post('fakultas'),
				'program_studi' => $this->input->post('program_studi'),
				'ipk' => $this->input->post('ipk'),
				'gelar' => $this->input->post('gelar'),
				'tahun_lulus' => $this->input->post('tahun_lulus')
				);

			$this->m_operator->updateData('dosen_pendidikan', $dosen, array('id' => $this->input->post('id')));

			redirect($this->uri->uri_string());
		}

		// HAPUS DATA PENDIDIKAN
		$deletePendidikan = $this->input->post('hapusDataPendidikan');
		if (isset($deletePendidikan)) {
			$this->m_operator->deleteData('dosen_pendidikan', array('id' => $this->input->post('id')));

			redirect($this->uri->uri_string());			
		}

		// ADD DATA PENELITIAN DOSEN
		$addPenelitian = $this->input->post('tambahPenelitianDosen');

		if (isset($addPenelitian)) {
			$dosen = array (
				'nidn' => $this->input->post('nidn'),
				'judul_penelitian' => $this->input->post('judul_penelitian'),
				'bidang_ilmu' => $this->input->post('bidang_ilmu'),
				'lembaga' => $this->input->post('lembaga'),
				'penerbit' => $this->input->post('penerbit'),
				'tahun' => $this->input->post('tahun')
				);

			$this->m_operator->insertAllData('dosen_penelitian', $dosen);

			redirect($this->uri->uri_string());

		}

		// EDIT DATA PENELITIAN DOSEN
		$editPenelitian = $this->input->post('editPenelitianDosen');

		if (isset($editPenelitian)) {
			$dosen = array (
				'judul_penelitian' => $this->input->post('judul_penelitian'),
				'bidang_ilmu' => $this->input->post('bidang_ilmu'),
				'lembaga' => $this->input->post('lembaga'),
				'penerbit' => $this->input->post('penerbit'),
				'tahun' => $this->input->post('tahun')
				);

			$this->m_operator->updateData('dosen_penelitian', $dosen, array('id' => $this->input->post('id')));

			redirect($this->uri->uri_string());
		}

		// HAPUS DATA PENELITIAN
		$deletePenelitian = $this->input->post('hapusDataPenelitian');
		if (isset($deletePenelitian)) {
			$this->m_operator->deleteData('dosen_penelitian', array('id' => $this->input->post('id')));

			redirect($this->uri->uri_string());			
		}
	}


// PERWALIAN

	function perwalian()
	{

		// $user_akun = $this->m_operator->getOperator($this->session->userdata('username'));
		// $session = $this->session->userdata('login_in');

		// $search = $this->input->post('search');

		// if (isset($search)) {
			
		// } else {
		// 	$statusperwalian = $this->m_operator->getPerwalianMhs();
		// }

		//pagination
		$total = $this->m_operator->getAllData('status_perwalian', array('tahun_ajaran' => $this->session->tahun_ajaran))->num_rows();
		$limit = 20;
		$url = 'operator/perwalian';
		$config = $this->configPagination($total, $limit, $url);
		//-------

		$data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;		

		$user_akun = $this->m_operator->getOperator($this->session->userdata('username'));
		$session = $this->session->userdata('login_in');

		//SEARCH 
		$search = $this->input->post('search');

		if (isset($search)) {
			if ($this->input->post('search_key') == null) {
				$statusperwalian = $this->m_operator->getPerwalianMhs(null, $limit, $data['page']);
				$data['link'] = $this->pagination->create_links();
			} else {
				$statusperwalian = $this->m_operator->getPerwalianMhs(array($this->input->post('search_category') => $this->input->post('search_key')));
			}
		} else {
			$statusperwalian = $this->m_operator->getPerwalianMhs(null, $limit, $data['page']);
			$data['link'] = $this->pagination->create_links();
		}

		$data['user'] = $user_akun;
		$data['role'] = $this->session->role;
		$data['statusperwalian'] = $statusperwalian;

		if ($session == TRUE) {
			$this->load->view('header', $data);
			$this->load->view('sidenav', $data);
			$this->load->view('operator/perwalian', $data);
			$this->load->view('operator/modal', $data);
			$this->load->view('footer');
		} else {
			redirect('login', 'refresh');
		}


	}


	function jadwal()
	{
		$user_akun = $this->m_operator->getOperator($this->session->userdata('username'));
		$session = $this->session->userdata('login_in');
		$jadwal = $this->m_operator->getDataOrder('jadwal', array('kode_prodi' => $this->session->kode_prodi, 'tahun_ajaran' => $this->session->tahun_ajaran), array('semester' => 'ASC', 'kode_matkul' => 'ASC', 'kelas' => 'ASC'))->result_array();
		$matkul = $this->m_operator->getDataWhere('matakuliah', array('kode_prodi' => $this->session->kode_prodi));
		$semester = $this->m_operator->getDistinctData('jadwal', 'semester')->result_array();
		$periode = substr($this->session->tahun_ajaran, 4);
		$kdprodi = strtolower($this->session->kode_prodi);

		if ($periode % 2) {
		    $ta = 'ganjil';
		} else {
		    $ta = 'genap';
		}

		$data['user'] = $user_akun;
		$data['role'] = $this->session->role;
		$data['matkul_modal'] = $this->m_operator->getDataWhere('matakuliah', array('kode_prodi' => strtolower($this->session->kode_prodi), 'periode' => $ta));
		$data['dosen_modal'] = $dosen = $this->m_operator->getLeftJoinDosen('dosen_'.$kdprodi);    
		$data['jadwal'] = $jadwal;
		$data['semester'] = $semester;
		$data['prodi'] = $this->m_operator->getDataUser('program_studi', array('kode_prodi' => $this->session->kode_prodi));

		if ($session == TRUE) {
			$this->load->view('header', $data);
			$this->load->view('sidenav', $data);
			$this->load->view('operator/jadwal', $data);
			$this->load->view('operator/modal', $data);
			$this->load->view('footer');
		} else {
			redirect('login', 'refresh');
		}

		//ADD JADWAL
		$submit_jadwal = $this->input->post('tambahJadwal');

		if (isset($submit_jadwal)) {
			// $waktu = $this->input->post('waktuMulai').' - '.$this->input->post('waktuSelesai');
			$tdata = explode(",", $this->input->post('kode_matkul'));
			$tdosen = explode("-", $this->input->post('nidn'));
			$jadwal = array (
				'kode_matkul' => $tdata[0],
				'nama_matkul' => $tdata[2],
				'sks' => $tdata[1],
				'nidn' => $tdosen[0],
				'nama_dosen' => $tdosen[1],
				'kelas' => $this->input->post('kelas'),
				'hari' => $this->input->post('hari'),
				'waktu' => $this->input->post('waktu'),
				'ruangan' => $this->input->post('ruangan'),
				'semester' => $tdata[3],
				'tahun_ajaran' => $this->session->tahun_ajaran,
				'kode_prodi' => $this->session->kode_prodi
				);

			$this->m_operator->insertAllData('jadwal', $jadwal);

			redirect($this->uri->uri_string());
			
		}

		//HAPUS JADWAL
		$hapus = $this->input->post('hapusJadwal');

		if (isset($hapus)) {
			$this->m_operator->deleteData('jadwal', array('id_jadwal' => $this->input->post('id_jadwal')));
			redirect($this->uri->uri_string());
		}
	}

	function matakuliah()
	{
		$user_akun = $this->m_operator->getOperator($this->session->userdata('username'));
		// $session = $this->session->userdata('login_in');
		$jadwal = $this->m_operator->getDataOrder('jadwal', array('kode_prodi' => $this->session->kode_prodi, 'tahun_ajaran' => $this->session->tahun_ajaran), array('semester' => 'ASC', 'kode_matkul' => 'ASC', 'kelas' => 'ASC'))->result_array();
		$matkul = $this->m_operator->getDataWhere('matakuliah', array('kode_prodi' => $this->session->kode_prodi));
		$semester = $this->m_operator->getDistinctData('jadwal', 'semester')->result_array();

		$data['user'] = $user_akun;

		$data['role'] = $this->session->role;

		$data['jadwal'] = $jadwal;
		$data['semester'] = $semester;
		$data['prodi'] = $this->m_operator->getDataUser('program_studi', array('kode_prodi' => $this->session->kode_prodi));

		$this->checkSession('matakuliah', $data);
	}

	function detailmatakuliah($kode_matkul, $nama_matkul, $kelas, $nidn, $id_jadwal)
	{
		$nidn = $this->encrypt->decode($nidn);
		$kode_matkul = $this->encrypt->decode($kode_matkul);
		$nama_matkul = $this->encrypt->decode($nama_matkul);
		$kelas = $this->encrypt->decode($kelas);
		// $user_akun = $this->m_operator->getDataUser('dosen', array('nidn' => $nidn));
		$dosen = $this->m_operator->getAllData('dosen', array('nidn' => $nidn))->result_array();
		$user_akun = $this->m_operator->getOperator($this->session->userdata('username'));
		$session = $this->session->userdata('login_in');
		$jadwal = $this->m_operator->getDataOrder('perwalian', array('kode_matkul' => $kode_matkul, 'kelas' => $kelas, 'tahun_ajaran' => $this->session->tahun_ajaran), array('log' => 'ASC'))->result_array();
		$matkul = $this->m_operator->getDataUser('jadwal', array('id_jadwal' => $this->encrypt->decode($id_jadwal)));

		$data['user'] = $user_akun;
		$data['role'] = $this->session->role;
		$data['jadwal'] = $jadwal;
		$data['nama_matkul'] = $nama_matkul;
		$data['matkul'] = $matkul;
		$data['kelas'] = $kelas;
		$data['dosen'] = $dosen;

		$this->checkSession('detailMatakuliah', $data);
	}


}