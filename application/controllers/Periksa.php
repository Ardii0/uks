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
        $data['export'] = 0;
        $data['periksa'] = $this->Main_model->get('periksa')->result();
        $data['pasien_status'] = $this->Main_model->get('pasien_status')->result();
        $data['guru'] = $this->Main_model->get('guru')->result();
        $data['siswa'] = $this->Main_model->get('siswa')->result();
        $data['karyawan'] = $this->Main_model->get('karyawan')->result();
        $this->load->view('periksa_pasien/index', $data);
    }

    public function aksi_tambah_periksa()
    {
        $data = array
        (
            'guru_id' => $this->input->post('guru_id'),
            'siswa_id' => $this->input->post('siswa_id'),
            'karyawan_id' => $this->input->post('karyawan_id'),
            'pasien_status' => $this->input->post('pasien_status'),
            'keluhan' => $this->input->post('keluhan'),
            'tahun_bulan' => date("Y-m"),
        );
            $total = 'total_periksa';
        if ($this->input->post('pasien_status') === 'Guru') {
            $whereguru = array('id' => $this->input->post('guru_id'));
            $this->Main_model->set_data($whereguru, $total, 'guru');
        } else if ($this->input->post('pasien_status') === 'Siswa') {
            $wheresiswa = array('id' => $this->input->post('siswa_id'));
            $this->Main_model->set_data($wheresiswa, $total, 'siswa');
        } else if ($this->input->post('pasien_status') === 'Karyawan') {
            $wherekaryawan = array('id' => $this->input->post('karyawan_id'));
            $this->Main_model->set_data($wherekaryawan, $total, 'karyawan');
        };
        $masuk = $this->Main_model->insert_data($data,'periksa');
        if ($masuk) {
            $this->session->set_flashdata('bisa', 'Berhasil Menambahkan');
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
        $data['awal_tanggal'] = $awal_tanggal;
        $data['akhir_tanggal'] = $akhir_tanggal;
        
        $data['export'] = $this->filter_tanggal($awal_tanggal, $akhir_tanggal)->result();
        $data['periksa'] = $this->Main_model->get('periksa')->result();
        $data['pasien_status'] = $this->Main_model->get('pasien_status')->result();
        $data['guru'] = $this->Main_model->get('guru')->result();
        $data['siswa'] = $this->Main_model->get('siswa')->result();
        $data['karyawan'] = $this->Main_model->get('karyawan')->result();
        $this->load->view('periksa_pasien/index', $data);
    }

    
    public function export_periksa() {
        $this->db->where('status',1)->select(array('nama_pasien', 'pasien_status', 'keluhan', 'create_date', 'status'));
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
            $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $list->pasien_status);
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

    public function exportToExcel()
{
    $this->load->library('excel');
    // Load the MySQL data
    $this->load->database();
    $query = $this->db->get('periksa');
    $data = $query->result_array();

    // Create a new PHPExcel object
    $objPHPExcel = new PHPExcel();

    // Set the properties of the Excel file
    $objPHPExcel->getProperties()
        ->setCreator("Your Name")
        ->setLastModifiedBy("Your Name")
        ->setTitle("Your Title")
        ->setSubject("Your Subject")
        ->setDescription("Your Description");

    // Set the column headings
    $objPHPExcel->setActiveSheetIndex(0)
        ->setCellValue('A1', 'Column 1')
        ->setCellValue('B1', 'Column 2')
        ->setCellValue('C1', 'Column 3');

    // Add the data to the Excel file
    $row = 2;
    foreach ($data as $item) {
        $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A'.$row, $item['keluhan'])
            ->setCellValue('B'.$row, $item['id'])
            ->setCellValue('C'.$row, $item['id']);
        $row++;
    }

    // Rename the worksheet
    $objPHPExcel->getActiveSheet()->setTitle('Sheet1');

    // Set the header and content type for the Excel file
    $filename = 'your_filename.csv';
    header('Content-Type: application/vnd.ms-excel'); 
    header('Content-Disposition: attachment;filename="'.$filename.'"');
    header('Cache-Control: max-age=0');

    // Save the Excel file to output
    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'CSV');
    $objWriter->save('php://output');

    // $filename = "coba_periksa.csv";
    // header('Content-Type: application/vnd.ms-excel'); 
    // header('Content-Disposition: attachment;filename="'.$filename.'"');
    // header('Cache-Control: max-age=0'); 
    // $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'CSV');  
    // $objWriter->save('php://output'); 
    exit;
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
        $this->session->set_flashdata('success', 'Berhasil Ditambahkan');
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function delete_stat($id)
    {
        $where = ['id' => $id];
        $checkperiksa = $this->Main_model->getwhere($where,'penanganan_periksa')->row_array();
        $this->Main_model->delete_data($where, 'penanganan_periksa');
        redirect(base_url('Periksa/status/'.$checkperiksa['periksa_id']));
    }
    
 // Edit Status
    public function edit_stat($id)
    {
        $where = ['id' => $id];
        $data['periksa'] = $this->Main_model->getwhere($where,'penanganan_periksa')->row_array();
        $checkperiksa = $this->Main_model->getwhere($where,'penanganan_periksa')->row_array();
        $data['diagnosa'] = $this->Main_model->get('diagnosa')->result();
        $data['penanganan'] = $this->Main_model->get('penanganan_pertama')->result();
        $data['tindakan'] = $this->Main_model->get('tindakan')->result();
        $data['dataperiksa'] = $this->Main_model->getwhere(array('periksa_id' => $checkperiksa['periksa_id']),'penanganan_periksa')->result();
        // $data['dataperiksa'] = $this->Main_model->read_join_one('penanganan_periksa', 'periksa', 'periksa_id', 'id', array('siswa_id' => $id), 'create_date')->result();
        $this->load->view('periksa_pasien/penanganan/edit', $data);
    }

    public function update_penanganan($id)
    {
        $where = array('id' => $id);
        $periksa = $this->Main_model->getwhere($where,'penanganan_periksa')->row_array();
        $whereperiksa = array('id' => $periksa['periksa_id']);
        $data = [
            'diagnosa_penyakit_id' => $this->input->post('diagnosa_penyakit_id'),
            'tindakan_id' => $this->input->post('tindakan_id'),
            'penanganan_pertama_id' => $this->input->post('penanganan_pertama_id'),
            'periksa_id' => $this->input->post('memperiksa'),
            'catatan' => $this->input->post('catatan'),
        ];
        $keluhan = [
            'keluhan' => $this->input->post('keluhan'),
        ];
        $valid = $this->Main_model->update_data($where, $data, 'penanganan_periksa');
        $valid = $this->Main_model->update_data($whereperiksa, $keluhan, 'periksa');
        if($valid) {
            $this->session->set_flashdata('success', 'Berhasil Diubah');
            redirect(base_url('Periksa/status/'.$periksa['periksa_id']));
        } else {
            $this->session->set_flashdata('error', 'gagal..');
            redirect(base_url('Periksa/edit_stat/'.$periksa['id']));
        }
    }
}