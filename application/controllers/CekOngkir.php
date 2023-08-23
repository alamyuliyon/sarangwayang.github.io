<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CekOngkir extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		if ($this->session->userdata('level') != '2') {
			redirect('login');
		}

		$this->toko = $this->db->where('id', 1)->get('toko')->row();
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
				echo "<option value='".$value['province_id']."'>".$value['province']."</option>";
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
				echo "<option value='".$value['city_id']."'>".$value['city_name']."</option>";
			}
		}
	}


	public function get_cost()
	{
		$curl = curl_init();

		$id_kabupaten = $this->input->post('id_kabupaten');
		$courier = $this->input->post('courier');
		$weight = $this->input->post('weight');

		curl_setopt_array($curl, array(
			CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_POSTFIELDS => "origin=".$this->toko->id_kabupaten."&destination=$id_kabupaten&weight=$weight&courier=$courier",
			CURLOPT_HTTPHEADER => array(
				"content-type: application/x-www-form-urlencoded",
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
			$service = $array['rajaongkir']['results'][0]['costs'];
			var_dump($array);

			echo "<option value='' data-cost='' data-etd=''>- Pilih Service -</option>";

			foreach ($service as $key => $value) {
				echo "<option value='".$value['service']." - ".$value['description']."' data-cost='".$value['cost'][0]['value']."' data-etd='".$value['cost'][0]['etd']."'>".$value['service']." - ".$value['description']."</option>";
			}
		}
	}
}
