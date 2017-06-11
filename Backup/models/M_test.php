<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_test extends CI_Model {

	function __construct()
	{
		parent::__construct();
		$this->tbl = 'account';
		$this->ta = 'tahun_ajaran';
	}

    function select($table)
    {
        $query = $this->db->get($table);

        return $query->result_array();
    }

	function insert($table, $data)
    {
        $i = 0;
        foreach ($data as $value) {
            $sql = $this->db->set($data[$i])->get_compiled_insert($table);
            echo $sql;
            $i++;
        }
    }
}
