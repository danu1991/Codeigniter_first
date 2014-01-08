<?php

class User extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function register($email, $username, $pwd, $gender, $user_type) {
        // is username unique?
        $res = $this->db->get_where('users', array('email_id' => $email));
        if ($res->num_rows() > 0) {
            return 'email already exists';
        }
        $res1 = $this->db->get_where('users', array('user_name' => $username));
        if ($res1->num_rows() > 0) {
            return 'Username already exists';
        }

        // username is unique
        $hashpwd = sha1($pwd);
        $data = array('email_id' => $email, 'user_name' => $username,
            'password' => $hashpwd, 'sex' => $gender, 'sex' => $gender, 'user_type' => $user_type, 'loyality' => '0', 'reputation' => '0');
        $this->db->insert('users', $data);
        if ($user_type == '0') {
            return '1';
        } else {
            return;
        }
        // no error message because all is ok
    }

    function login($username, $pwd) {

        $this->db->where(array('user_name' => $username, 'password' => sha1($pwd)));
        $res = $this->db->get('users', array('user_name', 'user_type'));


        $row = $res->row_array();
        if ($res->num_rows() != 1) {
            return false;
        } else {

            if ($row['user_type'] == '0') {
                return $res = 'pending';
            } else {


                // remember login
                $session_id = $this->session->userdata('session_id');

                // remember current login

                $this->db->insert('logins', array('user_name' => $row['user_name'], 'session_id' => $session_id));

                return $res->row_array();
            }
        }
    }

    function check_email($email) {
        $this->db->where(array('email_id' => $email));

        $res = $this->db->get('users', array('email_id'));

        if ($res->num_rows() > 0) { // should be only ONE matching row!!
            return true;
        } else {
            return false;
        }
    }

    function is_loggedin() {
        $session_id = $this->session->userdata('session_id');

        $res = $this->db->get_where('logins', array('session_id' => $session_id));
        if ($res->num_rows() == 1) {
            $row = $res->row_array();
            return $row['user_name'];
        } else {
            return false;
        }
    }

    function checkSessionInViewQuestion($question_id) {
        $session_id = $this->session->userdata('session_id');

        $res = $this->db->get_where('question_views', array('session' => $session_id,'question_id' => $question_id));
        if ($res->num_rows() == 1) {
            
            return false;
        } else {
         $this->db->insert('question_views', array('session' => $session_id, 'question_id' => $question_id));

            return true;
        }
    }
    public function getVotes($user_id) {
        $res = $this->db->get_where('users', array('user_id' => $user_id));
        if ($res->num_rows() == 1) {
            $row = $res->row_array();

            return $row[votes];
        } else {
            return false;
        }
    }

    public function changePassword($username, $oldpassword, $newpassword) {

        // $session_id = $this->session->userdata('session_id');
        $res = $this->db->get_where('users', array('username' => $username));
        if ($res->num_rows() == 1) {
            $row = $res->row_array();

            if ($row ['password'] == sha1($oldpassword)) {

                $row['password'] == sha1($newpassword);
                $this->db->update('users', $row);
                return true;
            }


            // return $row['name'];
        } else {
            return false;
        }

        return false;
    }

    public function getUserId($userName) {
        $res = $this->db->get_where('users', array('user_name' => $userName));
        if ($res->num_rows() == 1) {
            $row = $res->row_array();

            return $row['user_id'];
        } else {
            return false;
        }
    }
    
    public function getUserName($userId) {
        $res = $this->db->get_where('users', array('user_id' => $userId));
        if ($res->num_rows() == 1) {
            $row = $res->row_array();

            return $row['user_name'];
        } else {
            return false;
        }
    }
public function getUserLoyality($userId) {
        $res = $this->db->get_where('users', array('user_id' => $userId));
        if ($res->num_rows() == 1) {
            $row = $res->row_array();

            return $row['loyality'];
        } else {
            return false;
        }
    }

    public function getUserType($userName) {
        $res = $this->db->get_where('users', array('user_name' => $userName));
        if ($res->num_rows() == 1) {
            $row = $res->row_array();

            return $row['user_type'];
        } else {
            return false;
        }
    }

    public function get($args) {
        // use array keys as column names for db lookup
        $where = array();
        $valid_column_names = array('user_id', 'user_name');
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
        $result = $this->db->get('users');
        // return the results as an array - in which each selected row appears as an array
        return $result->result_array();
    }

    public function updateLoyalityVotes($user_id, $votes) {


        $this->db->where('user_id', $user_id);
        if ($votes == 'yes') {
            $this->db->set('loyality', '`loyality`+1', FALSE);
        } else {
            $this->db->set('loyality', '`loyality`-1', FALSE);
        }


        $this->db->update('users');
        return true;
    }
 public function updateLoyalityVotesOnflagQuestions($user_id) {


        $this->db->where('user_id', $user_id);
    
            $this->db->set('loyality', '`loyality`-1', FALSE);
        


        $this->db->update('users');
        return true;
    }
    public function updaterReputationVotes($user_id, $votes) {


        $this->db->where('user_id', $user_id);
        if ($votes == 'yes') {
            $this->db->set('reputation', '`reputation`+1', FALSE);
        } else {
            $this->db->set('reputation', '`reputation`-1', FALSE);
        }


        $this->db->update('users');
        return true;
    }

    public function enroll($args) {
        if (!isset($args['id']) || !isset($args['user_name'])) {
            // no student ID or module code given
            return false;
        }
        // we should do some error checking here to check the module and
        // the student exist, and that the student hasn't previously enrolled
        // add student to module
        $this->db->insert('enrollments', array('module_code' => $args['module'], 'id' => $args['id']));
        // return the results as an array - in which each selected row appears as an array
        return true;
    }

    public function editUser($user_id, $currnt_user_name, $edit_user_name, $current_password, $new_password) {

        if (strlen($current_password) > 0 && strlen($new_password) > 0) {
            $this->db->where(array('user_id' => $user_id, 'password' => sha1($current_password)));
            $res = $this->db->get('users', array('user_name'));

            if ($res->num_rows() != 1) { // should be only ONE matching row!!
                return false;
            } else {
                $this->db->where('user_id', $user_id);
                $this->db->set('password', sha1($new_password));

                $this->db->set('user_name', $edit_user_name);


                $this->db->update('users');

                $this->db->where('user_name', $currnt_user_name);
                $this->db->set('user_name', $edit_user_name);
                $this->db->update('logins');
                return $edit_user_name;
            }
        } else {

            $this->db->where('user_id', $user_id);
            $this->db->set('user_name', $edit_user_name);
            $this->db->update('users');

            $this->db->where('user_name', $currnt_user_name);
            $this->db->set('user_name', $edit_user_name);
            $this->db->update('logins');

            return $edit_user_name;
        }
    }

    public function getPendingTutorRequests() {
        $res = $this->db->get_where('users', array('user_type' => '0'));
        $res->row_array();

        return $res->result_array;
    }

    public function tutorPremitions($user_id, $type) {


        $this->db->where('user_id', $user_id);
        if ($type == '2') {
            $this->db->set('user_type', '2');
            $this->db->update('users');
        } else {
          //  $this->db->set('user_type', '-1');
              $this->db->delete('users');
        }


        
        return true;
    }

    public function deleteUser($user_id) {
        $this->db->where('user_id', $user_id);
        $this->db->delete('users');


        return true;
    }

    public function searchUser($user_name) {
        
        $decodeName = urldecode(urldecode($user_name));
        $this->db->distinct();
        $this->db->select('user_id,user_name,loyality,reputation,user_type,email_id');
         $this->db->from('users');
        $this->db->like('user_name', $decodeName);

        $query = $this->db->get();
        $rows_array = $query->result_array();
        return $rows_array;
    }
}?>
