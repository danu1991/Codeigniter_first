<?php

$titleError = '';
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of question
 *
 * @author ENVY i7
 */
class Question extends CI_Controller {

    function __construct() {
        parent::__construct();
        //  $this->load->model('question');
        $this->load->library('authlib');
    }

    public function index() {
        //redirect('/auth/login'); // url helper function
    }

    public function loadView() {
        $loggedin = $this->authlib->is_loggedin();
        if ($loggedin == false) {
            redirect('/auth/login');
        } else {
            $data['user_name'] = $loggedin;
             $userType = $this->user->getUserType($loggedin);
        if( $userType!='3'){
            $data['login'] = 'logout';
            $data['header'] = '/includes/header';
            $data['main_content'] = 'ask_question_view';
            $this->load->view('includes/template', $data);
                }else{
            
            redirect('adminHome/load');
        }
        }
    }

    public function questionView() {


        $loggedin = $this->authlib->is_loggedin();
//         if($loggedin==false){
//          //   redirect('/auth/login');
//         }else{


        $this->loadQustionDetails();
        // }
    }

    public function loadQustionDetails() {
       

        $loggedin = $this->authlib->is_loggedin();
        
        if ($loggedin == false) {
            $data['user_name'] = '';
            $data['login'] = 'login';
        } else {
            $data['user_name'] = $loggedin;
            $data['login'] = 'logout';
        
        $userType = $this->user->getUserType($loggedin);
        if( $userType=='3'){
        $data['header'] = '/includes/admin_header';
        $data['main_content'] = 'question_view';
        $data['title'] = 'title';
        $data['description'] = 'discription';
        $this->load->view('includes/template', $data);
       }else{
            $data['header'] = '/includes/header';
        $data['main_content'] = 'question_view';
        $data['title'] = 'title';
        $data['description'] = 'discription';
        $this->load->view('includes/template', $data);
        }
        }
    }

    public function askQuestion() {
        $error = array(
            "title" => "",
            "description" => "",
            "tag" => "",
        );
        $title = $this->input->post('title');
        $description = $this->input->post('description');
        $tag = $this->input->post('tag');
        $catagory = $this->input->post('catagory');
        $errmsg = '';

        if (strlen($title) < 10) {
            $errmsg = "Title should be more than 10 latters";
            $titleError = $errmsg;
        } else if (strlen($description) < 20) {
            $error["description"] = "description should be more than 20 latters";
        } else if ($tag == '') {
            $error["tag"] = "choose a tag";
        } else {

            $this->ci->question->askQuestion($title, $description, $tag, $catagory);
        }
    }

    public function edit() {
        $loggedin = $this->authlib->is_loggedin();
        if ($loggedin == false) {
            redirect('/auth/login');
        } else {
            $data['user_name'] = $loggedin;
           
            $data['login'] = 'logout';
            $data['header'] = '/includes/header';
            $data['main_content'] = 'ask_question_view';
            $this->load->view('includes/template', $data);
          
           
        }
    }

    public function close() {
        $loggedin = $this->authlib->is_loggedin();
        if ($loggedin == false) {
            redirect('/auth/login');
        } else {
            $data['user_name'] = $loggedin;
            $data['login'] = 'logout';
            $data['header'] = '/includes/header';
            $data['main_content'] = 'close_question_view';
            $this->load->view('includes/template', $data);
           
           
        }
    }

}

?>
