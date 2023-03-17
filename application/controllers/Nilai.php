<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nilai extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_nilai');
        $this->load->model('m_akademik');
        $this->load->model('m_keuangan');
        $this->load->helpers('my_helper');
        // $this->load->library('excel');
        if ($this->session->userdata('status_nilai')!='login') {
            redirect(base_url('Login'));
        }
    }
    
    public function index()
    {
        $data['total_kelas'] = $this->m_akademik->total_kelas();
        $data['total_mapel'] = $this->m_akademik->total_mapel();
        $data['total_siswa'] = $this->m_akademik->total_siswa();
        $data['total_guru'] = $this->m_akademik->total_guru();
        $data['ta'] = $this->m_akademik->get_tahun_ajaran();
        $this->load->view('nilai/dashboard', $data);
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
            'id_rombel' => $this->input->post('id_rombel'),
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
        $data['mapel'] = $this->m_keuangan->ambil('tabel_alokasiguru',array('kode_guru'=>$this->session->userdata('kode_guru')))->result();
        $this->load->view('nilai/nilai/modul_input_nilai', $data);
    }

    public function data_input($idm)
    {
        $array = array(
            'id_mapel' => $idm
        );
        $this->session->set_userdata($array);
        redirect('Nilai/data_mapel');
    }

    public function data_mapel()
    {
        if(!empty($this->session->userdata('id_mapel'))) {
           $idm = $this->session->userdata('id_mapel');

           $data['mapel'] = $this->m_keuangan->ambil('tabel_alokasiguru',array('kode_guru'=>$this->session->userdata('kode_guru')))->result();
           $data['alokasimapel'] = $this->m_nilai->data_nilai($idm)->result();
           $data['content'] = 'nilai/entry';

           $this->load->view('nilai/nilai/input_mapel', $data);
        }else{
            redirect('/nilai');
        }
    }

// Data Nilai
public function data_nilai_siswa($id_mapel, $id_rombel, $id_semester)
{
    $data['data']=$this->m_nilai->get_data_nilai($id_mapel, $id_rombel, $id_semester)->result();
    $data['rombel']=$this->m_nilai->get_rombelByid($id_rombel)->result();
    $data['mapel']=$this->m_nilai->get_mapelByid($id_mapel)->result();
    $data['semester']=$this->m_nilai->get_semesterByid($id_semester)->result();
    $this->load->view('nilai/data_nilai/data_nilai_siswa', $data);
}

    public function modul_data_nilai()
    {
        $data['mapel'] = $this->m_keuangan->ambil('tabel_alokasiguru',array('kode_guru'=>$this->session->userdata('kode_guru')))->result();
        $this->load->view('nilai/data_nilai/modul_data_nilai_siswa', $data);
    }

    public function modul_data_nilai_filter($id_mapel)
    {
        $data['mapel'] = $this->m_keuangan->ambil('tabel_alokasiguru',array('kode_guru'=>$this->session->userdata('kode_guru')))->result();
        // $data['mapel'] = $this->m_akademik->get_mapel('tabel_mapel');
        $alokasimapel['alokasi']=$this->m_nilai->get_alokasimapelByIdMapel($id_mapel)->result();
        $this->load->view('nilai/data_nilai/modul_data_nilai_siswa_filter', $data + $alokasimapel);
    }
    
    // public function modul_data_nilai_by()
    // {
    //     $data['mapel'] = $this->m_akademik->get_mapel('tabel_mapel');
    //     $this->load->view('nilai/data_nilai/modul_data_nilai_siswa', $data + $alokasimapel);
    // }
    
    // public function get_alokasi_mapel($id_mapel)
    // {
    //     $this->m_nilai->get_alokasi_mapel('tabel_alokasimapel', 'id_mapel', $id_mapel);
    //     redirect(base_url('Nilai/modul_data_nilai'));
    // }

// Raport
    public function cetak_raport()
    {
        $this->load->model('m_keuangan');
	    $cek = $this->m_nilai->cek_wali()->num_rows();
	    if ($cek > 0) {
            $data['rombel'] = $this->m_nilai->get_rombel_raport()->result();    	
	    }else{
	    	$this->session->set_flashdata('denided', 
            '<div class="alert alert-danger">
                <h4>Maaf</h4>
                <p>Menu Cetak Raport hanya tersedia bagi Wali Kelas.</p>
                <p>Hubungi Administrator untuk proses lebih lanjut.</p>
            </div>');
			$data['content'] = 'denided';
	    }
        $data['siswaPerRombel'] = $this->m_keuangan->ambil('tabel_siswa','id_rombel')->row();
        $data['rombelPerWakel'] = $this->m_keuangan->ambil('tabel_rombel',array('kode_guru'=>$this->session->userdata('kode_guru')))->row();
        $data['dt'] = $this->m_keuangan->ambil('tabel_level',array('id_level'=>$this->session->userdata('id_level')))->row();
        $this->load->view('nilai/raport/raport', $data);
    }

	public function get_siswa($id)
	{
		$data = $this->m_nilai->entrynew($id)->result();
		echo json_encode($data);
	}

	public function raportpdf($ids,$idr,$smt)
	{
		$cek = $this->m_nilai->nps($ids,$idr,$smt)->num_rows();
		// if (empty($cek)) {
		// 	$this->session->set_flashdata('msg',
        //     '<div class="alert alert-danger">
        //         <h4>Maaf</h4>
        //         <p>Data Tidak Ditemukan.</p>
        //     </div>');
		// 	redirect('Nilai/cetak_raport','refresh');
		// }else{
			$nama = $this->m_nilai->get_n($ids);
			$rombel = $this->m_nilai->get_r($idr);
			foreach ($nama->result() as $key) {
				$data['nama'] = $key->nama;
			}
			foreach ($rombel->result() as $key1) {
				$data['rombel'] = $key1->nama_rombel;
			}
			$data['data'] = $this->m_nilai->nps($ids,$idr,$smt)->result();	
			if ($this->uri->segment(6) == "pdf") {
                $this->load->library('pdf');
				$this->pdf->load_view('nilai/raport/cetakraport', $data);
				$this->pdf->render();
				$this->pdf->stream($data['nama']." ".$data['rombel']." Semester ".$smt.".pdf", array("Attachment" => false));		
			}else{
				$this->load->view('nilai/raport/cetakraportexcel', $data);
			}
		// }
	}
}