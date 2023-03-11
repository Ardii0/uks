<?php

class M_admin extends CI_Model
{
	//Get Data User
	public function get_user()
	{
		return $this->db->get('tabel_level')->result();
	}

	public function get_user_by_id($id_level)
    {
        $data=$this->db->where('id_level', $id_level)->get('tabel_level');
        return $data;
    }

	public function get_userByLogin($table)
	{
		$data = $this->db->get_where('tabel_level', array('id_level' => $this->session->userdata('id_level')));
		return $data;
	}
	
	// Get Data Sekolah
	public function get_sekolah($table)
    {
        $data=$this->db->where('id_sekolah', '1')->get($table);
        return $data;
    }

	public function ubah_setting_sekolah($tabel, $data, $where)
	{
		$data=$this->db->update($tabel, $data, $where);
		return $this->db->affected_rows();
	}

	// Get Data Setting Perpustakaan
	public function get_setting_perpus($table)
    {
        $data=$this->db->where('id_setting_perpus', '1')->get($table);
        return $data;
    }

	public function ubah_setting_perpus($tabel, $data, $where)
    {
        $data=$this->db->update($tabel, $data, $where);
        return $this->db->affected_rows();
    }

	// Naon Eta

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

	public function get_all_data_paket_wedding()
	{
		return $this->db->where('del_flag','1')->get('tabel_paket_wedding')->result();
	}

	public function edit_paket_wedding($tabel, $id_paket_wedding)
	{
		$data=$this->db->where('id_paket_wedding', $id_paket_wedding)->get($tabel);
		return $data;
	}

	public function get_all_data_konsumen()
	{
		return $this->db->where('del_flag','1')->where('level','2')->get('tabel_admin')->result();
	}

	public function edit_konsumen($tabel, $id_admin)
	{
		$data=$this->db->where('id_admin', $id_admin)->get($tabel);
		return $data;
	}

	public function get_all_data_pesanan()
	{
		// return $this->db->where('del_flag','1')->where('nama_pemesan','ASC')->get('tabel_pesanan')->result();
		$query = $this->db->query("SELECT * from tabel_pesanan where del_flag = '1' ORDER BY tanggal_acara ASC ");
		return $query->result();
	}

	public function get_all_data_pembayaran_belum_dp()
	{
		return $this->db->where('del_flag','1')->where('level','2')->where('status_pembayaran_dp','1')->where('status_pembayaran_pelunasan','1')->get('tabel_admin')->result();
	}

	public function get_all_data_pembayaran_belum_pelunasan()
	{
		return $this->db->where('del_flag','1')->where('level','2')->where('status_pembayaran_dp','2')->where('status_pembayaran_pelunasan','1')->get('tabel_admin')->result();
	}

	public function get_all_data_pembayaran_lunas()
	{
		return $this->db->where('del_flag','1')->where('level','2')->where('status_pembayaran_dp','2')->where('status_pembayaran_pelunasan','2')->get('tabel_admin')->result();
	}

	public function view_pesanan(){
    	return $this->db->where('del_flag','1')->get('tabel_pesanan')->result(); 
  	}

  public function view_pembayaran(){
    	return $this->db->where('del_flag','1')->where('level','2')->where('status_pembayaran_dp','2')->where('status_pembayaran_pelunasan','2')->get('tabel_admin')->result(); 
  	}

  function paket_wedding_total_rows() {
    	return $this->db->where('del_flag','1')->get('tabel_paket_wedding')->num_rows();
  	}

  function konsumen_total_rows() {
    	return $this->db->where('level','2')->get('tabel_admin')->num_rows();
  	}

  function pesanan_total_rows() {
    	return $this->db->where('del_flag','1')->get('tabel_pesanan')->num_rows();
  	}

  function pembayaran_dp_total_rows() {
    	return $this->db->where('del_flag','1')->where('level','2')->where('status_pembayaran_dp','1')->where('status_pembayaran_pelunasan','1')->get('tabel_admin')->num_rows();
  	}

  function pembayaran_pelunasan_total_rows() {
    	return $this->db->where('del_flag','1')->where('level','2')->where('status_pembayaran_dp','2')->where('status_pembayaran_pelunasan','1')->get('tabel_admin')->num_rows();
  	}

  function pembayaran_lunas_total_rows() {
    	return $this->db->where('del_flag','1')->where('level','2')->where('status_pembayaran_dp','2')->where('status_pembayaran_pelunasan','2')->get('tabel_admin')->num_rows();
  	}

	
//===========================================================================================

	

}
?>