<?php

class M_alumni extends CI_Model{

    function get($table,$where)
  	{
		return $this->db->get_where($table,$where);
	}

}