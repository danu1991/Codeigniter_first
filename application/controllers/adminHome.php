<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of adminHome
 *
 * @author ENVY i7
 */
class AdminHome extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('authlib');
        $this->load->helper('url');
        $this->load->model('user');
    }

    public function index() {
        $this->load();
        
    }

    public function load() {
        $loggedin = $this->authlib->is_loggedin();
        if ($loggedin == false) {
            redirect('/auth/login');
        } else {
            $userType = $this->user->getUserType($loggedin);

            if ($userType == '3') {

                $data['user_name'] = $loggedin;
                $data['login'] = 'logout';
             
                

                $this->load->view('admin_view', $data);
            } else {
                redirect('/auth/login');
            }
        }
    }

    public function requests() {

        $loggedin = $this->authlib->is_loggedin();
        if ($loggedin == false) {
            redirect('/auth/login');
        } else {
            $userType = $this->user->getUserType($loggedin);

            if ($userType == '3') {

                $data['user_name'] = $loggedin;
                $data['login'] = 'logout';
                $data['header'] = '/includes/admin_header';
                $data['main_content'] = 'tutor_request_view';

                $this->load->view('includes/template', $data);
            } else {
                redirect('/auth/login');
            }
        }
    }
public function flagQuestion() {

        $loggedin = $this->authlib->is_loggedin();
        if ($loggedin == false) {
            redirect('/auth/login');
        } else {
            $userType = $this->user->getUserType($loggedin);

            if ($userType == '3') {

                $data['user_name'] = $loggedin;
                $data['login'] = 'logout';
                $data['header'] = '/includes/admin_header';
                $data['main_content'] = 'flag_question_view';

                $this->load->view('includes/template', $data);
            } else {
                redirect('/auth/login');
            }
        }
    }

   

    public function auth() {



        $loggedin = $this->authlib->is_loggedin();

        $userType = $this->user->getUserType($loggedin);
        //var_dump($userType);
        if ($loggedin != false && $userType == '3') {
            $this->session->sess_destroy();
            redirect('/auth/login');
        } else {
            redirect('/auth/login');
        }
    }

}

?>
