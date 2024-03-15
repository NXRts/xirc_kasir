<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan extends CI_Controller
{
    // mesortir level
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('level') == 'NULL') {
            redirect('auth');
        }
    }
    public function index()
    {
        $this->db->select('*')->from('pelanggan');
        $this->db->order_by('nama', 'ASC');
        $user = $this->db->get()->result_array();
        $data = array(
            'judul_halaman' => 'XIRC | KASIR | Data Pelanggan',
            'user'          => $user,
        );
        $this->template->load('template', 'pelanggan_index', $data);
    }

    // bagian untuk menyimpan data pengguna
    public function simpan()
    {
        $data = array(
            'alamat'        => $this->input->post('alamat'),
            'telp'          => $this->input->post('telp'),
            'nama'          => $this->input->post('nama'),
        );

        $this->db->insert('pelanggan', $data);
        $this->session->set_flashdata('notivikasi', '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Data Pelanggan Berhasil di Tambahkan</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            ');
        redirect('pelanggan');
    }

    // bagian untuk mebghapus data pelanggan
    public function hapus($id_pelanggan)
    {
        $where = array('id_pelanggan'   => $id_pelanggan);
        $this->db->delete('pelanggan', $where);
        $this->session->set_flashdata('notivikasi', '
            <div class="alert alert-secondary  alert-dismissible fade show" role="alert">
                <strong>Data Pelanggan Berhasil Dihapus</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            ');
        redirect('pelanggan');
    }

    // begian untuk mengedit data pelanggan
    public function edit($id_pelanggan)
    {
        $this->db->from('pelanggan')->where('id_pelanggan', $id_pelanggan);
        $user = $this->db->get()->row();
        $data = array(
            'judul_halaman' => 'XIRC | KASIR | Edit Data Pelanggan',
            'user'          => $user,
        );
        $this->template->load('template', 'pelanggan_edit', $data);
    }

    // begian untuk mengupdate data pelanggan 
    public function update()
    {
        $data = array(
            'nama'          => $this->input->post('nama'),
            'alamat'        => $this->input->post('alamat'),
            'telp'          => $this->input->post('telp'),
        );
        $where = array('id_pelanggan' => $this->input->post('id_pelanggan'));
        $this->db->update('pelanggan', $data, $where);
        $this->session->set_flashdata('notivikasi', '
        <div class="alert alert-secondary  alert-dismissible fade show" role="alert">
            <strong>Data Pelanggan Berhasil Diperbarui</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        ');
        redirect('pelanggan');
    }

    public function hai(){
        
    }
}
