<?php

class M_akademik extends CI_Model{
// Home Dashboard
    public function total_kelas()
  {
    return $this->db->get('tabel_kelas')->num_rows();
  }

    public function total_mapel()
  {
    return $this->db->get('tabel_mapel')->num_rows();
  }

    public function total_siswa()
  {
    return $this->db->get('tabel_siswa')->num_rows();
  }

    public function total_guru()
  {
    return $this->db->get('tabel_guru')->num_rows();
  }
// Tahun Ajar
    public function get_tahun_ajaran()
	{
		return $this->db->get('tabel_tahunajaran')->result();
	}

    public function get_tahun_ajaran_aktif()
	{
		return $this->db->where('aktif','1')->get('tabel_tahunajaran')->result();
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

// Kelas
    public function get_kelas()
	{
		return $this->db->get('tabel_kelas')->result();
	}

    public function get_kelasById($tabel, $id_kelas)
    {
        $data=$this->db->where('id_kelas', $id_kelas)->get($tabel);
        return $data;
    }

    public function tambah_kelas($tabel, $data)
    {
        $this->db->insert($tabel, $data);
        return $this->db->insert_id();
    }

    public function ubah_kelas($tabel, $data, $where)
    {
        $data=$this->db->update($tabel, $data, $where);
        return $this->db->affected_rows();
    }

    public function hapus_kelas($tabel, $field, $id_kelas)
    {
        $data=$this->db->delete($tabel, array($field => $id_kelas));
        return $data;
    }

// Rombel
    public function get_rombel()
	{
		return $this->db->get('tabel_rombel')->result();
	}

    public function get_rombelById($tabel, $id_rombel)
    {
        $data=$this->db->where('id_rombel', $id_rombel)->get($tabel);
        return $data;
    }

    public function tambah_rombel($tabel, $data)
    {
        $this->db->insert($tabel, $data);
        return $this->db->insert_id();
    }

    public function ubah_rombel($tabel, $data, $where)
    {
        $data=$this->db->update($tabel, $data, $where);
        return $this->db->affected_rows();
    }

    public function hapus_rombel($tabel, $field, $id_rombel)
    {
        $data=$this->db->delete($tabel, array($field => $id_rombel));
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

    public function get_siswa_kelas()
    {
        return $this->db->where('id_rombel', null)->get('tabel_siswa')->result();
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


    public function get_siswaperkelas($tabel, $id_rombel)
    {
        $data=$this->db->where('id_rombel', $id_rombel)->get($tabel);
        return $data;
    }

// Pendaftaran Siswa
    public function get_siswa_pendaftaran()
	{
		return $this->db->where('diterima','P')->get('tabel_daftar')->result();
	}
    public function tambah_pendaftaran($tabel, $data)
	{
		$this->db->insert($tabel, $data);
		return $this->db->insert_id();
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
        return $this->db->where('diterima','Y')->get('tabel_daftar')->result();
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

 //Alok Mapel
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

 
}
