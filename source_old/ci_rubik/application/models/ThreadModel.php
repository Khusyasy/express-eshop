<?php

class ThreadModel extends CI_Model{
    public function get_all(){
        $query = $this->db->select('tbl_thread.id, tbl_thread.tanggal_buat, tbl_thread.nama_thread, tbl_account.name')
                            ->from('tbl_thread')
                            ->join('tbl_account', 'tbl_thread.id_account = tbl_account.id')
                            ->order_by('tbl_thread.tanggal_buat', 'DESC')
                            ->get();
        return $query;
    }
    public function get_all_kat($kat){
        $query = $this->db->select('tbl_thread.id, tbl_thread.tanggal_buat, tbl_thread.nama_thread, tbl_account.username')
                            ->from('tbl_thread')
                            ->join('tbl_account', 'tbl_thread.id_account = tbl_account.id')
                            ->where('tbl_thread.id_kategori', $kat)
                            ->order_by('tbl_thread.tanggal_buat', 'DESC')
                            ->get();
        return $query;
    }
    public function get_thread($id){
        $query = $this->db->where('id', $id)
                            ->get('tbl_thread')->row_array();
        return $query;
    }
    public function add_thread($kategori, $user, $thread){
        $query = $this->db->set('id_kategori', $kategori)
                            ->set('id_account', $user)
                            ->set('nama_thread', $thread)
                            ->set('tanggal_buat', 'NOW()', FALSE)
                            ->insert('tbl_thread');
        if($query){
            return $this->db->insert_id();
        }else{
            return -1;
        }
    }
    public function check_rows($id){
        $query = $this->db->select('*')
                            ->from('tbl_post')
                            ->where('tbl_post.id_thread', $id)
                            ->get()->num_rows();
        return $query;
    }
    public function delete_thread($id){
        $query = $this->db->where('id', $id)
                            ->delete('tbl_thread');
        return $query;
    }
}