<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Barang_aset_pinjam_model extends CI_Model
{

    public $table = 'barang_aset_pinjam';
    public $id = 'id_aset_pinjam';
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
    
 //    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_aset_pinjam', $q);
	$this->db->or_like('nama_aset', $q);
	$this->db->or_like('nama_pegawai', $q);
	$this->db->or_like('jabatan', $q);
    $this->db->or_like('keterangan', $q);
    $this->db->or_like('tanggal_pinjam', $q);
    $this->db->or_like('kartu_p', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_aset_pinjam', $q);
	$this->db->or_like('nama_aset', $q);
	$this->db->or_like('nama_pegawai', $q);
	$this->db->or_like('jabatan', $q);
    $this->db->or_like('keterangan', $q);
    $this->db->or_like('tanggal_pinjam', $q);
    $this->db->or_like('kartu_p', $q);
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

     function get_all_barang()
    {
        $this->db->order_by('nama_barang', 'asc');
        return $this->db->get('barang')->result_array();
    }
    
    function get_stok($kode_barang)
    {
        return $this->db->get_where('barang',array('id_barang'=>$kode_barang))->result();
    }

}

/* End of file Barang_model.php */
/* Location: ./application/models/Barang_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-05-03 15:15:51 */
/* http://harviacode.com */