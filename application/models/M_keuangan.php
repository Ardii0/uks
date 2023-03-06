<?php

class M_keuangan extends CI_Model{
    public function get_all_data_keuangan()
    {
        return $this->db->get('tabel_keuangan')->result();
    }

    public function tambah_anggaran($tabel, $data)
    {
        $this->db->insert($tabel, $data);
        return $this->db->insert_id();
    }

    public function edit_anggaran($tabel, $data, $where)
    {
        $data=$this->db->update($tabel, $data, $where);
        return $this->db->affected_rows();
    }

// Akun
    public function get_all_akun()
    {
        return $this->db->get('tabel_akun')->result();
    }

    public function tambah_akun($tabel, $data)
    {
        $this->db->insert($tabel, $data);
        return $this->db->insert_id();
    }

    public function edit_akun($tabel, $id_akun)
    {
        $data=$this->db->where('id_akun', $id_akun)->get($tabel);
        return $data;
    }

    public function ubah_akun($tabel, $data, $where)
    {
        $data=$this->db->update($tabel, $data, $where);
        return $this->db->affected_rows();
    }

    public function hapus_akun($tabel, $field, $id_daftar)
	{
		$data=$this->db->delete($tabel, array($field => $id_daftar));
		return $data;
	}

}
