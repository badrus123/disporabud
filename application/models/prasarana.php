<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class prasarana extends CI_Model {

	public function getPrasarana(){
		return $this->db->get('prasarana');
	}

	public function hapusPrasarana($pk){
		$this->db->where('id_prasarana', $pk);
		$this->db->delete('prasarana');
	}

	public function tambahPrasarana($data){
		$this->db->insert('prasarana', $data);
	}

	public function editPrasarana($pk, $data){
		$this->db->where('id_prasarana', $pk);
		$this->db->update('prasarana', $data);
	}

	public function getWhere($pk){
		// $this->db->where('id_prasarana', $pk);
		// return $this->db->get('prasarana');
		return $this->db->query("select * from prasarana 
			where id_prasarana = '".$pk."'");
	}
}
