<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of answer
 *
 * @author ENVY i7
 */
class Answer extends CI_Controller {

    function __construct() {
        parent::__construct();
        //  $this->load->model('question');
        $this->load->library('authlib');
         
    }     

    public function index() {
        //redirect('/auth/login'); // url helper function
    }
    
     public function editAnswer() {
        $loggedin = $this->authlib->is_loggedin();
        if ($loggedin == false) {
            redirect('/auth/login');
        } else {
             $data['user_name'] = $loggedin;
             echo $loggedin;
            $data['login'] = 'logout';
            $data['header'] = '/includes/header';
            $data['main_content'] = 'edit_answer_view';
            $this->load->view('includes/template', $data);
        }
    }
    
    
}

?>
