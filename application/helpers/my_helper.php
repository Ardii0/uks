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

?>
