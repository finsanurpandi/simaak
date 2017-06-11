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

        $matkul = $this->m_operator->getDataWhere('matakuliah', array('kode_prodi' => strtolower($this->session->kode_prodi), 'periode' => $ta));

        echo json_encode($matkul);
    }

    function loadNidn()
    {
        $kdprodi = strtolower($this->session->kode_prodi);
        $dosen = $dosen = $this->m_operator->getLeftJoinDosen('dosen_'.$kdprodi);    

        echo json_encode($dosen);
    }

    function getDataMatkul()
    {
        $matkul = $this->m_operator->getDataWhere('matakuliah', array('kode_matkul' => $this->input->post('kodeMatkul')));

        echo json_encode($matkul);
    }

    function loadNim()
    {
        $mhs = $this->m_operator->getAllData('mhs', array('nim' => $this->input->post('nim')))->result_array();

        echo json_encode($mhs);
    }

    function loadNimAngkatan()
    {
        $mhs = $this->m_operator->getAllData('mhs', array('kode_prodi' => $this->session->kode_prodi, 'angkatan' => $this->input->post('angkatan')))->result_array();

        echo json_encode($mhs);
    }
}