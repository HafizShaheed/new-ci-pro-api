<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard  extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('users_model');
        $this->logged_in();
    } 

    private function logged_in()  {
        if (!$this->session->userdata('authenticated')) {
            redirect('users/login');
        }
        
    }

    public function index(){

            $data['title'] = "Dashboard";
            $this->load->view('include/header', $data);
            $this->load->view('dashboard/index', $data);
            $this->load->view('include/footer', $data);
        
    }
}