<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nilai extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_nilai');
        $this->load->model('m_akademik');
        $this->load->helpers('my_helper');
        // $this->load->library('excel');
        if ($this->session->userdata('status_nilai')!='login') {
            redirect(base_url('Login'));
        }
    }
    
    public function index()
    {
        $this->load->view('nilai/dashboard');
    }

// Data Nilai
    public function data_keselurahan_nilai_siswa()
    {
        $this->load->view('nilai/data_nilai/data_keselurahan_nilai_siswa');
    }

    public function modul_data_nilai_siswa()
    {
        $this->load->view('nilai/data_nilai/modul_data_nilai_siswa');
    }
    
// Nilai
 // Entry
    public function session($idm,$idr,$smt)
    {
        $array = array(
            'id_mapel' => $idm,
            'id_rombel' => $idr,
            'id_semester' => $smt
        );
        $this->session->set_userdata($array);
        redirect('nilai/entry');
    }
    
    public function input_session($idm,$idr,$smt,$ids)
    {
        $array = array(
            'id_mapel' => $idm,
            'id_rombel' => $idr,
            'id_semester' => $smt,
            'id_siswa' => $ids
        );
        $this->session->set_userdata($array);
        redirect('nilai/entry_nilai');
    }

    public function entry()
    {
        if(!empty($this->session->userdata('id_mapel'))) {
           $idm = $this->session->userdata('id_mapel');
           $idr = $this->session->userdata('id_rombel');
           $smt = $this->session->userdata('id_semester');

           $data['row'] = $this->m_nilai->entry($idr)->result();
           $data['mapel'] = $this->m_nilai->mapel($idm)->result();
           $data['mapelById'] = $this->m_nilai->mapelById($idm)->result();
           $data['rombel'] = $this->m_nilai->rombel($idr)->result();
           $data['semester'] = $this->m_nilai->semester($smt)->result();
           $data['content'] = 'nilai/entry';

           $this->load->view('nilai/nilai/entry_nilai', $data);
        }else{
            redirect('/nilai');
        }
    }

    public function entry_nilai()
    {
        if(!empty($this->session->userdata('id_mapel'))) {
           $idm = $this->session->userdata('id_mapel');
           $idr = $this->session->userdata('id_rombel');
           $smt = $this->session->userdata('id_semester');
           $ids = $this->session->userdata('id_siswa');

           $data['row'] = $this->m_nilai->entry($idr)->result();
           $data['mapel'] = $this->m_nilai->mapel($idm)->result();
           $data['mapelById'] = $this->m_nilai->mapelById($idm)->result();
           $data['rombel'] = $this->m_nilai->rombel($idr)->result();
           $data['semester'] = $this->m_nilai->semester($smt)->result();
           $data['siswa'] = $this->m_nilai->get_nilaiBySiswa('tabel_siswa', $ids);
           $data['content'] = 'nilai/entry';

           $this->load->view('nilai/nilai/entry_nilai_input', $data);
        }else{
            redirect('/nilai');
        }
    }

    public function tambah_nilai()
    {
        $nuh1 = $this->input->post('nuh1');
        $nuh2 = $this->input->post('nuh2');
        $nuh3 = $this->input->post('nuh3');
        $nt1 = $this->input->post('nt1');
        $nt2 = $this->input->post('nt2');
        $nt3 = $this->input->post('nt3');
        $mid = $this->input->post('mid');
        $smt = $this->input->post('smt');
        $rnuh = ($nuh1 + $nuh2 + $nuh3) / 3;
        $rnt = ($nt1 + $nt2 + $nt3) / 3;
        $nh = ($rnuh + $rnt) / 2;
        $nar = ($nh + $mid + $smt) / 3;
        $this->m_nilai->tambah_nilai('tabel_nilai',
        array(
            'id_siswa' => $this->input->post('id_siswa'),
            'id_mapel' => $this->input->post('id_mapel'),
            'id_semester' => $this->input->post('id_semester'),
            'nuh1' => $nuh1,
            'nuh2' => $nuh2,
            'nuh3' => $nuh3,
            'nt1' => $nt1,
            'nt2' => $nt2,
            'nt3' => $nt3,
            'mid' => $mid,
            'smt' => $smt,
            'rnuh' => $rnuh,
            'rnt' => $rnt,
            'nh' => $nh,
            'nar' => $nar,
        )
    );
        redirect(base_url('Nilai/modul_input_nilai'));
    }

 // Modul
    public function modul_input_nilai()
    {
        $data['mapel'] = $this->m_akademik->get_mapel('tabel_mapel');
        $this->load->view('nilai/nilai/modul_input_nilai', $data);
    }
}