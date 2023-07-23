<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Password_reset_model extends CI_Model {

    public function insert_reset_token($data) {
        $this->db->insert('password_resets', $data);
        return $this->db->insert_id();
    }

    public function find_token($token) {
        $this->db->where('token', $token);
        return $this->db->get('password_resets')->row();
    }

    public function delete_token($id) {
        $this->db->where('id', $id);
        $this->db->delete('password_resets');
    }
}

