<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pengguna_dinas extends CI_Model {

	public function getUser(){
		return $this->db->get('pengguna_dinas');
	}

	public function hapusUser($pk){
		$this->db->where('nip', $pk);
		$this->db->delete('pengguna_dinas');
	}

	public function tambahUser($data){
		$this->db->insert('pengguna_dinas', $data);
	}

	public function editUser($pk, $data){
		$this->db->where('nip', $pk);
		$this->db->update('pengguna_dinas', $data);
	}

	public function editUserAdmin($pk, $data){
		$this->db->where('username', $pk);
		$this->db->update('pengguna_dinas', $data);
	}

	public function getWhere($pk){
		$this->db->where('nip', $pk);
		return $this->db->get('pengguna_dinas');
	}

	public function getWhereUsername($username){
		$this->db->where('username', $username);
		return $this->db->query("
			select * from user_login u join pengguna_dinas m
			on u.username = m.username where
			m.username = '".$username."'
			");
	}
}
