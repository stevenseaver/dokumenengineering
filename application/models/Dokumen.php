<?php

class Dokumen extends CI_Model {
    public function __construct(){
        $this->load->database();
    }

    public function load_data(){
        $query = $this->db->get('dokumen');  //ganti jadi dokumenrevisi kalo nanti ga jadi pdf saja
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

    public function update_analisisview($select1, $select2, $select3, $keterangan, $tanggal, $file)
    {
        $query = $this->db->get_where('analisis', array('Jenis_Produk'=>$select1, 'Nama_Produk'=>$select2, 'Jenis_Analisis'=>$select3));
        $temp = $query->row_array();
        $data = array(
            'Id' => $temp['Id'],
            'Keterangan' => $keterangan,
            'Tanggal' => $tanggal,
            'Nama_File' => $file
        );

        $this->db->replace('analisisview', $data);
    }

    public function delete_analisisview($id){
        $this->db->where('Id', $id);
        $this->db->delete($id);
    }

    public function get_directory($name){
        $query = $this->db->get_where('analisisview', array('Nama_File' => $name));
        $row = $query->row_array();

        $query = $this->db->get_where('analisis', array('Id' => $row['Id']));
        $result = $query->row_array();

        return $result;
    }

    public function get_directorydc($nama, $dokumen){
        $query = $this->db->get_where('dokumen', array('Nama_Produk' => $nama, 'Dokumen_Produk' => $dokumen));
        $result = $query->row_array();

        return $result;
    }

    public function update_dokumenrevisi($jenis_produk, $nama_produk, $jenis_dokumen, $status){
        $temp_jenis = urldecode($jenis_produk);
        $temp_nama = urldecode($nama_produk);
        $temp_dokumen = urldecode($jenis_dokumen);

        $this->db->set('Status', $status);
        $this->db->where('Jenis_Produk', $temp_jenis);
        $this->db->where('Nama_Produk', $temp_nama);
        $this->db->where('Dokumen_Produk', $temp_dokumen);
        $this->db->update('dokumenrevisi'); // gives UPDATE `mytable` SET `field` = 'field+1' WHERE `id` = 2
    }

    public function update_produk($jenis_produk, $nama_produk){
        $temp_jenis = urldecode($jenis_produk);
        $temp_nama = urldecode($nama_produk);

        $data = array( //jangan lupa tambah format nanti kalau udah fix
            array(
                'Jenis_Produk' => $temp_jenis,
                'Nama_Produk' => $temp_nama,
                'Dokumen_Produk' => 'SOP'
            ),
            array(
                'Jenis_Produk' => $temp_jenis,
                'Nama_Produk' => $temp_nama,
                'Dokumen_Produk' => 'Packing List'
            ),
            array(
                'Jenis_Produk' => $temp_jenis,
                'Nama_Produk' => $temp_nama,
                'Dokumen_Produk' => 'Manual Book Inggris'
            ),
            array(
                'Jenis_Produk' => $temp_jenis,
                'Nama_Produk' => $temp_nama,
                'Dokumen_Produk' => 'Manual Book Indonesia'
            ),
            array(
                'Jenis_Produk' => $temp_jenis,
                'Nama_Produk' => $temp_nama,
                'Dokumen_Produk' => 'LKP'
            ),
            array(
                'Jenis_Produk' => $temp_jenis,
                'Nama_Produk' => $temp_nama,
                'Dokumen_Produk' => 'IK BOM'
            ),
            array(
                'Jenis_Produk' => $temp_jenis,
                'Nama_Produk' => $temp_nama,
                'Dokumen_Produk' => 'IK Alat Kerja'
            ),
            array(
                'Jenis_Produk' => $temp_jenis,
                'Nama_Produk' => $temp_nama,
                'Dokumen_Produk' => 'IK Pengemasan'
            ),
            array(
                'Jenis_Produk' => $temp_jenis,
                'Nama_Produk' => $temp_nama,
                'Dokumen_Produk' => 'IK Perakitan'
            ),
            array(
                'Jenis_Produk' => $temp_jenis,
                'Nama_Produk' => $temp_nama,
                'Dokumen_Produk' => 'IK Pengujian'
            ),
            array(
                'Jenis_Produk' => $temp_jenis,
                'Nama_Produk' => $temp_nama,
                'Dokumen_Produk' => 'IK Perbaikan'
            ),
            array(
                'Jenis_Produk' => $temp_jenis,
                'Nama_Produk' => $temp_nama,
                'Dokumen_Produk' => 'Metode Kerja'
            ),
            array(
                'Jenis_Produk' => $temp_jenis,
                'Nama_Produk' => $temp_nama,
                'Dokumen_Produk' => 'Desain Brosur'
            ),
            array(
                'Jenis_Produk' => $temp_jenis,
                'Nama_Produk' => $temp_nama,
                'Dokumen_Produk' => 'Desain Kemasan'
            ),
            array(
                'Jenis_Produk' => $temp_jenis,
                'Nama_Produk' => $temp_nama,
                'Dokumen_Produk' => 'Desain Produk'
            ),
            array(
                'Jenis_Produk' => $temp_jenis,
                'Nama_Produk' => $temp_nama,
                'Dokumen_Produk' => 'Dokumen Standar'
            ),
            array(
                'Jenis_Produk' => $temp_jenis,
                'Nama_Produk' => $temp_nama,
                'Dokumen_Produk' => 'AKD'
            ),
            array(
                'Jenis_Produk' => $temp_jenis,
                'Nama_Produk' => $temp_nama,
                'Dokumen_Produk' => 'PPT'
            ),
            array(
                'Jenis_Produk' => $temp_jenis,
                'Nama_Produk' => $temp_nama,
                'Dokumen_Produk' => 'Video SOP' 
            )
        );

        $this->db->insert_batch('dokumen', $data);
    }
}