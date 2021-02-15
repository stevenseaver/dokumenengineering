<?php

class Dokumen extends CI_Model {
    public function __construct(){
        $this->load->database();
    }

    public function load_data(){
        $query = $this->db->get('dokumen');
        return $query->result_array();
    }

    public function load_data2(){
        $query = $this->db->get('analisis');
        return $query->result_array();
    }

    public function get_analisis_id($id){
        $query = $this->db->get_where('analisis', array('Id' => $id));
        return $query->row_array();
    }

    public function load_datarevisi(){
        $query = $this->db->get('dokumenrevisi');
        return $query->result_array();
    }

    public function upload_analisis(){
        $keterangan = $this->intput->post('keterabgan');
        $data = array (
            'keterangan'=>$keterangan;
        );

        $this->db->insert('analisisview',$data);
    }
}