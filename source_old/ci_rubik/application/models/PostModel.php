<?php

class PostModel extends CI_Model{
    public function get_latest(){
        $query = $this->db->select('tbl_thread.id, tbl_thread.nama_thread, tbl_post.tanggal_post, tbl_post.isi_post , tbl_account.username')
                            ->from('tbl_post')
                            ->join('tbl_account', 'tbl_post.id_account = tbl_account.id')
                            ->join('tbl_thread', 'tbl_post.id_thread = tbl_thread.id')
                            ->order_by('tbl_post.tanggal_post', 'DESC')
                            ->limit(3)
                            ->get()->result_array();
        return $query;
    }
    // public function get_by_thread($thread){
    //     $query = $this->db->select('tbl_post.id, tbl_post.tanggal_post, tbl_post.isi_post, tbl_account.username, tbl_account.id as idacc')
    //                         ->from('tbl_post')
    //                         ->join('tbl_account', 'tbl_post.id_account = tbl_account.id')
    //                         ->where('tbl_post.id_thread', $thread)
    //                         ->order_by('tbl_post.tanggal_post', 'ASC')
    //                         ->get()->result_array();
    //     return $query;
    // }
    public function get_by_thread($thread, $sess_id){
        $query = $this->db->select("tbl_post.id, tbl_post.tanggal_post, tbl_post.isi_post, tbl_account.username, tbl_account.id as idacc, SUM(IF(tbl_vote.upvote = 1, 1, 0)) AS upvote, SUM(IF(tbl_vote.upvote = 0, 1, 0)) AS downvote, SUM(IF(tbl_vote.upvote = 1 AND tbl_vote.id_account = $sess_id, 1, 0)) AS upvoted, SUM(IF(tbl_vote.upvote = 0 AND tbl_vote.id_account = $sess_id, 1, 0)) AS downvoted", FALSE)
                            ->from('tbl_post')
                            ->join('tbl_account', 'tbl_post.id_account = tbl_account.id')
                            ->join('tbl_vote', 'tbl_vote.id_post = tbl_post.id', 'LEFT')
                            ->where('tbl_post.id_thread', $thread)
                            ->group_by('tbl_post.id')
                            ->order_by('tbl_post.tanggal_post', 'ASC')
                            ->get()->result_array();
        return $query;
    }
    public function add_post($thread, $user, $post){
        $query = $this->db->set('id_thread', $thread)
                            ->set('id_account', $user)
                            ->set('tanggal_post', 'NOW()', FALSE)
                            ->set('isi_post', $post)
                            ->insert('tbl_post');
        if($query){
            return $this->db->insert_id();
        }else{
            return -1;
        }
    }
    public function delete_post($id){
        $query = $this->db->where('id', $id)
                            ->delete('tbl_post');
        return $query;
    }
}