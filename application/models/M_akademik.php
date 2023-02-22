<?php

class M_akademik extends CI_Model{

    public function get_tahun_ajaran()
	{
		return $this->db->get('tabel_tahunajaran')->result();
	}

    public function tambah_ta($tabel, $data)
    {
        $this->db->insert($tabel, $data);
        return $this->db->insert_id();
    }

    public function edit_ta($tabel, $id_angkatan)
    {
        $data=$this->db->where('id_angkatan', $id_angkatan)->get($tabel);
        return $data;
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

}
