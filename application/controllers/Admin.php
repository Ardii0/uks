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
        $year = ["2023-01", "2023-02", "2023-03", "2023-04", "2023-05", "2023-06","2023-07", "2023-08", "2023-09", "2023-10", "2023-11", "2023-12"];
        $data['guru']=$this->Main_model->total('pasien_status_id', '1', 'periksa');
        $data['siswa']=$this->Main_model->total('pasien_status_id', '2', 'periksa');
        $data['karyawan']=$this->Main_model->total('pasien_status_id', '3', 'periksa');
        for ($i = 1; $i <= 12; $i++) {
            $date = sprintf("2023-%02d", $i);
            $graph_data[$i]['bulan'] = date("F", strtotime($date));
            $graph_data[$i]['guru'] = $this->Main_model->get_graph($date, 1)->num_rows();
            $graph_data[$i]['siswa'] = $this->Main_model->get_graph($date, 2)->num_rows();
            $graph_data[$i]['karyawan'] = $this->Main_model->get_graph($date, 3)->num_rows();
        }
    
        $data['graph_data'] = $graph_data;
        $data['periksa']=$this->Main_model->get('periksa')->result();
        $this->load->view('dashboard/dashboard', $data);
    }
}