<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('M_auth');
	}

	public function index()
	{
		if ($this->session->userdata('username')) {
			redirect('Profile');
		};
		$this->load->view('v_login');
	}

	public function proses()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		if($this->M_auth->login_user($username,$password))
		{
			$this->session->set_flashdata('success','Login Berhasil...');
			if($this->session->userdata('level')== 18){
				redirect('Karyawan_page');
			}else{
				redirect('home');
			}
		}
		else
		{
			$this->session->set_flashdata('error','Username & Password Salah!');
			redirect('login');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('id');
		$this->session->unset_userdata('nama');
		$this->session->unset_userdata('level');
		$this->session->unset_userdata('is_login');
		$this->session->set_flashdata(
			'message',
			'<div class="alert alert-success alert-dismissible">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<i class="icon fas fa-check"></i> Success! Anda berhasil logout.
		 </div>'
		);
		redirect('login');
	}

	public function reset(){
		$this->load->view('v_resetpas');
	}
	public function absen_scan(){
		$this->load->view('v_absen');
	}


}