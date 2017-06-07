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

	function configImage($url)
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

		if ($session == TRUE && $this->session->role == 2) {
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
		$riwayat_penelitian = $this->m_dosen->getDataOrder('dosen_penelitian', array('nidn' => $this->session->username), array('tahun_ajaran' => 'DESC'));

		$data['error'] = $this->upload->display_errors();

		$data['user'] = $user_akun;
		$data['alamat'] = $user_alamat;
		$data['pendidikan'] = $riwayat_pendidikan->result_array();
		$data['penelitian'] = $riwayat_penelitian->result_array();

		$data['role'] = $this->session->role;
		$data['prodi'] = $this->m_dosen->getDataUser('program_studi', array('kode_prodi' => $this->session->kode_prodi));

		if ($session == TRUE && $this->session->role == 2) {
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
				'jenjang' => $this->input->post('jenjang'),
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

		// ADD & EDIT IJAZAH
		$addIjazah = $this->input->post('tambahIjazahDosen');
		$editIjazah = $this->input->post('editIjazahDosen');

		if (isset($addIjazah) || isset($editIjazah)) {
			$img_path = $this->input->post('img');

			$this->configDokumen();

			if (!$this->upload->do_upload('ijazah')) {
				redirect($this->uri->uri_string());			
			} else {

			$docinfo = $this->upload->data();

			$dosen = array (
				'ijazah' => $docinfo['file_name']
				);

			$this->m_dosen->updateDokumen('dosen_pendidikan', $dosen, $this->input->post('id'));
			@unlink("./assets/uploads/documents/dosen/". $img_path);
			redirect($this->uri->uri_string());			
			}
		}

		// ADD & EDIT TRANSKRIP
		$addTranskrip = $this->input->post('tambahTranskripDosen');
		$editTranskrip = $this->input->post('editTranskripDosen');

		if (isset($addTranskrip) || isset($editTranskrip)) {
			$img_path = $this->input->post('img');

			$this->configDokumen();

			if (!$this->upload->do_upload('transkrip')) {
				redirect($this->uri->uri_string());			
			} else {

			$docinfo = $this->upload->data();

			$dosen = array (
				'transkrip' => $docinfo['file_name']
				);

			$this->m_dosen->updateDokumen('dosen_pendidikan', $dosen, $this->input->post('id'));
			@unlink("./assets/uploads/documents/dosen/". $img_path);
			redirect($this->uri->uri_string());			
			}
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

		if ($session == TRUE && $this->session->role == 2) {
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
				'jenjang' => $this->input->post('jenjang'),
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
				'jenjang' => $this->input->post('jenjang'),
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

		$riwayat_pengajaran = $this->m_dosen->getDataOrder('dosen_pengajaran', array('nidn' => $this->session->username), array('tahun_ajaran' => 'DESC', 'id' => 'DESC'));

		$data['user'] = $user_akun;
		$data['pengajaran'] = $riwayat_pengajaran->result_array();

		$data['role'] = $this->session->role;

		if ($session == TRUE && $this->session->role == 2) {
			$this->load->view('header', $data);
			$this->load->view('sidenav', $data);
			$this->load->view('dosen/pengajaran', $data);
			$this->load->view('dosen/modal', $data);
			$this->load->view('footer');
		} else {
			redirect('login', 'refresh');
		}

		//ADD DATA PENGAJARAN
		$addPengajaran = $this->input->post('tambahPengajaranDosen');
		
		if (isset($addPengajaran)) {
			$datapengajaran = array(
				'nidn' => $this->input->post('nidn'),
				'jenis_kegiatan' => $this->input->post('jenis_kegiatan'),
				'bukti_penugasan' => $this->input->post('bukti_penugasan'),
				'sks_beban_kerja' => $this->input->post('sks_beban_kerja'),
				'masa_penugasan' => $this->input->post('masa_penugasan'),
				'bukti_dokumen' => $this->input->post('bukti_dokumen'),
				'sks_kinerja' => $this->input->post('sks_kinerja'),
				'rekomendasi' => $this->input->post('rekomendasi'),
				'tahun_ajaran' => $this->session->tahun_ajaran
			);

			$this->m_dosen->insertAllData('dosen_pengajaran', $datapengajaran);

			redirect($this->uri->uri_string());
		}

		//EDIT DATA PENGAJARAN
		$editPengajaran = $this->input->post('editPengajaranDosen');
		if (isset($editPengajaran)) {
			$dataEditPengajaran = array (
				'jenis_kegiatan' => $this->input->post('jenis_kegiatan'),
				'bukti_penugasan' => $this->input->post('bukti_penugasan'),
				'sks_beban_kerja' => $this->input->post('sks_beban_kerja'),
				'masa_penugasan' => $this->input->post('masa_penugasan'),
				'bukti_dokumen' => $this->input->post('bukti_dokumen'),
				'sks_kinerja' => $this->input->post('sks_kinerja'),
				'rekomendasi' => $this->input->post('rekomendasi')
			);

			$this->m_dosen->updateDokumen('dosen_pengajaran', $dataEditPengajaran, $this->input->post('id'));

			redirect($this->uri->uri_string());
		}

		//DELETE DATA PENGAJARAN
		$deletePengajaran = $this->input->post('hapusDataPengajaran');

		if (isset($deletePengajaran)) {
			$hapus = array('id' => $this->input->post('id'));

			$this->m_dosen->deleteData('dosen_pengajaran', $hapus);			
			redirect($this->uri->uri_string());	
		}

	}


// MENU PENELITIAN ----------------------------------
	function penelitian()
	{
		$user_akun = $this->m_dosen->getDosen($this->session->userdata('username'));
		$user_alamat = $this->m_dosen->getDataUser('dosen_alamat', array('nidn' => $this->session->userdata('username')));
		$session = $this->session->userdata('login_in');
		
		$riwayat_penelitian = $this->m_dosen->getDataOrder('dosen_penelitian', array('nidn' => $this->session->username), array('tahun_ajaran' => 'DESC', 'id' => 'DESC'));

		$data['user'] = $user_akun;
		$data['penelitian'] = $riwayat_penelitian->result_array();

		$data['role'] = $this->session->role;

		if ($session == TRUE && $this->session->role == 2) {
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
				'jenis_kegiatan' => $this->input->post('jenis_kegiatan'),
				'bukti_penugasan' => $this->input->post('bukti_penugasan'),
				'sks_beban_kerja' => $this->input->post('sks_beban_kerja'),
				'masa_penugasan' => $this->input->post('masa_penugasan'),
				'bukti_dokumen' => $this->input->post('bukti_dokumen'),
				'sks_kinerja' => $this->input->post('sks_kinerja'),
				'rekomendasi' => $this->input->post('rekomendasi'),
				'tahun_ajaran' => $this->session->tahun_ajaran
				);

			$this->m_dosen->insertAllData('dosen_penelitian', $dosen);

			redirect($this->uri->uri_string());

		}

		// EDIT DATA PENELITIAN DOSEN
		$editPenelitian = $this->input->post('editPenelitianDosen');

		if (isset($editPenelitian)) {
			$dosen = array (
				'jenis_kegiatan' => $this->input->post('jenis_kegiatan'),
				'bukti_penugasan' => $this->input->post('bukti_penugasan'),
				'sks_beban_kerja' => $this->input->post('sks_beban_kerja'),
				'masa_penugasan' => $this->input->post('masa_penugasan'),
				'bukti_dokumen' => $this->input->post('bukti_dokumen'),
				'sks_kinerja' => $this->input->post('sks_kinerja'),
				'rekomendasi' => $this->input->post('rekomendasi')
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
		
		$riwayat_pengabdian = $this->m_dosen->getDataOrder('dosen_pengabdian', array('nidn' => $this->session->username), array('tahun_ajaran' => 'DESC', 'id' => 'DESC'));

		$data['user'] = $user_akun;
		$data['pengabdian'] = $riwayat_pengabdian->result_array();

		$data['role'] = $this->session->role;

		if ($session == TRUE && $this->session->role == 2) {
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
				'jenis_kegiatan' => $this->input->post('jenis_kegiatan'),
				'bukti_penugasan' => $this->input->post('bukti_penugasan'),
				'sks_beban_kerja' => $this->input->post('sks_beban_kerja'),
				'masa_penugasan' => $this->input->post('masa_penugasan'),
				'bukti_dokumen' => $this->input->post('bukti_dokumen'),
				'sks_kinerja' => $this->input->post('sks_kinerja'),
				'rekomendasi' => $this->input->post('rekomendasi'),
				'tahun_ajaran' => $this->session->tahun_ajaran
				);

			$this->m_dosen->insertAllData('dosen_pengabdian', $dosen);

			redirect($this->uri->uri_string());

		}

		// EDIT DATA PENGABDIAN DOSEN
		$editPengabdian = $this->input->post('editPengabdianDosen');

		if (isset($editPengabdian)) {
			$dosen = array (
				'jenis_kegiatan' => $this->input->post('jenis_kegiatan'),
				'bukti_penugasan' => $this->input->post('bukti_penugasan'),
				'sks_beban_kerja' => $this->input->post('sks_beban_kerja'),
				'masa_penugasan' => $this->input->post('masa_penugasan'),
				'bukti_dokumen' => $this->input->post('bukti_dokumen'),
				'sks_kinerja' => $this->input->post('sks_kinerja'),
				'rekomendasi' => $this->input->post('rekomendasi')
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

// MENU PERWALIAN

	function perwalian()
	{
		$nidn = $this->session->userdata('username');

		$user_akun = $this->m_dosen->getDosen($nidn);
		$session = $this->session->userdata('login_in');
		$statusperwalian = $this->m_dosen->getPerwalianMhs(array('mhs.nidn' => $this->session->username));

		$data['user'] = $user_akun;
		$data['role'] = $this->session->role;
		$data['statusperwalian'] = $statusperwalian;
		$data['totalmhs'] = $this->m_dosen->getAllData('mhs', array('nidn' => $this->session->username))->num_rows();
		$data['mhsblmperwalian'] = $this->m_dosen->getMhsBelumPerwalian($this->session->username);

		if ($session == TRUE && $this->session->role == 2) {
			$this->load->view('header', $data);
			$this->load->view('sidenav', $data);
			$this->load->view('dosen/perwalian', $data);
			$this->load->view('dosen/modal', $data);
			$this->load->view('footer');
		} else {
			redirect('login', 'refresh');
		}
	}

	function validasi_perwalian($nim)
	{
		$nidn = $this->session->userdata('username');
		$key_nim = $this->encrypt->decode($nim);
		$user_akun = $this->m_dosen->getDosen($nidn);
		$session = $this->session->userdata('login_in');
		$perwalianmhs = $this->m_dosen->getAllDataOrder('perwalian', array('nim' => $key_nim), array('kode_matkul' => 'ASC'));
		$statusperwalian = $this->m_dosen->getAllData('status_perwalian', array('nim' => $key_nim))->result_array();


		$data['user'] = $user_akun;
		$data['role'] = $this->session->role;
		$data['perwalianmhs'] = $perwalianmhs;
		$data['statusperwalian'] = $statusperwalian;

		if ($session == TRUE && $this->session->role == 2) {
			$this->load->view('header', $data);
			$this->load->view('sidenav', $data);
			$this->load->view('dosen/validasi_perwalian', $data);
			$this->load->view('dosen/modal', $data);
			$this->load->view('footer');
		} else {
			redirect('login', 'refresh');
		}

		$validasi_dosen = $this->input->post('validasiPerwalianDosen');

		if (isset($validasi_dosen)) {
			$this->m_dosen->updateData('status_perwalian', array('v_dosen' => 'Disetujui'), array('nim' => $this->input->post('nim'), 'tahun_ajaran' => $this->session->tahun_ajaran));

			redirect('dosen/perwalian','refresh');
		}
	}

// MENU MATAKULIAH

	function matakuliah()
	{
		$nidn = $this->session->userdata('username');

		$user_akun = $this->m_dosen->getDosen($nidn);
		$session = $this->session->userdata('login_in');
		$jadwal = $this->m_dosen->getAllDataOrder('jadwal', array('nidn' => $this->session->username, 'tahun_ajaran' => $this->session->tahun_ajaran), array('kode_matkul' => 'ASC'));


		$data['user'] = $user_akun;
		$data['role'] = $this->session->role;
		$data['jadwal'] = $jadwal;

		if ($session == TRUE && $this->session->role == 2) {
			$this->load->view('header', $data);
			$this->load->view('sidenav', $data);
			$this->load->view('dosen/matakuliah', $data);
			$this->load->view('dosen/modal', $data);
			$this->load->view('footer');
		} else {
			redirect('login', 'refresh');
		}
	}

	function detailmatakuliah($kode_matkul, $nama_matkul, $kelas)
	{
		$nidn = $this->session->userdata('username');
		$kode_matkul = $this->encrypt->decode($kode_matkul);
		$nama_matkul = $this->encrypt->decode($nama_matkul);
		$kelas = $this->encrypt->decode($kelas);
		$user_akun = $this->m_dosen->getDosen($nidn);
		$session = $this->session->userdata('login_in');
		$jadwal = $this->m_dosen->getAllDataOrder('perwalian', array('kode_matkul' => $kode_matkul, 'kelas' => $kelas, 'tahun_ajaran' => $this->session->tahun_ajaran), array('log' => 'ASC'));


		$data['user'] = $user_akun;
		$data['role'] = $this->session->role;
		$data['jadwal'] = $jadwal;
		$data['nama_matkul'] = $nama_matkul;
		$data['kelas'] = $kelas;

		if ($session == TRUE && $this->session->role == 2) {
			$this->load->view('header', $data);
			$this->load->view('sidenav', $data);
			$this->load->view('dosen/detailmatakuliah', $data);
			$this->load->view('dosen/modal', $data);
			$this->load->view('footer');
		} else {
			redirect('login', 'refresh');
		}
	}

// MENU RIWAYAT PENGAJARAN ----------------------------------
	function histori()
	{
		$user_akun = $this->m_dosen->getDosen($this->session->userdata('username'));
		$user_alamat = $this->m_dosen->getDataUser('dosen_alamat', array('nidn' => $this->session->userdata('username')));
		$session = $this->session->userdata('login_in');

		$riwayat_pengajaran = $this->m_dosen->getHistoriMatkul($this->session->username)->result_array();

		$data['user'] = $user_akun;
		$data['pengajaran'] = $riwayat_pengajaran;

		$data['role'] = $this->session->role;

		if ($session == TRUE && $this->session->role == 2) {
			$this->load->view('header', $data);
			$this->load->view('sidenav', $data);
			$this->load->view('dosen/riwayat-pengajaran', $data);
			$this->load->view('dosen/modal', $data);
			$this->load->view('footer');
		} else {
			redirect('login', 'refresh');
		}

	}

// MENU NILAI

	function nilai()
	{
		$nidn = $this->session->userdata('username');

		$user_akun = $this->m_dosen->getDosen($nidn);
		$session = $this->session->userdata('login_in');
		$jadwal = $this->m_dosen->getAllDataOrder('jadwal', array('nidn' => $this->session->username, 'tahun_ajaran' => $this->session->tahun_ajaran), array('kode_matkul' => 'ASC'));


		$data['user'] = $user_akun;
		$data['role'] = $this->session->role;
		$data['jadwal'] = $jadwal;

		if ($session == TRUE && $this->session->role == 2) {
			$this->load->view('header', $data);
			$this->load->view('sidenav', $data);
			$this->load->view('dosen/nilai', $data);
			$this->load->view('dosen/modal', $data);
			$this->load->view('footer');
		} else {
			redirect('login', 'refresh');
		}
	}

	function detailnilai($kode_matkul, $nama_matkul, $kelas)
	{
		$nidn = $this->session->userdata('username');
		$kode_matkul = $this->encrypt->decode($kode_matkul);
		$nama_matkul = $this->encrypt->decode($nama_matkul);
		$kelas = $this->encrypt->decode($kelas);
		$user_akun = $this->m_dosen->getDosen($nidn);
		$session = $this->session->userdata('login_in');
		$jadwal = $this->m_dosen->getAllDataOrder('perwalian', array('kode_matkul' => $kode_matkul, 'kelas' => $kelas, 'tahun_ajaran' => $this->session->tahun_ajaran), array('log' => 'ASC'));
		$penilaian = $this->m_dosen->getAllDataOrder('nilai', array('kode_matkul' => $kode_matkul, 'kelas' => $kelas, 'tahun_ajaran' => $this->session->tahun_ajaran), array('nim' => 'ASC'));

		$data['user'] = $user_akun;
		$data['role'] = $this->session->role;
		$data['jadwal'] = $jadwal;
		$data['nama_matkul'] = $nama_matkul;
		$data['kelas'] = $kelas;
		$data['penilaian'] = $penilaian;

		$nilai = $this->input->post('submitNilai');
		if (isset($nilai)) {
			$data = array();

			for ($i=0; $i < count($this->input->post('nim')); $i++) { 
				$data[$i] = array(
					'nim' => $this->input->post('nim')[$i],
					'nama_mhs' => $this->input->post('nama')[$i],
					'kode_matkul' => $this->input->post('kode_matkul')[$i],
					'nama_matkul' => $this->input->post('nama_matkul')[$i],
					'sks' => $this->input->post('sks')[$i],
					'nidn' => $this->input->post('nidn')[$i],
					'nama_dosen' => $this->input->post('nama_dosen')[$i],
					'kelas' => $this->input->post('kelas')[$i],
					'id_jadwal' => $this->input->post('id_jadwal')[$i],
					'semester' => $this->input->post('semester')[$i],
					'semester_mhs' => $this->input->post('semester_mhs')[$i],
					'tahun_ajaran' => $this->input->post('tahun_ajaran')[$i],
					'kode_prodi' => $this->input->post('kode_prodi')[$i],
					'nilai' => $this->input->post('nilai')[$i],
				);
			}

			$this->m_dosen->insertMultipleData('nilai', $data);
			redirect($this->uri->uri_string());
		}

		$editnilai = $this->input->post('editNilaiMahasiswa');

		if (isset($editnilai)) {
			$data = array('nilai' => $this->input->post('nilai'));

			$this->m_dosen->updateData('nilai', $data, array('id' => $this->input->post('id')));
			redirect($this->uri->uri_string());
			// print_r($this->input->post());
		}

		if ($session == TRUE && $this->session->role == 2) {
			$this->load->view('header', $data);
			$this->load->view('sidenav', $data);
			$this->load->view('dosen/detailnilai', $data);
			$this->load->view('dosen/modal', $data);
			$this->load->view('footer');
		} else {
			redirect('login', 'refresh');
		}
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

		if ($session == TRUE && $this->session->role == 2) {
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
		$ortu = $this->m_dosen->getDataUser('mhs_orangtua', array('nim' => $key_nim));
		$profil = $this->m_dosen->getDataUser('mhs_profil', array('nim' => $key_nim));
		$nilai = $this->m_dosen->getMatkulKeseluruhan("'".$key_nim."'")->result_array();

		$data['user'] = $user_akun;
		$data['mhs'] = $mhs;
		$data['alamat'] = $alamat;
		$data['ortu'] = $ortu;
		$data['profil'] = $profil;
		$data['role'] = $this->session->role;
		$data['nilai'] = $nilai;
		
		if ($session == TRUE && $this->session->role == 2) {
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

		if ($session == TRUE && $this->session->role == 2) {
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