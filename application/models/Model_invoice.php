<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_invoice extends CI_Model
{


	public function get()
	{
		$result = $this->db->get('transaction');
		if ($result->num_rows() > 0) {
			return $result->result();
		} else {
			return false;
		}
	}

	public function get_id_invoice($id_invoice)
	{
		$result = $this->db->where('order_id', $id_invoice)->limit(1)->get('transaction');
		if ($result->num_rows() > 0) {
			return $result->row();
		} else {
			return false;
		}
	}

	public function get_id_pesanan($id_invoice)
	{
		$result = $this->db->where('id_invoice', $id_invoice)->get('cart');
		if ($result->num_rows() > 0) {
			return $result->result();
		} else {
			return false;
		}
	}

	public function pesanan($id_invoice)
	{
		$this->db->select('cart.*, product.*');
		$this->db->from('cart');
		$this->db->join('product', 'product.id_brg = cart.id_brg');
		$this->db->where('cart.id_invoice', $id_invoice);
		$result = $this->db->get();

		if ($result->num_rows() > 0) {
			return $result->result();
		} else {
			return false;
		}
	}

	// public function get_laporan_bulanan($bulan, $tahun)
	// {
	// 	$this->db->select('*');
	// 	$this->db->from('transaction');
	// 	$this->db->where('MONTH(transaction_time)', $bulan);
	// 	$this->db->where('YEAR(transaction_time)', $tahun);
	// 	return $this->db->get()->result_array();
	// }

	public function get_laporan_bulanan($bulan, $tahun)
	{
		$this->db->select('transaction.*, SUM(cart.price) AS total_amount');
		$this->db->from('transaction');
		$this->db->join('cart', 'transaction.order_id = cart.id_invoice', 'left');
		$this->db->where('MONTH(transaction.transaction_time)', $bulan);
		$this->db->where('YEAR(transaction.transaction_time)', $tahun);
		$this->db->group_by('transaction.order_id');
		return $this->db->get()->result_array();
	}

	public function get_laporan()
	{
		$this->db->select('transaction.*');
		$this->db->from('transaction');
//		$this->db->join('cart', 'transaction.order_id = cart.id_invoice', 'left');
//		$this->db->group_by('transaction.order_id');
		$this->db->order_by('transaction.order_id', 'desc');
		return $this->db->get()->result_array();
	}

	public function get_transaction_by_month()
	{
		$this->db->select('MONTH(transaction_time) as month, COUNT(*) as total');
		$this->db->where('YEAR(transaction_time)', date('Y'));
		$this->db->group_by('MONTH(transaction_time)');
		$query = $this->db->get('transaction');
		return $query->result_array();
	}

	public function get_by_category($keyword)
	{
		$this->db->from('product');
		if (!empty($keyword)) {
			$this->db->like('nama_brg', $keyword);
			$this->db->or_like('kategori', $keyword);
		}
		$this->db->order_by('id_brg', 'DESC');
		$query = $this->db->get();
		return $query->result();
	}
}
