<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Repair extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_auth');
		$this->M_auth->cek_login();
		$this->load->model('Produksi/M_repair', 'record');
	}

	public function index()
	{
		$data['title']   = 'HRMS 1.0 | Repair Barcode';
		$data['total_bc'] = $this->record->hitungJumlahGenerate();
		$data['generate'] = $this->record->t_generate_repair();
		$this->load->view('template/v_header', $data);
		$this->load->view('template/v_sidebar');
		$this->load->view('produksi/v_bc_repair', $data);
		$this->load->view('template/v_bottom');
	}

	function generate()
	{
		if (!isset($_POST))
			show_404();

		$m_bc_jml     = addslashes($_POST['m_bc_jml']);

		echo $this->record->generate($m_bc_jml);
	}

	public function getkode_bc()
	{
		$searchTerm = $this->input->post('searchTerm');
		$response   = $this->record->getkode_bc($searchTerm);
		echo json_encode($response);
	}

	public function getkode_bc2()
	{
		$searchTerm = $this->input->post('searchTerm');
		$response   = $this->record->getkode_bc2($searchTerm);
		echo json_encode($response);
	}

	function mpdf($t_bc_id)
	{
		$data = $this->record->t_barcode($t_bc_id);
		$html = $this->load->view('produksi/v_repair_single_pdf', ['bc' => $data], true);

		$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => [220, 68]]);
		$mpdf->WriteHTML($html);
		$mpdf->Output();
	}

	public function bc_all()
	{
		$start_bc   = $this->input->get('start_bc');
		$end_bc  	= $this->input->get('end_bc');

		$get_all 	= $this->record->bc_all($start_bc, $end_bc);
		$html = $this->load->view(
			'produksi/v_bc_all_repair',
			[
				'bc' 	=> $get_all
			],
			true
		);

		$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => [200, 68]]);
		$mpdf->WriteHTML($html);
		$mpdf->Output();
	}
}
