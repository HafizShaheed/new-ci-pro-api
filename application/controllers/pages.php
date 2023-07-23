<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class pages extends CI_Controller {

    public function view($page){
      
        if (!file_exists(APPPATH.'views/pages/'.$page.'.php')) {
            show_404();
        }
        $data['title'] = ucfirst($page);
        $this->load->view('include/header', $data);
        $this->load->view('pages/'.$page, $data);
        $this->load->view('include/footer', $data);

    }
}