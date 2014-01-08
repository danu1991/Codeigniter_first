<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Welcome extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('authlib');
        $this->load->helper('url');
        $this->load->model('user');
    }

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -  
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in 
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
    public function index() {
        $this->loggin();
       
    }

//                
//    $this->load->library('authlib');
//    $loggedin = $this->authlib->is_loggedin();
// 
//    if ($loggedin === false) {
//        $this->load->helper('url');
//        redirect('/auth/login');
// 
//    }
//            $this->load->view('homepage',array('name' => $loggedin));
//   
//                
//              //  $this->load->view('dictview');

    public function login() {
        $loggedin = $this->authlib->is_loggedin();
        echo $loggedin;
//   if ($loggedin === false) {
//        $this->load->helper('url');
//        redirect('/auth/login');
// 
//    }
        array('user_name' => $loggedin);
        $user1['user_name'] = $loggedin;

        $data["user_name"] = $user1['user_name'];
        $this->load->view('home_view', $data);

        $this->load->model('question');
        // $this->loggin();
    }

    public function loggin() {

        $loggedin = $this->user->is_loggedin();

       

      
        if ($loggedin != false) {
            $userType = $this->user->getUserType($loggedin);
            if ($userType != '3') {
                $data['user_name'] = $loggedin;
                $data['login'] = 'logout';

                $this->load->view('home_view', $data);
            } else {
                 redirect('/adminHome/load');
            }
        } else if ($loggedin == false) {

            $data['user_name'] = $loggedin;
            $data['login'] = 'login';
            $this->load->view('home_view', $data);
        }
    }

    public function auth() {

        $loggedin = $this->authlib->is_loggedin();




        if (strlen($loggedin) > 0) {

            $this->logout();
        } else if ($loggedin == false) {
            redirect('/auth/login');
        }
    }

    public function check_logging() {

        $loggedin = $this->authlib->is_loggedin();
        if ($loggedin == false) {
            echo 'false';
            redirect('/auth/login');
            $data['user_name'] = '';
            $data['login'] = 'login';
            $this->load->view('home_view', $data);
            echo'$user nooo user';
        } else {
            echo 'trueee';
            //     redirect('/question/loadView');

            $this->question->loadView();
//            $data['user_name'] = $loggedin;
//            $data['login'] = 'logout';
//            $this->load->view('ask_question_view', $data);
        }

        echo $loggedin;

//      if($loggedin==false){
//          
//      }else{
//         
//          }
    }

    public function logout() {

        $loggedin = $this->authlib->is_loggedin();
        if ($loggedin == false) {
            redirect('/auth/login');
        } else {


            $this->session->sess_destroy();
            redirect('');
//            $this->load->helper('url');
//            $data['login'] = 'login';
//            $data['user_name'] = '';
//            $this->load->view('home_view', $data);
        }
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */