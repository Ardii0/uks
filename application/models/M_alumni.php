<?php

class M_alumni extends CI_Model{
 
    //General Controllers
    public function get_data($tabel)
	{
		return $this->db->get($tabel)->result();
	}

    public function input_data($tabel, $data)
	{
        $this->db->insert($tabel, $data);
        return $this->db->insert_id();
	}

    public function edit_data($tabel, $data, $where)
    {
        $data=$this->db->update($tabel, $data, $where);
        return $this->db->affected_rows();
    }

    public function delete_data($tabel, $field, $id)
	{
		$data=$this->db->delete($tabel, array($field => $id));
		return $data;
	}

    function get($table)
  	{
		return $this->db->get($table);
	}

    function getwhere($table,$where)
  	{
		return $this->db->get_where($table,$where);
	}

// Data Diri

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