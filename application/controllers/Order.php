<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Order extends CI_Controller
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
        $data['title'] = 'Billing History';
        $id = $this->session->userdata('id_user');

        $this->db->select('transaction.*, SUM(cart.harga * cart.jumlah) AS total_amount, cart.*, product.gambar AS gambarProduk');
        $this->db->from('cart');
        $this->db->join('product', 'cart.id_brg = product.id_brg', 'left');
        $this->db->join('transaction', 'transaction.order_id = cart.id_invoice', 'left');
        $this->db->where('cart.id_user', $id);
        $this->db->group_by('cart.id_invoice');
        $this->db->order_by('transaction.order_id', 'desc');
        $data['pay'] = $this->db->get()->result();

        $this->load->view('layout/user/header', $data);
        $this->load->view('order', $data);
        $this->load->view('layout/user/footer');
    }

    public function detail($id_invoice)
    {
        $data['title'] = 'Detail Checkout';
        $data['invoice'] = $this->model_invoice->get_id_invoice($id_invoice);
        $data['pesanan'] = $this->model_invoice->get_id_pesanan($id_invoice);
        $this->load->view('layout/user/header', $data);
        $this->load->view('invoice', $data);
        $this->load->view('layout/user/footer');
    }

    public function order($id_invoice)
    {
        $data['title'] = 'Detail Checkout';
        $data['invoice'] = $this->model_invoice->get_id_invoice($id_invoice);
        $data['pesanan'] = $this->model_invoice->get_id_pesanan($id_invoice);
        $this->load->view('layout/user/header', $data);
        $this->load->view('view_order', $data);
        $this->load->view('layout/user/footer');
    }

    function cost()
    {
        $id = $this->input->post('cost');
        $data = $this->model_pembayaran->get_cost($id);
        echo json_encode($data);
    }
}
