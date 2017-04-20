<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_operator extends CI_Model {

	function __construct()
	{
		parent::__construct();
		$this->operator = 'operator';
		$this->dosen = 'dosen';
		$this->mhs = 'mhs';
		$this->mhs_alamat = 'mhs_alamat';
		$this->account = 'account';
	}

	function checkUsername ($user)
	{
		$query = $this->db->get_where($this->account, array('username' => $user));

		$query = $query->num_rows();
		return $query;
		// if ($query->num_rows() == 0) {
		// 	return true;
		// } else {
		// 	return false;
		// }
	}

	function getOperator ($user)
	{
		$query = $this->db->get_where($this->operator, array('username' => $user));

		$query = $query->result_array();

		if ($query) {
			return $query[0];
		}
	}

	function getAllData($table, $where = null, $limit = null, $offset = null)
	{
		if (($limit !== null) && ($offset !== null)) {
			$query = $this->db->get_where($table, $where, $limit, $offset);
		} elseif ($where !== null) {
			$query = $this->db->get_where($table, $where);	
		} else {
			$query = $this->db->get($table);	
		}
		

		return $query;
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

	function getDataWhere ($table, $where)
	{
		$query = $this->db->get_where($table, $where);

		$query = $query->result_array();

		return $query;
	}

	function getAlamatMahasiswa ($nim)
	{
		$query = $this->db->get_where($this->mhs_alamat, array('nim' => $nim));

		$query = $query->result_array();

		if ($query) {
			return $query[0];
		}
	}

	// function getDataDosen ($nidn)
	// {
	// 	$query = $this->db->get_where($this->mhs, array('nidn' => $nidn));

	// 	$query = $query->result_array();

	// 	if ($query) {
	// 		return $query[0];
	// 	}
	// }

	function searchData ($table, $where, $key, $row)
	{
		$this->db->like($row, $key);
		$query = $this->db->get_where($table, $where);

		$query = $query->result_array();

		return $query;
	}

	function insertAllData($table, $data)
	{
		$this->db->insert($table, $data);
	}

	function insertMahasiswa($acc, $mhs)
	{
		$this->db->trans_start();
		$this->db->insert($this->account, $acc);
		$this->db->insert($this->mhs, $mhs);
		$this->db->trans_complete();
	}

	function insertDosen($acc, $dosen)
	{
		$this->db->trans_start();
		$this->db->insert($this->account, $acc);
		$this->db->insert($this->dosen, $dosen);
		$this->db->trans_complete();
	}

	function updateDataMahasiswa($data, $nim)
	{
		$this->db->where('nim', $nim);
		$this->db->update($this->mhs, $data);
	}

	function updateData($table, $data, $where)
	{
		$this->db->update($table, $data, $where);
	}

	function updateProfileImage($data, $user)
	{
		$this->db->where('username', $user);
		$this->db->update($this->operator, $data);
	}

	function updatePassword($data, $user)
	{
		$this->db->where('username', $user);
		$this->db->update($this->account, $data);
	}

	function deleteData($table, $where)
	{
		$this->db->delete($table, $where); 
	}
}
