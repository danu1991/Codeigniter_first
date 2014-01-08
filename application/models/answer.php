<?php

class Answer extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function getAnswerList($user_id) {

        $this->db->where('answer_user_id', $user_id);
 
        $result = $this->db->get('answer');
        // return the results as an array - in which each selected row appears as an array
        return $result->result_array();
    }
    public function get($args) {

        // use array keys as column names for db lookup
//        $where = array();
//        $valid_column_names = array('answer_id', 'question_id','answer_user_id');
//        // use only those $args vals (from URL) that match col names in students table
//        foreach ($valid_column_names as $key) {
//            if (isset($args[$key])) {
//                $where[$key] = $args[$key];
//            }
//        }
//        if (count($where) == 0) { // stop full select on table
//            return false;
//        }
//
//        $this->db->where($where);
//        $this->db->order_by("vote_value");
//        $result = $this->db->get('answer');
//        // return the results as an array - in which each selected row appears as an array
//        return $result->result_array();
        
          if (isset($args['question_id'])) {
            $this->db->distinct();
            $this->db->select('users.user_name,answer.question_id,answer.answer_user_id,users.reputation,answer.answer_id,answer.answer,answer.vote_value,answer.date,answer.edit_date');
            $this->db->from('answer');
            $this->db->where('answer.question_id', $args['question_id']);
            $this->db->join('users', 'answer.answer_user_id = users.user_id', 'INNER');
            $result = $this->db->get();


            // return the results as an array - in which each selected row appears as an array
        } else if (isset($args['answer_user_id'])) {
 
            $this->db->distinct();
            $this->db->select('answer.question_id,answer.answer_id,answer.answer,answer.vote_value');
            $this->db->from('answer');
            $this->db->where('answer.answer_user_id', $args['answer_user_id']);
            $this->db->join('users', 'answer.answer_user_id = users.user_id', 'INNER');
            $result = $this->db->get();
        } else if (isset($args['answer_id'])) {
 
            $this->db->distinct();
            $this->db->select('answer.question_id,answer.answer_id,answer.answer,answer.vote_value');
            $this->db->from('answer');
            $this->db->where('answer.answer_id', $args['answer_id']);
            $this->db->join('users', 'answer.answer_user_id = users.user_id', 'INNER');
            $result = $this->db->get();
        }
        return $result->result_array();
    }

    public function enroll($answer_user_id, $question_id, $answer_discription, $date) {


        // we should do some error checking here to check the module and
        // the student exist, and that the student hasn't previously enrolled


        $decodeDiscription = urldecode(urldecode($answer_discription));
        // add student to module
        $this->db->insert('answer', array('answer' => $decodeDiscription, 'question_id' => $question_id, 'date' => $date, 'answer_user_id' => $answer_user_id, 'voted_user_id' => '', 'answer_edit_user_id' => $answer_user_id, 'vote_value' => '0', 'edit_date' => '0'));

        // return the results as an array - in which each selected row appears as an array
        $this->updateNumberOfAnswers($question_id);
    
        
    }
      
   

    public function updateAnswer($answer_id, $answer, $answer_date) {



        $decodeDiscription = urldecode(urldecode($answer));
        // add student to module
        // add student to module        $decodeTitle = urldecode(urldecode($question_title));
        $this->db->where('answer_id', $answer_id);

        $this->db->set('answer', $decodeDiscription);
      
        $this->db->set('edit_date', $answer_date);

        $this->db->update('answer');
        return true;
}

    public function getAnswerId($answer_id) {
        $res = $this->db->get_where('answer', array('answer_id' => $answer_id));
        if ($res->num_rows() == 1) {
            $row = $res->row_array();

            return $row['answer_user_id'];
        } else {
            return false;
        }
    }

    public function alreadyAnswer($answer_id, $user_id) {
        $res = $this->db->get_where('answer', array('question_id' => $answer_id, 'answer_user_id' => $user_id));
        if ($res->num_rows() == 1) {
            $row = $res->row_array();

            return true;
        } else {
            return false;
        }
    }

    public function updateNumberOfAnswers($question_id) {

        $this->db->where('question_id', $question_id);
        $this->db->set('number_of_answers', '`number_of_answers`+1', FALSE);
        $this->db->update('question');

        return true;
    }
 public function getAnswerUserId($answer_id) {
        $res = $this->db->get_where('answer', array('answer_id' => $answer_id));
        if ($res->num_rows() == 1) {
            $row = $res->row_array();

            return $row['answer_user_id'];
            ;
        } else {
            return false;
        }
    }
    
      public function updateVotes($answer_id, $votes) {
        $this->db->where('answer_id', $answer_id);
      if($votes=='yes'){
        $this->db->set('vote_value', '`vote_value`+1', FALSE);
      }else{
           $this->db->set('vote_value', '`vote_value`-1', FALSE);
      }
        $this->db->update('answer');
        return true;
    }
    
     public function deleteAnswerWithQuestionId($question_id) {
        $this->db->where('question_id', $question_id);
        $this->db->delete('answer');


        return true;
    }
     public function  deleteAnswerByUserId($user_id){
       
         
         
         $this->db->where('answer_user_id',$user_id);
         
            $res = $this->db->get('answer');
        $res->row_array();
        foreach ($res->result_array() as $row) {
        $this->db->where('question_id', $row['question_id']);
           $this->db->set('number_of_answers', '`number_of_answers`-1', FALSE);
        $this->db->update('question');
        
            
        }
        
        
      $this->db->where('answer_user_id', $user_id);
  $this->db->delete('answer');
        return true;
    
    }
    
    public function  deleteAnswer($answer_id){
       
        
        
         $this->db->where('answer_id', $answer_id);
        $this->db->delete('answer');
        return true;
    
    }
}

?>
