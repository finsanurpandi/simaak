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
		// if (($limit !== null) && ($offset !== null)) {
		// 	$query = $this->db->get_where($table, $where, $limit, $offset);
		// } elseif ($where !== null) {
		// 	$query = $this->db->get_where($table, $where);	
		// } else {
		// 	$query = $this->db->get($table);	
		// }

		if (($limit !== null) && ($offset !== null)) {
			$this->db->limit($limit, $offset);
		} 

		if ($where !== null) {
			foreach ($where as $key => $value) {
					$this->db->where($key, $value);
				}	
		}
			
		$query = $this->db->get($table);	

		return $query;
	}

	function getDataOrder($table, $where, $orderby)
	{
		foreach ($where as $key => $value) {
			$this->db->where($key, $value);
		}

		foreach ($orderby as $key => $value) {
				$this->db->order_by($key, $value);
			}

		$query = $this->db->get($table);
		

		return $query;
	}

	function getAllDataOrder($table, $where = null, $orderby, $limit = null, $offset = null)
	{
		if (($limit !== null) && ($offset !== null)) {
			// $query = $this->db->get_where($table, $where, $limit, $offset);
			$this->db->limit($limit, $offset);
		}

		if ($where !== null) {
			foreach ($where as $key => $value) {
				$this->db->where($key, $value);
			}
		}

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

	function getDataWhere ($table, $where, $order = null)
	{
		if ($order !== null) {
			foreach ($order as $key => $value) {
				$this->db->order_by($key, $value);
			}
		}
		
		$this->db->where($where);
		$query = $this->db->get($table);

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

	function getDistinctData($table, $row)
	{
		$this->db->distinct();

		$this->db->select($row);

		$query = $this->db->get($table);

		return $query;
	}

	function getPerwalianMhs($search = null, $limit = null, $offset = null)
	{
		$this->db->select('mhs.nim, mhs.nama, mhs.angkatan, mhs.kelas, mhs.kode_prodi, status_perwalian.v_dosen');
		$this->db->from('mhs');
		$this->db->join('status_perwalian', 'status_perwalian.nim = mhs.nim');
		
		// if ($where !== null) {
		// 	foreach ($where as $key => $value) {
		// 		$this->db->where($key, $value);
		// 	}
		// }

		if (($limit !== null) && ($offset !== null)) {
			$this->db->limit($limit, $offset);
		} elseif ($search !== null) {
			foreach ($search as $key => $value) {
				$this->db->like($key, $value);
			}
		} 

		$this->db->where('kode_prodi', $this->session->kode_prodi);

		$query = $this->db->get();
		
		return $query->result_array();	
	}

	// function getDataDosen ($nidn)
	// {
	// 	$query = $this->db->get_where($this->mhs, array('nidn' => $nidn));

	// 	$query = $query->result_array();

	// 	if ($query) {
	// 		return $query[0];
	// 	}
	// }

	function getLeftJoinDosen($table, $order = null, $limit = null, $offset = null)
	{
		$con = 'dosen.nidn = '.$table.'.nidn';
		$this->db->select('*');
		$this->db->from($table);
		$this->db->join('dosen', $con);

		if (($limit !== null) && ($offset !== null)) {
			$this->db->limit($limit, $offset);
		}

		if ($order !== null) {
			foreach ($order as $key => $value) {
				$this->db->order_by($key, $value);
			}
		}

		$query = $this->db->get();

		return $query->result_array();
	}

	function getSisaDosen($table)
	{
		// $this->db->select('*');
		// $this->db->from('dosen');
		// $this->db->join($table, 'dosen.nidn = '.$table.'.nidn');
		// $this->db->where($table.'.nidn IS NULL', null, false);

		// $query = $this->db->get();
		$sql = 'SELECT a.* FROM dosen a LEFT JOIN '.$table.' b ON a.nidn = b.nidn WHERE b.nidn IS null order by a.nama ASC';
		// $sql = 'SELECT a.* FROM dosen a LEFT JOIN dosen_es b ON a.nidn = b.nidn WHERE b.nidn IS null';
		$query = $this->db->query($sql);

		return $query->result_array();
	}

	function getPerwalian($nim)
	{
		$this->db->select('*');
		$this->db->from('perwalian2');
		$this->db->join('jadwal', 'perwalian2.id_jadwal = jadwal.id_jadwal');

		$this->db->where('perwalian2.nim', $nim);

		$query = $this->db->get();
		
		return $query->result_array();	
	}

	function getMhsMatkul($idjadwal)
	{
		$this->db->select('*');
		$this->db->from('perwalian2');
		$this->db->join('jadwal', 'perwalian2.id_jadwal = jadwal.id_jadwal');

		$this->db->where('jadwal.id_jadwal', $idjadwal);

		$query = $this->db->get();
		
		return $query->result_array();	
	}

	function searchData ($table, $where, $key, $row)
	{
		$this->db->like($row, $key);
		$query = $this->db->get_where($table, $where);

		$query = $query->result_array();

		return $query;
	}

	function search($table, $where, $keyword)
	{
		foreach ($where as $key => $value) {
			$this->db->where($key, $value);
		}
		
		foreach ($keyword as $key => $value) {
			$this->db->like($key, $value);
		}
		
		$query = $this->db->get($table);

		$query = $query;

		return $query;
	}

	function searchDataJoin($table, $key, $row)
	{
		$con = 'dosen.nidn = '.$table.'.nidn';
		$this->db->select('*');
		$this->db->from($table);
		$this->db->join('dosen', $con);

		$this->db->like($row, $key);
		$query = $this->db->get();

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

	function updateDosen($table, $data1, $data2, $where)
    {
        $this->db->trans_start();
        $this->db->where($where);
        $this->db->update('dosen', $data1);
        $this->db->where($where);
        $this->db->update($table, $data2);
        $this->db->trans_complete();
    }

	function deleteData($table, $where)
	{
		$this->db->delete($table, $where); 
	}
}
