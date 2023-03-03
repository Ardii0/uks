<?php

class M_nilai extends CI_Model{
// Entry Nilai
    public function get_nilaiBySiswa($tabel, $id_siswa)
    {
        $data = $this->db->where('id_siswa', $id_siswa)->get($tabel)->result();
        return $data;
    }

    public function tambah_nilai($tabel, $data, $where)
    {
        $this->db->insert($tabel, $data, $where);
        return $this->db->insert_id();
    }
}
