<?php

class Main_model extends CI_Model
{
    function getwhere($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    function where_orderby_data($order, $where, $table)
    {
        $this->db->where($where);
        $this->db->order_by($order);
        return $this->db->get($table);
    }

    function get($table)
    {
        return $this->db->get($table);
    }
    function get_all_count($table)
    {
        $this->db->from($table);
        return $this->db->count_all_results();
    }

    function insert_data($data, $table)
    {
        return $this->db->insert($table, $data);
    }

    function update_data($where, $data, $table)
    {
        $this->db->where($where);
        return $this->db->update($table, $data);
    }

    function delete_data($where, $table)
    {
        $this->db->where($where);
        return $this->db->delete($table);
    }

    public function read_join_one($table1, $table2, $field1, $field2, $where, $id)
    {
        $this->db->select('*');
        $this->db->from($table1);
        $this->db->join($table2, $table1 . '.' . $field1 . '=' . $table2 . '.' . $field2);
        $this->db->where($where);
        $this->db->order_by($id, 'DESC');
        return $this->db->get();
    }
    public function read_join_two($table1, $table2, $table3, $field1, $field2, $field3, $where, $id)
    {
        $this->db->select('*');
        $this->db->from($table1);
        $this->db->join($table2, $table1 . '.' . $field1 . '=' . $table2 . '.' . $field2);
        $this->db->join($table3, $table1 . '.' . $field1 . '=' . $table3 . '.' . $field3);
        $this->db->where($where);
        $this->db->order_by($id, 'DESC');
        return $this->db->get();
    }

    public function view_join_one_data_angkatan($table1, $table2, $field1, $field2, $order, $ordering, $where)
    {
        //join 1 table
        $this->db->select('*');
        $this->db->from($table1);
        $this->db->join($table2, $table1 . '.' . $field1 . '=' . $table2 . '.' . $field2);
        $this->db->where($where);
        $this->db->order_by($order, $ordering);
        return $this->db->get();
    }

    public function view_join_one($table1, $table2, $field1, $field2, $order, $ordering)
    {
        //join 1 table
        $this->db->select('*');
        $this->db->from($table1);
        $this->db->join($table2, $table1 . '.' . $field1 . '=' . $table2 . '.' . $field2);
        $this->db->order_by($order, $ordering);
        return $this->db->get();
    }

    public function count_field($where, $table)
    {
        $this->db->select('COUNT(*)');
        $this->db->from($table);
        $this->db->where($where);
        return $this->db->count_all_results();
    }

    public function count_all($table)
    {
        return $this->db->count_all($table);
    }

    public function count_group_by($select, $group_by, $table)
    {
        //contoh hasil SELECT tahun_lulus, COUNT(tahun_lulus) AS jumlah_lulusan FROM `data_diri` GROUP BY `tahun_lulus` 
        $this->db->select($select);
        $this->db->from($table);
        $this->db->group_by($group_by);
        return $this->db->get();
    }

    private $performance = 'performance';


    // Dashboard
    function get_chart_data() {
        $query = $this->db->get($this->performance);
        $results['chart_data'] = $query->result();
        $this->db->select_min('performance_year');
        $this->db->limit(1);
        $query = $this->db->get($this->performance);
        $results['min_year'] = $query->row()->performance_year;
        $this->db->select_max('performance_year');
        $this->db->limit(1);
        $query = $this->db->get($this->performance);
        $results['max_year'] = $query->row()->performance_year;
        return $results;
    }

    public function total($column, $what, $table)
    {
    return $this->db->where($column, $what)->get($table)->num_rows();
    }

    public function get_graph($create_date, $pasien_status_id)
    {
        $multiClause = array('create_date' => $create_date,'pasien_status_id' => $pasien_status_id);
        $data = $this->db->where($multiClause)->get('periksa');
        return $data;
    }
}
?>