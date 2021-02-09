<?php

class Dokumen extends CI_Model {
    public function __construct(){
        $this->load->database();
    }

    public function load_data(){
        $query = $this->db->get('dokumen');
        return $query->result_array();
    }
}

class Analisis extends CI_Model {
    public function __construct(){
        $this->load->database();
    }

    public function load_data2(){
        $query = $this->db->get('analisis');
        return $query->result_array();
    }
}
