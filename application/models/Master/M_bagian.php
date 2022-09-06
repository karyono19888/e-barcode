<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_bagian extends CI_Model
{
	static $table1 = 'm_departemen';
	static $table2 = 'm_jabatan';

	function index(){
        $this->db->select('*');
        $query  = $this->db->get(self::$table1);
        return $query;
    }

    function view($myid){
        $this->db->select('*');
        $this->db->where('m_dep_id', $myid);
        $query  = $this->db->get(self::$table1);
        if($query){
            $row = $query->row();
            return json_encode(array(
                'success'           =>true,
                'm_dep_id'        => $row->m_dep_id,
                'm_dep_nama'      => $row->m_dep_nama
            ));
        }else{
            return json_encode(array('success'=>false, 'msg'=>'Data tidak ditemukan!'));
        }
    }

    function create($m_dep_nama){
        $this->db->select('m_dep_nama');
        $this->db->where('m_dep_nama', $m_dep_nama);
        $query  = $this->db->get(self::$table1);
        $row = $query->num_rows();
        if($row > 0){
            return json_encode(array('success'=>false, 'msg'=>'Input data gagal, Departemen sudah ada!'));
        }else{
            $this->db->trans_start();
            $this->db->insert(self::$table1,array(
                'm_dep_nama'       => $m_dep_nama,
            ));
            $this->db->trans_complete();
            if($this->db->trans_status() === FALSE){
                return json_encode(array('success'=>false, 'msg'=>'Input data gagal!'));
            }else {
                return json_encode(array('success'=>true, 'msg'=>'Input data berhasil!'));
            }
        }
    }

    function update($m_dep_id, $m_dep_nama){
        $this->db->trans_start();
        $this->db->where('m_dep_id', $m_dep_id);
        $this->db->update(self::$table1,array(
            'm_dep_nama'    => $m_dep_nama
        ));
        $this->db->trans_complete();
        if($this->db->trans_status() === FALSE){
            return json_encode(array('success'=>false, 'msg'=>'Update data gagal!'));
        }else {
            return json_encode(array('success'=>true, 'msg'=>'Update data berhasil!'));
        }
    }

        function delete($m_dep_id){
            $this->db->trans_start();
            $this->db->delete(self::$table1, array('m_dep_id' => $m_dep_id));
            $this->db->trans_complete();
            if($this->db->trans_status() === FALSE){
                return json_encode(array('success'=>false, 'msg'=>'Hapus data gagal!'));
            }else {
                return json_encode(array('success'=>true, 'msg'=>'Hapus data berhasil!'));
            }
        }

        public function getJab(){
            $query  = $this->db->get(self::$table2);
            return $query;
        }

        // jabatan
        function viewjab($myid1){
            $this->db->select('*');
            $this->db->where('m_jab_id', $myid1);
            $query  = $this->db->get(self::$table2);
            if($query){
                $row = $query->row();
                return json_encode(array(
                    'success'           =>true,
                    'm_jab_id'        => $row->m_jab_id,
                    'm_jab_nama'      => $row->m_jab_nama
                ));
            }else{
                return json_encode(array('success'=>false, 'msg'=>'Data tidak ditemukan!'));
            }
        }

        function createjb($m_jab_nama){
            $this->db->select('m_jab_nama');
            $this->db->where('m_jab_nama',$m_jab_nama);
            $query  = $this->db->get(self::$table2);
            $row = $query->num_rows();
            if($row > 0){
                return json_encode(array('success'=>false, 'msg'=>'Input data gagal, Jabatan sudah ada!'));
            }else{
                $this->db->trans_start();
                $this->db->insert(self::$table2,array(
                    'm_jab_nama'       => $m_jab_nama,
                ));
                $this->db->trans_complete();
                if($this->db->trans_status() === FALSE){
                    return json_encode(array('success'=>false, 'msg'=>'Input data gagal!'));
                }else {
                    return json_encode(array('success'=>true, 'msg'=>'Input data berhasil!'));
                }
            }
        }

        function updatejab($m_jab_id,$m_jab_nama){
            $this->db->trans_start();
            $this->db->where('m_jab_id',$m_jab_id);
            $this->db->update(self::$table2,array(
                'm_jab_nama'    => $m_jab_nama,
            ));
            $this->db->trans_complete();
            if($this->db->trans_status() === FALSE){
                return json_encode(array('success'=>false, 'msg'=>'Update data gagal!'));
            }else {
                return json_encode(array('success'=>true, 'msg'=>'Update data berhasil!'));
            }
        }

            function deletejab($m_jab_id){
                $this->db->trans_start();
                $this->db->delete(self::$table2, array('m_jab_id' => $m_jab_id));
                $this->db->trans_complete();
                if($this->db->trans_status() === FALSE){
                    return json_encode(array('success'=>false, 'msg'=>'Hapus data gagal!'));
                }else {
                    return json_encode(array('success'=>true, 'msg'=>'Hapus data berhasil!'));
                }
            }

}