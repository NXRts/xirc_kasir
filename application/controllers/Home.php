<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	// mesortir level
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('level') == NULL) {
			redirect('auth');
		}
	}
	public function index()
	{
		date_default_timezone_set('Asia/Jakarta');
		$tanggal = date('Y-m-d');
		$this->db->select('sum(total_harga) as total');
		$this->db->from('penjualan')->where("DATE_FORMAT(tanggal,'%Y-%m-%d')", $tanggal);
		$hari_ini = $this->db->get()->row()->total;

		$this->db->from('penjualan')->where("DATE_FORMAT(tanggal,'%Y-%m-%d')", $tanggal);
		$transaksi = $this->db->count_all_results();

		$produk = $this->db->from('produk')->count_all_results();

		$tanggal = date('Y-m');
		$this->db->select('sum(total_harga) as total');
		$this->db->from('penjualan')->where("DATE_FORMAT(tanggal,'%Y-%m')", $tanggal);
		$bulan_ini = $this->db->get()->row()->total;

		$data = array(
			'judul_halaman' => 'XIRC | KASIR | Dashboard',
			'hari_ini'		=> $hari_ini,
			'bulan_ini'		=> $bulan_ini,
			'transaksi' 	=> $transaksi,
			'produk'		=> $produk,
		);
		$this->template->load('template', 'beranda', $data);
	}

	public function about()
	{
		$data = array(
			'judul_halaman' => 'XIRC | KASIR | About Me',
		);
		$this->template->load('template', 'aboutme', $data);
	}

	public function suara()
	{
		$data = array(
			'judul_halaman' => 'XIRC | KASIR | About Me',
		);
		$this->template->load('template', 'suara_index', $data);
	}
}
