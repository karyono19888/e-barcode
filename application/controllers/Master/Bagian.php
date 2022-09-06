<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bagian extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('M_auth');
		$this->M_auth->cek_login();
        $this->load->model('Master/M_bagian','record');
    }

	function index(){
        $data['title'] = 'Master | Bagian';
        $data['data']  = $this->record->index();
        $data['Jab']   = $this->record->getJab();
        $this->load->view('template/v_header',$data);
		$this->load->view('template/v_sidebar');
        $this->load->view('Master/v_bagian', $data);
    }

    function view(){
        if(!isset($_POST))
            show_404();

        $myid        = addslashes($_POST['myid']);
        echo $this->record->view($myid);
    }

    function create(){
        if(!isset($_POST))
            show_404();
        $m_dep_nama   = addslashes($_POST['m_dep_nama']);
        echo $this->record->create($m_dep_nama);
    }

    function update(){
        if(!isset($_POST))
            show_404();
        $m_dep_id      = addslashes($_POST['m_dep_id']);
        $m_dep_nama   = addslashes($_POST['m_dep_nama']);
        echo $this->record->update($m_dep_id, $m_dep_nama);
    }

    function delete(){
        if(!isset($_POST))
            show_404();

        $m_dep_id  = addslashes($_POST['m_dep_id']);
        echo $this->record->delete($m_dep_id);
    }

    // Jabatan
    function viewJab(){
        if(!isset($_POST))
            show_404();

        $myid1        = addslashes($_POST['myid1']);
        echo $this->record->viewjab($myid1);
    }

    function createjab(){
        if(!isset($_POST))
            show_404();
        $m_jab_nama   = addslashes($_POST['m_jab_nama']);
        echo $this->record->createjb($m_jab_nama);
    }

    function updatejab(){
        if(!isset($_POST))
            show_404();
        $m_jab_id      = addslashes($_POST['m_jab_id']);
        $m_jab_nama   = addslashes($_POST['m_jab_nama']);
        echo $this->record->updatejab($m_jab_id,$m_jab_nama);
    }

    function deletejab(){
        if(!isset($_POST))
            show_404();

        $m_jab_id  = addslashes($_POST['m_jab_id']);
        echo $this->record->deletejab($m_jab_id);
    }

}