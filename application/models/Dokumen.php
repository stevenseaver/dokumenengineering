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
