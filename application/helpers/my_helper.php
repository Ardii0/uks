<?php
// Global For One Join Table Helper, Make Sure Didn't Make Other Similiar Code
    function JoinOne($from, $tablejoin, $coljoin, $coljoin2, $where, $id, $field)
    {
      $ci =& get_instance();
      $ci->load->database();
      $smth = '';
      $result = $ci->db->select('*')
                        ->from($from)
                        ->join($tablejoin, $from.'.'.$coljoin.'='.$tablejoin.'.'.$coljoin2)
                        ->where($where,$id)
                        ->get();
        foreach ($result->result() as $c) {
        $stmt= $c->$field;
        $smth= $smth.$stmt;
        }
        return $smth;
    }

    function JoinTwo($from, $tablejoin, $coljoin, $coljoin2, $tablejoin2, $coltablejoin2, $where, $id, $field)
    {
      $ci =& get_instance();
      $ci->load->database();
      $smth = '';
      $result = $ci->db->select('*')
                        ->from($from)
                        ->join($tablejoin, $from.'.'.$coljoin.'='.$tablejoin.'.'.$coljoin2)
                        ->join($tablejoin2, $tablejoin.'.'.$coltablejoin2.'='.$tablejoin2.'.'.$coljoin2)
                        ->where($where,$id)
                        ->get();
        foreach ($result->result() as $c) {
        $stmt= $c->$field;
        $smth= $smth.$stmt;
        }
        return $smth;
    }

    function IDNTimes($date)
    {
        $monthformat = array('Januari', 'Februari', 'Maret',
            'April', 'Mei', 'Juni',
            'Juli', 'Agustus', 'September',
            'Oktober', 'November', 'Desember', );
        $year = substr($date, 0, 4);
        $month = substr($date, 5, 2);
        $currentdate = substr($date, 8, 2);
        $time = substr($date, 11);
        $result = $currentdate.' '.$monthformat[(int) $month - 1].' '.$year.' '.$time;

        return $result;
    }

  defined('BASEPATH') or exit('No direct script access allowed');
  if (!function_exists('indonesian_date')) {
      function indonesian_date($date)
      {
          // fungsi atau method untuk mengubah tanggal ke format indonesia
          // variabel BulanIndo merupakan variabel array yang menyimpan nama-nama bulan
          $indonesian_month = array('Januari', 'Februari', 'Maret',
              'April', 'Mei', 'Juni',
              'Juli', 'Agustus', 'September',
              'Oktober', 'November', 'Desember', );
          $year = substr($date, 0, 4); // memisahkan format tahun menggunakan substring
          $month = substr($date, 5, 2); // memisahkan format bulan menggunakan substring
          $currentdate = substr($date, 8, 2); // memisahkan format tanggal menggunakan substring
          $time = substr($date, 11);
          $result = $currentdate.' '.$indonesian_month[(int) $month - 1].' '.$year;
  
          return $result;
      }
  }

  if (!function_exists('indonesian_date_time')) {
      function indonesian_date_time($date)
      {
          // fungsi atau method untuk mengubah tanggal ke format indonesia
          // variabel BulanIndo merupakan variabel array yang menyimpan nama-nama bulan
          $indonesian_month = array('Januari', 'Februari', 'Maret',
              'April', 'Mei', 'Juni',
              'Juli', 'Agustus', 'September',
              'Oktober', 'November', 'Desember', );
          $year = substr($date, 0, 4); // memisahkan format tahun menggunakan substring
          $month = substr($date, 5, 2); // memisahkan format bulan menggunakan substring
          $currentdate = substr($date, 8, 2); // memisahkan format tanggal menggunakan substring
          $result = $currentdate.' '.$indonesian_month[(int) $month - 1].' '.$year;
  
          return $result;
      }
      }

    // Periksa Pasien
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

    // Program Klik
    function tampil_kelas_byid($id)
    {
    $ci =& get_instance();
    $ci->load->database();
    $result = $ci->db->where('id',$id)->get('siswa');
    foreach ($result->result() as $c) {
    $stmt= $c->kelas;
    return $stmt;
    }
}

    // Program Kerja
    function tampil_foto_byid($id)
    {
    $ci =& get_instance();
    $ci->load->database();
    $result = $ci->db->where('id',$id)->get('program_kerja');
    foreach ($result->result() as $c) {
    $stmt= $c->foto;
    return $stmt;
    }
}

    // Pojok Baca
    function tampil_cover_byid($id)
    {
    $ci =& get_instance();
    $ci->load->database();
    $result = $ci->db->where('id_buku',$id)->get('buku');
    foreach ($result->result() as $c) {
    $stmt= $c->foto;
    return $stmt;
    }
}


    function tampil_guru_byid($id)
        {
        $ci =& get_instance();
        $ci->load->database();
        $result = $ci->db->where('id',$id)->get('guru');
        foreach ($result->result() as $c) {
        $stmt= $c->nama_guru;
        return $stmt;
        }
    }
    function tampil_siswa_byid($id)
        {
        $ci =& get_instance();
        $ci->load->database();
        $result = $ci->db->where('id',$id)->get('siswa');
        foreach ($result->result() as $c) {
        $stmt= $c->nama_siswa;
        return $stmt;
        }
    }
    function tampil_karyawan_byid($id)
        {
        $ci =& get_instance();
        $ci->load->database();
        $result = $ci->db->where('id',$id)->get('karyawan');
        foreach ($result->result() as $c) {
        $stmt= $c->nama_karyawan;
        return $stmt;
        }
    }

    function tampil_tensi1_byid($id)
    {
    $ci =& get_instance();
    $ci->load->database();
    $result = $ci->db->where('periksa_id',$id)->get('penanganan_periksa');
    foreach ($result->result() as $c) {
    $stmt= $c->tensi_systolic;
    return $stmt;
    }
    }

    function tampil_tensi2_byid($id)
    {
    $ci =& get_instance();
    $ci->load->database();
    $result = $ci->db->where('periksa_id',$id)->get('penanganan_periksa');
    foreach ($result->result() as $c) {
    $stmt= $c->tensi_diastolic;
    return $stmt;
    }
}

function tampil_catatan_byid($id)
{
$ci =& get_instance();
$ci->load->database();
$result = $ci->db->where('periksa_id',$id)->get('penanganan_periksa');
foreach ($result->result() as $c) {
$stmt= $c->catatan;
return $stmt;
}

}

// Data

function tampil_siswa($id)
{
 $ci =& get_instance();
 $ci->load->database();
 $result = $ci->db->where('siswa_id',$id)->get('periksa');
  foreach ($result->result() as $c) {
  $stmt= $c->siswa_id;
  return $stmt;
  }
}

function tampil_guru($id)
{
 $ci =& get_instance();
 $ci->load->database();
 $result = $ci->db->where('guru_id',$id)->get('periksa');
  foreach ($result->result() as $c) {
  $stmt= $c->guru_id;
  return $stmt;
  }
}

function tampil_karyawan($id)
{
 $ci =& get_instance();
 $ci->load->database();
 $result = $ci->db->where('karyawan_id',$id)->get('periksa');
  foreach ($result->result() as $c) {
  $stmt= $c->karyawan_id;
  return $stmt;
  }
}

// Data Uks

function tampil_daftar_obat($id)
{
 $ci =& get_instance();
 $ci->load->database();
 $result = $ci->db->where('daftar_obat_id',$id)->get('penanganan_periksa');
  foreach ($result->result() as $c) {
  $stmt= $c->daftar_obat_id;
  return $stmt;
  }
}

function tampil_diagnosa($id)
{
 $ci =& get_instance();
 $ci->load->database();
 $result = $ci->db->where('diagnosa_id',$id)->get('penanganan_periksa');
  foreach ($result->result() as $c) {
  $stmt= $c->diagnosa_id;
  return $stmt;
  }
}

function tampil_penanganan_pertama($id)
{
 $ci =& get_instance();
 $ci->load->database();
 $result = $ci->db->where('penanganan_pertama_id',$id)->get('penanganan_periksa');
  foreach ($result->result() as $c) {
  $stmt= $c->penanganan_pertama_id;
  return $stmt;
  }
}

function tampil_tindakan($id)
{
 $ci =& get_instance();
 $ci->load->database();
 $result = $ci->db->where('tindakan_id',$id)->get('penanganan_periksa');
  foreach ($result->result() as $c) {
  $stmt= $c->tindakan_id;
  return $stmt;
  }
}

?>