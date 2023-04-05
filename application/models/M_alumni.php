<?php

class M_alumni extends CI_Model{

    function get($table)
  	{
		return $this->db->get($table);
	}

    function getwhere($table,$where)
  	{
		return $this->db->get_where($table,$where);
	}

// Data Diri
    function get_rombelByIdKelas($id_kelas){
        $query = $this->db->get_where('tabel_rombel', array('id_kelas' => $id_kelas));
        return $query;
    }


//
	public function tambah_testimoni($tabel, $data)
	{
	  $this->db->insert($tabel, $data);
	  return $this->db->insert_id();
	}
    function where_data($where, $table)
    {
        return $this->db->get_where($table, $where);
    }
    public function get_testimoni_by_id($id_alumni)
    {
        $data=$this->db->where('id_alumni', $id_alumni)->get('tabel_testimoni');
        return $data;
    }
    public function get_testimoni_byId($table)
	{
		$data = $this->db->get_where('tabel_testimoni', array('id_alumni' => $this->session->userdata('id_level')));
		return $data;
	}
    public function delete_testimoni($tabel, $field, $id_stok)
    {
        $data=$this->db->delete($tabel, array($field => $id_stok));
        return $data;
    }

}