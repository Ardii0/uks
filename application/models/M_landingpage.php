<?php

class M_landingpage extends CI_Model
{
    public function total_buku()
	{
		return $this->db->get('table_buku')->num_rows();
	}
	public function get_testimoni()
	{
		return $this->db->get('tabel_testimoni')->result();
	}
  public function total_testimoni_yes()
  {
    return $this->db->where('tampil','yes')->get('tabel_testimoni')->num_rows();
  }

    public function total_ketegori()
	{
		return $this->db->get('table_kategori_buku')->num_rows();
	}
    public function total_rak()
	{
		return $this->db->get('table_rak_buku')->num_rows();
	}

    public function get_bukuById($tabel, $id_buku)
    {
        $data = $this->db->where('id_buku', $id_buku)->get($tabel)->result();
        return $data;
    }

	public function tambah($tabel, $data)
	{
		$this->db->insert($tabel, $data);
		return $this->db->insert_id();
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

	public function filterByJudulBuku($judul_buku){
        if ($judul_buku != null) {
          $query = $this->db->query("SELECT * from table_buku where del_flag = '1' AND judul_buku = '$judul_buku' ORDER BY created_at ASC ");
        } else {
          $query = $this->db->query("SELECT * from table_buku");
        }

        return $query->result();
		}

    public function filterByKategoriBuku($id_kategori_buku){
      if ($id_kategori_buku != null) {
        $query = $this->db->where('kategori_id', $id_kategori_buku)->get('table_buku');
      } else {
        $query = $this->db->query("SELECT * from table_buku");
      }

      return $query->result();
    }
	public function filterByRakBuku($nama_rak_buku){
        if ($nama_rak_buku != null) {
          $query = $this->db->where('rak_buku_id', $nama_rak_buku)->get('table_buku');
        } else {
          $query = $this->db->query("SELECT * from table_buku");
        }

        return $query->result();
  }
  public function get_bukuByKat($tabel, $kategori_id)
        {
          $data = $this->db->where('kategori_id', $kategori_id)->get($tabel)->result();
          return $data;
      }

    public function get_bukuByRak($tabel, $rak_buku_id)
    {
        $data = $this->db->where('rak_buku_id', $rak_buku_id)->get($tabel)->result();
        return $data;
    }
}