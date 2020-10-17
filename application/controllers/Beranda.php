<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends AUTH_Controller {
    public function __construct() {
        parent::__construct();
    }

    public function index() {
        
        $data['userdata']       = $this->userdata;
        $data['page']           = "Halaman Utama";
        $data['judul']          = "Beranda";
        $this->load->view('beranda', $data);
    }
}

/* End of file Beranda.php */
/* Location: ./application/controllers/Beranda.php */