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
        // $data['karyawan'] = $this->Main_model->get('karyawan')->result();
        $this->load->view('periksa_pasien/index', $data);
    }

    public function aksi_tambah_periksa()
    {
        $data = array
        (
            'guru_id' => $this->input->post('guru_id'),
            'siswa_id' => $this->input->post('siswa_id'),
            // 'karyawan_id' => $this->input->post('karyawan_id'),
            'pasien_status' => $this->input->post('pasien_status'),
            'keluhan' => $this->input->post('keluhan'),
            'tahun_bulan' => date("Y-m"),
            'tahun_bulan_hari' => date("Y-m-d"),
        );
            $total = 'total_periksa';
        if ($this->input->post('pasien_status') === 'Guru') {
            $whereguru = array('id' => $this->input->post('guru_id'));
            $this->Main_model->set_data($whereguru, $total, 'guru');
        } else if ($this->input->post('pasien_status') === 'Siswa') {
            $wheresiswa = array('id' => $this->input->post('siswa_id'));
            $this->Main_model->set_data($wheresiswa, $total, 'siswa');
        }
        //  else if ($this->input->post('pasien_status') === 'Karyawan') {
        //     $wherekaryawan = array('id' => $this->input->post('karyawan_id'));
        //     $this->Main_model->set_data($wherekaryawan, $total, 'karyawan');
        // };
        $masuk = $this->Main_model->insert_data($data,'periksa');
        if ($masuk) {
            $this->session->set_flashdata('success', 'Berhasil Menambahkan');
            redirect(base_url('periksa/'));
        } else {
            $this->session->set_flashdata('error', 'gagal..');
            redirect(base_url('periksa/'));
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
        // $data['karyawan'] = $this->Main_model->get('karyawan')->result();
        $this->load->view('periksa_pasien/index', $data);
    }

    public function export_pasien_to_excel(){
        // Load plugin PHPExcel nya
        include APPPATH.'third_party/PHPExcell.php';
        
        $awal_tanggal = $this->input->post('awal_tanggal');
        $akhir_tanggal = $this->input->post('akhir_tanggal');
        $listInfo = $this->filter_tanggal($awal_tanggal, $akhir_tanggal)->result();
        // Panggil class PHPExcel nya
        $csv = new PHPExcel();
        // Settingan awal fil excel
        
        // Buat header tabel nya pada baris ke 1
        $csv->setActiveSheetIndex(0)->setCellValue("A1", "NO"); 
        $csv->setActiveSheetIndex(0)->setCellValue("B1", "Nama Pasien"); 
        $csv->setActiveSheetIndex(0)->setCellValue('C1', "Status Pasien"); 
        $csv->setActiveSheetIndex(0)->setCellValue('D1', "Keluhan"); 
        $csv->setActiveSheetIndex(0)->setCellValue('E1', "Tanggal");
        $csv->setActiveSheetIndex(0)->setCellValue('F2', "Status");
        // Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
        $export_guru = $this->Main_model->export_guru();
        $no = 1; // Untuk penomoran tabel, di awal set dengan 1
        $numrow = 2; // Set baris pertama untuk isi tabel adalah baris ke 2
        foreach($listInfo as $list){ // Lakukan looping pada variabel siswa
          $csv->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
          if(!empty($list->siswa_id)) {
            $csv->setActiveSheet()->SetCellValue('B' . $numrow, JoinOne('periksa', 'siswa', 'siswa_id', 'id','periksa.id',$list->id, 'nama_siswa'));
        } else if(!empty($list->guru_id)) {
            $csv->setActiveSheet()->SetCellValue('B' . $numrow, JoinOne('periksa', 'guru', 'guru_id', 'id','periksa.id',$list->id, 'nama_guru'));
        }
        //  else if(!empty($list->karyawan_id)) {
        //     $csv->setActiveSheet()->SetCellValue('B' . $numrow, JoinOne('periksa', 'karyawan', 'karyawan_id', 'id','periksa.id',$list->id, 'nama_karyawan'));
        // } 
          $csv->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $list->pasien_status);
          $csv->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $list->keluhan);
          $csv->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $list->create_date);
          $ditangani = $this->db->get_where('penanganan_periksa', array('periksa_id' => $list->id))->num_rows();
            if ($ditangani > 0) {
                $objPHPExcel->setActiveSheet()->SetCellValue('F' . $numrow, "Sudah Ditangani ");
            } else {
                $objPHPExcel->setActiveSheet()->SetCellValue('F' . $numrow, "Belum Ditangani");
            }
          $no++; // Tambah 1 setiap kali looping
          $numrow++; // Tambah 1 setiap kali looping
        }
        // Set orientasi kertas jadi LANDSCAPE
        $csv->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
        // Set judul file excel nya
        $csv->getActiveSheet(0)->setTitle("Pasien");
        $csv->setActiveSheetIndex(0);
        // Proses file excel
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="Pasien.xlsx"'); // Set nama file excel nya
        header('Cache-Control: max-age=0');
    //    $write = new PHPExcel_Writer_CSV($csv); kene kesalahane
        $write = PHPExcel_IOFactory::createWriter($csv, 'Excel2007');
        $write->save('php://output');
    }

    public function export_pasien_to_excels()
    {
        // load excel library
        $this->load->library('excel');
        $awal_tanggal = $this->input->post('awal_tanggal');
        $akhir_tanggal = $this->input->post('akhir_tanggal');
        $listInfo = $this->filter_tanggal($awal_tanggal, $akhir_tanggal)->result();
        $csv = new PHPExcel();
        $csv->setActiveSheetIndex(0);
        // set Header
        $csv->getActiveSheet()->SetCellValue('A1', 'Nama Pasien');   
        $csv->getActiveSheet()->SetCellValue('B1', 'Status Pasien');   
        $csv->getActiveSheet()->SetCellValue('C1', 'Keluhan');   
        $csv->getActiveSheet()->SetCellValue('D1', 'Tanggal');   
        $csv->getActiveSheet()->SetCellValue('E1', 'Status');  
        // set Row
        $rowCount = 2;
        foreach ($listInfo as $list) {
            if(!empty($list->siswa_id)) {
                $csv->getActiveSheet()->SetCellValue('A' . $rowCount, JoinOne('periksa', 'siswa', 'siswa_id', 'id','periksa.id',$list->id, 'nama_siswa'));
            } else if(!empty($list->guru_id)) {
                $csv->getActiveSheet()->SetCellValue('A' . $rowCount, JoinOne('periksa', 'guru', 'guru_id', 'id','periksa.id',$list->id, 'nama_guru'));
            }
            //  else if(!empty($list->karyawan_id)) {
            //     $csv->getActiveSheet()->SetCellValue('A' . $rowCount, JoinOne('periksa', 'karyawan', 'karyawan_id', 'id','periksa.id',$list->id, 'nama_karyawan'));
            // } 
            $csv->getActiveSheet()->SetCellValue('B' . $rowCount, $list->pasien_status);
            $csv->getActiveSheet()->SetCellValue('C' . $rowCount, $list->keluhan);
            $csv->getActiveSheet()->SetCellValue('D' . $rowCount, $list->create_date);

            $ditangani = $this->db->get_where('penanganan_periksa', array('periksa_id' => $list->id))->num_rows();
            if ($ditangani > 0) {
                $csv->getActiveSheet()->SetCellValue('E' . $rowCount, "Sudah Ditangani ");
            } else {
                $csv->getActiveSheet()->SetCellValue('E' . $rowCount, "Belum Ditangani");
            }
            $rowCount++;
        }
        $csv->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
        // Set judul file excel nya
        $csv->getActiveSheet(0)->setTitle("data-pendaftaran-peserta-didik-baru");
        $csv->setActiveSheetIndex(0);
        // Proses file excel
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="data-pendaftaran-peserta-didik-baru.xlsx"'); // Set nama file excel nya
        header('Cache-Control: max-age=0');
    //    $write = new PHPExcel_Writer_CSV($csv); kene kesalahane
        $write = PHPExcel_IOFactory::createWriter($csv, 'Excel2007');
        $write->save('php://output');
    }
    
    
    public function delete_periksa($id)
    {
        $hapus=$this->Main_model->delete_data(['periksa_id'=>$id], 'penanganan_periksa');
        $hapus=$this->Main_model->delete_data(['id'=>$id], 'periksa');
        if($hapus)
        {
            redirect(base_url('periksa/'));
        }
        else
        {
            $this->session->set_flashdata('error', 'gagal..');
            redirect(base_url('periksa/'));
        }
    }

// Status Periksa
    public function status($id)
    {
        $where = ['id' => $id];
        $data['periksa'] = $this->Main_model->getwhere($where,'periksa')->row_array();
        $data['diagnosa'] = $this->Main_model->get('diagnosa')->result();
        $data['tindakan'] = $this->Main_model->get('tindakan')->result();
        $data['penanganan'] = $this->Main_model->get('penanganan_pertama')->result();
        $data['daftar'] = $this->Main_model->get('daftar_obat')->result();
        $data['dataperiksa'] = $this->Main_model->getwhere(array('periksa_id' => $id),'penanganan_periksa')->result();
        // $data['dataperiksa'] = $this->Main_model->read_join_one('penanganan_periksa', 'periksa', 'periksa_id', 'id', array('siswa_id' => $id), 'create_date')->result();
        $this->load->view('periksa_pasien/penanganan/index', $data);
    }

    public function add_penanganan()
    {
        $data = [
            'diagnosa_id' => $this->input->post('diagnosa_id'),
            'tindakan_id' => $this->input->post('tindakan_id'),
            'penanganan_pertama_id' => $this->input->post('penanganan_pertama_id'),
            'daftar_obat_id' => $this->input->post('daftar_obat_id'),
            'periksa_id' => $this->input->post('memperiksa'),
            'tensi_systolic' => $this->input->post('tensi_systolic'),
            'tensi_diastolic' => $this->input->post('tensi_diastolic'),
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
        $data['tindakan'] = $this->Main_model->get('tindakan')->result();
        $data['penanganan'] = $this->Main_model->get('penanganan_pertama')->result();
        $data['daftar'] = $this->Main_model->get('daftar_obat')->result();
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
            'diagnosa_id' => $this->input->post('diagnosa_id'),
            'tindakan_id' => $this->input->post('tindakan_id'),
            'penanganan_pertama_id' => $this->input->post('penanganan_pertama_id'),
            'daftar_obat_id' => $this->input->post('daftar_obat_id'),
            'periksa_id' => $this->input->post('memperiksa'),
            'tensi_systolic' => $this->input->post('tensi_systolic'),
            'tensi_diastolic' => $this->input->post('tensi_diastolic'),
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