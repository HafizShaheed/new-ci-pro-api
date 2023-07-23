<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class NewsController extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->lang->load('news', 'dutch');
        $this->load->model('news_model');
    }

    public function index(){
        
        $this->session->set_userdata('email',"shaheed@gmail.com");
        
        // $this->session->unset_userdata('email');
        $data['allnews'] = $this->news_model->getNews();
        $this->session->set_userdata('news_data',$data['allnews']);
        $arr = array(
            'id' => 1,
            'name' => "hafiz",
            'email_address'=> "hafiz@gmail.com"
        );
        $this->session->set_userdata($arr);
        // $this->session->sess_destroy();
        $this->session->mark_as_flash('email_address');
        $this->session->mark_as_temp('id', 20);
        $this->session->set_tempdata('dob', '01-01-2000', 10);

        $data ['title'] = $this->lang->line('news_tiltle');
        $this->load->view('news/index', $data);
    }

    public function add() {
        $title = "LL vs MM News";
        $description = "Debitis maiores voluptates explicabo";
        $insertNeswData = [
            'title' => $title,
            'description' => $description,
            'active' => 1,
        ];
        $this->news_model->insert_news($insertNeswData);
        $this->session->set_flashdata('message','Records has been added  successfully');
        redirect('NewsController');
    }

    public function edit($id) {
        $title = "Aus vs Eng News";
        $description = "Debitis maiores voluptates explicabo";
        $insertNeswData = [
            'title' => $title,
            'description' => $description,
            'active' => 1,
        ];
        $this->news_model->update_news($id, $insertNeswData);
        $this->session->set_flashdata('message','Records has been updated  successfully');
        redirect('NewsController');
    }

    public function delete_new($id) {
        $this->news_model->del_news($id);
        $this->session->set_flashdata('message','Records has been deleted  successfully');
        redirect('NewsController');
    }

    function details($id) {
       $news = $this->news_model->get_news_detail($id);
        $data['title'] = $news->title;
        $data['news'] = $news;
        $this->load->view('news/details', $data);
        
    }
}