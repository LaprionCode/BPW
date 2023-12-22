<?php
defined('BASEPATH') or exit('No direct script access allowed');

class sembako extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('sembako_model');
    }

    public function index()
    {
        $data['judul'] = "Halaman Sembako";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['sembako'] = $this->sembako_model->get();
        $this->load->view("layout/header", $data);
        $this->load->view("sembako/vw_sembako", $data);
        $this->load->view("layout/footer", $data);
    }

    public function tambah()
    {
        $data['judul'] = "Halaman Tambah Sembako";
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['sembako'] = $this->sembako_model->get();
        $this->form_validation->set_rules('nama', 'Nama Sembako', 'required', [
            'required' => 'Nama Sembako Wajib di isi'
        ]);
        $this->form_validation->set_rules('stok', 'Stok', 'required', [
            'required' => 'Stok Sembako Wajib di isi'
        ]);
        $this->form_validation->set_rules('harga', 'Harga', 'required', [
            'required' => 'Harga Sembako Wajib di isi'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view("layout/header", $data);
            $this->load->view("sembako/vw_tambah_sembako", $data);
            $this->load->view("layout/footer");
        } else {
            $data = [
                'nama' => $this->input->post('nama'),
                'stok' => $this->input->post('stok'),
                'harga' => $this->input->post('harga'),
            ];
            $upload_image = $_FILES['gambar']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/img/sembako/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('gambar')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('gambar', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
                $this->sembako_model->insert($data);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Sembako Berhasil Ditambah!</div>');
                redirect('Sembako');
            }
        }
    }

    public function hapus($id)
    {
        $this->sembako_model->delete($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Data Sembako Berhasil Dihapus!</div>');
        redirect('Sembako');
    }

    public function edit($id)
    {
        $data['judul'] = "Halaman Edit Sembako";
        $data['sembako'] = $this->sembako_model->getById($id);
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->form_validation->set_rules('nama', 'Nama Sembako', 'required', [
            'required' => 'Nama Sembako Wajib di isi'
        ]);
        $this->form_validation->set_rules('stok', 'Stok', 'required', [
            'required' => 'Stok Sembako Wajib di isi'
        ]);
        $this->form_validation->set_rules('harga', 'Harga', 'required', [
            'required' => 'Harga Sembako Wajib di isi'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view("layout/header", $data);
            $this->load->view("sembako/vw_ubah_sembako", $data);
            $this->load->view("layout/footer");
        } else {
            $data = [
                'nama' => $this->input->post('nama'),
                'stok' => $this->input->post('stok'),
                'harga' => $this->input->post('harga'),
            ];
            $upload_image = $_FILES['gambar']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/img/sembako/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('gambar')) {
                    $old_image = $data['sembako']['gambar'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/prodi/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('gambar', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $id = $this->input->post('id');
            $this->sembako_model->update(['id' => $id], $data, $upload_image);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Sembako Berhasil DiUbah!</div>');
            redirect('Sembako');
        }
    }
}


/* End of file Mahasiswa.php */
/* Location: ./application/controllers/Mahasiswa.php */