<?php

class Login extends CI_Controller{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Login_Model');
        $this->load->library('form_validation');
    }

    public function index(){


        
        if( $this->input->post('nip') &&  $this->input->post('password')) {

            $level =  $this->input->post('jenis_user');

            if ($level == 'pegawai'){
                $nip = $this->input->post('nip');
                $password = $this->input->post('password');
                
                $pegawai = $this->Login_Model->getSinglePegawai($nip, $password);


                // var_dump($pegawai);
                // die();
            
                if ($pegawai){
                    $_SESSION['nip'] = $nip;
                    $_SESSION['id_satker'] = $pegawai['id_satker'];
                    redirect(site_url('absen')); 
                }else {
                    //$this->session->set_flashdata('flash', 'Diubah');
                    //echo 'gagal';
                    //die();
                    $this->session->set_flashdata('gagal', 'username atau password salah');
                    redirect(site_url('login')); 
                }
            } else if ($level == 'admin'){
                $id_satker = $this->input->post('nip');
                $password = $this->input->post('password');
                
                $satker = $this->Login_Model->getSingleSatker($id_satker, $password);
            
                if ($satker){
                    $_SESSION['admin'] = $id_satker;
                    redirect(site_url('admin')); 
                }else {
                    //$this->session->set_flashdata('flash', 'Diubah');
                    $this->session->set_flashdata('gagal', 'username atau password salah');
                    redirect(site_url('login')); 
                }
            }
                
        }else {
            $this->load->view('login');
        }
    
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect('/');
    }

}

?>