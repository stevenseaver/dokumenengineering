<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
        $this->load->model('dokumen');
        $this->load->helper(array('form', 'url'));
    }

	public function main(){  //LOAD MAIN PAGE UNTUK VIEW DOKUMEN FIX YANG LIVE
        $data['title'] = "Home"; 
        $data['viewData'] = $this->dokumen->load_data();
        $this->load->view('header', $data);
		$this->load->view('main', $data);
    }

    public function upload($error_msg = array('error'=>' ')){  //LOAD PAGE UPLOAD DOKUMEN FIX
        $data['title'] = "Upload Revisi"; 
        $data['viewData'] = $this->dokumen->load_data();
        $this->load->view('header', $data);
        $this->load->view('upload',$error_msg);
    }

    public function do_upload() {  //UNTUK UPLOAD DOKUMEN FIX {LIBRARY DR CI}
        $select1 = $this->input->post('select1');
        $select2 = $this->input->post('select2');
        $select3 = $this->input->post('select3');

        $config['allowed_types']  = 'pdf|mp4|jpg|png';
        $config['max_size']       = 10000;
        $config['upload_path']    = "./Asset/Live/{$select1}/{$select2}/";
        $config['file_name']  = "{$select3}"."_"."{$select2}";
        $config['overwrite']  = TRUE;
        $config['remove_spaces']  = FALSE;

        $this->load->library('upload', $config);

        if(!is_dir($config['upload_path']))
            mkdir($config['upload_path'], 0777, TRUE);
            
        if (!$this->upload->do_upload('userfile'))
        {
                $error = array('error' => $this->upload->display_errors());
                $data['title'] = "Upload Revisi"; 
                $data['viewData'] = $this->dokumen->load_data();
                $this->load->view('header',$data);
                $this->load->view('upload',$error);
        }
        else
        {
                $data = array('upload_data' => $this->upload->data());
                $data['viewData'] = $this->dokumen->load_data();  
                $this->load->view('header',$data);
                $this->load->view('upload_success', $data);
        }
    }

    public function uploadrevisi($error_msg = array('error'=>' ')){  //UNTUK LOAD PAGE UPLOAD DOKUMEN REVISI
        $data['title'] = "Dokumen Revisi"; 
        $data['viewData'] = $this->dokumen->load_data();
        $this->load->view('header', $data);
		$this->load->view('uploadrevisi', $error_msg);
    }

    public function do_upload_revisi() { //UNTUK UPLOAD DOKUMEN REVISI {LIBRARY DR CI}
        $select1 = $this->input->post('select1');
        $select2 = $this->input->post('select2');
        $select3 = $this->input->post('select3');

        $config['allowed_types']  = 'docx|xlsx|jpg|png|mp4|pptx';
        $config['max_size']       = 100000;
        $config['upload_path']    = "./Asset/Revisi/{$select1}/{$select2}/";
        $config['file_name']  = "{$select3}"."_"."{$select2}";
        $config['overwrite']  = TRUE;
        $config['remove_spaces']  = FALSE;

        $this->load->library('upload', $config);

        if(!is_dir($config['upload_path']))
            mkdir($config['upload_path'], 0777, TRUE);
            
        if ( ! $this->upload->do_upload('userfile'))
        {
            $error = array('error' => $this->upload->display_errors());
            $data['title'] = "Upload Revisi"; 
            $data['viewData'] = $this->dokumen->load_data();
            $this->load->view('header', $data);
            $this->load->view('uploadrevisi',$error);
        }
        else
        {
            $this->dokumen->update_dokumenrevisi($select1, $select2, $select3," ");
            $data = array('upload_data' => $this->upload->data());
            $data['viewData'] = $this->dokumen->load_data(); 
            $this->load->view('header',$data);
            $this->load->view('uploadrevisi_success', $data);
        }
    }
    //UNTUK LOAD PAGE LIST DOKUMEN YANG REVISI YANG SUDAH UPLOAD
    public function dokumenrevisi(){  
        $data['title'] = "Dokumen Revisi"; 
        $data['viewData'] = $this->dokumen->load_datarevisi();
        $this->load->view('header', $data);
		$this->load->view('dokumenrevisi', $data);
    }

    //untuk load page super user
    public function superview(){
        $data['title'] = "View Revisi"; 
        $data['viewData'] = $this->dokumen->load_datarevisi(); 
        $this->load->view('header', $data);
		$this->load->view('superview', $data);
    }

    public function accdatabase($select1, $select2, $select3, $status){
        $this->dokumen->update_dokumenrevisi($select1, $select2, $select3, $status);
        $data['title'] = "View Revisi"; 
        $data['viewData'] = $this->dokumen->load_datarevisi(); 
        $this->load->view('header', $data);
		$this->load->view('superview', $data);
    }

    public function analisis(){   //UNTUK LOAD PAGE ANALISIS YANG ISINYA HOMEPAGE
        $data['title'] = "Analisis";
        $data['viewData'] = $this->dokumen->load_data2();  
        $this->load->view('header', $data);
        $this->load->view('analisis',$data);  
    }
    //UNTUK LOAD PAGE ANALISIS YANG ISINYA LIST DOKUMEN ANALISIS YANG ADA PER DOKUMEN
    public function analisis_view($id){  
        $data['title'] = "Daftar Analisis";
        $data['viewData'] = $this->dokumen->get_analisis_id($id);  
        $data['viewListAnalisis'] = $this->dokumen->load_analisisview();
        $this->load->view('header', $data);
        $this->load->view('analisis_view',$data);  
    }
    //untuk upload dokumen analisis
    public function uploadanalisis($error_msg = array('error'=>' ')){  //UNTUK LOAD PAGE UPLOAD DOKUMEN REVISI
        $data['title'] = "Dokumen Revisi"; 
        $data['viewData'] = $this->dokumen->load_data();
        $data['viewDataAnalisis'] = $this->dokumen->load_data2(); 
        $this->load->view('header', $data);
		$this->load->view('uploadanalisis', $error_msg);
    }
    //library upload dokumen analisis
    public function do_upload_analisis() { //UNTUK UPLOAD DOKUMEN ANALISIS {LIBRARY DR CI}
        $select1 = $this->input->post('select1');
        $select2 = $this->input->post('select2');
        $select3 = $this->input->post('select3');

        $config['allowed_types']  = 'pdf';
        $config['max_size']       = 100000;
        $config['upload_path']    = "./Asset/Analisis/{$select1}/{$select2}/{$select3}";
        $config['file_name']  = "{$select3}"."_"."{$select2}"."_".date("Ymd_His");
        $config['overwrite']  = FALSE;
        $config['remove_spaces']  = FALSE;

        $this->load->library('upload', $config);

        if(!is_dir($config['upload_path']))
            mkdir($config['upload_path'], 0777, TRUE);
            
        if ( ! $this->upload->do_upload('userfile'))
        {
                $error = array('error' => $this->upload->display_errors());
                $data['title'] = "Upload Revisi"; 
                $data['viewData'] = $this->dokumen->load_data();
                $data['viewDataAnalisis'] = $this->dokumen->load_data2();  
                $this->load->view('header', $data);
                $this->load->view('uploadanalisis',$error);
        }
        else
        {
                $data['viewData'] = $this->dokumen->load_data();
                $data['viewDataAnalisis'] = $this->dokumen->load_data2();  
                $data = array('upload_data' => $this->upload->data());
                $this->load->view('header',$data);
                $this->load->view('uploadanalisis_success', $data);
        }
        //tambah data ke database untuk analisis_view
        $keterangan = $this->input->post('keterangan');
        $tanggal    = date("d/m/Y");
        $file = $config['file_name'];

        $this->dokumen->update_analisisview($select1, $select2, $select3, $keterangan, $tanggal, $file);
    }
    //untuk hapus file analisis
    public function hapus_analisis($nama_file){
        $document_name = urldecode($nama_file); //decode filename supoaya spasi ga jadi %20
        $directory = $this->dokumen->get_directory($document_name);  //get directory based on file
        $dir = "Asset/Analisis/{$directory['Jenis_Produk']}/{$directory['Nama_Produk']}/{$directory['Jenis_Analisis']}/$document_name.pdf";
        unlink($dir);
        $this->db->delete('analisisview', array('Nama_File' => $document_name));

        $data['viewData'] = $this->dokumen->load_data();
        $data['viewDataAnalisis'] = $this->dokumen->load_data2();  
        $this->load->view('header',$data);
        $this->load->view('delete_success',$data);   
    }

    public function hapus_dc($jenis, $nama, $dokumen){
        $dir = urldecode("Asset/Live/{$jenis}/{$nama}/{$dokumen}_{$nama}.pdf");
        echo $dir;
        //unlink($nama_file);
        // $this->db->delete('analisisview', array('Nama_File' => $document_name));

        // $data['viewData'] = $this->dokumen->load_data();  
        // $this->load->view('header',$data);
        // $this->load->view('deletedc_success',$data);   
    }
}
