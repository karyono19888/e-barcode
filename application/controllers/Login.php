<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('M_auth', 'record');
	}

	public function index()
	{
		if ($this->session->userdata('username')) {
			redirect('Profile');
		};
		$this->load->view('v_login');
	}

	// public function proses()
	// {
	// 	$username = $this->input->post('username');
	// 	$password = $this->input->post('password');
	// 	if($this->M_auth->login_user($username,$password))
	// 	{
	// 		$this->session->set_flashdata('success','Login Berhasil...');
	// 		if($this->session->userdata('level')== 18){
	// 			redirect('Karyawan_page');
	// 		}else{
	// 			redirect('Dashboard');
	// 		}
	// 	}
	// 	else
	// 	{
	// 		$this->session->set_flashdata('error','Username & Password Salah!');
	// 		redirect('Login');
	// 	}
	// }

	public function Proses()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		echo $this->record->Login($username, $password);
	}

	public function logout()
	{
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('id');
		$this->session->unset_userdata('nama');
		$this->session->unset_userdata('level');
		$this->session->unset_userdata('is_login');
		$this->session->set_flashdata('success', 'Logout Berhasil..');
		redirect('Login');
	}

	public function reset(){
		$this->load->view('v_resetpas');
	}


}