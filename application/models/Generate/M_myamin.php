<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_myamin extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('security');
	}

	public function dataLine()
	{
		$this->db->order_by('m_line_id', 'asc');
		return $this->db->get('m_line');
	}

	public function dataLineRow($id)
	{
		$this->db->where('m_line_id', $id);
		return $this->db->get('m_line')->row_array();
	}

	public function dataLineTeams($id)
	{
		$this->db->join('m_karyawan', 'karyawan_nik=m_team_line_user', 'left');
		$this->db->where('m_team_line_id', $id)->where('m_line_status !=', 'Close');
		return $this->db->get('m_team_line');
	}

	public function dataLineMaster($id)
	{
		$this->db->where('m_grp_line_id', $id)->where('m_grp_status !=', 'Close');
		return $this->db->get('m_team_line_grp');
	}

	public function TambahTeamsLine()
	{
		$scan_barcode 	= $this->input->post('scan_barcode');
		$line_id 		= $this->input->post('line_id');
		$cek = $this->db->get_where('m_karyawan', ['karyawan_nik' => $scan_barcode])->row_array();

		if ($cek) {
			if ($cek['karyawan_status'] == "Aktif") {
				$cek_line = $this->db->get_where('m_team_line', ['m_team_line_user' => $scan_barcode, 'm_line_status' => "New"])->row_array();
				if ($cek_line) {
					return json_encode(array('success' => false, 'msg' => '' . $cek['karyawan_nama'] . ' Sudah ditambahkan'));
				} else {

					if ($this->db->get_where('m_team_line', ['m_team_line_user' => $scan_barcode, 'm_line_status' => "In Progress"])->row_array()) {
						return json_encode(array('success' => false, 'msg' => '' . $cek['karyawan_nama'] . ' In Progress Line'));
					} else {

						if ($this->db->get_where('m_team_line_grp', ['m_grp_line_id' => $line_id, 'm_grp_status !=' => "Close"])->row_array()) {
							$this->db->where('m_grp_line_id', $line_id)->where('m_grp_status !=', "Close");
							$this->db->update('m_team_line_grp', array(
								'created'			=> time(),
							));
							$grp_id = $this->db->get_where('m_team_line_grp', ['m_grp_line_id' => $line_id, 'm_grp_status !=' => "Close"])->row_array();
							$this->db->insert('m_team_line', array(
								'm_grp_id'  			=> $grp_id['m_grp_id'],
								'm_team_line_user'  	=> $scan_barcode,
								'm_team_line_id'     => $line_id,
								'm_line_status'   	=> "New",
								'created'				=> time(),
							));
							return json_encode(array('success' => true, 'msg' => '' . $cek['karyawan_nama'] . ' Berhasil ditambahkan'));
						} else {

							// tamble master group
							$this->db->insert('m_team_line_grp', array(
								'm_grp_user'  		=> $this->session->userdata('id'),
								'm_grp_line_id'  	=> $line_id,
								'm_grp_nama'  		=> "Myamin",
								'm_grp_status'   	=> "New",
								'created'			=> time(),
							));
							// table parent master group
							$this->db->insert('m_team_line', array(
								'm_grp_id'  			=> $this->db->insert_id(),
								'm_team_line_user'  	=> $scan_barcode,
								'm_team_line_id'     => $line_id,
								'm_line_status'   	=> "New",
								'created'				=> time(),
							));
							return json_encode(array('success' => true, 'msg' => '' . $cek['karyawan_nama'] . ' Berhasil ditambahkan'));
						}
					}
				}
			} else {
				return json_encode(array('success' => false, 'msg' => '' . $cek['karyawan_nama'] . '  sudah tidak aktif!'));
			}
		} else {
			return json_encode(array('success' => false, 'msg' => 'Team Belum Terdaftar!'));
		}
	}

	public function GenerateBarcodeDelete()
	{
		$this->db->trans_start();
		$id = $this->input->post('id');
		$this->db->delete('m_team_line_grp', array('m_grp_id' => $id));
		$this->db->delete('m_team_line', array('m_grp_id' => $id));
		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE) {
			return json_encode(array('success' => false, 'msg' => 'Hapus Data Gagal!'));
		} else {
			return json_encode(array('success' => true, 'msg' => 'Hapus Data Berhasil!'));
		}
	}

	public function StartGenerateBarcode()
	{
		$this->db->trans_start();
		$id = $this->input->post('id');
		$this->db->where('m_grp_id', $id)->where('m_grp_status', "New");
		$this->db->update('m_team_line_grp', array(
			'm_grp_status'			=> "In Progress",
		));
		$this->db->where('m_grp_id', $id)->where('m_line_status', "New");
		$this->db->update('m_team_line', array(
			'm_line_status'			=> "In Progress",
		));
		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE) {
			return json_encode(array('success' => false, 'msg' => 'Start Generate Data Gagal!'));
		} else {
			return json_encode(array('success' => true, 'msg' => 'Start Generate Berhasil!'));
		}
	}
}
