<?php
class M_repair extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
	}

	public function t_generate_repair()
	{
		$this->db->order_by('t_bc_kode', 'desc');
		$query  = $this->db->get('t_barcode_repair');
		return $query;
	}

	function generate($m_bc_jml)
	{
		date_default_timezone_set('Asia/Jakarta'); # add your city to set local time zone
		$now = date('Y-m-d');
		$ref_date = strtotime($now);
		$week_of_year = date('W', $ref_date);

 		$this->db->select('t_bc_kode');
       		$this->db->where('t_bc_kode', $m_bc_jml);
        	$query  = $this->db->get('t_barcode_repair');
        	$row = $query->num_rows();
        	if($row > 0){
            		return json_encode(array('success'=>false, 'msg'=>'Input data gagal, Nomer barcode Sudah ada!'));
        	}else{

		$this->load->library('ciqrcode');
		$config['cacheable']    = true;
		$config['cachedir']     = './assets/';
		$config['errorlog']     = './assets/';
		$config['imagedir']     = './assets/repair/'; //direktori penyimpanan qr code
		$config['quality']      = true;
		$config['size']         = '1024'; //interger, the default is 1024
		$config['black']        = array(224, 255, 255);
		$config['white']        = array(70, 130, 180);
		$this->ciqrcode->initialize($config);

		$this->db->select('RIGHT(t_barcode_repair.t_bc_kode,5)as getBarcode', FALSE);
		$this->db->order_by('t_bc_kode', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get('t_barcode_repair');  //cek dulu apakah ada sudah ada kode di tabel.
		if ($query->num_rows() > 0) {
			//cek kode jika telah tersedia
			$data = $query->row();
			$kode = intval($data->getBarcode) + 1;
		} else {
			$kode = 1;  //cek jika kode belum terdapat pada table
		}

		$tgl = date('y');
		$batas = str_pad($kode, 6, "0", STR_PAD_LEFT);
		$kodetampil = $m_bc_jml;

		$produk_Qrcode = $kodetampil . '.png'; //buat name dari qr code sesuai dengan nip
		$params['data'] = $kodetampil; //data yang akan di jadikan QR CODE
		$params['level'] = 'H'; //H=High
		$params['size'] = 10;
		$params['savename'] = FCPATH . $config['imagedir'] . $produk_Qrcode; //simpan image QR CODE ke folder assets/qr-code/
		$this->ciqrcode->generate($params);
		$this->db->trans_start();
		$this->db->insert('t_barcode_repair', array(
			't_bc_img'     => $produk_Qrcode,
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
		$query1  = $this->db->get('t_barcode_repair');
		$query2 = $query1->row();
		return $query2;
	}

	function getkode_bc($searchTerm = "")
	{
		$this->db->select('*');
		$this->db->where("t_bc_kode like '%" . $searchTerm . "%' ");
		$this->db->order_by('t_bc_id', 'asc');
		$fetched_records = $this->db->get('t_barcode_repair');
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
		$fetched_records = $this->db->get('t_barcode_repair');
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
		return $this->db->get('t_barcode_repair')->result();
	}

	public function hitungJumlahGenerate()
	{
		$query = $this->db->get('t_barcode_repair');
		if ($query->num_rows() > 0) {
			return $query->num_rows();
		} else {
			return 0;
		}
	}
}
