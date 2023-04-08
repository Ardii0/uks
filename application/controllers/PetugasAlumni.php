<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PetugasAlumni extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_petugasalumni');
        $this->load->helpers('my_helper');
        if ($this->session->userdata('status_petugasalumni')!='login') {
            redirect(base_url());
        }
    }

    public function index()
    {
        $this->load->view('petugasalumni/dashboard');
    }

}