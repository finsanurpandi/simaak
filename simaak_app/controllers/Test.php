<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Test extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // $this->load->model('m_operator');
    }

    function index()
    {
        $data['input'] = $this->input->post();
        $this->load->view('test', $data);
    }

    
}