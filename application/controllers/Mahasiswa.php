<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Mahasiswa extends CI_Controller
{
    
  public function __construct()
  {
    parent::__construct();
    is_logged_in();
    $this->load->model('mahasiswa_model');
    $this->load->model('prodi_model');
  }

  public function index()
  {
    $data['judul']="Halaman Mahasiswa";
    $data['user'] = $this->db->get_where('user',['email'=>$this->session->userdata('email')]) ->row_array();
    $data['mahasiswa'] = $this->mahasiswa_model->get();
    $this->load->view("layout/header",$data);
    $this->load->view("mahasiswa/vw_mahasiswa",$data);
    $this->load->view("layout/footer",$data);
  }

  public function tambah()
  {
    $data['judul'] ="Halaman Tambah Mahasiswa";
    $data['user'] = $this->db->get_where('user',['email'=>$this->session->userdata('email')]) ->row_array();
    $data['prodi']=$this->prodi_model->get();
    $this->form_validation->set_rules('nama','Nama Mahasiswa','required',[
      'required'=>'Nama Mahasiswa Wajib di isi'
    ]);
    $this->form_validation->set_rules('nim','NIM','required',[
      'required'=>'NIM Mahasiswa Wajib di isi'
    ]);
    $this->form_validation->set_rules('jenis_kelamin','Jenis Kelamin','required',[
      'required'=>'Jenis Kelamin Mahasiswa Wajib di isi'
    ]);
    $this->form_validation->set_rules('email','email','required',[
      'required'=>'Email Mahasiswa Wajib di isi'
    ]);
    $this->form_validation->set_rules('prodi','Prodi','required',[
      'required'=>'Prodi Mahasiswa Wajib di isi'
    ]);
    $this->form_validation->set_rules('asal_sekolah','Asal sekolah','required',[
      'required'=>'Asal Sekolah Mahasiswa Wajib di isi'
    ]);
    $this->form_validation->set_rules('no_hp','No HP','required',[
      'required'=>'No HP Mahasiswa Wajib di isi'
    ]);
    $this->form_validation->set_rules('alamat','Alamat','required',[
      'required'=>'Alamat Mahasiswa Wajib di isi'
    ]);
    if($this->form_validation->run()== false){

      $this->load->view("layout/header", $data);
      $this->load->view("mahasiswa/vw_tambah_mahasiswa", $data); 
      $this->load->view("layout/footer");
    }else{
      $data=[
        'nama'=>$this->input->post('nama'),
        'nim'=>$this->input->post('nim'),
        'jenis_kelamin'=>$this->input->post('jenis_kelamin'),
        'email'=>$this->input->post('email'),
        'prodi'=>$this->input->post('prodi'),
        'asal_sekolah'=>$this->input->post('asal_sekolah'),
        'no_hp'=>$this->input->post('no_hp'),
        'alamat'=>$this->input->post('alamat'),
      ];
      $this->mahasiswa_model->insert($data);
      $this->session->set_flashdata('message','<div class="alert alert-success"
      role="alert">Data Mahasiswa Berhasil Ditambah!</div>');
      redirect('Mahasiswa');
    }
  }

  public function detail($id)
  {
    $data['judul'] ="Halaman Detail Mahasiswa";
    $data['mahasiswa'] = $this->mahasiswa_model->getById($id);
    $this->load->view("layout/header", $data);
    $this->load->view("mahasiswa/vw_detail_mahasiswa", $data); 
    $this->load->view("layout/footer");
  }
  
  public function hapus ($id)
  {
    $this->mahasiswa_model->delete($id);
    $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
    Data Mahasiswa Berhasil Dihapus!</div>');
    redirect('mahasiswa');
  }

  public function upload()
  {
    $data = [
    'nama' => $this->input->post('nama'),
    'nim' => $this->input->post('nim'),
    'email' => $this->input->post('email'),
    'prodi' => $this->input->post('prodi'),
    'alamat' => $this->input->post('alamat'),
    'jenis_kelamin' => $this->input->post('jenis_kelamin'),
    'asal_sekolah' => $this->input->post('asal_sekolah'),
    'no_hp' => $this->input->post('no_hp'),
    ];
    $this->mahasiswa_model->insert($data);
    redirect('Mahasiswa');
  }

  function edit($id)
  {
  $data['judul'] = "Halaman Edit Mahasiswa";
  $data['mahasiswa'] = $this->mahasiswa_model->getById($id);
  $data['user'] = $this->db->get_where('user', ['email' =>$this->session->userdata('email')])->row_array();
  $data['prodi'] = $this->prodi_model->get();
  $this->form_validation->set_rules('nama', 'nama Mahasiswa', 'required', [
  'required' => 'Nama Mahasiswa Wajib di isi'
  ]);
  $this->form_validation->set_rules('nim', 'nim', 'required', [
  'required' => 'NIM Mahasiswa Wajib di isi'
  ]);
  $this->form_validation->set_rules('email', 'email', 'required', [
  'required' => 'Email Mahasiswa Wajib di isi'
  ]);
  $this->form_validation->set_rules('prodi', 'prodi', 'required', [
  'required' => 'Prodi Mahasiswa Wajib di isi'
  ]);
  $this->form_validation->set_rules('alamat', 'alamat', 'required', [
  'required' => 'Alamat Mahasiswa Wajib di isi'
  ]);
  $this->form_validation->set_rules('asal_sekolah', 'asal_sekolah', 'required', [
  'required' => 'Asal Sekolah Mahasiswa Wajib di isi'
  ]);
  $this->form_validation->set_rules('no_hp', 'no_hp', 'required|numeric', [
  'required' => 'NO HP Mahasiswa Wajib di isi',
  'numeric' => 'NO HP harus Angka'
  ]);
  $this->form_validation->set_rules('jenis_kelamin', 'jenis_kelamin', 'required', [
  'required' => 'Jenis Kelamin Mahasiswa Wajib di isi',
]);
  if ($this->form_validation->run() == false) {
  $this->load->view("layout/header", $data);
  $this->load->view("mahasiswa/vw_ubah_mahasiswa", $data);
  $this->load->view("layout/footer");
  } else {
  $data = [
  'nama' => $this->input->post('nama'),
  'nim' => $this->input->post('nim'),
  'email' => $this->input->post('email'),
  'prodi' => $this->input->post('prodi'),
  'alamat' => $this->input->post('alamat'),
  'jenis_kelamin' => $this->input->post('jenis_kelamin'),
  'no_hp' => $this->input->post('no_hp'),
  'asal_sekolah' => $this->input->post('asal_sekolah'),
];
  $id = $this->input->post('id');
  $this->mahasiswa_model->update(['id' => $id], $data);
  $this->session->set_flashdata('message', '<div class="alert alert-success"
  role="alert">Data Mahasiswa Berhasil DiUbah!</div>');
  redirect('Mahasiswa');
}
}
  }


/* End of file Mahasiswa.php */
/* Location: ./application/controllers/Mahasiswa.php */