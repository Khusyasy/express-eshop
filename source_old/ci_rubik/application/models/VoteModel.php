<?php

class VoteModel extends CI_Model{
    public function upvote($pid, $uid){
        $check = $this->db->select('*')
                            ->from('tbl_vote')
                            ->where('id_post', $pid)
                            ->where('id_account', $uid)
                            ->get()->row_array()['id'];
        if(!isset($check)){
            $check = false;
        }
        if($check){
            $query = $this->db->set('id_post', $pid)
                                ->set('id_account', $uid)
                                ->set('tanggal_vote', 'NOW()', FALSE)
                                ->set('upvote', 1)
                                ->where('id', $check)
                                ->update('tbl_vote');
        }else{
            $query = $this->db->set('id_post', $pid)
                                ->set('id_account', $uid)
                                ->set('tanggal_vote', 'NOW()', FALSE)
                                ->set('upvote', 1)
                                ->insert('tbl_vote');
        }
        return $query;
    }
    public function downvote($pid, $uid){
        $check = $this->db->select('*')
                            ->from('tbl_vote')
                            ->where('id_post', $pid)
                            ->where('id_account', $uid)
                            ->get()->row_array()['id'];
        if(!isset($check)){
            $check = false;
        }
        if($check){
            $query = $this->db->set('id_post', $pid)
                                ->set('id_account', $uid)
                                ->set('tanggal_vote', 'NOW()', FALSE)
                                ->set('upvote', 0)
                                ->where('id', $check)
                                ->update('tbl_vote');
        }else{
            $query = $this->db->set('id_post', $pid)
                                ->set('id_account', $uid)
                                ->set('tanggal_vote', 'NOW()', FALSE)
                                ->set('upvote', 0)
                                ->insert('tbl_vote');
        }
        return $query;
    }
}