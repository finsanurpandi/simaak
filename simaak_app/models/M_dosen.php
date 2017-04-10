<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_dosen extends CI_Model {

	function __construct()
	{
		parent::__construct();
		$this->dosen = 'dosen';
		$this->alamat = 'dosen_alamat';
		$this->account = 'account';
	}

	function getDosen ($nidn)
	{
		$query = $this->db->get_where($this->dosen, array('nidn' => $nidn));

		$query = $query->result_array();

		if ($query) {
			return $query[0];
		}
	}

	// function getAlamatDosen ($nidn)
	// {
	// 	$query = $this->db->get_where($this->alamat, array('nidn' => $nidn));

	// 	$query = $query->result_array();

	// 	if ($query) {
	// 		return $query[0];
	// 	}
	// }

	function updateProfileImage($data, $user)
	{
		$this->db->where('nidn', $user);
		$this->db->update($this->mhs, $data);
	}

	function updatePassword($data, $user)
	{
		$this->db->where('username', $user);
		$this->db->update($this->account, $data);
	}
}
