<?php
defined('BASEPATH') or exit('No direct script access allowed');

use Dompdf\Dompdf;

class penjualan extends CI_Controller
{
    public function __construct()
    {

        parent::__construct();
        is_logged_in2();
        $this->load->model('sembako_model');
        $this->load->model('Penjualan_model');
        $this->load->model('user_model');
        $this->load->model('Detail_model');
        $this->load->model('Keranjang_model');
    }

    public function index()
    {
        $data['judul'] = 'Halaman Penjualan';
        $data['penjualan'] = $this->Penjualan_model->get();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['jlh'] = $this->Keranjang_model->jumlah();
        $this->load->view("layout/header", $data);
        $this->load->view("penjualan/vw_penjualan", $data);
        $this->load->view("layout/footer");
    }
    public function detail($id)
    {
        $data['judul'] = "Halaman Detail penjualan";
        $data['detail'] = $this->Detail_model->getById($id);
        $data['jlh'] = $this->Keranjang_model->jumlah();
        $data['penjualan'] = $this->Penjualan_model->getByIdP($id);
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->form_validation->set_rules('status', 'Status', 'required', [
            'required' => 'Status Wajib di isi'
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view("layout/header", $data);
            $this->load->view("penjualan/vw_detail_penjualan", $data);
            $this->load->view("layout/footer");
        } else {
            $status = $this->input->post('status');
            $nojual = $this->input->post('no_penjualan');
            $this->Penjualan_model->updatestatus($status, $nojual);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Status Berhasil DiUbah!</div>');
            redirect('Penjualan');
        }
    }
    public function export()
    {
        $dompdf = new Dompdf();
        $this->data['all_jual'] = $this->Penjualan_model->get();
        $this->data['title'] = 'Laporan Data Penjualan';
        $this->data['no'] = 1;
        $dompdf->setPaper('A4', 'Landscape');
        $html = $this->load->view('penjualan/report', $this->data, true);
        $dompdf->load_html($html);
        $dompdf->render();
        $dompdf->stream('Laporan Data Penjualan Tanggal ' . date('d F Y'), array("Attachment" => false));
    }
}
