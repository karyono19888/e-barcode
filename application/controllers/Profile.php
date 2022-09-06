<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_auth', 'auth');
		$this->auth->cek_login();
		$this->load->model('M_profile', 'record');
	}

	public function index()
	{
		$data['title'] = 'Profile | E-Barcode';
		$this->load->view('template/v_header', $data);
		$this->load->view('template/v_sidebar');
		$this->load->view('v_profile');
	}
}
