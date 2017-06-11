<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cetak extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('m_mahasiswa');
		$this->load->model('m_operator');
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

		$datanilai = $this->m_mahasiswa->getAllData('nilai', array('nim' => $user, 'tahun_ajaran' => $ta))->result_array();	

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

	function cetak_daftar_hadir_kuliah($e_kodematkul, $e_namamatkul, $e_kelas, $e_nidn, $e_idjadwal)
	{
		$nidn = $this->encrypt->decode($e_nidn);
		$kode_matkul = $this->encrypt->decode($e_kodematkul);
		$nama_matkul = $this->encrypt->decode($e_namamatkul);
		$kelas = $this->encrypt->decode($e_kelas);
		$user_akun = $this->m_operator->getDataUser('dosen', array('nidn' => $nidn));
		$session = $this->session->userdata('login_in');
		$jadwal = $this->m_operator->getDataOrder('perwalian', array('kode_matkul' => $kode_matkul, 'kelas' => $kelas, 'tahun_ajaran' => $this->session->tahun_ajaran), array('log' => 'ASC'))->result_array();
		$ta = substr($this->session->tahun_ajaran, 4);
		$matkul = $this->m_operator->getDataUser('jadwal', array('id_jadwal' => $this->encrypt->decode($e_idjadwal)));

		if ($ta % 2) {
			$semester = 'ganjil';
		} else {
			$semester = 'genap';
		}

		$data['user'] = $user_akun;
		$data['role'] = $this->session->role;
		$data['jadwal'] = $jadwal;
		$data['matkul'] = $matkul;
		$data['kelas'] = $kelas;
		$data['semester'] = $semester;

		// margin (left, right, top, bottom)
		$margin = array(10,10,5,10);

		//load_view (view, data, paper_size, margin_array)
		$this->pdf->load_view('cetak/cetak_daftar_hadir_kuliah', $data, 'A4', $margin);

		$filename = 'DHK - '.$kode_matkul.' - '.$nama_matkul.' - '.$kelas.'.pdf';
		$this->pdf->Output($filename, 'I');
	}

	function cetak_kartu_uts()
	{
		$data['hello'] = 'hello';

		
		$pdf = $this->pdf->load();
		$html = $this->load->view('cetak/cetak_tes', $data, TRUE);
		$pdf->AddPage('A5-L', '', '', '', '', 5, 10, 5, 10, 18, 12);
		$pdf->WriteHTML($html);
		$pdf->Output('hello.pdf', 'I');

	}	

	function cetak_test()
	{
		$pdf = $this->pdf->load();
		$html = $this->load->view('cetak/cetak_tes', 'A5', TRUE);
		$pdf->AddPage('L', '', '', '', '', 5, 10, 5, 10, 18, 12);
		$pdf->WriteHTML($html);
		$pdf->Output('hello.pdf', 'I');

	}

}