<?php

class M_keuangan extends CI_Model{
    public function get_all_data_keuangan()
    {
        return $this->db->get('tabel_keuangan')->result();
    }

    public function tambah_anggaran($tabel, $data)
    {
        $this->db->insert($tabel, $data);
        return $this->db->insert_id();
    }

    public function edit_anggaran($tabel, $data, $where)
    {
        $data=$this->db->update($tabel, $data, $where);
        return $this->db->affected_rows();
    }
}
