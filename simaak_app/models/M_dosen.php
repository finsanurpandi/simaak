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

	// function getAllData($table, $limit = null, $offset = null)
	// {
	// 	if (($limit !== null) && ($offset !== null)) {
	// 		$query = $this->db->get($table, $limit, $offset);
	// 	} else {
	// 		$query = $this->db->get($table);	
	// 	}
		

	// 	return $query;
	// }

	function getDataMahasiswa($table, $nidn, $limit = null, $offset = null)
	{
		if (($limit !== null) && ($offset !== null)) {
			$query = $this->db->get_where($table, $nidn, $limit, $offset);
		} else {
			$query = $this->db->get_where($table, $nidn);
		}

		return $query;
	}

	function getDataUser ($table, $where)
	{
		$query = $this->db->get_where($table, $where, null, null);

		$query = $query->result_array();

		if ($query) {
			return $query[0];
		}
	}

	function searchData ($table, $nidn, $key, $row)
	{
		$this->db->like($row, $key);
		$query = $this->db->get_where($table, $nidn);

		$query = $query->result_array();

		return $query;
	}

	function updateProfileImage($data, $user)
	{
		$this->db->where('nidn', $user);
		$this->db->update($this->dosen, $data);
	}

	function updatePassword($data, $user)
	{
		$this->db->where('username', $user);
		$this->db->update($this->account, $data);
	}
}
