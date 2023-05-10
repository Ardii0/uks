<?php
  function status_byid($id)
  {
  $ci =& get_instance();
  $ci->load->database();
  $result = $ci->db->where('id',$id)->get('pasien_status');
    foreach ($result->result() as $c) {
    $stmt= $c->name;
    return $stmt;
    }
  }
//Periksa Pasien
function tampil_pasien_status_byid($id)
{
$ci =& get_instance();
$ci->load->database();
$result = $ci->db->where('id',$id)->get('pasien_status');
  foreach ($result->result() as $c) {
  $stmt= $c->name;
  return $stmt;
  }
}
?>