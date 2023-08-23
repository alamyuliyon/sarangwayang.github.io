<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaction extends CI_Controller
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

        $this->db->select('*, SUM(cart.price * cart.quantity) AS total_amount, GROUP_CONCAT(product.nama_brg SEPARATOR ", ") AS nama_barang');
        $this->db->from('cart');
        $this->db->join('product', 'cart.id_brg = product.id_brg', 'left');
        $this->db->join('transaction', 'transaction.order_id = cart.id_invoice', 'left');
        $this->db->where('cart.id_user', $id);
        $this->db->group_by('cart.id_invoice');
        $this->db->order_by('transaction.order_id', 'desc');
        $data['pay'] = $this->db->get()->result();

        $this->load->view('layout/user/header', $data);
        $this->load->view('pay', $data);
        $this->load->view('layout/user/footer');
    }

    public function detail($id_invoice)
    {
        $data['title'] = 'Detail Checkout';
        $data['invoice'] = $this->model_invoice->get_id_invoice($id_invoice);
        $data['pesanan'] = $this->model_invoice->pesanan($id_invoice);
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

    public function pdf($id_invoice)
    {
        $data['title'] = 'PDF Report';
        $data['invoice'] = $this->model_invoice->get_id_invoice($id_invoice);
        $data['pesanan'] = $this->model_invoice->pesanan($id_invoice);

        $this->load->library('pdf');
        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "Invoice Bill.pdf";
        $this->pdf->load_view('pdf', $data);
    }
}
