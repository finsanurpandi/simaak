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

	function getDataOrder($table, $where, $orderby)
	{
		foreach ($orderby as $key => $value) {
				$this->db->order_by($key, $value);
			}
		$query = $this->db->get($table);
		

		return $query;
	}

	function getDataUser ($table, $where)
	{
		$query = $this->db->get_where($table, $where);

		$query = $query->result_array();

		if ($query) {
			return $query[0];
		}
	}

	function getAllData($table, $where = null)
	{
		if ($where !== null) {
			$query = $this->db->get_where($table, $where);
		} else {
			$query = $this->db->get($table);
		}

		return $query;
	}

	function getNumRows($table, $where = null)
	{
		if ($where !== null) {
			$query = $this->db->get_where($table, $where);
		} else {
			$query = $this->db->get($table);
		}

		return $query->num_rows();
	}

	function getAllDataOrder($table, $where, $orderby)
	{
		foreach ($orderby as $key => $value) {
				$this->db->order_by($key, $value);
			}

		foreach ($where as $key => $value) {
			$this->db->where($key, $value);
		}

		$query = $this->db->get($table);
		

		return $query->result_array();
	}

	function insertData($table, $data)
	{
		$this->db->insert($table, $data);
	}

	function insertAllData($table, $data)
	{
		$this->db->insert($table, $data);
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

	function updateData($table, $data, $user)
	{
		$this->db->where('nim', $user);
		$this->db->update($table, $data);
	}
}
