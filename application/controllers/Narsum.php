<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Narsum extends AUTH_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_websitekl');
        $this->load->model('M_narsum');
        $this->load->helper('tgl_indo.php');
    }

    public function index()
    {

        $data['userdata']         = $this->userdata;
        $data['websitekl'] = $this->M_websitekl->websitekl();
        $this->template->views('narsum_view', $data);
    }

    function ajax_list()
    {
        $list = $this->M_narsum->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $data_narsum) {
            $no++;
            $row = array();
            $row[] = '<a class="btn btn-info btn-circle" role="button" title="Edit"><i class="mdi mdi-pencil mdi-24px" data-toggle="tooltip" data-original-title="Edit" href="javascript:void(0)" onclick="edit_narsum(' . "'" . $data_narsum->id . "'" . ')"></i></a>
            <a class="btn btn-danger btn-circle" role="button" title="Hapus"><i class="mdi mdi-delete  mdi-24px" data-toggle="tooltip" data-original-title="Hapus" href="javascript:void(0)" onclick="hapus_narsum(' . "'" . $data_narsum->id . "'" . ')"></i></a>
            ';

            $row[] = $data_narsum->nama;
            $row[] = $data_narsum->jabatan;
            $row[] = $data_narsum->nama_kl;
            $row[] = mediumdate_indo($data_narsum->awal_jabatan);
            $row[] = mediumdate_indo($data_narsum->akhir_jabatan);
            $row[] = $data_narsum->status;
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->M_narsum->count_all(),
            "recordsFiltered" => $this->M_narsum->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }


    public function ajax_add()
    {
        $this->_validate();

        $data = array(
            'nama'             => $this->input->post('nama'),
            'jabatan'          => $this->input->post('jabatan'),
            'id_kl'             => $this->input->post('id_kl'),
            'awal_jabatan'          => $this->input->post('awal_jabatan'),
            'akhir_jabatan'          => $this->input->post('akhir_jabatan'),
            'status'          => $this->input->post('status'),
        );

        $insert = $this->M_narsum->save($data);

        echo json_encode(array("status" => TRUE));
    }

    private function _validate()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        if ($this->input->post('nama') == '') {
            $data['inputerror'][] = 'nama';
            $data['error_string'][] = 'Nama tidak boleh kosong !';
            $data['status'] = FALSE;
        }

        if ($data['status'] === FALSE) {
            echo json_encode($data);
            exit();
        }
    }


    public function ajax_delete($id)
    {
        $this->M_narsum->delete_by_id($id);
        echo json_encode(array("status" => TRUE));
    }


    public function ajax_edit($id)
    {
        $data = $this->M_narsum->get_by_id($id);
        echo json_encode($data);
    }

    public function ajax_update()
    {
        $this->_validate();
        $data = array(
            'nama'             => $this->input->post('nama'),
            'jabatan'          => $this->input->post('jabatan'),
            'id_kl'             => $this->input->post('id_kl'),
            'awal_jabatan'          => $this->input->post('awal_jabatan'),
            'akhir_jabatan'          => $this->input->post('akhir_jabatan'),
            'status'          => $this->input->post('status'),
        );
        $this->db->update('kabar_kabinet_narasumber', $data, array('id' => $this->input->post('id')));
        echo json_encode(array("status" => TRUE));
    }
}
