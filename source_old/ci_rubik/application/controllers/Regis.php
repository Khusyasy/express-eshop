<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Regis extends CI_Controller {
	public function index()
	{
        if($this->session->has_userdata('user')){
            redirect(base_url().'home');
        }
        $data['title'] = 'Speedcubing';
        
		$this->load->view('templates/header', $data);
		$this->load->view('regis', $data);
		$this->load->view('templates/footer');
    }
    public function process(){
        $user = htmlspecialchars(addslashes($this->input->post('username')));
        $pass = md5($this->input->post('password'));
        $name = htmlspecialchars(addslashes($this->input->post('name')));
        $email = addslashes($this->input->post('email'));
        
        if($this->AccountModel->add_account($user, $pass, $name, $email)){
            redirect(base_url().'login');
        }else{
            redirect(base_url().'regis');
        }
    }
}
