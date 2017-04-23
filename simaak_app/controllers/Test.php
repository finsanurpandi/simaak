<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Test extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('upload');
        // $this->load->model('m_operator');
    }

    function index()
    {
            $nmfile = $this->input->post('nidn')."_".time();
            $config['upload_path']   =   "./assets/img/";
            $config['allowed_types'] =   "gif|jpg|jpeg|png|pdf"; 
            $config['max_size']      =   "3000";
            $config['file_name']     =   $nmfile;
 
            $this->upload->initialize($config);
            // $this->uploadDokumenDosen($this->input->post('nidn'));

            if (!$this->upload->do_upload('file')) {
                $this->index();
            } else {

            $fileinfo = $this->upload->data();

            $dosen = array (
                'nidn' => $this->input->post('nidn'),
                'judul_file' => $this->input->post('judul_file'),
                'nama_file' => $fileinfo['file_name']
                );

            $data['foto'] = $dosen;

            $this->load->view('test');

            //redirect($this->uri->uri_string());
            }
    }

    
}