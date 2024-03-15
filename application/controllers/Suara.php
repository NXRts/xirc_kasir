<?php
defined('BASEPATH') or exit('No direct script access allowed');

class suara extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('level') !== 'Admin') {
            redirect('home');
        }
    }

    public function index()
    {
        $this->db->select('*')->from('suara');
        $this->db->order_by('nama_tps', 'ASC');
        $user = $this->db->get()->result_array();
        $data = array(
            'judul_halaman' => 'XIRC | KASIR | Data Produk',
            'user'          => $user,
        );
        $this->template->load('template', 'suara_index', $data);
    }

    public function simpan()
    {
            $data = array(
                'total_suara_25'                => $total = $this->input->post('total_suara_25'),
                'total_suara_sah'               => $total_suara_sah = $this->input->post('total_suara_sah'),
                'total_suara_tidak_sah'         => $total_suara_tidak_sah = $this->input->post('total_suara_tidak_sah'),
                'no_1'                          => $no_1 = $this->input->post('no_1'),
                'no_2'                          => $no_2 = $this->input->post('no_2'),
                'no_3'                          => $no_3 = $this->input->post('no_3'),
                'nama_tps'                      => $nama_tps = $this->input->post('nama_tps'),
            );
            if($total != $total_suara_sah+$total_suara_tidak_sah){
                $this->session->set_flashdata('notivikasi', '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Jumlah Suara Tidak Valit</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                ');
            } if ($total_suara_sah != $no_1+$no_2+$no_3){
                $this->session->set_flashdata('notivikasi', '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Jumlah Suara Tidak Valit</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                ');
            } else{
                $this->db->insert('suara', $data);
                $this->session->set_flashdata('notivikasi', '
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Berthasil Menambahkan Suara</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                ');
            }
            redirect('suara');
        } 
}
