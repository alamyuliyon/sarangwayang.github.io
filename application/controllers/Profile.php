<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
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
        $data['title'] = 'My Profile';

        $id = $this->session->userdata('id_user');
        $data['user'] = $this->db->query("SELECT * FROM user 
			WHERE user.id_user='$id'")->result();

        $this->load->view('layout/user/header', $data);
        $this->load->view('profile', $data);
        $this->load->view('layout/user/footer');
    }

    public function update()
    {
        $id             = $this->input->post('id_user');
        $nama_user      = $this->input->post('nama_user');
        $no_telp        = $this->input->post('no_telp');
        $alamat         = $this->input->post('alamat');

        $data = array(
            'nama_user'       => $nama_user,
            'no_telp'         => $no_telp,
            'alamat'             => $alamat
        );

        $where = array(
            'id_user' => $id
        );

        $this->model_pembayaran->update('user', $data, $where);
        redirect('profile');
    }

    public function reset()
    {
        $id_user                     = $this->input->post('id_user');
        $email                  = $this->input->post('email');
        $password               = md5($this->input->post('password'));

        $data = array(
            'email'              => $email,
            'password'           => $password
        );

        $where = array(
            'id_user' => $id_user
        );

        $this->model_pembayaran->update('user', $data, $where);
        redirect('login/logout');
    }
}
