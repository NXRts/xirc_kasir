<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penjualan extends CI_Controller
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
		date_default_timezone_set("Asia/Jakarta");
		$tanggal = date('y-m-d');
		$this->db->select('*');
		$this->db->from('penjualan a')->order_by('a.tanggal', 'DESC')->where('a.tanggal', $tanggal);
		$this->db->join('pelanggan b', 'a.id_pelanggan=b.id_pelanggan', 'left');
		$user = $this->db->get()->result_array();
		$this->db->select('*')->from('pelanggan');
		$this->db->order_by('nama', 'ASC');
		$pelanggan = $this->db->get()->result_array();
		$data = array(
			'judul_halaman' => 'XIRC | KASIR | Penjualan',
			'user' 			=> $user,
			'pelanggan' 	=> $pelanggan
		);
		$this->template->load('template', 'penjualan_index', $data);
	}

	public function transaksi($id_pelanggan)
	{
		date_default_timezone_set("Asia/Jakarta");
		$tanggal = date('Y-m');
		$this->db->from('penjualan');
		$this->db->where("DATE_FORMAT(tanggal,'%Y-%m')", $tanggal);
		$jumlah = $this->db->count_all_results();
		$nota = date('ymd') . $jumlah + 1;
		$this->db->from('produk')->where('stok >', 0)->order_by('nama_produk', 'ASC');
		$produk = $this->db->get()->result_array();

		$this->db->from('pelanggan')->where('id_pelanggan', $id_pelanggan);
		$nama_pelanggan = $this->db->get()->row()->nama;

		$this->db->from('detail_penjualan a');
		$this->db->join('produk b', 'a.id_produk=b.id_produk', 'left');
		$this->db->where('a.kode_penjualan', $nota);
		$detail = $this->db->get()->result_array();

		$this->db->from('temp a');
		$this->db->join('produk b', 'a.id_produk=b.id_produk', 'left');
		$this->db->where('a.id_user', $this->session->userdata('id_user'));
		$this->db->where('a.id_pelanggan', $id_pelanggan);
		$temp = $this->db->get()->result_array();
		$data = array(
			'judul_halaman' 	=> 'XIRC | KASIR | Transaksi Penjualan',
			'nota' 				=> $nota,
			'produk'			=> $produk,
			'id_pelanggan'		=> $id_pelanggan,
			'nama_pelanggan'	=> $nama_pelanggan,
			'detail'  			=> $detail,
			'temp'				=> $temp,
		);
		$this->template->load('template', 'penjualan_transaksi', $data);
	}

	public function addtemp()
	{
		$this->db->from('produk')->where('id_produk', $this->input->post('id_produk'),);
		$stok_lama = $this->db->get()->row()->stok;

		$this->db->from('temp');
		$this->db->where('id_produk', $this->input->post('id_produk'));
		$this->db->where('id_user', $this->session->userdata('id_user'));
		$this->db->where('id_pelanggan', $this->input->post('id_pelanggan'));
		$cek = $this->db->get()->result_array();

		if ($stok_lama < $this->input->post('jumlah')) {
			$this->session->set_flashdata('notivikasi', '
			<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>Jumlah produk yang ditambahkan melebihi stok</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			');
		} else if ($cek <> NULL) {
			$this->session->set_flashdata('notivikasi', '
			<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>Prodak sudah dipilih</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			');
		} else {
			$data = array(
				'id_pelanggan' 		=> $this->input->post('id_pelanggan'),
				'id_user' 			=> $this->session->userdata('id_user'),
				'id_produk' 		=> $this->input->post('id_produk'),
				'jumlah' 			=> $this->input->post('jumlah'),
			);
			$this->db->insert('temp', $data);
			$this->session->set_flashdata('notivikasi', '
			<div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong>Data Produk Berhasil di Tambahkan ke Keranjang</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			');
		}
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function hapus_temp($id_temp)
	{
		$where = array('id_temp'   => $id_temp);
		$this->db->delete('temp', $where);
		$this->session->set_flashdata('notivikasi', '
            <div class="alert alert-secondary  alert-dismissible fade show" role="alert">
                <strong>Data Produk Berhasil Dihapus dari keranjang</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            ');
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function keranjang()
	{
		$this->db->from('detail_penjualan');
		$this->db->where('id_produk', $this->input->post('id_produk'),);
		$this->db->where('kode_penjualan', $this->input->post('kode_penjualan'));
		$cek = $this->db->get()->result_array();
		if ($cek <> NULL) {
			$this->session->set_flashdata('notivikasi', '
			<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>Prodak sudah dipilih</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			');
			redirect($_SERVER['HTTP_REFERER']);
		}

		$this->db->from('produk')->where('id_produk', $this->input->post('id_produk'),);
		$harga = $this->db->get()->row()->harga;
		$this->db->from('produk')->where('id_produk', $this->input->post('id_produk'),);
		$stok_lama = $this->db->get()->row()->stok;
		$stok_now  = $stok_lama - $this->input->post('jumlah');
		$sub_total = $this->input->post('jumlah') * $harga;
		$data = array(
			'kode_penjualan' 	=> $this->input->post('kode_penjualan'),
			'id_produk' 		=> $this->input->post('id_produk'),
			'jumlah' 			=> $this->input->post('jumlah'),
			'sub_total' 		=> $sub_total,
		);
		if ($stok_lama >= $this->input->post('jumlah')) {
			$this->db->insert('detail_penjualan', $data);
			$data2 = array('stok' => $stok_now);
			$where = array('id_produk' => $this->input->post('id_produk'));
			$this->db->update('produk', $data2, $where);
			$this->session->set_flashdata('notivikasi', '
			<div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong>Data Produk Berhasil di Tambahkan ke Keranjang</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			');
		} else {
			$this->session->set_flashdata('notivikasi', '
			<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>Jumlah produk yang ditambahkan melebihi stok</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			');
		}
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function hapus($id_detail, $id_produk)
	{
		$this->db->from('detail_penjualan')->where('id_detail', $id_detail);
		$jumlah = $this->db->get()->row()->jumlah;
		$this->db->from('produk')->where('id_produk', $id_produk);
		$stok_lama 	= $this->db->get()->row()->stok;
		$stok_now 	= $jumlah + $stok_lama;

		$data2 = array('stok' => $stok_now);
		$where = array('id_produk' => $id_produk);
		$this->db->update('produk', $data2, $where);
		$where = array('id_detail'   => $id_detail);
		$this->db->delete('detail_penjualan', $where);
		$this->session->set_flashdata('notivikasi', '
            <div class="alert alert-secondary  alert-dismissible fade show" role="alert">
                <strong>Data Produk Berhasil Dihapus dari keranjang</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            ');
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function bayar()
	{
		$data = array(
			'kode_penjualan' 	=> $this->input->post('kode_penjualan'),
			'id_pelanggan' 		=> $this->input->post('id_pelanggan'),
			'total_harga'	 	=> $this->input->post('total_harga'),
			'tanggal' 			=> date('Y-m-d'),
		);

		$this->db->insert('penjualan', $data);
		$this->session->set_flashdata('notivikasi', '
		<div class="alert alert-success alert-dismissible fade show" role="alert">
			<strong>Penjualan Berhasil!</strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		');
		redirect('penjualan/invoice/' . $this->input->post('kode_penjualan'));
	}

	public function bayar_v2()
	{
		// pembauatan nota
		date_default_timezone_set("Asia/Jakarta");
		$tanggal = date('Y-m');
		$this->db->from('penjualan')->where("DATE_FORMAT(tanggal,'%Y-%m')", $tanggal);
		$jumlah = $this->db->count_all_results();
		$nota = date('ymd') . $jumlah + 1;

		$this->db->from('temp a');
		$this->db->join('produk b', 'a.id_produk=b.id_produk', 'left');
		$this->db->where('a.id_user', $this->session->userdata('id_user'));
		$this->db->where('a.id_pelanggan', $this->input->post('id_pelanggan'));
		$temp = $this->db->get()->result_array();
		$total = 0;
		foreach ($temp as  $row) {
			if ($row['stok'] < $row['jumlah']) {
				$this->session->set_flashdata('notivikasi', '
				<div class="alert alert-danger alert-dismissible fade show" role="alert">
					<strong>Jumlah produk yang ditambahkan melebihi stok</strong>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				');
				redirect($_SERVER['HTTP_REFERER']);
			}
			$total = $total + $row['jumlah'] * $row['harga'];
			//input ke tabel penjualan
			$data = array(
				'kode_penjualan' 	=> $nota,
				'id_produk' 		=> $row['id_produk'],
				'jumlah' 			=> $row['jumlah'],
				'sub_total' 		=> $row['jumlah'] * $row['harga'],
			);
			$this->db->insert('detail_penjualan', $data);
			$data2 = array('stok' => $row['stok'] - $row['jumlah']);
			$where = array('id_produk' => $row['id_produk']);
			$this->db->update('produk', $data2, $where);
			$where2 = array(
				'id_pelanggan' 	=> $this->input->post('id_pelanggan'),
				'id_user' 		=> $this->session->userdata('id_user'),
			);
			$this->db->delete('temp', $where2);
		}

		// Bagian input ke tabel penjualan
		$data = array(
			'kode_penjualan' 	=> $nota,
			'id_pelanggan' 		=> $this->input->post('id_pelanggan'),
			'total_harga'	 	=> $total,
			'tanggal' 			=> date('Y-m-d'),
		);
		$this->db->insert('penjualan', $data);
		$this->session->set_flashdata('notivikasi', '
		<div class="alert alert-success alert-dismissible fade show" role="alert">
			<strong>Penjualan Berhasil!</strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		');
		redirect('penjualan/invoice/' . $nota);
	}

	public function invoice($kode_penjualan)
	{
		$this->db->select('*');
		$this->db->from('penjualan a')->order_by('a.tanggal', 'DESC')->where('a.kode_penjualan', $kode_penjualan);
		$this->db->join('pelanggan b', 'a.id_pelanggan=b.id_pelanggan', 'left');
		$penjualan = $this->db->get()->row();


		$this->db->from('detail_penjualan a');
		$this->db->join('produk b', 'a.id_produk=b.id_produk', 'left');
		$this->db->where('a.kode_penjualan', $kode_penjualan);
		$detail = $this->db->get()->result_array();

		$data = array(
			'judul_halaman' 	=> 'XIRC | KASIR | Invoice',
			'nota' 				=> $kode_penjualan,
			'penjualan' 		=> $penjualan,
			'detail'  			=> $detail,
			'tanggal' 			=> date('Y-m-d'),

		);
		$this->template->load('template', 'invoice', $data);
	}

	public function print()
	{
		redirect($_SERVER['HTTP_REFERER']);
	}
}
