<?php

class M_perpustakaan extends CI_Model{
    
//==============================================RAK BUKU===========================================================
    public function get_all_data_rak_buku()
    {
        return $this->db->where('del_flag','1')->get('table_rak_buku')->result();
    }

    public function tambah_rak($tabel, $data)
    {
        $this->db->insert($tabel, $data);
        return $this->db->insert_id();
    }

    public function edit_rak($tabel, $id_rak_buku)
    {
        $data=$this->db->where('id_rak_buku', $id_rak_buku)->get($tabel);
        return $data;
    }

    public function ubah_rak($tabel, $data, $where)
    {
        $data=$this->db->update($tabel, $data, $where);
        return $this->db->affected_rows();
    }

    public function hapus_rak($tabel, $field, $id_pasien)
    {
        $data=$this->db->delete($tabel, array($field => $id_pasien));
        return $data;
    }
//==============================================RAK BUKU===========================================================

//==============================================KATEGORI BUKU===========================================================
    public function get_all_data_kategori_buku()
	{
		return $this->db->where('del_flag','1')->get('table_kategori_buku')->result();
	}

	public function tambah_kategori($tabel, $data)
	{
		$this->db->insert($tabel, $data);
		return $this->db->insert_id();
	}

	public function edit_kategori($tabel, $id_kategori_buku)
	{
		$data=$this->db->where('id_kategori_buku', $id_kategori_buku)->get($tabel);
		return $data;
	}

	public function ubah_kategori($tabel, $data, $where)
	{
		$data=$this->db->update($tabel, $data, $where);
		return $this->db->affected_rows();
	}

	public function hapus_kategori($tabel, $field, $id_pasien)
	{
		$data=$this->db->delete($tabel, array($field => $id_pasien));
		return $data;
	}
//==============================================KATEGORI BUKU===========================================================

//==============================================DAFTAR BUKU===========================================================
    public function get_all_data_buku()
	{
		return $this->db->where('del_flag','1')->get('table_buku')->result();
	}

	public function tambah_buku($tabel, $data)
	{
		$this->db->insert($tabel, $data);
		return $this->db->insert_id();
	}

	public function edit_buku($tabel, $id_buku)
	{
		$data=$this->db->where('id_buku', $id_buku)->get($tabel);
		return $data;
	}

	public function ubah_buku($tabel, $data, $where)
	{
		$data=$this->db->update($tabel, $data, $where);
		return $this->db->affected_rows();
	}

	public function hapus_buku($tabel, $field, $id_pasien)
	{
		$data=$this->db->delete($tabel, array($field => $id_pasien));
		return $data;
	}
//==============================================DAFTAR BUKU===========================================================
}
