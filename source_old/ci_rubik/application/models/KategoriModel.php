<?php

class KategoriModel extends CI_Model{
    public function get_data(){
        $query = $this->db->select('id, nama_kategori')
                            ->from('tbl_kategori')
                            ->get()->result_array();
        return $query;
    }
    public function get_kat($id){
        $query = $this->db->select('id, nama_kategori')
                            ->from('tbl_kategori')
                            ->where('id', $id)
                            ->get();
        return $query;
    }
}