<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customer extends CI_Controller
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
        $data['title'] = 'List Customer';
        $data['customer'] = $this->db->query("SELECT * FROM user
        where user.level='1'
        ORDER BY id_user DESC")->result();
        $this->load->view('layout/admin/header', $data);
        $this->load->view('admin/customer', $data);
        $this->load->view('layout/admin/footer');
    }

    public function save()
    {
        $nama_user  = $this->input->post('nama_user');
        $email      = $this->input->post('email');
        $no_telp      = $this->input->post('no_telp');
        $alamat      = $this->input->post('alamat');
        $password      = md5($this->input->post('password'));
        $level      = $this->input->post('level');

        $data = array(
            'nama_user'     => $nama_user,
            'email'     => $email,
            'no_telp'     => $no_telp,
            'alamat'     => $alamat,
            'password'     => $password,
            'level'     => $level,
            'avatar'     => 'user.png',
        );

        $this->model_pembayaran->insert($data, 'user');
        $_SESSION["sukses"] = 'Category berhasil di tambahkan';
        redirect('admin/customer');
    }

    public function update()
    {
        $id_user                = $this->input->post('id_user');
        $nama_user  = $this->input->post('nama_user');
        $email      = $this->input->post('email');
        $no_telp      = $this->input->post('no_telp');
        $alamat      = $this->input->post('alamat');

        $data = array(
            'nama_user'     => $nama_user,
            'email'     => $email,
            'no_telp'     => $no_telp,
            'alamat'     => $alamat,
        );

        $where = array(
            'id_user' => $id_user
        );

        $this->model_pembayaran->update('user', $data, $where);
        redirect('admin/customer');
    }
}
