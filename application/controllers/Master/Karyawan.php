<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;
class Karyawan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_auth');
        $this->M_auth->cek_login();
        $this->load->model('Master/M_karyawan', 'record');
    }

    public function index()
    {
        $data['title']         = 'Master | Karyawan ';
        $data['TotalLine']     =  $this->record->TotalLine();
        $data['Aktif']         =  $this->record->Aktif();
        $data['TidakAktif']    =  $this->record->TidakAktif();
        $this->load->view('template/v_header', $data);
        $this->load->view('template/v_sidebar');
        $this->load->view('karyawan/v_index', $data);
    }

    public function ShowTableData()
    {
        $data['data'] =  $this->record->DataTable();
        $this->load->view('karyawan/v_table', $data);
    }

    public function ShowTambahData()
    {
        $this->load->view('karyawan/v_tambah');
    }

    public function Tambah()
    {
        echo $this->record->Tambah();
    }

    public function ShowDataPreview()
    {
        $id = $this->input->post('id');
        $data['data']     = $this->record->DataTablePreview($id);
        $this->load->view('karyawan/v_preview', $data);
    }

    public function ShowEditData()
    {
        $id = $this->input->post('id');
        $data['data']     = $this->record->DataTablePreview($id);
        $this->load->view('karyawan/v_edit', $data);
    }

    public function SimpanEdit()
    {
        echo $this->record->SimpanEdit();
    }

    public function Delete()
    {
        $id     = $this->input->post('id');
        echo $this->record->Delete($id);
    }

    public function getNamaPerusahaan()
    {
        $searchTerm = $this->input->post('searchTerm');
        $response   = $this->record->getNamaPerusahaan($searchTerm);
        echo json_encode($response);
    }

    public function getNamaDepartement()
    {
        $searchTerm = $this->input->post('searchTerm');
        $response   = $this->record->getNamaDepartement($searchTerm);
        echo json_encode($response);
    }

    public function getNamaJabatan()
    {
        $searchTerm = $this->input->post('searchTerm');
        $response   = $this->record->getNamaJabatan($searchTerm);
        echo json_encode($response);
    }

    public function getNamaLine()
    {
        $searchTerm = $this->input->post('searchTerm');
        $response   = $this->record->getNamaLine($searchTerm);
        echo json_encode($response);
    }
}
