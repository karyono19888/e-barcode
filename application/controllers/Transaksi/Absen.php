<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Absen extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('Transaksi/M_absen','record');
    }

	function index(){
        $data['title'] = 'Transaksi | Absen';
        $this->load->view('template/v_header',$data);
		$this->load->view('template/v_sidebar');
        $this->load->view('Transaksi/v_absen', $data);
    }

    function absenajax()
    {
        if (!isset($_POST))
            show_404();

        $barcode  = $this->input->post('barcode');

        echo $this->record->do_absen($barcode);
    }

}