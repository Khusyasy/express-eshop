<?php

class AccountModel extends CI_Model{
    public function get_login($user, $pass){
        $check = $this->db->select('id')
                            ->from('tbl_account')
                            ->where('username', $user)
                            ->where('password', $pass)
                            ->get()
                            ->row_array()['id'];
        return $check;
    }
    public function get_account($id){
        $query = $this->db->select('id, username, email, name, level')
                            ->from('tbl_account')
                            ->where('id', $id)
                            ->get()
                            ->row_array();
        return $query;
    }
    public function add_account($user, $pass, $name, $email){
        $query = $this->db->set('username', $user)
                            ->set('password', $pass)
                            ->set('name', $name)
                            ->set('email', $email)
                            ->set('level', 'user')
                            ->insert('tbl_account');
        return $query;
    }
}