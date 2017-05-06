<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
	
	private $template = 'default';
	
	public function index(){
		$this->load->model('User');
		$users = $this->User->getAll();
		
		$this->load->view($this->template,array(
			'content' => 'index',
			'users' => $users
		));
	}
	
	public function insert(){
		if ($_POST){
			$this->load->model("User");
			
			$data = new stdClass();
			$data->name = $this->input->post("name");
			$data->gender = $this->input->post("gender");
			$data->phone = $this->input->post("phone");
			$data->email = $this->input->post("email");
			
			try{
				$this->User->insert($data);
				$this->session->set_flashdata('success_msg', "Contato cadastrado com sucesso");
			} catch (Exception $e){
				$this->session->set_flashdata('error_msg', $e->getMessage());
			}
			redirect('users/users');exit;
		}
		$this->load->view($this->template,array(
			'content' => 'insert'
		));
	}
	
	public function edit($id=null){
		if (!$id){
			$this->session->set_flashdata('error_msg', "Contato inválido");
			redirect('users/users');exit;
		}
		
		$user = null;
		$this->load->model("User");
		try{
			$user = $this->User->getById($id);
		} catch (Exception $e){
			$this->session->set_flashdata('error_msg', $e->getMessage());
			redirect('users/users');exit;
		}
		
		if (!$user){
			$this->session->set_flashdata('error_msg', "Contato inválido");
			redirect('users/users');exit;
		}
		
		if ($_POST){
			$data = new stdClass();
			$data->id = $id;
			$data->name = $this->input->post("name");
			$data->gender = $this->input->post("gender");
			$data->phone = $this->input->post("phone");
			$data->email = $this->input->post("email");
			
			try{
				$this->User->update($data);
				$this->session->set_flashdata('success_msg', "Contato alterado com sucesso");
			} catch (Exception $e){
				$this->session->set_flashdata('error_msg', $e->getMessage());
			}
			redirect('users/users');exit;
		}
		
		$this->load->view($this->template,array(
			'content' => 'edit',
			'user' => $user
		));
	}
	
	public function remove($id=null){
		if (!$id){
			$this->session->set_flashdata('error_msg', "Contato inválido");
			redirect('users/users');exit;
		}
		
		$user = null;
		$this->load->model("User");
		try{
			$user = $this->User->getById($id);
		} catch (Exception $e){
			$this->session->set_flashdata('error_msg', $e->getMessage());
			redirect('users/users');exit;
		}
		
		if (!$user){
			$this->session->set_flashdata('error_msg', "Contato inválido");
			redirect('users/users');exit;
		}
		
		try{
			$this->User->remove($id);
			$this->session->set_flashdata('success_msg', "Contato excluído com sucesso");
		} catch(Exception $e){
			$this->session->set_flashdata('error_msg', $e->getMessage());
		}
		redirect('users/users');exit;
	}
}
