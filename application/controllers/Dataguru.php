<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dataguru extends CI_Controller {

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
            'submenu'=>'guru',
        ];
        $data['daf_guru'] = $this->Main_model->get("guru")->result();
        $this->load->view('data/guru', $data);
        
    }
//Guru

    public function aksi_tambah_guru()
    {
      $data = [
          'nama_guru' => $this->input->post('nama_guru'),
          'tempat_lahir' => $this->input->post('tempat_lahir'),
          'tanggal_lahir' => $this->input->post('tanggal_lahir'),
          'alamat' => $this->input->post('alamat'),
      ];
      $masuk=$this->Main_model->tambah("guru", $data);
      if($masuk)
        {
            $this->session->set_flashdata('bisa', 'Berhasil Menambahkan...');
            redirect(base_url('dataguru/'));
        }
    }

    public function edit_guru($id)
    {
        $data = [
            'judul' => 'uks',
            'page' => 'data',
            'menu' => 'data',
            'submenu'=>'guru',
        ];
        $data['daf_guru']=$this->Main_model->by_id('guru', $id)->result();
        $this->load->view('data/edit_guru', $data, $id);
    }

    public function detail_guru($id)
    {
        $data = [
            'judul' => 'uks',
            'page' => 'data',
            'menu' => 'data',
            'submenu'=>'guru',
        ];
        $data['guru']=$this->Main_model->by_id('guru', $id)->result();
        $this->load->view('data/detail_guru', $data);
    }

    public function upload_img_guru($value)
    {
        $kode = round(microtime(true) * 1000);
        $config['upload_path'] = './uploads/data/data_guru/';
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

    public function ubah_guru()
    {
        $where = array('id' => $this->input->post("id"));
        $_id = $this->Main_model->getwhere($where, 'guru')->row();
        $foto = $this->upload_img_guru('foto');
        if($foto[0]==false) {
            $data = [
            'nama_guru' => $this->input->post('nama_guru'),
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
            'nama_guru' => $this->input->post('nama_guru'),
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
                unlink('./uploads/data/data_guru/'.$_id->foto);
            }
        }
        $valid = $this->Main_model->update_data($where, $data, 'guru');
        if($valid)
        {
            $this->session->set_flashdata('bisa', 'Berhasil Mengedit...');
            redirect(base_url('dataguru/'));
        }
        else
        {
            $this->session->set_flashdata('error', 'gagal..');
            redirect(base_url('dataguru/'.$_id));
        }
    }

    public function hapus_guru($id)
    {
        $hapus=$this->Main_model->hapus('guru', 'id', $id);
        if($hapus)
        {
            $this->session->set_flashdata('sukses', 'Berhasil..');
            redirect(base_url('dataguru/'));
        }
        else
        {
            $this->session->set_flashdata('error', 'gagal..');
            redirect(base_url('dataguru/'));
        }
    }

    public function import_excel()
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
                    $nama_guru = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                    if ($nama_guru == "") {
                        break;
                    }
                    $tempat_lahir = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                    $tanggal_lahir = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                    $alamat = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                    $total_periksa = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
                   
                    $temp_data[] = array(
                        'nama_guru' => $nama_guru,
                        'tempat_lahir'	=> $tempat_lahir,
                        'tanggal_lahir'	=> $tanggal_lahir,
                        'alamat' => $alamat,
                        'total_periksa'	=> $total_periksa,
                        
                    ); 	
                }
            }
            $this->load->library('excel');
            $masuk=$this->Main_model->import_guru($temp_data);
            if($masuk)
              {
                  $this->session->set_flashdata('bisa', 'Berhasil di import...');
                  redirect(base_url('dataguru/'));
              }
        }
    }

    public function export_guru(){
        // Load plugin PHPExcel nya
        include APPPATH.'third_party/PHPExcell.php';
        
        // Panggil class PHPExcel nya
        $csv = new PHPExcel();
        // Settingan awal fil excel
        
        // Buat header tabel nya pada baris ke 1
        $csv->setActiveSheetIndex(0)->setCellValue("A1", "NO"); 
        $csv->setActiveSheetIndex(0)->setCellValue("B1", "Nama Guru"); 
        $csv->setActiveSheetIndex(0)->setCellValue('C1', "Tempat Lahir"); 
        $csv->setActiveSheetIndex(0)->setCellValue('D1', "Tanggal Lahir"); 
        $csv->setActiveSheetIndex(0)->setCellValue('E1', "Alamat");
        // Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
        $export_guru = $this->Main_model->export_guru();
        $no = 1; // Untuk penomoran tabel, di awal set dengan 1
        $numrow = 2; // Set baris pertama untuk isi tabel adalah baris ke 2
        foreach($export_guru as $data){ // Lakukan looping pada variabel siswa
          $csv->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
          $csv->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->nama_guru);
          $csv->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->tempat_lahir);
          $csv->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data->tanggal_lahir);
          $csv->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data->alamat);
          
          $no++; // Tambah 1 setiap kali looping
          $numrow++; // Tambah 1 setiap kali looping
        }
        // Set orientasi kertas jadi LANDSCAPE
        $csv->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
        // Set judul file excel nya
        $csv->getActiveSheet(0)->setTitle("Data Guru");
        $csv->setActiveSheetIndex(0);
        // Proses file excel
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="Data Guru.xlsx"'); // Set nama file excel nya
        header('Cache-Control: max-age=0');
    //    $write = new PHPExcel_Writer_CSV($csv); kene kesalahane
        $write = PHPExcel_IOFactory::createWriter($csv, 'Excel2007');
        $write->save('php://output');
    }

    public function export_periksa_guru()
    {
        // load excel library
        $this->load->library('excel');
        $id = $this->input->post('id');
        $getwhere=['guru_id'=>$id];
        $listInfo = $this->Main_model->getwhere($getwhere, 'periksa')->result();
        $guru = tampil_guru_byid($id);
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
        // set Header
        $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Nama Pasien');   
        $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Status Pasien');   
        $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Keluhan');   
        $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'Tanggal');   
        $objPHPExcel->getActiveSheet()->SetCellValue('E1', 'Status');
        $objPHPExcel->getActiveSheet()->SetCellValue('F1', 'Diagnosa');
        $objPHPExcel->getActiveSheet()->SetCellValue('G1', 'Penanganan Pertama');
        $objPHPExcel->getActiveSheet()->SetCellValue('H1', 'Tindakan');
        $objPHPExcel->getActiveSheet()->SetCellValue('I1', 'Obat');
        $objPHPExcel->getActiveSheet()->SetCellValue('J1', 'Tensi');
        $objPHPExcel->getActiveSheet()->SetCellValue('K1', 'Catatan');
        // set Row
        $rowCount = 2;
        foreach ($listInfo as $list) {
            $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, tampil_guru_byid($id));
            $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $list->pasien_status);
            $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $list->keluhan);
            $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $list->create_date);

            $ditangani = $this->db->get_where('penanganan_periksa', array('periksa_id' => $list->id))->num_rows();
            if ($ditangani > 0) {
                $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, "Sudah Ditangani ");
            } else {
                $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, "Belum Ditangani");
            }

            $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, JoinOne('penanganan_periksa', 'diagnosa', 'diagnosa_id', 'id','penanganan_periksa.id',$list->id, 'nama'));
            $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, JoinOne('penanganan_periksa', 'penanganan_pertama', 'penanganan_pertama_id', 'id','penanganan_periksa.id',$list->id, 'nama_penanganan'));
            $objPHPExcel->getActiveSheet()->SetCellValue('H' . $rowCount, JoinOne('penanganan_periksa', 'tindakan', 'tindakan_id', 'id','penanganan_periksa.id',$list->id, 'nama'));
            $objPHPExcel->getActiveSheet()->SetCellValue('I' . $rowCount, JoinOne('penanganan_periksa', 'daftar_obat', 'daftar_obat_id', 'id','penanganan_periksa.id',$list->id, 'nama_obat'));
            $objPHPExcel->getActiveSheet()->SetCellValue('J' . $rowCount, tampil_tensi1_byid($list->id).'/'.tampil_tensi2_byid($list->id));
            $objPHPExcel->getActiveSheet()->SetCellValue('K' . $rowCount, tampil_catatan_byid($list->id));
            $rowCount++;
        }
        // $filename = "rekap data periksa $guru.csv";
        // header('Content-Type: application/vnd.ms-excel'); 
        // header('Content-Disposition: attachment;filename="'.$filename.'"');
        // header('Cache-Control: max-age=0'); 
        // $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'CSV');  
        // $objWriter->save('php://output'); 
        $objPHPExcel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
        // Set judul file excel nya
        $objPHPExcel->getActiveSheet(0)->setTitle("Periksa Guru");
        $objPHPExcel->setActiveSheetIndex(0);
        // Proses file excel
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="Periksa Guru.xlsx"'); // Set nama file excel nya
        header('Cache-Control: max-age=0');
    //    $write = new PHPExcel_Writer_CSV($csv); kene kesalahane
        $write = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $write->save('php://output');
    }
}