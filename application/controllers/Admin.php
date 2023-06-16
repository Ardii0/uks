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
        $data['guru']=$this->Main_model->total('pasien_status', 'Guru', 'periksa');
        $data['siswa']=$this->Main_model->total('pasien_status', 'Siswa', 'periksa');
        // $data['karyawan']=$this->Main_model->total('pasien_status', 'Karyawan', 'periksa');
        for ($i = 1; $i <= 12; $i++) {
            $date = sprintf(date('Y') . "-%02d", $i);
            $graph_data[$i]['bulan'] = date("F", strtotime($date));
            $graph_data[$i]['guru'] = $this->Main_model->get_graph($date, 'Guru')->num_rows();
            $graph_data[$i]['siswa'] = $this->Main_model->get_graph($date, 'Siswa')->num_rows();
            $graph_data[$i]['karyawan'] = $this->Main_model->get_graph($date, 'Karyawan')->num_rows();
        }

        $bulan_session = $this->session->userdata('bulan');

        if ($bulan_session === '01' || $bulan_session === '03' || $bulan_session === '05' || $bulan_session === '07' || $bulan_session === '08' || $bulan_session === '10' || $bulan_session === '12') {
            for ($i = 1; $i <= 31; $i++) {
                $date = sprintf(date('Y') . "-" . $bulan_session . "-" . str_pad($i, 2, "0", STR_PAD_LEFT), $i);
                $graph_data_hari[$i]['hari'] = date("d", strtotime($date));
                $graph_data_hari[$i]['guru'] = $this->Main_model->get_graph_hari($date, 'Guru')->num_rows();
                $graph_data_hari[$i]['siswa'] = $this->Main_model->get_graph_hari($date, 'Siswa')->num_rows();
                $graph_data_hari[$i]['karyawan'] = $this->Main_model->get_graph_hari($date, 'Karyawan')->num_rows();
            }
        } else if ($bulan_session === '02'){
            for ($i = 1; $i <= 28; $i++) {
                $date = sprintf(date('Y') . "-" . $bulan_session . "-" . str_pad($i, 2, "0", STR_PAD_LEFT), $i);
                $graph_data_hari[$i]['hari'] = date("d", strtotime($date));
                $graph_data_hari[$i]['guru'] = $this->Main_model->get_graph_hari($date, 'Guru')->num_rows();
                $graph_data_hari[$i]['siswa'] = $this->Main_model->get_graph_hari($date, 'Siswa')->num_rows();
                $graph_data_hari[$i]['karyawan'] = $this->Main_model->get_graph_hari($date, 'Karyawan')->num_rows();
            }
        }else {
            for ($i = 1; $i <= 30; $i++) {
                $date = sprintf(date('Y') . "-" . $bulan_session . "-" . str_pad($i, 2, "0", STR_PAD_LEFT), $i);
                $graph_data_hari[$i]['hari'] = date("d", strtotime($date));
                $graph_data_hari[$i]['guru'] = $this->Main_model->get_graph_hari($date, 'Guru')->num_rows();
                $graph_data_hari[$i]['siswa'] = $this->Main_model->get_graph_hari($date, 'Siswa')->num_rows();
                $graph_data_hari[$i]['karyawan'] = $this->Main_model->get_graph_hari($date, 'Karyawan')->num_rows();
            }
        }
        $data['graph_data'] = $graph_data;
        $data['graph_data_hari'] = $graph_data_hari;
        $data['periksa']=$this->Main_model->get('periksa')->result();
        $this->load->view('dashboard/dashboard', $data);
    }

    public function pilih_bulan()
    {
        $data = array (
            'bulan' => $this->input->post('bulan')
        );
        $this->session->set_userdata($data);
        redirect(base_url('admin'));
    }
    public function reset()
    {
        $this->session->unset_userdata('bulan');
        redirect(base_url('admin'));
    }
}