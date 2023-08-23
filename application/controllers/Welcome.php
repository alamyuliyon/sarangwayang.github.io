<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	public function index()
	{
		// ambil semua data produk secara random
		$this->db->select('*');
		$this->db->from('product');
		$this->db->order_by('RAND()');
		$this->db->limit(3);
		$data['product'] = $this->db->get()->result();

		// ambil data produk terbaru
		$this->db->select('*');
		$this->db->from('product');
		$this->db->order_by('product.id_brg', 'desc');
		$this->db->limit(3); // menambahkan limit 2 data
		$data['latest'] = $this->db->get()->result();

		// ambil semua data berita secara random
		$this->db->select('*');
		$this->db->from('news');
		$this->db->join('user', 'user.id_user = news.id_user');
		$this->db->order_by('news.id_berita', 'desc');
		$this->db->limit(3); // menambahkan limit 2 data
		$data['news'] = $this->db->get()->result();

		$this->load->view('layout/home/header', $data);
		$this->load->view('home', $data);
		$this->load->view('layout/home/footer');
	}

	public function detail_product($id)
	{
		$where = array('id_brg' => $id);
		$detail_product = $this->model_pembayaran->find($id);

		// Get related products based on category
		$this->db->select('*');
		$this->db->from('product');
		$this->db->where('id_brg !=', $id);
		$this->db->limit(3); // Tambahkan limit 5
		$related_products = $this->db->get()->result();

		$data['detail'] = $detail_product;
		$data['related_products'] = $related_products;
		$data['title'] = "Detail Product";
		$this->load->view('layout/home/header', $data);
		$this->load->view('detail_products', $data);
		$this->load->view('layout/home/footer');
	}


	public function search_by_category()
	{
		$keyword = $this->input->post('keyword');

		$data['result'] = $this->model_invoice->get_by_category($keyword);

		$this->load->view('layout/home/header', $data);
		$this->load->view('search_result', $data);
		$this->load->view('layout/home/footer');
	}

	public function product()
	{
		$data['title'] = 'Dashboard User';

		// ambil data kategori
		$data['kat'] = $this->model_pembayaran->get('category')->result();

		// ambil semua data produk secara random
		$this->db->select('*');
		$this->db->from('product');
		$data['product'] = $this->db->get()->result();

		$this->load->view('layout/home/header', $data);
		$this->load->view('product_all', $data);
		$this->load->view('layout/home/footer');
	}

	public function search_product()
	{
		// ambil data kategori
		$data['kat'] = $this->model_pembayaran->get('category')->result();

		$kategori = $this->input->get('kategori');
		$keyword = $this->input->get('keyword');

		$data['search'] = $this->model_pembayaran->search_product($kategori, $keyword);

		$this->load->view('layout/home/header', $data);
		$this->load->view('product_search', $data);
		$this->load->view('layout/home/footer');
	}

	public function about()
	{
		$data['title'] = 'Dashboard User';

		// ambil semua data produk secara random
		$this->db->select('*');
		$this->db->from('about');
		$this->db->limit(2); // Tambahkan limit 5
		$data['about'] = $this->db->get()->result();

		$this->load->view('layout/home/header', $data);
		$this->load->view('about', $data);
		$this->load->view('layout/home/footer');
	}

	public function news()
	{
		$data['title'] = 'Dashboard User';

		// ambil semua data berita secara random
		$this->db->select('*');
		$this->db->from('news');
		$this->db->join('user', 'user.id_user = news.id_user');
		$data['news'] = $this->db->get()->result();

		$this->load->view('layout/home/header', $data);
		$this->load->view('news', $data);
		$this->load->view('layout/home/footer');
	}

	public function detail_news($id)
	{
		$where = array('id_berita' => $id);
		$detail_product = $this->model_pembayaran->find_news($id);

		$data['detail'] = $detail_product;
		$data['title'] = "Detail Product";

		$this->load->view('layout/home/header', $data);
		$this->load->view('detail_news', $data);
		$this->load->view('layout/home/footer');
	}
}
