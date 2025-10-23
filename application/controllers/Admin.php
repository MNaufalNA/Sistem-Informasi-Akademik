<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('tipe') != "root") {
            redirect(base_url() . $this->session->userdata('tipe'));
        } else {
            $this->load->Model('User_model');
            $this->load->Model('Combo_model');
        }
    }

    public function edit()
    {
        if ($this->session->userdata('tipe') != "root") {
            redirect(base_url() . $this->session->userdata('tipe'));
        } else {
            $username = $this->session->userdata('username');
            $admin = $this->db->query("SELECT * FROM mst_admin WHERE username = '$username'");
            // var_dump($admin->result()[0]);
            // die();
            // $username = $this->session->userdata('tipe');
            $d['judul'] = "Edit Profile Admin";
            $d['judul2'] = "Edit Profile";
            $d['id'] = $admin->result()[0]->id;
            $d['nama'] = $admin->result()[0]->nama;
            $d['username'] = $admin->result()[0]->username;
            $d['password'] = $admin->result()[0]->password;
            $d['no_wa'] = $admin->result()[0]->no_wa;
            $this->load->view('top', $d);
            $this->load->view('menu');
            $this->load->view('profile/admin_edit');
            $this->load->view('bottom');
        }
    }
    public function update()
    {
        $in['nama'] = $this->input->post("nama");
        $in['username'] = $this->input->post("username");
        $in['password'] = $this->input->post("password");
        $in['no_wa'] = $this->input->post("no_wa");

        if ($this->session->userdata('tipe') != "root") {
            redirect(base_url() . $this->session->userdata('tipe'));
        } else {
            $where['id'] = $this->input->post('id');
            $cek = $this->db->query("SELECT username FROM mst_admin WHERE username = '$in[username]' AND id != '$where[id]'");
            if ($cek->num_rows() > 0) {
                $this->session->set_flashdata("error", "Gagal Input. Username Sudah Digunakan");
                redirect("admin/admin_edit");
            } else {
                $this->db->update("mst_admin", $in, $where);
                $this->session->set_flashdata("success", "Ubah Data Admin Berhasil");
                redirect(base_url());
            }
        }
    }
}
