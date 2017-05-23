<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_keuangan extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}

	function getAllData($table, $where = null, $order = null, $limit = null, $offset = null)
    {

        if (($limit !== null) && ($offset !== null)) {
            $this->db->limit($limit, $offset);
        } elseif ($where !== null) {
            foreach ($where as $key => $value) {
                $this->db->where($key, $value);
            }
        }

        if ($order !== null) {
            foreach ($order as $key => $value) {
                $this->db->order_by($key, $value);
            }
        }

        $query = $this->db->get($table);    
        
        return $query;
    }

    function getLeftJoinMahasiswa($where = null, $order = null, $limit = null, $offset = null)
    {
        $this->db->select('*');
        $this->db->from('mhs');
        $this->db->join('mhs_pembayaran', 'mhs.nim = mhs_pembayaran.nim');

        if (($limit !== null) && ($offset !== null)) {
            $this->db->limit($limit, $offset);
        } elseif ($where !== null) {
            foreach ($where as $key => $value) {
                $this->db->where($key, $value);
            }
        }

        if ($order !== null) {
            foreach ($order as $key => $value) {
                $this->db->order_by($key, $value);
            }
        }

        $query = $this->db->get();

        return $query;
    }

    function searchData ($table, $like)
    {
        $this->db->like($like);
        $query = $this->db->get($table);

        return $query;
    }

    function updateValidasi($data1, $where1, $data2, $where2)
    {
        $this->db->trans_start();
        $this->db->update('mhs_pembayaran', $data1, $where1);
        $this->db->update('mhs', $data2, $where2);
        $this->db->trans_complete();
    }

}
