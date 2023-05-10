<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kegiatan extends CI_Controller {

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
        $data['kegiatan'] = $this->Main_model->get('kegiatan_uks')->result();
        $this->load->view('kegiatan/index', $data);
    }

    public function upload_foto_kegiatan($value)
    {
        $code = round(microtime(true) * 1000);
        $config['upload_path'] = './uploads/kegiatan_uks/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['overwrite'] = TRUE;
        $config['max_size'] = '100000';
        $config['file_name'] = $code;
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

    public function tambah_kegiatan()
    {
        $foto = $this->upload_foto_kegiatan('foto'); 
        if($foto[0] == false) 
        {
            redirect(base_url('Kegiatan/')); 
        } else {
            $data = [
                'nama_kegiatan' => $this->input->post('nama_kegiatan'),
                'tanggal_mulai' => $this->input->post('tanggal_mulai'),
                'tanggal_akhir' => $this->input->post('tanggal_akhir'),
                'deskripsi' => $this->input->post('deskripsi'),
                'foto' => $foto[1],
            ];
            $this->Main_model->insert_data($data, 'kegiatan_uks');
            redirect(base_url('Kegiatan/'));
        } 
    }

    public function edit_kegiatan($id)
    {
        $where = array('id' => $id);
        $data['kegiatan'] = $this->Main_model->getwhere($where, 'kegiatan_uks')->row_array();
        $this->load->view('kegiatan/edit', $data);
    }

    public function update($id)
    {
        $where = array('id' => $id);
        $foto = $this->upload_foto_kegiatan('foto');
        if($foto[0]==false) {
            echo $this->upload->display_errors();
        } else {
            $data = [
                'nama_kegiatan' => $this->input->post('nama_kegiatan'),
                'tanggal_mulai' => $this->input->post('tanggal_mulai'),
                'tanggal_akhir' => $this->input->post('tanggal_akhir'),
                'deskripsi' => $this->input->post('deskripsi'),
                'foto' => $foto[1],
            ];
            $masuk = $this->Main_model->update_data($where, $data, 'kegiatan_uks');
            if($masuk)
            {
                $this->session->set_flashdata('sukses', 'berhasil');
                redirect(base_url('Kegiatan/'));
            }
            else
            {
                $this->session->set_flashdata('error', 'gagal..');
                redirect(base_url('Kegiatan/'.$id));
            }
        }
    }

    public function delete($id)
    {
        $where = array('id' => $id);
        $_id = $this->Main_model->getwhere($where, 'kegiatan_uks')->row();
        if ($this->Main_model->delete_data($where, 'kegiatan_uks')) {
            if ($_id->foto != '') {
                unlink('./uploads/kegiatan_uks/'.$_id->foto);
            }
        }
        redirect(base_url('Kegiatan/'));
    }

}