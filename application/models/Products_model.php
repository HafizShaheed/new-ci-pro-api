<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products_model extends CI_Model{

    public function get_all_products() {
        // $this->db->where(array('active' => 1));
        $query = $this->db->get('products');
      
        if (!is_null($query) && $query->num_rows() > 0) {
            return $query->result();
        }
    }

    public function insert_products($insertNeswData) {
        
        $this->db->insert('products', $insertNeswData);
        return $this->db->insert_id();
    }

    public function update_products($id, $insertNeswData){
        $this->db->where('id', $id);
        $this->db->update('products', $insertNeswData);
    }

    public function del_products($id) {
        $this->db->where('id', $id);
        $this->db->delete('products');
        
    }

    public function get_product_detail($id) {
         $this->db->where(array('id' => $id));
         $query = $this->db->get('products');
         if (!is_null($query) && $query->num_rows() > 0) {
             return $query->row();
         }
    }


	

	
}
