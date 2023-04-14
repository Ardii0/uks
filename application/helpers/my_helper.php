<?php
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

function tampil_emailuser($id)
{
$ci =& get_instance();
$ci->load->database();
$result = $ci->db->where('id_level',$id)->get('tabel_level');
  foreach ($result->result() as $c) {
  $stmt= $c->email;
  return $stmt;
  }
}

// User
  function tampil_usernamelevelById($id)
  {
  $ci =& get_instance();
  $ci->load->database();
  $result = $ci->db->where('id_level',$id)->get('tabel_level');
    foreach ($result->result() as $c) {
    $stmt= $c->username;
    return $stmt;
    }
  }

  function tampil_emaillevelById($id)
  {
  $ci =& get_instance();
  $ci->load->database();
  $result = $ci->db->where('id_level',$id)->get('tabel_level');
    foreach ($result->result() as $c) {
    $stmt= $c->email;
    return $stmt;
    }
  }
  
  function tampil_fotolevelById($id)
  {
  $ci =& get_instance();
  $ci->load->database();
  $result = $ci->db->where('id_level',$id)->get('tabel_level');
    foreach ($result->result() as $c) {
    $stmt= $c->foto;
    return $stmt;
    }
  }

// Akademik
  function find_idjenjang($id)
  {
    $ci =& get_instance();
    $ci->load->database();
    $result = $ci->db->where('id_jenjang',$id)->get('tabel_kelas');
      foreach ($result->result() as $c) {
      $stmt= $c->id_jenjang;
      return $stmt;
      }
  }

  function tampil_paketjenjangById($id)
  {
  $ci =& get_instance();
  $ci->load->database();
  $result = $ci->db->where('id_paket',$id)->get('tabel_paketjenjang');
    foreach ($result->result() as $c) {
    $stmt= $c->nama_paket;
    return $stmt;
    }
  }

  function tampil_namarombel_byid($id)
  {
  $ci =& get_instance();
  $ci->load->database();
  $result = $ci->db->where('id_rombel',$id)->get('tabel_rombel');
    foreach ($result->result() as $c) {
    $stmt= $c->nama_rombel;
    return $stmt;
    }
  }

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

  function tampil_namajenjang_ByIdKelas($id)
  {
  $ci =& get_instance();
  $ci->load->database();
  $namadaftar = '';
  $result = $ci->db->select('*')
                    ->from('tabel_kelas')
                    ->join('tabel_jenjang','tabel_kelas.id_jenjang = tabel_jenjang.id_jenjang')
                    ->where('tabel_kelas.id_kelas',$id)
                    ->get();
    foreach ($result->result() as $c) {
    $stmt= $c->nama_jenjang;
    $namadaftar= $namadaftar.$stmt.'<br>';
    }
    return $namadaftar;
  }

  function tampil_namajenjang_ByIdSiswa($id)
  {
  $ci =& get_instance();
  $ci->load->database();
  $namajenjang = '';
  $result = $ci->db->select('*')
                    ->from('tabel_siswa')
                    ->join('tabel_daftar','tabel_siswa.id_daftar = tabel_daftar.id_daftar')
                    ->join('tabel_jenjang','tabel_daftar.id_jenjang = tabel_jenjang.id_jenjang')
                    ->where('tabel_siswa.id_siswa',$id)
                    ->get();
    foreach ($result->result() as $c) {
    $stmt= $c->nama_jenjang;
    $namajenjang= $namajenjang.$stmt.'<br>';
    }
    return $namajenjang;
  }

  function tampil_almtjenjang_ByIdSiswa($id)
  {
  $ci =& get_instance();
  $ci->load->database();
  $addrs = '';
  $result = $ci->db->select('*')
                    ->from('tabel_siswa')
                    ->join('tabel_daftar','tabel_siswa.id_daftar = tabel_daftar.id_daftar')
                    ->join('tabel_jenjang','tabel_daftar.id_jenjang = tabel_jenjang.id_jenjang')
                    ->where('tabel_siswa.id_siswa',$id)
                    ->get();
    foreach ($result->result() as $c) {
    $stmt= $c->alamat;
    $addrs= $addrs.$stmt.'<br>';
    }
    return $addrs;
  }

  function tampil_idta_ByIdSiswa($id)
  {
  $ci =& get_instance();
  $ci->load->database();
  $idangkatan = '';
  $result = $ci->db->select('*')
                    ->from('tabel_siswa')
                    ->join('tabel_daftar','tabel_siswa.id_daftar = tabel_daftar.id_daftar')
                    ->join('tabel_tahunajaran','tabel_daftar.id_angkatan = tabel_tahunajaran.id_angkatan')
                    ->where('tabel_siswa.id_siswa',$id)
                    ->get();
    foreach ($result->result() as $c) {
    $stmt= $c->id_angkatan;
    $idangkatan= $idangkatan.$stmt;
    }
    return $idangkatan;
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

  function find_idjenismapel($id)
  {
    $ci =& get_instance();
    $ci->load->database();
    $result = $ci->db->where('id_jenismapel',$id)->get('tabel_jenismapel');
      foreach ($result->result() as $c) {
      $stmt= $c->id_jenismapel;
      return $stmt;
      }
  }

  function tampil_mapelById($id)
  {
  $ci =& get_instance();
  $ci->load->database();
  $result = $ci->db->where('id_mapel',$id)->get('tabel_mapel');
    foreach ($result->result() as $c) {
    $stmt= $c->nama_mapel;
    return $stmt;
    }
  }

  function tampil_ket_mapelById($id)
  {
  $ci =& get_instance();
  $ci->load->database();
  $result = $ci->db->where('id_mapel',$id)->get('tabel_mapel');
    foreach ($result->result() as $c) {
    $stmt= $c->keterangan;
    return $stmt;
    }
  }

  function tampil_ket_kelasById($id)
  {
  $ci =& get_instance();
  $ci->load->database();
  $result = $ci->db->where('id_kelas',$id)->get('tabel_kelas');
    foreach ($result->result() as $c) {
    $stmt= $c->keterangan;
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

  function tampil_ket_jenismapelById($id)
  {
  $ci =& get_instance();
  $ci->load->database();
  $result = $ci->db->where('id_jenismapel',$id)->get('tabel_jenismapel');
    foreach ($result->result() as $c) {
    $stmt= $c->keterangan;
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

  function tampil_id_kelas_rombel_byid($id)
  {
  $ci =& get_instance();
  $ci->load->database();
  $result = $ci->db->where('id_rombel',$id)->get('tabel_rombel');
    foreach ($result->result() as $c) {
    $stmt= $c->id_kelas;
    return $stmt;
    }
  }

  function tampil_kelas_byid($id)
  {
  $ci =& get_instance();
  $ci->load->database();
  $result = $ci->db->where('id_kelas',$id)->get('tabel_kelas');
    foreach ($result->result() as $c) {
    $stmt= $c->nama_kelas;
    return $stmt;
    }
  }

  function tampil_nama_siswa_byid($id)
  {
  $ci =& get_instance();
  $ci->load->database();
  $result = $ci->db->where('id_daftar',$id)->get('tabel_daftar');
    foreach ($result->result() as $c) {
    $stmt= $c->nama;
    return $stmt;
    }
  }

 // Data Siswa
  function tampil_jekel_siswa_byid($id)
  {
  $ci =& get_instance();
  $ci->load->database();
  $result = $ci->db->where('id_daftar',$id)->get('tabel_daftar');
    foreach ($result->result() as $c) {
    $stmt= $c->jekel;
    return $stmt;
    }
  }
  function tampil_tempat_lahir_siswa_byid($id)
  {
  $ci =& get_instance();
  $ci->load->database();
  $result = $ci->db->where('id_daftar',$id)->get('tabel_daftar');
    foreach ($result->result() as $c) {
    $stmt= $c->tempat_lahir;
    return $stmt;
    }
  }
  function tampil_tanggal_lahir_siswa_byid($id)
  {
  $ci =& get_instance();
  $ci->load->database();
  $result = $ci->db->where('id_daftar',$id)->get('tabel_daftar');
    foreach ($result->result() as $c) {
    $stmt= $c->tgl_lahir;
    return $stmt;
    }
  }
  function tampil_alamat_siswa_byid($id)
  {
  $ci =& get_instance();
  $ci->load->database();
  $result = $ci->db->where('id_daftar',$id)->get('tabel_daftar');
    foreach ($result->result() as $c) {
    $stmt= $c->alamat;
    return $stmt;
    }
  }
  function tampil_pindah_siswa_byid($id)
  {
  $ci =& get_instance();
  $ci->load->database();
  $result = $ci->db->where('id_daftar',$id)->get('tabel_pindah');
    foreach ($result->result() as $c) {
    $stmt= $c->nama_sekolah;
    return $stmt;
    }
  }
  function tampil_lulus_siswa_byid($id)
  {
  $ci =& get_instance();
  $ci->load->database();
  $result = $ci->db->where('id_daftar',$id)->get('tabel_lulus');
    foreach ($result->result() as $c) {
    $stmt= $c->tanggal_lulus;
    return $stmt;
    }
  }
  function tampil_agama_siswa_byid($id)
  {
  $ci =& get_instance();
  $ci->load->database();
  $result = $ci->db->where('id_daftar',$id)->get('tabel_daftar');
    foreach ($result->result() as $c) {
    $stmt= $c->agama;
    return $stmt;
    }
  }
  function tampil_warga_negara_siswa_byid($id)
  {
  $ci =& get_instance();
  $ci->load->database();
  $result = $ci->db->where('id_daftar',$id)->get('tabel_daftar');
    foreach ($result->result() as $c) {
    $stmt= $c->warga_negara;
    return $stmt;
    }
  }
  function tampil_nisn_siswa_byid($id)
  {
  $ci =& get_instance();
  $ci->load->database();
  $result = $ci->db->where('id_daftar',$id)->get('tabel_daftar');
    foreach ($result->result() as $c) {
    $stmt= $c->nisn;
    return $stmt;
    }
  }
  function tampil_telepon_siswa_byid($id)
  {
  $ci =& get_instance();
  $ci->load->database();
  $result = $ci->db->where('id_daftar',$id)->get('tabel_daftar');
    foreach ($result->result() as $c) {
    $stmt= $c->telepon;
    return $stmt;
    }
  }
  function tampil_anak_ke_siswa_byid($id)
  {
  $ci =& get_instance();
  $ci->load->database();
  $result = $ci->db->where('id_daftar',$id)->get('tabel_daftar');
    foreach ($result->result() as $c) {
    $stmt= $c->anak_ke;
    return $stmt;
    }
  }
  function tampil_saudara_kandung_siswa_byid($id)
  {
  $ci =& get_instance();
  $ci->load->database();
  $result = $ci->db->where('id_daftar',$id)->get('tabel_daftar');
    foreach ($result->result() as $c) {
    $stmt= $c->saudara_kandung;
    return $stmt;
    }
  }
  function tampil_saudara_angkat_siswa_byid($id)
  {
  $ci =& get_instance();
  $ci->load->database();
  $result = $ci->db->where('id_daftar',$id)->get('tabel_daftar');
    foreach ($result->result() as $c) {
    $stmt= $c->saudara_angkat;
    return $stmt;
    }
  }
  function tampil_foto_siswa_byid($id)
  {
  $ci =& get_instance();
  $ci->load->database();
  $result = $ci->db->where('id_daftar',$id)->get('tabel_daftar');
    foreach ($result->result() as $c) {
    $stmt= $c->foto;
    return $stmt;
    }
  }

// Perpustakaan
  function namakategori($id)
  {
    $ci =& get_instance();
    $ci->load->database();
    $result = $ci->db->where('id_kategori_buku',$id)->get('table_kategori_buku');
      foreach ($result->result() as $c) {
      $stmt= $c->nama_kategori_buku;
      return $stmt;
      }
  }
 // Anggota
  function tampil_namadaftar_ByIdSiswa($id)
  {
  $ci =& get_instance();
  $ci->load->database();
  $namadaftar = '';
  $result = $ci->db->select('*')
                    ->from('tabel_siswa')
                    ->join('tabel_daftar','tabel_siswa.id_daftar = tabel_daftar.id_daftar')
                    ->where('tabel_siswa.id_siswa',$id)
                    ->get();
    foreach ($result->result() as $c) {
    $stmt= $c->nama;
    $namadaftar= $namadaftar.$stmt.'<br>';
    }
    return $namadaftar;
  }

  function tampil_foto_ByIdSiswa($id)
  {
  $ci =& get_instance();
  $ci->load->database();
  $namadaftar = '';
  $result = $ci->db->select('*')
                    ->from('tabel_siswa')
                    ->join('tabel_daftar','tabel_siswa.id_daftar = tabel_daftar.id_daftar')
                    ->where('tabel_siswa.id_siswa',$id)
                    ->get();
    foreach ($result->result() as $c) {
    $stmt= $c->foto;
    $namadaftar= $namadaftar.$stmt.'';
    }
    return $namadaftar;
  }

  function tampil_jekeldaftar_ByIdSiswa($id)
  {
  $ci =& get_instance();
  $ci->load->database();
  $namadaftar = '';
  $result = $ci->db->select('*')
                    ->from('tabel_siswa')
                    ->join('tabel_daftar','tabel_siswa.id_daftar = tabel_daftar.id_daftar')
                    ->where('tabel_siswa.id_siswa',$id)
                    ->get();
    foreach ($result->result() as $c) {
    $stmt= $c->jekel;
    $namadaftar= $namadaftar.$stmt.'<br>';
    }
    return $namadaftar;
  }

  function tampil_nisndaftar_ByIdSiswa($id)
  {
  $ci =& get_instance();
  $ci->load->database();
  $nisn = '';
  $result = $ci->db->select('*')
                    ->from('tabel_siswa')
                    ->join('tabel_daftar','tabel_siswa.id_daftar = tabel_daftar.id_daftar')
                    ->where('tabel_siswa.id_siswa',$id)
                    ->get();
    foreach ($result->result() as $c) {
    $stmt= $c->nisn;
    $nisn= $nisn.$stmt.'<br>';
    }
    return $nisn;
  }

  function tampil_rombeldaftar_ByIdSiswa($id)
  {
  $ci =& get_instance();
  $ci->load->database();
  $namadaftar = '';
  $result = $ci->db->select('*')
                    ->from('tabel_siswa')
                    ->join('tabel_rombel','tabel_siswa.id_rombel = tabel_rombel.id_rombel')
                    ->where('tabel_siswa.id_siswa',$id)
                    ->get();
    foreach ($result->result() as $c) {
    $stmt= $c->nama_rombel;
    $namadaftar= $namadaftar.$stmt.'<br>';
    }
    return $namadaftar;
  }

  function tampil_kelasdaftar_ByIdSiswa($id)
  {
  $ci =& get_instance();
  $ci->load->database();
  $namakelas = '';
  $result = $ci->db->select('*')
                    ->from('tabel_siswa')
                    ->join('tabel_rombel','tabel_siswa.id_rombel = tabel_rombel.id_rombel')
                    ->join('tabel_kelas','tabel_rombel.id_kelas = tabel_kelas.id_kelas')
                    ->where('tabel_siswa.id_siswa',$id)
                    ->get();
    foreach ($result->result() as $c) {
    $stmt= $c->nama_kelas;
    $namakelas= $namakelas.$stmt;
    }
    return $namakelas;
  }

 // Peminjaman Buku
  function tampil_namabuku_byPeminjamanId($id)
  {
    $ci =& get_instance();
    $ci->load->database();
    $namabuku = '';
    $result = $ci->db->select('*')
                      ->from('table_detail_index_buku')
                      ->join('table_buku','table_detail_index_buku.id_buku = table_buku.id_buku')
                      ->where('table_detail_index_buku.id_stok',$id)
                      ->get();
      foreach ($result->result() as $c) {
      $stmt= $c->judul_buku;
      $namabuku= $namabuku.$stmt.'<br>';
      }
      return $namabuku;
  }
  function tampil_pengarangbuku_byPeminjamanId($id)
  {
    $ci =& get_instance();
    $ci->load->database();
    $namabuku = '';
    $result = $ci->db->select('*')
                      ->from('table_detail_index_buku')
                      ->join('table_buku','table_detail_index_buku.id_buku = table_buku.id_buku')
                      ->where('table_detail_index_buku.id_stok',$id)
                      ->get();
      foreach ($result->result() as $c) {
      $stmt= $c->penulis_buku;
      $namabuku= $namabuku.$stmt.'<br>';
      }
      return $namabuku;
  }
  function tampil_kategoribuku_byPeminjamanId($id)
  {
    $ci =& get_instance();
    $ci->load->database();
    $namabuku = '';
    $result = $ci->db->select('*')
                      ->from('table_detail_index_buku')
                      ->join('table_buku','table_detail_index_buku.id_buku = table_buku.id_buku')
                      ->join('table_kategori_buku','table_buku.kategori_id = table_kategori_buku.id_kategori_buku')
                      ->where('table_detail_index_buku.id_stok',$id)
                      ->get();
      foreach ($result->result() as $c) {
      $stmt= $c->nama_kategori_buku;
      $namabuku= $namabuku.$stmt.'<br>';
      }
      return $namabuku;
  }
  function tampil_rakbuku_byPeminjamanId($id)
  {
    $ci =& get_instance();
    $ci->load->database();
    $namabuku = '';
    $result = $ci->db->select('*')
                      ->from('table_detail_index_buku')
                      ->join('table_buku','table_detail_index_buku.id_buku = table_buku.id_buku')
                      ->where('table_detail_index_buku.id_stok',$id)
                      ->get();
      foreach ($result->result() as $c) {
      $stmt= $c->rak_buku_id;
      $namabuku= $namabuku.$stmt.'<br>';
      }
      return $namabuku;
  }
  function tampil_idbuku_byPeminjamanId($id)
  {
    $ci =& get_instance();
    $ci->load->database();
    $namabuku = '';
    $result = $ci->db->select('*')
                      ->from('table_detail_index_buku')
                      ->join('table_buku','table_detail_index_buku.id_buku = table_buku.id_buku')
                      ->where('table_detail_index_buku.id_stok',$id)
                      ->get();
      foreach ($result->result() as $c) {
      $stmt= $c->id_buku;
      return $stmt;
      }
  }
  function tampil_id_index_buku($id)
  {
    $ci =& get_instance();
    $ci->load->database();
    $result = $ci->db->where('id_stok',$id)->get('table_detail_index_buku');
      foreach ($result->result() as $c) {
      $stmt= $c->id_detail_index_buku;
      return $stmt;
      }
  }

 // By Anggota
  function tampil_namadaftar_ByIdAnggota($id)
  {
  $ci =& get_instance();
  $ci->load->database();
  $namasiswa = '';
  $result = $ci->db->select('*')
                    ->from('tabel_anggota')
                    ->join('tabel_siswa','tabel_anggota.id_siswa = tabel_siswa.id_siswa')
                    ->join('tabel_daftar','tabel_siswa.id_daftar = tabel_daftar.id_daftar')
                    ->where('tabel_anggota.id_anggota',$id)
                    ->get();
    foreach ($result->result() as $c) {
    $stmt= $c->nama;
    $namasiswa= $namasiswa.$stmt.'<br>';
    }
    return $namasiswa;
  }

  function tampil_kelasdaftar_ByIdAnggota($id)
  {
  $ci =& get_instance();
  $ci->load->database();
  $namakelas = '';
  $result = $ci->db->select('*')
                    ->from('tabel_anggota')
                    ->join('tabel_siswa','tabel_anggota.id_siswa = tabel_siswa.id_siswa')
                    ->join('tabel_rombel','tabel_siswa.id_rombel = tabel_rombel.id_rombel')
                    ->join('tabel_kelas','tabel_rombel.id_kelas = tabel_kelas.id_kelas')
                    ->where('tabel_anggota.id_anggota',$id)
                    ->get();
    foreach ($result->result() as $c) {
    $stmt= $c->nama_kelas;
    $namakelas= $namakelas.$stmt.'<br>';
    }
    return $namakelas;
  }

  function tampil_rombeldaftar_ByIdAnggota($id)
  {
  $ci =& get_instance();
  $ci->load->database();
  $namarombel = '';
  $result = $ci->db->select('*')
                    ->from('tabel_anggota')
                    ->join('tabel_siswa','tabel_anggota.id_siswa = tabel_siswa.id_siswa')
                    ->join('tabel_rombel','tabel_siswa.id_rombel = tabel_rombel.id_rombel')
                    ->where('tabel_anggota.id_anggota',$id)
                    ->get();
    foreach ($result->result() as $c) {
    $stmt= $c->nama_rombel;
    $namarombel= $namarombel.$stmt.'<br>';
    }
    return $namarombel;
  }

  function tampil_kelas_ByRombel($id)
  {
  $ci =& get_instance();
  $ci->load->database();
  $namakelas = '';
  $result = $ci->db->select('*')
                    ->from('tabel_rombel')
                    ->join('tabel_kelas','tabel_rombel.id_kelas = tabel_kelas.id_kelas')
                    ->where('tabel_rombel.id_rombel',$id)
                    ->get();
    foreach ($result->result() as $c) {
    $stmt= $c->nama_kelas;
    $namakelas= $namakelas.$stmt.'<br>';
    }
    return $namakelas;
  }

  function find_idrombel($id)
  {
    $ci =& get_instance();
    $ci->load->database();
    $result = $ci->db->where('id_kelas',$id)->get('tabel_rombel');
      foreach ($result->result() as $c) {
      $stmt= $c->id_kelas;
      return $stmt;
      }
  }

  function find_idalokasimapel($id)
  {
    $ci =& get_instance();
    $ci->load->database();
    $result = $ci->db->where('id_rombel',$id)->get('tabel_alokasimapel');
      foreach ($result->result() as $c) {
      $stmt= $c->id_rombel;
      return $stmt;
      }
  }

  function find_idsiswa($id)
  {
    $ci =& get_instance();
    $ci->load->database();
    $result = $ci->db->where('id_rombel',$id)->get('tabel_siswa');
      foreach ($result->result() as $c) {
      $stmt= $c->id_rombel;
      return $stmt;
      }
  }

  function find_idanggota($id)
  {
    $ci =& get_instance();
    $ci->load->database();
    $result = $ci->db->where('id_siswa',$id)->get('tabel_anggota');
      foreach ($result->result() as $c) {
      $stmt= $c->id_siswa;
      return $stmt;
      }
  }

  function find_iddetailbuku($id)
  {
    $ci =& get_instance();
    $ci->load->database();
    $result = $ci->db->where('id_buku',$id)->get('table_detail_index_buku');
      foreach ($result->result() as $c) {
      $stmt= $c->id_buku;
      return $stmt;
      }
  }
  
 // Detail Index Buku
  function tampil_judul_buku_byid($id)
  {
  $ci =& get_instance();
  $ci->load->database();
  $result = $ci->db->where('id_buku',$id)->get('table_buku');
    foreach ($result->result() as $c) {
    $stmt= $c->judul_buku;
    return $stmt;
    }
  }

  function tampil_penerbit_buku_byid($id)
  {
  $ci =& get_instance();
  $ci->load->database();
  $result = $ci->db->where('id_buku',$id)->get('table_buku');
    foreach ($result->result() as $c) {
    $stmt= $c->penerbit_buku;
    return $stmt;
    }
  }

  function tampil_tahun_terbit_byid($id)
  {
  $ci =& get_instance();
  $ci->load->database();
  $result = $ci->db->where('id_buku',$id)->get('table_buku');
    foreach ($result->result() as $c) {
    $stmt= $c->tahun_terbit;
    return $stmt;
    }
  }

  function tampil_kategori_id_byid($id)
  {
  $ci =& get_instance();
  $ci->load->database();
  $result = $ci->db->where('id_buku',$id)->get('table_buku');
    foreach ($result->result() as $c) {
    $stmt= $c->kategori_id;
    return $stmt;
    }
  }

  function tampil_rak_buku_id_byid($id)
  {
  $ci =& get_instance();
  $ci->load->database();
  $result = $ci->db->where('id_buku',$id)->get('table_buku');
    foreach ($result->result() as $c) {
    $stmt= $c->rak_buku_id;
    return $stmt;
    }
  }

  function tampil_penulis_buku_byid($id)
  {
  $ci =& get_instance();
  $ci->load->database();
  $result = $ci->db->where('id_buku',$id)->get('table_buku');
    foreach ($result->result() as $c) {
    $stmt= $c->penulis_buku;
    return $stmt;
    }
  }

  function tampil_stok_byid($id)
  {
  $ci =& get_instance();
  $ci->load->database();
  $result = $ci->db->where('id_buku',$id)->get('table_buku');
    foreach ($result->result() as $c) {
    $stmt= $c->stok;
    return $stmt;
    }
  }

 // Data Nilai Siswa
  function tampil_id_daftar_siswa_byid($id)
  {
  $ci =& get_instance();
  $ci->load->database();
  $result = $ci->db->where('id_siswa',$id)->get('tabel_siswa');
    foreach ($result->result() as $c) {
    $stmt= $c->id_daftar;
    return $stmt;
    }
  }

  function tampil_id_rombel_siswa_byid($id)
  {
  $ci =& get_instance();
  $ci->load->database();
  $result = $ci->db->where('id_siswa',$id)->get('tabel_siswa');
    foreach ($result->result() as $c) {
    $stmt= $c->id_rombel;
    return $stmt;
    }
  }

//Keuangan
  function tampil_rn_byid($id)
  {
  $ci =& get_instance();
  $ci->load->database();
  $result = $ci->db->where('id_rencana_anggaran',$id)->get('tabel_rencana_anggaran');
    foreach ($result->result() as $c) {
    $stmt= $c->nama_anggaran;
    return $stmt;
    }
  }

  function tampil_tetapkan_byid($id)
  {
  $ci =& get_instance();
  $ci->load->database();
  $result = $ci->db->where('id_rencana_anggaran',$id)->get('tabel_rencana_anggaran');
    foreach ($result->result() as $c) {
    $stmt= $c->tetapkan;
    return $stmt;
    }
  }


  function tampil_periodeawal_byid($id)
  {
  $ci =& get_instance();
  $ci->load->database();
  $result = $ci->db->where('id_rencana_anggaran',$id)->get('tabel_rencana_anggaran');
    foreach ($result->result() as $c) {
    $stmt= $c->awal_periode;
    return $stmt;
    }
  }

  function tampil_periodeakhir_byid($id)
  {
  $ci =& get_instance();
  $ci->load->database();
  $result = $ci->db->where('id_rencana_anggaran',$id)->get('tabel_rencana_anggaran');
    foreach ($result->result() as $c) {
    $stmt= $c->akhir_periode;
    return $stmt;
    }
  }

  function tampil_akun_byid($id)
  {
  $ci =& get_instance();
  $ci->load->database();
  $result = $ci->db->where('id_akun',$id)->get('tabel_akun');
    foreach ($result->result() as $c) {
    $stmt= $c->nama_akun;
    return $stmt;
    }
  }
  
  
  function convRupiah($value) {
    return 'Rp. ' . number_format($value);
  } 

  function format_indo($date){
    date_default_timezone_set('Asia/Jakarta');
    // array hari dan bulan
    $Hari = array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu");
    $Bulan = array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
    
    // pemisahan tahun, bulan, hari, dan waktu
    $tahun = substr($date,0,4);
    $bulan = substr($date,5,2);
    $tgl = substr($date,8,2);
    $waktu = substr($date,11,5);
    $hari = date("w",strtotime($date));
    $result = $Hari[$hari].", ".$tgl." ".$Bulan[(int)$bulan-1]." ".$tahun." ".$waktu;

    return $result;
  }
 // Jenis Bayar
  function tampil_namajenisbayarById($id)
  {
  $ci =& get_instance();
  $ci->load->database();
  $result = $ci->db->where('id_jenis',$id)->get('tabel_jenisbayar');
    foreach ($result->result() as $c) {
    $stmt= $c->nama_jenis;
    return $stmt;
    }
  }

 // Transaksi
  function tampil_nama_akun_transaksi($id)
  {
  $ci =& get_instance();
  $ci->load->database();
  $result = $ci->db->where('id_akun',$id)->get('tabel_akun');
    foreach ($result->result() as $c) {
    $stmt= $c->nama_akun;
    return $stmt;
    }
  }
  function tampil_debet_transaksi($id)
  {
  $ci =& get_instance();
  $ci->load->database();
  $result = $ci->db->where('id',$id)->get('tabel_jenis_transaksi');
    foreach ($result->result() as $c) {
    $stmt= $c->debit;
    return $stmt;
    }
  }
  function tampil_kredit_transaksi($id)
  {
  $ci =& get_instance();
  $ci->load->database();
  $result = $ci->db->where('id',$id)->get('tabel_jenis_transaksi');
    foreach ($result->result() as $c) {
    $stmt= $c->kredit;
    return $stmt;
    }
  }
  function tampil_nama_jenis_transaksi($id)
  {
  $ci =& get_instance();
  $ci->load->database();
  $result = $ci->db->where('id',$id)->get('tabel_jenis_transaksi');
    foreach ($result->result() as $c) {
    $stmt= $c->nama_jenis_transaksi;
    return $stmt;
    }
  }
  function tampil_jenisbayarById($id)
  {
  $ci =& get_instance();
  $ci->load->database();
  $result = $ci->db->where('id_jenis',$id)->get('tabel_jenisbayar');
    foreach ($result->result() as $c) {
    $stmt= $c->nama_jenis;
    return $stmt;
    }
  }

// Hak Akses
  function tampil_hak_akses($id)
  {
  $ci =& get_instance();
  $ci->load->database();
  $result = $ci->db->where('id_hak_akses',$id)->get('tabel_hak_akses');
    foreach ($result->result() as $c) {
    $stmt= $c->akses;
    return $stmt;
    }
  }

  function ChangeDateFormat($format, $givenDate=null)
  {
      return date($format, strtotime($givenDate));
  }

    // For Hide Button
  
    function tampil_bukuById_rak($id)
    {
     $ci =& get_instance();
     $ci->load->database();
     $result = $ci->db->where('rak_buku_id',$id)->get('table_buku');
      foreach ($result->result() as $c) {
      $stmt= $c->judul_buku;
      return $stmt;
      }
    }
  
    function tampil_bukuBy_kategori($id)
    {
     $ci =& get_instance();
     $ci->load->database();
     $result = $ci->db->where('kategori_id',$id)->get('table_buku');
      foreach ($result->result() as $c) {
      $stmt= $c->judul_buku;
      return $stmt;
      }
    }
  
    function tampil_detailBukuById_buku($id)
    {
     $ci =& get_instance();
     $ci->load->database();
     $result = $ci->db->where('id_buku',$id)->get('table_detail_index_buku');
      foreach ($result->result() as $c) {
      $stmt= $c->id_detail_index_buku;
      return $stmt;
      }
    }

    function tampil_pesan_byId_alumni($id)
    {
     $ci =& get_instance();
     $ci->load->database();
     $result = $ci->db->where('id_level',$id)->get('tabel_testimoni');
      foreach ($result->result() as $c) {
      $stmt= $c->pesan;
      return $stmt;
      }
    }

    function nama_angkatan($id)
    {
     $ci =& get_instance();
     $ci->load->database();
     $result = $ci->db->where('id_angkatan',$id)->get('tabel_tahunajaran');
      foreach ($result->result() as $c) {
      $stmt= $c->nama_angkatan;
      return $stmt;
      }
    }

// Peminjaman
    function tampil_status_buku_ByDetailIndexBuku($id)
    {
    $ci =& get_instance();
    $ci->load->database();
    $result = $ci->db->select('*')
                      ->from('table_detail_index_buku')
                      ->join('table_buku','table_detail_index_buku.id_buku = table_buku.id_buku')
                      ->where('table_detail_index_buku.id_stok',$id)
                      ->get();
      foreach ($result->result() as $c) {
      $stmt= $c->del_flag;
      }
      return $stmt;
    }

?>