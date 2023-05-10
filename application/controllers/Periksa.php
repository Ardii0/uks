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

// Periksa
    public function index()
    {
        $this->load->model('Main_model');
        $data['periksa'] = $this->Main_model->get('periksa')->result();
        $data['pasien_status'] = $this->Main_model->get('pasien_status')->result();
        $data['siswa'] = $this->Main_model->get('siswa')->result();
        $this->load->view('periksa_pasien/index', $data);
    }

    public function aksi_tambah_periksa()
    {
        $data = array
        (
            'create_date' => date("Y-m-d H:i:s"),
            'update_date' => date("Y-m-d H:i:s"),
            'status' => 0,  
            'keluhan' => $this->input->post('keluhan'),
            'nama_pasien' => $this->input->post('nama_pasien'),
            'pasien_status_id' => $this->input->post('pasien_status_id'),
        );
        $masuk = $this->Main_model->insert_data($data,'periksa');
        if ($masuk) {
            $this->session->set_flashdata('sukses', 'berhasil');
            redirect(base_url('Periksa/'));
        } else {
            $this->session->set_flashdata('error', 'gagal..');
            redirect(base_url('Periksa/123'));
        }
    }

    public function filter_tanggal($awal_tanggal, $akhir_tanggal)
    {
        $this->db->where('create_date >=', $awal_tanggal);
        $this->db->where('create_date <=', $akhir_tanggal);
        return $this->db->get('periksa');
    }

    public function aksi_filter_tanggal()
    {
        $awal_tanggal = $this->input->post('awal_tanggal');
        $akhir_tanggal = $this->input->post('akhir_tanggal');

        $data['periksa'] = $this->filter_tanggal($awal_tanggal, $akhir_tanggal)->result();
        // $data['siswa'] = $this->Main_model->get('siswa')->result();
        $this->load->view('periksa_pasien/index', $data);
    }

    
    public function export_periksa() {
        $this->db->where('status',1)->select(array('nama_pasien', 'pasien_status_id', 'keluhan', 'create_date', 'status'));
        $this->db->from('periksa');
        $query = $this->db->get();
        return $query->result();
    }

    public function export_pasien_to_excel()
    {
        // load excel library
        $this->load->library('excel');
        $listInfo = $this->export_periksa();
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
        // set Header
        $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Nama Pasien');   
        $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Status Pasien');   
        $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Keluhan');   
        $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'Tanggal');   
        $objPHPExcel->getActiveSheet()->SetCellValue('E1', 'Status');
        // set Row
        $rowCount = 2;
        foreach ($listInfo as $list) {
            $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $list->nama_pasien);
            $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, tampil_pasien_status_byid($list->pasien_status_id));
            $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $list->keluhan);
            $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $list->create_date);
            $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $list->status);
            $rowCount++;
        }
        $filename = "coba_periksa.csv";
        header('Content-Type: application/vnd.ms-excel'); 
        header('Content-Disposition: attachment;filename="'.$filename.'"');
        header('Cache-Control: max-age=0'); 
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'CSV');  
        $objWriter->save('php://output'); 
    }
    
    public function hapus_periksa($id)
    {
        $hapus=$this->Main_model->delete_data( ['id'=>$id], 'periksa');
        if($hapus)
        {
            $this->session->set_flashdata('sukses', 'berhasil');
            redirect(base_url('Periksa/'));
        }
        else
        {
            $this->session->set_flashdata('error', 'gagal..');
            redirect(base_url('Periksa/123'));
        }
    }

// Status Periksa
    public function status($id)
    {
        $where = ['id' => $id];
        $data['periksa'] = $this->Main_model->getwhere($where,'periksa')->row_array();
        $data['diagnosa'] = $this->Main_model->get('diagnosa')->result();
        $data['penanganan'] = $this->Main_model->get('penanganan_pertama')->result();
        $data['tindakan'] = $this->Main_model->get('tindakan')->result();
        $data['dataperiksa'] = $this->Main_model->getwhere(array('periksa_id' => $id),'penanganan_periksa')->result();
        // $data['dataperiksa'] = $this->Main_model->read_join_one('penanganan_periksa', 'periksa', 'periksa_id', 'id', array('siswa_id' => $id), 'create_date')->result();
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

    public function delete_stat($id)
    {
        $where = array('id' => $id);
        $this->Main_model->delete_data($where, 'penanganan_periksa');
        redirect($_SERVER['HTTP_REFERER']);
    }
}