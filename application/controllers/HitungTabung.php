<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class HitungTabung extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('tabung');
    }

    function index()
    {
        $this->tabung->volume(5,3);
    }
}