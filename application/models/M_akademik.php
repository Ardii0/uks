<?php

class M_akademik extends CI_Model{
// Global Model
    public function get($table)
    {
        return $this->db->get($table)->result();
    }

    public function getwhere($table, $where)
    {
        $data=$this->db->where($where)->get($table);
        return $data;
    }

    public function getone($table, $data)
    {
        $this->db->select($data);
        $this->db->from($table);
        $this->db->limit(1);
        $query = $this->db->get();
        $result = $query->num_rows();
        return $result;
    }

    public function add($table, $data)
    {
        $this->db->insert($table, $data);
        return $this->db->insert_id();
    }

    public function update($table, $data, $where)
    {
        $data=$this->db->update($table, $data, $where);
        return $this->db->affected_rows();
    }

    public function delete($table, $field, $id_kelas)
    {
        $data=$this->db->delete($table, array($field => $id_kelas));
        return $data;
    }

// Home Dashboard
    public function total_kelas()
  {
    return $this->db->where('status','AKTIF')->get('tabel_kelas')->num_rows();
  }

    public function total_mapel()
  {
    return $this->db->where('status','AKTIF')->get('tabel_mapel')->num_rows();
  }

    public function total_siswa()
  {
    return $this->db->where('diterima','A')->get('tabel_daftar')->num_rows();
  }

    public function total_guru()
  {
    return $this->db->where('status','AKTIF')->get('tabel_guru')->num_rows();
  }
// Tahun Ajar
    public function get_tahun_ajaran()
	{
		return $this->db->get('tabel_tahunajaran')->result();
	}

    public function get_tahun_ajaran_aktif()
	{
		return $this->db->where('status','AKTIF')->get('tabel_tahunajaran')->result();
	}

    public function get_taById($tabel, $id_angkatan)
    {
        $data=$this->db->where('id_angkatan', $id_angkatan)->get($tabel);
        return $data;
    }

    public function tambah_ta($tabel, $data)
    {
        $this->db->insert($tabel, $data);
        return $this->db->insert_id();
    }

    public function ubah_ta($tabel, $data, $where)
    {
        $data=$this->db->update($tabel, $data, $where);
        return $this->db->affected_rows();
    }

    public function hapus_ta($tabel, $field, $id_angkatan)
    {
        $data=$this->db->delete($tabel, array($field => $id_angkatan));
        return $data;
    }

// Paket Jenjang
    public function get_paketjenjang()
	{
		return $this->db->get('tabel_paketjenjang')->result();
	}

// Jenjang
    public function get_jenjang()
	{
		return $this->db->get('tabel_jenjang')->result();
	}

    public function get_jenjangById($tabel, $id_jenjang)
    {
        $data=$this->db->where('id_jenjang', $id_jenjang)->get($tabel);
        return $data;
    }

    public function tambah_jenjang($tabel, $data)
    {
        $this->db->insert($tabel, $data);
        return $this->db->insert_id();
    }

    public function ubah_jenjang($tabel, $data, $where)
    {
        $data=$this->db->update($tabel, $data, $where);
        return $this->db->affected_rows();
    }

    public function hapus_jenjang($tabel, $field, $id_jenjang)
    {
        $data=$this->db->delete($tabel, array($field => $id_jenjang));
        return $data;
    }

// Guru
    public function get_guru()
	{
		return $this->db->get('tabel_guru')->result();
	}

    public function get_guruById($tabel, $id_guru)
    {
        $data=$this->db->where('kode_guru', $id_guru)->get($tabel);
        return $data;
    }

    public function tambah_guru($tabel, $data)
    {
        $this->db->insert($tabel, $data);
        return $this->db->insert_id();
    }

    public function ubah_guru($tabel, $data, $where)
    {
        $data=$this->db->update($tabel, $data, $where);
        return $this->db->affected_rows();
    }

    public function hapus_guru($tabel, $field, $id_guru)
    {
        $data=$this->db->delete($tabel, array($field => $id_guru));
        return $data;
    }

// Siswa
    public function get_siswa()
    {
        return $this->db->get('tabel_siswa')->result();
    }

    public function exportSiswa() {
        $this->db->select(array('nama', 'id_siswa', 'id_kelas'));
        $this->db->from('tabel_siswa');
        $query = $this->db->get();
        return $query->result();
    }

    public function export_siswa_kelas($id_kelas) {
        $this->db->select(array('nama', 'id_siswa', 'id_kelas'));
        $this->db->from('tabel_siswa');
        $this->db->where('id_kelas', $id_kelas);
        $query = $this->db->get();
        return $query->result();
    }

    public function filterByKelas($id_kelas){
        if ($id_kelas != null) {
          $query = $this->db->query("SELECT * from tabel_siswa where id_kelas = '$id_kelas' ");
        } else {
          $query = $this->db->query("SELECT * from tabel_siswa");
        }

        return $query->result();
	}

    public function get_filter_kelas($tabel, $id_rombel)
	{
		$data=$this->db->where('id_kelas', $id_rombel)->get($tabel);
		return $data;
	}

    public function get_siswaById($tabel, $id_siswa)
    {
        $data=$this->db->where('id_siswa', $id_siswa)->get($tabel);
        return $data;
    }

    public function ubah_siswa($tabel, $data, $where)
    {
        $data=$this->db->update($tabel, $data, $where);
        return $this->db->affected_rows();
    }

    public function hapus_siswa($tabel, $field, $id_siswa)
    {
        $data=$this->db->delete($tabel, array($field => $id_siswa));
        return $data;
    }

    public function tambah_pindah_sekolah($tabel, $data)
    {
        $this->db->insert($tabel, $data);
        return $this->db->insert_id();
    }

    public function tambah_pindah_kelas($tabel, $data)
    {
        $this->db->insert($tabel, $data);
        return $this->db->insert_id();
    }

    public function tambah_lulus($tabel, $data)
    {
        $this->db->insert($tabel, $data);
        return $this->db->insert_id();
    }


    public function get_siswaperkelas($tabel, $id_kelas)
    {
        $data=$this->db->where('id_kelas', $id_kelas)->get($tabel);
        return $data;
    }


    public function get_pindah()
    {
        return $this->db->get('tabel_pindah')->result();
    }
    public function get_lulus()
    {
        return $this->db->get('tabel_lulus')->result();
    }

// Pendaftaran Siswa
    public function exportList() {
        $this->db->where('diterima','P')->select(array('no_reg', 'id_angkatan', 'id_jenjang', 'tgl_daftar', 'asal_sekolah', 'nisn', 'nama', 'nik', 'kk', 'jekel', 'tempat_lahir', 'anak_ke', 'ayah', 'ibu', 'tgl_lahir', 'agama', 'alamat', 'telepon'));
        $this->db->from('tabel_daftar');
        $query = $this->db->get();
        return $query->result();
    }
    public function get_siswa_pendaftaran()
	{
		return $this->db->where('diterima','P')->get('tabel_daftar')->result();
	}
    public function insert_batch($data){
		$this->db->insert_batch('tabel_daftar',$data);
		if($this->db->affected_rows()>0)
		{
			return 1;
		}
		else{
			return 0;
		}
	}
    public function insert($data){
		$insert = $this->db->insert_batch('tabel_daftar', $data);
		if($insert){
			return true;
		}
	}
	public function getData(){
		$this->db->select('*');
		return $this->db->get('tabel_daftar')->result_array();
	}
    public function tambah_pendaftaran($tabel, $data)
	{
		$this->db->insert($tabel, $data);
		return $this->db->insert_id();
	}
    public function get_daftarById($tabel, $id_daftar)
    {
        $data=$this->db->where('id_daftar', $id_daftar)->get($tabel);
        return $data;
    }
    public function edit_pendaftaran($tabel, $id_daftar)
	{
		$data=$this->db->where('id_daftar', $id_daftar)->get($tabel);
		return $data;
	}
    public function ubah_pendaftaran($tabel, $data, $where)
	{
		$data=$this->db->update($tabel, $data, $where);
		return $this->db->affected_rows();
	}
    public function hapus_pendaftaran($tabel, $field, $id_daftar)
	{
		$data=$this->db->delete($tabel, array($field => $id_daftar));
		return $data;
	}
    public function filterByJenjang($nama_jenjang){
        if ($nama_jenjang != null) {
          $query = $this->db->query("SELECT * from tabel_daftar where diterima = 'S' AND id_jenjang = '$nama_jenjang' ORDER BY tgl_daftar ASC ");
        } else {
          $query = $this->db->query("SELECT * from tabel_daftar");
        }

        return $query->result();
	}
    public function get_filter($tabel, $id_daftar)
	{
		$data=$this->db->where('id_jenjang', $id_daftar)->get($tabel);
		return $data;
	}

// Seleksi Pendaftaran Siswa
    public function terima_siswa($tabel, $data)
	{
		$this->db->insert($tabel, $data);
		return $this->db->insert_id();
	}

    public function ubah_seleksi($tabel, $data, $where)
	{
		$data=$this->db->update($tabel, $data, $where);
		return $this->db->affected_rows();
	}

    public function hapus_seleksi_siswa($tabel, $field, $id_siswa)
	{
		$data=$this->db->delete($tabel, array($field => $id_siswa));
		return $data;
	}
// Pembagian Kelas
    public function get_siswa_diterima()
    {
        return $this->db->where('diterima','S')->get('tabel_daftar')->result();
    }

    public function ubah_siswa_diterima($tabel, $data, $where)
    {
        $data=$this->db->update($tabel, $data, $where);
        return $this->db->affected_rows();
    }
    
// Pelajaran
 // Mapel
    public function get_mapel()
	{
		return $this->db->get('tabel_mapel')->result();
	}

    public function get_mapelById($tabel, $id_mapel)
    {
        $data=$this->db->where('id_mapel', $id_mapel)->get($tabel);
        return $data;
    }

    public function tambah_mapel($tabel, $data)
    {
        $this->db->insert($tabel, $data);
        return $this->db->insert_id();
    }

    public function ubah_mapel($tabel, $data, $where)
    {
        $data=$this->db->update($tabel, $data, $where);
        return $this->db->affected_rows();
    }

    public function hapus_mapel($tabel, $field, $id_mapel)
    {
        $data=$this->db->delete($tabel, array($field => $id_mapel));
        return $data;
    }

 // Jenis Mapel
    public function get_jenismapel()
	{
		return $this->db->get('tabel_jenismapel')->result();
	}

    public function get_jenismapelById($tabel, $id_jenismapel)
    {
        $data=$this->db->where('id_jenismapel', $id_jenismapel)->get($tabel);
        return $data;
    }

    public function tambah_jenismapel($tabel, $data)
    {
        $this->db->insert($tabel, $data);
        return $this->db->insert_id();
    }

    public function ubah_jenismapel($tabel, $data, $where)
    {
        $data=$this->db->update($tabel, $data, $where);
        return $this->db->affected_rows();
    }

    public function hapus_jenismapel($tabel, $field, $id_jenismapel)
    {
        $data=$this->db->delete($tabel, array($field => $id_jenismapel));
        return $data;
    }

// Alokasi
 // Alok Guru
    public function get_alokasiguru()
    {
        return $this->db->get('tabel_alokasiguru')->result();
    }

    public function get_alokasiguruByIdGuru($tabel, $kode_guru)
    {
        $data = $this->db->where('kode_guru', $kode_guru)->get($tabel)->result();
        return $data;
    }

    public function tambah_alokasiguru($tabel, $data, $where)
    {
        $this->db->insert($tabel, $data, $where);
        return $this->db->insert_id();
    }

    public function ubah_alokasiguru($tabel, $data, $where)
    {
        $data=$this->db->update($tabel, $data, $where);
        return $this->db->affected_rows();
    }

    public function hapus_alokasiguru($tabel, $field, $id_alokasiguru)
    {
        $data=$this->db->delete($tabel, array($field => $id_alokasiguru));
        return $data;
    }
 // Alok Mapel
  public function get_alokasimapel()
    {
        return $this->db->get('tabel_alokasimapel')->result();
    }
    public function get_alokasimapelByIdMapel($tabel, $id_mapel)
    {
        $data = $this->db->where('id_mapel', $id_mapel)->get($tabel)->result();
        return $data;
    }
    public function tambah_alokasimapel($tabel, $data, $where)
    {
        $this->db->insert($tabel, $data, $where);
        return $this->db->insert_id();
    }
    public function hapus_alokasimapel($tabel, $field, $id_alokasimapel)
    {
        $data=$this->db->delete($tabel, array($field => $id_alokasimapel));
        return $data;
    }

    // Akun
	public function get_userByLogin($table)
	{
		$data = $this->db->get_where('tabel_level', array('id_level' => $this->session->userdata('id_level')));
		return $data;
	}
    public function edit_data($tabel, $data, $where)
    {
        $data=$this->db->update($tabel, $data, $where);
        return $this->db->affected_rows();
    }
}