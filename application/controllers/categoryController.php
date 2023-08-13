<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class categoryController extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('category_model');
        $this->load->helper('api');
    }


	function index()  {

		
        $data['title'] = 'Category List';
		$data['categories'] = $this->category_model->get_all_categories();
        $this->load->view('include/header', $data);
        $this->load->view('categories/index', $data);
        $this->load->view('include/footer', $data);

		
	}


	function add()  {

		$cat_add_data = array(
			'name' => $this->input->post('name'),
			'category_id' => $this->input->post('category_id') ? $this->input->post('category_id')  : Null,
			'status' => $this->input->post('status') ? $this->input->post('status') : '0' ,
			'name'  => date("Y-m-d H:i:s"),                 

		);
	}


}
