<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Myamin extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_auth', 'auth');
		$this->auth->cek_login();
		$this->load->model('Generate/M_myamin', 'record');
	}

	public function index()
	{
		$data['title'] = 'Generate | Myamin ';
		$data['data']  =  $this->record->dataLine();
		$this->load->view('template/v_header', $data);
		$this->load->view('template/v_sidebar');
		$this->load->view('generate/myamin/v_index', $data);
	}

	public function GenerateBarcode($id)
	{
		$data['title']  = 'Generate | Myamin ';
		$data['master'] =  $this->record->dataLineMaster($id);
		$data['teams']  =  $this->record->dataLineTeams($id);
		$data['data']   =  $this->record->dataLineRow($id);
		$this->load->view('template/v_header', $data);
		$this->load->view('template/v_sidebar');
		$this->load->view('generate/myamin/v_generate', $data);
	}

	public function TambahTeamsLine()
	{
		echo $this->record->TambahTeamsLine();
	}

	public function GenerateBarcodeDelete()
	{
		echo $this->record->GenerateBarcodeDelete();
	}

	public function StartGenerateBarcode()
	{
		echo $this->record->StartGenerateBarcode();
	}
}
