<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class kasir extends CI_Model {

	public function getUser(){
		return $this->db->get('kasir');
	}

	public function hapusUser($pk){
		$this->db->where('id_kasir', $pk);
		$this->db->delete('kasir');
	}

	public function tambahUser($data){
		$this->db->insert('kasir', $data);
	}

	public function editUser($pk, $data){
		$this->db->where('id_kasir', $pk);
		$this->db->update('kasir', $data);
	}

	public function editUserAdmin($pk, $data){
		$this->db->where('username', $pk);
		$this->db->update('kasir', $data);
	}

	public function getWhere($pk){
		$this->db->where('id_kasir', $pk);
		return $this->db->get('kasir');
	}

	public function getWhereUsername($username){
		$this->db->where('username', $username);
		return $this->db->query("
			select * from user_login u join kasir m
			on u.username = m.username where
			m.username = '".$username."'
			");
	}
}
