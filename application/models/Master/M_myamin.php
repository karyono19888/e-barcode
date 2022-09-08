<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_myamin extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('security');
	}

	public function TotalProduk()
	{
		$query = $this->db->get('m_myamin');
		return $query->num_rows();
	}

	public function Aktif()
	{
		$this->db->where('m_myamin_status', 'Aktif');
		$query = $this->db->get('m_myamin');
		return $query->num_rows();
	}

	public function TidakAktif()
	{
		$this->db->where('m_myamin_status', 'Tidak Aktif');
		$query = $this->db->get('m_myamin');
		return $query->num_rows();
	}

	public function DataTable()
	{
		$this->db->order_by('m_myamin_id', 'desc');
		return $this->db->get('m_myamin');
	}

	public function Tambah()
	{
		$this->db->trans_start();
		$this->db->insert('m_myamin', array(
			'm_myamin_tipe'  			=> $this->input->post('m_myamin_tipe'),
			'm_myamin_kode'  			=> $this->input->post('m_myamin_kode'),
			'm_myamin_jenis'  		=> strtoupper($this->input->post('m_myamin_jenis')),
			'm_myamin_tegangan'   	=> $this->input->post('m_myamin_tegangan'),
			'm_myamin_daya'       	=> $this->input->post('m_myamin_daya'),
			'm_myamin_frekuensi'    => $this->input->post('m_myamin_frekuensi'),
			'm_myamin_dimensi'      => $this->input->post('m_myamin_dimensi'),
			'm_myamin_berat'       	=> $this->input->post('m_myamin_berat'),
			'm_myamin_status'       => "Aktif",
			'm_myamin_user'         => $this->session->userdata('id'),
			'created_at' 				=> time()
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
		$this->db->where('m_myamin_id', $id);
		$this->db->order_by('m_myamin_id', 'desc');
		return $this->db->get('m_myamin')->row_array();
	}

	public function Delete($id)
	{
		$this->db->trans_start();
		$this->db->delete('m_myamin', array('m_myamin_id' => $id));
		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE) {
			return json_encode(array('success' => false, 'msg' => 'Hapus Data Gagal!'));
		} else {
			return json_encode(array('success' => true, 'msg' => 'Hapus Data Berhasil!'));
		}
	}

	public function SimpanEdit()
	{
		$this->db->trans_start();
		$this->db->where('m_myamin_id', $this->input->post('m_myamin_id'));
		$this->db->update('m_myamin', array(
			'm_myamin_tipe'  			=> $this->input->post('m_myamin_tipe'),
			'm_myamin_kode'  			=> $this->input->post('m_myamin_kode'),
			'm_myamin_jenis'  		=> strtoupper($this->input->post('m_myamin_jenis')),
			'm_myamin_tegangan'   	=> $this->input->post('m_myamin_tegangan'),
			'm_myamin_daya'       	=> $this->input->post('m_myamin_daya'),
			'm_myamin_frekuensi'    => $this->input->post('m_myamin_frekuensi'),
			'm_myamin_dimensi'      => $this->input->post('m_myamin_dimensi'),
			'm_myamin_berat'       	=> $this->input->post('m_myamin_berat'),
			'm_myamin_status'       => $this->input->post('m_myamin_status'),
			'm_myamin_user'         => $this->session->userdata('id'),
			'created_at' 				=> time()
		));

		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE) {
			return json_encode(array('success' => false, 'msg' => 'Edit Gagal!'));
		} else {
			return json_encode(array('success' => true, 'msg' => 'Edit Berhasil!'));
		}
	}
}
