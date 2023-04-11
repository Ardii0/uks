<?php

class M_register extends CI_Model{
	
    public function registrasi($tabel, $data)
	{
		$this->db->insert($tabel, $data);
		return $this->db->insert_id();
    }

// update user
public function update($table,$data, $where)
{
	$this->db->update($table, $data, $where);
	return $this->db->affected_rows();
}


}
