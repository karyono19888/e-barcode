<?php
class M_label extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$query  = $this->db->get('m_label');
		return $query;
	}

	function view($myid)
	{
		$this->db->select('*');
		$this->db->where('m_label_id', $myid);
		$query  = $this->db->get('m_label');
		if ($query) {
			$row = $query->row();
			return json_encode(array(
				'success'         => true,
				'm_label_id'      => $row->m_label_id,
				'm_label_kode'   	=> $row->m_label_kode,
			));
		} else {
			return json_encode(array('success' => false, 'msg' => 'Data tidak ditemukan!'));
		}
	}

	function generate_label()
	{
		$this->db->order_by('t_bc_kode', 'desc');
		$query  = $this->db->get('t_generate_label');
		return $query;
	}

	function t_barcode($t_bc_id)
	{
		$this->db->select('*');
		$this->db->where('t_bc_id', $t_bc_id);
		$this->db->join('m_label', 'm_label_id=t_bc_master', 'left');
		$query1  = $this->db->get('t_generate_label');
		$query2 = $query1->row();
		return $query2;
	}

	function getkode_bc($searchTerm = "")
	{
		$this->db->select('*');
		$this->db->where("t_bc_kode like '%" . $searchTerm . "%' ");
		$this->db->order_by('t_bc_id', 'asc');
		$fetched_records = $this->db->get('t_generate_label');
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
		$fetched_records = $this->db->get('t_generate_label');
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
		$this->db->join('m_label', 'm_label_id=t_bc_master', 'left');
		return $this->db->get('t_generate_label')->result();
	}

	function generate($m_bc_jml, $m_label_id)
	{
		date_default_timezone_set('Asia/Jakarta'); # add your city to set local time zone
		$now = date('Y-m-d');
		$ref_date = strtotime($now);
		$week_of_year = date('W', $ref_date);

		$this->load->library('ciqrcode');
		$config['cacheable']    = true;
		$config['cachedir']     = './assets/';
		$config['errorlog']     = './assets/';
		$config['imagedir']     = './assets/label/'; //direktori penyimpanan qr code
		$config['quality']      = true;
		$config['size']         = '1024'; //interger, the default is 1024
		$config['black']        = array(224, 255, 255);
		$config['white']        = array(70, 130, 180);
		$this->ciqrcode->initialize($config);

		for ($i = 1; $i <= $m_bc_jml; $i++) {
			$this->db->select('RIGHT(t_generate_label.t_bc_kode,5)as getBarcode', FALSE);
			$this->db->order_by('t_bc_kode', 'DESC');
			$this->db->limit(1);
			$query = $this->db->get('t_generate_label');  //cek dulu apakah ada sudah ada kode di tabel.
			if ($query->num_rows() > 0) {
				//cek kode jika telah tersedia
				$data = $query->row();
				$kode = intval($data->getBarcode) + 1;
			} else {
				$kode = 1;  //cek jika kode belum terdapat pada table
			}

			$thn = date('ym');
			$batas = str_pad($kode, 6, "0", STR_PAD_LEFT);
			$kodetampil = $thn . $week_of_year . $batas;  //format kode

			$produk_Qrcode = $kodetampil . '.png'; //buat name dari qr code sesuai dengan nip
			$params['data'] = $kodetampil; //data yang akan di jadikan QR CODE
			$params['level'] = 'H'; //H=High
			$params['size'] = 10;
			$params['savename'] = FCPATH . $config['imagedir'] . $produk_Qrcode; //simpan image QR CODE ke folder assets/qr-code/
			$this->ciqrcode->generate($params);
			$this->db->trans_start();
			$this->db->insert('t_generate_label', array(
				't_bc_img'     => $produk_Qrcode,
				't_bc_master'  => $m_label_id,
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
}
