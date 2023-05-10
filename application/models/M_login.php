<?php

class M_login extends CI_Model
{
    function getwhere($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

}
?>