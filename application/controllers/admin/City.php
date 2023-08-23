<?php
defined('BASEPATH') or exit('No direct script access allowed');

class City extends CI_Controller
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
        $data['city'] = $this->db->query("SELECT * FROM kabupaten
        join provinsi on provinsi.id_provinsi = kabupaten.id_provinsi
        ORDER BY id_kabupaten ASC")->result();
        $data['provinsi'] = $this->model_pembayaran->get('provinsi')->result();
        $this->load->view('layout/admin/header', $data);
        $this->load->view('admin/city', $data);
        $this->load->view('layout/admin/footer');
    }

    public function save()
    {
        $id_provinsi = $this->input->post('id_provinsi');
        $kabupaten = $this->input->post('kabupaten');

        $data = array(
            'id_provinsi'     => $id_provinsi,
            'kabupaten'     => $kabupaten
        );

        $this->model_pembayaran->insert($data, 'kabupaten');
        $_SESSION["sukses"] = 'Category berhasil di tambahkan';
        redirect('admin/city');
    }

    public function update()
    {
        $id_kabupaten                = $this->input->post('id_kabupaten');
        $id_provinsi = $this->input->post('id_provinsi');
        $kabupaten = $this->input->post('kabupaten');

        $data = array(
            'id_provinsi'     => $id_provinsi,
            'kabupaten'     => $kabupaten
        );

        $where = array(
            'id_kabupaten' => $id_kabupaten
        );

        $this->model_pembayaran->update('kabupaten', $data, $where);
        redirect('admin/city');
    }

    public function delete($id)
    {
        $where = array('id_kabupaten' => $id);
        $this->model_pembayaran->delete($where, 'kabupaten');
        redirect('admin/city');
    }
}
