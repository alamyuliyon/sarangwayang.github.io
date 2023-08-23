<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Categories extends CI_Controller
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
        $data['cat'] = $this->db->query("SELECT * FROM category
        ORDER BY id DESC")->result();
        $this->load->view('layout/admin/header', $data);
        $this->load->view('admin/category', $data);
        $this->load->view('layout/admin/footer');
    }

    public function save()
    {
        $category = $this->input->post('category');

        $data = array(
            'category'     => $category
        );

        $this->model_pembayaran->insert($data, 'category');
        $_SESSION["sukses"] = 'Category berhasil di tambahkan';
        redirect('admin/categories');
    }

    public function update()
    {
        $id                = $this->input->post('id');
        $category         = $this->input->post('category');

        $data = array(
            'category'         => $category
        );

        $where = array(
            'id' => $id
        );

        $this->model_pembayaran->update('category', $data, $where);
        redirect('admin/categories');
    }

    public function delete($id)
    {
        $where = array('id' => $id);
        $this->model_pembayaran->delete($where, 'category');
        redirect('admin/categories');
    }
}
