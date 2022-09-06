<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_karyawan extends CI_Model
{
	static $table1 = 'm_karyawan';
	static $table2 = 'm_departemen';
	static $table3 = 'm_jabatan';

	function index(){
        $this->db->select('*');
        $this->db->join(self::$table2, 'm_karyawan_dep_id=m_dep_id', 'left');
        $this->db->join(self::$table3, 'm_karyawan_jab_id=m_jab_id', 'left');
        $this->db->order_by('m_karyawan_id', 'desc');
        $query  = $this->db->get(self::$table1);
        return $query;
    }

    function view($myid){
        $this->db->select('*');
        $this->db->where('m_karyawan_id', $myid);
        $query  = $this->db->get(self::$table1);
        if($query){
            $row = $query->row();
            return json_encode(array(
                'success'               =>true,
                'm_karyawan_id'         => $row->m_karyawan_id,
                'm_karyawan_prh'        => $row->m_karyawan_prh,
                'm_karyawan_NIP'        => $row->m_karyawan_NIP,
                'm_karyawan_NIK'        => $row->m_karyawan_NIK,
                'm_karyawan_nama'       => $row->m_karyawan_nama,
                'm_karyawan_jk'         => $row->m_karyawan_jk,
                'm_karyawan_tp_lahir'   => $row->m_karyawan_tp_lahir,
                'm_karyawan_tgl_lahir'  => $row->m_karyawan_tgl_lahir,
                'm_karyawan_phone'      => $row->m_karyawan_phone,
                'm_karyawan_agama'      => $row->m_karyawan_agama,
                'm_karyawan_nikah'      => $row->m_karyawan_nikah,
                'm_karyawan_almat'      => $row->m_karyawan_almat,
                'm_karyawan_nm_kel_dkt' => $row->m_karyawan_nm_kel_dkt,
                'm_karyawan_nm_kel_hp'  => $row->m_karyawan_nm_kel_hp,
                'm_karyawan_dep_id'     => $row->m_karyawan_dep_id,
                'm_karyawan_jab_id'     => $row->m_karyawan_jab_id,
                'm_karyawan_nm_bank'    => $row->m_karyawan_nm_bank,
                'm_karyawan_no_rek'     => $row->m_karyawan_no_rek,
                'm_karyawan_join_date'  => $row->m_karyawan_join_date,
                'm_karyawan_status'     => $row->m_karyawan_status,
                'm_karyawan_foto'       => $row->m_karyawan_foto,
                'm_karyawan_ket'        => $row->m_karyawan_ket,
            ));
        }else{
            return json_encode(array('success'=>false, 'msg'=>'Data tidak ditemukan!'));
        }
    }

    function create($m_karyawan_prh,$m_karyawan_NIK,$m_karyawan_NIP,$m_karyawan_nama,$m_karyawan_status,$m_karyawan_Qrcode,$m_karyawan_jk,$m_karyawan_tp_lahir,$m_karyawan_tgl_lahir,$m_karyawan_phone,$m_karyawan_agama,$m_karyawan_nikah,$m_karyawan_almat,$m_karyawan_nm_kel_dkt,$m_karyawan_nm_kel_hp,$m_karyawan_dep_id,$m_karyawan_jab_id,$m_karyawan_nm_bank,$m_karyawan_no_rek,$m_karyawan_join_date,$m_karyawan_ket){
        $this->db->select('m_karyawan_NIP');
        $this->db->where('m_karyawan_NIP', $m_karyawan_NIP);
        $query  = $this->db->get(self::$table1);
        $row = $query->num_rows();
        if($row > 0){
            return json_encode(array('success'=>false, 'msg'=>'Input data gagal, NIP sudah ada!'));
        }else{
            $this->db->trans_start();
            $this->db->insert(self::$table1,array(
                'm_karyawan_prh'        => $m_karyawan_prh,
                'm_karyawan_NIK'        => $m_karyawan_NIK,
                'm_karyawan_NIP'        => $m_karyawan_NIP,
                'm_karyawan_nama'       => $m_karyawan_nama,
                'm_karyawan_status'     => $m_karyawan_status,
                'm_karyawan_jk'         => $m_karyawan_jk,
                'm_karyawan_tp_lahir'   => $m_karyawan_tp_lahir,
                'm_karyawan_tgl_lahir'  => $m_karyawan_tgl_lahir,
                'm_karyawan_phone'      => $m_karyawan_phone,
                'm_karyawan_agama'      => $m_karyawan_agama,
                'm_karyawan_nikah'      => $m_karyawan_nikah,
                'm_karyawan_almat'      => $m_karyawan_almat,
                'm_karyawan_nm_kel_dkt' => $m_karyawan_nm_kel_dkt,
                'm_karyawan_nm_kel_hp'  => $m_karyawan_nm_kel_hp,
                'm_karyawan_dep_id'     => $m_karyawan_dep_id,
                'm_karyawan_jab_id'     => $m_karyawan_jab_id,
                'm_karyawan_nm_bank'    => $m_karyawan_nm_bank,
                'm_karyawan_no_rek'     => $m_karyawan_no_rek,
                'm_karyawan_join_date'  => $m_karyawan_join_date,
                'm_karyawan_ket'        => $m_karyawan_ket,
                'm_karyawan_foto'       => $this->_uploadImage(),
                'm_karyawan_Qrcode'     => $m_karyawan_Qrcode,
            ));
            $this->db->trans_complete();
            if($this->db->trans_status() === FALSE){
                return json_encode(array('success'=>false, 'msg'=>'Input data gagal!'));
            }else {
                return json_encode(array('success'=>true, 'msg'=>'Input data berhasil!'));
            }
        }
    }

    private function _uploadImage()
    {
        $m_karyawan_foto         =  $_FILES['m_karyawan_foto']['name'];
        if ($m_karyawan_foto =='') {
			$this->form_validation->set_rules('m_karyawan_foto','Upload Bukti Pembelian','required|trim');
			}else{
			$config['upload_path']          = './assets/foto-karyawan/';
			$config['allowed_types']        = 'gif|jpg|png';
			$config['max_size']             = 2048;
			$config['file_name']            = $this->input->post('m_karyawan_foto', true);
			$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload('m_karyawan_foto')){
				//tidak terjadi apa2 jika tidak memilih foto
			}else{
				$m_karyawan_foto = $this->upload->data('file_name');
			}
			}
			$data = [
				'm_karyawan_foto' => $m_karyawan_foto,
			];
        // $config['upload_path']          = './assets/foto-karyawan/';
        // $config['allowed_types']        = 'gif|jpg|png|jpeg';
        // $config['max_size']             = 2048; //max 2 MB
        // $config['file_name']            = $this->input->post('m_karyawan_nama',true);
        // $this->load->library('upload', $config);
        // if(!empty($_FILES['m_karyawan_foto']['name'])){
        //     $this->upload->do_upload('m_karyawan_foto');
        //     $data = $this->upload->data();
        //     $m_karyawan_foto = $data['file_name'];
        // }
        // $data = array (
        //     'm_karyawan_foto' => $m_karyawan_foto,
        // );
        $this->db->insert('m_karyawan', $data);
    }

    function update($m_karyawan_id,$m_karyawan_NIK, $m_karyawan_NIP, $m_karyawa_nama, $m_karyawan_status){
        $this->db->trans_start();
        $this->db->where('m_karyawan_id', $m_karyawan_id);
        $this->db->update(self::$table1,array(
            'm_karyawan_NIK'    => $m_karyawan_NIK,
            'm_karyawan_NIP'    => $m_karyawan_NIP,
            'm_karyawa_nama'    => $m_karyawa_nama,
            'm_karyawan_status' => $m_karyawan_status,
        ));
        $this->db->trans_complete();
        if($this->db->trans_status() === FALSE){
            return json_encode(array('success'=>false, 'msg'=>'Update data gagal!'));
        }else {
            return json_encode(array('success'=>true, 'msg'=>'Update data berhasil!'));
        }
    }

    function delete($m_karyawan_id){
        $this->db->trans_start();
        $this->db->delete(self::$table1, array('m_karyawan_id' => $m_karyawan_id));
        $this->db->trans_complete();
        if($this->db->trans_status() === FALSE){
            return json_encode(array('success'=>false, 'msg'=>'Hapus data gagal!'));
        }else {
            return json_encode(array('success'=>true, 'msg'=>'Hapus data berhasil!'));
        }
    }

    public function getDep(){
        $query  = $this->db->get(self::$table2);
        return $query;
    }
    public function getJab(){
        $query  = $this->db->get(self::$table3);
        return $query;
    }


}