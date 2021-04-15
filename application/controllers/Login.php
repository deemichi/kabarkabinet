<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_auth');
    }

    public function index()
    {
        $session = $this->session->userdata('status');
        if ($session == '') {
            $this->load->view('login/form_login');
        } else {
            redirect('beranda');
        }
    }


    public function login_proses()
    {
        $this->form_validation->set_rules('pin', 'Pin', 'required|min_length[4]');

        if ($this->form_validation->run() == TRUE) {
            $pin = trim($_POST['pin']);

            $data = $this->M_auth->login($pin);

            if ($data == false) {
                $this->session->set_flashdata('pesan', 'PIN salah !');
                redirect('login');
            } else {

                $session = [
                    'userdata' => $data,
                    'status' => "Loged in"
                ];
                $this->session->set_userdata($session);
                redirect('beranda');
            }
        } else {
            $this->session->set_flashdata('pesan', validation_errors());
            redirect('login');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
}
