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
		} elseif ($where !== null) {
			foreach ($where as $key => $value) {
				$this->db->where($key, $value);
			}
		}

		$query = $this->db->get($table);	
		
		return $query;
	}

	function getPerwalianMhs($where)
	{
		$this->db->select('mhs.nim, mhs.nama, mhs.angkatan, status_perwalian.v_dosen');
		$this->db->from('mhs');
		$this->db->join('status_perwalian', 'status_perwalian.nim = mhs.nim');
		
		foreach ($where as $key => $value) {
			$this->db->where($key, $value);
		}

		$query = $this->db->get();
		
		return $query->result_array();	
	}

	function getMhsBelumPerwalian($nidn)
	{
		$sql = 'SELECT a.* FROM mhs a LEFT JOIN status_perwalian b ON a.nim = b.nim WHERE a.nidn ='.$nidn.' AND b.nidn IS null';
		$query = $this->db->query($sql);

		return $query->result_array();
	}

	function getMatkulKeseluruhan($user)
	{
		// $sql = 'SELECT a.* FROM nilai a INNER JOIN (SELECT kode_matkul, MAX(nilai) AS max_nilai FROM nilai GROUP BY kode_matkul) b ON a.kode_matkul = b.kode_matkul AND a.nilai = b.max_nilai AND a.nim = '.$user.' ORDER BY a.kode_matkul ASC';
		$sql = 'SELECT a.* FROM nilai a INNER JOIN (SELECT nim, kode_matkul, MAX(nilai) AS max_nilai FROM nilai WHERE nim = '.$user.' GROUP BY kode_matkul) b ON a.kode_matkul = b.kode_matkul AND a.nilai = b.max_nilai AND a.nim = b.nim ORDER BY a.kode_matkul ASC';
		$query = $this->db->query($sql);
		return $query;
	}

	function getHistoriMatkul($user)
	{
		$sql = 'SELECT a.* FROM nilai a INNER JOIN (SELECT kode_matkul, nidn, MAX(id) AS max_id FROM nilai GROUP BY kode_matkul) b ON a.kode_matkul = b.kode_matkul AND a.id = b.max_id AND a.nidn = '.$user.' ORDER BY a.tahun_ajaran ASC';
		$query = $this->db->query($sql);
		return $query;
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


	function searchData ($table, $nidn, $key, $row)
	{
		$this->db->like($row, $key);
		$query = $this->db->get_where($table, $nidn);

		$query = $query->result_array();

		return $query;
	}

	function insertAllData($table, $data)
	{
		$this->db->insert($table, $data);
	}

	function insertMultipleData($table, $data)
	{
		$this->db->insert_batch($table, $data);
	}

	function updateData($table, $data, $where)
	{
		foreach ($data as $key => $value) {
			$this->db->set($key, $value);
		}

		foreach ($where as $key => $value) {
			$this->db->where($key, $value);
		}

		$this->db->update($table);
		// $this->db->update($table, $data, $where);
	}


	function updateProfileImage($data, $user)
	{
		$this->db->where('nidn', $user);
		$this->db->update($this->dosen, $data);
	}

	function updateDokumen($table, $data, $id)
	{
		$this->db->where('id', $id);
		$this->db->update($table, $data);
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
