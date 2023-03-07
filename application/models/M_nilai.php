<?php

class M_nilai extends CI_Model{
// Entry Nilai
    public function get_nilaiBySiswa($tabel, $id_siswa)
    {
        $data = $this->db->where('id_siswa', $id_siswa)->get($tabel)->result();
        return $data;
    }

    public function entry($idr)
    {
        $this->db->select('tabel_daftar.nama, tabel_siswa.*');
        $this->db->from('tabel_siswa');
        $this->db->join('tabel_daftar', 'tabel_daftar.id_daftar = tabel_siswa.id_daftar');
        $this->db->join('tabel_rombel', 'tabel_rombel.id_rombel = tabel_siswa.id_rombel');
        $this->db->where('tabel_siswa.id_rombel', $idr);
        $db = $this->db->get();
        return $db;
    }

    public function mapel($idm)
    {
        $this->db->select('tabel_mapel.nama_mapel, tabel_nilai.*');
        $this->db->from('tabel_nilai');
        $this->db->join('tabel_mapel', 'tabel_mapel.id_mapel = tabel_nilai.id_mapel');
        $this->db->where('tabel_nilai.id_mapel', $idm);
        $db = $this->db->get();
        return $db;
    }

    public function mapelByid($idm)
    {
        $data = $this->db->where('id_mapel', $idm)->get('tabel_mapel');
        return $data;
    }

    public function rombel($idr)
    {
        // $this->db->select('tabel_rombel.nama_rombel, tabel_siswa.*');
        // $this->db->from('tabel_siswa');
        // $this->db->join('tabel_rombel', 'tabel_rombel.id_rombel = tabel_siswa.id_rombel');
        // $this->db->join('tabel_rombel', 'tabel_rombel.id_rombel = tabel_siswa.id_rombel');
        // $this->db->where('tabel_siswa.id_rombel', $idr);
        // $db = $this->db->get();
        // return $db;
        $data = $this->db->where('id_rombel', $idr)->get('tabel_rombel');
        return $data;
    }

    public function semester($smt)
    {
        $data = $this->db->where('id_semester', $smt)->get('tabel_semester');
        return $data;
    }

    public function tambah_nilai($tabel, $data)
	{
		$this->db->insert($tabel, $data);
		return $this->db->insert_id();
    }
    
    public function data_nilai($ampl)
    {
        $this->db->select('tabel_rombel.nama_rombel, tabel_alokasimapel.*');
        $this->db->from('tabel_alokasimapel');
        $this->db->join('tabel_rombel', 'tabel_rombel.id_rombel = tabel_alokasimapel.id_rombel');
        $this->db->join('tabel_mapel', 'tabel_mapel.id_mapel = tabel_alokasimapel.id_mapel');
        $this->db->where('tabel_alokasimapel.id_mapel', $ampl);
        $db = $this->db->get();
        return $db;
    }

    // Modul Data Siswa
    public function get_data_nilai($id_mapel, $id_semester)
    {
        $multiClause = array('id_mapel' => $id_mapel, 'id_semester' => $id_semester);
        $data = $this->db->where($multiClause)->get('tabel_nilai');
        return $data;
    }

    public function get_alokasimapelByIdMapel($id_mapel)
    {
        $multiClause = array('id_mapel' => $id_mapel);
        $data = $this->db->where($multiClause)->get('tabel_alokasimapel');
        return $data;
    }

    // public function get_alokasi_mapel($kode_guru)
    // {
    //     $data = $this->db->where('id_mapel', $id_mapel)->get('tabel_alokasimapel')->result();
    //     return $data;
    // }
}