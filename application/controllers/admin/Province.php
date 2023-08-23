<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Province extends CI_Controller
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
        $data['prov'] = $this->db->query("SELECT * FROM provinsi
        ORDER BY id_provinsi ASC")->result();
        $this->load->view('layout/admin/header', $data);
        $this->load->view('admin/provinsi', $data);
        $this->load->view('layout/admin/footer');
    }

    public function save()
    {
        $provinsi = $this->input->post('provinsi');

        $data = array(
            'provinsi'     => $provinsi
        );

        $this->model_pembayaran->insert($data, 'provinsi');
        $_SESSION["sukses"] = 'Category berhasil di tambahkan';
        redirect('admin/province');
    }

    public function update()
    {
        $id_provinsi                = $this->input->post('id_provinsi');
        $provinsi         = $this->input->post('provinsi');

        $data = array(
            'provinsi'         => $provinsi
        );

        $where = array(
            'id_provinsi' => $id_provinsi
        );

        $this->model_pembayaran->update('provinsi', $data, $where);
        redirect('admin/province');
    }

    public function delete($id)
    {
        $where = array('id_provinsi' => $id);
        $this->model_pembayaran->delete($where, 'provinsi');
        redirect('admin/province');
    }
}
