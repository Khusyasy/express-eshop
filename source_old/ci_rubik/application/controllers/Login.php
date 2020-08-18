<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function index()
	{
        if($this->session->has_userdata('user')){
            redirect(base_url().'home');
        }
        $data['title'] = 'Speedcubing';
        
		$this->load->view('templates/header', $data);
		$this->load->view('login', $data);
		$this->load->view('templates/footer');
    }
    public function process(){
        $user = htmlspecialchars(addslashes($this->input->post('username')));
        $pass = md5($this->input->post('password'));
        
        $id = $this->AccountModel->get_login($user, $pass);
        if($id > 0){
            $user = array('user' => $this->AccountModel->get_account($id));
            $this->session->set_userdata($user);
            redirect(base_url().'home');
        }else{
            redirect(base_url().'login');
        }
    }
}
