<?php
class M_myamin extends CI_Model
{

	public function __construct()
	{
		require 'vendor/autoload.php';
		parent::__construct();
	}

	public function t_generate_myamin()
	{
		$this->db->order_by('t_bc_kode', 'desc');
		$query  = $this->db->get('t_generate_myamin');
		return $query;
	}

	function generate($m_bc_jml)
	{


		for ($i = 1; $i <= $m_bc_jml; $i++) {
			$this->db->select('RIGHT(t_generate_myamin.t_bc_kode,5)as getBarcode', FALSE);
			$this->db->order_by('t_bc_kode', 'DESC');
			$this->db->limit(1);
			$query = $this->db->get('t_generate_myamin');  //cek dulu apakah ada sudah ada kode di tabel.
			if ($query->num_rows() > 0) {
				//cek kode jika telah tersedia
				$data = $query->row();
				$kode = intval($data->getBarcode) + 1;
			} else {
				$kode = 1;  //cek jika kode belum terdapat pada table
			}

			date_default_timezone_set('Asia/Jakarta'); # add your city to set local time zone
			$now = date('Y-m-d');
			$ref_date = strtotime($now);
			$week_of_year = date('W', $ref_date);
			$year = date('y');
			$batas = str_pad($kode, 4, "0", STR_PAD_LEFT);
			$kodetampil = "ICM-161" . $year . $week_of_year . $batas;  //format kode

			$this->db->trans_start();
			$this->db->insert('t_generate_myamin', array(
				't_bc_kode'    => $kodetampil,
				'user_id'      => $this->session->userdata('id'),
			));
			$this->db->trans_complete();
		}
		if ($this->db->trans_status() === FALSE) {
			return json_encode(array('success' => false, 'msg' => 'Barcode gagal!'));
		} else {
			return json_encode(array('success' => true, 'msg' => '' . $m_bc_jml . ' Generate Barcode berhasil!'));
		}
	}

	function t_barcode($t_bc_id)
	{
		$this->db->select('*');
		$this->db->where('t_bc_id', $t_bc_id);
		$query1  = $this->db->get('t_generate_myamin');
		$query2 = $query1->row();
		return $query2;
	}

	function getkode_bc($searchTerm = "")
	{
		$this->db->select('*');
		$this->db->where("t_bc_kode like '%" . $searchTerm . "%' ");
		$this->db->order_by('t_bc_id', 'asc');
		$fetched_records = $this->db->get('t_generate_myamin');
		$dataprov = $fetched_records->result_array();
		$data = array();
		foreach ($dataprov as $prov) {
			$data[] = array(
				"id"   => $prov['t_bc_id'],
				"text" => $prov['t_bc_kode']
			);
		}
		return $data;
	}

	function getkode_bc2($searchTerm = "")
	{
		$this->db->select('*');
		$this->db->where("t_bc_kode like '%" . $searchTerm . "%' ");
		$this->db->order_by('t_bc_id', 'desc');
		$fetched_records = $this->db->get('t_generate_myamin');
		$dataprov = $fetched_records->result_array();
		$data = array();
		foreach ($dataprov as $prov) {
			$data[] = array(
				"id"   => $prov['t_bc_id'],
				"text" => $prov['t_bc_kode']
			);
		}
		return $data;
	}

	function bc_all($start_bc, $end_bc)
	{
		$this->db->select('*');
		$this->db->where('t_bc_id  >=', $start_bc);
		$this->db->where('t_bc_id  <=', $end_bc);
		$this->db->order_by('t_bc_id', 'desc');
		return $this->db->get('t_generate_myamin')->result();
	}

	public function hitungJumlahGenerate()
	{
		$query = $this->db->get('t_generate_myamin');
		if ($query->num_rows() > 0) {
			return $query->num_rows();
		} else {
			return 0;
		}
	}
}
