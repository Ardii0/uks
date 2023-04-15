<?php

class M_perpustakaan extends CI_Model{

// Dashboard
	public function total_buku()
	{
	return $this->db->get('table_buku')->num_rows();
	}
	public function total_rak_buku()
	{
	return $this->db->get('table_rak_buku')->num_rows();
	}
	public function total_kategori_buku()
	{
	return $this->db->get('table_kategori_buku')->num_rows();
	}
	public function total_anggota()
	{
	return $this->db->get('tabel_anggota')->num_rows();
	}
	public function total_peminjaman()
	{
        $nextN = mktime(0, 0, 0, date("Y"), date("m"), date("d"));
		$array = array('status' => 'DIPINJAM', 'tgl_pinjaman' => date('Y-m-d'));
		return $this->db->where($array)->get('tabel_pinjaman')->num_rows();
	}
	public function total_pengembalian()
	{
        $nextN = mktime(0, 0, 0, date("Y"), date("m"), date("d"));
		$array = array('status' => 'DIKEMBALIKAN', 'tgl_kembali' => date('Y-m-d'));
		return $this->db->where($array)->get('tabel_pinjaman')->num_rows();
	}
    
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

    public function get_buku_tersedia()
	{
		$query = $this->db->query('SELECT * from table_buku where del_flag = 1 AND stok > 0');
		return $query->result();
	}

	public function get_all_detail_index_buku($tabel, $id_buku)
  	{
    	$data=$this->db->where('id_buku', $id_buku)->get($tabel);
    	return $data;
  	}

	public function tambah_stok_buku($tabel, $data)
	{
	  $this->db->insert($tabel, $data);
	  return $this->db->insert_id();
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

// Anggota
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

	public function get_setting_perpus($table)
    {
        $data=$this->db->where('id_setting_perpus', '1')->get($table);
        return $data;
    }

	public function get_buku_dipinjam()
	{
		return $this->db->where('status', 'DIPINJAM')->order_by('tgl_pinjaman', 'desc')->get('tabel_pinjaman')->result();
	}

	public function get_index_buku()
	{
		return $this->db->get('table_detail_index_buku')->result();
	}

	function get_index_buku_by_id_buku($id_buku){
        $query = $this->db->where("status", "Di Rak Buku")->get_where('table_detail_index_buku', array('id_buku' => $id_buku));
        return $query;
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
//Laporan
	public function get_laporan_pinjam()
	{
		return $this->db->where('status', 'DIPINJAM')->get('tabel_pinjaman')->result();
	}
	public function filter_bytanggalpinjam($tanggalawal=0,$tanggalakhir=0){
		if ($tanggalawal != 0 && $tanggalakhir == 0) {
		$query = $this->db->query("SELECT * from tabel_pinjaman where status = 'DIPINJAM' AND DATE(tgl_pinjaman) = '$tanggalawal' ORDER BY tgl_pinjaman ASC ");
		} else if($tanggalawal != 0 && $tanggalakhir != 0) {
		$query = $this->db->query("SELECT * from tabel_pinjaman where status = 'DIPINJAM' and tgl_pinjaman BETWEEN '$tanggalawal' and '$tanggalakhir' ORDER BY tgl_pinjaman ASC ");
		} else {
		$query = $this->db->query("SELECT * from tabel_pinjaman");
		}

		return $query->result();
	}

	public function get_laporan_kembali()
	{
		return $this->db->where('status', 'DIKEMBALIKAN')->get('tabel_pinjaman')->result();
	}
	public function filter_bytanggalkembali($tanggalawal=0,$tanggalakhir=0){
		if ($tanggalawal != 0 && $tanggalakhir == 0) {
		$query = $this->db->query("SELECT * from tabel_pinjaman where status = 'DIKEMBALIKAN' AND DATE(tgl_kembali) = '$tanggalawal' ORDER BY tgl_kembali ASC ");
		} else if($tanggalawal != 0 && $tanggalakhir != 0) {
		$query = $this->db->query("SELECT * from tabel_pinjaman where status = 'DIKEMBALIKAN' and tgl_kembali BETWEEN '$tanggalawal' and '$tanggalakhir' ORDER BY tgl_pinjaman ASC ");
		} else {
		$query = $this->db->query("SELECT * from tabel_pinjaman");
		}

		return $query->result();
	}
	// Akun
	public function get_userByLogin($table)
	{
		$data = $this->db->get_where('tabel_level', array('id_level' => $this->session->userdata('id_level')));
		return $data;
	}
    public function edit_data($tabel, $data, $where)
    {
        $data=$this->db->update($tabel, $data, $where);
        return $this->db->affected_rows();
    }
}