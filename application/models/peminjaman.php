<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class peminjaman extends CI_Model {

	public function getPeminjaman(){
		return $this->db->get('peminjaman');
	}

	public function hapusPeminjaman($pk){
		$this->db->where('id_peminjaman', $pk);
		$this->db->delete('peminjaman');
	}

	public function tambahPeminjaman($data){
		$this->db->insert('peminjaman', $data);
	}

	public function editPeminjaman($pk, $data){
		$this->db->where('id_peminjaman', $pk);
		$this->db->update('peminjaman', $data);
	}

	public function getWhere($pk){
		$this->db->where('id_peminjaman', $pk);
		return $this->db->get('peminjaman');
	}

	public function getJoin(){
		return $this->db->query(
			'select * from peminjaman pn JOIN prasarana pr 
			ON pn.id_prasarana = pr.id_prasarana JOIN pembayaran 
			pb ON pn.id_peminjaman = pb.id_peminjaman');
	}

	public function getLaporan(){
		return $this->db->query(
			'select count(pn.id_prasarana) as jumlah,
			pr.nama_prasarana from peminjaman pn
			JOIN prasarana pr ON pn.id_prasarana = pr.id_prasarana
			group by pn.id_prasarana order by pr.id_prasarana');
	}

	public function getHistory($no_ktp){
		return $this->db->query(
			"select * from peminjaman where no_ktp = '".$no_ktp."'");
	}

	public function getBayarSebelum($no_ktp){
		return $this->db->query(
			"select tgl_pelaksanaan from peminjaman pm join
			pembayaran pb on pm.id_peminjaman = pb.id_peminjaman
			where pm.no_ktp = '".$no_ktp."'
			and pb.status_pembayaran = 'Belum dibayar'");
	}

	public function getBelumApprove(){
		return $this->db->query(
			"select * from pembayaran pb JOIN peminjaman pm
			ON pb.id_peminjaman = pm.id_peminjaman JOIN prasarana pr 
			ON pm.id_prasarana = pr.id_prasarana JOIN masyarakat m
			ON pm.no_ktp = m.no_ktp
			where pb.bukti_pembayaran NOT LIKE '-'
			and pb.approval_pengajuan = 'Belum diapprove'"
		);
	}

	public function getSudahApprove(){
		return $this->db->query(
			"select * from pembayaran pb JOIN peminjaman pm
			ON pb.id_peminjaman = pm.id_peminjaman JOIN prasarana pr 
			ON pm.id_prasarana = pr.id_prasarana JOIN masyarakat m
			ON pm.no_ktp = m.no_ktp
			where pb.bukti_pembayaran NOT LIKE '-'
			and pb.approval_pengajuan = 'Sudah diapprove'"
		);
	}
}
