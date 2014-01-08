<?php

class Question extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function getAskerId($question_id) {
        $res = $this->db->get_where('question', array('question_id' => $question_id));
        if ($res->num_rows() == 1) {
            $row = $res->row_array();

            return $row['asker_user_id'];
        } else {
            return false;
        }
    }

    public function getAskerUserId($question_id) {
        $res = $this->db->get_where('question', array('question_id' => $question_id));
        if ($res->num_rows() == 1) {
            $row = $res->row_array();

            return $row['asker_user_id'];
            ;
        } else {
            return false;
        }
    }

    public function updateVotes($question_id, $votes) {
        $this->db->where('question_id', $question_id);
        if ($votes == 'yes') {
            $this->db->set('vote', '`vote`+1', FALSE);
        } else {
            $this->db->set('vote', '`vote`-1', FALSE);
        }
        $this->db->update('question');
        return true;
    }

//    public function deleteQuestion($args) {
//        $this->db->where('question_id', $args['question_id']);
//        $this->db->delete('question');
//        return true;
//    }

    public function get($args) {

        // use array keys as column names for db lookup
//        $where = array();
//        if ('question_title' == '') {
//            echo 'question_title empty ';
//        }
//        $valid_column_names = array('question_id', 'question_title', 'tag', 'question_catagory', 'asker_user_id');
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
//        $this->db->order_by("date", 'DESC');

        if (isset($args['question_id'])) {
            $this->db->distinct();
            $this->db->select('users.user_name,question.asker_user_id,users.loyality,question.question_id,question.question_title,question.question_description,question.vote,question.question_avalability,question.close_reason,question.date,question.edit_date,question.close_user_id,question.tag');
            $this->db->from('question');
            $this->db->where('question.question_id', $args['question_id']);
            $this->db->join('users', 'question.asker_user_id = users.user_id', 'INNER');
            $result = $this->db->get();


            // return the results as an array - in which each selected row appears as an array
        } else if (isset($args['asker_user_id'])) {

            $this->db->distinct();
            $this->db->select('users.user_name,question.asker_user_id,users.loyality,question.question_id,question.question_title,question.vote,question.question_avalability,question.close_reason,question.date,question.edit_date,question.close_user_id,question.number_of_answers');
            $this->db->from('question');
            $this->db->where('question.asker_user_id', $args['asker_user_id']);
            $this->db->join('users', 'question.asker_user_id = users.user_id', 'INNER');
            $result = $this->db->get();
        }
        return $result->result_array();
    }

    public function enroll($question_title, $question_discription, $question_tag, $question_catagory, $question_date, $asker_iser_id) {

        if (!isset($question_title) || !isset($question_discription) || !isset($question_tag) || !isset($question_catagory) || !isset($question_date) || !isset($asker_iser_id)) {
            // no student ID or module code given


            return false;
        }
        // we should do some error checking here to check the module and
        // the student exist, and that the student hasn't previously enrolled

        $decodeTitle = urldecode(urldecode($question_title));
        $decodeDiscription = urldecode(urldecode($question_discription));
        // add student to module
        $this->db->insert('question', array('question_title' => $decodeTitle, 'question_description' => $decodeDiscription, 'tag' => $question_tag, 'question_catagory' => $question_catagory, 'date' => $question_date, 'asker_user_id' => $asker_iser_id, 'edit_question_user_id' => '', 'voted_user_id' => '', 'vote' => '0', 'number_of_answers' => '0', 'question_avalability' => '0', 'close_user_id' => '0', 'close_reason' => '', 'number_of_views' => '0', 'edit_date' => '0'));

// return the results as an array - in which each selected row appears as an array
        return $this->db->insert_id();
    }

    public function tabsearch($args) {
        if (isset($args['new'])) {


            $oderBy = 'date';
            $orderType = 'desc';
        } else if (isset($args['popular'])) {

            $oderBy = 'number_of_answers';
            $orderType = 'desc';
        } else if (isset($args['old'])) {
            $oderBy = 'date ';
            $orderType = 'asc';
        }
        if (isset($args['catagary']))
            $catagary = $args['catagary'];

        if (!isset($args['tag']) && !isset($args['title']) && $args['catagary'] === '0') {

            $this->db->distinct();
            $this->db->select('users.user_name,question.question_id,question.number_of_views,question.question_title,question.vote,question.date,question.asker_user_id,question.number_of_answers');
            $this->db->from('question');
            $this->db->join('tag', 'question.question_id = tag.question_id', 'INNER');
            $this->db->join('users', 'question.asker_user_id = users.user_id', 'INNER');


            $this->db->order_by($oderBy, $orderType);
            $query = $this->db->get();
            $rows_array = $query->result_array();
        } else if (!isset($args['tag']) && isset($args['title']) && $args['catagary'] === '0') {
            $decodeTitle = rawurldecode($args['title']);

            $this->db->distinct();
            $this->db->select('users.user_name,question.question_id,question.number_of_views,question.question_title,question.vote,question.date,question.asker_user_id,question.number_of_answers');
            $this->db->from('question');
            $this->db->join('tag', 'question.question_id = tag.question_id', 'INNER');
            $this->db->join('users', 'question.asker_user_id = users.user_id', 'INNER');
            $this->db->like('question.question_title', $decodeTitle);

            $this->db->or_like('tag.tag', $decodeTitle);

            $this->db->order_by($oderBy, $orderType);
            $query = $this->db->get();
            $rows_array = $query->result_array();
        } else if (!isset($args['tag']) && !isset($args['title'])) {
            $sql = "SELECT DISTINCT question.question_id,question.number_of_views,question.question_title,question.vote,question.date,question.asker_user_id,question.number_of_answers
        FROM question
        INNER JOIN tag ON question.question_id = tag.question_id
        AND question.question_catagory=" . $catagary .
                    " ORDER BY" . $oderBy;

            $this->db->distinct();
            $this->db->select('users.user_name,question.question_id,question.number_of_views,question.question_title,question.vote,question.date,question.asker_user_id,question.number_of_answers');
            $this->db->from('question');
            $this->db->join('tag', 'question.question_id = tag.question_id', 'INNER');
            $this->db->join('users', 'question.asker_user_id = users.user_id', 'INNER');
            $this->db->where('question.question_catagory', $catagary);
            $this->db->order_by($oderBy, $orderType);
            $query = $this->db->get();
            $rows_array = $query->result_array();
        } else if (!isset($args['tag']) && isset($args['title'])) {
            $decodeTitle = rawurldecode($args['title']);

            $this->db->distinct();
            $this->db->select('users.user_name,question.question_id,question.number_of_views,question.question_title,question.vote,question.date,question.asker_user_id,question.number_of_answers');
            $this->db->from('question');
            $this->db->join('tag', 'question.question_id = tag.question_id', 'INNER');
            $this->db->join('users', 'question.asker_user_id = users.user_id', 'INNER');

            $this->db->where('question.question_catagory', $catagary);
            $this->db->like('question.question_title', $decodeTitle);
            $this->db->order_by($oderBy, $orderType);
            $query = $this->db->get();
            $rows_array = $query->result_array();

//            $this->db
//                    ->distinct()
//                    ->select('question.question_id,question.question_title,question.asker_user_id,question.number_of_answers', FALSE)
//                    ->from('question')
//                    ->where('question.question_catagory', $catagary)
//                    ->like('question.question_title', $decodeTitle)
//                    ->join('tag', 'question.question_id = tag.question_id')
//                    ->order_by($oderBy, $orderType);
            // $query = $this->db->get();
//            $title = "%" . $decodeTitle . "%";
//            $sql = "SELECT DISTINCT question.question_id,question.question_title,question.asker_user_id,question.number_of_answers
//        FROM question
//        INNER JOIN tag ON question.question_id = tag.question_id
//        AND question.question_catagory=" . $catagary . " AND question.question_title LIKE'" . $title . "' 
//        ORDER BY" . $oderBy;
//            ;
        } else if (isset($args['tag']) && !isset($args['title'])) {



            $array = explode(',', $args['tag']);
            $ids = '\'' . implode('\',\'', $array) . '\'';
//            $sql = "SELECT DISTINCT question.question_id,question.question_title,question.asker_user_id,question.number_of_answers
//        FROM question
//        INNER JOIN tag ON question.question_id = tag.question_id
//        AND question.question_catagory=" . $catagary . " 
//        WHERE  tag.tag IN (" . $ids . ")  
//         ORDER BY" . $oderBy;
            $this->db->distinct();
            $this->db->select('users.user_name,question.question_id,question.number_of_views,question.question_title,question.vote,question.date,question.asker_user_id,question.number_of_answers');
            $this->db->from('question');
            $this->db->join('tag', 'question.question_id = tag.question_id', 'INNER');
            $this->db->join('users', 'question.asker_user_id = users.user_id', 'INNER');

            $this->db->where('question.question_catagory', $catagary);
            $this->db->where_in('tag.tag', $array);

            $this->db->order_by($oderBy, $orderType);
            $query = $this->db->get();
            $rows_array = $query->result_array();
        } else {
            $decodeTitle = rawurldecode($args['title']);


            $array = explode(',', $args['tag']);

            $this->db->distinct();
            $this->db->select('users.user_name,question.question_id,question.number_of_views,question.question_title,question.vote,question.asker_user_id,question.number_of_answers');
            $this->db->from('question');
            $this->db->join('tag', 'question.question_id = tag.question_id', 'INNER');
            $this->db->join('users', 'question.asker_user_id = users.user_id', 'INNER');

            $this->db->where('question.question_catagory', $catagary);
            $this->db->where_in('tag.tag', $array);
            $this->db->where('question.question_catagory', $catagary);
            $this->db->like('question.question_title', $decodeTitle);

            $this->db->order_by($oderBy, $orderType);
            $query = $this->db->get();
            $rows_array = $query->result_array();
        }


        return $rows_array;
        //return $this->db->query($sql)->result();
    }

    public function updateQuestion($question_id, $question_title, $question_discription, $question_tag, $question_catagory, $question_date) {

        if (!isset($question_title) || !isset($question_discription) || !isset($question_tag) || !isset($question_catagory) || !isset($question_date)) {
            // no student ID or module code given


            return false;
        }
        // we should do some error checking here to check the module and
        // the student exist, and that the student hasn't previously enrolled

        $decodeTitle = urldecode(urldecode($question_title));
        $decodeDiscription = urldecode(urldecode($question_discription));
        // add student to module        $decodeTitle = urldecode(urldecode($question_title));
        $this->db->where('question_id', $question_id);
        $this->db->set('question_title', $decodeTitle);

        $this->db->set('question_description', $decodeDiscription);
        $this->db->set('tag', $question_tag);
        $this->db->set('question_catagory', $question_catagory);
        $this->db->set('edit_date', $question_date);

        $this->db->update('question');

// return the results as an array - in which each selected row appears as an array
        return true;
    }

    public function search($args) {
        $decodeTitle = rawurldecode($args['title']);
        if (isset($args['new'])) {


            $oderBy = 'date';
            $orderType = 'desc';
        } else if (isset($args['popular'])) {

            $oderBy = 'number_of_answers';
            $orderType = 'desc';
        } else if (isset($args['old'])) {
            $oderBy = 'date ';
            $orderType = 'asc';
        }

        $this->db->distinct();
        $this->db->select('question.question_id,question.question_title,question.number_of_views,question.asker_user_id,question.number_of_answers');
        $this->db->from('question');
        $this->db->join('tag', 'question.question_id = tag.question_id', 'INNER');
        $this->db->like('question.question_title', $decodeTitle);
        $this->db->or_like('tag.tag', $decodeTitle);

        $this->db->order_by($oderBy, $orderType);
        $query = $this->db->get();
        $rows_array = $query->result_array();
        return $rows_array;
    }

    public function updateNumberOfAnswers($question_id) {
        $this->db->select("number_of_answers");
        // $where = "question_id='34'";
        $this->db->where('question_id', $question_id);

        $result = $this->db->get('question');
        //  var_dump($result);
        return $result;
        // $resultJson= json_encode($result);
    }

    public function updateViewsOfQuestion($question_id) {

        // $where = "question_id='34'";
        $this->db->where('question_id', $question_id);


        $this->db->set('number_of_views', '`number_of_views`+1', FALSE);
        $this->db->update('question');
        return true;
        // $resultJson= json_encode($result);
    }

    public function closeQuestion($question_id, $reson, $user_id) {

        $this->db->where('question_id', $question_id);
        $this->db->set('question_avalability', '1');
        $this->db->set('close_reason', $reson);
        $this->db->set('close_user_id', $user_id);
        $this->db->update('question');

        return true;
        // $resultJson= json_encode($result);
    }

    public function flagQuestion($question_id, $user_id) {
        $res = $this->db->get_where('flag_questions', array('question_id' => $question_id, 'user_id' => $user_id));
        if ($res->num_rows() == 1) {


            return false;
            ;
        } else {

            $this->db->insert('flag_questions', array('question_id' => $question_id, 'user_id' => $user_id));

            $this->db->where('question_id', $question_id);
            $this->db->set('flag_count', '`flag_count`+1', FALSE);
            $this->db->update('question');
            return true;
        }





        // $resultJson= json_encode($result);
    }

    public function getFlagQuestion() {

        $this->db->where('flag_count >', '4');
        $this->db->from('question');

        $query = $this->db->get();
        $rows_array = $query->result_array();
        return $rows_array;
    }

    public function deleteUserWithQuestion($user_id) {

        $this->db->where('asker_user_id', $user_id);

        $res = $this->db->get('question');
        $res->row_array();
        foreach ($res->result_array() as $row) {
            $this->db->where('question_id', $row['question_id']);
            $this->db->delete('answer');
        }
        return $this->db->query("
    DELETE question, tag
    FROM question JOIN tag
    ON question.question_id = tag.question_id
    WHERE question.asker_user_id = '" . $user_id . "'");
    }

    public function deleteQuestion($quesion_id) {




        return $this->db->query("
    DELETE question, tag
    FROM question JOIN tag
    ON question.question_id = tag.question_id
    WHERE question.question_id = '" . $quesion_id . "'");
    }

}

?>
