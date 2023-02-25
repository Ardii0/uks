<?php

function tampil_namajenjang_byid($id)
{
 $ci =& get_instance();
 $ci->load->database();
 $result = $ci->db->where('id_jenjang',$id)->get('tabel_jenjang');
  foreach ($result->result() as $c) {
  $stmt= $c->nama_jenjang;
  return $stmt;
  }
}

function tampil_tahunangkatan_byid($id)
{
 $ci =& get_instance();
 $ci->load->database();
 $result = $ci->db->where('id_angkatan',$id)->get('tabel_tahunajaran');
  foreach ($result->result() as $c) {
  $stmt= $c->kd_angkatan;
  return $stmt;
  }
}

function tampil_jenismapelById($id)
{
 $ci =& get_instance();
 $ci->load->database();
 $result = $ci->db->where('id_jenismapel',$id)->get('tabel_jenismapel');
  foreach ($result->result() as $c) {
  $stmt= $c->nama_jenismapel;
  return $stmt;
  }
}

function tampil_kelasById($id)
{
 $ci =& get_instance();
 $ci->load->database();
 $result = $ci->db->where('id_kelas',$id)->get('tabel_kelas');
  foreach ($result->result() as $c) {
  $stmt= $c->nama_kelas;
  return $stmt;
  }
}

function tampil_guruById($id)
{
 $ci =& get_instance();
 $ci->load->database();
 $result = $ci->db->where('kode_guru',$id)->get('tabel_guru');
  foreach ($result->result() as $c) {
  $stmt= $c->nama_guru;
  return $stmt;
  }
}

function tampil_rombel_byid($id)
{
 $ci =& get_instance();
 $ci->load->database();
 $result = $ci->db->where('id_rombel',$id)->get('tabel_rombel');
  foreach ($result->result() as $c) {
  $stmt= $c->nama_rombel;
  return $stmt;
  }
}

function tampil_siswa_byid($id)
{
 $ci =& get_instance();
 $ci->load->database();
 $result = $ci->db->where('id_daftar',$id)->get('tabel_daftar');
  foreach ($result->result() as $c) {
  $stmt= $c->nama;
  return $stmt;
  }
}
?>
