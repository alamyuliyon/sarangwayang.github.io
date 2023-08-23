<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_pembayaran extends CI_Model
{

	public function cek_login()
	{
		$email 		= set_value('email');
		$password 	= set_value('password');

		$result 	= $this->db->where('email', $email)
			->where('password', md5($password))
			->limit(1)
			->get('user');
		if ($result->num_rows() > 0) {
			return $result->row();
		} else {
			return FALSE;
		}
	}

	public function get($table)
	{
		return $this->db->get($table);
	}

	public function insert($data, $table)
	{
		$this->db->insert($table, $data);
	}

	public function update($table, $data, $where)
	{
		$this->db->update($table, $data, $where);
	}

	public function delete($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}

	public function find($id)
	{
		$result = $this->db->where('id_brg', $id)
			->limit(1)
			->get('product');
		if ($result->num_rows() > 0) {
			return $result->row();
		} else {
			return array();
		}
	}

	public function find_news($id)
	{
		$result = $this->db->select('*')
			->from('news')
			->join('user', 'user.id_user = news.id_user')
			->where('news.id_berita', $id)
			->limit(1)
			->get();

		if ($result->num_rows() > 0) {
			return $result->row();
		} else {
			return array();
		}
	}



	public function count_order()
	{
		$sql = "SELECT count(order_id) as order_id FROM transaction";
		$result = $this->db->query($sql);

		return $result->row()->order_id;
	}

	public function count_pending()
	{
		$sql = "SELECT count(order_id) as order_id FROM transaction WHERE status='0'";
		$result = $this->db->query($sql);

		return $result->row()->order_id;
	}

	public function count_success()
	{
		$sql = "SELECT count(order_id) as order_id FROM transaction WHERE status='1'";
		$result = $this->db->query($sql);

		return $result->row()->order_id;
	}

	public function getdataprov()
	{
		$query = $this->db->query("SELECT * FROM provinsi ORDER BY provinsi ASC");
		return $query->result();
	}

	public function getdatakab($id_provinsi)
	{
		$query = $this->db->query("SELECT * FROM kabupaten WHERE id_provinsi = '$id_provinsi' ORDER BY kabupaten ASC");
		return $query->result();
	}

	function get_biaya_kode($id)
	{
		$hsl = $this->db->query("SELECT * FROM transport WHERE id_provinsi='$id'");
		if ($hsl->num_rows() > 0) {
			foreach ($hsl->result() as $data) {
				$hasil = array(
					'biaya' => $data->biaya,
				);
			}
		}
		return $hasil;
	}

	// get harga ongkir dilihat dari provinsi yang dipilih
	public function get_harga_by_provinsi($id_provinsi)
	{
		$this->db->where('biaya', $id_provinsi);
		$query = $this->db->get('transport');
		if ($query->num_rows() > 0) {
			$row = $query->row();
			return $row->harga;
		} else {
			return 'Harga belum tersedia untuk provinsi ini';
		}
	}

	// query database untuk search produk
	public function search_product($kategori, $keyword)
	{
		if (!empty($kategori)) {
			$this->db->where('kategori', $kategori);
		}
		if (!empty($keyword)) {
			$this->db->like('nama_brg', $keyword);
			$this->db->or_like('harga', $keyword);
		}

		return $this->db->get('product')->result();
	}
}
