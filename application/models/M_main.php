<?php
class M_main extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
	}

	public function hitungJumlahGenerate()
	{
		$query = $this->db->get('t_generate_bc');
		if ($query->num_rows() > 0) {
			return $query->num_rows();
		} else {
			return 0;
		}
	}
}
