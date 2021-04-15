<?php
class Template
{
    protected $_ci;

    function __construct()
    {
        $this->_ci = &get_instance(); //Untuk Memanggil function load, dll dari CI. ex: $this->load, $this->model, dll
    }

    function views($template = NULL, $data = NULL)
    {
        if ($template != NULL) {
            // head
            $data['_meta']                     = $this->_ci->load->view('_layout/_kabarkabinet/_meta', $data, TRUE);
            $data['_css']                     = $this->_ci->load->view('_layout/_kabarkabinet/_css', $data, TRUE);

            // Header
            $data['_nav']                     = $this->_ci->load->view('_layout/_kabarkabinet/_nav', $data, TRUE);
            //$data['_header'] 				= $this->_ci->load->view('_layout/_simodis/_header', $data, TRUE);

            //Sidebar
            //$data['_sidebar'] 				= $this->_ci->load->view('_layout/_simodis/_sidebar', $data, TRUE);

            //Content
            //$data['_headerContent'] 		= $this->_ci->load->view('_layout/_simodis/_headerContent', $data, TRUE);
            $data['_mainContent']             = $this->_ci->load->view($template, $data, TRUE);
            $data['_content']                 = $this->_ci->load->view('_layout/_kabarkabinet/_content', $data, TRUE);


            //JS
            $data['_js']                     = $this->_ci->load->view('_layout/_kabarkabinet/_js', $data, TRUE);

            echo $data['_template']         = $this->_ci->load->view('_layout/_kabarkabinet/_template', $data, TRUE);
        }
    }
}
