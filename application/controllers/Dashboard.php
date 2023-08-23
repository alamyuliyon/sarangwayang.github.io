<?php
defined('BASEPATH') or exit('No direct script access allowed');

use Xendit\Xendit;

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('level') != '2') {
            redirect('login');
        }
    }

    public function index()
    {
        $data['title'] = 'Dashboard User';
        // ambil semua data produk secara random
        $this->db->select('*');
        $this->db->from('product');
        $this->db->order_by('RAND()');
        $this->db->limit(9);
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

        $this->load->view('layout/user/header', $data);
        $this->load->view('dashboard', $data);
        $this->load->view('layout/user/footer');
    }

    public function cart($id)
    {
        $product = $this->model_pembayaran->find($id);

        $data = array(
            'id'      => $product->id_brg,
            'qty'     => 1,
            'price'   => $product->harga,
            'name'    => $product->nama_brg,
            'options' => array(
                'keterangan' => $product->keterangan,
                'kategori' => $product->kategori,
                'gambar' => $product->gambar,
				'berat' => $product->berat,
            )
        );

        $this->cart->insert($data);
        $_SESSION["sukses"] = 'Pesanan telah disimpan di keranjang';
        redirect('dashboard');
    }

    public function addcart()
    {
        $id = $this->input->post('id_brg');
        $qty = $this->input->post('qty');

        $product = $this->model_pembayaran->find($id);

        $data = array(
            'id'      => $product->id_brg,
            'qty'     => $qty,
            'price'   => $product->harga,
            'name'    => $product->nama_brg,
            'options' => array(
                'keterangan' => $product->keterangan,
                'kategori' => $product->kategori,
                'gambar' => $product->gambar,
				'berat' => $product->berat,
            )
        );

        $this->cart->insert($data);
        $_SESSION["sukses"] = 'Pesanan telah disimpan di keranjang';
        redirect('dashboard');
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
        $this->load->view('layout/user/header', $data);
        $this->load->view('detail_products', $data);
        $this->load->view('layout/user/footer');
    }

    public function detail_cart()
    {
        $data['title'] = 'Detail Cart';
        $this->load->view('layout/user/header', $data);
        $this->load->view('cart', $data);
        $this->load->view('layout/user/footer');
    }

    public function checkout()
    {
        $data['title'] = 'Checkout Product';
        $data['provinsi'] = $this->model_pembayaran->get('provinsi')->result();
        $data['kab'] = $this->model_pembayaran->get('kabupaten')->result();
        $this->load->view('layout/user/header', $data);
        $this->load->view('checkout', $data);
        $this->load->view('layout/user/footer');
    }

    public function checkout_proccess()
    {
        $data['title'] = 'Payment Notification';
        $is_processed = $this->model_invoice->index();
        if ($is_processed) {
            $this->cart->destroy();
            $this->load->view('layout/user/header', $data);
            $this->load->view('success_pay', $data);
            $this->load->view('layout/user/footer');
        } else {
            echo "Maaf, Pesanan Anda Gagal Di Proses!";
        }
    }

    public function insert()
    {
        date_default_timezone_set('Asia/Jakarta');
        $order_id = $this->input->post('order_id');
        $id_user = $this->input->post('id_user');
        $name = $this->input->post('name');
        $alamat = $this->input->post('alamat');
        $id_provinsi = $this->input->post('id_provinsi');
        $id_kabupaten = $this->input->post('id_kabupaten');
        $kode_pos = $this->input->post('kode_pos');
        $payment_method = $this->input->post('payment_method');
        $mobile_phone = $this->input->post('mobile_phone');
        $tracking_id = $this->input->post('tracking_id');
        $biaya = $this->input->post('biaya');
        $email = $this->input->post('email');
        $status = $this->input->post('status');
        $keterangan = $this->input->post('keterangan');
        $gambar        = $_FILES['gambar']['name'];
        if ($gambar = '') {
        } else {
            $config['upload_path'] = './uploads';
            $config['allowed_types'] = 'jpg|jpeg|png';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('gambar')) {
                echo "File tidak dapat di upload!";
            } else {
                $gambar = $this->upload->data('file_name');
            }
        }

        $invoice = array(
            'order_id'             => $order_id,
            'id_user'             => $id_user,
            'name'                 => $name,
            'alamat'             => $alamat,
            'id_provinsi'             => $id_provinsi,
            'id_kabupaten'             => $id_kabupaten,
            'kode_pos'             => $kode_pos,
            'payment_method'     => $payment_method,
            'mobile_phone'         => $mobile_phone,
            'tracking_id'         => $tracking_id,
            'biaya'            => $biaya,
            'email'             => $email,
            'status'             => $status,
            'gambar'             => $gambar,
            'keterangan'             => $keterangan,
            'transaction_time'     => date('Y-m-d H:i:s'),
            'payment_limit'     => date('Y-m-d H:i:s', mktime(date('H'), date('i'), date('s'), date('m'), date('d') + 1, date('Y'))),
        );

        $this->db->insert('transaction', $invoice);
        $id_invoice = $this->db->insert_id();

        foreach ($this->cart->contents() as $item) {
            $data = array(
                'id_invoice'     => $order_id,
                'id_user'         => $id_user,
                'id_brg'         => $item['id'],
                'nama_brg'         => $item['name'],
                'jumlah'         => $item['qty'],
                'harga'         => $item['price'],
            );

            $this->db->insert('cart', $data);
            $this->cart->destroy();
        }

        // menampilkan modal
        echo '<script>';
        echo '$(document).ready(function() {';
        echo '$("#modalAlert").modal("show");';
        echo '});';
        echo '</script>';

        redirect('transaction');
    }


    public function submit()
    {
        // Xendit::setApiKey('xnd_development_P4qDfOss0OCpl8RtKrROHjaQYNCk9dN5lSfk+R1l9Wbe+rSiCwZ3jw==');
        Xendit::setApiKey('xnd_development_Z8IkTMzsmLSkCy4FoipqnGUnw1K2EKhUVKqfMdRgaMlVoEtxpLuqLW963uWj');

        // set timezone
        date_default_timezone_set('Asia/Jakarta');

        // ambil data dari form
        $order_id = $this->input->post('order_id');
        $id_user = $this->input->post('id_user');
        $name = $this->input->post('name');
        $alamat = $this->input->post('alamat');
        $id_provinsi = $this->input->post('id_provinsi');
        $id_kabupaten = $this->input->post('id_kabupaten');
        $kode_pos = $this->input->post('kode_pos');
        $payment_method = $this->input->post('payment_method');
        $mobile_phone = $this->input->post('mobile_phone');
        $tracking_id = $this->input->post('tracking_id');
        $biaya = $this->input->post('biaya');
        $email = $this->input->post('email');
        $status = $this->input->post('status');
        $keterangan = $this->input->post('keterangan');
		$service = $this->input->post('service');
		$courier = $this->input->post('courier');
		$etd = $this->input->post('etd');
		$subtotal = $this->input->post('subtotal');

        // buat array untuk data invoice
        $invoice = array(
            'order_id'             => $order_id,
            'id_user'             => $id_user,
            'name'                 => $name,
            'alamat'             => $alamat,
            'id_provinsi'             => $id_provinsi,
            'id_kabupaten'             => $id_kabupaten,
            'kode_pos'             => $kode_pos,
            'payment_method'     => $payment_method,
            'mobile_phone'         => $mobile_phone,
            'tracking_id'         => $tracking_id,
            'biaya'            => $biaya,
            'email'             => $email,
            'status'             => $status,
            'keterangan'             => $keterangan,
            'transaction_time'     => date('Y-m-d H:i:s'),
            'payment_limit'     => date('Y-m-d H:i:s', mktime(date('H'), date('i'), date('s'), date('m'), date('d') + 1, date('Y'))),
			'service' => strtoupper($courier).' '.$service,
			'etd' => 'Estimasi Pengiriman '.$etd.' harian',
			'subtotal' => $subtotal
        );

        // simpan data invoice ke database
        $this->db->insert('transaction', $invoice);
        $id_invoice = $this->db->insert_id();


        // simpan data order sumaary ke database
        $items = array();
        foreach ($this->cart->contents() as $item) {
            $data = array(
                'id_invoice'    => $order_id,
                'id_user'       => $id_user,
                'id_brg'        => $item['id'],
                'name'          => $item['name'],
                'quantity'      => $item['qty'],
                'price'         => $item['price'],
            );
            array_push($items, $data);

            $this->db->insert('cart', $data);
        }

        // menampilkan total dan subtotal
        $total = 0;
        foreach ($this->cart->contents() as $item) {
            $total += $item['qty'] * $item['price'];
        }
        $total += $biaya; // menambahkan biaya dari input post ke total


        // formdata yang akan dikirimkan ke xendit
        $params = [
            'external_id' => $order_id,
            'amount' => $total,
            'description' => 'Payment Transaction',
            'invoice_duration' => 86400,
            'customer' => [
                'given_names' => 'John',
                'surname' => 'Doe',
                'email' => 'johndoe@example.com',
                'mobile_number' => '+6287774441111',
                'addresses' => [
                    [
                        'city' => 'Jakarta Selatan',
                        'country' => 'Indonesia',
                        'postal_code' => '12345',
                        'state' => 'Daerah Khusus Ibukota Jakarta',
                        'street_line1' => 'Jalan Makan',
                        'street_line2' => 'Kecamatan Kebayoran Baru'
                    ]
                ]
            ],

            // halaman sukses pembayaran
            'success_redirect_url' => base_url('dashboard/success'),
            'currency' => 'IDR',
            'items' => $items,
			'fees' => [
				[
					'type' => 'Ongkir',
					'value' => $biaya
				]
			],
        ];

        // simpan data invoice pada session
        $this->session->set_userdata('invoice', $invoice);
        $this->session->set_userdata('items', $items);
        $this->session->set_userdata('total', $total);


        $createInvoice = \Xendit\Invoice::create($params);
        $payment_url = $createInvoice['id'];
        $this->cart->destroy();

        redirect('https://checkout-staging.xendit.co/web/' . $payment_url);
    }

    public function success()
    {
        // ambil data invoice dari session
        $invoice = $this->session->userdata('invoice');
        $items = $this->session->userdata('items');
        $total = $this->session->userdata('total');

        // kirim data ke view success.php
        $data = array(
            'invoice' => $invoice,
            'items' => $items,
            'total' => $total
        );

        $this->load->view('success', $data);
    }


    public function clear()
    {
        $this->cart->destroy();
        $_SESSION["sukses"] = 'Pesanan berhasil di hapus';
        redirect('dashboard');
    }

    public function delete($rowid)
    {
        $this->cart->remove($rowid);
        $_SESSION["sukses"] = 'Pesanan berhasil di hapus';
        redirect('dashboard/detail_cart');
    }

    public function update_cart_item($rowid)
    {
        // ambil data dari form
        $data = array(
            'qty' => $this->input->post('qty'),
            'price' => $this->input->post('price'),
            'subtotal' => $this->input->post('subtotal')
        );

        // cari item di cart dengan rowid tertentu
        $cart_item = $this->cart->get_item($rowid);

        // update item di cart dengan data yang baru
        $data = array_merge($cart_item, $data);
        $this->cart->update($data);

        // redirect ke halaman cart
        redirect('dashboard/detail_cart');
    }


    public function search_by_category()
    {
        $keyword = $this->input->post('keyword');

        $data['result'] = $this->model_invoice->get_by_category($keyword);

        $this->load->view('layout/user/header', $data);
        $this->load->view('result', $data);
        $this->load->view('layout/user/footer');
    }

    function getdatakabupaten()
    {
        $id_provinsi = $this->input->post('provinsi');

        $getdatakab = $this->model_pembayaran->getdatakab($id_provinsi);

        echo json_encode($getdatakab);
    }

    function get_biaya()
    {
        $id = $this->input->post('biaya');
        $data = $this->model_pembayaran->get_biaya_kode($id);
        echo json_encode($data);
    }

    public function get_biaya_kode($id)
    {
        $biaya = $this->model_pembayaran->get_biaya_kode($id);
        echo json_encode($biaya);
    }


    public function get_harga()
    {
        $id_provinsi = $this->input->post('id_provinsi');
        $harga = $this->model_pembayaran->get_harga_by_provinsi($id_provinsi);
        echo json_encode($harga);
    }


    function getdatakecamatan()
    {
        $id_kabupaten = $this->input->post('kabupaten');

        $getdatakec = $this->model_pembayaran->getdatakec($id_kabupaten);

        echo json_encode($getdatakec);
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

        $this->load->view('layout/user/header', $data);
        $this->load->view('list_product', $data);
        $this->load->view('layout/user/footer');
    }

    public function search_product()
    {
        $keyword = $this->input->get('keyword');

        $data['search'] = $this->model_pembayaran->search_product($keyword);

        echo json_encode($data['search']);
        die();

        $this->load->view('layout/user/header', $data);
        $this->load->view('product_result', $data);
        $this->load->view('layout/user/footer');
    }

    public function about()
    {
        $data['title'] = 'Dashboard User';

        // ambil semua data produk secara random
        $this->db->select('*');
        $this->db->from('about');
        $this->db->limit(2); // Tambahkan limit 5
        $data['about'] = $this->db->get()->result();

        $this->load->view('layout/user/header', $data);
        $this->load->view('about', $data);
        $this->load->view('layout/user/footer');
    }

    public function news()
    {
        $data['title'] = 'Dashboard User';

        // ambil semua data berita secara random
        $this->db->select('*');
        $this->db->from('news');
        $this->db->join('user', 'user.id_user = news.id_user');
        $data['news'] = $this->db->get()->result();

        $this->load->view('layout/user/header', $data);
        $this->load->view('news', $data);
        $this->load->view('layout/user/footer');
    }
}
