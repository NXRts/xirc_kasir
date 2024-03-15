<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengguna extends CI_Controller
{

    // mesortir level
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('level') != 'Admin') {
            redirect('home');
        }
    }

    public function index()
    {
        $this->db->select('*')->from('user');
        $this->db->order_by('nama', 'ASC');
        $user = $this->db->get()->result_array();
        $data = array(
            'judul_halaman' => 'XIRC | KASIR | Data Pengguna',
            'user'          => $user,
        );
        $this->template->load('template', 'pengguna_index', $data);
    }

    // Bagian Untuk menyimpan data
    public function simpan()
    {
        $cek = $this->db->select('*')->from('user')->where('username', $this->input->post('username'))->get()->result_array();
        if ($cek == NULL) {
            $data = array(
                'username' => $this->input->post('username'),
                'password' => md5($this->input->post('password')),
                'nama' => $this->input->post('nama'),
                'level' => $this->input->post('level'),
            );

            $this->db->insert('user', $data);
            $this->session->set_flashdata('notivikasi', '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Data Berhasil di Tambahkan</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            ');
        } else {
            $this->session->set_flashdata('notivikasi', '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Data Sudah Ada</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            ');
        }
        redirect('pengguna');
    }

    // Bagian Hapus Data
    public function hapus($id_user)
    {
        $where = array('id_user'   => $id_user);
        $this->db->delete('user', $where);
        $this->session->set_flashdata('notivikasi', '
            <div class="alert alert-secondary  alert-dismissible fade show" role="alert">
                <strong>Data Pengguna Berhasil Dihapus</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            ');
        redirect('pengguna');
    }

    // Bagian Edit Data | Pindah Halaman Ke Folder pengguna -> pengguna_edit.php
    public function edit($id_user)
    {
        $this->db->from('user')->where('id_user', $id_user);
        $user = $this->db->get()->row();
        $data = array(
            'judul_halaman' => 'XIRC | KASIR | Edit Data Pengguna',
            'user'          => $user,
        );
        $this->template->load('template', 'pengguna_edit', $data);
    }

    // Baguan Untuk update data
    public function update()
    {
        $data = array(
            'nama'  => $this->input->post('nama'),
            'level' => $this->input->post('level'),
        );
        $where = array('id_user' => $this->input->post('id_user'));
        $this->db->update('user', $data, $where);
        $this->session->set_flashdata('notivikasi', '
        <div class="alert alert-secondary  alert-dismissible fade show" role="alert">
            <strong>Data Pengguna Berhasil Diperbarui</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        ');
        redirect('pengguna');
    }

    // Bagian Untuk Reset Data
    public function reset($id_user)
    {
        $data = array(
            'password'  => md5('1234'),
        );
        $where = array('id_user' => $id_user);
        $this->db->update('user', $data, $where);
        $this->session->set_flashdata('notivikasi', '
        <div class="alert alert-secondary  alert-dismissible fade show" role="alert">
            <strong>Password direset menjadi 1234</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        ');
        redirect('pengguna');
    }
}
