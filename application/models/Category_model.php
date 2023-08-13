<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category_model extends CI_Model{

    public function get_all_categories() {
        // $this->db->where(array('active' => 1));
        $query = $this->db->get('categories');
      
        if (!is_null($query) && $query->num_rows() > 0) {
            return $query->result();
        }
    }

    public function insert_categories($insertNeswData) {
        
        $this->db->insert('categories', $insertNeswData);
        return $this->db->insert_id();
    }

    public function update_categories($id, $insertNeswData){
        $this->db->where('id', $id);
        $this->db->update('categories', $insertNeswData);
    }

    public function del_categories($id) {
        $this->db->where('id', $id);
        $this->db->delete('categories');
        
    }

    public function get_category_detail($id) {
         $this->db->where(array('id' => $id));
         $query = $this->db->get('categories');
         if (!is_null($query) && $query->num_rows() > 0) {
             return $query->row();
         }
    }

	public function get_sub_catgories_by_cat_id($cat_id) {
        // $this->db->where(array('active' => 1));
		$this->db->where(array('category_id' => $cat_id));
        $query = $this->db->get('categories');
        if (!is_null($query) && $query->num_rows() > 0) {
            return $query->result();
		}

	}
}
