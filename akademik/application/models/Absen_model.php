<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Absen_model extends CI_Model {


	public function absen() {
		$q = $this->db->query("SELECT * FROM vw_absen ORDER BY id_tahun_ajaran DESC");
		return $q;
    }
}