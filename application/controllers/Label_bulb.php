<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Label_bulb extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_auth');
		$this->M_auth->cek_login();
		$this->load->model('Produksi/M_label', 'record');
	}

	public function index()
	{
		$data['title']   	= 'HRMS 1.0 | Label';
		$data['label'] 		= $this->record->index();
		$data['generate'] = $this->record->generate_label();
		$this->load->view('template/v_header', $data);
		$this->load->view('template/v_sidebar');
		$this->load->view('label/v_label', $data);
		$this->load->view('template/v_footer');
		$this->load->view('template/v_bottom');
	}

	function view()
	{
		if (!isset($_POST))
			show_404();

		$myid        = addslashes($_POST['myid']);
		echo $this->record->view($myid);
	}

	function generate()
	{
		if (!isset($_POST))
			show_404();

		$m_bc_jml     = addslashes($_POST['m_bc_jml']);
		$m_label_id   = addslashes($_POST['m_label_id']);

		echo $this->record->generate($m_bc_jml, $m_label_id);
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
		$html = $this->load->view('label/v_bc_pdf', ['bc' => $data], true);

		$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => [120, 60]]);
		$mpdf->WriteHTML($html);
		$mpdf->Output();
	}

	public function bc_all()
	{
		$start_bc   = $this->input->get('start_bc');
		$end_bc  	  = $this->input->get('end_bc');

		$get_all 	= $this->record->bc_all($start_bc, $end_bc);
		$html = $this->load->view(
			'label/v_bc_select',
			[
				'bc' 	=> $get_all
			],
			true
		);

		$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => [120, 60]]);
		$mpdf->WriteHTML($html);
		$mpdf->Output();
	}
}
