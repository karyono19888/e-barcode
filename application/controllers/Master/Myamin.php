<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Myamin extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_auth', 'auth');
		$this->auth->cek_login();
		$this->load->model('Master/M_myamin', 'record');
	}

	public function index()
	{
		$data['title'] 		= 'Master | Karyawan ';
		$data['TotalProduk'] =  $this->record->TotalProduk();
		$data['Aktif'] 		=  $this->record->Aktif();
		$data['TidakAktif'] 	=  $this->record->TidakAktif();
		$this->load->view('template/v_header', $data);
		$this->load->view('template/v_sidebar');
		$this->load->view('Myamin/v_myamin', $data);
	}

	public function ShowTableData()
	{
		$data['data'] =  $this->record->DataTable();
		$this->load->view('Myamin/v_table', $data);
	}

	public function ShowTambahData()
	{
		$this->load->view('Myamin/v_tambah');
	}

	public function ShowEditData()
	{
		$id = $this->input->post('id');
		$data['data'] 	= $this->record->DataTablePreview($id);
		$this->load->view('Myamin/v_edit', $data);
	}

	public function Tambah()
	{
		echo $this->record->Tambah();
	}

	public function SimpanEdit()
	{
		echo $this->record->SimpanEdit();
	}

	public function ShowDataPreview()
	{
		$id = $this->input->post('id');
		$data['data'] 	= $this->record->DataTablePreview($id);
		$this->load->view('Myamin/v_preview', $data);
	}

	public function Delete()
	{
		$id 	= $this->input->post('id');
		echo $this->record->Delete($id);
	}
}
