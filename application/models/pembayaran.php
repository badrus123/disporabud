<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pembayaran extends CI_Model {

	public function getPembayaran(){
		return $this->db->get('pembayaran');
	}

	public function hapusPembayaran($pk){
		$this->db->where('id_transaksi', $pk);
		$this->db->delete('pembayaran');
	}

	public function tambahPembayaran($data){
		$this->db->insert('pembayaran', $data);
	}

	public function editPembayaran($pk, $data){
		$this->db->where('id_transaksi', $pk);
		$this->db->update('pembayaran', $data);
	}

	public function getWhere($pk){
		$this->db->where('id_transaksi', $pk);
		return $this->db->get('pembayaran');
	}

	public function getWhereID($no_ktp){
		return $this->db->query("
			select * from pembayaran pb JOIN peminjaman pm
			ON pb.id_peminjaman = pm.id_peminjaman JOIN prasarana pr 
			ON pm.id_prasarana = pr.id_prasarana
			where pb.bukti_pembayaran LIKE '-' and
			pm.no_ktp = '".$no_ktp."'");
	}

	public function getWhereIDPembayaran($no_ktp, $id_transaksi){
		return $this->db->query("
			select * from pembayaran pb JOIN peminjaman pm
			ON pb.id_peminjaman = pm.id_peminjaman JOIN prasarana pr 
			ON pm.id_prasarana = pr.id_prasarana
			where pb.bukti_pembayaran LIKE '-' and
			pm.no_ktp = '".$no_ktp."' and
			pb.id_transaksi = '".$id_transaksi."'");
	}

	public function getJoinSudahBayar(){
		// return $this->db->query("
		// 	select * from pembayaran pb JOIN peminjaman pm
		// 	ON pb.id_peminjaman = pm.id_peminjaman JOIN prasarana pr 
		// 	ON pm.id_prasarana = pr.id_prasarana JOIN user_login u
		// 	ON pm.no_ktp = u.no_ktp
		// 	where pb.bukti_pembayaran NOT LIKE '-'
		// 	and pb.status_pembayaran = 'Sudah dibayar'
		// 	");

		return $this->db->query("
			select * from pembayaran pb join peminjaman pm
			on pb.id_peminjaman = pm.id_peminjaman join prasarana pr
			on pm.id_prasarana = pr.id_prasarana join masyarakat m
			on pm.no_ktp = m.no_ktp where pb.bukti_pembayaran not like '-'
			and pb.status_pembayaran = 'Sudah dibayar'
			");
	}

	public function historyPembayaran(){
		// return $this->db->query("
		// 	select * from pembayaran pb JOIN peminjaman pm
		// 	ON pb.id_peminjaman = pm.id_peminjaman JOIN prasarana pr 
		// 	ON pm.id_prasarana = pr.id_prasarana JOIN user_login u
		// 	ON pm.no_ktp = u.no_ktp
		// 	where pb.bukti_pembayaran NOT LIKE '-'
		// 	and pb.status_pembayaran = 'Sudah dibayar'
		// 	");

		return $this->db->query("
			select * from pembayaran pb join peminjaman pm
			on pb.id_peminjaman = pm.id_peminjaman join prasarana pr
			on pm.id_prasarana = pr.id_prasarana join masyarakat m
			on pm.no_ktp = m.no_ktp where pb.bukti_pembayaran not like '-'
			and pb.status_pembayaran not like 'Belum dibayar'
			");
	}

	public function getJoinBelumBayar(){
		// return $this->db->query("
		// 	select * from pembayaran pb JOIN peminjaman pm
		// 	ON pb.id_peminjaman = pm.id_peminjaman JOIN prasarana pr 
		// 	ON pm.id_prasarana = pr.id_prasarana JOIN user_login u
		// 	ON pm.no_ktp = u.no_ktp
		// 	where pb.bukti_pembayaran NOT LIKE '-'
		// 	and pb.status_pembayaran = 'Belum dibayar'
		// 	");

		return $this->db->query("
			select * from pembayaran pb join peminjaman pm
			on pb.id_peminjaman = pm.id_peminjaman join prasarana pr
			on pm.id_prasarana = pr.id_prasarana join masyarakat m
			on pm.no_ktp = m.no_ktp where pb.bukti_pembayaran not like '-' and pb.status_pembayaran not like 'Belum dibayar'
			");
	}
	
}
