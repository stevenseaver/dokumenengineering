<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
        $this->load->model('dokumen');
        $this->load->helper(array('form', 'url'));
    }

	public function main(){
        $data['title'] = "Home"; 
        $data['viewData'] = $this->dokumen->load_data();
        $data['viewDataAnalisis'] = $this->dokumen->load_data2(); 
        $this->load->view('header', $data);
		$this->load->view('main', $data);
    }

    public function upload($error_msg = array('error'=>' ')){
        $data['title'] = "Upload Revisi"; 
        $data['viewData'] = $this->dokumen->load_data();
        $data['viewDataAnalisis'] = $this->dokumen->load_data2();  
        $this->load->view('header', $data);
        $this->load->view('upload',$error_msg);
    }

    public function analisis(){
        $data['title'] = "Analisis";
        $data['viewData'] = $this->dokumen->load_data2();  
        $this->load->view('header', $data);
        $this->load->view('analisis',$data);  
    }

    public function do_upload() {
        $select1 = $this->input->post('select1');
        $select2 = $this->input->post('select2');
        $select3 = $this->input->post('select3');

        $config['upload_path']          = "./Asset/{$select1}/{$select2}/";
        $config['allowed_types']        = 'pdf|mp4';
        $config['max_size']             = 10000;
        $config['file_name']            = "{$select3}";
        $config['remove_spaces']        = FALSE;

        $this->load->library('upload', $config);

        if ($select3!='Analisis Breakdown' and $select3!='Analisis Kerusakan' and $select3!='Analisis Pengujian' and $select3!='Analisis Standar'){
            if (file_exists($config['upload_path'].$select3.".pdf"))
                unlink($config['upload_path'].$select3.".pdf");
        }

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
}
