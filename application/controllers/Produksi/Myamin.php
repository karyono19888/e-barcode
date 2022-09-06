<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Myamin extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_auth');
		$this->M_auth->cek_login();
		$this->load->model('Produksi/M_myamin', 'record');
		// require_once APPPATH . 'vendor\mike42\autoloader.php';
	}

	public function index()
	{
		$data['title']   = 'HRMS 1.0 | Myamin Generate';
		$data['myamin'] = $this->record->t_gen_barcode();
		$this->load->view('template/v_header', $data);
		$this->load->view('template/v_sidebar');
		$this->load->view('produksi/v_myamin', $data);
		$this->load->view('template/v_footer');
		$this->load->view('template/v_bottom');
	}

	public function print_barcode()
	{

		$data['title']   = 'HRMS 1.0 | Myamin Generate';
		$data['generate'] = $this->record->t_gen_print();
		$this->load->view('template/v_header', $data);
		$this->load->view('template/v_sidebar');
		$this->load->view('produksi/v_print_myamin', $data);
		$this->load->view('template/v_footer');
		$this->load->view('template/v_bottom');
	}

	function view()
	{
		if (!isset($_POST))
			show_404();

		$myid        = addslashes($_POST['myid']);
		echo $this->record->lihat_generate($myid);
	}

	function generate()
	{
		if (!isset($_POST))
			show_404();

		$myamin_id      = addslashes($_POST['myamin_id']);
		$myamin_nama    = addslashes($_POST['myamin_nama']);
		$myamin_url     = addslashes($_POST['myamin_url']);
		$m_bc_jml       = addslashes($_POST['m_bc_jml']);

		echo $this->record->generate_myamin($myamin_id, $myamin_nama, $myamin_url, $m_bc_jml);
	}

	function mpdf_myamin($t_bc_id)
	{
		$data = $this->record->t_barcode($t_bc_id);
		$html = $this->load->view('produksi/v_myamin_bc_pdf', ['bc' => $data], true);

		$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => [200, 100]]);
		$mpdf->WriteHTML($html);
		$mpdf->Output();
	}
}
