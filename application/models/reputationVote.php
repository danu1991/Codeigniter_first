<?php

class ReputationVote extends CI_Model {
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
 
    public function get($args)
    {
       
        // use array keys as column names for db lookup
        $where = array();
        $valid_column_names = array('answer_id','reputation_user_id');
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
        
        $result = $this->db->get('reputation');
        // return the results as an array - in which each selected row appears as an array
        return $result->result_array();
    }
    public function enroll($answer_id, $vote, $answer_user_id, $voted_user_id) {

        // we should do some error checking here to check the module and
        // the student exist, and that the student hasn't previously enrolled
        // add student to module

        $res = $this->db->get_where('reputation', array('answer_id' => $answer_id, 'voted_user_id' => $voted_user_id));
        if ($res->num_rows() == 1) {
//              $row = $res->row_array();
//
//            if( $row['loyality_point']=='-1'){
//                
//            }
            
            if ($vote == "yes") {
                $this->db->where('answer_id', $answer_id);
                $this->db->where('voted_user_id', $voted_user_id);
                $this->db->set('reputation_point', '`reputation_point`+1',FALSE);
                $this->db->set('voted_catagary', $vote);
            } else {
                $this->db->where('answer_id', $answer_id);
                $this->db->where('voted_user_id', $voted_user_id);
                $this->db->set('reputation_point', 'reputation_point-1',FALSE);
                $this->db->set('voted_catagary', $vote);
            }
          
            $this->db->update('reputation');
        } else {
            if ($vote == "yes") {
                $this->db->insert('reputation', array('answer_id' => $answer_id, 'voted_catagary' => $vote, 'reputation_user_id' => $answer_user_id, 'voted_user_id' => $voted_user_id, 'reputation_point' => "1"));
            } else {
                $this->db->insert('reputation', array('answer_id' => $answer_id, 'voted_catagary' => $vote, 'reputation_user_id' => $answer_user_id, 'voted_user_id' => $voted_user_id, 'reputation_point' => "-1"));
            }
        }
    
// return the results as an array - in which each selected row appears as an array
        return true;
    }
     public function getVotedResult($answerId, $userId, $vote) {

        if ($vote == 'yes') {
            $res = $this->db->get_where('reputation', array('voted_catagary' => "yes", 'answer_id' => $answerId, 'voted_user_id' => $userId));
            if ($res->num_rows() == 1) {
                $row = $res->row_array();

                return "you already voted as useful";
            } else {
                return false;
            }
        } else {
            $res = $this->db->get_where('reputation', array('voted_catagary' => "no", 'answer_id' => $answerId, 'voted_user_id' => $userId));
            if ($res->num_rows() == 1) {
                $row = $res->row_array();

                return "you already voted as unuseful";
            } else {
                return false;
            }
        }
    }
}         
?>
