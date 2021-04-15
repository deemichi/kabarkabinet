<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_berita extends CI_Model
{

    var $table = 'kabar_kabinet_berita_kl';
    var $view = 'view_berita_kl';
    var $column_order = array(null, 'id_kl', 'tgl_berita', 'judul_berita', 'url_berita', 'monitor', 'nama_kl'); //set column field database for datatable orderable
    var $column_search = array('id_kl', 'tgl_berita', 'judul_berita', 'url_berita', 'monitor', 'nama_kl'); //set column field database for datatable searchable 
    var $order = array('id' => 'desc'); // default order 

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    private function _get_datatables_query()
    {

        //add custom filter here
        /* if ($this->input->post('tgl_sidang1')) {
            $this->db->where('date_format(tgl_sidang,"%Y-%m-%d") >=', $this->input->post('tgl_sidang1'));
        }
        if ($this->input->post('tgl_sidang2')) {
            $this->db->where('date_format(tgl_sidang,"%Y-%m-%d") <=', $this->input->post('tgl_sidang2'));
        }*/


        $this->db->from($this->view);
        $i = 0;

        foreach ($this->column_search as $item) // loop column 
        {
            if ($_POST['search']['value']) // if datatable send POST for search
            {

                if ($i === 0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if (isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    public function get_datatables()
    {
        $this->_get_datatables_query();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    public function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->db->from($this->view);
        return $this->db->count_all_results();
    }

    function save($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }



    function delete_by_id($id)
    {

        $this->db->delete($this->table, array('id' => $id));
    }

    function monitor_by_id($id)
    {

        $this->db->select('monitor');
        $this->db->where('id', $id);
        $query = $this->db->get('kabar_kabinet_berita_kl');
        $row = $query->row();
        //$query->result();
        if ($row->monitor != 'DIMONITOR') {
            $nilai_data = 'DIMONITOR';
        } else {
            $nilai_data = 'TIDAK DIMONITOR';
        }



        $this->db->set('monitor', $nilai_data);
        $this->db->where('id', $id);
        $this->db->update('kabar_kabinet_berita_kl');
    }


    public function get_by_id($id)
    {
        $this->db->from($this->table);
        $this->db->where('id', $id);
        $query = $this->db->get();

        return $query->row();
    }
}
