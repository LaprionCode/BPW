<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$this->load->view('welcome_message');
	}
	public function home($nama = "")
	{
		echo "Hello.... ini adalah contoh ci pertama saya $nama";
	}

	public function komentar()
	{
		echo " ini adalah function komentar";	
	}
	
}
