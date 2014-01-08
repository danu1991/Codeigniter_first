<?php

class Tag extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function post($question_id, $tag) {
        $tagArray = explode(',', $tag);

        foreach ($tagArray as $val) {
            // Do stuff while traversing array
            $this->db->insert('tag', array('question_id' => $question_id, 'tag' => $val));
        }
    }

    public function updateTag($question_id, $tag) {
        $this->db->where('question_id', $question_id);
        $this->db->delete('tag');
        $tagArray = explode(',', $tag);
        foreach ($tagArray as $val) {
            // Do stuff while traversing array
            $this->db->insert('tag', array('question_id' => $question_id, 'tag' => $val));
        }
    }
 public function deleteTag($args) {
        $this->db->where('question_id', $args['question_id']);
        $this->db->delete('tag');
       
    }
    
    public function get($args) {

        // use array keys as column names for db lookup
        $where = array();
        $valid_column_names = array('question_id');
        // use only those $args vals (from URL) that match col names in students table
        foreach ($valid_column_names as $key) {
            if (isset($args[$key])) {
                $where[$key] = $args[$key];
            }
        }
        if (count($where) == 0) { // stop full select on table
            return false;
        }
        $this->db->where($where);

        $result = $this->db->get('tag');
        // return the results as an array - in which each selected row appears as an array
        return $result->result_array();
    }

//    function get_node_list() {
//        $this->db->select('question_title');
//        $this->db->order_by('date', 'DESC');
//        $this->db->limit(30, 0);
//        $query = $this->db->get('question');
//
//        return $query->result();
//    }

}

?>
