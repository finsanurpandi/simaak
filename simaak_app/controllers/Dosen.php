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
		$config['upload_path']   =   "./assets/uploads/documents/dosen";
		$config['allowed_types'] =   "gif|jpg|jpeg|png|pdf|doc|docx"; 
		$config['max_size']      =   "1000";
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
		$pengumuman = $this->m_dosen->getAllDataOrder('pengumuman', array('role' => $this->session->role, 'status' => 1), array('created', 'DESC'));
		$session = $this->session->userdata('login_in');

		$data['user'] = $user_akun;
		// $data['alamat'] = $user_alamat;
		$data['pengumuman'] = $pengumuman;

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
		$user_alamat = $this->m_dosen->getDataUser('dosen_alamat', array('nidn' => $this->session->userdata('username')));
		$session = $this->session->userdata('login_in');
		// $riwayat_pendidikan = $this->m_dosen->getAllData('dosen_pendidikan', array('nidn' => $this->session->username));
		// $riwayat_penelitian = $this->m_dosen->getAllData('dosen_penelitian', array('nidn' => $this->session->username));
		$riwayat_pendidikan = $this->m_dosen->getDataOrder('dosen_pendidikan', array('nidn' => $this->session->username), array('tahun_lulus' => 'DESC'));
		$riwayat_penelitian = $this->m_dosen->getDataOrder('dosen_penelitian', array('nidn' => $this->session->username), array('tahun' => 'DESC'));

		$data['error'] = $this->upload->display_errors();

		$data['user'] = $user_akun;
		$data['alamat'] = $user_alamat;
		$data['pendidikan'] = $riwayat_pendidikan->result_array();
		$data['penelitian'] = $riwayat_penelitian->result_array();

		$data['role'] = $this->session->role;
		$data['prodi'] = $this->m_dosen->getDataUser('program_studi', array('kode_prodi' => $this->session->kode_prodi));

		if ($session == TRUE) {
			$this->load->view('header', $data);
			$this->load->view('sidenav', $data);
			$this->load->view('dosen/profil', $data);
			$this->load->view('dosen/modal', $data);
			$this->load->view('footer');
		} else {
			redirect('login', 'refresh');
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

			$this->m_dosen->insertAllData('dosen_pendidikan', $dosen);

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

			$this->m_dosen->updateData('dosen_pendidikan', $dosen, array('id' => $this->input->post('id')));

			redirect($this->uri->uri_string());
		}

		// HAPUS DATA PENDIDIKAN
		$deletePendidikan = $this->input->post('hapusDataPendidikan');
		if (isset($deletePendidikan)) {
			$this->m_dosen->deleteData('dosen_pendidikan', array('id' => $this->input->post('id')));

			redirect($this->uri->uri_string());			
		}
	}


// MENU PENDIDIKAN ----------------------------------
	function pendidikan()
	{
		$user_akun = $this->m_dosen->getDosen($this->session->userdata('username'));
		$user_alamat = $this->m_dosen->getDataUser('dosen_alamat', array('nidn' => $this->session->userdata('username')));
		$session = $this->session->userdata('login_in');
		// $riwayat_pendidikan = $this->m_dosen->getAllData('dosen_pendidikan', array('nidn' => $this->session->username));
		// $riwayat_penelitian = $this->m_dosen->getAllData('dosen_penelitian', array('nidn' => $this->session->username));
		$riwayat_pendidikan = $this->m_dosen->getDataOrder('dosen_pendidikan', array('nidn' => $this->session->username), array('tahun_lulus' => 'DESC'));

		$data['user'] = $user_akun;
		$data['pendidikan'] = $riwayat_pendidikan->result_array();

		$data['role'] = $this->session->role;

		if ($session == TRUE) {
			$this->load->view('header', $data);
			$this->load->view('sidenav', $data);
			$this->load->view('dosen/pendidikan', $data);
			$this->load->view('dosen/modal', $data);
			$this->load->view('footer');
		} else {
			redirect('login', 'refresh');
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

			$this->m_dosen->insertAllData('dosen_pendidikan', $dosen);

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

			$this->m_dosen->updateData('dosen_pendidikan', $dosen, array('id' => $this->input->post('id')));

			redirect($this->uri->uri_string());
		}

		// HAPUS DATA PENDIDIKAN
		$deletePendidikan = $this->input->post('hapusDataPendidikan');
		if (isset($deletePendidikan)) {
			$this->m_dosen->deleteData('dosen_pendidikan', array('id' => $this->input->post('id')));

			redirect($this->uri->uri_string());			
		}
	}

// MENU PENGAJARAN ----------------------------------
	function pengajaran()
	{
		$user_akun = $this->m_dosen->getDosen($this->session->userdata('username'));
		$user_alamat = $this->m_dosen->getDataUser('dosen_alamat', array('nidn' => $this->session->userdata('username')));
		$session = $this->session->userdata('login_in');

		$riwayat_pengajaran = $this->m_dosen->getDataOrder('dosen_pengajaran', array('nidn' => $this->session->username), array('tahun_ajaran' => 'DESC'));

		$data['user'] = $user_akun;
		$data['pengajaran'] = $riwayat_pengajaran->result_array();

		$data['role'] = $this->session->role;

		if ($session == TRUE) {
			$this->load->view('header', $data);
			$this->load->view('sidenav', $data);
			$this->load->view('dosen/pengajaran', $data);
			$this->load->view('dosen/modal', $data);
			$this->load->view('footer');
		} else {
			redirect('login', 'refresh');
		}

	}


// MENU PENELITIAN ----------------------------------
	function penelitian()
	{
		$user_akun = $this->m_dosen->getDosen($this->session->userdata('username'));
		$user_alamat = $this->m_dosen->getDataUser('dosen_alamat', array('nidn' => $this->session->userdata('username')));
		$session = $this->session->userdata('login_in');
		
		$riwayat_penelitian = $this->m_dosen->getDataOrder('dosen_penelitian', array('nidn' => $this->session->username), array('tahun' => 'DESC'));

		$data['user'] = $user_akun;
		$data['penelitian'] = $riwayat_penelitian->result_array();

		$data['role'] = $this->session->role;

		if ($session == TRUE) {
			$this->load->view('header', $data);
			$this->load->view('sidenav', $data);
			$this->load->view('dosen/penelitian', $data);
			$this->load->view('dosen/modal', $data);
			$this->load->view('footer');
		} else {
			redirect('login', 'refresh');
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

			$this->m_dosen->insertAllData('dosen_penelitian', $dosen);

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

			$this->m_dosen->updateData('dosen_penelitian', $dosen, array('id' => $this->input->post('id')));

			redirect($this->uri->uri_string());
		}

		// HAPUS DATA PENELITIAN
		$deletePenelitian = $this->input->post('hapusDataPenelitian');
		if (isset($deletePenelitian)) {
			$this->m_dosen->deleteData('dosen_penelitian', array('id' => $this->input->post('id')));

			redirect($this->uri->uri_string());			
		}
	}

// MENU PENGABDIAN ----------------------------------
	function pengabdian()
	{
		$user_akun = $this->m_dosen->getDosen($this->session->userdata('username'));
		
		$session = $this->session->userdata('login_in');
		
		$riwayat_pengabdian = $this->m_dosen->getDataOrder('dosen_pengabdian', array('nidn' => $this->session->username), array('tahun' => 'DESC'));

		$data['user'] = $user_akun;
		$data['pengabdian'] = $riwayat_pengabdian->result_array();

		$data['role'] = $this->session->role;

		if ($session == TRUE) {
			$this->load->view('header', $data);
			$this->load->view('sidenav', $data);
			$this->load->view('dosen/pengabdian', $data);
			$this->load->view('dosen/modal', $data);
			$this->load->view('footer');
		} else {
			redirect('login', 'refresh');
		}

		// ADD DATA PENGABDIAN DOSEN
		$addPengabdian = $this->input->post('tambahPengabdianDosen');

		if (isset($addPengabdian)) {
			$dosen = array (
				'nidn' => $this->input->post('nidn'),
				'program' => $this->input->post('program'),
				'judul' => $this->input->post('judul'),
				'anggota' => $this->input->post('anggota'),
				'tahun' => $this->input->post('tahun')
				);

			$this->m_dosen->insertAllData('dosen_pengabdian', $dosen);

			redirect($this->uri->uri_string());

		}

		// EDIT DATA PENGABDIAN DOSEN
		$editPengabdian = $this->input->post('editPengabdianDosen');

		if (isset($editPengabdian)) {
			$dosen = array (
				'program' => $this->input->post('program'),
				'judul' => $this->input->post('judul'),
				'anggota' => $this->input->post('anggota'),
				'tahun' => $this->input->post('tahun')
				);

			$this->m_dosen->updateData('dosen_pengabdian', $dosen, array('id' => $this->input->post('id')));

			redirect($this->uri->uri_string());
		}

		// HAPUS DATA PENGABDIAN
		$deletePengabdian = $this->input->post('hapusDataPengabdian');
		if (isset($deletePengabdian)) {
			$this->m_dosen->deleteData('dosen_pengabdian', array('id' => $this->input->post('id')));

			redirect($this->uri->uri_string());			
		}
	}


// EDIT PICTURE -------------------------------
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

			unlink("./assets/uploads/profiles/". $img_path);
			redirect('dosen/profil', 'refresh');
		}
 
			
	}

// UBAH PASSWORD ------------------------------
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


// MENU DOKUMEN ----------------------------------

	function dokumen()
	{
		$user_akun = $this->m_dosen->getDosen($this->session->userdata('username'));
		$session = $this->session->userdata('login_in');
		
		$dokumen = $this->m_dosen->getDataOrder('dosen_dokumen', array('nidn' => $this->session->username), array('id' => 'DESC'));

		$data['user'] = $user_akun;
		$data['dokumen'] = $dokumen->result_array();
		$data['error'] = $this->upload->display_errors();

		$data['role'] = $this->session->role;

		if ($session == TRUE) {
			$this->load->view('header', $data);
			$this->load->view('sidenav', $data);
			$this->load->view('dosen/dokumen', $data);
			$this->load->view('dosen/modal', $data);
			$this->load->view('footer');
		} else {
			redirect('login', 'refresh');
		}

		// HAPUS DATA PENGABDIAN
		$deleteDokumen = $this->input->post('hapusDataDokumen');
		if (isset($deleteDokumen)) {

			$id = $this->input->post('id');
			$img_path = $this->input->post('nama');

			unlink("./assets/uploads/documents/dosen/". $img_path);

			$this->m_dosen->deleteData('dosen_dokumen', array('id' => $this->input->post('id')));

			redirect($this->uri->uri_string());	
		}
	}

	function addDocument()
	{
			$this->configDokumen();

			if (!$this->upload->do_upload('gambar')) {
				redirect('dosen/dokumen', 'refresh');
			} else {

			$docinfo = $this->upload->data();

			$dosen = array (
				'nidn' => $this->input->post('nidn'),
				'judul_file' => $this->input->post('judul_file'),
				'nama_file' => $docinfo['file_name']
				);

			$this->m_dosen->insertAllData('dosen_dokumen', $dosen);

			redirect('dosen/dokumen', 'refresh');
			}
	}

	function editdocument()
	{
		$id = $this->input->post('id');
		$img_path = $this->input->post('nama');

		$this->configDokumen();


			if (!$this->upload->do_upload('gambar')) {
				$data = array (
				'judul_file' => $this->input->post('judul_file'),
				);

				$this->m_dosen->updateDokumen('dosen_dokumen', $data, $id);
				redirect('dosen/dokumen', 'refresh');
				
			} else {

				$fileinfo = $this->upload->data();

				$data = array (
					'judul_file' => $this->input->post('judul_file'),
					'nama_file' => $fileinfo['file_name']
					);

				$this->m_dosen->updateDokumen('dosen_dokumen', $data, $id);

				unlink("./assets/uploads/documents/dosen/". $img_path);
				redirect('dosen/dokumen', 'refresh');
				echo $this->upload->display_errors();
			}

	}




}