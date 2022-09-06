<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Karyawan extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('M_auth');
		$this->M_auth->cek_login();
        $this->load->model('Master/M_karyawan','record');
    }

	function index(){
        $data['title'] = 'Master | Karyawan ';
        $data['data']  = $this->record->index();
        $data['dep']   = $this->record->getDep();
        $data['jab']   = $this->record->getJab();
        $this->load->view('template/v_header',$data);
		$this->load->view('template/v_sidebar');
        $this->load->view('Master/v_karyawan', $data);
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
        $m_karyawan_prh          = addslashes($_POST['m_karyawan_prh']);
        $m_karyawan_NIP          = addslashes($_POST['m_karyawan_NIP']);
        $m_karyawan_NIK          = addslashes($_POST['m_karyawan_NIK']);
        $m_karyawan_nama         = addslashes($_POST['m_karyawan_nama']);
        $m_karyawan_jk           = addslashes($_POST['m_karyawan_jk']);
        $m_karyawan_tp_lahir     = addslashes($_POST['m_karyawan_tp_lahir']);
        $m_karyawan_tgl_lahir    = addslashes($_POST['m_karyawan_tgl_lahir']);
        $m_karyawan_phone        = addslashes($_POST['m_karyawan_phone']);
        $m_karyawan_agama        = addslashes($_POST['m_karyawan_agama']);
        $m_karyawan_nikah        = addslashes($_POST['m_karyawan_nikah']);
        $m_karyawan_almat        = addslashes($_POST['m_karyawan_almat']);
        $m_karyawan_nm_kel_dkt   = addslashes($_POST['m_karyawan_nm_kel_dkt']);
        $m_karyawan_nm_kel_hp    = addslashes($_POST['m_karyawan_nm_kel_hp']);
        $m_karyawan_dep_id       = addslashes($_POST['m_karyawan_dep_id']);
        $m_karyawan_jab_id       = addslashes($_POST['m_karyawan_jab_id']);
        $m_karyawan_nm_bank      = addslashes($_POST['m_karyawan_nm_bank']);
        $m_karyawan_no_rek       = addslashes($_POST['m_karyawan_no_rek']);
        $m_karyawan_join_date    = addslashes($_POST['m_karyawan_join_date']);
        $m_karyawan_ket          = addslashes($_POST['m_karyawan_ket']);
        $m_karyawan_status       = addslashes($_POST['m_karyawan_status']);
        $m_karyawan_foto         = addslashes($_FILES['m_karyawan_foto']);

        $this->load->library('ciqrcode');
        $config['cacheable']    = true;
        $config['cachedir']     = './assets/';
        $config['errorlog']     = './assets/';
        $config['imagedir']     = './assets/qr-code/'; //direktori penyimpanan qr code
        $config['quality']      = true;
        $config['size']         = '1024'; //interger, the default is 1024
        $config['black']        = array(224,255,255);
        $config['white']        = array(70,130,180);
        $this->ciqrcode->initialize($config);
        $m_karyawan_Qrcode=$m_karyawan_NIP.'.png'; //buat name dari qr code sesuai dengan nip
        $params['data'] = $m_karyawan_NIP; //data yang akan di jadikan QR CODE
        $params['level'] = 'H'; //H=High
        $params['size'] = 10;
        $params['savename'] = FCPATH.$config['imagedir'].$m_karyawan_Qrcode; //simpan image QR CODE ke folder assets/qr-code/
        $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE

        echo $this->record->create($m_karyawan_prh,$m_karyawan_NIK,$m_karyawan_NIP,$m_karyawan_nama,$m_karyawan_status,$m_karyawan_Qrcode,$m_karyawan_jk,$m_karyawan_tp_lahir,$m_karyawan_tgl_lahir,$m_karyawan_phone,$m_karyawan_agama,$m_karyawan_nikah,$m_karyawan_almat,$m_karyawan_nm_kel_dkt,$m_karyawan_nm_kel_hp,$m_karyawan_dep_id,$m_karyawan_jab_id,$m_karyawan_nm_bank,$m_karyawan_no_rek,$m_karyawan_join_date,$m_karyawan_ket,$m_karyawan_foto);
    }



    function update(){
        if(!isset($_POST))
            show_404();

        $m_karyawan_id     = addslashes($_POST['m_karyawan_id']);
        $m_karyawan_NIP    = addslashes($_POST['m_karyawan_NIP']);
        $m_karyawan_NIK    = addslashes($_POST['m_karyawan_NIK']);
        $m_karyawa_nama    = addslashes($_POST['m_karyawa_nama']);
        $m_karyawan_status = addslashes($_POST['m_karyawan_status']);

        echo $this->record->update($m_karyawan_id,$m_karyawan_NIK, $m_karyawan_NIP, $m_karyawa_nama, $m_karyawan_status);
    }

    function delete(){
        if(!isset($_POST))
            show_404();

        $m_karyawan_id  = addslashes($_POST['m_karyawan_id']);
        echo $this->record->delete($m_karyawan_id);
    }

}