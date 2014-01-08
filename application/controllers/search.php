<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of search
 *
 * @author ENVY i7
 */
class Search extends CI_Controller {

    function __construct() {
        parent::__construct();
        //  $this->load->model('question');
        $this->load->library('authlib');
         
    }     

    public function index() {
        //redirect('/auth/login'); // url helper function
    }

    public function searchbar() {
        $loggedin = $this->authlib->is_loggedin();
        if ($loggedin == false) {
                $data['user_name'] = "";
             echo $loggedin;
            $data['login'] = 'login';
        } else {
             $data['user_name'] = $loggedin;
             echo $loggedin;
            $data['login'] = 'logout';
            
        }
        
      //  $data['header'] = '/incl echo 'gsrgrshsf';
        $this->load->view('home_view', $data);
    }

}
?>
