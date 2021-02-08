<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
        $this->load->model('dokumen');
        $this->load->helper(array('form', 'url'));
    }

	public function main(){
        $data['title']= "Home"; 
        $data['viewData'] = $this->dokumen->load_data();
        $this->load->view('header', $data);
		$this->load->view('main', $data);
    }

    public function upload(){
        $data['title']= "Upload Revisi"; 
        $this->load->view('header', $data);
        $this->load->view('upload',array('error'=>' '));
    }

    public function do_upload() {
        $config['upload_path']          = './Asset/Uploads';
        $config['allowed_types']        = 'pdf';
        $config['max_size']             = 10000;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('userfile'))
        {
                $error = array('error' => $this->upload->display_errors());
                $this->load->view('header');
                $this->load->view('upload', $error);
        }
        else
        {
                $data = array('upload_data' => $this->upload->data());
                $this->load->view('header');
                $this->load->view('upload_success', $data);
        }
    }
}
