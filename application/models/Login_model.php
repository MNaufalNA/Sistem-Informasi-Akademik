<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Login_model extends CI_Model
{

    // public function cek_otp2($in)
    // {
    //     $username = $in['username'];
    //     $password = $in['password'];
    //     $q_admin = $this->db->query("SELECT * FROM mst_admin WHERE username = '$username' AND password = '$password'");

    //     $q_bk = $this->db->query("SELECT * FROM mst_guru INNER JOIN mst_jabatan ON mst_guru.id_jabatan = mst_jabatan.id_jabatan WHERE nip = '$username' AND password = '$password' AND mst_guru.id_jabatan = 3");

    //     $q_guru = $this->db->query("SELECT * FROM mst_guru INNER JOIN mst_jabatan ON mst_guru.id_jabatan = mst_jabatan.id_jabatan WHERE nip = '$username' AND password = '$password' AND mst_guru.id_jabatan = 2");

    //     $q_siswa = $this->db->query("SELECT * FROM mst_siswa WHERE nis = '$username' AND password = '$password'");
    //     $q_keuangan = $this->db->query("SELECT * FROM mst_user INNER JOIN mst_jabatan ON mst_user.id_jabatan = mst_jabatan.id_jabatan WHERE username = '$username' AND password = '$password' AND (hak_akses = 'dasview' OR hak_akses = 'das' OR hak_akses = 'kasir' OR hak_akses = 'bendahara')");
    //     $q_perpus = $this->db->query("SELECT * FROM mst_user INNER JOIN mst_jabatan ON mst_user.id_jabatan = mst_jabatan.id_jabatan WHERE username = '$username' AND password = '$password' AND mst_user.id_jabatan = '20'");

    //     $q_alumni = $this->db->query("SELECT * FROM mst_user INNER JOIN mst_jabatan ON mst_user.id_jabatan = mst_jabatan.id_jabatan WHERE username = '$username' AND password = '$password' AND mst_user.id_jabatan = '21'");

    //     $q_bukutamu = $this->db->query("SELECT * FROM mst_user INNER JOIN mst_jabatan ON mst_user.id_jabatan = mst_jabatan.id_jabatan WHERE username = '$username' AND password = '$password' AND mst_user.id_jabatan = '22'");

    //     $q_ppdb = $this->db->query("SELECT * FROM mst_user INNER JOIN mst_jabatan ON mst_user.id_jabatan = mst_jabatan.id_jabatan WHERE username = '$username' AND password = '$password' AND mst_user.id_jabatan = '23'");
    //     $q_kelulusan = $this->db->query("SELECT * FROM mst_user INNER JOIN mst_jabatan ON mst_user.id_jabatan = mst_jabatan.id_jabatan WHERE username = '$username' AND password = '$password' AND mst_user.id_jabatan = '24'");
    //     $q_akademik = $this->db->query("SELECT * FROM mst_user INNER JOIN mst_jabatan ON mst_user.id_jabatan = mst_jabatan.id_jabatan WHERE username = '$username' AND password = '$password' AND mst_user.id_jabatan = '9'");

    //     // admin
    //     if ($q_admin->num_rows() > 0) {
    //         foreach ($q_admin->result() as $data) {
    //             $session['username'] = $data->username;
    //             $session['id'] = $data->id;
    //             $session['nama'] = $data->nama;
    //             $session['hak_akses'] = 'admin';
    //             $session['nama_jabatan'] = 'Administrator';
    //             $session['tipe'] = $data->tipe;
    //             $this->session->set_userdata($session);
    //         }
    //         $log['username'] = $session['nama'];
    //         $log['ipaddress'] = $_SERVER['REMOTE_ADDR'];
    //         $log['hak_akses'] = $session['hak_akses'];
    //         $this->db->insert("log_login", $log);
    //         redirect("home");
    //     }

    //     // Kesiswaan
    //     else if ($q_bk->num_rows() > 0) {
    //         foreach ($q_bk->result() as $data) {
    //             $session['username'] = $data->nip;
    //             $session['id'] = $data->id_guru;
    //             $session['nama'] = $data->nama_guru;
    //             $session['hak_akses'] = $data->hak_akses;
    //             $session['tipe'] = 'gurupiket';
    //             $this->session->set_userdata($session);
    //         }
    //         $log['username'] = $session['nama'];
    //         $log['ipaddress'] = $_SERVER['REMOTE_ADDR'];
    //         $log['hak_akses'] = $session['hak_akses'];
    //         $this->db->insert("log_login", $log);
    //         redirect("../kesiswaan");
    //     }

    //     // Akademik
    //     else if ($q_guru->num_rows() > 0) {
    //         foreach ($q_guru->result() as $data) {
    //             $session['username'] = $data->nip;
    //             $session['id'] = $data->id_guru;
    //             $session['nama'] = $data->nama_guru;
    //             $session['hak_akses'] = $data->hak_akses;
    //             $session['tipe'] = 'gurupiket';
    //             $this->session->set_userdata($session);
    //         }
    //         $log['username'] = $session['nama'];
    //         $log['ipaddress'] = $_SERVER['REMOTE_ADDR'];
    //         $log['hak_akses'] = $session['hak_akses'];
    //         $this->db->insert("log_login", $log);
    //         redirect("../akademik");
    //     }

    //     // Keuangan
    //     else if ($q_keuangan->num_rows() > 0) {
    //         foreach ($q_keuangan->result() as $data) {
    //             $session['username'] = $data->username;
    //             $session['id'] = $data->id_user;
    //             $session['nama'] = $data->nama;
    //             $session['hak_akses'] = $data->hak_akses;
    //             $session['nama_jabatan'] = $data->nama_jabatan;
    //             $session['tipe'] = 'keuangan';
    //             $this->session->set_userdata($session);
    //         }
    //         $log['username'] = $session['nama'];
    //         $log['ipaddress'] = $_SERVER['REMOTE_ADDR'];
    //         $log['hak_akses'] = $session['hak_akses'];
    //         $this->db->insert("log_login", $log);
    //         redirect("../keuangan");
    //     }

    //     // Akademik
    //     else if ($q_siswa->num_rows() > 0) {
    //         foreach ($q_siswa->result() as $data) {
    //             $session['username'] = $data->nis;
    //             $session['id'] = $data->id_siswa;
    //             $session['nama'] = $data->nama_siswa;
    //             $session['hak_akses'] = 'siswa';
    //             $session['tipe'] = 'siswa';
    //             $this->session->set_userdata($session);
    //         }
    //         $log['username'] = $session['nama'];
    //         $log['ipaddress'] = $_SERVER['REMOTE_ADDR'];
    //         $log['hak_akses'] = $session['hak_akses'];
    //         $this->db->insert("log_login", $log);
    //         redirect("../akademik");
    //     }
    //     // Perpustakaan
    //     else if ($q_perpus->num_rows() > 0) {
    //         foreach ($q_perpus->result() as $data) {
    //             $session['username'] = $data->username;
    //             $session['id'] = $data->id_user;
    //             $session['nama'] = $data->nama;
    //             $session['hak_akses'] = $data->hak_akses;
    //             $session['nama_jabatan'] = $data->nama_jabatan;
    //             $session['tipe'] = 'perpus';
    //             $this->session->set_userdata($session);
    //         }
    //         $log['username'] = $session['nama'];
    //         $log['ipaddress'] = $_SERVER['REMOTE_ADDR'];
    //         $log['hak_akses'] = $session['hak_akses'];
    //         $this->db->insert("log_login", $log);
    //         redirect("../perpustakaan");
    //     }
    //     // Alumni
    //     else if ($q_alumni->num_rows() > 0) {
    //         foreach ($q_alumni->result() as $data) {
    //             $session['username'] = $data->username;
    //             $session['id'] = $data->id_user;
    //             $session['nama'] = $data->nama;
    //             $session['hak_akses'] = $data->hak_akses;
    //             $session['nama_jabatan'] = $data->nama_jabatan;
    //             $session['tipe'] = 'alumni';
    //             $this->session->set_userdata($session);
    //         }
    //         redirect("../alumni");
    //     }
    //     // Buku Tamu
    //     else if ($q_bukutamu->num_rows() > 0) {
    //         foreach ($q_bukutamu->result() as $data) {
    //             $session['username'] = $data->username;
    //             $session['id'] = $data->id_user;
    //             $session['nama'] = $data->nama;
    //             $session['hak_akses'] = $data->hak_akses;
    //             $session['nama_jabatan'] = $data->nama_jabatan;
    //             $session['tipe'] = 'bukutamu';
    //             $this->session->set_userdata($session);
    //         }
    //         $log['username'] = $session['nama'];
    //         $log['ipaddress'] = $_SERVER['REMOTE_ADDR'];
    //         $log['hak_akses'] = $session['hak_akses'];
    //         $this->db->insert("log_login", $log);
    //         redirect("../bukutamu");
    //     }
    //     // PPDB
    //     else if ($q_ppdb->num_rows() > 0) {
    //         foreach ($q_ppdb->result() as $data) {
    //             $session['username'] = $data->username;
    //             $session['id'] = $data->id_user;
    //             $session['nama'] = $data->nama;
    //             $session['hak_akses'] = $data->hak_akses;
    //             $session['nama_jabatan'] = $data->nama_jabatan;
    //             $session['tipe'] = 'ppdb';
    //             $this->session->set_userdata($session);
    //         }
    //         $log['username'] = $session['nama'];
    //         $log['ipaddress'] = $_SERVER['REMOTE_ADDR'];
    //         $log['hak_akses'] = $session['hak_akses'];
    //         $this->db->insert("log_login", $log);
    //         redirect("../ppdb");
    //     }
    //     // Kelulusan
    //     else if ($q_kelulusan->num_rows() > 0) {
    //         foreach ($q_kelulusan->result() as $data) {
    //             $session['username'] = $data->username;
    //             $session['id'] = $data->id_user;
    //             $session['nama'] = $data->nama;
    //             $session['hak_akses'] = $data->hak_akses;
    //             $session['nama_jabatan'] = $data->nama_jabatan;
    //             $session['tipe'] = 'kelulusan';
    //             $this->session->set_userdata($session);
    //         }
    //         $log['username'] = $session['nama'];
    //         $log['ipaddress'] = $_SERVER['REMOTE_ADDR'];
    //         $log['hak_akses'] = $session['hak_akses'];
    //         $this->db->insert("log_login", $log);
    //         redirect("../kelulusan");
    //     }

    //     // Akademik
    //     else if ($q_akademik->num_rows() > 0) {
    //         foreach ($q_akademik->result() as $data) {
    //             $session['username'] = $data->username;
    //             $session['id'] = $data->id_user;
    //             $session['nama'] = $data->nama;
    //             $session['hak_akses'] = 'adminakademik';
    //             $session['nama_jabatan'] = $data->nama_jabatan;
    //             $session['tipe'] = 'akademik';
    //             $this->session->set_userdata($session);
    //         }
    //         $log['username'] = $session['nama'];
    //         $log['ipaddress'] = $_SERVER['REMOTE_ADDR'];
    //         $log['hak_akses'] = $session['hak_akses'];
    //         $this->db->insert("log_login", $log);
    //         redirect("../akademik");
    //     } else {
    //         $this->session->set_flashdata("error", "Gagal Login. Username dan Password Salah");
    //         redirect(base_url());
    //     }
    // }

    public function cek_otp($in)
    {

        $username = $in['username'];
        $password = $in['password'];
        // $q_admin = $this->db->query("SELECT * FROM mst_admin WHERE username = '$username' ");

        // $q_bk = $this->db->query("SELECT * FROM mst_guru INNER JOIN mst_jabatan ON mst_guru.id_jabatan = mst_jabatan.id_jabatan WHERE nip = '$username'  AND mst_guru.id_jabatan = 3");

        // $q_guru = $this->db->query("SELECT * FROM mst_guru INNER JOIN mst_jabatan ON mst_guru.id_jabatan = mst_jabatan.id_jabatan WHERE nip = '$username'  AND mst_guru.id_jabatan = 2");

        // $q_siswa = $this->db->query("SELECT * FROM mst_siswa WHERE nis = '$username'");
        // $q_keuangan = $this->db->query("SELECT * FROM mst_user INNER JOIN mst_jabatan ON mst_user.id_jabatan = mst_jabatan.id_jabatan WHERE username = '$username'  AND (hak_akses = 'dasview' OR hak_akses = 'das' OR hak_akses = 'kasir' OR hak_akses = 'bendahara')");
        // $q_perpus = $this->db->query("SELECT * FROM mst_user INNER JOIN mst_jabatan ON mst_user.id_jabatan = mst_jabatan.id_jabatan WHERE username = '$username'  AND mst_user.id_jabatan = '20'");

        // $q_alumni = $this->db->query("SELECT * FROM mst_user INNER JOIN mst_jabatan ON mst_user.id_jabatan = mst_jabatan.id_jabatan WHERE username = '$username'  AND mst_user.id_jabatan = '21'");

        // $q_bukutamu = $this->db->query("SELECT * FROM mst_user INNER JOIN mst_jabatan ON mst_user.id_jabatan = mst_jabatan.id_jabatan WHERE username = '$username'  AND mst_user.id_jabatan = '22'");

        // $q_ppdb = $this->db->query("SELECT * FROM mst_user INNER JOIN mst_jabatan ON mst_user.id_jabatan = mst_jabatan.id_jabatan WHERE username = '$username'  AND mst_user.id_jabatan = '23'");
        // $q_kelulusan = $this->db->query("SELECT * FROM mst_user INNER JOIN mst_jabatan ON mst_user.id_jabatan = mst_jabatan.id_jabatan WHERE username = '$username'  AND mst_user.id_jabatan = '24'");
        // $q_akademik = $this->db->query("SELECT * FROM mst_user INNER JOIN mst_jabatan ON mst_user.id_jabatan = mst_jabatan.id_jabatan WHERE username = '$username'  AND mst_user.id_jabatan = '9'");

        // done hak_akses=root, no_wa, username
        $q_admin = $this->db->query("SELECT * FROM mst_admin WHERE username = '$username' AND password = '$password'");

        // done hak_akses=gurubk, hp, nip
        $q_bk = $this->db->query("SELECT * FROM mst_guru INNER JOIN mst_jabatan ON mst_guru.id_jabatan = mst_jabatan.id_jabatan WHERE nip = '$username' AND password = '$password' AND mst_guru.id_jabatan = 3");

        // done hak_akses=guru, hp, nip
        $q_guru = $this->db->query("SELECT * FROM mst_guru INNER JOIN mst_jabatan ON mst_guru.id_jabatan = mst_jabatan.id_jabatan WHERE nip = '$username' AND password = '$password' AND mst_guru.id_jabatan = 2");

        // done hak_akses=siswa, hp, nis
        $q_siswa = $this->db->query("SELECT * FROM mst_siswa WHERE nis = '$username' AND password = '$password'");

        // done hak_akses=dasview | das | kasir | bendahara, no_wa, username
        $q_keuangan = $this->db->query("SELECT * FROM mst_user INNER JOIN mst_jabatan ON mst_user.id_jabatan = mst_jabatan.id_jabatan WHERE username = '$username' AND password = '$password' AND (hak_akses = 'dasview' OR hak_akses = 'das' OR hak_akses = 'kasir' OR hak_akses = 'bendahara')");

        // done hak_akses=admin, no_wa, username
        $q_perpus = $this->db->query("SELECT * FROM mst_user INNER JOIN mst_jabatan ON mst_user.id_jabatan = mst_jabatan.id_jabatan WHERE username = '$username' AND password = '$password' AND mst_user.id_jabatan = '20'");

        // done hak_akses=admin no_wa, username
        $q_alumni = $this->db->query("SELECT * FROM mst_user INNER JOIN mst_jabatan ON mst_user.id_jabatan = mst_jabatan.id_jabatan WHERE username = '$username' AND password = '$password' AND mst_user.id_jabatan = '21'");

        // done hak_akses=admin no_wa, username
        $q_bukutamu = $this->db->query("SELECT * FROM mst_user INNER JOIN mst_jabatan ON mst_user.id_jabatan = mst_jabatan.id_jabatan WHERE username = '$username' AND password = '$password' AND mst_user.id_jabatan = '22'");

        // done hak_akses=admin no_wa, username
        $q_ppdb = $this->db->query("SELECT * FROM mst_user INNER JOIN mst_jabatan ON mst_user.id_jabatan = mst_jabatan.id_jabatan WHERE username = '$username' AND password = '$password' AND mst_user.id_jabatan = '23'");

        // done hak_akses=admin no_wa, username
        $q_kelulusan = $this->db->query("SELECT * FROM mst_user INNER JOIN mst_jabatan ON mst_user.id_jabatan = mst_jabatan.id_jabatan WHERE username = '$username' AND password = '$password' AND mst_user.id_jabatan = '24'");

        // done hak_akses=admin no_wa, username
        $q_akademik = $this->db->query("SELECT * FROM mst_user INNER JOIN mst_jabatan ON mst_user.id_jabatan = mst_jabatan.id_jabatan WHERE username = '$username' AND password = '$password' AND mst_user.id_jabatan = '9'");

        // Kesiswaan
        $a_kesiswaan = $this->db->query("SELECT * FROM mst_user INNER JOIN mst_jabatan ON mst_user.id_jabatan = mst_jabatan.id_jabatan WHERE username = '$username' AND password = '$password' AND mst_user.id_jabatan = '25'");

        // Keuangan
        $a_keuangan = $this->db->query("SELECT * FROM mst_user INNER JOIN mst_jabatan ON mst_user.id_jabatan = mst_jabatan.id_jabatan WHERE username = '$username' AND password = '$password' AND mst_user.id_jabatan = '10'");

        // Sarpas
        $a_sarpas = $this->db->query("SELECT * FROM mst_user INNER JOIN mst_jabatan ON mst_user.id_jabatan = mst_jabatan.id_jabatan WHERE username = '$username' AND password = '$password' AND mst_user.id_jabatan = '26'");

        // admin
        if ($q_admin->num_rows() > 0) {
            foreach ($q_admin->result() as $data) {
                $session['username'] = $data->username;
                $session['id'] = $data->id;
                $session['nama'] = $data->nama;
                $session['hak_akses'] = 'admin';
                $session['nama_jabatan'] = 'Administrator';
                $session['tipe'] = $data->tipe;
                $this->session->set_userdata($session);
            }
            $log['username'] = $session['nama'];
            $log['ipaddress'] = $_SERVER['REMOTE_ADDR'];
            $log['hak_akses'] = $session['hak_akses'];
            $this->db->insert("log_login", $log);
            redirect(base_url() . "home");
            // redirect("home");
        }

        // Kesiswaan
        else if ($q_bk->num_rows() > 0) {
            // $ok = $_SESSION['password'];
            // unset($_SESSION["products"]);
            // var_dump($ok);
            // die();
            // var_dump($username, $password);
            // die();
            foreach ($q_bk->result() as $data) {
                $session['username'] = $data->nip;
                $session['id'] = $data->id_guru;
                $session['nama'] = $data->nama_guru;
                $session['hak_akses'] = $data->hak_akses;
                $session['tipe'] = 'gurupiket';
                $this->session->set_userdata($session);
            }
            $log['username'] = $session['nama'];
            $log['ipaddress'] = $_SERVER['REMOTE_ADDR'];
            $log['hak_akses'] = $session['hak_akses'];
            $this->db->insert("log_login", $log);
            redirect(base_url() . "kesiswaan");
        }

        // Akademik
        else if ($q_guru->num_rows() > 0) {
            foreach ($q_guru->result() as $data) {
                $session['username'] = $data->nip;
                $session['id'] = $data->id_guru;
                $session['nama'] = $data->nama_guru;
                $session['hak_akses'] = $data->hak_akses;
                $session['tipe'] = 'gurupiket';
                $this->session->set_userdata($session);
            }
            $log['username'] = $session['nama'];
            $log['ipaddress'] = $_SERVER['REMOTE_ADDR'];
            $log['hak_akses'] = $session['hak_akses'];
            $this->db->insert("log_login", $log);
            // redirect("../akademik");
            redirect(base_url() . "akademik");

        }

        // Keuangan
        else if ($q_keuangan->num_rows() > 0) {
            foreach ($q_keuangan->result() as $data) {
                $session['username'] = $data->username;
                $session['id'] = $data->id_user;
                $session['nama'] = $data->nama;
                $session['hak_akses'] = $data->hak_akses;
                $session['nama_jabatan'] = $data->nama_jabatan;
                $session['tipe'] = 'keuangan';
                $this->session->set_userdata($session);
            }
            $log['username'] = $session['nama'];
            $log['ipaddress'] = $_SERVER['REMOTE_ADDR'];
            $log['hak_akses'] = $session['hak_akses'];
            $this->db->insert("log_login", $log);
            // redirect("../keuangan");
            redirect(base_url() . "keuangan");
        }

        // Akademik
        else if ($q_siswa->num_rows() > 0) {
            foreach ($q_siswa->result() as $data) {
                $session['username'] = $data->nis;
                $session['id'] = $data->id_siswa;
                $session['nama'] = $data->nama_siswa;
                $session['hak_akses'] = 'siswa';
                $session['tipe'] = 'siswa';
                $this->session->set_userdata($session);
            }
            $log['username'] = $session['nama'];
            $log['ipaddress'] = $_SERVER['REMOTE_ADDR'];
            $log['hak_akses'] = $session['hak_akses'];
            $this->db->insert("log_login", $log);
            // redirect("../akademik");
            redirect(base_url() . "akademik");
        }
        // Perpustakaan
        else if ($q_perpus->num_rows() > 0) {
            foreach ($q_perpus->result() as $data) {
                $session['username'] = $data->username;
                $session['id'] = $data->id_user;
                $session['nama'] = $data->nama;
                $session['hak_akses'] = $data->hak_akses;
                $session['nama_jabatan'] = $data->nama_jabatan;
                $session['tipe'] = 'perpus';
                $this->session->set_userdata($session);
            }
            $log['username'] = $session['nama'];
            $log['ipaddress'] = $_SERVER['REMOTE_ADDR'];
            $log['hak_akses'] = $session['hak_akses'];
            $this->db->insert("log_login", $log);
            // redirect("../perpustakaan");
            redirect(base_url() . "perpustakaan");
        }
        // Alumni
        else if ($q_alumni->num_rows() > 0) {
            foreach ($q_alumni->result() as $data) {
                $session['username'] = $data->username;
                $session['id'] = $data->id_user;
                $session['nama'] = $data->nama;
                $session['hak_akses'] = $data->hak_akses;
                $session['nama_jabatan'] = $data->nama_jabatan;
                $session['tipe'] = 'alumni';
                $this->session->set_userdata($session);
            }
            // redirect("../alumni");
            redirect(base_url() . "alumni");
        }
        // Buku Tamu
        else if ($q_bukutamu->num_rows() > 0) {
            foreach ($q_bukutamu->result() as $data) {
                $session['username'] = $data->username;
                $session['id'] = $data->id_user;
                $session['nama'] = $data->nama;
                $session['hak_akses'] = $data->hak_akses;
                $session['nama_jabatan'] = $data->nama_jabatan;
                $session['tipe'] = 'bukutamu';
                $this->session->set_userdata($session);
            }
            $log['username'] = $session['nama'];
            $log['ipaddress'] = $_SERVER['REMOTE_ADDR'];
            $log['hak_akses'] = $session['hak_akses'];
            $this->db->insert("log_login", $log);
            // redirect("../bukutamu");
            redirect(base_url() . "bukutamu");
        }
        // PPDB
        else if ($q_ppdb->num_rows() > 0) {
            foreach ($q_ppdb->result() as $data) {
                $session['username'] = $data->username;
                $session['id'] = $data->id_user;
                $session['nama'] = $data->nama;
                $session['hak_akses'] = $data->hak_akses;
                $session['nama_jabatan'] = $data->nama_jabatan;
                $session['tipe'] = 'ppdb';
                $this->session->set_userdata($session);
            }
            $log['username'] = $session['nama'];
            $log['ipaddress'] = $_SERVER['REMOTE_ADDR'];
            $log['hak_akses'] = $session['hak_akses'];
            $this->db->insert("log_login", $log);
            // redirect("../ppdb");
            redirect(base_url() . "ppdb");
        }
        // Kelulusan
        else if ($q_kelulusan->num_rows() > 0) {
            foreach ($q_kelulusan->result() as $data) {
                $session['username'] = $data->username;
                $session['id'] = $data->id_user;
                $session['nama'] = $data->nama;
                $session['hak_akses'] = $data->hak_akses;
                $session['nama_jabatan'] = $data->nama_jabatan;
                $session['tipe'] = 'kelulusan';
                $this->session->set_userdata($session);
            }
            $log['username'] = $session['nama'];
            $log['ipaddress'] = $_SERVER['REMOTE_ADDR'];
            $log['hak_akses'] = $session['hak_akses'];
            $this->db->insert("log_login", $log);
            // redirect("../kelulusan");
            redirect(base_url() . "kelulusan");
        }

        // Akademik
        else if ($q_akademik->num_rows() > 0) {
            foreach ($q_akademik->result() as $data) {
                $session['username'] = $data->username;
                $session['id'] = $data->id_user;
                $session['nama'] = $data->nama;
                $session['hak_akses'] = $data->hak_akses;
                $session['nama_jabatan'] = $data->nama_jabatan;
                $session['tipe'] = 'akademik';
                $this->session->set_userdata($session);
            }
            $log['username'] = $session['nama'];
            $log['ipaddress'] = $_SERVER['REMOTE_ADDR'];
            $log['hak_akses'] = $session['hak_akses'];
            $this->db->insert("log_login", $log);
            // redirect("../akademik");
            redirect(base_url() . "akademik");
        }
        // Admin Kesiswaan
        else if ($a_kesiswaan->num_rows() > 0) {
            foreach ($a_kesiswaan->result() as $data) {
                $session['username'] = $data->username;
                $session['id'] = $data->id_user;
                $session['nama'] = $data->nama;
                $session['hak_akses'] = $data->hak_akses;
                $session['nama_jabatan'] = $data->nama_jabatan;
                $session['tipe'] = 'kesiswaan';
                $this->session->set_userdata($session);
            }
            $log['username'] = $session['nama'];
            $log['ipaddress'] = $_SERVER['REMOTE_ADDR'];
            $log['hak_akses'] = $session['hak_akses'];
            $this->db->insert("log_login", $log);
            // redirect("../akademik");
            redirect(base_url() . "kesiswaan");
        }

        // Admin Keuangan
        else if ($a_keuangan->num_rows() > 0) {
            foreach ($a_keuangan->result() as $data) {
                $session['username'] = $data->username;
                $session['id'] = $data->id_user;
                $session['nama'] = $data->nama;
                $session['hak_akses'] = $data->hak_akses;
                $session['nama_jabatan'] = $data->nama_jabatan;
                $session['tipe'] = 'keuangan';
                $this->session->set_userdata($session);
            }
            $log['username'] = $session['nama'];
            $log['ipaddress'] = $_SERVER['REMOTE_ADDR'];
            $log['hak_akses'] = $session['hak_akses'];
            $this->db->insert("log_login", $log);
            // redirect("../akademik");
            redirect(base_url() . "keuangan");
        }
        // Admin Sarpas
        else if ($a_sarpas->num_rows() > 0) {
            foreach ($a_sarpas->result() as $data) {
                $session['username'] = $data->username;
                $session['id'] = $data->id_user;
                $session['nama'] = $data->nama;
                $session['hak_akses'] = $data->hak_akses;
                $session['nama_jabatan'] = $data->nama_jabatan;
                $session['tipe'] = 'sarpas';
                $this->session->set_userdata($session);
            }
            $log['username'] = $session['nama'];
            $log['ipaddress'] = $_SERVER['REMOTE_ADDR'];
            $log['hak_akses'] = $session['hak_akses'];
            $this->db->insert("log_login", $log);
            // redirect("../akademik");
            redirect(base_url() . "sarpas");
        } else {
            $this->session->set_flashdata("error", "Gagal Login. Username dan Password Salah");
            redirect(base_url());
        }
    }

    public function cek($in)
    {
        $username = $in['username'];
        $password = $in['password'];

        // done hak_akses=root, no_wa, username done
        $q_admin = $this->db->query("SELECT * FROM mst_admin WHERE username = '$username' AND password = '$password'");

        // done hak_akses=gurubk, hp, nip
        $q_bk = $this->db->query("SELECT * FROM mst_guru INNER JOIN mst_jabatan ON mst_guru.id_jabatan = mst_jabatan.id_jabatan WHERE nip = '$username' AND password = '$password' AND mst_guru.id_jabatan = 3");

        // done hak_akses=guru, hp, nip
        $q_guru = $this->db->query("SELECT * FROM mst_guru INNER JOIN mst_jabatan ON mst_guru.id_jabatan = mst_jabatan.id_jabatan WHERE nip = '$username' AND password = '$password' AND mst_guru.id_jabatan = 2");

        // done hak_akses=siswa, hp, nis
        $q_siswa = $this->db->query("SELECT * FROM mst_siswa WHERE nis = '$username' AND password = '$password'");

        // done hak_akses=dasview | das | kasir | bendahara, no_wa, username
        $q_keuangan = $this->db->query("SELECT * FROM mst_user INNER JOIN mst_jabatan ON mst_user.id_jabatan = mst_jabatan.id_jabatan WHERE username = '$username' AND password = '$password' AND (hak_akses = 'dasview' OR hak_akses = 'das' OR hak_akses = 'kasir' OR hak_akses = 'bendahara')");

        // done hak_akses=admin, no_wa, username
        $q_perpus = $this->db->query("SELECT * FROM mst_user INNER JOIN mst_jabatan ON mst_user.id_jabatan = mst_jabatan.id_jabatan WHERE username = '$username' AND password = '$password' AND mst_user.id_jabatan = '20'");

        // done hak_akses=admin no_wa, username
        $q_alumni = $this->db->query("SELECT * FROM mst_user INNER JOIN mst_jabatan ON mst_user.id_jabatan = mst_jabatan.id_jabatan WHERE username = '$username' AND password = '$password' AND mst_user.id_jabatan = '21'");

        // done hak_akses=admin no_wa, username
        $q_bukutamu = $this->db->query("SELECT * FROM mst_user INNER JOIN mst_jabatan ON mst_user.id_jabatan = mst_jabatan.id_jabatan WHERE username = '$username' AND password = '$password' AND mst_user.id_jabatan = '22'");

        // done hak_akses=admin no_wa, username
        $q_ppdb = $this->db->query("SELECT * FROM mst_user INNER JOIN mst_jabatan ON mst_user.id_jabatan = mst_jabatan.id_jabatan WHERE username = '$username' AND password = '$password' AND mst_user.id_jabatan = '23'");

        // done hak_akses=admin no_wa, username
        $q_kelulusan = $this->db->query("SELECT * FROM mst_user INNER JOIN mst_jabatan ON mst_user.id_jabatan = mst_jabatan.id_jabatan WHERE username = '$username' AND password = '$password' AND mst_user.id_jabatan = '24'");

        // done hak_akses=admin no_wa, username
        $q_akademik = $this->db->query("SELECT * FROM mst_user INNER JOIN mst_jabatan ON mst_user.id_jabatan = mst_jabatan.id_jabatan WHERE username = '$username' AND password = '$password' AND mst_user.id_jabatan = '9'");

        // Admin Kesiswaan
        $a_kesiswaan = $this->db->query("SELECT * FROM mst_user INNER JOIN mst_jabatan ON mst_user.id_jabatan = mst_jabatan.id_jabatan WHERE username = '$username' AND password = '$password' AND mst_user.id_jabatan = '25'");

        // Admin Keuangan
        $a_keuangan = $this->db->query("SELECT * FROM mst_user INNER JOIN mst_jabatan ON mst_user.id_jabatan = mst_jabatan.id_jabatan WHERE username = '$username' AND password = '$password' AND mst_user.id_jabatan = '10'");

        // Admin Sarpas
        $a_sarpas = $this->db->query("SELECT * FROM mst_user INNER JOIN mst_jabatan ON mst_user.id_jabatan = mst_jabatan.id_jabatan WHERE username = '$username' AND password = '$password' AND mst_user.id_jabatan = '26'");

        // Akses OTP Dashboard
        // Home, tipe=root, no_wa, $nama done
        if ($q_admin->num_rows() > 0) {
            foreach ($q_admin->result() as $data) {
                $session['username'] = $data->username;
                $session['password'] = $data->password;
                // $session['id'] = $data->id;
                // $session['nama'] = $data->nama;
                // $session['hak_akses'] = 'admin';
                // $session['nama_jabatan'] = 'Administrator';
                // $session['tipe'] = $data->tipe;
                $this->session->set_userdata($session);
            }
            // $log['username'] = $session['nama'];
            // $log['ipaddress'] = $_SERVER['REMOTE_ADDR'];
            // $log['hak_akses'] = $session['hak_akses'];
            // $this->db->insert("log_login", $log);

            $nomor = $q_admin->result()[0]->no_wa;
            $nama = $q_admin->result()[0]->nama;
            $curl = curl_init();
            $otp = rand(100000, 999999);
            $waktu = time();
            $data = [
                'target' => $nomor,
                // 'message' => "Atas nama " . $nama . " kode OTP anda adalah " . $otp,
                'message' => "Halo Admin Utama atas nama " . $nama . " kode OTP anda adalah " . $otp . " mohon masukan kode ini untuk masuk ke Sistem Informasi Akademik SMAN 3 Purwokerto. Harap jangan infokan kode OTP ini kepada siapapun. Terima Kasih",

            ];
            curl_setopt(
                $curl,
                CURLOPT_HTTPHEADER,
                array(
                    "Authorization: UQ4BDRhDALKdEHjPRiq4",
                )
            );
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
            curl_setopt($curl, CURLOPT_URL, "https://api.fonnte.com/send");
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
            $result = curl_exec($curl);
            curl_close($curl);

            $otp_data = array(
                'nomor' => $nomor,
                'otp' => $otp,
                'waktu' => $waktu,
            );
            $this->db->insert('otp', $otp_data);
            redirect("login/otp");
            // redirect("home");
            // home
        }

        // Kesiswaan, tipe=gurupiket, hp done, $nama_guru done
        else if ($q_bk->num_rows() > 0) {
            foreach ($q_bk->result() as $data) {
                $session['username'] = $data->nip;
                $session['password'] = $data->password;
                // $session['id'] = $data->id;
                // $session['nama'] = $data->nama;
                // $session['hak_akses'] = 'admin';
                // $session['nama_jabatan'] = 'Administrator';
                // $session['tipe'] = $data->tipe;
                $this->session->set_userdata($session);
            }
            // $log['username'] = $session['nama'];
            // $log['ipaddress'] = $_SERVER['REMOTE_ADDR'];
            // $log['hak_akses'] = $session['hak_akses'];
            // $this->db->insert("log_login", $log);

            $nomor = $q_bk->result()[0]->hp;
            $nama_guru = $q_bk->result()[0]->nama_guru;
            $curl = curl_init();
            $otp = rand(100000, 999999);
            $waktu = time();
            $data = [
                'target' => $nomor,
                'message' => "Halo Guru atas nama " . $nama_guru . " kode OTP anda adalah " . $otp . " mohon masukan kode ini untuk masuk ke SIstem Informasi Akademik SMAN 3 Purwokerto. Harap jangan infokan kode OTP ini kepada siapapun. Terima Kasih",
            ];

            curl_setopt(
                $curl,
                CURLOPT_HTTPHEADER,
                array(
                    "Authorization: UQ4BDRhDALKdEHjPRiq4",
                )
            );
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
            curl_setopt($curl, CURLOPT_URL, "https://api.fonnte.com/send");
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
            $result = curl_exec($curl);
            curl_close($curl);

            $otp_data = array(
                'nomor' => $nomor,
                'otp' => $otp,
                'waktu' => $waktu,
            );
            $this->db->insert('otp', $otp_data);
            redirect("login/otp");

            // redirect("../kesiswaan");
        }

        // akademik, tipe=gurupiket hp done $nama_guru done
        else if ($q_guru->num_rows() > 0) {
            foreach ($q_guru->result() as $data) {
                $session['username'] = $data->nip;
                $session['password'] = $data->password;
                // $session['id'] = $data->id;
                // $session['nama'] = $data->nama;
                // $session['hak_akses'] = 'admin';
                // $session['nama_jabatan'] = 'Administrator';
                // $session['tipe'] = $data->tipe;
                $this->session->set_userdata($session);
            }
            // $log['username'] = $session['nama'];
            // $log['ipaddress'] = $_SERVER['REMOTE_ADDR'];
            // $log['hak_akses'] = $session['hak_akses'];
            // $this->db->insert("log_login", $log);

            $nomor = $q_guru->result()[0]->hp;
            $nama_guru = $q_guru->result()[0]->nama_guru;
            $curl = curl_init();
            $otp = rand(100000, 999999);
            $waktu = time();
            $data = [
                'target' => $nomor,
                'message' => "Halo Guru atas nama " . $nama_guru . " kode OTP anda adalah " . $otp . " mohon masukan kode ini untuk masuk ke Sistem Informasi Akademik SMAN 3 Purwokerto. Harap jangan infokan kode OTP ini kepada siapapun. Terima Kasih",
            ];

            curl_setopt(
                $curl,
                CURLOPT_HTTPHEADER,
                array(
                    "Authorization: UQ4BDRhDALKdEHjPRiq4",
                )
            );
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
            curl_setopt($curl, CURLOPT_URL, "https://api.fonnte.com/send");
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
            $result = curl_exec($curl);
            curl_close($curl);

            $otp_data = array(
                'nomor' => $nomor,
                'otp' => $otp,
                'waktu' => $waktu,
            );
            $this->db->insert('otp', $otp_data);
            redirect("login/otp");
            // redirect(base_url() . "akademik");
            // redirect("../akademik");
        }

        // Keuangan, tipe=keuangan no_wa $nama done
        else if ($q_keuangan->num_rows() > 0) {
            foreach ($q_keuangan->result() as $data) {
                $session['username'] = $data->username;
                $session['password'] = $data->password;
                // $session['id'] = $data->id;
                // $session['nama'] = $data->nama;
                // $session['hak_akses'] = 'admin';
                // $session['nama_jabatan'] = 'Administrator';
                // $session['tipe'] = $data->tipe;
                $this->session->set_userdata($session);
            }
            // $log['username'] = $session['nama'];
            // $log['ipaddress'] = $_SERVER['REMOTE_ADDR'];
            // $log['hak_akses'] = $session['hak_akses'];
            // $this->db->insert("log_login", $log);

            $nomor = $q_keuangan->result()[0]->no_wa;
            $nama = $q_keuangan->result()[0]->nama;
            $curl = curl_init();
            $otp = rand(100000, 999999);
            $waktu = time();
            $data = [
                'target' => $nomor,
                'message' => "Halo Admin Keuangan atas nama " . $nama . " kode OTP anda adalah " . $otp . " mohon masukan kode ini untuk masuk ke SIstem Informasi Akademik SMAN 3 Purwokerto. Harap jangan infokan kode OTP ini kepada siapapun. Terima Kasih",
            ];

            curl_setopt(
                $curl,
                CURLOPT_HTTPHEADER,
                array(
                    "Authorization: UQ4BDRhDALKdEHjPRiq4",
                )
            );
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
            curl_setopt($curl, CURLOPT_URL, "https://api.fonnte.com/send");
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
            $result = curl_exec($curl);
            curl_close($curl);
            $otp_data = array(
                'nomor' => $nomor,
                'otp' => $otp,
                'waktu' => $waktu,
            );
            $this->db->insert('otp', $otp_data);
            redirect("login/otp");
            // redirect(base_url() . "keuangan");
            // redirect("../keuangan");
        }

        // akademik, tipe=siswa, hak_akses=siswa, hp, $nama_siswa done
        else if ($q_siswa->num_rows() > 0) {
            // var_dump($q_siswa->result()[0]->password);
            // die();
            foreach ($q_siswa->result() as $data) {

                // var_dump("SHIAP" . $data->username);
                // die();

                $session['username'] = $data->nis;
                $session['password'] = $data->password;
                // password
                // $session['id'] = $data->id;
                // $session['nama'] = $data->nama;
                // $session['hak_akses'] = 'admin';
                // $session['nama_jabatan'] = 'Administrator';
                // $session['tipe'] = $data->tipe;
                // var_dump($session);
                // die();
                $this->session->set_userdata($session);
            }

            // $log['username'] = $session['nama'];
            // $log['ipaddress'] = $_SERVER['REMOTE_ADDR'];
            // $log['hak_akses'] = $session['hak_akses'];
            // $this->db->insert("log_login", $log);

            $nomor = $q_siswa->result()[0]->hp;
            $nama_siswa = $q_siswa->result()[0]->nama_siswa;
            $curl = curl_init();
            $otp = rand(100000, 999999);
            $waktu = time();
            $data = [
                'target' => $nomor,
                'message' => "Halo Siswa atas nama " . $nama_siswa . " kode OTP anda adalah " . $otp . " mohon masukan kode ini untuk masuk ke SIstem Informasi Akademik SMAN 3 Purwokerto. Harap jangan infokan kode OTP ini kepada siapapun. Terima Kasih",
            ];

            curl_setopt(
                $curl,
                CURLOPT_HTTPHEADER,
                array(
                    "Authorization: UQ4BDRhDALKdEHjPRiq4",
                )
            );
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
            curl_setopt($curl, CURLOPT_URL, "https://api.fonnte.com/send");
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
            $result = curl_exec($curl);
            curl_close($curl);

            $otp_data = array(
                'nomor' => $nomor,
                'otp' => $otp,
                'waktu' => $waktu,
            );

            $this->db->insert('otp', $otp_data);
            redirect("login/otp");
            // redirect(base_url() . "akademik");
            // redirect("../akademik");
        }

        // perpustakaan, tipe=perpus, hak_askes=, no_wa, $nama done
        else if ($q_perpus->num_rows() > 0) {
            foreach ($q_perpus->result() as $data) {
                $session['username'] = $data->username;
                $session['password'] = $data->password;
                // $session['id'] = $data->id;
                // $session['nama'] = $data->nama;
                // $session['hak_akses'] = 'admin';
                // $session['nama_jabatan'] = 'Administrator';
                // $session['tipe'] = $data->tipe;
                $this->session->set_userdata($session);
            }
            // $log['username'] = $session['nama'];
            // $log['ipaddress'] = $_SERVER['REMOTE_ADDR'];
            // $log['hak_akses'] = $session['hak_akses'];
            // $this->db->insert("log_login", $log);

            $nomor = $q_perpus->result()[0]->no_wa;
            $nama = $q_perpus->result()[0]->nama;
            $curl = curl_init();
            $otp = rand(100000, 999999);
            $waktu = time();
            $data = [
                'target' => $nomor,
                'message' => "Halo Admin Perpus atas nama " . $nama . " kode OTP anda adalah " . $otp . " mohon masukan kode ini untuk masuk ke SIstem Informasi Akademik SMAN 3 Purwokerto. Harap jangan infokan kode OTP ini kepada siapapun. Terima Kasih",
            ];

            curl_setopt(
                $curl,
                CURLOPT_HTTPHEADER,
                array(
                    "Authorization: UQ4BDRhDALKdEHjPRiq4",
                )
            );
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
            curl_setopt($curl, CURLOPT_URL, "https://api.fonnte.com/send");
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
            $result = curl_exec($curl);
            curl_close($curl);

            $otp_data = array(
                'nomor' => $nomor,
                'otp' => $otp,
                'waktu' => $waktu,
            );
            $this->db->insert('otp', $otp_data);
            redirect("login/otp");

            // redirect(base_url() . "perpustakaan");
            // redirect("../perpustakaan");
        }

        // almuni, tipe=alumni, hak_akses= no_wa done
        else if ($q_alumni->num_rows() > 0) {
            foreach ($q_alumni->result() as $data) {
                $session['username'] = $data->username;
                $session['password'] = $data->password;
                // $session['id'] = $data->id;
                // $session['nama'] = $data->nama;
                // $session['hak_akses'] = 'admin';
                // $session['nama_jabatan'] = 'Administrator';
                // $session['tipe'] = $data->tipe;
                $this->session->set_userdata($session);
            }
            // $log['username'] = $session['nama'];
            // $log['ipaddress'] = $_SERVER['REMOTE_ADDR'];
            // $log['hak_akses'] = $session['hak_akses'];
            // $this->db->insert("log_login", $log);

            $nomor = $q_alumni->result()[0]->no_wa;
            $nama = $q_alumni->result()[0]->nama;
            $curl = curl_init();
            $otp = rand(100000, 999999);
            $waktu = time();
            $data = [
                'target' => $nomor,
                'message' => "Halo " . $nama . " kode OTP anda adalah " . $otp . " mohon masukan kode ini untuk masuk ke SIstem Informasi Akademik SMAN 3 Purwokerto. Harap jangan infokan kode OTP ini kepada siapapun. Terima Kasih",
            ];

            curl_setopt(
                $curl,
                CURLOPT_HTTPHEADER,
                array(
                    "Authorization: UQ4BDRhDALKdEHjPRiq4",
                )
            );
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
            curl_setopt($curl, CURLOPT_URL, "https://api.fonnte.com/send");
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
            $result = curl_exec($curl);
            curl_close($curl);

            $otp_data = array(
                'nomor' => $nomor,
                'otp' => $otp,
                'waktu' => $waktu,
            );
            $this->db->insert('otp', $otp_data);
            redirect("login/otp");
            // redirect(base_url() . "alumni");
            // redirect("../alumni");
        }

        // bukutamu, tipe=bukutamu, no_wa done
        else if ($q_bukutamu->num_rows() > 0) {
            foreach ($q_bukutamu->result() as $data) {
                $session['username'] = $data->username;
                $session['password'] = $data->password;
                // $session['id'] = $data->id;
                // $session['nama'] = $data->nama;
                // $session['hak_akses'] = 'admin';
                // $session['nama_jabatan'] = 'Administrator';
                // $session['tipe'] = $data->tipe;
                $this->session->set_userdata($session);
            }
            // $log['username'] = $session['nama'];
            // $log['ipaddress'] = $_SERVER['REMOTE_ADDR'];
            // $log['hak_akses'] = $session['hak_akses'];
            // $this->db->insert("log_login", $log);

            $nomor = $q_bukutamu->result()[0]->no_wa;
            $nama = $q_bukutamu->result()[0]->nama;
            $curl = curl_init();
            $otp = rand(100000, 999999);
            $waktu = time();
            $data = [
                'target' => $nomor,
                'message' => "Halo " . $nama . " kode OTP anda adalah " . $otp . " mohon masukan kode ini untuk masuk ke SIstem Informasi Akademik SMAN 3 Purwokerto. Harap jangan infokan kode OTP ini kepada siapapun. Terima Kasih",
            ];

            curl_setopt(
                $curl,
                CURLOPT_HTTPHEADER,
                array(
                    "Authorization: UQ4BDRhDALKdEHjPRiq4",
                )
            );
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
            curl_setopt($curl, CURLOPT_URL, "https://api.fonnte.com/send");
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
            $result = curl_exec($curl);
            curl_close($curl);

            $otp_data = array(
                'nomor' => $nomor,
                'otp' => $otp,
                'waktu' => $waktu,
            );
            $this->db->insert('otp', $otp_data);
            redirect("login/otp");

            // redirect("../bukutamu");
        }

        // ppdb, tipe=ppdb, no_wa done
        else if ($q_ppdb->num_rows() > 0) {
            foreach ($q_ppdb->result() as $data) {
                $session['username'] = $data->username;
                $session['password'] = $data->password;
                // $session['id'] = $data->id;
                // $session['nama'] = $data->nama;
                // $session['hak_akses'] = 'admin';
                // $session['nama_jabatan'] = 'Administrator';
                // $session['tipe'] = $data->tipe;
                $this->session->set_userdata($session);
            }
            // $log['username'] = $session['nama'];
            // $log['ipaddress'] = $_SERVER['REMOTE_ADDR'];
            // $log['hak_akses'] = $session['hak_akses'];
            // $this->db->insert("log_login", $log);

            $nomor = $q_ppdb->result()[0]->no_wa;
            $nama = $q_ppdb->result()[0]->nama;
            $curl = curl_init();
            $otp = rand(100000, 999999);
            $waktu = time();
            $data = [
                'target' => $nomor,
                'message' => "Halo Admin PPDB atas nama " . $nama . " kode OTP anda adalah " . $otp . " mohon masukan kode ini untuk masuk ke SIstem Informasi Akademik SMAN 3 Purwokerto. Harap jangan infokan kode OTP ini kepada siapapun. Terima Kasih",
            ];

            curl_setopt(
                $curl,
                CURLOPT_HTTPHEADER,
                array(
                    "Authorization: UQ4BDRhDALKdEHjPRiq4",
                )
            );
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
            curl_setopt($curl, CURLOPT_URL, "https://api.fonnte.com/send");
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
            $result = curl_exec($curl);
            curl_close($curl);

            $otp_data = array(
                'nomor' => $nomor,
                'otp' => $otp,
                'waktu' => $waktu,
            );
            $this->db->insert('otp', $otp_data);
            redirect("login/otp");
            // redirect(base_url() . "ppdb");
            // redirect("../ppdb");
        }

        // kelulusan, tipe=kelulusan, no_wa done
        else if ($q_kelulusan->num_rows() > 0) {
            foreach ($q_kelulusan->result() as $data) {
                $session['username'] = $data->username;
                $session['password'] = $data->password;
                // $session['id'] = $data->id;
                // $session['nama'] = $data->nama;
                // $session['hak_akses'] = 'admin';
                // $session['nama_jabatan'] = 'Administrator';
                // $session['tipe'] = $data->tipe;
                $this->session->set_userdata($session);
            }
            // $log['username'] = $session['nama'];
            // $log['ipaddress'] = $_SERVER['REMOTE_ADDR'];
            // $log['hak_akses'] = $session['hak_akses'];
            // $this->db->insert("log_login", $log);

            $nomor = $q_kelulusan->result()[0]->no_wa;
            $nama = $q_kelulusan->result()[0]->nama;
            $curl = curl_init();
            $otp = rand(100000, 999999);
            $waktu = time();
            $data = [
                'target' => $nomor,
                'message' => "Halo " . $nama . " kode OTP anda adalah " . $otp . " mohon masukan kode ini untuk masuk ke SIstem Informasi Akademik SMAN 3 Purwokerto. Harap jangan infokan kode OTP ini kepada siapapun. Terima Kasih",
            ];

            curl_setopt(
                $curl,
                CURLOPT_HTTPHEADER,
                array(
                    "Authorization: UQ4BDRhDALKdEHjPRiq4",
                )
            );
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
            curl_setopt($curl, CURLOPT_URL, "https://api.fonnte.com/send");
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
            $result = curl_exec($curl);
            curl_close($curl);

            $otp_data = array(
                'nomor' => $nomor,
                'otp' => $otp,
                'waktu' => $waktu,
            );
            $this->db->insert('otp', $otp_data);
            redirect("login/otp");
            // redirect(base_url() . "kelulusan");
            // redirect("../kelulusan");
        }
        // akademik, tipe=akademik, hak_ases=adminakademik, no_wa
        else if ($q_akademik->num_rows() > 0) {
            foreach ($q_akademik->result() as $data) {
                $session['username'] = $data->username;
                $session['password'] = $data->password;
                $this->session->set_userdata($session);
            }
            // $log['username'] = $session['nama'];
            // $log['ipaddress'] = $_SERVER['REMOTE_ADDR'];
            // $log['hak_akses'] = $session['hak_akses'];
            // $this->db->insert("log_login", $log);

            $nomor = $q_akademik->result()[0]->no_wa;
            $nama = $q_akademik->result()[0]->nama;
            $curl = curl_init();
            $otp = rand(100000, 999999);
            $waktu = time();
            $data = [
                'target' => $nomor,
                'message' => "Halo Admin Akademik atas nama " . $nama . " kode OTP anda adalah " . $otp . " mohon masukan kode ini untuk masuk ke SIstem Informasi Akademik SMAN 3 Purwokerto. Harap jangan infokan kode OTP ini kepada siapapun. Terima Kasih",
            ];

            curl_setopt(
                $curl,
                CURLOPT_HTTPHEADER,
                array(
                    "Authorization: UQ4BDRhDALKdEHjPRiq4",
                )
            );
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
            curl_setopt($curl, CURLOPT_URL, "https://api.fonnte.com/send");
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
            $result = curl_exec($curl);
            curl_close($curl);
            $otp_data = array(
                'nomor' => $nomor,
                'otp' => $otp,
                'waktu' => $waktu,
            );
            $this->db->insert('otp', $otp_data);
            redirect("login/otp");

            // redirect("../akademik");
        }
        // Admin Kesiswaan
        else if ($a_kesiswaan->num_rows() > 0) {
            foreach ($a_kesiswaan->result() as $data) {
                $session['username'] = $data->username;
                $session['password'] = $data->password;
                // $session['id'] = $data->id;
                // $session['nama'] = $data->nama;
                // $session['hak_akses'] = 'admin';
                // $session['nama_jabatan'] = 'Administrator';
                // $session['tipe'] = $data->tipe;
                $this->session->set_userdata($session);
            }
            // $log['username'] = $session['nama'];
            // $log['ipaddress'] = $_SERVER['REMOTE_ADDR'];
            // $log['hak_akses'] = $session['hak_akses'];
            // $this->db->insert("log_login", $log);

            $nomor = $a_kesiswaan->result()[0]->no_wa;
            $nama = $a_kesiswaan->result()[0]->nama;
            $curl = curl_init();
            $otp = rand(100000, 999999);
            $waktu = time();
            $data = [
                'target' => $nomor,
                'message' => "Halo Admin Kesiswaan atas nama " . $nama . " kode OTP anda adalah " . $otp . " mohon masukan kode ini untuk masuk ke SIstem Informasi Akademik SMAN 3 Purwokerto. Harap jangan infokan kode OTP ini kepada siapapun. Terima Kasih",
            ];

            curl_setopt(
                $curl,
                CURLOPT_HTTPHEADER,
                array(
                    "Authorization: UQ4BDRhDALKdEHjPRiq4",
                )
            );
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
            curl_setopt($curl, CURLOPT_URL, "https://api.fonnte.com/send");
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
            $result = curl_exec($curl);
            curl_close($curl);

            $otp_data = array(
                'nomor' => $nomor,
                'otp' => $otp,
                'waktu' => $waktu,
            );
            $this->db->insert('otp', $otp_data);
            redirect("login/otp");
            // redirect(base_url() . "kelulusan");
            // redirect("../kelulusan");
        }
        // Admin Keuangan
        else if ($a_keuangan->num_rows() > 0) {
            foreach ($a_keuangan->result() as $data) {
                $session['username'] = $data->username;
                $session['password'] = $data->password;
                // $session['id'] = $data->id;
                // $session['nama'] = $data->nama;
                // $session['hak_akses'] = 'admin';
                // $session['nama_jabatan'] = 'Administrator';
                // $session['tipe'] = $data->tipe;
                $this->session->set_userdata($session);
            }
            // $log['username'] = $session['nama'];
            // $log['ipaddress'] = $_SERVER['REMOTE_ADDR'];
            // $log['hak_akses'] = $session['hak_akses'];
            // $this->db->insert("log_login", $log);

            $nomor = $a_keuangan->result()[0]->no_wa;
            $nama = $a_keuangan->result()[0]->nama;
            $curl = curl_init();
            $otp = rand(100000, 999999);
            $waktu = time();
            $data = [
                'target' => $nomor,
                'message' => "Halo Admin Keuangan atas nama " . $nama . " kode OTP anda adalah " . $otp . " mohon masukan kode ini untuk masuk ke SIstem Informasi Akademik SMAN 3 Purwokerto. Harap jangan infokan kode OTP ini kepada siapapun. Terima Kasih",
            ];

            curl_setopt(
                $curl,
                CURLOPT_HTTPHEADER,
                array(
                    "Authorization: UQ4BDRhDALKdEHjPRiq4",
                )
            );
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
            curl_setopt($curl, CURLOPT_URL, "https://api.fonnte.com/send");
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
            $result = curl_exec($curl);
            curl_close($curl);

            $otp_data = array(
                'nomor' => $nomor,
                'otp' => $otp,
                'waktu' => $waktu,
            );
            $this->db->insert('otp', $otp_data);
            redirect("login/otp");
            // redirect(base_url() . "kelulusan");
            // redirect("../kelulusan");
        }

        // Admin Sarpas
        else if ($a_sarpas->num_rows() > 0) {
            foreach ($a_sarpas->result() as $data) {
                $session['username'] = $data->username;
                $session['password'] = $data->password;
                // $session['id'] = $data->id;
                // $session['nama'] = $data->nama;
                // $session['hak_akses'] = 'admin';
                // $session['nama_jabatan'] = 'Administrator';
                // $session['tipe'] = $data->tipe;
                $this->session->set_userdata($session);
            }
            // $log['username'] = $session['nama'];
            // $log['ipaddress'] = $_SERVER['REMOTE_ADDR'];
            // $log['hak_akses'] = $session['hak_akses'];
            // $this->db->insert("log_login", $log);

            $nomor = $a_sarpas->result()[0]->no_wa;
            $nama = $a_sarpas->result()[0]->nama;
            $curl = curl_init();
            $otp = rand(100000, 999999);
            $waktu = time();
            $data = [
                'target' => $nomor,
                'message' => "Halo Admin SARPRAS atas nama " . $nama . " kode OTP anda adalah " . $otp . " mohon masukan kode ini untuk masuk ke SIstem Informasi Akademik SMAN 3 Purwokerto. Harap jangan infokan kode OTP ini kepada siapapun. Terima Kasih",
            ];

            curl_setopt(
                $curl,
                CURLOPT_HTTPHEADER,
                array(
                    "Authorization: UQ4BDRhDALKdEHjPRiq4",
                )
            );
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
            curl_setopt($curl, CURLOPT_URL, "https://api.fonnte.com/send");
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
            $result = curl_exec($curl);
            curl_close($curl);

            $otp_data = array(
                'nomor' => $nomor,
                'otp' => $otp,
                'waktu' => $waktu,
            );
            $this->db->insert('otp', $otp_data);
            redirect("login/otp");
            // redirect(base_url() . "kelulusan");
            // redirect("../kelulusan");
        } else {
            $this->session->set_flashdata("error", "Gagal Login. Username dan Password Salah");
            redirect(base_url());
        }
    }
}