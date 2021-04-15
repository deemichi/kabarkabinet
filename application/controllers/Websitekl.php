<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Websitekl extends AUTH_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_websitekl');
    }

    public function index()
    {

        $data['userdata']         = $this->userdata;

        $this->template->views('websitekl_view', $data);
    }

    function ajax_list()
    {
        $list = $this->M_websitekl->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $data_websitekl) {
            $no++;
            $row = array();
            $row[] = '<a class="btn btn-info btn-circle" role="button" title="Edit"><i class="mdi mdi-pencil mdi-24px" data-toggle="tooltip" data-original-title="Edit" href="javascript:void(0)" onclick="edit_websitekl(' . "'" . $data_websitekl->id . "'" . ')"></i></a>
            <a class="btn btn-danger btn-circle" role="button" title="Hapus"><i class="mdi mdi-delete  mdi-24px" data-toggle="tooltip" data-original-title="Hapus" href="javascript:void(0)" onclick="hapus_websitekl(' . "'" . $data_websitekl->id . "'" . ')"></i></a>
            ';
            $row[] = $data_websitekl->nama_kl;
            $row[] = '<a href="' . $data_websitekl->website_kl . '" target="_blank">' . $data_websitekl->website_kl . '</a>';;;
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->M_websitekl->count_all(),
            "recordsFiltered" => $this->M_websitekl->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }


    public function ajax_add()
    {
        $this->_validate();

        $data = array(
            'nama_kl'             => $this->input->post('nama_kl'),
            'website_kl'          => $this->input->post('website_kl'),
        );

        $insert = $this->M_websitekl->save($data);

        echo json_encode(array("status" => TRUE));
    }

    private function _validate()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        if ($this->input->post('nama_kl') == '') {
            $data['inputerror'][] = 'nama_kl';
            $data['error_string'][] = 'Nama K/L boleh kosong !';
            $data['status'] = FALSE;
        }

        if ($data['status'] === FALSE) {
            echo json_encode($data);
            exit();
        }
    }


    public function ajax_delete($id)
    {
        $this->M_websitekl->delete_by_id($id);
        echo json_encode(array("status" => TRUE));
    }


    public function ajax_edit($id)
    {
        $data = $this->M_websitekl->get_by_id($id);
        echo json_encode($data);
    }

    public function ajax_update()
    {
        $this->_validate();
        $data = array(
            'nama_kl'             => $this->input->post('nama_kl'),
            'website_kl'          => $this->input->post('website_kl'),
        );
        $this->db->update('kabar_kabinet_kl', $data, array('id' => $this->input->post('id')));
        echo json_encode(array("status" => TRUE));
    }
}
