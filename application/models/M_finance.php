<?php

class M_finance extends CI_Model
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

	
//===========================================================================================

	function donatur_publik_total_rows() {
    	return $this->db->where('status','2')->get('tabel_donatur')->num_rows();
  	}

  function donatur_prospek_total_rows() {
    	return $this->db->where('status','1')->get('tabel_donatur')->num_rows();
  	}

  function donatur_institusi_total_rows() {
    	return $this->db->where('del_flag','1')->get('tabel_donatur_institusi')->num_rows();
  	}

   function penerimaan_tunai_total_rows() {
    	return $this->db->where('del_flag','1')->get('tabel_penerimaan_tunai')->num_rows();
  	}

  function penerimaan_bank_total_rows() {
    	return $this->db->where('del_flag','1')->get('tabel_penerimaan_bank')->num_rows();
  	}

  function penerimaan_barang_total_rows() {
    	return $this->db->where('del_flag','1')->get('tabel_penerimaan_barang')->num_rows();
  	}

  function penerimaan_wakaf_tunai_total_rows() {
    	return $this->db->where('status_wakaf','1')->get('tabel_penerimaan_wakaf')->num_rows();
  	}

  function penerimaan_wakaf_bank_rows() {
    	return $this->db->where('status_wakaf','2')->get('tabel_penerimaan_wakaf')->num_rows();
  	}

//=============================================================================================

	public function get_all_data_prospek_donatur()
	{
		return $this->db->where('del_flag','1')->where('status','1')->get('tabel_donatur')->result();
	}

	public function edit_donatur_prospek($tabel, $id_donatur)
	{
		$data=$this->db->where('id_donatur', $id_donatur)->get($tabel);
		return $data;
	}

function get_no_kode_donatur(){
        $cd = $this->db->query("SELECT MAX(RIGHT(kode_donatur,6)) AS kd_max FROM tabel_donatur");
        $kd = "";
        if($cd->num_rows()>0){
            foreach($cd->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%06s", $tmp);
            }
        }else{
            $kd = "1";
        }
        date_default_timezone_set('Asia/Jakarta');
        return $kd;
    }


//============================================================================================

	public function get_all_provinsi()
	{
		return $this->db->get('tabel_provinsi')->result();
	}

	public function get_all_kabkota()
	{
		return $this->db->get('tabel_kabkota')->result();
	}

	public function get_all_kecamatan()
	{
		return $this->db->get('tabel_kecamatan')->result();
	}

//==============================================================================================

	public function get_all_data_donatur_publik()
	{
		return $this->db->where('del_flag','1')->where('status','2')->get('tabel_donatur')->result();
	}

	public function edit_donatur_publik($tabel, $id_donatur)
	{
		$data=$this->db->where('id_donatur', $id_donatur)->get($tabel);
		return $data;
	}

	function insert_multiple($tabel,$data){
		$this->db->insert_batch($tabel, $data);
		return $this->db->affected_rows();
	}

	function get_no_kode_donatur_publik(){
        $cd = $this->db->query("SELECT MAX(RIGHT(kode_donatur,6)) AS kd_max FROM tabel_donatur");
        $kd = "";
        if($cd->num_rows()>0){
            foreach($cd->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%06s", $tmp);
            }
        }else{
            $kd = "1";
        }
        date_default_timezone_set('Asia/Jakarta');
        return $kd;
    }

   

//================================================================================================

	public function get_all_data_donatur_institusi()
	{
		return $this->db->where('del_flag','1')->get('tabel_donatur_institusi')->result();
	}

	public function edit_donatur_institusi($tabel, $id_institusi)
	{
		$data=$this->db->where('id_institusi', $id_institusi)->get($tabel);
		return $data;
	}

	function get_no_kode_donatur_institusi(){
        $cd = $this->db->query("SELECT MAX(RIGHT(kode_institusi,6)) AS kd_max FROM tabel_donatur_institusi");
        $kd = "";
        if($cd->num_rows()>0){
            foreach($cd->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%06s", $tmp);
            }
        }else{
            $kd = "1";
        }
        date_default_timezone_set('Asia/Jakarta');
        return $kd;
    }

  

//================================================================================================

	public function get_all_data_penerimaan_tunai()
	{
		return $this->db->where('del_flag','1')->get('tabel_penerimaan_tunai')->result();
	}

	public function edit_penerimaan_tunai($tabel, $id_penerimaan_kas)
	{
		$data=$this->db->where('id_penerimaan_kas', $id_penerimaan_kas)->get($tabel);
		return $data;
	}

	public function get_all_donatur()
	{
		return $this->db->where('del_flag','1')->get('tabel_donatur')->result();
	}

//================================================================================================

	public function get_all_data_penerimaan_bank()
	{
		return $this->db->where('del_flag','1')->get('tabel_penerimaan_bank')->result();
	}

	public function edit_penerimaan_bank($tabel, $id_penerimaan_bank)
	{
		$data=$this->db->where('id_penerimaan_bank', $id_penerimaan_bank)->get($tabel);
		return $data;
	}

	

//================================================================================================

	public function get_all_data_penerimaan_barang()
	{
		return $this->db->where('del_flag','1')->get('tabel_penerimaan_barang')->result();
	}

	public function edit_penerimaan_barang($tabel, $id_penerimaan_barang)
	{
		$data=$this->db->where('id_penerimaan_barang', $id_penerimaan_barang)->get($tabel);
		return $data;
	}

//================================================================================================

	public function get_all_data_penerimaan_wakaf_tunai()
	{
		return $this->db->where('del_flag','1')->where('status_wakaf','1')->get('tabel_penerimaan_wakaf')->result();
	}

	public function edit_penerimaan_wakaf_tunai($tabel, $id_p_wakaf)
	{
		$data=$this->db->where('id_p_wakaf', $id_p_wakaf)->get($tabel);
		return $data;
	}

//================================================================================================

	public function get_all_data_penerimaan_wakaf_bank()
	{
		return $this->db->where('del_flag','1')->where('status_wakaf','2')->get('tabel_penerimaan_wakaf')->result();
	}

	public function edit_penerimaan_wakaf_bank($tabel, $id_p_wakaf)
	{
		$data=$this->db->where('id_p_wakaf', $id_p_wakaf)->get($tabel);
		return $data;
	}

//=================================================================================================

	public function get_all_sumber_donasi()
	{
		return $this->db->get('sumber_donasi')->result();
	}

	public function get_all_jenis_dana()
	{
		return $this->db->get('jenis_dana')->result();
	}

	public function get_all_jenis_donatur()
	{
		return $this->db->get('jenis_donatur')->result();
	}

//========================================================================================================

	public function filterbytanggal_tunai_laporanpublik($tanggalawal=0,$tanggalakhir=0){
        if ($tanggalawal != 0 && $tanggalakhir == 0) {
          $query = $this->db->query("SELECT * from tabel_penerimaan_tunai where jenis_donatur_tunai = 'Publik' AND DATE(tanggal_p_kas) = '$tanggalawal' ORDER BY tanggal_p_kas ASC ");
        } else if($tanggalawal != 0 && $tanggalakhir != 0) {
          $query = $this->db->query("SELECT * from tabel_penerimaan_tunai where jenis_donatur_tunai = 'Publik' AND tanggal_p_kas BETWEEN '$tanggalawal' and '$tanggalakhir' ORDER BY tanggal_p_kas ASC ");
        } else {
          $query = $this->db->query("SELECT * from tabel_penerimaan_tunai where jenis_donatur_tunai = 'Publik'");
        }
        return $query->result();
  }

  public function filterbytanggal_bank_laporanpublik($tanggalawal=0,$tanggalakhir=0){
        if ($tanggalawal != 0 && $tanggalakhir == 0) {
          $query = $this->db->query("SELECT * from tabel_penerimaan_bank where jenis_donatur_bank = 'Publik' AND DATE(tanggal_p_bank) = '$tanggalawal' ORDER BY tanggal_p_bank ASC ");
        } else if($tanggalawal != 0 && $tanggalakhir != 0) {
          $query = $this->db->query("SELECT * from tabel_penerimaan_bank where jenis_donatur_bank = 'Publik' AND tanggal_p_bank BETWEEN '$tanggalawal' and '$tanggalakhir' ORDER BY tanggal_p_bank ASC ");
        } else {
          $query = $this->db->query("SELECT * from tabel_penerimaan_bank where jenis_donatur_bank = 'Publik'");
        }
        return $query->result();
  }

  public function filterbytanggal_barang_laporanpublik($tanggalawal=0, $tanggalakhir=0){
        if ($tanggalawal != 0 && $tanggalakhir == 0) {
          $query = $this->db->query("SELECT * from tabel_penerimaan_barang where jenis_donatur_penerimaan_barang = 'Publik' AND DATE(tanggal_penerimaan_barang) = '$tanggalawal' ORDER BY tanggal_penerimaan_barang ASC ");
        } else if($tanggalawal != 0 && $tanggalakhir != 0) {
          $query = $this->db->query("SELECT * from tabel_penerimaan_barang where jenis_donatur_penerimaan_barang = 'Publik' AND tanggal_penerimaan_barang BETWEEN '$tanggalawal' and '$tanggalakhir' ORDER BY tanggal_penerimaan_barang ASC ");
        } else {
          $query = $this->db->query("SELECT * from tabel_penerimaan_barang where jenis_donatur_penerimaan_barang = 'Publik'");
        }
        return $query->result();
  }

  public function filterbytanggal_wakaf_laporanpublik($tanggalawal=0,$tanggalakhir=0){
        if ($tanggalawal != 0 && $tanggalakhir == 0) {
          $query = $this->db->query("SELECT * from tabel_penerimaan_wakaf where jenis_donatur_p_wakaf = 'Publik' AND DATE(tanggal_p_wakaf) = '$tanggalawal' ORDER BY tanggal_p_wakaf ASC ");
        } else if($tanggalawal != 0 && $tanggalakhir != 0) {
          $query = $this->db->query("SELECT * from tabel_penerimaan_wakaf where jenis_donatur_p_wakaf = 'Publik' AND tanggal_p_wakaf BETWEEN '$tanggalawal' and '$tanggalakhir' ORDER BY tanggal_p_wakaf ASC ");
        } else {
          $query = $this->db->query("SELECT * from tabel_penerimaan_wakaf where jenis_donatur_p_wakaf = 'Publik'");
        }
        return $query->result();
  }

  //=============================================================================================

  public function filterbytanggal_tunai_laporaninstitusi($tanggalawal=0,$tanggalakhir=0){
        if ($tanggalawal != 0 && $tanggalakhir == 0) {
          $query = $this->db->query("SELECT * from tabel_penerimaan_tunai where jenis_donatur_tunai = 'Institusi' AND DATE(tanggal_p_kas) = '$tanggalawal' ORDER BY tanggal_p_kas ASC ");
        } else if($tanggalawal != 0 && $tanggalakhir != 0) {
          $query = $this->db->query("SELECT * from tabel_penerimaan_tunai where jenis_donatur_tunai = 'Institusi' AND tanggal_p_kas BETWEEN '$tanggalawal' and '$tanggalakhir' ORDER BY tanggal_p_kas ASC ");
        } else {
          $query = $this->db->query("SELECT * from tabel_penerimaan_tunai where jenis_donatur_tunai = 'Institusi'");
        }
        return $query->result();
  }

  public function filterbytanggal_bank_laporaninstitusi($tanggalawal=0,$tanggalakhir=0){
        if ($tanggalawal != 0 && $tanggalakhir == 0) {
          $query = $this->db->query("SELECT * from tabel_penerimaan_bank where jenis_donatur_bank = 'Institusi' AND DATE(tanggal_p_bank) = '$tanggalawal' ORDER BY tanggal_p_bank ASC ");
        } else if($tanggalawal != 0 && $tanggalakhir != 0) {
          $query = $this->db->query("SELECT * from tabel_penerimaan_bank where jenis_donatur_bank = 'Institusi' AND tanggal_p_bank BETWEEN '$tanggalawal' and '$tanggalakhir' ORDER BY tanggal_p_bank ASC ");
        } else {
          $query = $this->db->query("SELECT * from tabel_penerimaan_bank where jenis_donatur_bank = 'Institusi'");
        }
        return $query->result();
  }

  public function filterbytanggal_barang_laporaninstitusi($tanggalawal=0, $tanggalakhir=0){
        if ($tanggalawal != 0 && $tanggalakhir == 0) {
          $query = $this->db->query("SELECT * from tabel_penerimaan_barang where jenis_donatur_penerimaan_barang = 'Institusi' AND DATE(tanggal_penerimaan_barang) = '$tanggalawal' ORDER BY tanggal_penerimaan_barang ASC ");
        } else if($tanggalawal != 0 && $tanggalakhir != 0) {
          $query = $this->db->query("SELECT * from tabel_penerimaan_barang where jenis_donatur_penerimaan_barang = 'Institusi' AND tanggal_penerimaan_barang BETWEEN '$tanggalawal' and '$tanggalakhir' ORDER BY tanggal_penerimaan_barang ASC ");
        } else {
          $query = $this->db->query("SELECT * from tabel_penerimaan_barang where jenis_donatur_penerimaan_barang = 'Institusi'");
        }
        return $query->result();
  }

  public function filterbytanggal_wakaf_laporaninstitusi($tanggalawal=0,$tanggalakhir=0){
        if ($tanggalawal != 0 && $tanggalakhir == 0) {
          $query = $this->db->query("SELECT * from tabel_penerimaan_wakaf where jenis_donatur_p_wakaf = 'Institusi' AND DATE(tanggal_p_wakaf) = '$tanggalawal' ORDER BY tanggal_p_wakaf ASC ");
        } else if($tanggalawal != 0 && $tanggalakhir != 0) {
          $query = $this->db->query("SELECT * from tabel_penerimaan_wakaf where jenis_donatur_p_wakaf = 'Institusi' AND tanggal_p_wakaf BETWEEN '$tanggalawal' and '$tanggalakhir' ORDER BY tanggal_p_wakaf ASC ");
        } else {
          $query = $this->db->query("SELECT * from tabel_penerimaan_wakaf where jenis_donatur_p_wakaf = 'Institusi'");
        }
        return $query->result();
  }

	public function filterbycari_prospek($nama_donatur,$nohp1_donatur,$email_donatur){
        if ($nama_donatur !== 0 && $nohp1_donatur == 0 && $email_donatur == 0) {
         	$query = $this->db->query("SELECT * from tabel_donatur where status = '1' AND nama_donatur = '".$nama_donatur."' ORDER BY nama_donatur ASC ");
        } else if ($nama_donatur == 0 && $nohp1_donatur !== 0 && $email_donatur == 0){
        	$query =$this->db->query("SELECT * FROM tabel_donatur where status = '1' AND nohp1_donatur = '".$nohp1_donatur."' ORDER BY nohp1_donatur ASC");
        } else if ($nama_donatur == 0 && $nohp1_donatur == 0 && $email_donatur !== 0){
        	$query =$this->db->query("SELECT * FROM tabel_donatur where status = '1' AND email_donatur = '".$email_donatur."' LIKE '%email_donatur%'");
        } else if ($nama_donatur !== 0 && $nohp1_donatur !== 0 && $email_donatur == 0){
        	$query = $this->db->query("SELECT * FROM tabel_donatur where status = '1' AND nama_donatur = '".$nama_donatur."' AND nohp1_donatur = '".$nohp1_donatur."' ORDER BY nama_donatur ASC");
        } else if ($nama_donatur == 0 && $nohp1_donatur !== 0 && $email_donatur !== 0){
        	$query = $this->db->query("SELECT * FROM tabel_donatur where status = '1' AND nohp1_donatur = '".$nohp1_donatur."' AND email_donatur = '".$email_donatur."' ORDER BY nohp1_donatur ASC");
        } else if ($nama_donatur !== 0 && $nohp1_donatur == 0 && $email_donatur !== 0){
        	$query = $this->db->query("SELECT * FROM tabel_donatur where status = '1' AND nama_donatur = '".$nama_donatur."' AND email_donatur = '".$email_donatur."' ORDER BY nama_donatur ASC");
        } else if ($nama_donatur !== 0 && $nohp1_donatur !== 0 && $email_donatur !== 0) {
        $query = $this->db->query("SELECT * FROM tabel_donatur where status = '1' AND email_donatur = '".$email_donatur."' AND nama_donatur = '".$nama_donatur."' AND nohp1_donatur = '".$nohp1_donatur."' ORDER BY nama_donatur ASC");
        } else {
         $query = $this->db->query("SELECT * from tabel_donatur where status = '1");
        }
        return $query->result();
 }

 public function filterbycari_publik($nama=0,$nohp=0,$email=0){
        if ($nama !== 0 && $nohp == 0 && $email == 0) {
         $query = $this->db->query("SELECT * from tabel_donatur where status = '2' AND nama_donatur = '".$nama."' ORDER BY nama_donatur ASC ");
        } else if($nama != 0 && $nohp != 0 && $email != 0) {
         $query = $this->db->query("SELECT * from tabel_donatur where status = '2' AND email_donatur = '".$email."' and nama_donatur BETWEEN '$nama' and '$nohp' ORDER BY nama_donatur ASC ");
        } else if($nama == 0 && $nohp == 0 && $email !== 0) {
         $query = $this->db->query("SELECT * from tabel_donatur where status = '2' AND email_donatur = '".$email."' ORDER BY email_donatur ASC");
        } else if($nama != 0 && $nohp != 0 && $email == 0) {
         $query = $this->db->query("SELECT * from tabel_donatur where status = '2' AND nama_donatur BETWEEN '$nama' and '$nohp' ORDER BY nama_donatur ASC ");
        } else if($nama == 0 && $nohp != 0 && $email != 0) {
         $query = $this->db->query("SELECT * from tabel_donatur where status = '2' AND nohp1_donatur BETWEEN '$nohp' and '$email' ORDER BY nohp1_donatur ASC ");
        } else if($nama !== 0 && $nohp == 0 && $email !== 0) {
         $query = $this->db->query("SELECT * from tabel_donatur where status = '2' AND nama_donatur BETWEEN '$nama' and '$email' ORDER BY nama_donatur ASC ");
        } else if($nama == 0 && $nohp != 0 && $email == 0) {
         $query = $this->db->query("SELECT * from tabel_donatur where status = '2' AND nohp1_donatur = '".$nohp."' ORDER BY nohp1_donatur ASC");
        } else {
         $query = $this->db->query("SELECT * from tabel_donatur");
        }
        return $query->result();
 }

 public function filterbycari_institusi($nama=0,$pic=0,$nohp=0){
        if ($nama !== 0 && $pic == 0 && $nohp == 0) {
         $query = $this->db->query("SELECT * from tabel_donatur_institusi where del_flag = '1' AND nama_instansi = '".$nama."' ORDER BY nama_instansi ASC ");
        } else if($nama != 0 && $pic != 0 && $nohp != 0) {
         $query = $this->db->query("SELECT * from tabel_donatur_institusi where del_flag = '1' AND nohp_institusi = '".$nohp."' and nama_instansi BETWEEN '$nama' and '$pic' ORDER BY nama_instansi ASC ");
        } else if($nama == 0 && $pic == 0 && $nohp !== 0) {
         $query = $this->db->query("SELECT * from tabel_donatur_institusi where del_flag = '1' AND nohp_institusi = '".$nohp."' ORDER BY nohp_institusi ASC");
        } else if($nama != 0 && $pic != 0 && $nohp == 0) {
         $query = $this->db->query("SELECT * from tabel_donatur_institusi where del_flag = '1' AND nama_instansi BETWEEN '$nama' and '$nohp' ORDER BY nama_instansi ASC ");
        } else if($nama == 0 && $pic !== 0 && $nohp !== 0) {
         $query = $this->db->query("SELECT * from tabel_donatur_institusi where del_flag = '1' AND pic_institusi BETWEEN '$nohp' and '$nohp' ORDER BY pic_institusi ASC ");
        } else if($nama !== 0 && $pic == 0 && $nohp !== 0) {
         $query = $this->db->query("SELECT * from tabel_donatur_institusi where del_flag = '1' AND nama_instansi BETWEEN '$nama' and '$nohp' ORDER BY nama_instansi ASC ");
        } else if($nama === 0 && $pic !== 0 && $nohp === 0) {
         $query = $this->db->query("SELECT * from tabel_donatur_institusi where del_flag = '1' AND pic_institusi = '".$pic."' ORDER BY pic_institusi ASC");
        } else {
         $query = $this->db->query("SELECT * from tabel_donatur_institusi");
        }
        return $query->result();
 }
//=========================================Laporan Tunai=======================================


 public function get_all_laporanpublik_data_penerimaan_tunai()
	{
		return $this->db->where('jenis_donatur_tunai','Publik')->get('tabel_penerimaan_tunai')->result();
	}

	public function get_all_laporaninstitusi_data_penerimaan_tunai()
	{
		return $this->db->where('jenis_donatur_tunai','Institusi')->get('tabel_penerimaan_tunai')->result();
	}

//=========================================Laporan Bank=======================================

 public function get_all_laporanpublik_data_penerimaan_bank()
	{
		return $this->db->where('jenis_donatur_bank','Publik')->get('tabel_penerimaan_bank')->result();
	}

	public function get_all_laporaninstitusi_data_penerimaan_bank()
	{
		return $this->db->where('jenis_donatur_bank','Institusi')->get('tabel_penerimaan_bank')->result();
	}

//=========================================Laporan Barang=======================================

	public function get_all_laporanpublik_data_penerimaan_barang()
	{
		return $this->db->where('jenis_donatur_penerimaan_barang','Publik')->get('tabel_penerimaan_barang')->result();
	}

	public function get_all_laporaninstitusi_data_penerimaan_barang()
	{
		return $this->db->where('jenis_donatur_penerimaan_barang','Institusi')->get('tabel_penerimaan_barang')->result();
	}

//=========================================Laporan Wakaf=======================================

	public function get_all_laporanpublik_data_penerimaan_wakaf()
	{
		return $this->db->where('jenis_donatur_p_wakaf','Publik')->get('tabel_penerimaan_wakaf')->result();
	}

	public function get_all_laporaninstitusi_data_penerimaan_wakaf()
	{
		return $this->db->where('jenis_donatur_p_wakaf','Institusi')->get('tabel_penerimaan_wakaf')->result();
	}

//=========================================ekspor=======================================

	
	public function view_donatur_prospek(){
    	return $this->db->where('status','1')->get('tabel_donatur')->result(); // Tampilkan semua data yang ada di tabel siswa
  	}

  public function view_donatur_institusi(){
    	return $this->db->where('status','1')->get('tabel_donatur_institusi')->result(); // Tampilkan semua data yang ada di tabel siswa
  	}

  public function view_donatur_publik(){
    	return $this->db->where('status','1')->get('tabel_donatur')->result(); // Tampilkan semua data yang ada di tabel siswa
  	}

  public function view_donatur_laporan_tunai(){
    	return $this->db->where('jenis_donatur_tunai','Publik')->get('tabel_penerimaan_tunai')->result(); // Tampilkan semua data yang ada di tabel siswa
  	}

 	public function view_donatur_laporan_barang(){
    	return $this->db->where('jenis_donatur_penerimaan_barang','Publik')->get('tabel_penerimaan_tunai')->result(); // Tampilkan semua data yang ada di tabel siswa
  	}

 	public function view_donatur_laporan_wakaf(){
    	return $this->db->where('jenis_donatur_p_wakaf','Publik')->get('tabel_penerimaan_wakaf')->result(); // Tampilkan semua data yang ada di tabel siswa
  	}

 	public function view_donatur_laporan_bank(){
    	return $this->db->where('jenis_donatur_bank','Publik')->get('tabel_penerimaan_bank')->result(); // Tampilkan semua data yang ada di tabel siswa
  	}

  	public function view_donatur_laporan_institusi_tunai(){
    	return $this->db->where('jenis_donatur_tunai','Institusi')->get('tabel_penerimaan_tunai')->result(); // Tampilkan semua data yang ada di tabel siswa
  	}

 	public function view_donatur_laporan_institusi_barang(){
    	return $this->db->where('jenis_donatur_penerimaan_barang','Institusi')->get('tabel_penerimaan_tunai')->result(); // Tampilkan semua data yang ada di tabel siswa
  	}

 	public function view_donatur_laporan_institusi_wakaf(){
    	return $this->db->where('jenis_donatur_p_wakaf','Institusi')->get('tabel_penerimaan_wakaf')->result(); // Tampilkan semua data yang ada di tabel siswa
  	}

 	public function view_donatur_laporan_institusi_bank(){
    	return $this->db->where('jenis_donatur_bank','Institusi')->get('tabel_penerimaan_bank')->result(); // Tampilkan semua data yang ada di tabel siswa
  	}
}
?>
