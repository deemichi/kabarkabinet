<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Beritasetkab extends AUTH_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_beritasetkab');
        //$this->load->model('M_beritasetkab');
        $this->load->helper('tgl_indo.php');
    }

    public function index()
    {

        $data['userdata']         = $this->userdata;
        //$data['websitekl'] = $this->M_websitekl->websitekl();
        $this->template->views('beritasetkab_view', $data);
    }

    function ajax_list()
    {
        $list = $this->M_beritasetkab->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $data_beritasetkab) {
            $no++;
            $row = array();
            $row[] = '<a class="btn btn-info btn-circle" role="button" title="Edit"><i class="mdi mdi-pencil mdi-24px" data-toggle="tooltip" data-original-title="Edit" href="javascript:void(0)" onclick="edit_beritasetkab(' . "'" . $data_beritasetkab->id . "'" . ')"></i></a>
            <a class="btn btn-danger btn-circle" role="button" title="Hapus"><i class="mdi mdi-delete  mdi-24px" data-toggle="tooltip" data-original-title="Hapus" href="javascript:void(0)" onclick="hapus_beritasetkab(' . "'" . $data_beritasetkab->id . "'" . ')"></i></a>
            ';

            $row[] = mediumdate_indo($data_beritasetkab->tgl_berita);
            $row[] = '<a href="' . $data_beritasetkab->url_berita . '" target="_blank">' . $data_beritasetkab->judul_berita . '</a>';
            $row[] = $data_beritasetkab->tag;
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->M_beritasetkab->count_all(),
            "recordsFiltered" => $this->M_beritasetkab->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }


    public function ajax_add()
    {
        $this->_validate();

        $data = array(
            'tgl_berita'             => $this->input->post('tgl_berita'),
            'judul_berita'          => $this->input->post('judul_berita'),
            'url_berita'             => $this->input->post('url_berita'),
            'tag'          => $this->input->post('tag'),
        );

        $insert = $this->M_beritasetkab->save($data);

        echo json_encode(array("status" => TRUE));
    }

    private function _validate()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        if ($this->input->post('judul_berita') == '') {
            $data['inputerror'][] = 'judul_berita';
            $data['error_string'][] = 'Judul tidak boleh kosong !';
            $data['status'] = FALSE;
        }

        if ($data['status'] === FALSE) {
            echo json_encode($data);
            exit();
        }
    }


    public function ajax_delete($id)
    {
        $this->M_beritasetkab->delete_by_id($id);
        echo json_encode(array("status" => TRUE));
    }


    public function ajax_edit($id)
    {
        $data = $this->M_beritasetkab->get_by_id($id);
        echo json_encode($data);
    }

    public function ajax_update()
    {
        $this->_validate();
        $data = array(
            'tgl_berita'             => $this->input->post('tgl_berita'),
            'judul_berita'          => $this->input->post('judul_berita'),
            'url_berita'             => $this->input->post('url_berita'),
            'tag'          => $this->input->post('tag'),
        );
        $this->db->update('kabar_kabinet_setkab', $data, array('id' => $this->input->post('id')));
        echo json_encode(array("status" => TRUE));
    }
}
