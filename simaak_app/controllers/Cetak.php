<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cetak extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('m_mahasiswa');
		$this->load->library('pdf');
	}

	function do_print($user, $ta)
	{
		
		$data['tes'] = 'Ini print dari HTML ke PDF';
		$data['user'] = $user;
		$data['ta'] = $ta;
		$data['angka'] = array('1', '2', '3');
		$this->pdf->load_view('cetak/cetak-khs', $data);
		$filename = 'Filename.pdf';
		$this->pdf->Output($filename, 'I');
	}

	function cetak_kartu_hadir_kuliah($e_user, $e_matkul, $e_dosen)
	{
		$user = $this->encrypt->decode($e_user);
		$data['user'] = $this->m_mahasiswa->getMahasiswa($user);
		$data['matkul'] = $this->encrypt->decode($e_matkul);
		$data['dosen'] = $this->encrypt->decode($e_dosen);

		// margin (left, right, top, bottom)
		$margin = array(15,15,15,15);

		//load_view (view, data, paper_size, margin_array)
		$this->pdf->load_view('cetak/cetak_kartu_hadir_kuliah', $data, 'A4', $margin);

		$filename = $this->encrypt->decode($e_user).'-'.$this->encrypt->decode($e_matkul).'.pdf';
		$this->pdf->Output($filename, 'I');

	}

	function cetak_kartu_rencana_studi($e_user)
	{
		$user = $this->encrypt->decode($e_user);
		$data['user'] = $this->m_mahasiswa->getMahasiswa($user);

		$data['perwalian'] = $this->m_mahasiswa->getAllData('perwalian', array('nim' => $user, 'tahun_ajaran' => $this->session->tahun_ajaran))->result_array();

		// margin (left, right, top, bottom)
		$margin = array(10,10,5,10);

		//load_view (view, data, paper_size, margin_array)
		$this->pdf->load_view('cetak/cetak_kartu_rencana_studi', $data, 'B5', $margin);

		$filename = $this->encrypt->decode($e_user).'-'.$this->encrypt->decode($e_matkul).'.pdf';
		$this->pdf->Output($filename, 'I');

	}

	function cetak_kartu_hasil_studi($e_user, $e_ta)
	{
		$user = $this->encrypt->decode($e_user);
		$ta = $this->encrypt->decode($e_ta);

		$datanilai = $this->m_mahasiswa->getAllData('nilai', array('nim' => $this->session->username, 'tahun_ajaran' => $ta))->result_array();	

		$data['user'] = $this->m_mahasiswa->getMahasiswa($user);
		$data['nilai'] = $datanilai;



		$pdf = $this->pdf->load('utf-8', 'B5');

		$html = $this->load->view('cetak/cetak_kartu_hasil_studi', $data, TRUE);

		$pdf->WriteHTML($html);

		$filename = $user.'-'.$ta.'.pdf';
		$pdf->Output($filename, 'I');
	}

	function cetak_jadwal_kuliah($e_user)
	{
		$user = $this->encrypt->decode($e_user);
		$jadwal = $this->m_mahasiswa->getJadwalMhs(array('nim' => $this->session->username, 'jadwal.tahun_ajaran' => $this->session->tahun_ajaran));

		$data['user'] = $this->m_mahasiswa->getMahasiswa($user);
		$data['jadwal'] = $jadwal;
		$data['hari'] = array('senin', 'selasa', 'rabu', 'kamis', 'jum\'at', 'sabtu');
		$data['perwalian'] = $this->m_mahasiswa->getAllData('perwalian', array('nim' => $user, 'tahun_ajaran' => $this->session->tahun_ajaran))->result_array();

		// margin (left, right, top, bottom)
		$margin = array(10,10,5,10);

		//load_view (view, data, paper_size, margin_array)
		$this->pdf->load_view('cetak/cetak_jadwal_kuliah', $data, 'A4', $margin);

		$filename = 'Perkuliahan - '.$this->encrypt->decode($e_user).'.pdf';
		$this->pdf->Output($filename, 'I');
	}

	function cetak_test()
	{
		$pdf = $this->pdf->load();
		$html = $this->load->view('cetak/cetak_kartu_rencana_studi', '', TRUE);
		$pdf->WriteHTML($html);
		$pdf->Output('hello', 'I');
	}

}