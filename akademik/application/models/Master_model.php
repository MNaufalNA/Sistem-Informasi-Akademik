<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Master_model extends CI_Model {


	public function jurusan() {
		$q = $this->db->query("SELECT * FROM mst_jurusan ORDER BY id_jurusan DESC");
		return $q;
	}

	public function jurusan_edit($id) {
		$q = $this->db->query("SELECT * FROM mst_jurusan WHERE id_jurusan = '$id'");
		return $q;
	}

	public function tahun_ajaran() {
		$q = $this->db->query("SELECT * FROM mst_tahun_ajaran ORDER BY id_tahun_ajaran DESC");
		return $q;
	}

	public function tahun_ajaran_edit($id) {
		$q = $this->db->query("SELECT * FROM mst_tahun_ajaran WHERE id_tahun_ajaran = '$id'");
		return $q;
	}

	public function kelas() {
		$q = $this->db->query("SELECT * FROM mst_kelas ORDER BY id_kelas DESC");
		return $q;
	}

	public function kelas_edit($id) {
		$q = $this->db->query("SELECT * FROM mst_kelas WHERE id_kelas = '$id'");
		return $q;
	}

	public function kelompok_pelajaran() {
		$q = $this->db->query("SELECT * FROM mst_kelompok_pelajaran ORDER BY id_kelompok_pelajaran DESC");
		return $q;
	}

	public function kelompok_pelajaran_edit($id) {
		$q = $this->db->query("SELECT * FROM mst_kelompok_pelajaran WHERE id_kelompok_pelajaran = '$id'");
		return $q;
	}

	public function mapel() {
		$q = $this->db->query("SELECT * FROM vw_mapel");
		return $q;
	}

	public function mapel_edit($id) {
		$q = $this->db->query("SELECT * FROM mst_mapel WHERE id_mapel = '$id'");
		return $q;
	}

	public function predikat() {
		$q = $this->db->query("SELECT * FROM mst_predikat ORDER BY id_predikat ASC");
		return $q;
	}

	public function walikelas($tahun_ajaran) {
		$q = $this->db->query("SELECT * FROM vw_walikelas WHERE tahun_ajaran = '$tahun_ajaran' ORDER BY id_walikelas DESC");
		return $q;
	}
}