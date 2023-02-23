<?php

class M_akademik extends CI_Model{
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
    public function get_siswa_pendaftaran()
	{
		return $this->db->get('tabel_daftar')->result();
	}
}
