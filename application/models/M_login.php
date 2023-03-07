<?php

class M_login extends CI_Model{
	function cek_login($table,$where){
		return $this->db->get_where($table,$where);
	}
	public function last_login($data, $where)
	{
		$this->db->update("tabel_level", $data, $where);
		return $this->db->affected_rows();
	}
	// ambil data dari database yang usernamenya $username dan passwordnya p$assword
function cek($table,$where)
{
return $this->db->get_where($table,$where);
}

// update user
public function update($table,$data, $where)
{
	$this->db->update($table, $data, $where);
	return $this->db->affected_rows();
}


}
