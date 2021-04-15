<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_auth extends CI_Model
{
    public function login($pin)
    {
        $this->db->select('*');
        $this->db->from('kabar_kabinet_pengguna');
        $this->db->where('pin_pengguna', md5($pin));

        $data = $this->db->get();

        if ($data->num_rows() == 1) {
            return $data->row();
        } else {
            return false;
        }
    }
}
