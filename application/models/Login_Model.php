
<?php 

class Login_model extends CI_model {

    public function getSinglePegawai($nip, $password)
    {   
        $this->db->where(['nip' => $nip, 'password' => $password]);
        return $this->db->get('tbl_pegawai')->row_array();
    }

    public function getSingleSatker($id_satker, $password)
    {   
        $this->db->where(['id_satker' => $id_satker, 'password' => $password]);
        return $this->db->get('tbl_satker')->row_array();
    }
    
}

?>