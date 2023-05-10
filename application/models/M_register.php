<?php

class M_register extends CI_Model
{
    public function registrasi($tabel, $data)
	{
		$this->db->insert($tabel, $data);
		return $this->db->insert_id();
    }

}
?>