<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Users_model extends CI_Model{

    public function insertUser($userdata) {
        
        $this->db->insert('users', $userdata);
        return $this->db->insert_id();
    }

    // public function login($email, $password){
    //     $this->db->where('email', $email);
    //     $this->db->where('password', md5($password));
    //     $this->db->where('active', '1');
    //     $query = $this->db->get('users');

    //     if ($query->num_rows()==1) {
    //         return $query->row();
    //     }
    //     return false;
    // }

	public function login($email, $password){
        $this->db->where('email', $email);
        $query = $this->db->get('users');
        if ($query->num_rows()==1) {
     
			$this->db->where('password', md5($password));
			$query2 = $this->db->get('users');
			if ($query2->num_rows() > 0) {
				$user = $query2->row();
				if ($user->active == '1') {
					$userdata =array(
						'status' => 'success',
						'user' => $user
					);
					return $userdata;
				}else {
					$error = array(
						'status' => 'error',
						'message' => 'User in-Active'
					);
					return $error;
				}

			}else{
				$error = array(
					'status' => 'error',
					'message' => 'Password does not Match'
				);
				return $error;
			}
			$this->db->where('active', '1');
        }else{
			$error = array(
				'status' => 'error',
				'message' => 'Email does not exist'
			);

			return $error;
		}


    }

	public function get_login_User($id) {
		$this->db->where('id', $id);
		$query = $this->db->get('users');
		return $query->row();	
	}
}


