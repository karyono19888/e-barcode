<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_jabatan extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('security');
    }

    public function DataTable()
    {
        $this->db->order_by('m_jab_id', 'desc');
        return $this->db->get('m_jabatan');
    }

    public function TotalLine()
    {
        $query = $this->db->get('m_jabatan');
        return $query->num_rows();
    }

    public function Aktif()
    {
        $this->db->where('m_jab_status', 'Aktif');
        $query = $this->db->get('m_jabatan');
        return $query->num_rows();
    }

    public function TidakAktif()
    {
        $this->db->where('m_jab_status', 'Tidak Aktif');
        $query = $this->db->get('m_jabatan');
        return $query->num_rows();
    }

    public function Tambah()
    {
        $this->db->trans_start();
        $this->db->insert('m_jabatan', array(
            'm_jab_kode'      => strtoupper($this->input->post('m_jab_kode')),
            'm_jab_nama'      => ucwords($this->input->post('m_jab_nama')),
            'm_jab_status'    => $this->input->post('m_jab_status'),
            'm_jab_user'      => $this->session->userdata('id'),
            'created_at'      => time()
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
        $this->db->where('m_jab_id', $id);
        $this->db->order_by('m_jab_id', 'desc');
        return $this->db->get('m_jabatan')->row_array();
    }

    public function SimpanEdit()
    {
        $this->db->trans_start();
        $this->db->where('m_jab_id', $this->input->post('m_jab_id'));
        $this->db->update('m_jabatan', array(
            'm_jab_kode'      => strtoupper($this->input->post('m_jab_kode')),
            'm_jab_nama'      => ucwords($this->input->post('m_jab_nama')),
            'm_jab_status'    => $this->input->post('m_jab_status'),
            'm_jab_user'      => $this->session->userdata('id'),
            'created_at'      => time()
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
        $this->db->delete('m_jabatan', array('m_jab_id' => $id));
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            return json_encode(array('success' => false, 'msg' => 'Hapus Data Gagal!'));
        } else {
            return json_encode(array('success' => true, 'msg' => 'Hapus Data Berhasil!'));
        }
    }
}
