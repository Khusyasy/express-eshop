<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {
	public function index($id)
	{
        $data['title'] = 'Speedcubing';
        
		$data['kategori'] = $this->KategoriModel->get_kat($id)->row_array();
		$data['thread'] = $this->ThreadModel->get_all_kat($id)->result_array();
		
		$data['user'] = $this->session->userdata('user');
		$data['userinfo'] = $this->load->view('userinfo', $data, true);
		
		$this->load->view('templates/header', $data);
		$this->load->view('kategori', $data);
		$this->load->view('templates/footer');
	}
	public function delete(){
		$id_thr = $this->input->post('id_thr');
		$this->ThreadModel->delete_thread($id_thr);
		redirect($_SERVER['HTTP_REFERER']);
	}
}
