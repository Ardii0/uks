<?php

class M_keuangan extends CI_Model{
    public function get_all_data_keuangan()
    {
        return $this->db->get('tabel_keuangan')->result();
    }
// Dashboard
public function total_akun()
{
return $this->db->get('tabel_akun')->num_rows();
}
  public function total_jenis_trans()
{
return $this->db->get('tabel_jenis_transaksi')->num_rows();
}
  public function total_anggaran()
{
return $this->db->get('tabel_rencana_anggaran')->num_rows();
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
    public function get_jenjangByIdSiswafromDaftar($id_daftar)
    {
        $data = $this->db->where('id_daftar', $id_daftar)->get('tabel_siswa')->result();
        return $data;
    }

    function get_rombelByIdKelas($id_kelas){
        $query = $this->db->get_where('tabel_rombel', array('id_kelas' => $id_kelas));
        return $query;
    }

    public function get_siswaById($tabel, $id_siswa)
    {
        $data=$this->db->where('id_siswa', $id_siswa)->get($tabel);
        return $data;
    }

    function get_siswaByIdRombel($id_rombel){
        // $this->db->select('tabel_daftar.nama, tabel_siswa.*');
        // $this->db->from('tabel_siswa');
        // $this->db->join('tabel_daftar', 'tabel_daftar.id_daftar = tabel_siswa.id_daftar');
        // $this->db->where('tabel_siswa.id_rombel', $id_rombel);
        $query = $this->db->get_where('tabel_siswa', array('id_rombel' => $id_rombel));
        // $db = $this->db->get();
        return $query;
        // return $db;
    }

    public function get_pembayaran()
    {
        return $this->db->get('tabel_pembayaran')->result();
    }

    public function get_pembayaranByIdSiswa($ids)
    {
        return $this->db->where('id_siswa', $ids)->get('tabel_pembayaran')->result();
    }

    public function get_invoiceById($idi)
    {
        return $this->db->where('id_invoice', $idi)->get('tabel_invoice');
    }

    public function get_pembayaranByIdInvoice($idi)
    {
        return $this->db->where('id_invoice', $idi)->get('tabel_pembayaran')->result();
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

	public function ibs($idi)
	{
		$this->db->select('tabel_jenisbayar.nama_jenis, tabel_pembayaran.*');
		$this->db->from('tabel_pembayaran');
		$this->db->join('tabel_jenisbayar', 'tabel_pembayaran.id_jenis = tabel_jenisbayar.id_jenis');
		// $this->db->where('tabel_pembayaran.id_jenis', $idj);
		$this->db->where('tabel_pembayaran.id_invoice', $idi);
		// $this->db->where('tabel_pembayaran.id_semester', $idp);
		$db = $this->db->get();
		return $db;
	}

	public function get_s($idi)
	{
		$this->db->select('*');
		$this->db->from('tabel_invoice');
		$this->db->join('tabel_siswa', 'tabel_siswa.id_siswa = tabel_invoice.id_siswa');
		$this->db->where('tabel_invoice.id_invoice', $idi);
		$db = $this->db->get();
		return $db;
	}

	public function get_inv($idi)
	{
		return $this->db->get_where('tabel_pembayaran', array('id_invoice' => $idi));
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
            $query = $this->db->where('id_akun', $nama_akun)->get('tabel_transaksi');
          } else {
            $query = $this->db->query("SELECT * from tabel_transaksi");
          }

    return $query->result();
    }
    public function akun($tabel, $id)
    {
        $data=$this->db->where('id_akun', $id)->get($tabel);
        return $data;
    }
}
