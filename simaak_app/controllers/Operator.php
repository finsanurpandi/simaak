<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Operator extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('m_operator');
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


// MENU HOME ----------------------------------
	function index()
	{
		$user_akun = $this->m_operator->getOperator($this->session->userdata('username'));
		// $user_alamat = $this->m_dosen->getAlamatDosen($this->session->userdata('username'));
		$session = $this->session->userdata('login_in');

		$data['user'] = $user_akun;
		// $data['alamat'] = $user_alamat;

		$data['role'] = $this->session->role;

		if ($session == TRUE) {
			$this->load->view('header', $data);
			$this->load->view('sidenav', $data);
			$this->load->view('operator/home', $data);
			$this->load->view('footer');
		} else {
			redirect('login', 'refresh');
		}	
	}


// MENU PROFIL ----------------------------------
	function profil()
	{
		$user_akun = $this->m_operator->getOperator($this->session->userdata('username'));
		$user_alamat = $this->m_operator->getDataUser('operator_alamat', array('username' => $this->session->userdata('username')));
		$session = $this->session->userdata('login_in');

		$data['error'] = $this->upload->display_errors();

		$data['user'] = $user_akun;
		$data['alamat'] = $user_alamat;

		$data['role'] = $this->session->role;
		$data['prodi'] = $this->m_operator->getDataUser('program_studi', array('kode_prodi' => $this->session->kode_prodi));

		if ($session == TRUE) {
			$this->load->view('header', $data);
			$this->load->view('sidenav', $data);
			$this->load->view('operator/profil', $data);
			$this->load->view('operator/modal', $data);
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

		if (isset($search)) {
			if ($this->input->post('search_key') == null) {
				$dosen = $this->m_operator->getAllData('dosen', array('kode_prodi' => $this->session->kode_prodi),$limit, $data['page'])->result_array();	
				$data['link'] = $this->pagination->create_links();
			} else {
				$dosen = $this->m_operator->searchData('dosen', array('kode_prodi' => $this->session->kode_prodi),$this->input->post('search_key'), $this->input->post('search_category'));
			}
		} else {
			$dosen = $this->m_operator->getAllData('dosen', array('kode_prodi' => $this->session->kode_prodi),$limit, $data['page'])->result_array();	
			$data['link'] = $this->pagination->create_links();
		}
		
		// $dosen = $this->m_operator->getAllData('dosen')->result_array();
		$prodi = $this->m_operator->getDataUser('program_studi', array('kode_prodi' => $this->session->kode_prodi));

		$data['user'] = $user_akun;
		// $data['mhs'] = $mhs;
		$data['dosen'] = $dosen;
		$data['role'] = $this->session->role;
		$data['prodi'] = $prodi;
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
			$nidn = $this->input->post('nidn');

			$account = array (
				'username' => $nidn,
				'password' => md5($nidn),
				'role' => 2,
				'kode_prodi' => $this->input->post('kode_prodi'),
				'status' => 1
				);

			$dosen = array (
				'nidn' => $this->input->post('nidn'),
				'nik' => $this->input->post('nik'),
				'nama' => $this->input->post('nama'),
				'gelar_depan' => $this->input->post('gelar_depan'),
				'gelar_belakang' => $this->input->post('gelar_belakang'),
				'kode_prodi' => $this->input->post('kode_prodi'),
				'jenis_kelamin' => $this->input->post('jenis_kelamin'),
				'jabatan_fungsional' => $this->input->post('jabatan_fungsional'),
				'golongan' => $this->input->post('golongan'),
				'jabatan_struktural' => $this->input->post('jabatan_struktural')
				);

			$this->m_operator->insertDosen($account, $dosen);
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
		$penelitian = $this->m_operator->getDataOrder('dosen_penelitian', array('nidn' => $key_nidn), array('tahun' => 'DESC'));

		$data['user'] = $user_akun;
		$data['dosen'] = $dosen;
		$data['prodi'] = $prodi;
		$data['jabfung'] = $jabfung;
		$data['golongan'] = $golongan;
		$data['role'] = $this->session->role;
		$data['key'] = $key_nidn;
		$data['nidndosen'] = $dosen['nidn'];
		$data['pendidikan'] = $pendidikan->result_array();
		$data['penelitian'] = $penelitian->result_array();

		if ($session == TRUE) {
			$this->load->view('header', $data);
			$this->load->view('sidenav', $data);
			$this->load->view('operator/detailDosen', $data);
			$this->load->view('operator/modal', $data);
			$this->load->view('footer');
		} else {
			redirect('login', 'refresh');
		}

		//ADD DATA DOSEN
		$submit = $this->input->post('submit');

		if (isset($submit)) {
			$dosen = array (
				'nidn' => $this->input->post('nidn'),
				'nik' => $this->input->post('nik'),
				'nama' => $this->input->post('nama'),
				'gelar_depan' => $this->input->post('gelar_depan'),
				'gelar_belakang' => $this->input->post('gelar_belakang'),
				'jenis_kelamin' => $this->input->post('jenis_kelamin'),
				'jabatan_fungsional' => $this->input->post('jabatan_fungsional'),
				'golongan' => $this->input->post('golongan'),
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

	function jadwal()
	{
		$user_akun = $this->m_operator->getOperator($this->session->userdata('username'));
		$session = $this->session->userdata('login_in');
		$jadwal = $this->m_operator->getDataOrder('jadwal', array('kode_prodi' => $this->session->kode_prodi, 'tahun_ajaran' => $this->session->tahun_ajaran), array('semester' => 'ASC', 'kode_matkul' => 'ASC', 'kelas' => 'ASC'))->result_array();
		$matkul = $this->m_operator->getDataWhere('matakuliah', array('kode_prodi' => $this->session->kode_prodi));
		$semester = $this->m_operator->getDistinctData('jadwal', 'semester')->result_array();

		$data['user'] = $user_akun;

		$data['role'] = $this->session->role;

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

		$submit_jadwal = $this->input->post('tambahJadwal');

		if (isset($submit_jadwal)) {
			// $waktu = $this->input->post('waktuMulai').' - '.$this->input->post('waktuSelesai');

			$jadwal = array (
				'kode_matkul' => $this->input->post('kode_matkul'),
				'nama_matkul' => $this->input->post('nama_matkul'),
				'sks' => $this->input->post('sks'),
				'nidn' => $this->input->post('nidn'),
				'nama_dosen' => $this->input->post('nama_dosen'),
				'kelas' => $this->input->post('kelas'),
				'hari' => $this->input->post('hari'),
				'waktu' => $this->input->post('waktu'),
				'ruangan' => $this->input->post('ruangan'),
				'semester' => $this->input->post('semester'),
				'tahun_ajaran' => $this->session->tahun_ajaran,
				'kode_prodi' => $this->session->kode_prodi
				);

			$this->m_operator->insertAllData('jadwal', $jadwal);

			redirect($this->uri->uri_string());
		}
	}


}