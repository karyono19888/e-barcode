<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_karyawan extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('security');
    }

    public function DataTable()
    {
        $this->db->join('m_organisasi', 'm_org_id=karyawan_perusahaan', 'left');
        $this->db->join('m_departemen', 'm_dep_id=karyawan_departement', 'left');
        $this->db->join('m_jabatan', 'm_jab_id=karyawan_jabatan', 'left');
        $this->db->order_by('karyawan_id', 'desc');
        return $this->db->get('m_karyawan');
    }

    public function TotalLine()
    {
        $query = $this->db->get('m_karyawan');
        return $query->num_rows();
    }

    public function Aktif()
    {
        $this->db->where('karyawan_status', 'Aktif');
        $query = $this->db->get('m_karyawan');
        return $query->num_rows();
    }

    public function TidakAktif()
    {
        $this->db->where('karyawan_status', 'Tidak Aktif');
        $query = $this->db->get('m_karyawan');
        return $query->num_rows();
    }

    public function Tambah()
    {
        $this->db->trans_start();
        $this->db->insert('m_karyawan', array(
            'karyawan_nama'             => ucwords($this->input->post('karyawan_nama')),
            'karyawan_nik'              => strtoupper($this->input->post('karyawan_nik')),
            'karyawan_jenis_kelamin'    => $this->input->post('karyawan_jenis_kelamin'),
            'karyawan_perusahaan'       => $this->input->post('karyawan_perusahaan'),
            'karyawan_departement'      => $this->input->post('karyawan_departement'),
            'karyawan_jabatan'          => $this->input->post('karyawan_jabatan'),
            'karyawan_line'             => $this->input->post('karyawan_line'),
            'karyawan_line'             => $this->input->post('karyawan_line'),
            'users'                     => $this->session->userdata('id'),
            'created_at'                => time()
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
        $this->db->join('m_organisasi', 'm_org_id=karyawan_perusahaan', 'left');
        $this->db->join('m_departemen', 'm_dep_id=karyawan_departement', 'left');
        $this->db->join('m_jabatan', 'm_jab_id=karyawan_jabatan', 'left');
        $this->db->join('m_line', 'm_line_id=karyawan_line', 'left');
        $this->db->where('karyawan_id', $id);
        $this->db->order_by('karyawan_id', 'desc');
        return $this->db->get('m_karyawan')->row_array();
    }

    public function SimpanEdit()
    {
        $this->db->trans_start();
        $this->db->where('karyawan_id', $this->input->post('karyawan_id'));
        $this->db->update('m_karyawan', array(
            'karyawan_nama'             => ucwords($this->input->post('karyawan_nama')),
            'karyawan_nik'              => strtoupper($this->input->post('karyawan_nik')),
            'karyawan_jenis_kelamin'    => $this->input->post('karyawan_jenis_kelamin'),
            'karyawan_perusahaan'       => $this->input->post('karyawan_perusahaan'),
            'karyawan_departement'      => $this->input->post('karyawan_departement'),
            'karyawan_jabatan'          => $this->input->post('karyawan_jabatan'),
            'karyawan_line'             => $this->input->post('karyawan_line'),
            'karyawan_line'             => $this->input->post('karyawan_line'),
            'users'                     => $this->session->userdata('id'),
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
        $this->db->delete('m_karyawan', array('karyawan_id' => $id));
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            return json_encode(array('success' => false, 'msg' => 'Hapus Data Gagal!'));
        } else {
            return json_encode(array('success' => true, 'msg' => 'Hapus Data Berhasil!'));
        }
    }

    public function getNamaPerusahaan($searchTerm = "")
    {
        $this->db->select('*');
        $this->db->where("m_org_nama like '%" . $searchTerm . "%' ");
        $this->db->order_by('m_org_id', 'asc');
        $fetched_records = $this->db->get('m_organisasi');
        $perusahaan = $fetched_records->result_array();
        $data = array();
        foreach ($perusahaan as $org) {
            $data[] = array(
                "id"   => $org['m_org_id'],
                "text" => $org['m_org_kode'] . ' - ' . $org['m_org_nama']
            );
        }
        return $data;
    }

    public function getNamaDepartement($searchTerm = "")
    {
        $this->db->select('*');
        $this->db->where("m_dep_nama like '%" . $searchTerm . "%' ");
        $this->db->order_by('m_dep_id', 'asc');
        $fetched_records = $this->db->get('m_departemen');
        $departement = $fetched_records->result_array();
        $data = array();
        foreach ($departement as $dep) {
            $data[] = array(
                "id"   => $dep['m_dep_id'],
                "text" => $dep['m_dep_kode'] . ' - ' . $dep['m_dep_nama']
            );
        }
        return $data;
    }

    public function getNamaJabatan($searchTerm = "")
    {
        $this->db->select('*');
        $this->db->where("m_jab_nama like '%" . $searchTerm . "%' ");
        $this->db->order_by('m_jab_id', 'asc');
        $fetched_records = $this->db->get('m_jabatan');
        $jabatan = $fetched_records->result_array();
        $data = array();
        foreach ($jabatan as $jab) {
            $data[] = array(
                "id"   => $jab['m_jab_id'],
                "text" => $jab['m_jab_kode'] . ' - ' . $jab['m_jab_nama']
            );
        }
        return $data;
    }

    public function getNamaLine($searchTerm = "")
    {
        $this->db->select('*');
        $this->db->where("m_line_nama like '%" . $searchTerm . "%' ");
        $this->db->order_by('m_line_id', 'asc');
        $fetched_records = $this->db->get('m_line');
        $line = $fetched_records->result_array();
        $data = array();
        foreach ($line as $ln) {
            $data[] = array(
                "id"   => $ln['m_line_id'],
                "text" => $ln['m_line_kode'] . ' - ' . $ln['m_line_nama']
            );
        }
        return $data;
    }

}
