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
?>