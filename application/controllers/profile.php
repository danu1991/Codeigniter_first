<?php


/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of question
 *
 * @author ENVY i7
 */
class Profile extends CI_Controller {

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
                $data['user_name'] = "";
           
            $data['login'] = 'login';
        } else {
             $data['user_name'] = $loggedin;
            
            $data['login'] = 'logout';
            
        }
        $userType = $this->user->getUserType($loggedin);
        if($userType!='3'){
        $data['header'] = '/includes/header';
        }else{
              $data['header'] = '/includes/admin_header';
        }
        $data['main_content'] = 'profile_view';
        $this->load->view('includes/template', $data);
    }

}

?>
