<?php

class News_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function get_news($uri = false) {
        if ($uri === false) {
            $sql = $this->db->get('news');
            return $sql->result_array();
        } else {
            $sql = $this->db->get_where('news', array('uri' => $uri));
            return $sql->row_array();
        }
    }
    public function set_news(){
        $this->load->helper('url');
        $uri = url_title($this->input->post('title','dash', TRUE));
        $data = array(
            "title" => $this->input->post('title'),
            "uri" => $uri,
            "text" => $this->input->post('text')
        );
        $this->db->insert('news',$data);
    }

}
