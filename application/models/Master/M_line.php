<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_line extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('security');
	}

	public function DataTable()
	{
		$this->db->order_by('m_line_id', 'desc');
		return $this->db->get('m_line');
	}

	public function TotalLine()
	{
		$query = $this->db->get('m_line');
		return $query->num_rows();
	}

	public function Aktif()
	{
		$this->db->where('m_line_status', 'Aktif');
		$query = $this->db->get('m_line');
		return $query->num_rows();
	}

	public function TidakAktif()
	{
		$this->db->where('m_line_status', 'Tidak Aktif');
		$query = $this->db->get('m_line');
		return $query->num_rows();
	}

	public function Tambah()
	{
		$this->db->trans_start();
		$this->db->insert('m_line', array(
			'm_line_kode'  	=> strtoupper($this->input->post('m_line_kode')),
			'm_line_nama'  	=> strtoupper($this->input->post('m_line_nama')),
			'm_line_status'  	=> $this->input->post('m_line_status'),
			'm_line_warna'  	=> $this->input->post('m_line_warna'),
			'm_line_user'     => $this->session->userdata('id'),
			'created_at' 		=> time()
		));
		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE) {
			return json_encode(array('success' => false, 'msg' => 'Tambah Gagal!'));
		} else {
			return json_encode(array('success' => true, 'msg' => 'Tambah Berhasil!'));
		}
	}

	public function DataTablePreview($id)
	{
		$this->db->where('m_line_id', $id);
		$this->db->order_by('m_line_id', 'desc');
		return $this->db->get('m_line')->row_array();
	}

	public function SimpanEdit()
	{
		$this->db->trans_start();
		$this->db->where('m_line_id', $this->input->post('m_line_id'));
		$this->db->update('m_line', array(
			'm_line_kode'  	=> strtoupper($this->input->post('m_line_kode')),
			'm_line_nama'  	=> strtoupper($this->input->post('m_line_nama')),
			'm_line_status'  	=> $this->input->post('m_line_status'),
			'm_line_warna'  	=> $this->input->post('m_line_warna'),
			'm_line_user'     => $this->session->userdata('id'),
			'created_at' 		=> time()
		));
		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE) {
			return json_encode(array('success' => false, 'msg' => 'Edit Gagal!'));
		} else {
			return json_encode(array('success' => true, 'msg' => 'Edit Berhasil!'));
		}
	}

	public function Delete($id)
	{
		$this->db->trans_start();
		$this->db->delete('m_line', array('m_line_id' => $id));
		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE) {
			return json_encode(array('success' => false, 'msg' => 'Hapus Data Gagal!'));
		} else {
			return json_encode(array('success' => true, 'msg' => 'Hapus Data Berhasil!'));
		}
	}
}
