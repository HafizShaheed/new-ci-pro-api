<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class productsController extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('products_model');
        $this->load->model('category_model');
        $this->load->helper('api');
    }


	function index()  {

		
        $data['title'] = ucfirst('products List');
		$data['products'] = $this->products_model->get_all_products();
        $this->load->view('include/header', $data);
        $this->load->view('products/index', $data);
        $this->load->view('include/footer', $data);

		
	}

	function get_sub_cat()  {
		// print_r($this->input->post('category_id'));
		   // Get the category_id from the AJAX request data
		   $category_id = $this->input->post('category_id');

		   // Call the model function to get sub-categories
		   $sub_categories = $this->category_model->get_sub_catgories_by_cat_id($category_id);
   
		   // Prepare the response data
		   $response = array();
		   if (!empty($sub_categories)) {
			   $response['sub_categories_by_cat_id'] = $sub_categories;
			   
		   }else{
			$response['sub_categories_by_cat_id'] = [];
		   }
   
		   // Set the JSON header and send the response
		   $this->output->set_content_type('application/json');
		   echo json_encode($response);
		
	}


	function add()  {
	
		$data['categories'] = $this->category_model->get_all_categories();

		$products_add_data = array(
			'name' => $this->input->post('name'),
			'category_id' => $this->input->post('category_id') ? $this->input->post('category_id')  : Null,
			'category_id' => $this->input->post('sub_cat__id') ? $this->input->post('sub_cat__id')  : Null,
			'description' => $this->input->post('description') ? $this->input->post('description') : '' ,
			'created_at'  => date("Y-m-d H:i:s"),                 

		);

		// $data['inserted_id'] = $this->products_model->insert_products($products_add_data);
		$data['title'] = ucfirst('products Add');
		$this->load->view('include/header', $data);
        $this->load->view('products/add', $data);
        $this->load->view('include/footer', $data);	
	}


}
