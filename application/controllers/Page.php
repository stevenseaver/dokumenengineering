<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
        $this->load->model('dokumen');
    }

	public function index()
	{
        $data['viewData'] = $this->dokumen->load_data();

		$this->load->view('test', $data);
    }
}
