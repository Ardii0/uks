<?php

class M_alumni extends CI_Model{
//General Models ----COMMON CRUD USE THIS SECTION! DONT MAKE A DUPLICATE CODE!----
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

    function where_orderby_data($order, $where, $table)
    {
        $this->db->where($where);
        $this->db->order_by($order);
        return $this->db->get($table);
    }

    public function count_group_by($select, $group_by, $table)
    {
        $this->db->select($select);
        $this->db->from($table);
        $this->db->group_by($group_by);
        return $this->db->get();
    }

    public function query_single_join($table1, $table2, $field1, $field2, $order, $ordering, $where)
    {
        //for join 1 table
        $this->db->select('*');
        $this->db->from($table1);
        $this->db->join($table2, $table1 . '.' . $field1 . '=' . $table2 . '.' . $field2);
        $this->db->where($where);
        $this->db->order_by($order, $ordering);
        return $this->db->get();
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

    // Akun
	public function get_userByLogin($table)
	{
		$data = $this->db->get_where('tabel_level', array('id_level' => $this->session->userdata('id_level')));
		return $data;
	}
}