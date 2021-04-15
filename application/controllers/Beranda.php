<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Beranda extends AUTH_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_beranda');
    }

    public function index()
    {

        $data['userdata']         = $this->userdata;

        $this->template->views('beranda_view', $data);
    }
}

/* End of file Beranda.php */
/* Location: ./application/controllers/Beranda.php */