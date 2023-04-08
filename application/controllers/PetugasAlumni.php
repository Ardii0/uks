<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PetugasAlumni extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_alumni');
        $this->load->model('m_petugasalumni');
        $this->load->helpers('my_helper');
        if ($this->session->userdata('status_petugasalumni')!='login') {
            redirect(base_url());
        }
    }

    public function index()
    {
        $this->load->view('petugasalumni/dashboard');
    }

    
//Event
    public function event()
    {
        $this->load->model('M_alumni');
        $data['data_event'] = $this->m_alumni->get_data('tabel_event');
        $this->load->view('petugasalumni/event/event', $data);
    }

    public function upload_img_event($value)
    {
        $kode = round(microtime(true) * 1000);
        $config['upload_path'] = './uploads/petugasalumni/event/';
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
            redirect(base_url('petugasAlumni/event'));
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
            redirect(base_url('petugasalumni/event/event'));
        } else {
            $this->session->set_flashdata('error', 'gagal..');
            redirect(base_url('petugasalumni/event/tambah_event'));
        }
    }
    }

    public function aksi_edit_event()
    {
        // echo '<script>console.log("Hola")</script>';
        $gambar = $this->upload_img_event('gambar');
        if($gambar[0]==false)
        {
            $data = array
            (
                'id_user' => $this->input->post('id_user'),
                'event_title' => $this->input->post('event_title'),
                'event_slug' => strtolower($this->input->post('event_title')),
                'deskripsi' => $this->input->post('deskripsi'),
                'tanggal_event' => $this->input->post('tanggal_event'),
                'tanggal_posting' => date("Y-m-d H:i:s"),
            );
            $event=$this->m_alumni->edit_data('tabel_event', $data, array('id_event'=>$this->input->post('id_event')));
            if($event)
            {
                $this->session->set_flashdata('sukses', 'berhasil');
                redirect(base_url('petugasalumni/event/event'));
            }
            else
            {
                $this->session->set_flashdata('error', 'gagal..');
                redirect(base_url('petugasalumni/event/edit_event'.$this->input->post('id_event')));
            }
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
            redirect(base_url('petugasalumni/event/event'));
        }
        else
        {
            $this->session->set_flashdata('error', 'gagal..');
            redirect(base_url('petugasalumni/event/edit_event'.$this->input->post('id_event')));
        }
    }
    }

    public function hapus_event($id_event)
    {
        $hapus=$this->m_alumni->delete_data('tabel_event', 'id_event', $id_event);
        if($hapus)
        {
            $this->session->set_flashdata('sukses', 'berhasil');
            redirect(base_url('petugasalumni/event/event'));
        }
        else
        {
            $this->session->set_flashdata('error', 'gagal..');
            redirect(base_url('petugasalumni/event/event/'.$this->input->post('id_event')));
        }
    }

// Bursa Kerja
    public function upload_img($value)
    {
        $kode = round(microtime(true) * 1000);
        $config['upload_path'] = './uploads/petugas_alumni/bursa_kerja/';
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
    
    public function bursa_kerja()
    {
        $data['bursa_kerja'] = $this->m_petugasalumni->get('tabel_lowongan')->result();
        $this->load->view('petugasalumni/bursa_kerja/bursa_kerja', $data);
    }

    public function tambah_bursa_kerja()
    {
        $data['dt'] = $this->m_petugasalumni->getwhere('tabel_level',array('id_level'=>$this->session->userdata('id_level')))->row();
        $this->load->view('petugasalumni/bursa_kerja/tambah_bursa_kerja', $data);
    }

    public function aksi_tambah_bursa_kerja()
    {
        $gambar = $this->upload_img('gambar');
        if($gambar[0]==false)
        {
            $data = array
            (
                'gambar' => null,
                'id_user' => $this->input->post('id_user'),
                'nama_perusahaan' => $this->input->post('nama_perusahaan'),
                'bidang_usaha' => $this->input->post('bidang_usaha'),
                'job_title' => $this->input->post('job_title'),
                'deskripsi' => $this->input->post('deskripsi'),
                'akhir_waktu' => $this->input->post('akhir_waktu'),
                'is_tampil' => $this->input->post('is_tampil'),
            );


            $masuk=$this->m_petugasalumni->input_data('tabel_lowongan', $data);
            if($masuk)
            {
                $this->session->set_flashdata('sukses', 'berhasil');
                redirect(base_url('PetugasAlumni/bursa_kerja'));
            }
            else
            {
                $this->session->set_flashdata('error', 'gagal..');
                redirect(base_url('PetugasAlumni/tambah_bursa_kerja'));
            }
        }
        else
        {
            $data = array
            (
                'gambar' => $gambar[1],
                'id_user' => $this->input->post('id_user'),
                'nama_perusahaan' => $this->input->post('nama_perusahaan'),
                'bidang_usaha' => $this->input->post('bidang_usaha'),
                'job_title' => $this->input->post('job_title'),
                'deskripsi' => $this->input->post('deskripsi'),
                'akhir_waktu' => $this->input->post('akhir_waktu'),
                'is_tampil' => $this->input->post('is_tampil'),
            );


            $masuk=$this->m_petugasalumni->input_data('tabel_lowongan', $data);
            if($masuk)
            {
                $this->session->set_flashdata('sukses', 'berhasil');
                redirect(base_url('PetugasAlumni/bursa_kerja'));
            }
            else
            {
                $this->session->set_flashdata('error', 'gagal..');
                redirect(base_url('PetugasAlumni/tambah_bursa_kerja'));
            }
        }
    }

    public function edit_bursa_kerja($id_lowongan)
    {
        $data['dt'] = $this->m_petugasalumni->getwhere('tabel_level',array('id_level'=>$this->session->userdata('id_level')))->row();
        $data['bursa_kerja'] = $this->m_petugasalumni->get_data_id('tabel_lowongan', 'id_lowongan', $id_lowongan)->result();
        $this->load->view('petugasalumni/bursa_kerja/edit_bursa_kerja', $data);
    }

    public function aksi_edit_bursa_kerja()
    {
        $gambar = $this->upload_img('gambar');
        if($gambar[0]==false)
        {
            $data = array
            (
                'gambar' => null,
                'id_user' => $this->input->post('id_user'),
                'nama_perusahaan' => $this->input->post('nama_perusahaan'),
                'bidang_usaha' => $this->input->post('bidang_usaha'),
                'job_title' => $this->input->post('job_title'),
                'deskripsi' => $this->input->post('deskripsi'),
                'akhir_waktu' => $this->input->post('akhir_waktu'),
                'is_tampil' => $this->input->post('is_tampil'),
            );


            $masuk=$this->m_petugasalumni->edit_data('tabel_lowongan', $data, array('id_lowongan'=>$this->input->post('id_lowongan')));
            if($masuk)
            {
                $this->session->set_flashdata('sukses', 'berhasil');
                redirect(base_url('PetugasAlumni/bursa_kerja'));
            }
            else
            {
                $this->session->set_flashdata('error', 'gagal..');
                redirect(base_url('PetugasAlumni/tambah_bursa_kerja'));
            }
        }
        else
        {
            $data = array
            (
                'gambar' => $gambar[1],
                'id_user' => $this->input->post('id_user'),
                'nama_perusahaan' => $this->input->post('nama_perusahaan'),
                'bidang_usaha' => $this->input->post('bidang_usaha'),
                'job_title' => $this->input->post('job_title'),
                'deskripsi' => $this->input->post('deskripsi'),
                'akhir_waktu' => $this->input->post('akhir_waktu'),
                'is_tampil' => $this->input->post('is_tampil'),
            );


            $masuk=$this->m_petugasalumni->edit_data('tabel_lowongan', $data, array('id_lowongan'=>$this->input->post('id_lowongan')));
            if($masuk)
            {
                $this->session->set_flashdata('sukses', 'berhasil');
                redirect(base_url('PetugasAlumni/bursa_kerja'));
            }
            else
            {
                $this->session->set_flashdata('error', 'gagal..');
                redirect(base_url('PetugasAlumni/tambah_bursa_kerja'));
            }
        }
    }

    public function hapus_bursa_kerja($id_lowongan)
    {
        $this->m_petugasalumni->delete_data('tabel_lowongan', 'id_lowongan', $id_lowongan);
        redirect(base_url('PetugasAlumni/bursa_kerja'));
    }

}