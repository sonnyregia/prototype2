<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Satuan_aset_model extends CI_Model
{

    public $table = 'satuan_aset';
    public $id = 'id_satuan_aset';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_satuan_aset', $q);
	$this->db->or_like('satuan_aset', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_satuan_aset', $q);
	$this->db->or_like('satuan_aset', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }
    function get_all_satuan()
    {
        $this->db->order_by('satuan_aset', 'asc');
        return $this->db->get('satuan_aset')->result_array();
    }

}

/* End of file Merk_barang_model.php */
/* Location: ./application/models/Merk_barang_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-05-03 15:15:33 */
/* http://harviacode.com */