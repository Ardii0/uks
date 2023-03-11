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

    public function get_anggaran()
    {
        return $this->db->get('tabel_jenis_transaksi')->result();
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

    function get_rombelByIdKelas($id_kelas){
        $query = $this->db->get_where('tabel_rombel', array('id_kelas' => $id_kelas));
        return $query;
      }
    
      function get_siswaByIdRombel($id_rombel){
        $query = $this->db->get_where('tabel_siswa', array('id_rombel' => $id_rombel));
        return $query;
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

  //Laporan keuangan
  public function filter_bytanggal($tanggalawal=0,$tanggalakhir=0){
	if ($tanggalawal != 0 && $tanggalakhir == 0) {
	  $query = $this->db->query("SELECT * from tabel_transaksi where DATE (waktu) = '$tanggalawal' ORDER BY waktu ASC ");
	} else if($tanggalawal != 0 && $tanggalakhir != 0) {
	  $query = $this->db->query("SELECT * from tabel_transaksi where waktu BETWEEN '$tanggalawal' and '$tanggalakhir' ORDER BY waktu ASC ");
	} else {
	  $query = $this->db->query("SELECT * from tabel_transaksi");
	}
	return $query->result();
}
public function filter_namakun($nama_akun){
    if ($nama_akun != null) {
        $query = $this->db->where('id_akun', $nama_akun)->get('tabel_jurnal');
      } else {
        $query = $this->db->query("SELECT * from tabel_jurnal");
      }

    return $query->result();
    }
    public function akun($tabel, $id)
    {
        $data=$this->db->where('id_akun', $id)->get($tabel);
        return $data;
    }
}
