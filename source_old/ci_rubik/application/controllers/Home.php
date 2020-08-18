<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function index()
	{
		$data['title'] = 'Speedcubing';
		// $data['user'] = array('nama' => 'khusyasy', 'level' => 'admin');
		$data['kategori'] = $this->KategoriModel->get_data();
		$data['latest'] = $this->PostModel->get_latest();
		
		$data['user'] = $this->session->userdata('user');
		$data['userinfo'] = $this->load->view('userinfo', $data, true);
			
		$this->load->view('templates/header', $data);
		$this->load->view('home', $data);
		$this->load->view('templates/footer');
	}
	public function profile($id){
		$data['title'] = 'Speedcubing';
		$data['profile'] = $this->AccountModel->get_account($id);
		$data['user'] = $this->session->userdata('user');

		$this->load->view('templates/header', $data);
		if($data['user']['id'] == $id){
			$this->load->view('profile_owner', $data);
		}else{
			$this->load->view('profile', $data);
		}
		$this->load->view('templates/footer');
	}
}
