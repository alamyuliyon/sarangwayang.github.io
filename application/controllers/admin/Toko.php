<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Toko extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		if ($this->session->userdata('level') != '1') {
			redirect('login');
		}

		$this->toko = $this->db->where('id', 1)->get('toko')->row();
	}

	public function index()
	{
		$data['toko'] = $this->db->where('id', 1)->get('toko')->row();

		$this->load->view('layout/admin/header', $data);
		$this->load->view('admin/toko', $data);
		$this->load->view('layout/admin/footer');
	}

	public function get_provinsi()
	{
		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_HTTPHEADER => array(
				"key: ".$this->toko->raja_ongkir
			),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
			echo "cURL Error #:" . $err;
		} else {
			$array = json_decode($response, true);
			$provinsi = $array['rajaongkir']['results'];
			echo "<option value=''>- Pilih Provinsi -</option>";

			foreach($provinsi as $key => $value) {
				echo "<option value='".$value['province_id']."' ".(isset($this->toko->id_provinsi) && $this->toko->id_provinsi == $value['province_id'] ? 'selected' : '')." >".$value['province']."</option>";
			}
		}
	}

	public function get_kabupaten()
	{
		$curl = curl_init();
		$provinsi = $this->input->post('provinsi');

		curl_setopt_array($curl, array(
			CURLOPT_URL => "https://api.rajaongkir.com/starter/city?province=$provinsi",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_HTTPHEADER => array(
				"key: ".$this->toko->raja_ongkir
			),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
			echo "cURL Error #:" . $err;
		} else {
			$array = json_decode($response, true);
			$dataKota = $array['rajaongkir']['results'];
			echo "<option value=''>- Pilih Kabupaten -</option>";

			foreach ($dataKota as $key => $value) {
				echo "<option value='".$value['city_id']."' ".(isset($this->toko->id_kabupaten) && $this->toko->id_kabupaten == $value['city_id'] ? 'selected' : '')." >".$value['city_name']."</option>";
			}
		}
	}

	public function update()
	{
		$id = $this->input->post('id');
		$id_provinsi = $this->input->post('id_provinsi');
		$id_kabupaten = $this->input->post('id_kabupaten');
		$raja_ongkir = $this->input->post('raja_ongkir');

		$data = array(
			'id_provinsi'         => $id_provinsi,
			'id_kabupaten'          => $id_kabupaten,
			'raja_ongkir' => $raja_ongkir
		);

		$where = array(
			'id' => $id
		);

		$this->db->set($data)->where($where)->update('toko');
		redirect('admin/toko');
	}
}
