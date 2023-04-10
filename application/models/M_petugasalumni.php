<?php

class M_petugasalumni extends CI_Model{
//General Models ----CRUD NORMAL USE THIS SECTION! DONT MAKE A DUPLICATE CODE!----
    function get($table)
  	{
		return $this->db->get($table);
	}

    function get_filter_data($field, $filter, $table)
  	{
		return $this->db->order_by($field, $filter)->get($table);
	}
    
    function getwhere($table,$where)
  	{
		return $this->db->get_where($table,$where);
	}

	public function get_data_id($tabel, $where, $id_data)
    {
        $data=$this->db->where($where, $id_data)->get($tabel);
        return $data;
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


}