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

// Dana Masuk dan Keluar
    public function get_pendapatan()
    {
        return $this->db->where("jenis_transaksi", "m")->get('tabel_jenis_transaksi')->result();
    }

    public function get_pengeluaran()
    {
        return $this->db->where("jenis_transaksi", "k")->get('tabel_jenis_transaksi')->result();
    }
    
    public function transaksi($tabel, $id)
    {
        $data=$this->db->where('id', $id)->get($tabel);
        return $data;
    }

    public function aksi_transaksi($tabel, $data)
    {
        $this->db->insert($tabel, $data);
        return $this->db->insert_id();
    }

    function ambil($table,$where)
  	{
		return $this->db->get_where($table,$where);
	}

    public function get_data_transaksi()
    {
        return $this->db->get('tabel_transaksi')->result();
    }

    public function hapus_transaksi($tabel, $field, $id)
	{
		$data=$this->db->delete($tabel, array($field => $id));
		return $data;
	}

// Jurnal Penyelesaian
    public function get_data_jurnal()
    {
        return $this->db->get('tabel_jurnal')->result();
    }

    public function aksi_input_jurnal($tabel, $data)
    {
        $this->db->insert($tabel, $data);
        return $this->db->insert_id();
    }

    public function hapus_jurnal($tabel, $field, $id)
	{
		$data=$this->db->delete($tabel, array($field => $id));
		return $data;
	}

// Pembayaran
    public function get_siswaById($tabel, $id_siswa)
    {
        $data = $this->db->where('id_siswa', $id_siswa)->get($tabel)->result();
        return $data;
    }

    public function get_pembayaran()
    {
        return $this->db->get('tabel_pembayaran')->result();
    }

    public function get_jenisbayar()
    {
        return $this->db->get('tabel_jenisbayar')->result();
    }

    public function tambah_pembayaran($tabel, $data)
    {
        $this->db->insert($tabel, $data);
        return $this->db->insert_id();
    }

}
