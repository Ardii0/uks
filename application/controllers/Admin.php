<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Main_model');
        $this->load->helpers('my_helper');
        // $this->load->library('excel');
        $this->load->library('form_validation');
        $this->load->library('session');
        if ($this->session->userdata('is_login')!=TRUE) {
            redirect(base_url());
        }
    }

    public function index()
    {
        $data['guru']=$this->Main_model->total('pasien_status_id', '1', 'periksa');
        $data['siswa']=$this->Main_model->total('pasien_status_id', '2', 'periksa');
        $data['karyawan']=$this->Main_model->total('pasien_status_id', '3', 'periksa');
        // $data['testing']=$this->Main_model->get_graph('2023-04-11 15:42:58', '2')->num_rows();
        $data['periksa']=$this->Main_model->get('periksa')->result();
        $results = $this->Main_model->get_chart_data();
        $data['chart_data'] = $results['chart_data'];
        $data['min_year'] = $results['min_year'];
        $data['max_year'] = $results['max_year'];
        $this->load->view('dashboard/dashboard', $data);
    }
}