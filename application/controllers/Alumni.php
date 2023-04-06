<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alumni extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_alumni');
        $this->load->helpers('my_helper');
        if ($this->session->userdata('status_alumni')!='login') {
            redirect(base_url());
        }
    }

    public function index()
    {
        $this->load->view('alumni/dashboard');
    }
// Data Diri
    public function data_diri()
    {
        $this->load->view('alumni/data_diri/data_diri');
    }

    public function get_daftarByNisn(){
        $id_daftar = $this->input->post('id_daftar',TRUE);
        $data = $this->m_alumni->getwhere('tabel_daftar', array('id_daftar' => $id_daftar))->result();
        echo json_encode($data);
    }

    public function bekerja()
    {
        $data['data'] = $this->m_alumni->getwhere('tabel_daftar', array('diterima' => 'G'))->result();
        $data['user'] = $this->m_alumni->getwhere('tabel_level', array('id_level' => $this->session->userdata('id_level')))->result();
        $data['readydata'] = $this->m_alumni->getwhere('data_diri', array('id_level' => $this->session->userdata('id_level')))->result();
        $this->load->view('alumni/data_diri/bekerja/bekerja', $data);
    }

    public function tambah_datadiri()
    {
        $data = [
            'id_level' => $this->session->userdata('id_level'),
            'id_daftar' => $this->input->post('id_daftar'),
            'jurusan_sekolah' => $this->input->post('jurusan_sekolah'),
            'nik' => $this->input->post('nik'),
            'alamat' => $this->input->post('alamat'),
            'no_telp' => $this->input->post('no_telp'),
            'tahun_lulus' => $this->input->post('tahun_lulus'),
            'status' => $this->input->post('status'),
            'deskripsi_status' => $this->input->post('deskripsi_status'),
            'nama_instansi' => $this->input->post('nama_instansi'),
            'jabatan' => $this->input->post('jabatan'),
            'tanggal_kerja' => $this->input->post('tanggal_kerja'),
            'bidang_instansi' => $this->input->post('bidang_instansi'),
            'lokasi_instansi' => $this->input->post('lokasi_instansi'),
            'nama_instansi2' => $this->input->post('nama_instansi2'),
            'jabatan2' => $this->input->post('jabatan2'),
            'tanggal_kerja2' => $this->input->post('tanggal_kerja2'),
        ];
        $this->m_alumni->input_data('data_diri', $data);
        redirect(base_url('Alumni/data_diri'));
    }

    public function update_datadiri()
    {
        $data = array (
            'jurusan_sekolah' => $this->input->post('jurusan_sekolah'),
            'nik' => $this->input->post('nik'),
            'alamat' => $this->input->post('alamat'),
            'no_telp' => $this->input->post('no_telp'),
            'tahun_lulus' => $this->input->post('tahun_lulus'),
            'status' => $this->input->post('status'),
            'deskripsi_status' => $this->input->post('deskripsi_status'),
            'nama_instansi' => $this->input->post('nama_instansi'),
            'jabatan' => $this->input->post('jabatan'),
            'tanggal_kerja' => $this->input->post('tanggal_kerja'),
            'bidang_instansi' => $this->input->post('bidang_instansi'),
            'lokasi_instansi' => $this->input->post('lokasi_instansi'),
            'nama_instansi2' => $this->input->post('nama_instansi2'),
            'jabatan2' => $this->input->post('jabatan2'),
            'tanggal_kerja2' => $this->input->post('tanggal_kerja2'),
        );
        $this->m_alumni->edit_data('data_diri', $data, array('id_level' => $this->session->userdata('id_level')));
        redirect(base_url('Alumni/bekerja/'));
    }

//Event
    public function event()
    {
        $this->load->model('M_alumni');
        $data['data_event'] = $this->m_alumni->get_data('tabel_event');
        $this->load->view('alumni/event/event', $data);
    }

    public function upload_img_event($value)
    {
        $kode = round(microtime(true) * 1000);
        $config['upload_path'] = './uploads/alumni/event/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '100000';
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

    public function aksi_tambah_event()
    {
        $gambar = $this->upload_img_event('gambar');
        if($gambar[0]==false)
        {
            //$this->upload->display_errors();
            $this->session->set_flashdata('error', 'gagal upload gambar.');
            redirect(base_url('Alumni/event'));
        }
        else {
        $data = array
        (
            'id_user' => $this->input->post('id_user'),
            'event_title' => $this->input->post('event_title'),
            'event_slug' => strtolower($this->input->post('event_title')),
            'deskripsi' => $this->input->post('deskripsi'),
            'tanggal_event' => $this->input->post('tanggal_event'),
            'tanggal_posting' => date("Y-m-d H:i:s"),
            'gambar' => $gambar[1]
        );
        $event = $this->m_alumni->input_data('tabel_event', $data);
        if ($event) {
            $this->session->set_flashdata('sukses', 'berhasil');
            redirect(base_url('alumni/event/event'));
        } else {
            $this->session->set_flashdata('error', 'gagal..');
            redirect(base_url('alumni/event/tambah_event'));
        }
    }
    }

    public function aksi_edit_event()
    {
        // echo '<script>console.log("Hola")</script>';
        $gambar = $this->upload_img_event('gambar');
        if($gambar[0]==false)
        {
            //$this->upload->display_errors();
            $this->session->set_flashdata('error', 'gagal upload gambar.');
            redirect(base_url('Alumni/event'));
        }
        else {
        $data = array
        (
            'id_user' => $this->input->post('id_user'),
            'event_title' => $this->input->post('event_title'),
            'event_slug' => strtolower($this->input->post('event_title')),
            'deskripsi' => $this->input->post('deskripsi'),
            'tanggal_event' => $this->input->post('tanggal_event'),
            'tanggal_posting' => date("Y-m-d H:i:s"),
            'gambar' => $gambar[1]
        );
        $event=$this->m_alumni->edit_data('tabel_event', $data, array('id_event'=>$this->input->post('id_event')));
        if($event)
        {
            $this->session->set_flashdata('sukses', 'berhasil');
            redirect(base_url('alumni/event/event'));
        }
        else
        {
            $this->session->set_flashdata('error', 'gagal..');
            redirect(base_url('alumni/event/edit_event'.$this->input->post('id_event')));
        }
    }
    }

    public function hapus_event($id_event)
    {
        $hapus=$this->m_alumni->delete_data('tabel_event', 'id_event', $id_event);
        if($hapus)
        {
            $this->session->set_flashdata('sukses', 'berhasil');
            redirect(base_url('alumni/event/event'));
        }
        else
        {
            $this->session->set_flashdata('error', 'gagal..');
            redirect(base_url('alumni/event/event/'.$this->input->post('id_event')));
        }
    }

//
    public function testimoni()
    {
        $data['testimoni']=$this->m_alumni->get_testimoni_byId('tabel_testimoni')->result();
        $this->load->view('alumni/testimoni/testimoni', $data);
    }
    

    public function delete_testimoni($id_testimoni)
    {
        $hapus=$this->m_alumni->delete_testimoni('tabel_testimoni', 'id_testimoni', $id_testimoni);
        if($hapus)
        {
            $this->session->set_flashdata('sukses', 'Berhasil..');
            redirect(base_url('Alumni/testimoni'));
        }
        else
        {
            $this->session->set_flashdata('error', 'gagal..');
            redirect(base_url('Alumni/testimoni/error'));
        }

    }

    public function aksi_tambah_testimoni()
    {
        $data = array
        (
            'id_alumni' => $this->input->post('id_alumni'),
            'pesan' => $this->input->post('pesan'),
            'tampil' => 'tidak',
        );
        $masuk=$this->m_alumni->tambah_testimoni('tabel_testimoni', $data);
        if($masuk)
        {
            $this->session->set_flashdata('sukses', 'berhasil');
            redirect(base_url('Alumni/testimoni'));
        }
        else
        {
            $this->session->set_flashdata('error', 'gagal..');
            redirect(base_url('Alumni/testimoni'));
        }
    }

}