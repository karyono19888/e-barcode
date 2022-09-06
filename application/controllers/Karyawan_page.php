<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Karyawan_page extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('M_auth');
		$this->M_auth->cek_login();
		$this->load->model('Pages/M_karyawan','record');
    }

	public function index()
	{
		$this->load->view('pages/v_header');
		$this->load->view('pages/v_karyawan');
		$this->load->view('pages/v_footer');
	}

	public function Identitas()
	{
		$this->load->view('pages/v_header');
		$this->load->view('pages/v_identitas');
		$this->load->view('pages/v_footer');
	}

}