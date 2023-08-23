<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('level') != '1') {
            redirect('login');
        }
    }

    public function index()
    {
        $data['title'] = 'Dashboard';

        $data['laporan'] = $this->model_invoice->get_laporan();

        $query = $this->db->query("SELECT id_invoice, COUNT(*) as total_items FROM cart GROUP BY id_invoice");
        $data['cart'] = $query->num_rows();

        $product = $this->db->query("SELECT * FROM product");
        $data['product'] = $product->num_rows();

        $trans = $this->db->query("SELECT * FROM transaction");
        $data['trans'] = $trans->num_rows();

//        $query = $this->db->query("SELECT SUM(biaya) as total_biaya FROM transaction");
		$query = $this->db->select('SUM(price * quantity) as subtotal')->get('cart')->row();
        $data['biaya'] = $query->subtotal;

		$ongkir = $this->db->select('SUM(biaya) as ongkir')->where('status', 1)->get('transaction')->row();
		$data['ongkir'] = $ongkir->ongkir;


        $cust = $this->db->query("SELECT * FROM user where user.level='1'");
        $data['cust'] = $cust->num_rows();

        $trx = $this->db->query("SELECT * FROM transaction WHERE transaction.status='0'");
        $data['trx'] = $trx->num_rows();

        $trx1 = $this->db->query("SELECT * FROM transaction WHERE transaction.status='1'");
        $data['trx1'] = $trx1->num_rows();

        // Get the transaction data for the current month
        $data['transaction_data'] = $this->model_invoice->get_transaction_by_month();

        $this->load->view('layout/admin/header', $data);
        $this->load->view('admin/dashboard', $data);
        $this->load->view('layout/admin/footer');
    }
}
