<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Organisasi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_auth');
        $this->M_auth->cek_login();
        $this->load->model('Master/M_organisasi', 'record');
    }

    public function index()
    {
        $data['title']         = 'Master | Organisasi ';
        $data['TotalLine']     =  $this->record->TotalLine();
        $data['Aktif']         =  $this->record->Aktif();
        $data['TidakAktif']    =  $this->record->TidakAktif();
        $this->load->view('template/v_header', $data);
        $this->load->view('template/v_sidebar');
        $this->load->view('organisasi/v_index', $data);
    }

    public function ShowTableData()
    {
        $data['data'] =  $this->record->DataTable();
        $this->load->view('organisasi/v_table', $data);
    }

    public function ShowTambahData()
    {
        $this->load->view('organisasi/v_tambah');
    }

    public function Tambah()
    {
        echo $this->record->Tambah();
    }

    public function ShowDataPreview()
    {
        $id = $this->input->post('id');
        $data['data']     = $this->record->DataTablePreview($id);
        $this->load->view('organisasi/v_preview', $data);
    }

    public function ShowEditData()
    {
        $id = $this->input->post('id');
        $data['data']     = $this->record->DataTablePreview($id);
        $this->load->view('organisasi/v_edit', $data);
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
}
