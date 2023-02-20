<?php

class M_frontend extends CI_Model
{
	public function tambah($tabel, $data)
	{
		$this->db->insert($tabel, $data);
		return $this->db->insert_id();
	}

	public function hapus($tabel, $field, $id_pasien)
	{
		$data=$this->db->delete($tabel, array($field => $id_pasien));
		return $data;
	}

	public function ubah($tabel, $data, $where)
	{
		$data=$this->db->update($tabel, $data, $where);
		return $this->db->affected_rows();
	}
}