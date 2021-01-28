
<?php 

class Absensi_model extends CI_model {

    public function getSinglePegawai($nip)
    {   
        $this->db->where('nip', $nip);
        return $this->db->get('tbl_pegawai')->row_array();
    }

    public function getSinglePegawaiByID($id)
    {   
        $this->db->where('id_pegawai', $id);
        return $this->db->get('tbl_pegawai')->row_array();
    }

    public function getSingleSatker($id_satker)
    {   
        //  echo $id_satker;
        //die();
        $this->db->where('id_satker', $id_satker);
        return $this->db->get('tbl_satker')->row_array();
    }
    
    public function getSinglePekerjaan($id)
    {   
        $this->db->where('id_aktivitas' , $id);
        return $this->db->get('tbl_aktivitas')->row_array();
    }

    public function getPekerjaan()
    {   
        $this->db->where(['nip' => $_SESSION['nip'], 'tgl_aktivitas' => date('Y-m-d')]);
        $this->db->order_by('jam_mulai', 'ASC');
        return $this->db->get('tbl_aktivitas')->result_array();
    }

    public function getAbsen()
    {   
        $this->db->where(['nip' => $_SESSION['nip'], 'tgl_absen' => date('Y-m-d')]);
        return $this->db->get('tbl_absensi')->row_array();
    }



    public function checkInPegawai($lat, $long){

        $data = [
            "nip" => $_SESSION['nip'],
            "tgl_absen" => date('Y-m-d'),
            "waktu_masuk" => date("H:i"),
            "lat_masuk" => $lat,
            "long_masuk" => $long
        ];

        return $this->db->insert('tbl_absensi', $data);
    }

    public function checkOutPegawai($lat, $long){
        $nip = $_SESSION['nip'];
        $tanggal = date('Y-m-d');
        $data = [
            "waktu_keluar" => date("H:i"),
            "lat_keluar" => $lat,
            "long_keluar" => $long
        ];

        $this->db->where(["nip" => $nip, "tgl_absen" => $tanggal]);
        return $this->db->update('tbl_absensi' , $data);
    }

    public function addPekerjaan($tgl){
        if (!$tgl){
            $tgl = date('Y-m-d');
        }
        $data = [
            "nip" => $_SESSION['nip'],
            "tgl_aktivitas" => $tgl,
            "jam_mulai" => $this->input->post('start_h', true).":".$this->input->post('start_m', true),
            "jam_selesai" => $this->input->post('end_h', true).":".$this->input->post('end_m', true),
            "isi_aktivitas" => $this->input->post('pekerjaan', true),
            "waktu_input" => date("H:i"),
            "lokasi_input" => ""
        ];

        return $this->db->insert('tbl_aktivitas', $data);
    }

    public function addNewAbsen($tgl){
        if (!$tgl){
            $tgl = date('Y-m-d');
        }
        $data = [
            "nip" => $_SESSION['nip'],
            "tgl_absen" => $tgl,
            "waktu_masuk" => $this->input->post('jam_masuk', true).":".$this->input->post('menit_masuk', true),
            "waktu_keluar" => $this->input->post('jam_keluar', true).":".$this->input->post('menit_keluar', true)
        ];

        return $this->db->insert('tbl_absensi', $data);
    }

    public function addAbsenPulang($tgl){
        if (!$tgl){
            $tgl = date('Y-m-d');
        }
        $data = [
            //"nip" => $_SESSION['nip'],
            //"tgl_absen" => $tgl,
            //"waktu_masuk" => $this->input->post('jam_masuk', true).":".$this->input->post('menit_masuk', true),
            "waktu_keluar" => $this->input->post('jam_keluar', true).":".$this->input->post('menit_keluar', true)
        ];
        $this->db->where(["nip" => $_SESSION['nip'], "tgl_absen" => $tgl]);
        return $this->db->update('tbl_absensi' , $data);
    }

    public function ubahPekerjaan($id){
        $data = [
            "nip" => $_SESSION['nip'],
            "jam_mulai" => $this->input->post('start_h', true).":".$this->input->post('start_m', true),
            "jam_selesai" => $this->input->post('end_h', true).":".$this->input->post('end_m', true),
            "isi_aktivitas" => $this->input->post('pekerjaan', true),
            "waktu_input" => date("H:i"),
            "lokasi_input" => ""
        ];

        $this->db->where('id_aktivitas' , $id);
        return $this->db->update('tbl_aktivitas', $data);
    }

    public function hapusDataPekerjaan($id)
    {
        // $this->db->where('id', $id);
        $this->db->delete('tbl_aktivitas', ['id_aktivitas' => $id]);
    }

    public function ubahDataPegawai()
    {
        $data = [
            "nip" => $this->input->post('nip', true),
            "nama_pegawai" => $this->input->post('nama_pegawai', true),
            "status_pegawai" => $this->input->post('status_pegawai', true),
            "jabatan" => $this->input->post('jabatan', true),
            "id_satker" => $this->input->post('id_satker', true),
            "password" => $this->input->post('password', true),
            "grade_tukin" => $this->input->post('grade_tukin', true),
            "golongan" => $this->input->post('golongan', true),
            "status_covid" => $this->input->post('status_covid', true),
            "foto_profil" => "logo_kemenag.png"
        ];

            // $config['upload_path'] = './uploads/';
            // $config['allowed_types'] = 'pdf';
            // $config['max_size'] = 50000;

            // $this->load->library('upload', $config);

            // if (!$this->upload->do_upload('file_akta')) {
            //     echo $this->upload->display_errors();
            // } else {
            //     $data['nama_file'] = $this->upload->data()['file_name'];
            // }

        $this->db->where('id_pegawai', $this->input->post('id_pegawai'));
        $this->db->update('tbl_pegawai', $data);
    }

    public function getKinerja($user, $bulan){
        $this->db->select('a.nip, a.tgl_aktivitas, a.jam_mulai, a.jam_selesai, a.isi_aktivitas, a.waktu_input');
            $this->db->from('tbl_aktivitas a'); 
            $this->db->where('a.nip', $user);
            $this->db->like('a.tgl_aktivitas', $bulan);
            $query = $this->db->get(); 
            if($query->num_rows() != 0)
            {
                return $query->result_array();
            }
            else
            {
                return false;
            }
    }

    public function getAllKinerja(){
        $this->db->select("*");
            $this->db->from("tbl_aktivitas");
            return $this->db->get()->result_array();
    }



    public function tambahDataAktacerai()
    {
        $data = [
            "no_akta" => $this->input->post('no_akta', true),
            "tgl_putusan" => $this->input->post('tgl_putusan', true),
            "no_penetapan" => $this->input->post('no_penetapan', true),
            "nama_suami" => $this->input->post('nama_suami', true),
            "nama_istri" => $this->input->post('nama_istri', true)
        ];

            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'pdf';
            $config['max_size'] = 50000;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('file_akta')) {
                echo $this->upload->display_errors();
            } else {
                $data['nama_file'] = $this->upload->data()['file_name'];
            }

        $this->db->insert('data_cerai', $data);
    }

    public function hapusDataAktacerai($id)
    {
        // $this->db->where('id', $id);
        $this->db->delete('data_cerai', ['no_urut' => $id]);
    }

    public function getAktaceraiById($id)
    {
        return $this->db->get_where('data_cerai', ['no_urut' => $id])->row_array();
    }

    public function ubahDataAktacerai()
    {
        $data = [
            "no_akta" => $this->input->post('no_akta', true),
            "tgl_putusan" => $this->input->post('tgl_putusan', true),
            "no_penetapan" => $this->input->post('no_penetapan', true),
            "nama_suami" => $this->input->post('nama_suami', true),
            "nama_istri" => $this->input->post('nama_istri', true)
        ];

            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'pdf';
            $config['max_size'] = 50000;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('file_akta')) {
                echo $this->upload->display_errors();
            } else {
                $data['nama_file'] = $this->upload->data()['file_name'];
            }

        $this->db->where('no_urut', $this->input->post('no_urut'));
        $this->db->update('data_cerai', $data);
    }

    public function cariDataAktacerai()
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->like('no_akta', $keyword);
        $this->db->or_like('tgl_putusan', $keyword);
        $this->db->or_like('no_penetapan', $keyword);
        $this->db->or_like('nama_suami', $keyword);
        $this->db->or_like('nama_istri', $keyword);
        return $this->db->get('data_cerai')->result_array();
    }

    public function cariAktacerai()
    {
        $tgl_putusan = $this->input->post('tgl_putusan', true);
        $no_penetapan = $this->input->post('no_penetapan', true);
        $this->db->where(['tgl_putusan' => $tgl_putusan , 'no_penetapan' => $no_penetapan]);
        return $this->db->get('data_cerai')->result_array();
    }
}