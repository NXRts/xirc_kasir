<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function index()
    {
        $data = array(
            'judul_halaman' => 'XIRC | KASIR | Login',
        );
        $this->load->view('login', $data);
    }

    // bagian untuk login pengguna kedalam HOME
    public function login()
    {
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));
        $this->db->from('user')->where('username', $username);
        $cek = $this->db->get()->row();
        if ($cek == NULL) {
            $this->session->set_flashdata('notivikasi', '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Data tidak ditemukan</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            ');
            redirect('auth');
        } else if ($cek->password == $password) {
            $data = array(
                'id_user'       => $cek->id_user,
                'username'      => $cek->username,
                'level'         => $cek->level,
                'nama'          => $cek->nama,
            );
            $this->session->set_userdata($data);
            redirect('home');
        } else {
            $this->session->set_flashdata('notivikasi', '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Password Salah</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            ');
            redirect('auth');
        }
    }

    // bagian logout
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth');
    }
}
