<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AUTH_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->userdata = $this->session->userdata('userdata');

        //$this->session->set_flashdata('segment', explode('/', $this->uri->uri_string()));

        if ($this->session->userdata('status') == '') {
            redirect('login');
        }
    }
}

/* End of file MY_Auth.php */
/* Location: ./application/core/AUTH_Controller.php */