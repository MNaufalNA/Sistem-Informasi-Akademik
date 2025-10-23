<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Siswa_model extends CI_Model
{

    public function siswa($id_kelas)
    {
        $q = $this->db->query("SELECT * FROM vw_siswa  WHERE id_kelas = '$id_kelas' ORDER BY nama_siswa ASC");
        return $q;
    }

    public function get_nilai_harian_detail_siswa($id_siswa)
    {
        $q = $this->db->query("SELECT * FROM nilai_harian_detail  WHERE id_siswa = '$id_siswa'");
        return $q;
    }

    public function siswa_pindah_kelas($id_kelas, $angkatan)
    {
        if (!empty($angkatan)) {
            $angkatan = "AND angkatan ='$angkatan'";
        }
        $q = $this->db->query("SELECT * FROM vw_siswa  WHERE id_kelas = '$id_kelas' $angkatan ORDER BY nama_siswa ASC");
        return $q;
    }

    public function siswa_all($id_kelas)
    {
        $q = $this->db->query("SELECT * FROM vw_siswa_dt WHERE id_kelas = '$id_kelas'");
        return $q;
    }

    public function siswa_detail($nis)
    {
        $q = $this->db->query("SELECT * FROM vw_siswa_dt WHERE nis = '$nis'");
        return $q;
    }

    public function siswa_edit($id_siswa)
    {
        $q = $this->db->query("SELECT * FROM vw_siswa_dt WHERE id_siswa = $id_siswa");
        return $q;
    }

    public function pembayaran_siswa_bebas($tahun_ajaran, $id_siswa)
    {
        $q = $this->db->query("SELECT * FROM vw_bayar_siswa_bebas WHERE tahun_ajaran = '$tahun_ajaran' AND tipe_pembayaran = 'Bebas' AND id_siswa = '$id_siswa'");
        return $q;
    }

    public function pembayaran_siswa_bulanan($tahun_ajaran, $id_siswa)
    {
        $q = $this->db->query("SELECT * FROM vw_bayar_siswa WHERE tahun_ajaran = '$tahun_ajaran' AND tipe_pembayaran = 'Bulanan' AND id_siswa = '$id_siswa' GROUP BY id_jenis_pembayaran");
        return $q;
    }

    public function pembayaran_bulanan_terakhir($tahun_ajaran, $id_siswa)
    {
        $q = $this->db->query("SELECT * FROM vw_bayar_siswa WHERE tahun_ajaran = '$tahun_ajaran' AND tipe_pembayaran = 'Bulanan' AND id_siswa = '$id_siswa' AND bayar > 0 ORDER BY tanggal DESC");
        return $q;
    }

    public function pelanggaran_siswa_id($id_siswa, $tahun_ajaran)
    {
        $q = $this->db->query("SELECT * FROM vw_pelanggaran_siswa WHERE id_siswa = '$id_siswa' AND tahun_ajaran = '$tahun_ajaran' ORDER BY id_pelanggaran_siswa DESC");
        return $q;
    }
}