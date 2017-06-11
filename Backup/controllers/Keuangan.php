<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keuangan extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('m_keuangan');
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

		if ($session == TRUE  && $this->session->role == 5) {
			$this->load->view('header', $data);
			$this->load->view('sidenav', $data);
			$this->load->view('keuangan/'.$url, $data);
			$this->load->view('keuangan/modal', $data);
			$this->load->view('footer');
		} else {
			redirect('login', 'refresh');
		}
	}

	function index()
	{
		$user_akun = $this->m_keuangan->getAllData('staf', array('username' => $this->session->username))->result_array();
		$session = $this->session->userdata('login_in');

		$data['user'] = $user_akun[0];

		$data['role'] = $this->session->role;
	
		$this->set_view('home', $data);

		// $this->session->sess_destroy();
		// redirect('login', 'refresh');
	}

	function pembayaran()
	{
		//pagination
		$total = $this->m_keuangan->getAllData('mhs')->num_rows();
		$limit = 20;
		$url = 'keuangan/pembayaran';
		$config = $this->configPagination($total, $limit, $url);
		//-------

		$data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;		

		$user_akun = $this->m_keuangan->getAllData('staf', array('username' => $this->session->username))->result_array();

		//SEARCH 
		// $search = $this->input->post('search');

		// if (isset($search)) {
		// 	if ($this->input->post('search_key') == null) {
		// 		$mhs = $this->m_operator->getAllData('mhs', array('kode_prodi' => $this->session->kode_prodi), $limit, $data['page'])->result_array();	
		// 		$data['link'] = $this->pagination->create_links();
		// 	} else {
		// 		$mhs = $this->m_operator->searchData('mhs', array('kode_prodi' => $this->session->kode_prodi), $this->input->post('search_key'), $this->input->post('search_category'));
		// 	}
		// } else {
		// 	$mhs = $this->m_operator->getAllData('mhs', array('kode_prodi' => $this->session->kode_prodi), $limit, $data['page'])->result_array();	
		// 	$data['link'] = $this->pagination->create_links();
		// }

		//SEARCH 
		$search = $this->input->post('search');
		if (isset($search)) {
			if ($this->input->post('nimsearch') == null) {
			$mhs = $this->m_keuangan->getAllData('mhs', array('tahun_ajaran' => $this->session->tahun_ajaran), null, $limit, $data['page'])->result_array();
				$data['link'] = $this->pagination->create_links();
			} else {
			$mhs = $this->m_keuangan->searchData('mhs', array('nim' => $this->input->post('nimsearch')))->result_array();
			}
		} else {
			$mhs = $this->m_keuangan->getAllData('mhs', array('tahun_ajaran' => $this->session->tahun_ajaran), null, $limit, $data['page'])->result_array();	
		
			$data['link'] = $this->pagination->create_links();
		}

		
		$data['user'] = $user_akun[0];
		$data['mhs'] = $mhs;
		$data['role'] = $this->session->role;

		$this->set_view('pembayaran', $data);
	}

	function detailPembayaran($nim)
	{
		$nim = $this->encrypt->decode($nim);
		$user_akun = $this->m_keuangan->getAllData('staf', array('username' => $this->session->username))->result_array();
		$mhs = $this->m_keuangan->getAllData('mhs_pembayaran', array('nim' => $nim), array('id' => 'DESC'), null, null)->result_array();

		$datamhs = $this->m_keuangan->getAllData('mhs', array('nim' => $nim), null,null,null)->result_array();

		$data['mhs'] = $mhs;
		$data['datamhs'] = $datamhs;
		$data['user'] = $user_akun[0];
		$data['role'] = $this->session->role;

		$this->set_view('detailPembayaran', $data);	

		//set date
		date_default_timezone_set("Asia/Bangkok");
		$date = new DateTime();
		$tglvalidasi = $date->format('Y-m-d H:i:s');

		//VALIDASI PEMBAYARAN
		$validasi = $this->input->post('submit_validasi');

		if (isset($validasi)) {
			$data1 = array(
				'status' => $this->input->post('status'),
				'persentase' => $this->input->post('persentase'),
				'tgl_validasi' => $tglvalidasi
			);

			$where1 = array('id' => $this->input->post('id'));

			$data2 = array('status_spp' => $this->input->post('persentase'));

			$where2 = array('nim' => $this->input->post('nim'));

			$this->m_keuangan->updateValidasi($data1, $where1, $data2, $where2);
			redirect($this->uri->uri_string());
		}

		//HAPUS VALIDASI
		$hapusvalidasi = $this->input->post('hapusDataValidasi');

		if (isset($hapusvalidasi)) {
			$where = array('id' => $this->input->post('id'));

			$this->m_keuangan->deleteData('mhs_pembayaran', $where);
			redirect($this->uri->uri_string());
		}
	}


}