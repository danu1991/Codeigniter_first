<?php

class LoyalityVote extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function getVotedResult($questionId, $userId, $vote) {

        if ($vote == 'yes') {
            $res = $this->db->get_where('loyality', array('voted_catagary' => "yes", 'question_id' => $questionId, 'voted_user_id' => $userId));
            if ($res->num_rows() == 1) {
                $row = $res->row_array();

                return "you already voted as useful";
            } else {
                return false;
            }
        } else {
            $res = $this->db->get_where('loyality', array('voted_catagary' => "no", 'question_id' => $questionId, 'voted_user_id' => $userId));
            if ($res->num_rows() == 1) {
                $row = $res->row_array();

                return "you already voted as unuseful";
            } else {
                return false;
            }
        }
    }

    public function get($args) {

        // use array keys as column names for db lookup
        $where = array();
        $valid_column_names = array('question_id', 'loyality_user_id');
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

        $result = $this->db->get('loyality');
        // return the results as an array - in which each selected row appears as an array
        return $result->result_array();
    }

    public function enroll($question_id, $vote, $asker_user_id, $voted_user_id) {

        // we should do some error checking here to check the module and
        // the student exist, and that the student hasn't previously enrolled
        // add student to module

        $res = $this->db->get_where('loyality', array('question_id' => $question_id, 'voted_user_id' => $voted_user_id));
        if ($res->num_rows() == 1) {
//              $row = $res->row_array();
//
//            if( $row['loyality_point']=='-1'){
//                
//            }
            
            if ($vote == "yes") {
                $this->db->where('question_id', $question_id);
                $this->db->where('voted_user_id', $voted_user_id);
                $this->db->set('loyality_point', '`loyality_point`+1',FALSE);
                $this->db->set('voted_catagary', $vote);
            } else {
                $this->db->where('question_id', $question_id);
                $this->db->where('voted_user_id', $voted_user_id);
                $this->db->set('loyality_point', 'loyality_point-1',FALSE);
                $this->db->set('voted_catagary', $vote);
            }
          
            $this->db->update('loyality');
        } else {
            if ($vote == "yes") {
                $this->db->insert('loyality', array('question_id' => $question_id, 'voted_catagary' => $vote, 'loyality_user_id' => $asker_user_id, 'voted_user_id' => $voted_user_id, 'loyality_point' => "1"));
            } else {
                $this->db->insert('loyality', array('question_id' => $question_id, 'voted_catagary' => $vote, 'loyality_user_id' => $asker_user_id, 'voted_user_id' => $voted_user_id, 'loyality_point' => "-1"));
            }
        }
    
// return the results as an array - in which each selected row appears as an array
        return true;
    }

}

?>
