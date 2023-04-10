<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PetugasAlumni extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_alumni');
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
            'status' => 'aktif',
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


    public function show_event($id_event)
    {
        $data = "";
        if ($data->status == 'aktif') {
            $data = array
            (
                'status' => "nonaktif",
            );
        } elseif ($data->status == 'nonaktif') {
            $data = array
            (
                'status' => "aktif",
            );
        }

        $show=$this->m_alumni->edit_data('tabel_event', $data, array('id_event'=>$this->input->post('id_event')));
        if($show)
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
}