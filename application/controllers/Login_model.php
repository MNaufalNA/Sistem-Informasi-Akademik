<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Login_model extends CI_Model
{

    // public function get_no_wa()
    // {

    // }

    public function cek_otp($in)
    {
        $username = $in['username'];
        $password = $in['password'];
        var_dump($username, $password);
        die();
        // if ($nomor) {
        //     if (!mysqli_query($conn, "DELETE FROM otp WHERE nomor = $nomor")) {
        //         echo ("Error description: " . mysqli_error($con));
        //     }
        //     $curl = curl_init();
        //     $otp = rand(100000, 999999);
        //     $waktu = time();
        //     mysqli_query($conn, "INSERT INTO otp (nomor,otp,waktu) VALUES ( $nomor ,$otp , $waktu )");
        //     $data = [
        //         'target' => $nomor,
        //         'message' => "Your OTP : " . $otp,
        //     ];

        //     curl_setopt(
        //         $curl,
        //         CURLOPT_HTTPHEADER,
        //         array(
        //             "Authorization: Tkp8cNMDyS45hNiQkXWe",
        //         )
        //     );
        //     curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
        //     curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        //     curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
        //     curl_setopt($curl, CURLOPT_URL, "https://api.fonnte.com/send");
        //     curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        //     curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
        //     $result = curl_exec($curl);
        //     curl_close($curl);
        // }
    }

    public function cek($in)
    {
        var_dump($in);
        die();
        $username = $in['username'];
        $password = $in['password'];
        $q_admin = $this->db->query("SELECT * FROM mst_admin WHERE username = '$username' AND password = '$password'");
        $q_bk = $this->db->query("SELECT * FROM mst_guru INNER JOIN mst_jabatan ON mst_guru.id_jabatan = mst_jabatan.id_jabatan
WHERE nip = '$username' AND password = '$password' AND mst_guru.id_jabatan = 3");
        $q_guru = $this->db->query("SELECT * FROM mst_guru INNER JOIN mst_jabatan ON mst_guru.id_jabatan =
mst_jabatan.id_jabatan WHERE nip = '$username' AND password = '$password' AND mst_guru.id_jabatan = 2");
        $q_siswa = $this->db->query("SELECT * FROM mst_siswa WHERE nis = '$username' AND password = '$password'");
        $q_keuangan = $this->db->query("SELECT * FROM mst_user INNER JOIN mst_jabatan ON mst_user.id_jabatan =
mst_jabatan.id_jabatan WHERE username = '$username' AND password = '$password' AND (hak_akses = 'das' OR hak_akses =
'kasir' OR hak_akses = 'bendahara')");
        $q_perpus = $this->db->query("SELECT * FROM mst_user INNER JOIN mst_jabatan ON mst_user.id_jabatan =
mst_jabatan.id_jabatan WHERE username = '$username' AND password = '$password' AND mst_user.id_jabatan = '20'");

// admin utama
        if ($q_admin->num_rows() > 0) {
            // foreach ($q_admin->result() as $data) {
            //     $session['username'] = $data->username;
            //     $session['id'] = $data->id;
            //     $session['nama'] = $data->nama;
            //     $session['hak_akses'] = 'admin';
            //     $session['nama_jabatan'] = 'Administrator';
            //     $session['tipe'] = $data->tipe;
            //     $this->session->set_userdata($session);
            // }
            // redirect("home");

            // if (isset($_POST['submit-login'])) {
            //     $otp = mysqli_escape_string($conn, $_POST['otp']);
            //     $nomor = mysqli_escape_string($conn, $_POST['nomor']);
            //     $q = mysqli_query($conn, "SELECT * FROM otp WHERE nomor = $nomor AND otp = $otp");
            //     $row = mysqli_num_rows($q);
            //     $r = mysqli_fetch_array($q);
            //     if ($row) {
            //         if (time() - $r['waktu'] <= 300) {
            //             // $this->Login_model->cek($in);
            //             // redirect(base_url("/home"));
            //             foreach ($q_admin->result() as $data) {
            //                 $session['username'] = $data->username;
            //                 $session['id'] = $data->id;
            //                 $session['nama'] = $data->nama;
            //                 $session['hak_akses'] = 'admin';
            //                 $session['nama_jabatan'] = 'Administrator';
            //                 $session['tipe'] = $data->tipe;
            //                 $this->session->set_userdata($session);
            //             }
            //             redirect("home");
            //         } else {echo "otp expired";}
            //     } else {echo "otp salah";}
            // }
// guru piket
        } else if ($q_bk->num_rows() > 0) {
            foreach ($q_bk->result() as $data) {
                $session['username'] = $data->nip;
                $session['id'] = $data->id_guru;
                $session['nama'] = $data->nama_guru;
                $session['hak_akses'] = $data->hak_akses;
                $session['tipe'] = 'gurupiket';
                $this->session->set_userdata($session);
            }
            redirect(base_url() . "gurupiket");

// gurupiket
        } else if ($q_guru->num_rows() > 0) {
            foreach ($q_guru->result() as $data) {
                $session['username'] = $data->nip;
                $session['id'] = $data->id_guru;
                $session['nama'] = $data->nama_guru;
                $session['hak_akses'] = $data->hak_akses;
                $session['tipe'] = 'gurupiket';
                $this->session->set_userdata($session);
            }
            redirect(base_url() . "gurupiket");

// keuangan
        } else if ($q_keuangan->num_rows() > 0) {
            foreach ($q_keuangan->result() as $data) {
                $session['username'] = $data->username;
                $session['id'] = $data->id_user;
                $session['nama'] = $data->nama;
                $session['hak_akses'] = $data->hak_akses;
                $session['nama_jabatan'] = $data->nama_jabatan;
                $session['tipe'] = 'keuangan';
                $this->session->set_userdata($session);
            }
            redirect(base_url() . "keuangan");

// akademik
        } else if ($q_siswa->num_rows() > 0) {
            foreach ($q_siswa->result() as $data) {
                $session['username'] = $data->nis;
                $session['id'] = $data->id_siswa;
                $session['nama'] = $data->nama_siswa;
                $session['hak_akses'] = 'siswa';
                $session['tipe'] = 'siswa';
                $this->session->set_userdata($session);
            }
            redirect(base_url() . "/akademik");

// perpustakaan
        } else if ($q_perpus->num_rows() > 0) {
            foreach ($q_perpus->result() as $data) {
                $session['username'] = $data->username;
                $session['id'] = $data->id_user;
                $session['nama'] = $data->nama;
                $session['hak_akses'] = $data->hak_akses;
                $session['nama_jabatan'] = $data->nama_jabatan;
                $session['tipe'] = 'perpus';
                $this->session->set_userdata($session);
            }
            redirect(base_url() . "perpustakaan");

// selesai
        } else {
            $this->session->set_flashdata("error", "Gagal Login. Username dan Password Salah");
            redirect(base_url());
        }
    }
}