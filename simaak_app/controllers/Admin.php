<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('m_admin');
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

	function set_view($url, $data)
	{

		$session = $this->session->userdata('login_in');

		if ($session == TRUE  && $this->session->role == 0) {
			$this->load->view('header', $data);
			$this->load->view('sidenav', $data);
			$this->load->view('admin/'.$url, $data);
			$this->load->view('admin/modal', $data);
			$this->load->view('footer');
		} else {
			redirect('login', 'refresh');
		}
	}

	function index()
	{
		$user_akun = $this->m_admin->getAllData('staf', array('username' => $this->session->username))->result_array();
		$session = $this->session->userdata('login_in');

		$data['user'] = $user_akun[0];

		$data['role'] = $this->session->role;
	
		$this->set_view('home', $data);

		// $this->session->sess_destroy();
		// redirect('login', 'refresh');
	}

	function dosen()
	{
		//pagination
		$total = $this->m_admin->getAllData('dosen')->num_rows();
		$limit = 10;
		$url = 'admin/dosen';
		$config = $this->configPagination($total, $limit, $url);
		//-------

		$data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;		

		$user_akun = $this->m_admin->getAllData('staf', array('username' => $this->session->userdata('username')))->result_array();
		$session = $this->session->userdata('login_in');

		//SEARCH 
		$search = $this->input->post('search');

		// $kdprodi = strtolower($this->session->kode_prodi);
		// $alldosen = $this->m_operator->getSisaDosen('dosen_'.$kdprodi);

		if (isset($search)) {
			if ($this->input->post('search_key') == null) {
				$dosen = $this->m_admin->getAllData('dosen', null, array('nidn' => 'ASC'), $limit, $data['page'])->result_array();	
				$data['link'] = $this->pagination->create_links();
			} else {
				$dosen = $this->m_admin->searchData('dosen', array($this->input->post('search_category') => $this->input->post('search_key')))->result_array();
			}
		} else {
			$dosen = $this->m_admin->getAllData('dosen', null, array('nidn' => 'ASC'), $limit, $data['page'])->result_array();	
			$data['link'] = $this->pagination->create_links();
		}
		// if (isset($search)) {
		// 	if ($this->input->post('search_key') == null) {
		// 		$dosen = $this->m_operator->getLeftJoinDosen('dosen_'.$kdprodi, array('status_dosen' => 'ASC'), $limit, $data['page']);	
		// 		$data['link'] = $this->pagination->create_links();
		// 	} else {
		// 		$dosen = $this->m_operator->searchDataJoin('dosen_'.$kdprodi, $this->input->post('search_key'), $this->input->post('search_category'));
		// 	}
		// } else {
		// 	$dosen = $this->m_operator->getLeftJoinDosen('dosen_'.$kdprodi, array('status_dosen' => 'ASC'), $limit, $data['page']);	
		// 	$data['link'] = $this->pagination->create_links();
		// }
		
		// $dosen = $this->m_operator->getAllData('dosen')->result_array();
		// $prodi = $this->m_operator->getDataUser('program_studi', array('kode_prodi' => $this->session->kode_prodi));
		

		$data['user'] = $user_akun[0];
		// $data['mhs'] = $mhs;
		$data['dosen'] = $dosen;
		$data['role'] = $this->session->role;
		// $data['prodi'] = $prodi;
		// $data['alldosen'] = $alldosen;
		// $data['link'] = $this->pagination->create_links();
		$data['total'] = $total;

		$this->set_view('dosen', $data);

		//TAMBAH DATA DOSEN
		$tambah = $this->input->post('tambahDosenAdmin');	

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
				'jenis_dosen' => $this->input->post('jenis_dosen'),
				'jabatan_struktural' => $this->input->post('jabatan_struktural')
				);

			$this->m_admin->insertDosen($account, $dosen);
			redirect($this->uri->uri_string());
		}

		//HAPUS DATA DOSEN
		$hapus = $this->input->post('hapusDosen');

		if (isset($hapus)) {
			$this->m_admin->deleteData('account', array('username' => $this->input->post('nidn')));
			redirect($this->uri->uri_string());
		}
	}

	function mahasiswa()
	{
		//pagination
		$total = $this->m_admin->getAllData('mhs')->num_rows();
		$limit = 20;
		$url = 'admin/mahasiswa';
		$config = $this->configPagination($total, $limit, $url);
		//-------

		$data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;		

		$user_akun = $this->m_admin->getAllData('staf', array('username' => $this->session->username))->result_array();

		//SEARCH 
		$search = $this->input->post('search');
		// $kdprodi = $this->encrypt->decode($kdprodi);
		if (isset($search)) {
			if ($this->input->post('search_key') == null) {
				$mhs = $this->m_admin->getAllData('mhs', null, array('nim' => 'ASC'), $limit, $data['page'])->result_array();	
				$data['link'] = $this->pagination->create_links();
			} else {
				$mhs = $this->m_admin->searchData('mhs', array($this->input->post('search_category') => $this->input->post('search_key')))->result_array();
			}
		} else {
			$mhs = $this->m_admin->getAllData('mhs', null, array('nim' => 'ASC'), $limit, $data['page'])->result_array();	
			$data['link'] = $this->pagination->create_links();
		}
		
		// $dosen = $this->m_admin->getAllData('dosen', array('kode_prodi' => $this->session->kode_prodi))->result_array();
		// $prodi = $this->m_operator->getDataUser('program_studi', array('kode_prodi' => $this->session->kode_prodi));
		$prodi = '';

		// switch ($kdprodi) {
		// 	case 'es':
		// 		$prodi = 'Ekonomi Syariah';
		// 		break;
		// 	case 'mpi':
		// 		$prodi = 'Manajemen Pendidikan Islam';
		// 		break;
		// 	case 'pbs':
		// 		$prodi = 'Perbankan Syariah';
		// 		break;
		// }

		$data['user'] = $user_akun[0];
		$data['mhs'] = $mhs;
		// $data['dosen'] = $dosen;
		$data['role'] = $this->session->role;
		// $data['prodi'] = $prodi;
		// $data['link'] = $this->pagination->create_links();

		$this->set_view('mahasiswa', $data);
	}




}