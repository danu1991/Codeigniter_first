<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of votedUser
 *
 * @author ENVY i7
 */
class VotedUser extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function isVotedUser($question_id, $user_id) {

        $this->db->where('question_answer_id', $question_id);
        $this->db->where('voted_user_id', $user_id);
        //$this->db->set('vote_type', $vote_type);

        $this->db->delete('voteduser');
        return true;
    }

    public function questionVotedUserInsert($question_id, $user_id, $vote_type) {

        $this->db->insert('voteduser', array('question_answer_id' => $question_id, 'voted_user_id' => $user_id, 'vote_type' => $vote_type));


        return true;
    }

    public function getVotedResult($questionId, $userId) {


        $res = $this->db->get_where('votedUser', array('question_answer_id' => $questionId, 'voted_user_id' => $userId));
        if ($res->num_rows() == 1) {
            $row = $res->row_array();


            return $res->row_array();
            ;
        } else {
            return false;
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
                $this->db->set('loyality_point', '`loyality_point`+1', FALSE);
                $this->db->set('voted_catagary', $vote);
            } else {
                $this->db->where('question_id', $question_id);
                $this->db->where('voted_user_id', $voted_user_id);
                $this->db->set('loyality_point', 'loyality_point-1', FALSE);
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

    public function deleteVotedUser($user_id) {
        $this->db->select('question_answer_id,vote_type');
        $this->db->where('voted_user_id', $user_id);
        $res = $this->db->get('voteduser');
        $res->row_array();
        foreach ($res->result_array() as $row) {
            $result = $row['question_answer_id'];
            if ($result[0] == 'q') {


                $this->db->select('asker_user_id');
                $this->db->where('question_id',substr($result, 1));
                $resQuestion = $this->db->get('question');
                $rowQuestion = $resQuestion->row_array();
                $this->db->where('user_id', $rowQuestion['asker_user_id']);
                if ($row['vote_type'] == 'yes') {
                    $this->db->set('loyality', '`loyality`-1', FALSE);
                } else {
                    $this->db->set('loyality', '`loyality`+1', FALSE);
                }
                $this->db->update('users');


                $this->db->where('question_id', substr($result, 1));
                if ($row['vote_type'] == 'yes') {
                    $this->db->set('vote', '`vote`-1', FALSE);
                } else {
                    $this->db->set('vote', '`vote`+1', FALSE);
                }
                $this->db->update('question');
            } else if ($result[0] == 'a') {

                $this->db->select('answer_user_id');
                $this->db->where('answer_id',substr($result, 1));
                $resAnswer = $this->db->get('answer');
                $rowAnswer = $resAnswer->row_array();
                $this->db->where('user_id', $rowAnswer['answer_user_id']);
                if ($row['vote_type'] == 'yes') {
                    $this->db->set('reputation', '`reputation`-1', FALSE);
                } else {
                    $this->db->set('reputation', '`reputation`+1', FALSE);
                }
                $this->db->update('users');





                $this->db->where('answer_id', substr($result, 1));
                if ($row['vote_type'] == 'yes') {
                    $this->db->set('vote_value', '`vote_value`-1', FALSE);
                } else {
                    $this->db->set('vote_value', '`vote_value`+1', FALSE);
                }
                $this->db->update('answer');
            }
        }

        $this->db->where('voted_user_id', $user_id);
        $this->db->delete('voteduser');
        return $res->result_array();
    }

}

?>
