<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datakaryawan extends CI_Controller {

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
        $data = [
            'judul' => 'uks',
            'page' => 'data',
            'menu' => 'data',
            'submenu'=>'karyawan',
        ];
        $data['daf_karyawan'] = $this->Main_model->get("karyawan")->result();
        $this->load->view('data/karyawan', $data);
        
    }
    public function aksi_tambah_karyawan()
    {
      $data = [
          'nama_karyawan' => $this->input->post('nama_karyawan'),
          'tempat_lahir' => $this->input->post('tempat_lahir'),
          'tanggal_lahir' => $this->input->post('tanggal_lahir'),
          'alamat' => $this->input->post('alamat'),
      ];
      $masuk=$this->Main_model->tambah("karyawan", $data);
      if($masuk)
        {
            $this->session->set_flashdata('bisa', 'Berhasil Menambahkan...');
            redirect(base_url('datakaryawan/'));
        }
        else
        {
            $this->session->set_flashdata('error', 'gagal..');
            redirect(base_url('datakaryawan/'));
        }
    }

    public function edit_karyawan($id)
    {
        $data = [
            'judul' => 'uks',
            'page' => 'data',
            'menu' => 'data',
            'submenu'=>'karyawan',
        ];
        $data['daf_karyawan']=$this->Main_model->by_id('karyawan', $id)->result();
        $this->load->view('data/edit_karyawan', $data, $id);
    }

    public function detail_karyawan($id)
    {
        $data = [
            'judul' => 'uks',
            'page' => 'data',
            'menu' => 'data',
            'submenu'=>'karyawan',
        ];
        $data['karyawan']=$this->Main_model->by_id('karyawan', $id)->result();
        $this->load->view('data/detail_karyawan', $data);
    }

    public function upload_img_karyawan($value)
    {
        $kode = round(microtime(true) * 1000);
        $config['upload_path'] = './uploads/data/data_karyawan/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '30000';
        $config['file_name'] = $kode;
        $this->upload->initialize($config);
        if (!$this->upload->do_upload($value))
        {
            return array( false, '' );
        }
        else
        {
            $fn = $this->upload->data();
            $nama = $fn['file_name'];
            return array( true, $nama );
        }
    }

    public function ubah_karyawan()
    {
        $where = array('id' => $this->input->post("id"));
        $_id = $this->Main_model->getwhere($where, 'karyawan')->row();
        $foto = $this->upload_img_karyawan('foto');
        if($foto[0]==false) {
            $data = [
            'nama_karyawan' => $this->input->post('nama_karyawan'),
            'tempat_lahir' => $this->input->post('tempat_lahir'),
            'tanggal_lahir' => $this->input->post('tanggal_lahir'),
            'alamat' => $this->input->post('alamat'),
            'TB' => $this->input->post('TB'),
            'BB' => $this->input->post('BB'),
            'riwayat_penyakit' => $this->input->post('riwayat_penyakit'),
            'gol_darah' => $this->input->post('gol_darah'),
            'no_telepon' => $this->input->post('no_telepon'),
            'alergi' => $this->input->post('alergi'),
            ];
        } else {
            $data = [
            'nama_karyawan' => $this->input->post('nama_karyawan'),
            'tempat_lahir' => $this->input->post('tempat_lahir'),
            'tanggal_lahir' => $this->input->post('tanggal_lahir'),
            'alamat' => $this->input->post('alamat'),
            'TB' => $this->input->post('TB'),
            'BB' => $this->input->post('BB'),
            'riwayat_penyakit' => $this->input->post('riwayat_penyakit'),
            'gol_darah' => $this->input->post('gol_darah'),
            'no_telepon' => $this->input->post('no_telepon'),
            'alergi' => $this->input->post('alergi'),
            'foto' => $foto[1],
            ];
            if ($_id->foto != '') {
                unlink('./uploads/data/data_karyawan/'.$_id->foto);
            }
        }
        $valid = $this->Main_model->update_data($where, $data, 'karyawan');
        if($valid)
        {
            $this->session->set_flashdata('bisa', 'Berhasil Mengedit...');
            redirect(base_url('datakaryawan/'));
        }
        else
        {
            $this->session->set_flashdata('error', 'gagal..');
            redirect(base_url('datakaryawan/'.$_id));
        }
    }

    public function hapus_karyawan($id)
    {
        $hapus=$this->Main_model->hapus('karyawan', 'id', $id);
        if($hapus)
        {
            $this->session->set_flashdata('sukses', 'Berhasil..');
            redirect(base_url('datakaryawan/'));
        }
        else
        {
            $this->session->set_flashdata('error', 'gagal..');
            redirect(base_url('datakaryawan/'));
        }
    }

    public function import_excel3()
    {
        $this->load->library('excel');
        if (isset($_FILES["fileExcel"]["name"])) {
            $path = $_FILES["fileExcel"]["tmp_name"];
            $object = PHPExcel_IOFactory::load($path);
            $date = date('Y-m-d');
            foreach($object->getWorksheetIterator() as $worksheet)
            {
                $highestRow = $worksheet->getHighestRow();
                $highestColumn = $worksheet->getHighestColumn();	
                for($row=2; $row<=$highestRow; $row++)
                {
                    $nama_karyawan = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                    if ($nama_karyawan == "") {
                        break;
                    }
                    $tempat_lahir = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                    $tanggal_lahir = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                    $alamat = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                    $total_periksa = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
                   
                    $temp_data[] = array(
                        'nama_karyawan' => $nama_karyawan,
                        'tempat_lahir'	=> $tempat_lahir,
                        'tanggal_lahir'	=> $tanggal_lahir,
                        'alamat' => $alamat,
                        'total_periksa'	=> $total_periksa,
                        
                    ); 	
                }
            }
            $this->load->library('excel');
            $masuk=$this->Main_model->import_karyawan($temp_data);
            if($masuk)
              {
                  $this->session->set_flashdata('bisa', 'Berhasil di import...');
                  redirect(base_url('datakaryawan/'));
              }
        }
    }

    public function export_karyawan(){
        // Load plugin PHPExcel nya
        include APPPATH.'third_party/PHPExcell.php';
        
        // Panggil class PHPExcel nya
        $csv = new PHPExcel();
        // Settingan awal fil excel
        
        // Buat header tabel nya pada baris ke 1

        $csv->setActiveSheetIndex(0)->setCellValue("A1", "NO"); 
        $csv->setActiveSheetIndex(0)->SetCellValue('B1', 'Nama Karyawan'); 
        $csv->setActiveSheetIndex(0)->SetCellValue('C1', 'Tempat Lahir');   
        $csv->setActiveSheetIndex(0)->SetCellValue('D1', 'Tanggal Lahir');  
        $csv->setActiveSheetIndex(0)->SetCellValue('E1', 'Alamat');

        // Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
        $export_karyawan = $this->Main_model->export_karyawan();
        $no = 1; // Untuk penomoran tabel, di awal set dengan 1
        $numrow = 2; // Set baris pertama untuk isi tabel adalah baris ke 2
        foreach($export_karyawan as $data){ // Lakukan looping pada variabel siswa

            $csv->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
            $csv->setActiveSheetIndex(0)->SetCellValue('B' . $numrow, $data->nama_karyawan);
            $csv->setActiveSheetIndex(0)->SetCellValue('C' . $numrow, $data->tempat_lahir);
            $csv->setActiveSheetIndex(0)->SetCellValue('D' . $numrow, $data->tanggal_lahir);
            $csv->setActiveSheetIndex(0)->SetCellValue('E' . $numrow, $data->alamat);
          
          $no++; // Tambah 1 setiap kali looping
          $numrow++; // Tambah 1 setiap kali looping
        }
        // Set orientasi kertas jadi LANDSCAPE
        $csv->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
        // Set judul file excel nya
        $csv->getActiveSheet(0)->setTitle("Data Karyawan");
        $csv->setActiveSheetIndex(0);
        // Proses file excel
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="Data Karyawan.xlsx"'); // Set nama file excel nya
        header('Cache-Control: max-age=0');
    //    $write = new PHPExcel_Writer_CSV($csv); kene kesalahane
        $write = PHPExcel_IOFactory::createWriter($csv, 'Excel2007');
        $write->save('php://output');
    }
    
    // public function export_periksa_karyawan()
    // {
    //     // load excel library
    //     $this->load->library('excel');
    //     $id = $this->input->post('id');
    //     $getwhere=['karyawan_id'=>$id];
    //     $listInfo = $this->Main_model->getwhere($getwhere, 'periksa')->result();
    //     $karyawan = tampil_karyawan_byid($id);
    //     $objPHPExcel = new PHPExcel();
    //     $objPHPExcel->setActiveSheetIndex(0);
    //     // set Header
    //     $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Nama Pasien');   
    //     $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Status Pasien');   
    //     $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Keluhan');   
    //     $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'Tanggal');   
    //     $objPHPExcel->getActiveSheet()->SetCellValue('E1', 'Status');
    //     $objPHPExcel->getActiveSheet()->SetCellValue('F1', 'Diagnosa');
    //     $objPHPExcel->getActiveSheet()->SetCellValue('G1', 'Penanganan Pertama');
    //     $objPHPExcel->getActiveSheet()->SetCellValue('H1', 'Tindakan');
    //     $objPHPExcel->getActiveSheet()->SetCellValue('I1', 'Obat');
    //     $objPHPExcel->getActiveSheet()->SetCellValue('J1', 'Tensi');
    //     $objPHPExcel->getActiveSheet()->SetCellValue('K1', 'Catatan');
    //     // set Row
    //     $rowCount = 2;
    //     foreach ($listInfo as $list) {
    //         $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, tampil_karyawan_byid($id));
    //         $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $list->pasien_status);
    //         $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $list->keluhan);
    //         $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $list->create_date);

    //         $ditangani = $this->db->get_where('penanganan_periksa', array('periksa_id' => $list->id))->num_rows();
    //         if ($ditangani > 0) {
    //             $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, "Sudah Ditangani ");
    //         } else {
    //             $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, "Belum Ditangani");
    //         }
            
    //         $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, JoinOne('penanganan_periksa', 'diagnosa', 'diagnosa_id', 'id','penanganan_periksa.id',$list->id, 'nama'));
    //         $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, JoinOne('penanganan_periksa', 'penanganan_pertama', 'penanganan_pertama_id', 'id','penanganan_periksa.id',$list->id, 'nama_penanganan'));
    //         $objPHPExcel->getActiveSheet()->SetCellValue('H' . $rowCount, JoinOne('penanganan_periksa', 'tindakan', 'tindakan_id', 'id','penanganan_periksa.id',$list->id, 'nama'));
    //         $objPHPExcel->getActiveSheet()->SetCellValue('I' . $rowCount, JoinOne('penanganan_periksa', 'daftar_obat', 'daftar_obat_id', 'id','penanganan_periksa.id',$list->id, 'nama_obat'));
    //         $objPHPExcel->getActiveSheet()->SetCellValue('J' . $rowCount, tampil_tensi1_byid($list->id).'/'.tampil_tensi2_byid($list->id));
    //         $objPHPExcel->getActiveSheet()->SetCellValue('K' . $rowCount, tampil_catatan_byid($list->id));
    //         $rowCount++;
    //     }
    //     $filename = "rekap data periksa $karyawan.csv";
    //     header('Content-Type: application/vnd.ms-excel'); 
    //     header('Content-Disposition: attachment;filename="'.$filename.'"');
    //     header('Cache-Control: max-age=0'); 
    //     $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'CSV');  
    //     $objWriter->save('php://output'); 
    // }

    public function export_periksa_karyawan()
    {

        // Load plugin PHPExcel nya
        include APPPATH.'third_party/PHPExcell.php';

        // Panggil class PHPExcel nya
        $csv = new PHPExcel();

        // load excel library
        $id = $this->input->post('id');
        $getwhere=['karyawan_id'=>$id];
        $listInfo = $this->Main_model->getwhere($getwhere, 'periksa')->result();
        $karyawan = tampil_karyawan_byid($id);

        // set Header
        $csv->setActiveSheetIndex(0)->setCellValue("A1", "NO"); 
        $csv->setActiveSheetIndex(0)->SetCellValue('B1', 'Nama Pasien');   
        $csv->setActiveSheetIndex(0)->SetCellValue('C1', 'Status Pasien');   
        $csv->setActiveSheetIndex(0)->SetCellValue('D1', 'Keluhan');   
        $csv->setActiveSheetIndex(0)->SetCellValue('E1', 'Tanggal');   
        $csv->setActiveSheetIndex(0)->SetCellValue('F1', 'Status');
        $csv->setActiveSheetIndex(0)->SetCellValue('G1', 'Diagnosa');
        $csv->setActiveSheetIndex(0)->SetCellValue('H1', 'Penanganan Pertama');
        $csv->setActiveSheetIndex(0)->SetCellValue('I1', 'Tindakan');
        $csv->setActiveSheetIndex(0)->SetCellValue('J1', 'Obat');
        $csv->setActiveSheetIndex(0)->SetCellValue('K1', 'Tensi');
        $csv->setActiveSheetIndex(0)->SetCellValue('L1', 'Catatan');
        // set Row
        $no = 1; // Untuk penomoran tabel, di awal set dengan 1
        $numrow = 2; // Set baris pertama untuk isi tabel adalah baris ke 2
        foreach ($listInfo as $data) {
            $csv->setActiveSheetIndex(0)->SetCellValue('A' . $numrows, $data);
            $csv->setActiveSheetIndex(0)->SetCellValue('B' . $numrows, tampil_karyawan_byid($id));
            $csv->setActiveSheetIndex(0)->SetCellValue('C' . $numrows, $data->pasien_status);
            $csv->setActiveSheetIndex(0)->SetCellValue('D' . $numrows, $data->keluhan);
            $csv->setActiveSheetIndex(0)->SetCellValue('E' . $numrows, $data->create_date);

            $ditangani = $this->db->get_where('penanganan_periksa', array('periksa_id' => $data->id))->num_rows();
            if ($ditangani > 0) {
                $csv->setActiveSheetIndex(0)->SetCellValue('F' . $numrows, "Sudah Ditangani ");
            } else {
                $csv->setActiveSheetIndex(0)->SetCellValue('F' . $numrows, "Belum Ditangani");
            }

            $csv->setActiveSheetIndex(0)->SetCellValue('G' . $numrows, JoinOne('penanganan_periksa', 'diagnosa', 'diagnosa_id', 'id','penanganan_periksa.id',$data->id, 'nama'));
            $csv->setActiveSheetIndex(0)->SetCellValue('H' . $numrows, JoinOne('penanganan_periksa', 'penanganan_pertama', 'penanganan_pertama_id', 'id','penanganan_periksa.id',$data->id, 'nama_penanganan'));
            $csv->setActiveSheetIndex(0)->SetCellValue('I' . $numrows, JoinOne('penanganan_periksa', 'tindakan', 'tindakan_id', 'id','penanganan_periksa.id',$data->id, 'nama'));
            $csv->setActiveSheetIndex(0)->SetCellValue('J' . $numrows, JoinOne('penanganan_periksa', 'daftar_obat', 'daftar_obat_id', 'id','penanganan_periksa.id',$data->id, 'nama_obat'));
            $csv->setActiveSheetIndex(0)->SetCellValue('K' . $numrows, tampil_tensi1_byid($data->id).'/'.tampil_tensi2_byid($data->id));
            $csv->setActiveSheetIndex(0)->SetCellValue('L' . $numrows, tampil_catatan_byid($list->id));
            $no++;
            $numrows++;
        }

        // Set orientasi kertas jadi LANDSCAPE
        $csv->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
        // Set judul file excel nya
        $csv->getActiveSheet(0)->setTitle("Periksa Karyawan");
        $csv->setActiveSheetIndex(0);
        // Proses file excel
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="Periksa Karyawan.xlsx"'); // Set nama file excel nya
        header('Cache-Control: max-age=0');
    //    $write = new PHPExcel_Writer_CSV($csv); kene kesalahane
        $write = PHPExcel_IOFactory::createWriter($csv, 'Excel2007');
        $write->save('php://output');
    }
}