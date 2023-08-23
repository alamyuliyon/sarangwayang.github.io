<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function index()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Login Account';
            $this->load->view('login', $data);
        } else {
            $email         = $this->input->post('email');
            $password     = $this->input->post('password');

            $cek = $this->model_pembayaran->cek_login($email, $password);

            if ($cek == FALSE) {
                $_SESSION["gagal"] = 'Silahkan periksa username dan password anda';
                redirect('login');
            } else {
                $this->session->set_userdata('level', $cek->level);
                $this->session->set_userdata('nama_user', $cek->nama_user);
                $this->session->set_userdata('id_user', $cek->id_user);
                $this->session->set_userdata('email', $cek->email);
                $this->session->set_userdata('no_telp', $cek->no_telp);
                $this->session->set_userdata('alamat', $cek->alamat);
                $this->session->set_userdata('avatar', $cek->avatar);
                switch ($cek->level) {
                    case 1:
                        redirect('admin/dashboard');
                        break;
                    case 2:
                        redirect('dashboard');
                        break;

                    default:
                        break;
                }
            }
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
}
