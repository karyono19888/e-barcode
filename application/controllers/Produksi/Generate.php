<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Generate extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_auth');
		$this->M_auth->cek_login();
		$this->load->model('Produksi/M_produksi', 'record');
		// require_once APPPATH . 'vendor\mike42\autoloader.php';
	}

	public function index()
	{
		$data['title']   = 'HRMS 1.0 | Generate';
		$data['generate'] = $this->record->t_generate();
		$this->load->view('template/v_header', $data);
		$this->load->view('template/v_sidebar');
		$this->load->view('produksi/v_generate', $data);
		$this->load->view('template/v_footer');
		$this->load->view('template/v_bottom');
	}

	public function print_single()
	{
		if (!isset($_POST))
			show_404();

		$data        = addslashes($_POST['data']);
		echo $this->record->print_single($data);
	}

	public function barcode_pdf($t_bc_id)
	{
		$data['bc'] = $this->record->t_barcode($t_bc_id);

		$this->load->library('pdf');
		$this->pdf->set_option('isRemoteEnabled', false);
		$this->pdf->setPaper('A4', 'potrait');
		$this->pdf->filename = "Barcode.pdf";
		$this->pdf->load_view('produksi/v_single_bc_pdf', $data);
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

	public function bc_all()
	{
		$start_bc   = $this->input->get('start_bc');
		$end_bc  	= $this->input->get('end_bc');

		$get_all 	= $this->record->bc_all($start_bc, $end_bc);
		$html = $this->load->view(
			'produksi/v_bc_select',
			[
				'bc' 	=> $get_all
			],
			true
		);

		$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => [200, 68]]);
		$mpdf->WriteHTML($html);
		$mpdf->Output();
	}

	// public function bc_all()
	// {
	// 	$start_bc   = $this->input->get('start_bc');
	// 	$end_bc  	= $this->input->get('end_bc');

	// 	$get_all 	= $this->record->bc_all($start_bc, $end_bc);
	// 	$html = $this->load->view(
	// 		'produksi/v_bc_select',
	// 		[
	// 			'bc' 	=> $get_all
	// 		],
	// 		true
	// 	);

	// 	$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => [200, 115]]);
	// 	$mpdf->WriteHTML($html);
	// 	$mpdf->Output();
	// }

	// function mpdf($t_bc_id)
	// {
	// 	$data = $this->record->t_barcode($t_bc_id);
	// 	$html = $this->load->view('produksi/v_bc_pdf', ['bc' => $data], true);

	// 	$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => [200, 115]]);
	// 	$mpdf->WriteHTML($html);
	// 	$mpdf->Output();
	// }

	function mpdf($t_bc_id)
	{
		$data = $this->record->t_barcode($t_bc_id);
		$html = $this->load->view('produksi/v_bc_pdf', ['bc' => $data], true);

		$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => [200, 68]]);
		$mpdf->WriteHTML($html);
		$mpdf->Output();
	}
}
