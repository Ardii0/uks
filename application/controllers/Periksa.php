<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Periksa extends CI_Controller {

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

    public function status($id)
    {
        $where = ['id' => $id];
        $data['periksa'] = $this->Main_model->getwhere($where,'periksa')->row_array();
        $data['diagnosa'] = $this->Main_model->get('diagnosa')->result();
        $data['penanganan'] = $this->Main_model->get('penanganan_pertama')->result();
        $data['tindakan'] = $this->Main_model->get('tindakan')->result();
        $this->load->view('periksa_pasien/penanganan/index', $data);
    }

    public function add_penanganan()
    {
        $data = [
            'diagnosa_penyakit_id' => $this->input->post('diagnosa_penyakit_id'),
            'tindakan_id' => $this->input->post('tindakan_id'),
            'penanganan_pertama_id' => $this->input->post('penanganan_pertama_id'),
            'periksa_id' => $this->input->post('memperiksa'),
            'catatan' => $this->input->post('catatan'),
        ];
        $this->Main_model->insert_data($data, 'penanganan_periksa');
        redirect($_SERVER['HTTP_REFERER']);
    }
}