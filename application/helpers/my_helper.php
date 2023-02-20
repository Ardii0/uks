<?php
function tampil_dokter($id_dokter)
{
 $ci =& get_instance();
 $ci->load->database();
 $result = $ci->db->select('nama_dokter')->from('tabel_dokter')
                  ->where('id_dokter',$id_dokter)->get();
  foreach ($result->result() as $c) {
  $stmt= $c->nama_dokter;
  return $stmt;
          }
}

function tampil_pasien($id_pasien)
{
 $ci =& get_instance();
 $ci->load->database();
 $result = $ci->db->select('nama_pasien')->from('tabel_pasien')
                  ->where('id_pasien',$id_pasien)->get();
  foreach ($result->result() as $c) {
  $stmt= $c->nama_pasien;
  return $stmt;
          }
}
function tampil_obat_by_idobat($id)
{
 $ci =& get_instance();
 $ci->load->database();
 $result = $ci->db->select('nama_obat')->from('tabel_obat')
                  ->where('id_obat',$id)->get();
  foreach ($result->result() as $c) {
  $stmt= $c->nama_obat;
  return $stmt;
          }
}

function tampil_spesialis_byid($id)
{
 $ci =& get_instance();
 $ci->load->database();
 $result = $ci->db->where('id_spesialis',$id)->get('tb_spesialis');
  foreach ($result->result() as $c) {
  $stmt= $c->nama_spesialis;
  return $stmt;
  }
}
function tampil_jam_praktek_byid_dokter($id)
{
 $ci =& get_instance();
 $ci->load->database();
 $praktek = array();
 $result = $ci->db->where('id_dokter',$id)->get('tb_jam_praktek');
  foreach ($result->result() as $c) {
  $stmt= $c->dari_jam.' - '.$c->sampai_jam;
  array_push($praktek,$stmt);
  }
  return $praktek;
}
function tampil_jamDanid_praktek_byid_dokter($id)
{
 $ci =& get_instance();
 $ci->load->database();
 $praktek = array();
 $id_praktek = array();
 return $result = $ci->db->where('id_dokter',$id)->get('tb_jam_praktek');
}
function tampil_tindakan($id)
{
 $ci =& get_instance();
 $ci->load->database();
 $tindakan = array();
 $result = $ci->db->select('*')
                    ->from('tb_tindakan')
                    ->join('tb_tindakan_master','tb_tindakan.id_tindakan_master = tb_tindakan_master.id_tindakan_master')
                    ->where('tb_tindakan.id_rekam_medis',$id)
                    ->get();
  foreach ($result->result() as $c) {
  $stmt= $c->nama_tindakan;
  array_push($tindakan,$stmt);
  }
  return $tindakan;
}
function tampil_obat($id)
{
 $ci =& get_instance();
 $ci->load->database();
 $obat = array();
 $result = $ci->db->select('*')
                    ->from('tabel_resep')
                    ->join('tabel_obat','tabel_resep.id_obat = tabel_obat.id_obat')
                    ->where('tabel_resep.id_rekam_medis',$id)
                    ->get();
  foreach ($result->result() as $c) {
  $stmt= $c->nama_obat;
  array_push($obat,$stmt);
  }
  return $obat;
}


function tampil_dokter_byidrekam($id_rekam_medis)
{
 $ci =& get_instance();
 $ci->load->database();
 $rekam=$ci->db->where('id_rekam_medis',$id_rekam_medis)->get('tabel_rekam_medis')->row();
 $result = $ci->db->select('nama_dokter')->from('tabel_dokter')
                  ->where('id_dokter',$rekam->id_dokter)->get();
  foreach ($result->result() as $c) {
  $stmt= $c->nama_dokter;
  return $stmt;
          }
}

function tampil_pasien_byidrekam($id_rekam_medis)
{
 $ci =& get_instance();
 $ci->load->database();
 $rekam=$ci->db->where('id_rekam_medis',$id_rekam_medis)->get('tabel_rekam_medis')->row();
 $result = $ci->db->select('nama_pasien')->from('tabel_pasien')
                  ->where('id_pasien',$rekam->id_pasien)->get();
  foreach ($result->result() as $c) {
  $stmt= $c->nama_pasien;
  return $stmt;
          }
}

function tampil_namadonatur_byid($id)
{
 $ci =& get_instance();
 $ci->load->database();
 $result = $ci->db->where('id_donatur',$id)->get('tabel_donatur');
  foreach ($result->result() as $c) {
  $stmt= $c->nama_donatur;
  return $stmt;
  }
}

function tampil_namadonatur_bykode($id)
{
 $ci =& get_instance();
 $ci->load->database();
 $result = $ci->db->where('kode_donatur',$id)->get('tabel_donatur');
  foreach ($result->result() as $c) {
  $stmt= $c->nama_donatur;
  return $stmt;
  }
}

function tampil_namainstitusi_bykode($id)
{
 $ci =& get_instance();
 $ci->load->database();
 $result = $ci->db->where('kode_institusi',$id)->get('tabel_donatur_institusi');
  foreach ($result->result() as $c) {
  $stmt= $c->nama_instansi;
  return $stmt;
  }
}

function tampil_namainstansi_byid($id)
{
 $ci =& get_instance();
 $ci->load->database();
 $result = $ci->db->where('id_institusi',$id)->get('tabel_donatur_institusi');
  foreach ($result->result() as $c) {
  $stmt= $c->nama_instansi;
  return $stmt;
  }
}

function tampil_namaprovinsi_byid($id)
{
 $ci =& get_instance();
 $ci->load->database();
 $result = $ci->db->where('id_provinsi',$id)->get('tabel_provinsi');
  foreach ($result->result() as $c) {
  $stmt= $c->nama_provinsi;
  return $stmt;
  }
}

function tampil_namakabkota_byid($id)
{
 $ci =& get_instance();
 $ci->load->database();
 $result = $ci->db->where('id_kabkota',$id)->get('tabel_kabkota');
  foreach ($result->result() as $c) {
  $stmt= $c->nama_kabkota;
  return $stmt;
  }
}

function tampil_namasumberdonasi_byid($id)
{
 $ci =& get_instance();
 $ci->load->database();
 $result = $ci->db->where('id_sumber_donasi',$id)->get('sumber_donasi');
  foreach ($result->result() as $c) {
  $stmt= $c->nama_sumber_donasi;
  return $stmt;
  }
}

function tampil_namajenisdana_byid($id)
{
 $ci =& get_instance();
 $ci->load->database();
 $result = $ci->db->where('id_jenis_dana',$id)->get('jenis_dana');
  foreach ($result->result() as $c) {
  $stmt= $c->nama_jenis_dana;
  return $stmt;
  }
}

function tampil_namajenisdonatur_byid($id)
{
 $ci =& get_instance();
 $ci->load->database();
 $result = $ci->db->where('id_jenis_donatur',$id)->get('jenis_donatur');
  foreach ($result->result() as $c) {
  $stmt= $c->nama_jenis_donatur;
  return $stmt;
  }
}

?>
