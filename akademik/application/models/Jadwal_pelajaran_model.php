<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class jadwal_pelajaran_model extends CI_Model {


	public function jadwal_pelajaran($tahun_ajaran) {
		$q = $this->db->query("SELECT * FROM vw_jadwal_pelajaran WHERE id_tahun_ajaran = '$tahun_ajaran' ORDER BY id_jadwal_pelajaran DESC");
		return $q;
	}

	
	public function jadwal_pelajaran_edit($id_jadwal) {
		$q = $this->db->query("SELECT * FROM jadwal_pelajaran WHERE id_jadwal_pelajaran = $id_jadwal");
		return $q;
	}
}