<?php

class M_konsumen extends CI_Model
{
	public function tambah($tabel, $data)
	{
		$this->db->insert($tabel, $data);
		return $this->db->insert_id();
	}

	public function tambah_karyawan($data)
	{
		return $this->db->insert('tb_dkaryawan', $data);
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

	function ambil($table,$where)
  	{
		return $this->db->get_where($table,$where);
	}

	public function get_all_data_paket_wedding()
	{
		return $this->db->where('del_flag','1')->get('tabel_paket_wedding')->result();
	}

	public function edit_paket_wedding($tabel, $id_paket_wedding)
	{
		$data=$this->db->where('id_paket_wedding', $id_paket_wedding)->get($tabel);
		return $data;
	}

	function insert_multiple($tabel,$data){
		$this->db->insert_batch($tabel, $data);
		return $this->db->affected_rows();
	}

}
?>
