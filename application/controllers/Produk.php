<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
{
    // mesortir level
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('level') !== 'Admin') {
            redirect('home');
        }
    }

    public function index()
    {
        $this->db->select('*')->from('produk');
        $this->db->order_by('nama_produk', 'ASC');
        $user = $this->db->get()->result_array();
        $data = array(
            'judul_halaman' => 'XIRC | KASIR | Data Produk',
            'user'          => $user,
        );
        $this->template->load('template', 'produk_index', $data);
    }

    // Bagian Untuk menyimpan data produk
    public function simpan()
    {
        $cek = $this->db->select('*')->from('produk')->where('kode_produk', $this->input->post('kode_produk'))->get()->result_array();
        if ($cek == NULL) {
            $data = array(
                'kode_produk'   => $this->input->post('kode_produk'),
                'nama_produk'   => $this->input->post('nama_produk'),
                'stok'          => $this->input->post('stok'),
                'harga'         => $this->input->post('harga'),
            );

            $this->db->insert('produk', $data);
            $this->session->set_flashdata('notivikasi', '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Data Produk Berhasil di Tambahkan</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            ');
        } else {
            $this->session->set_flashdata('notivikasi', '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Kode Produk Sudah Ada</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            ');
        }
        redirect('produk');
    }

    // Bagian untu menhapus data produk
    public function hapus($id_produk)
    {
        $where = array('id_produk'   => $id_produk);
        $this->db->delete('produk', $where);
        $this->session->set_flashdata('notivikasi', '
            <div class="alert alert-secondary  alert-dismissible fade show" role="alert">
                <strong>Data Produk Berhasil Dihapus</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            ');
        redirect('produk');
    }

    // Bagian untuk mengedit data produk
    public function edit($id_produk)
    {
        $this->db->from('produk')->where('id_produk', $id_produk);
        $user = $this->db->get()->row();
        $data = array(
            'judul_halaman' => 'XIRC | KASIR | Edit Data Produk',
            'user'          => $user,
        );
        $this->template->load('template', 'produk_edit', $data);
    }

    // bagian untuk mengupdate data produk
    public function update()
    {
        $data = array(
            'kode_produk'   => $this->input->post('kode_produk'),
            'nama_produk'   => $this->input->post('nama_produk'),
            'stok'          => $this->input->post('stok'),
            'harga'         => $this->input->post('harga'),
        );
        $where = array('id_produk' => $this->input->post('id_produk'));
        $this->db->update('produk', $data, $where);
        $this->session->set_flashdata('notivikasi', '
        <div class="alert alert-secondary  alert-dismissible fade show" role="alert">
            <strong>Data Produk Berhasil Diperbarui</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        ');
        redirect('produk');
    }

    public function print(){
        $this->db->select('*')->from('produk');
        $this->db->order_by('nama_produk', 'ASC');
        $status = $this->input->get('status');
        if($status=='Ada'){
            $this->db->where('stok > ' ,0);
        } else if($status=='Habis'){
            $this->db->where('stok' ,0);
        }
        $produk = $this->db->get()->result_array();
        $data = array(
            'status'            => $status,
            'produk'            => $produk,
        );
        $this->load->view('print_produk', $data);
    }
}
