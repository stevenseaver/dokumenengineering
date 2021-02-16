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
        $data['viewDataAnalisis'] = $this->dokumen->load_data2(); 
        $this->load->view('header', $data);
		$this->load->view('main', $data);
    }

    public function upload($error_msg = array('error'=>' ')){  //LOAD PAGE UPLOAD DOKUMEN FIX
        $data['title'] = "Upload Revisi"; 
        $data['viewData'] = $this->dokumen->load_data();
        $data['viewDataAnalisis'] = $this->dokumen->load_data2();  
        $this->load->view('header', $data);
        $this->load->view('upload',$error_msg);
    }

    public function do_upload() {  //UNTUK UPLOAD DOKUMEN FIX {LIBRARY DR CI}
        $select1 = $this->input->post('select1');
        $select2 = $this->input->post('select2');
        $select3 = $this->input->post('select3');

        $config['allowed_types']  = 'pdf|mp4|jpg|png';
        $config['max_size']       = 10000;
        // if ($select3!='Analisis Breakdown' and $select3!='Analisis Kerusakan' and $select3!='Analisis Pengujian' and $select3!='Analisis Standar'){
            $config['upload_path']    = "./Asset/Live/{$select1}/{$select2}/";
            $config['file_name']  = "{$select3}";
            $config['overwrite']  = TRUE;
        // }
        // else{
        //     $config['upload_path']    = "./Asset/Analisis/{$select1}/{$select2}/{$select3}";
        //     $config['file_name']  = "{$select3}"."_".date("Ymd_His");
        //     $config['overwrite']  = FALSE;
        // }
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
                $this->load->view('upload',$error);
        }
        else
        {
                $data = array('upload_data' => $this->upload->data());
                $this->load->view('header');
                $this->load->view('upload_success', $data);
        }
    }

    public function uploadrevisi($error_msg = array('error'=>' ')){  //UNTUK LOAD PAGE UPLOAD DOKUMEN REVISI
        $data['title'] = "Dokumen Revisi"; 
        $data['viewData'] = $this->dokumen->load_data();
        $data['viewDataAnalisis'] = $this->dokumen->load_data2(); 
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
        $config['file_name']  = "{$select3}";
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
                $data['viewDataAnalisis'] = $this->dokumen->load_data2();  
                $this->load->view('header', $data);
                $this->load->view('uploadrevisi',$error);
        }
        else
        {
                $data = array('upload_data' => $this->upload->data());
                $this->load->view('header');
                $this->load->view('uploadrevisi_success', $data);
        }
    }

    public function analisis(){   //UNTUK LOAD PAGE ANALISIS YANG ISINYA HOMEPAGE
        $data['title'] = "Analisis";
        $data['viewData'] = $this->dokumen->load_data2();  
        $this->load->view('header', $data);
        $this->load->view('analisis',$data);  
    }

    public function analisis_view($id){  //UNTUK LOAD PAGE ANALISIS YANG ISINYA LIST DOKUMEN ANALISIS YANG ADA PER DOKUMEN
        $data['title'] = "Daftar Analisis";
        $data['viewData'] = $this->dokumen->get_analisis_id($id);  
        $data['viewListAnalisis'] = $this->dokumen->load_analisisview();
        $this->load->view('header', $data);
        $this->load->view('analisis_view',$data);  
    }

    public function dokumenrevisi(){  //UNTUK LOAD PAGE LIST DOKUMEN YANG REVISI YANG SUDAH UPLOAD
        $data['title'] = "Dokumen Revisi"; 
        $data['viewData'] = $this->dokumen->load_datarevisi();
        $data['viewDataAnalisis'] = $this->dokumen->load_data2(); 
        $this->load->view('header', $data);
		$this->load->view('dokumenrevisi', $data);
    }

    public function uploadanalisis($error_msg = array('error'=>' ')){  //UNTUK LOAD PAGE UPLOAD DOKUMEN REVISI
        $data['title'] = "Dokumen Revisi"; 
        $data['viewData'] = $this->dokumen->load_data();
        $data['viewDataAnalisis'] = $this->dokumen->load_data2(); 
        $this->load->view('header', $data);
		$this->load->view('uploadanalisis', $error_msg);
    }

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
                $data = array('upload_data' => $this->upload->data());
                $this->load->view('header');
                $this->load->view('uploadanalisis_success', $data);
        }
        //$this->dokumen->upload_analisis($data);

        $keterangan = $this->input->post('keterangan');
        $file = $config['file_name'];

        $this->dokumen->update_analisisview($select1, $select2, $select3, $keterangan, $file);
    }
}
