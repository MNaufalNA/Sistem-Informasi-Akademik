<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function index()
    {
        redirect(base_url());
    }

    public function cek()
    {
        if ($this->input->method(true) == 'POST' && ! empty($_POST)) {
            $in['username'] = $this->input->post('username');
            $in['password'] = $this->input->post('password');
            $in['jenis']    = $this->input->post('jenis');
            $this->Login_model->cek($in);
        } else {
            redirect(base_url());
        }
    }

    public function otp()
    {
        return $this->load->view('otp');
    }

    public function cek_otp()
    {
        if ($this->input->method(true) == 'POST' && ! empty($_POST)) {
            if (isset($_POST['submit-login'])) {
                $otp = $_POST['otp'];
                $q   = $this->db->query("SELECT * FROM otp WHERE otp = '$otp'");
                if ($q->num_rows() > 0) {
                    // if (time() - $q->result()[0]->waktu <= 300) {
                    if (time() - $q->result()[0]->waktu <= 300) {
                        // $username = $_SESSION['username'];
                        // $password = $_SESSION['password'];
                        $in['username'] = $_SESSION['username'];
                        $in['password'] = $_SESSION['password'];
                        // $in['jenis'] = $this->input->post('jenis');
                        // $this->Login_model->cek($in);
                        $this->Login_model->cek_otp($in);
                        // redirect(base_url() . "home");
                    } else {
                        $_SESSION['status']  = 'error';
                        $_SESSION['message'] = 'Kode OTP Expired, Silakan Login Kembali!!';
                        redirect(base_url());
                    }
                } else {
                    session_destroy();
                    $this->load->view('error_otp');
                }
            }
        } else {
            redirect(base_url());
        }
    }
    // public function cek_otp2()
    // {
    //     if ($this->input->method(true) == 'POST' && !empty($_POST)) {
    //         if (isset($_POST['submit-login'])) {
    //             $otp = $_POST['otp'];
    //             // $in['username'] = $this->input->post('username');
    //             // $in['password'] = $this->input->post('password');
    //             // $in['jenis'] = $this->input->post('jenis');

    //             // var_dump($in);
    //             // die();

    //             $q = $this->db->query("SELECT * FROM otp WHERE otp = '$otp'");
    //             // $row = mysqli_num_rows($q);
    //             // $row = $q->row();
    //             // $nomor = $q->result()[0]->no_wa;

    //             // mysqli_num_rows($result) != 0
    //             if ($q->num_rows() > 0) {
    //                 if (time() - $q->result()[0]->waktu <= 300) {
    //                     $tipe = $_SESSION['tipe'];
    //                     switch ($tipe) {
    //                         case "root":
    //                             //code block
    //                             // $nomor = $q->result()[0]->nomor;
    //                             // $q_admin = $this->db->query("SELECT * FROM mst_admin WHERE no_wa = '$nomor'");
    //                             // foreach ($q_admin->result() as $data) {
    //                             //     $session['username'] = $data->username;
    //                             //     $session['id'] = $data->id;
    //                             //     $session['nama'] = $data->nama;
    //                             //     $session['hak_akses'] = 'admin';
    //                             //     $session['nama_jabatan'] = 'Administrator';
    //                             //     $session['tipe'] = $data->tipe;
    //                             //     $this->session->set_userdata($session);
    //                             // }
    //                             // $log['username'] = $session['nama'];
    //                             // $log['ipaddress'] = $_SERVER['REMOTE_ADDR'];
    //                             // $log['hak_akses'] = $session['hak_akses'];
    //                             // $this->db->insert("log_login", $log);
    //                             redirect(base_url() . "home");
    //                             break;
    //                         case "gurupiket":
    //                             $hak_akses = $_SESSION['hak_akses'];
    //                             //code block;
    //                             if ($hak_akses = 'gurubk') {
    //                                 redirect(base_url() . "akademik");
    //                             } else {
    //                                 redirect(base_url() . "kesiswaan");
    //                             }
    //                             break;
    //                         case "keuangan":
    //                             //code block
    //                             redirect(base_url() . "keuangan");
    //                             break;
    //                         case "siswa":
    //                             //code block
    //                             redirect(base_url() . "akademik");
    //                             break;
    //                         case "perpus":
    //                             //code block
    //                             redirect(base_url() . "perpus");
    //                             break;
    //                         case "alumni":
    //                             //code block
    //                             redirect(base_url() . "alumni");
    //                             break;
    //                         case "bukutamu":
    //                             //code block
    //                             redirect(base_url() . "bukutamu");
    //                             break;
    //                         case "ppdb":
    //                             //code block
    //                             redirect(base_url() . "ppdb");
    //                             break;
    //                         case "kelulusan":
    //                             //code block
    //                             redirect(base_url() . "kelulusan");
    //                             break;
    //                         case "akademik":
    //                             redirect(base_url() . "akademik");
    //                             break;
    //                         default:
    //                             redirect(base_url());
    //                     }
    //                     // var_dump($name);
    //                     // die();
    //                     // $name = $this->session->name;

    //                     // die();
    //                     // $num = $result->num_rows();
    //                     // var_dump("Masuk true");
    //                     // die();
    //                     // $this->Login_model->cek($in);
    //                     redirect(base_url() . "home");
    //                 } else {
    //                     // var_dump("Masuk false");
    //                     // die();
    //                     session_destroy();
    //                     // redirect(base_url());
    //                     redirect(base_url() . "/sia-otp");
    //                 }
    //             } else {
    //                 session_destroy();
    //                 $this->load->view('error_otp');
    //             }
    //         }
    //     } else {
    //         redirect(base_url());
    //     }
    // }

}
