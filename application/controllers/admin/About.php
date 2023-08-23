<?php
defined('BASEPATH') or exit('No direct script access allowed');

class About extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('level') != '1') {
            redirect('login');
        }
    }

    // memparsing data tentang kami dari database
    public function index()
    {
        $data['about'] = $this->db->query("SELECT * FROM about
        ORDER BY id DESC")->result();
        $this->load->view('layout/admin/header', $data);
        $this->load->view('admin/about', $data);
        $this->load->view('layout/admin/footer');
    }

    // proses ubah data tentang kami pada landing page
    public function update()
    {
        $id                = $this->input->post('id');
        $judul          = $this->input->post('judul');
        $slug           = $this->input->post('slug');

        $data = array(
            'judul'         => $judul,
            'slug'          => $slug,
        );

        $where = array(
            'id' => $id
        );

        $this->model_pembayaran->update('about', $data, $where);
        redirect('admin/about');
    }
}
