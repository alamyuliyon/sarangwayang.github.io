<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Report extends CI_Controller
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
        $data['title'] = 'Invoice';
        $trx = $this->db->query("SELECT * FROM transaction");
        $data['trx'] = $trx->num_rows();

        $trx1 = $this->db->query("SELECT * FROM transaction WHERE transaction.status='1'");
        $data['trx1'] = $trx1->num_rows();

        $trx2 = $this->db->query("SELECT * FROM transaction WHERE transaction.status='0'");
        $data['trx2'] = $trx2->num_rows();

        $this->db->select_sum('price');
        $query = $this->db->get('cart');
        $jumlah_transaksi = $query->row()->price;

        $data['jumlah_transaksi'] = $jumlah_transaksi;

        $data['laporan'] = $this->model_invoice->get_laporan();


        $this->load->view('layout/admin/header', $data);
        $this->load->view('admin/report', $data);
        $this->load->view('layout/admin/footer');
    }

    public function filter()
    {
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');

        $data['laporan'] = $this->model_invoice->get_laporan_bulanan($bulan, $tahun);

        $this->load->view('layout/admin/header', $data);
        $this->load->view('admin/laporan_bulanan', $data);
        $this->load->view('layout/admin/footer');
    }
}
