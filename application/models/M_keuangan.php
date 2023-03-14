<?php

class M_keuangan extends CI_Model{
    public function get_all_data_keuangan()
    {
        return $this->db->get('tabel_keuangan')->result();
    }

//Rencana Anggaran   
    public function get_all_data_rencana_anggaran()
    {
        return $this->db->get('tabel_rencana_anggaran')->result();
    }

    public function get_rnperid($tabel, $id_rn)
    {
        $data=$this->db->where('id_rencana_anggaran', $id_rn)->get($tabel);
        return $data;
    }

    public function get_detail_rn($jenis, $id_rn)
    {
        if ($jenis=="m") {
            return $this->db->get_where('tabel_jenis_transaksi', array ('jenis_transaksi' => 'm', 'rencana_anggaran' => $id_rn));
        } else {
            return $this->db->get_where('tabel_jenis_transaksi', array ('jenis_transaksi' => 'k', 'rencana_anggaran' => $id_rn));
        }    
    }

    public function get_rnperenum($tabel, $id_rn)
    {
        $data=$this->db->where('jenis_transaksi', $id_rn)->get($tabel);
        return $data;
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

    public function hapus_rn($tabel, $field, $id_rn)
	{
		$data=$this->db->delete($tabel, array($field => $id_rn));
		return $data;
	}

//Jenis Transaksi
    public function get_all_data_jenis_transaksi()
    {
        return $this->db->get('tabel_jenis_transaksi')->result();
    }

    public function tambah_jenis_transaksi($tabel, $data)
    {
        $this->db->insert($tabel, $data);
        return $this->db->insert_id();
    }

    public function edit_jenis_transaksi($tabel, $data, $where)
    {
        $data=$this->db->update($tabel, $data, $where); 
        return $this->db->affected_rows();
    }

    public function get_rnperperiode($tabel, $id_rn)
    {
        $data=$this->db->where('rencana_anggaran', $id_rn)->get($tabel);
        return $data;
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
        return $this->db->where("status", "1")->get('test_pendapatan_pengeluaran')->result();
    }

    public function get_pengeluaran()
    {
        return $this->db->where("status", "2")->get('test_pendapatan_pengeluaran')->result();
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

}
