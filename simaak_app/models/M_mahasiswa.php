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

	function getDataOrder($table, $where = null, $orderby)
	{
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

	function getAllData($table, $where = null)
	{
		if ($where !== null) {
			foreach ($where as $key => $value) {
				$this->db->where($key, $value);
			}
		} 
		
		$query = $this->db->get($table);
		

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

	function getDistinctData($table, $row)
	{
		$this->db->distinct();

		$this->db->select($row);

		$query = $this->db->get($table);

		return $query;
	}

	function getDistinctDataOrder($table, $where = null, $row, $order)
	{
		$this->db->distinct();

		$this->db->select($row);

		if ($where !== null) {
			foreach ($where as $key => $value) {
				$this->db->where($key, $value);
			}
		}

		foreach ($order as $key => $value) {
			$this->db->order_by($key, $value);
		}

		$query = $this->db->get($table);

		return $query;
	}

	function getJadwalMhs($where)
	{
		$this->db->select('perwalian.nim, perwalian.kode_matkul, perwalian.nama_matkul, perwalian.nama_dosen, perwalian.sks, jadwal.hari, jadwal.waktu, jadwal.ruangan');
		$this->db->from('perwalian');
		$this->db->join('jadwal', 'jadwal.id_jadwal = perwalian.id_jadwal');
		
		foreach ($where as $key => $value) {
			$this->db->where($key, $value);
		}

		$query = $this->db->get();

		return $query->result_array();
	}

	function getMatkulKeseluruhan($user)
	{
		$sql = 'SELECT a.* FROM nilai a INNER JOIN (SELECT kode_matkul, MAX(nilai) AS max_nilai FROM nilai GROUP BY kode_matkul) b ON a.kode_matkul = b.kode_matkul AND a.nilai = b.max_nilai AND a.nim = '.$user.' ORDER BY a.kode_matkul ASC';
		$query = $this->db->query($sql);
		return $query;
	}


	function insertData($table, $data)
	{
		$this->db->insert($table, $data);
	}

	function insertAllData($table, $data)
	{
		$this->db->insert($table, $data);
	}

	function insertMultiple($table1, $data1, $table2, $data2)
	{
		$this->db->trans_start();
		$this->db->insert_batch($table1, $data1);
		$this->db->insert($table2, $data2);
		$this->db->trans_complete();
	}

	function updateProfileImage($data, $user)
	{
		$this->db->where('nim', $user);
		$this->db->update($this->mhs, $data);
	}

	function updateImage($table, $data, $where)
	{
		foreach ($where as $key => $value) {
			$this->db->where($key, $value);	
		}
		
		$this->db->update($table, $data);
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
