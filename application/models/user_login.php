<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user_login extends CI_Model {

	public function getUser(){
		return $this->db->get('user_login');
	}

	public function hapusUser($pk){
		$this->db->where('username', $pk);
		$this->db->delete('user_login');
	}

	public function tambahUser($data){
		$this->db->insert('user_login', $data);
	}

	public function editUser($pk, $data){
		$this->db->where('username', $pk);
		$this->db->update('user_login', $data);

		// return $this->db->last_query();
	}

	public function getWhere($pk){
		$this->db->where('username', $pk);
		return $this->db->get('user_login');
	}
}
