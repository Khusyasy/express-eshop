<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Thread extends CI_Controller {
	public function index($id)
	{
        $data['title'] = 'Speedcubing';
		$data['user'] = $this->session->userdata('user');
		$data['thread'] = $this->ThreadModel->get_thread($id);
		if(isset($data['user'])){
			$data['posts'] = $this->PostModel->get_by_thread($id, $data['user']['id']);
		}else{
			$data['posts'] = $this->PostModel->get_by_thread($id, -1);
		}
		$data['userinfo'] = $this->load->view('userinfo', $data, true);
        
		$this->load->view('templates/header', $data);
		$this->load->view('thread', $data);
		$this->load->view('templates/footer');
	}
	public function form_add_thread()
	{
        $data['title'] = 'Speedcubing';
		$data['user'] = $this->session->userdata('user');
        $data['kategori'] = $this->KategoriModel->get_data();
		$data['userinfo'] = $this->load->view('userinfo', $data, true);

		$this->load->view('templates/header', $data);
		$this->load->view('form_add_thread', $data);
		$this->load->view('templates/footer');
	}
	public function add_thread(){
        $id_kat = $this->input->post('kategori');
		$thr = htmlspecialchars(addslashes($this->input->post('thr')));
		$isi = htmlspecialchars(addslashes($this->input->post('isi')));
		$id_acc = $this->session->userdata('user')['id'];
		
		$id_thr = $this->ThreadModel->add_thread($id_kat, $id_acc, $thr);
        if($id_thr){
			$id_post = $this->PostModel->add_post($id_thr, $id_acc, $isi);
			if($id_post){
            	redirect(base_url().'thread/index/'.$id_thr);
			}else{
            	redirect(base_url().'thread/form_add_post');
			}
        }else{
            redirect(base_url().'thread/form_add_post');
        }
	}
	public function add_post(){
        $id_thr = $this->input->post('id_thr');
        $isi = htmlspecialchars(addslashes($this->input->post('isi')));
		$id_acc = $this->session->userdata('user')['id'];
		
		$id_post = $this->PostModel->add_post($id_thr, $id_acc, $isi);
        if($id_post){
            redirect(base_url().'thread/index/'.$id_thr);
        }else{
            redirect(base_url().'thread/index/'.$id_thr);
        }
	}
	public function upvote($id){
		$uid = $this->session->userdata('user')['id'];
		if(isset($uid)){
			$this->VoteModel->upvote($id, $uid);
		}
		redirect($_SERVER['HTTP_REFERER']);
	}
	public function downvote($id){
		$uid = $this->session->userdata('user')['id'];
		if(isset($uid)){
			$this->VoteModel->downvote($id, $uid);
		}
		redirect($_SERVER['HTTP_REFERER']);
	}
	public function delete(){
		$id_thr = $this->input->post('id_thr');
		$pid = $this->input->post('pid');

		$this->PostModel->delete_post($pid);
		if($this->ThreadModel->check_rows($id_thr) < 1){
			$this->ThreadModel->delete_thread($id_thr);
			redirect(base_url());
		}else{
			redirect($_SERVER['HTTP_REFERER']);
		}
	}
}
