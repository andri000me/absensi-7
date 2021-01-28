<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Absen extends CI_Controller{

	public function __construct()
    {
		parent::__construct();
		$this->load->library('datatables');
        $this->load->model('Absensi_model');
        $this->load->model('Admin_model');
		$this->load->library('form_validation');
		//$this->load->library('pdfgenerator');
		date_default_timezone_set("Asia/Makassar");
    }

    public function index()
	{
		if ($_SESSION['nip']){

			$data['pegawai'] = $this->Absensi_model->getSinglePegawai($_SESSION['nip']);
			
			$data['pekerjaan'] = $this->Absensi_model->getPekerjaan();

			$data['absen'] = $this->Absensi_model->getAbsen();

            $this->load->view('pegawai/header');
            $this->load->view('pegawai/index', $data);
            $this->load->view('pegawai/footer');

        }else {
            redirect('login');
        }
	}

	public function add_absen($lat = null, $long = null)
	{
		if ($_SESSION['nip']){

		if ($lat && $long){

			$jam = date('H:i');
			//$jam = date('07:02');

			$absen = $this->Absensi_model->getAbsen();

			if($jam > '07:00' && $jam <= '09:00')
			{

				if ($absen){
					$this->session->set_flashdata('salah', 'Anda telah Check In');
					redirect('absen');
				}else{
					$insert = $this->Absensi_model->checkinPegawai($lat, $long);
					if ($insert){
						$this->session->set_flashdata('flash', 'Berhasil Check In');
						redirect('absen');
					}else{
						$this->session->set_flashdata('salah', 'Terjadi Kesalahan Gagal Check In');
						redirect('absen');
					}
				}
            	
			} else if ($jam > '15:00' && $jam < '18:00'){

				if ($absen['waktu_keluar'] == '00:00:00'){
					$update = $this->Absensi_model->checkOutPegawai($lat, $long);

					if ($update){
						$this->session->set_flashdata('flash', 'Berhasil Check Out');
						redirect('absen');
					}else{
						$this->session->set_flashdata('salah', 'Mohon maaf, Anda tidak melakukan Absen Pagi.');
						redirect('absen');
					}
				} else {
					$this->session->set_flashdata('salah', 'Anda telah Check Out');
					redirect('absen');
				}

				
			} else {
				$this->session->set_flashdata('salah', 'Silahkan absen pada waktu yang ditentukan!');
				redirect('absen');
			}

		}else {
			$this->session->set_flashdata('salah', 'Anda tidak mengizinkan lokasi, absen ditolak!');
			redirect('absen');
		}

        }else {
            redirect('login');
        }
		
	}

	public function add_kerja($tgl = null, $bln = null)
	{
		if($_SESSION['nip'])
		{
			$add_tugas = $this->Absensi_model->addPekerjaan($tgl);

			if ($add_tugas)
			{
				$this->session->set_flashdata('flash', 'Berhasil Menambahakan Pekerjaan');
				if($tgl){
					redirect('absen/rekap_kinerja/'.$bln);
				}else {
					redirect('absen');
				}
			}else
			{
				$this->session->set_flashdata('salah', 'Terjadi Kesalahan, Silahkan Coba Lagi');
				if($tgl){
					redirect('absen/rekap_kinerja/'.$bln);
				}else {
					redirect('absen');
				}
			}

		}else 
		{
			redirect('login');
		}

	}

	public function add_new_absen($tgl = null, $bln = null)
	{
		if($_SESSION['nip'])
		{
			$add_absen = $this->Absensi_model->addNewAbsen($tgl);

			if ($add_absen)
			{
				$this->session->set_flashdata('flash', 'Berhasil Menambahakan Absen');
				if($tgl){
					redirect('absen/rekap_absen/'.$bln);
				}else {
					redirect('absen');
				}
			}else
			{
				$this->session->set_flashdata('salah', 'Terjadi Kesalahan, Silahkan Coba Lagi');
				if($tgl){
					redirect('absen/rekap_absen/'.$bln);
				}else {
					redirect('absen');
				}
			}

		}else 
		{
			redirect('login');
		}

	}

	public function add_absen_pulang($tgl = null, $bln = null)
	{
		if($_SESSION['nip'])
		{
			$add_absen = $this->Absensi_model->addAbsenPulang($tgl);

			if ($add_absen)
			{
				$this->session->set_flashdata('flash', 'Berhasil Menambahakan Absen Pulang');
				if($tgl){
					redirect('absen/rekap_absen/'.$bln);
				}else {
					redirect('absen');
				}
			}else
			{
				$this->session->set_flashdata('salah', 'Terjadi Kesalahan, Silahkan Coba Lagi');
				if($tgl){
					redirect('absen/rekap_absen/'.$bln);
				}else {
					redirect('absen');
				}
			}

		}else 
		{
			redirect('login');
		}

	}

	public function rekap_absen($bln = null)
	{
        if ($_SESSION['nip']){

            //$data['satker'] = $this->Absensi_model->getSingleSatker($_SESSION['admin']);

			$data['pegawai'] = $this->Absensi_model->getSinglePegawai($_SESSION['nip']);
			
			if ($this->input->post('bulan')){
                $bulan = $this->input->post('bulan');
            }else if ($bln) {
				$bulan = $bln;
			}else {
                $bulan = date('m');

			}

			$data['bulan'] = $bulan;

            //var_dump($data);

            //die();

            $this->load->view('pegawai/header');
            $this->load->view('pegawai/rekap_absen', $data);
            $this->load->view('pegawai/footer');

        }else {
            redirect('login');
        }
	}
	
	public function cetak_rekap_absen($nip, $bln)
	{
        if ($_SESSION['nip']){

            //$data['satker'] = $this->Absensi_model->getSingleSatker($_SESSION['admin']);

			$data['pegawai'] = $this->Absensi_model->getSinglePegawai($nip);

			$pegawai = $data['pegawai'];

			$data['satker'] = $this->Absensi_model->getSingleSatker($pegawai['id_satker']);

			$satker = $data['satker'];

			$data['pimpinan'] = $this->Absensi_model->getSinglePegawaiByID($satker['pimpinan_satker']);

			$pimpinan = $data['pimpinan'];

			if ($pimpinan['nip'] == $pegawai['nip']){
				$data['satker_induk'] = $this->Absensi_model->getSingleSatker($satker['id_satker_induk']);

				$satker_induk = $data['satker_induk'];

				$data['pimpinan'] = $this->Absensi_model->getSinglePegawaiByID($satker_induk['pimpinan_satker']);

				$pimpinan = $data['pimpinan'];
			}
			
			if ($bln) {
				$bulan = $bln;
			}else {
                $bulan = date('m');
			}

            $data['bulan'] = $bulan;

            //var_dump($data);

            //die();
            $this->load->view('pegawai/cetak_rekap_absen', $data);
            $this->load->view('pegawai/footer');

        }else {
            redirect('login');
        }
	}
	
	public function rekap_kinerja($bln = null, $thn=null)
	{
        if ($_SESSION['nip']){

            //$data['satker'] = $this->Admin_model->getSingleSatker($_SESSION['admin']);

			$data['pegawai'] = $this->Absensi_model->getSinglePegawai($_SESSION['nip']);
			
			if ($this->input->post('bulan')){
                $bulan = $this->input->post('bulan');
                $tahun = $this->input->post('tahun');
            }else if ($bln) {
				$bulan = $bln;
				$tahun = $thn;
			}else {
                $bulan = date('m');
                $tahun = date('Y');

			}

            $data['bulan'] = $bulan;
            $data['tahun'] = $tahun;

            //var_dump($data);

            //die();

            $this->load->view('pegawai/header');
            $this->load->view('pegawai/rekap_kinerja', $data);
            $this->load->view('pegawai/footer');

        }else {
            redirect('login');
        }

	}

	public function rekap_kinerja_unit()
	{
        if ($_SESSION['nip']){

            if ($this->input->post('bulan')){
                $bulan = $this->input->post('bulan');
            }else {
                $bulan = date('m');
            }

            $data['bulan'] = $bulan;

            $data['satker'] = $this->Admin_model->getSingleSatker($_SESSION['id_satker']);

            $data['pegawai'] = $this->Admin_model->getPegawaiSatker($_SESSION['id_satker']);

            //var_dump($data);

            //die();

            $this->load->view('pegawai/header');
            $this->load->view('pegawai/rekap_kinerja_unit', $data);
            $this->load->view('pegawai/footer');

        }else {
            redirect('login');
        }

	}
	
	public function detail_kinerja_pegawai($nip = null)
	{
        if ($_SESSION['nip']){

            $data['satker'] = $this->Admin_model->getSingleSatker($_SESSION['id_satker']);

			$data['pegawai'] = $this->Admin_model->getSinglePegawai($nip);
			
			if ($this->input->post('bulan')){
                $bulan = $this->input->post('bulan');
            }else {
                $bulan = date('m');
			}

            $data['bulan'] = $bulan;


            //var_dump($data);

            //die();

            $this->load->view('pegawai/header');
            $this->load->view('pegawai/detail_kinerja_pegawai', $data);
            $this->load->view('pegawai/footer');

        }else {
            redirect('login');
        }

    }
	
	public function edit_kerja($id, $sender){

		if ($_SESSION['nip']){

            $ubah = $this->Absensi_model->ubahPekerjaan($id);
			
			if ($ubah){
				$this->session->set_flashdata('flash', 'data pekerjaan berhasil diubah');
				if($sender == 1){
					redirect('absen/rekap_kinerja');
				}else {
					redirect('absen');
				}
			}else {
				$this->session->set_flashdata('salah', 'Terjadi Kesalahan, Silahkan Coba Lagi');
				if($sender == 1){
					redirect('absen/rekap_kinerja');
				}else {
					redirect('absen');
				}
			}
			
			

        }else {
            redirect('login');
        }

	}
	// public function edit_kerja($id, $tgl = null){

	// 	if ($_SESSION['nip']){

	// 		$data['pegawai'] = $this->Absensi_model->getSinglePegawai($_SESSION['nip']);

	// 		$data['absen'] = $this->Absensi_model->getAbsen();

	// 		$data['pekerjaan'] = $this->Absensi_model->getSinglePekerjaan($id);
    
    //         $this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'required');
    
    //         if ($this->form_validation->run() == false) {
    //             $this->load->view('pegawai/header');
    //             $this->load->view('pegawai/ubah_pekerjaan', $data);
    //             $this->load->view('pegawai/footer');
    //         } else {
    //             $this->Absensi_model->ubahPekerjaan($id);
    //             $this->session->set_flashdata('flash', 'data pekerjaan berhasil diubah');
    //             redirect('absen');
    //         }

    //     }else {
    //         redirect('login');
    //     }

	// }

	public function hapus_pekerjaan($id)
	{
		if ($_SESSION['nip']){

			$this->Absensi_model->hapusDataPekerjaan($id);
			$this->session->set_flashdata('flash', 'data pekerjaan berhasil dihapus');
			redirect('absen');
			
        }else {
            redirect('login');
        }
		

	}

	public function profile()
	{
		if ($_SESSION['nip']){

			$data['pegawai'] = $this->Absensi_model->getSinglePegawai($_SESSION['nip']);
    
            $this->form_validation->set_rules('nip', 'NIP', 'required');
            $this->form_validation->set_rules('nama_pegawai', 'Nama Pegawai', 'required');
            $this->form_validation->set_rules('status_pegawai', 'Status Pegawai', 'required');
            $this->form_validation->set_rules('status_covid', 'Status Covid-19', 'required');
            $this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
            $this->form_validation->set_rules('password', 'password', 'required');
            $this->form_validation->set_rules('id_satker', 'id_satker', 'required');
    
            if ($this->form_validation->run() == false) {
                $this->load->view('pegawai/header');
                $this->load->view('pegawai/ubah_pegawai', $data);
                $this->load->view('pegawai/footer');
            } else {
                $this->Absensi_model->ubahDataPegawai();
                $this->session->set_flashdata('flash', 'data Pegawai berhasil diubah');
                redirect('absen/profile');
            }
			
        }else {
            redirect('login');
        }
		

	}

	public function cetak_kinerja($nip, $bln){

		if (isset($_SESSION['nip']) || isset($_SESSION['admin'])){
			
			$data['pegawai'] = $this->Absensi_model->getSinglePegawai($nip);

			$pegawai = $data['pegawai'];

			$data['satker'] = $this->Absensi_model->getSingleSatker($pegawai['id_satker']);

			$satker = $data['satker'];

			$data['pimpinan'] = $this->Absensi_model->getSinglePegawaiByID($satker['pimpinan_satker']);

			$pimpinan = $data['pimpinan'];

			if ($pimpinan['nip'] == $pegawai['nip']){
				$data['satker_induk'] = $this->Absensi_model->getSingleSatker($satker['id_satker_induk']);

				$satker_induk = $data['satker_induk'];

				$data['pimpinan'] = $this->Absensi_model->getSinglePegawaiByID($satker_induk['pimpinan_satker']);

				$pimpinan = $data['pimpinan'];
			}
			
			if ($bln) {
				$bulan = $bln;
			}else {
                $bulan = date('m');
			}

            $data['bulan'] = $bulan;

            //var_dump($data);

            //die();
            $this->load->view('pegawai/cetak_kinerja', $data);
            $this->load->view('pegawai/footer');
		}else {
			redirect('login');
		}
	}

	public function cetak_kinerja_pdf($nip, $bln, $thn){

		if (isset($_SESSION['nip']) || isset($_SESSION['admin'])){
			
			$data['pegawai'] = $this->Absensi_model->getSinglePegawai($nip);

			$pegawai = $data['pegawai'];

			$data['satker'] = $this->Absensi_model->getSingleSatker($pegawai['id_satker']);

			$satker = $data['satker'];

			$data['pimpinan'] = $this->Absensi_model->getSinglePegawaiByID($satker['pimpinan_satker']);

			$pimpinan = $data['pimpinan'];

			if ($pimpinan['nip'] == $pegawai['nip']){
				$data['satker_induk'] = $this->Absensi_model->getSingleSatker($satker['id_satker_induk']);

				$satker_induk = $data['satker_induk'];

				$data['pimpinan'] = $this->Absensi_model->getSinglePegawaiByID($satker_induk['pimpinan_satker']);

				$pimpinan = $data['pimpinan'];
			}
			
			if ($bln) {
				$bulan = $bln;
				$tahun = $thn;
			}else {
                $bulan = date('m');
                $tahun = date('Y');
			}

            $data['bulan'] = $bulan;
            $data['tahun'] = $tahun;

            //var_dump($data);

            //die();

			$html =  $this->load->view('pegawai/cetak_kinerja', $data);
			
			//$this->pdfgenerator->generate($html,'LapKin-'.$pegawai['nama_pegawai'].'.pdf');

			// $html = ob_get_contents();
			// ob_end_clean();
			
			// require_once('./assets/html2pdf/html2pdf.class.php');
			// $pdf = new HTML2PDF('P','A4','en');
			// $pdf->WriteHTML($html);
			// $pdf->Output('LapKin-'.$pegawai['nama_pegawai'].'.pdf', 'D');
			

		}else {
			redirect('login');
		}
	}

	public function cetak_kinerja_tgl($nip){

		if (isset($_SESSION['nip']) || isset($_SESSION['admin'])){

			$org_tgl_awal = $this->input->post('tgl_awal', true);
			$org_tgl_akhir = $this->input->post('tgl_akhir', true);
			
			  
			$tgl_awal = str_replace('/"', '-', $org_tgl_awal);  
			$tgl_akhir = str_replace('/"', '-', $org_tgl_akhir);

			//$newDate = date("Y/m/d", strtotime($date)); 

			//echo "New date format is: ".$newDate. " (YYYY/MM/DD)";  

			$data['tgl_awal'] = date("Y-m-d",strtotime($tgl_awal));
			$data['tgl_akhir'] = date("Y-m-d", strtotime($tgl_akhir));
			
			$data['pegawai'] = $this->Absensi_model->getSinglePegawai($nip);

			$pegawai = $data['pegawai'];

			$data['satker'] = $this->Absensi_model->getSingleSatker($pegawai['id_satker']);

			$satker = $data['satker'];

			$data['pimpinan'] = $this->Absensi_model->getSinglePegawaiByID($satker['pimpinan_satker']);

			$pimpinan = $data['pimpinan'];

			if ($pimpinan['nip'] == $pegawai['nip']){
				$data['satker_induk'] = $this->Absensi_model->getSingleSatker($satker['id_satker_induk']);

				$satker_induk = $data['satker_induk'];

				$data['pimpinan'] = $this->Absensi_model->getSinglePegawaiByID($satker_induk['pimpinan_satker']);

				$pimpinan = $data['pimpinan'];
			}

            //var_dump($data);

            //die();
            $this->load->view('pegawai/cetak_kinerja_tgl', $data);
            $this->load->view('pegawai/footer');
		}else {
			redirect('login');
		}

	}

	public function cetak_kinerja_tgl_pdf($nip){

		if (isset($_SESSION['nip']) || isset($_SESSION['admin'])){

			ob_start();

			$org_tgl_awal = $this->input->post('tgl_awal', true);
			$org_tgl_akhir = $this->input->post('tgl_akhir', true);
			
			  
			$tgl_awal = str_replace('/"', '-', $org_tgl_awal);  
			$tgl_akhir = str_replace('/"', '-', $org_tgl_akhir);

			//$newDate = date("Y/m/d", strtotime($date)); 

			//echo "New date format is: ".$newDate. " (YYYY/MM/DD)";  

			$data['tgl_awal'] = date("Y-m-d",strtotime($tgl_awal));
			$data['tgl_akhir'] = date("Y-m-d", strtotime($tgl_akhir));
			
			$data['pegawai'] = $this->Absensi_model->getSinglePegawai($nip);

			$pegawai = $data['pegawai'];

			$data['satker'] = $this->Absensi_model->getSingleSatker($pegawai['id_satker']);

			$satker = $data['satker'];

			$data['pimpinan'] = $this->Absensi_model->getSinglePegawaiByID($satker['pimpinan_satker']);

			$pimpinan = $data['pimpinan'];

			if ($pimpinan['nip'] == $pegawai['nip']){
				$data['satker_induk'] = $this->Absensi_model->getSingleSatker($satker['id_satker_induk']);

				$satker_induk = $data['satker_induk'];

				$data['pimpinan'] = $this->Absensi_model->getSinglePegawaiByID($satker_induk['pimpinan_satker']);

				$pimpinan = $data['pimpinan'];
			}

            //var_dump($data);

            //die();
            $this->load->view('pegawai/cetak_kinerja_tgl', $data);
			$this->load->view('pegawai/footer');
			
			$html = ob_get_contents();
			ob_end_clean();
			
			require_once(base_url().'assets/html2pdf/html2pdf.class.php');
			$pdf = new HTML2PDF('P','A4','en');
			$pdf->WriteHTML($html);
			$pdf->Output('LapKin-'.$pegawai['nama_pegawai'].'.pdf', 'D');
			
		}else {
			redirect('login');
		}

	}

	


	public function json()
	{
		$this->datatables->select('tgl_aktivitas, jam_mulai, isi_aktivitas');
		$this->datatables->from('tbl_aktivitas');
		
		$result = $this->datatables->generate('json', 'ISO-8859-1');
		
        return print_r($result);
	}

}

?>