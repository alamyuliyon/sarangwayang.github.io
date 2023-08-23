<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cost extends CI_Controller
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
        $data['title'] = 'List Cost';
        $data['prov'] = $this->model_pembayaran->get('provinsi')->result();
        $data['cost'] = $this->db->query("SELECT * FROM transport
        join provinsi on provinsi.id_provinsi = transport.id_provinsi
        ORDER BY id DESC")->result();
        $this->load->view('layout/admin/header', $data);
        $this->load->view('admin/cost', $data);
        $this->load->view('layout/admin/footer');
    }

    public function save()
    {
        $id_provinsi     = $this->input->post('id_provinsi');
        $biaya = $this->input->post('biaya');

        $data = array(
            'id_provinsi'     => $id_provinsi,
            'biaya'     => $biaya
        );

        $this->model_pembayaran->insert($data, 'transport');
        $_SESSION["sukses"] = 'Cost berhasil di tambahkan';
        redirect('admin/cost');
    }

    public function update()
    {
        $id                = $this->input->post('id');
        $id_provinsi         = $this->input->post('id_provinsi');
        $biaya     = $this->input->post('biaya');

        $data = array(
            'id_provinsi'         => $id_provinsi,
            'biaya'     => $biaya
        );

        $where = array(
            'id' => $id
        );

        $this->model_pembayaran->update('transport', $data, $where);
        redirect('admin/cost');
    }

    public function delete($id)
    {
        $where = array('id' => $id);
        $this->model_pembayaran->delete($where, 'transport');
        redirect('admin/cost');
    }
}
