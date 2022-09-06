<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Barcode extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_auth');
		$this->M_auth->cek_login();
		$this->load->model('Produksi/M_produksi', 'record');
	}

	public function index()
	{
		$data['title']   = 'HRMS 1.0 | Barcode';
		$data['barcode'] = $this->record->index();
		$this->load->view('template/v_header', $data);
		$this->load->view('template/v_sidebar');
		$this->load->view('produksi/v_barcode', $data);
		$this->load->view('template/v_footer');
		$this->load->view('template/v_bottom');
	}

	public function profile()
	{
		$data['title'] = 'HRMS 1.0 | Profile';
		$this->load->view('template/v_header', $data);
		$this->load->view('template/v_sidebar');
		$this->load->view('v_profile');
	}

	function view()
	{
		if (!isset($_POST))
			show_404();

		$myid        = addslashes($_POST['myid']);
		echo $this->record->view($myid);
	}

	function update()
	{
		if (!isset($_POST))
			show_404();

		$m_bc_id      = addslashes($_POST['m_bc_id']);
		$m_bc_nama    = addslashes($_POST['m_bc_nama']);
		$m_bc_kode    = addslashes($_POST['m_bc_kode']);
		// $m_bc_jml     = addslashes($_POST['m_bc_jml']);

		echo $this->record->update($m_bc_id, $m_bc_nama, $m_bc_kode);
	}

	function create()
	{
		if (!isset($_POST))
			show_404();

		$m_bc_nama    = addslashes($_POST['m_bc_nama']);
		$m_bc_kode    = addslashes($_POST['m_bc_kode']);
		// $m_bc_jml     = addslashes($_POST['m_bc_jml']);

		echo $this->record->create($m_bc_nama, $m_bc_kode);
	}

	function delete()
	{
		if (!isset($_POST))
		show_404();

		$m_bc_id  = addslashes($_POST['m_bc_id']);
		echo $this->record->delete($m_bc_id);
	}

	function generate()
	{
		if (!isset($_POST))
		show_404();

		$m_bc_id      = addslashes($_POST['m_bc_id']);
		$m_bc_kode    = addslashes($_POST['m_bc_kode']);
		$m_bc_jml     = addslashes($_POST['m_bc_jml']);

		echo $this->record->generate($m_bc_id, $m_bc_kode, $m_bc_jml);
	}
}
