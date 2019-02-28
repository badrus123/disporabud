<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class masyarakat extends CI_Model {

	public function getUser(){
		return $this->db->get('masyarakat');
	}

	public function hapusUser($pk){
		$this->db->where('no_ktp', $pk);
		$this->db->delete('masyarakat');
	}

	public function tambahUser($data){
		$this->db->insert('masyarakat', $data);
	}

	public function editUser($pk, $data){
		$this->db->where('no_ktp', $pk);
		$this->db->update('masyarakat', $data);
	}

	public function editUserAdmin($pk, $data){
		$this->db->where('username', $pk);
		$this->db->update('masyarakat', $data);
	}

	public function getWhere($pk){
		$this->db->where('no_ktp', $pk);
		return $this->db->get('masyarakat');
	}

	public function getWhereUsername($username){
		$this->db->where('username', $username);
		return $this->db->query("
			select * from user_login u join masyarakat m
			on u.username = m.username where
			m.username = '".$username."'
			");
	}
}
