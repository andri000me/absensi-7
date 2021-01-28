<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model');
        $this->load->library('form_validation');
        date_default_timezone_set("Asia/Makassar");
    }


    public function index()
	{
        if ($_SESSION['admin']){

            $data['satker'] = $this->Admin_model->getSingleSatker($_SESSION['admin']);

            $data['pegawai'] = $this->Admin_model->getPegawaiSatker($_SESSION['admin']);

            //var_dump($data);

            //die();

            $this->load->view('admin/header');
            $this->load->view('admin/index', $data);
            $this->load->view('admin/footer');

        }else {
            redirect('login');
        }

    }

    function lihat_peta(){
        if ($_SESSION['admin']){

            $data['absen'] = $this->Admin_model->getAbsenPegawai(date('Y-m-d'));

            // var_dump ($data);
            // die();

            $this->load->view('admin/peta_absen', $data);
        }else   {
            redirect('login');
        } 
    }

    public function rekap_bulan()
	{
        if ($_SESSION['admin']){

            if ($this->input->post('bulan')){
                $bulan = $this->input->post('bulan');
                $tahun = $this->input->post('tahun');
            }else {
                $bulan = date('m');
                $tahun = date('Y');
            }

            $data['bulan'] = $bulan;
            $data['tahun'] = $tahun;
            
            $data['satker'] = $this->Admin_model->getSingleSatker($_SESSION['admin']);

            $data['pegawai'] = $this->Admin_model->getPegawaiSatker($_SESSION['admin']);

            //var_dump($data);

            //die();

            $this->load->view('admin/header');
            $this->load->view('admin/rekap_bulan', $data);
            $this->load->view('admin/footer');

        }else {
            redirect('login');
        }
    }


    public function rekap_kinerja()
	{
        if ($_SESSION['admin']){

            if ($this->input->post('bulan')){
                $bulan = $this->input->post('bulan');
            }else {
                $bulan = date('m');
            }

            $data['bulan'] = $bulan;

            $data['satker'] = $this->Admin_model->getSingleSatker($_SESSION['admin']);

            $data['pegawai'] = $this->Admin_model->getPegawaiSatker($_SESSION['admin']);

            //var_dump($data);

            //die();

            $this->load->view('admin/header');
            $this->load->view('admin/rekap_kinerja', $data);
            $this->load->view('admin/footer');

        }else {
            redirect('login');
        }

    }

    public function detail_kinerja($nip = null)
	{
        if (isset($_SESSION['admin'])){

            $data['satker'] = $this->Admin_model->getSingleSatker($_SESSION['admin']);

            $data['pegawai'] = $this->Admin_model->getSinglePegawai($nip);

            if ($this->input->post('bulan')){
                $bulan = $this->input->post('bulan');
            }else {
                $bulan = date('m');
			}

            $data['bulan'] = $bulan;

            //var_dump($data);

            //die();

            $this->load->view('admin/header');
            $this->load->view('admin/detail_kinerja', $data);
            $this->load->view('admin/footer');

        }else {
            redirect('login');
        }

    }

    public function pegawai()
	{
        if (isset($_SESSION['admin'])){

            $data['satker'] = $this->Admin_model->getSingleSatker($_SESSION['admin']);

            $data['pegawai'] = $this->Admin_model->getPegawaiSatker($_SESSION['admin']);

            //var_dump($data);

            //die();

            $this->load->view('admin/header');
            $this->load->view('admin/profil_pegawai', $data);
            $this->load->view('admin/footer');

        }else {
            redirect('login');
        }

    }
    
    public function unit()
	{
        if (isset($_SESSION['admin'])){

            $data['satker'] = $this->Admin_model->getSingleSatker($_SESSION['admin']);

            $data['unit'] = $this->Admin_model->getDataSatker($_SESSION['admin']);

            $data['pegawai'] = $this->Admin_model->getPegawaiSatker($_SESSION['admin']);

            //var_dump($data);

            //die();

            $this->load->view('admin/header');
            $this->load->view('admin/profil_unit', $data);
            $this->load->view('admin/footer');

        }else {
            redirect('login');
        }

    }

    public function unit_kabkota()
	{
        if (isset($_SESSION['admin'])){

            $data['satker'] = $this->Admin_model->getSingleSatker($_SESSION['admin']);

            $data['unit'] = $this->Admin_model->getDataSatkerKabKota($_SESSION['admin']);

            $data['pegawai'] = $this->Admin_model->getPegawaiSatker($_SESSION['admin']);

            //var_dump($data);

            //die();

            $this->load->view('admin/header');
            $this->load->view('admin/profil_unitkabkota', $data);
            $this->load->view('admin/footer');

        }else {
            redirect('login');
        }

    }

    public function unit_kua()
	{
        if (isset($_SESSION['admin'])){

            $data['satker'] = $this->Admin_model->getSingleSatker($_SESSION['admin']);

            $data['unit'] = $this->Admin_model->getDataSatkerKua($_SESSION['admin']);

            $data['pegawai'] = $this->Admin_model->getPegawaiSatker($_SESSION['admin']);

            //var_dump($data);

            //die();

            $this->load->view('admin/header');
            $this->load->view('admin/profil_unitkua', $data);
            $this->load->view('admin/footer');

        }else {
            redirect('login');
        }

    }
    
    public function tambah_pegawai()
    {
        if (isset($_SESSION['admin'])){

            $this->form_validation->set_rules('nip', 'NIP', 'required');
            $this->form_validation->set_rules('nama_pegawai', 'Nama Pegawai', 'required');
            $this->form_validation->set_rules('status_pegawai', 'Status Pegawai', 'required');
            $this->form_validation->set_rules('status_covid', 'Status Covid-19', 'required');
            $this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
            $this->form_validation->set_rules('password', 'password', 'required');
            $this->form_validation->set_rules('id_satker', 'id_satker', 'required');
    
            if ($this->form_validation->run() == false) {
                $this->load->view('admin/header');
                $this->load->view('admin/tambah_pegawai');
                $this->load->view('admin/footer');
            } else {
                $this->Admin_model->tambahDataPegawai();
                $this->session->set_flashdata('flash', 'Data pegawai berhasil ditambahkan');
                redirect('admin/pegawai');
            }   

        }else {
            redirect('login');
        }

    }

    public function tambah_unit()
    {
        if (isset($_SESSION['admin'])){

            $this->form_validation->set_rules('id_satker', 'id_satker', 'required');
            $this->form_validation->set_rules('nama_satker', 'Nama Satker', 'required');

            if ($this->form_validation->run() == false) {
                $this->load->view('admin/header');
                $this->load->view('admin/tambah_unit');
                $this->load->view('admin/footer');
            } else {
                $this->Admin_model->tambahDataUnit();
                $this->session->set_flashdata('flash', 'Data Unit berhasil ditambahkan');
                redirect('admin/unit');
            }   

        }else {
            redirect('login');
        }

    }

    
    public function detail_pegawai($id)
    {
        if (isset($_SESSION['admin'])){

            //$data['judul'] = 'Detail Data Mahasiswa';
            $data['pegawai'] = $this->Admin_model->getSinglePegawai($id);
            $this->load->view('admin/header');
            $this->load->view('admin/detail_pegawai', $data);
            $this->load->view('admin/footer');

        }else {
            redirect('login');
        }
    }

    public function detail_unit($id)
    {
        if (isset($_SESSION['admin'])){

            //$data['judul'] = 'Detail Data Mahasiswa';
            $data['unit'] = $this->Admin_model->getSingleSatker($id);
            $this->load->view('admin/header');
            $this->load->view('admin/detail_unit', $data);
            $this->load->view('admin/footer');

        }else {
            redirect('login');
        }
    }

    public function ubah_pegawai($id)
    {
        if (isset($_SESSION['admin'])){

            //$data['judul'] = 'Form Ubah Data Mahasiswa';
            $data['pegawai'] = $this->Admin_model->getSinglePegawai($id);
    
            $this->form_validation->set_rules('id_pegawai', 'ID Pegawai', 'required');
            $this->form_validation->set_rules('nip', 'NIP', 'required');
            $this->form_validation->set_rules('nama_pegawai', 'Nama Pegawai', 'required');
            $this->form_validation->set_rules('status_pegawai', 'Status Pegawai', 'required');
            $this->form_validation->set_rules('status_covid', 'Status Covid-19', 'required');
            $this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
            $this->form_validation->set_rules('password', 'password', 'required');
            $this->form_validation->set_rules('id_satker', 'id_satker', 'required');
    
            if ($this->form_validation->run() == false) {
                $this->load->view('admin/header');
                $this->load->view('admin/ubah_pegawai', $data);
                $this->load->view('admin/footer');
            } else {
                $this->Admin_model->ubahDataPegawai();
                $this->session->set_flashdata('flash', 'Diubah');
                redirect('admin/pegawai');
            }

        }else {
            redirect('login');
        }
    }

    public function ubah_unit($id)
    {
        if (isset($_SESSION['admin'])){

            //$data['judul'] = 'Form Ubah Data Mahasiswa';
            $data['satker'] = $this->Admin_model->getSingleSatker($id);
    
            //$this->form_validation->set_rules('id_satker', 'id_satker', 'required');
            $this->form_validation->set_rules('nama_satker', 'Nama Satker', 'required');
    
            if ($this->form_validation->run() == false) {
                $this->load->view('admin/header');
                $this->load->view('admin/ubah_unit', $data);
                $this->load->view('admin/footer');
            } else {
                $this->Admin_model->ubahDataUnit();
                $this->session->set_flashdata('flash', 'Data unit berhasil diubah');
                redirect('admin/unit');
            }

        }else {
            redirect('login');
        }
    }

    public function hapus_pegawai($id)
    {
        if (isset($_SESSION['admin'])){
            $hapus = $this->Admin_model->hapusDataPegawai($id);
            $this->session->set_flashdata('flash', 'Data pegawai berhasil dihapus');
            redirect('admin/pegawai');

        }else {
            redirect('login');
        }
    }

    // public function login(){

    //     if( $this->input->post('username') &&  $this->input->post('password')) {
            
    //         $username = $this->input->post('username');
    //         $password = $this->input->post('password');
            
    //         if ($username == 'pa_larantuka2020' && $password == 'admin_pa_ltk'){
    //             $_SESSION['admin'] = 'admin_pa_ltk';
    //             redirect(site_url('admin')); 
    //         }else {
    //             //$this->session->set_flashdata('flash', 'Diubah');
    //             $this->session->set_flashdata('flash', 'username atau password salah');
    //             redirect(site_url('admin/login')); 
    //         }
	// 	}else {
	// 		$this->load->view('admin/login');
	// 	}
    // }

    // public function logout(){

    //     $this->session->sess_destroy();
    //     redirect('/');

    // }

    

}

?>