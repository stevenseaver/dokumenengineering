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

    public function load_analisisview(){
        $query = $this->db->get('analisisview');
        return $query->result_array();
    }

    public function update_analisisview($select1, $select2, $select3, $keterangan, $file)
    {
        $query = $this->db->get_where('analisis', array('Jenis_Produk'=>$select1, 'Nama_Produk'=>$select2, 'Jenis_Analisis'=>$select3));
        $temp = $query->row_array();
        $data = array(
            'Id' => $temp['Id'],
            'Keterangan' => $keterangan,
            'Nama_File' => $file
        );

        $this->db->replace('analisisview', $data);
    }
}