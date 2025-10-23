<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pengguna_model extends CI_Model {


	public function guru() {
		$q = $this->db->query("SELECT * FROM vw_guru");
		return $q;
	}

	
	public function guru_detail($nip) {
		$q = $this->db->query("SELECT * FROM vw_guru_dt WHERE nip = '$nip'");
		return $q;
	}
	
	public function guru_edit($id_guru) {
		$q = $this->db->query("SELECT * FROM vw_guru_dt WHERE id_guru = '$id_guru'");
		return $q;
	}

	public function kepala_sekolah() {
		$q = $this->db->query("SELECT * FROM vw_kepala_sekolah");
		return $q;
	}

	public function kepala_sekolah_detail($nip) {
		$q = $this->db->query("SELECT * FROM vw_kepala_sekolah_dt WHERE nip = '$nip'");
		return $q;
	}

	public function kepala_sekolah_edit($id_kepala_sekolah) {
		$q = $this->db->query("SELECT * FROM vw_kepala_sekolah_dt WHERE id_kepala_sekolah = '$id_kepala_sekolah'");
		return $q;
	}

	public function staff() {
		$q = $this->db->query("SELECT * FROM vw_staff");
		return $q;
	}

	
	public function staff_detail($nip) {
		$q = $this->db->query("SELECT * FROM vw_staff_dt WHERE nip = '$nip'");
		return $q;
	}
	
	public function staff_edit($id_staff) {
		$q = $this->db->query("SELECT * FROM vw_staff_dt WHERE id_staff = '$id_staff'");
		return $q;
	}
}