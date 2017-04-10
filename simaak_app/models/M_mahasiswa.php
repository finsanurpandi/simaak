<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_mahasiswa extends CI_Model {

	function __construct()
	{
		parent::__construct();
		$this->mhs = 'mhs';
		$this->alamat = 'mhs_alamat';
		$this->account = 'account';
	}

	function getMahasiswa ($mhs)
	{
		$query = $this->db->get_where($this->mhs, array('nim' => $mhs));

		$query = $query->result_array();

		if ($query) {
			return $query[0];
		}
	}

	function getAlamatMahasiswa ($mhs)
	{
		$query = $this->db->get_where($this->alamat, array('nim' => $mhs));

		$query = $query->result_array();

		if ($query) {
			return $query[0];
		}
	}

	function updateProfileImage($data, $user)
	{
		$this->db->where('nim', $user);
		$this->db->update($this->mhs, $data);
	}

	function updatePassword($data, $user)
	{
		$this->db->where('username', $user);
		$this->db->update($this->account, $data);
	}
}
