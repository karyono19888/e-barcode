<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Karyawan extends REST_Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	function index_get()
	{
		$kontak = $this->db->get('m_karyawan')->result();
		$id = $this->get('id');
		if ($id == '') {
			if ($kontak) {
				$this->response($kontak, 200);
			} else {
				// Set the response and exit
				$this->response([
					'status' => false,
					'message' => 'No karyawan were found'
				], 404);
			}
		} else {
			$this->db->where('m_karyawan_id', $id);
			$kontak = $this->db->get('m_karyawan')->result();
			if ($kontak) {
				$this->response($kontak, 200);
			} else {
				// Set the response and exit
				$this->response([
					'status' => false,
					'message' => 'No such karyawan found'
				], 404);
			}
		}
	}
}
