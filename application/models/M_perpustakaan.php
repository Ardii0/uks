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

	public function get_all_detail_index_buku($tabel, $id_buku)
  	{
    $data=$this->db->where('id_buku', $id_buku)->get($tabel);
    return $data;
  	}

  	public function delete_detail_index_buku($tabel, $field, $id_stok)
    {
        $data=$this->db->delete($tabel, array($field => $id_stok));
        return $data;
    }

	public function get_bukuById($tabel, $id_buku)
	{
		$data=$this->db->where('id_buku', $id_buku)->get($tabel);
		return $data;
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

// ANGGOTA
	public function get_anggota()
	{
		return $this->db->get('tabel_anggota')->result();
	}

	public function aksi_tambah_anggota($tabel, $data)
	{
		$this->db->insert($tabel, $data);
		return $this->db->insert_id();
	}

	public function edit_anggota($tabel, $id_anggota)
	{
		$data=$this->db->where('id_anggota', $id_anggota)->get($tabel);
		return $data;
	}

	public function ubah_anggota($tabel, $data, $where)
	{
		$data=$this->db->update($tabel, $data, $where);
		return $this->db->affected_rows();
	}

	public function hapus_anggota($tabel, $field, $id_pasien)
	{
		$data=$this->db->delete($tabel, array($field => $id_pasien));
		return $data;
	}

	public function get_anggotaById($tabel, $id_anggota)
	{
		$data=$this->db->where('id_anggota', $id_anggota)->get($tabel);
		return $data;
	}

// Peminjaman Buku
	public function get_peminjaman()
	{
		return $this->db->get('tabel_pinjaman')->result();
	}

	public function tambah_pinjaman($tabel, $data)
	{
		$this->db->insert($tabel, $data);
		return $this->db->insert_id();
	}

	public function stok_keluar($tabel, $data)
	{
		$this->db->insert($tabel, $data);
		return $this->db->insert_id();
	}

	public function stok_masuk($tabel, $data)
	{
		$this->db->insert($tabel, $data);
		return $this->db->insert_id();
	}

	public function edit_pinjaman($tabel, $id_pinjaman)
	{
		$data=$this->db->where('id_pinjaman', $id_pinjaman)->get($tabel);
		return $data;
	}

	public function ubah_pinjaman($tabel, $data, $where)
	{
		$data=$this->db->update($tabel, $data, $where);
		return $this->db->affected_rows();
	}

	public function hapus_pinjaman($tabel, $field, $id_pasien)
	{
		$data=$this->db->delete($tabel, array($field => $id_pasien));
		return $data;
	}
}