<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ajax extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_operator');
    }

    public function index()
    {
        $this->output->set_output("This is an AJAX endpoint!");
    }

    public function usernameAvailability()
    {
        $username = $this->input->post('username');
        $res = $this->m_operator->checkUsername($username);
        
        echo $res;   
    }

    function checkGolongan()
    {
        $jabfung = $this->input->post('jabfung');
        $golongan = $this->m_operator->getDataWhere('golongan', array('jabatan_fungsional' => $jabfung));

        echo json_encode($golongan);
    }

    function loadMatkul($ta)
    {

        $matkul = $this->m_operator->getDataWhere('matakuliah', array('kode_prodi' => $this->session->kode_prodi, 'periode' => $ta));

        echo json_encode($matkul);
    }

    function loadNidn()
    {
        $dosen = $this->m_operator->getDataWhere('dosen', array('kode_prodi' => $this->session->kode_prodi));

        echo json_encode($dosen);
    }

    function getDataMatkul()
    {
        $matkul = $this->m_operator->getDataWhere('matakuliah', array('kode_matkul' => $this->input->post('kodeMatkul')));

        echo json_encode($matkul);
    }
}