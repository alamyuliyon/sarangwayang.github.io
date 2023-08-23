<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Register extends CI_Controller
{

    public function index()
    {
        $this->form_validation->set_rules('nama_user', 'Full Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('no_telp', 'Phone Number', 'required');
        $this->form_validation->set_rules('alamat', 'Address', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Register Account';
            $this->load->view('register', $data);
        } else {
            $data = array(
                'nama_user'        => $this->input->post('nama_user'),
                'email'            => $this->input->post('email'),
                'no_telp'          => $this->input->post('no_telp'),
                'alamat'           => $this->input->post('alamat'),
                'password'         => md5($this->input->post('password')),
                'level'            => 2,
                'avatar'           => 'user.png',
            );

            $this->db->insert('user', $data);
            $_SESSION["sukses"] = 'Anda berhasil melakukan registrasi';
            redirect('login');
        }
    }
}
