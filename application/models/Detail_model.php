<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Detail_model extends CI_Model
{
    public $table = "detail_penjualan";
    public $id = "detail_penjualan.id";

    public function __construct()
    {
        parent::__construct();
    }

    public function get()
    {
        $this->db->select('k.*,s.nama as nama, s.harga as harga');
        $this->db->from('keranjang k');
        $this->db->join('sembako s', 'k.id_buku = s.id');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getById($id)
    {
        $this->db->select('d.*,r.nama as nama, s.nama as sembako');
        $this->db->from('detail_penjualan d');
        $this->db->join('user r', 'd.id_user = r.id');
        $this->db->join('sembako s', 'd.id_sembako = s.id');
        $this->db->where('d.no_penjualan', $id);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getByUser($id)
    {
        $idu = $this->session->userdata('id');
        $this->db->select('d.*,s.nama as nama_sembako');
        $this->db->from('detail_penjualan d');
        $this->db->join('sembako s', 'd.id_sembako = s.id');
        $this->db->where('d.no_penjualan', $id, 'AND d.id_user=' . $idu);
        $this->db->where('d.id_user', $idu);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function insert($data)
    {
        return $this->db->insert_batch($this->table, $data);
    }
    function charts()
    {
        $this->db->select('d.*, s.nama as sembako, sum(d.jumlah) as jum');
        $this->db->from('detail_penjualan d');
        $this->db->join('sembako s', 'd.id_sembako = s.id');
        $this->db->group_by('d.id_sembako');
        $query = $this->db->get();
        return $query->result_array();
    }
}
