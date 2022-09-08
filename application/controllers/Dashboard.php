<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	public function __construct() {
        parent::__construct();
        $this->load->model('M_auth');
		$this->M_auth->cek_login();
		$this->load->model('M_main', 'record');
    }

	public function index()
	{
		$data['title'] = 'Dashboard | E-Barcode';
		$data['total_bc'] = $this->record->hitungJumlahGenerate();
		$this->load->view('template/v_header',$data);
		$this->load->view('template/v_sidebar');
		$this->load->view('v_main');
		$this->load->view('template/v_footer');
		$this->load->view('template/v_bottom');
	}



	public function test(){
		$this->load->view('v_test');
	}

}