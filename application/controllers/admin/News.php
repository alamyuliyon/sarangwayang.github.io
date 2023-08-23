<?php
defined('BASEPATH') or exit('No direct script access allowed');

class News extends CI_Controller
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
        $data['news'] = $this->db->query("SELECT * FROM news
        ORDER BY id_berita DESC")->result();
        $this->load->view('layout/admin/header', $data);
        $this->load->view('admin/news', $data);
        $this->load->view('layout/admin/footer');
    }

    public function save()
    {
        $judul          = $this->input->post('judul');
        $slug           = $this->input->post('slug');
        $id_user        = $this->input->post('id_user');
        $isi_berita     = $this->input->post('isi_berita');
        $tgl_posting    = $this->input->post('tgl_posting');
        $gambar        = $_FILES['gambar']['name'];
        if ($gambar = '') {
        } else {
            $config['upload_path'] = './uploads';
            $config['allowed_types'] = 'jpg|jpeg|png';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('gambar')) {
                echo "File tidak dapat di upload!";
            } else {
                $gambar = $this->upload->data('file_name');
            }
        }

        $data = array(
            'judul'         => $judul,
            'slug'          => $slug,
            'id_user'       => $id_user,
            'isi_berita'    => $isi_berita,
            'tgl_posting'   => $tgl_posting,
            'gambar'        => $gambar
        );

        $this->model_pembayaran->insert($data, 'news');
        $_SESSION["sukses"] = 'Category berhasil di tambahkan';
        redirect('admin/news');
    }

    public function update()
    {
        $id_berita                = $this->input->post('id_berita');
        $judul          = $this->input->post('judul');
        $slug           = $this->input->post('slug');
        $isi_berita     = $this->input->post('isi_berita');

        $data = array(
            'judul'         => $judul,
            'slug'          => $slug,
            'isi_berita'    => $isi_berita,
            'tgl_posting'   => $tgl_posting,
        );

        $where = array(
            'id_berita' => $id_berita
        );

        $this->model_pembayaran->update('news', $data, $where);
        redirect('admin/news');
    }

    public function delete($id)
    {
        $where = array('id_berita' => $id);
        $this->model_pembayaran->delete($where, 'news');
        redirect('admin/news');
    }
}
