<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Berita extends AUTH_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_berita');
        $this->load->model('M_websitekl');
        $this->load->helper('tgl_indo.php');
    }

    public function index()
    {

        $data['userdata']         = $this->userdata;
        $data['websitekl'] = $this->M_websitekl->websitekl();
        $this->template->views('berita_view', $data);
    }

    function ajax_list()
    {
        $list = $this->M_berita->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $data_berita) {
            $no++;
            $row = array();
            $row[] = '<a class="btn btn-info btn-circle" role="button" title="Edit"><i class="mdi mdi-pencil mdi-24px" data-toggle="tooltip" data-original-title="Edit" href="javascript:void(0)" onclick="edit_berita(' . "'" . $data_berita->id . "'" . ')"></i></a>
            <a class="btn btn-success btn-circle" role="button" title="Monitor"><i class="mdi mdi-bell  mdi-24px" data-toggle="tooltip" data-original-title="Monitor" href="javascript:void(0)" onclick="monitor_berita(' . "'" . $data_berita->id . "'" . ')"></i></a>
            <a class="btn btn-danger btn-circle" role="button" title="Hapus"><i class="mdi mdi-delete  mdi-24px" data-toggle="tooltip" data-original-title="Hapus" href="javascript:void(0)" onclick="hapus_berita(' . "'" . $data_berita->id . "'" . ')"></i></a>
            ';
            $row[] = mediumdate_indo($data_berita->tgl_berita);
            $row[] = $data_berita->nama_kl;
            $row[] = '<a href="' . $data_berita->url_berita . '" target="_blank">' . $data_berita->judul_berita . '</a>';
            $row[] = $data_berita->monitor;

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->M_berita->count_all(),
            "recordsFiltered" => $this->M_berita->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }


    public function ajax_add()
    {
        $this->_validate();

        $data = array(
            'id_kl'             => $this->input->post('id_kl'),
            'tgl_berita'          => $this->input->post('tgl_berita'),
            'judul_berita'             => $this->input->post('judul_berita'),
            'url_berita'          => $this->input->post('url_berita'),
            'monitor'          => $this->input->post('monitor'),
        );

        $insert = $this->M_berita->save($data);

        echo json_encode(array("status" => TRUE));
    }

    private function _validate()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        if ($this->input->post('id_kl') == '') {
            $data['inputerror'][] = 'id_kl';
            $data['error_string'][] = 'Nama K/L tidak boleh kosong !';
            $data['status'] = FALSE;
        }

        if ($data['status'] === FALSE) {
            echo json_encode($data);
            exit();
        }
    }


    public function ajax_delete($id)
    {
        $this->M_berita->delete_by_id($id);
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_monitor($id)
    {
        $this->M_berita->monitor_by_id($id);
        echo json_encode(array("status" => TRUE));
    }


    public function ajax_edit($id)
    {
        $data = $this->M_berita->get_by_id($id);
        echo json_encode($data);
    }

    public function ajax_update()
    {
        $this->_validate();
        $data = array(
            'id_kl'             => $this->input->post('id_kl'),
            'tgl_berita'          => $this->input->post('tgl_berita'),
            'judul_berita'             => $this->input->post('judul_berita'),
            'url_berita'          => $this->input->post('url_berita'),
            'monitor'          => $this->input->post('monitor'),
        );
        $this->db->update('kabar_kabinet_berita_kl', $data, array('id' => $this->input->post('id')));
        echo json_encode(array("status" => TRUE));
    }
}
