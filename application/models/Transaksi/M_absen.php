<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_absen extends CI_Model
{
    // static $table1 = 'a_user';

    public function __construct()
    {
        parent::__construct();
        $bulan = array(1 => "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
        $hari = array("Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu");
        $this->get_today_date = $hari[(int)date("w")] . ', ' . date("j ") . $bulan[(int)date('m')] . date(" Y");

        $this->shift = $this->db->get_where('m_shift', ['shift_id' => 1])->row_array();
        $timezone_all = $this->shift;
        date_default_timezone_set($timezone_all['time_zone']);
    }

    function do_absen($barcode)
    {
        $appsettings = $this->shift;
        $today = $this->get_today_date;
        $clocknow = date("H:i:s");

        $this->db->select('*');
        $this->db->from('m_karyawan');
        $this->db->where('m_karyawan_nip', $barcode);
        $this->db->like('m_karyawan_nip', $barcode, 'after');
        $query = $this->db->get()->result_array();
        if ($query) {
            if (strtotime($clocknow) >= strtotime($appsettings['absen_mulai'])) {
                return json_encode(array('success' => true, 'msg' => 'Lanjut!'));
            } else if (strtotime($clocknow) <= strtotime($appsettings['absen_mulai_to'])) {
                return json_encode(array('success' => true, 'msg' => 'shift siang'));
            }
        } else {
            // false
            return json_encode(array('success' => false, 'msg' => 'Anda Belum Terdaftar!'));
        }

        // if (strtotime($clocknow) >= strtotime($appsettings['absen_mulai']) && strtotime($clocknow) <= strtotime($appsettings['absen_mulai_to'])) {
        //     return json_encode(array('success' => false, 'msg' => 'Absen Gagal!'));
        // }1212-7237, 1212-7236


        // $this->db->trans_start();
        // $this->db->insert('t_absen', array(
        //     't_absen_masuk'   => $clocknow,
        //     't_absen_ket'     => "Hadir",
        //     't_absen_kry_id'  => $barcode,
        // ));
        // $this->db->trans_complete();
        // if ($this->db->trans_status() === FALSE) {
        //     return json_encode(array('success' => false, 'msg' => 'Absen Gagal!'));
        // } else {
        //     return json_encode(array('success' => true, 'msg' => 'Anda Telah Absen!'));
        // }
    }
}