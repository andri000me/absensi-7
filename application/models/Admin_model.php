
<?php 

class Admin_model extends CI_model {

    public function getSinglePegawai($nip)
    {   
        $this->db->where('nip',$nip);
        return $this->db->get('tbl_pegawai')->row_array();
    }

    public function getSinglePegawaiById($id_pegawai)
    {   
        $this->db->where('id_pegawai',$id_pegawai);
        return $this->db->get('tbl_pegawai')->row_array();
    }

    public function getSingleSatker($id_satker)
    {   
        //  echo $id_satker;
        //die();
        $this->db->where('id_satker', $id_satker);
        return $this->db->get('tbl_satker')->row_array();
    }

    public function getDataSatker($id_satker)
    {   
        $this->db->like('id_satker', $id_satker, 'after');
        return $this->db->get('tbl_satker')->result_array();
    }

    public function getDataSatkerKabKota($id_satker)
    {   
        $this->db->like('id_satker', 'kk.19', 'after');
        return $this->db->get('tbl_satker')->result_array();
    }

    public function getDataSatkerKua($id_satker)
    {   
        $this->db->like('id_satker', 'kua.19', 'after');
        return $this->db->get('tbl_satker')->result_array();
    }

    public function getPegawaiSatker($id_satker)
    {   
        $this->db->like('id_satker', $id_satker, 'after');
        $this->db->order_by('id_satker' , 'asc');
        return $this->db->get('tbl_pegawai')->result_array();
    }
    
    public function getPekerjaan()
    {   
        $this->db->where(['nip' => $_SESSION['nip'], 'tgl_aktivitas' => date('Y-m-d')]);
        return $this->db->get('tbl_aktivitas')->result_array();
    }

    public function getAbsen()
    {   
        $this->db->where(['nip' => $_SESSION['nip'], 'tgl_absen' => date('Y-m-d')]);
        return $this->db->get('tbl_absensi')->row_array();
    }

    public function getAbsenPegawai($tgl)
    {   
        $sql = "SELECT ts.nama_satker, ta.* ,tp.nama_pegawai  FROM `tbl_absensi` as ta, `tbl_pegawai` as tp, `tbl_satker` as ts WHERE ts.id_satker LIKE '".$_SESSION['admin']."%' && ta.`tgl_absen` = '". $tgl ."' && tp.nip = ta.nip && ts.id_satker = tp.id_satker";
        // $sql = "SELECT tp.nama_pegawai, ta.* , ts.nama_satker FROM `tbl_absensi` as ta, `tbl_pegawai` as tp, `tbl_satker` as ts WHERE ta.`tgl_absen` = '" .$tgl. "' && tp.nip = ta.nip && ts.id_satker = '". $_SESSION['admin']."'";

        $query = $this->db->query($sql);

        $result = $query->result_array();

        return $result;
    }



    public function checkInPegawai(){

        $data = [
            "nip" => $_SESSION['nip'],
            "tgl_absen" => date('Y-m-d'),
            "waktu_masuk" => date("H:i")
        ];

        return $this->db->insert('tbl_absensi', $data);
    }

    public function checkOutPegawai(){
        $nip = $_SESSION['nip'];
        $tanggal = date('Y-m-d');
        $data = [
            "waktu_keluar" => date("H:i")
        ];

        $this->db->where(["nip" => $nip, "tgl_absen" => $tanggal]);
        return $this->db->update('tbl_absensi' , $data);
    }

    public function addPekerjaan(){
        $data = [
            "nip" => $_SESSION['nip'],
            "tgl_aktivitas" => date('Y-m-d'),
            "jam_mulai" => $this->input->post('start_h', true).":".$this->input->post('start_m', true),
            "jam_selesai" => $this->input->post('end_h', true).":".$this->input->post('end_m', true),
            "isi_aktivitas" => $this->input->post('pekerjaan', true),
            "waktu_input" => date("H:i"),
            "lokasi_input" => ""
        ];

        return $this->db->insert('tbl_aktivitas', $data);
    }

    public function tambahDataPegawai()
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

        $this->db->insert('tbl_pegawai', $data);
    }

    public function tambahDataUnit()
    {
        $data = [
            "id_satker" => $this->input->post('id_satker', true),
            "nama_satker" => $this->input->post('nama_satker', true),
            "level_satker" => $this->input->post('level_satker', true),
            "id_satker_induk" => $this->input->post('id_satker_induk', true),
            "password" => $this->input->post('password', true)
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

        $this->db->insert('tbl_satker', $data);
    }

    public function hapusDataPegawai($id)
    {
        // $this->db->where('id', $id);
        
        $hapus = $this->db->delete('tbl_pegawai', ['id_pegawai' => $id]);
        return $hapus;
    }

    public function getAktaceraiById($id)
    {
        return $this->db->get_where('data_cerai', ['no_urut' => $id])->row_array();
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

    public function ubahDataUnit()
    {
        $data = [
            "nama_satker" => $this->input->post('nama_satker', true),
            "level_satker" => $this->input->post('level_satker', true),
            "id_satker_induk" => $this->input->post('satker_induk', true),
            "pimpinan_satker" => $this->input->post('pimpinan_satker', true),
            "password" => $this->input->post('password', true)
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

        $this->db->where('id_satker', $this->input->post('id_satker_awal'));
        $this->db->update('tbl_satker', $data);
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