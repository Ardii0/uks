<?php

class M_landingpage extends CI_Model
{
    public function total_buku()
	{
		return $this->db->get('table_buku')->num_rows();
	}

    public function get_bukuById($tabel, $id_buku)
    {
        $data = $this->db->where('id_buku', $id_buku)->get($tabel)->result();
        return $data;
    }

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