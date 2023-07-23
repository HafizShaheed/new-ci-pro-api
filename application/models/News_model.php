<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News_model extends CI_Model{

    public function getNews() {
        // $this->db->where(array('active' => 1));
        $query = $this->db->get('news');
      
        if (!is_null($query) && $query->num_rows() > 0) {
            return $query->result();
        }
    }

    public function insert_news($insertNeswData) {
        
        $this->db->insert('news', $insertNeswData);
        return $this->db->insert_id();
    }

    public function update_news($id, $insertNeswData){
        $this->db->where('id', $id);
        $this->db->update('news', $insertNeswData);
    }

    public function del_news($id) {
        $this->db->where('id', $id);
        $this->db->delete('news');
        
    }

    public function get_news_detail($id) {
         $this->db->where(array('id' => $id));
         $query = $this->db->get('news');
         if (!is_null($query) && $query->num_rows() > 0) {
             return $query->row();
         }
    }
}