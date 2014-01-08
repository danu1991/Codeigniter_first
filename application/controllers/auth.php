<?php

class Auth extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('authlib');
        $this->load->helper('url');
        $this->load->library('email');
        $this->load->model('user');
    }

    public function index() {
        redirect('/auth/login'); // url helper function
    }

    public function login() {


        $loggedin = $this->authlib->is_loggedin();
        echo $loggedin;
        if ($loggedin == false) {
            
          
            $data['header'] = '/includes/header_login';
            $data['main_content'] = 'login_view';

            $this->load->view('includes/template', $data);
        } else {
            redirect('');
        }
    }

    public function verifyAccout() {
        $data['main_content'] = 'email_view';
        $data['header'] = '/includes/header_login';

        $this->load->view('includes/template', $data);
    }

    public function verify() {
        $this-> sendMail();
//        $emailId = $this->input->post('email');
//        $user = $this->user->check_email($emailId);
//        if ($user == false) {
//
//
//            echo "not sendd ";
//        } else {
//           sendMail($emailId);
//        }
    }

    function sendMail() {
       $this->email->from('danushkaj91@gmail.com', 'Your Name');
$this->email->to('danushkaj91@gmail.com'); 
 

$this->email->subject('Forgot email');
$this->email->message('Recover');	

$this->email->send();

echo $this->email->print_debugger();
    }

    public function register() {
        $data['errmsg'] = '';
        $data['header'] = '/includes/header_login';
        $data['main_content'] = 'register_view';

        $this->load->view('includes/template', $data);
    }

    public function createaccount() {

        $username = $this->input->post('uname');
        $password = $this->input->post('pword');
        $conf_password = $this->input->post('conf_pword');
        $gender = $this->input->post('gender');
        $email_id = $this->input->post('email');
      
        $user_type = $this->input->post('usertype');
        $numGender = (int) $gender;
        $numuser_type = (int) $user_type;
        $errmsg = $this->authlib->register($email_id, $username, $password, $conf_password, $numGender, $numuser_type);
        if (!$errmsg) {


            // echo '<script type="text/javascript">alert("Registation Successfull");</script>';
            // redirect('/auth/auth/login');
            echo '<script type="text/javascript">alert("Registation Successfull");';

            echo "window.location.href= '/Codeigniter_first/index.php/auth/' ; ";
            echo '</script>';

            //need to pass session id from herew
            ////metana tama alter eka enna ona
        //
        } else if ($errmsg == '1') {
            echo '<script type="text/javascript">alert("Registation Successfull. Tutor request pending.. Your have to wait untill it will confirm ");';

            echo "window.location.href= '/Codeigniter_first/index.php' ; ";
            echo '</script>';
        } else {
            $data['errmsg'] = $errmsg;

            $data['header'] = '/includes/header_login';
            $data['main_content'] = 'register_view';

            $this->load->view('includes/template', $data);

//            echo "<script type='text/javascrip'> 
//                window.alert('Succesfully Updated');
//    </SCRIPT>" ;
        }
        //
        // window.location.href='/auth/auth/login';
        //oka liyanda error ekata
        //echo ("<SCRIPT LANGUAGE='JavaScript'>
    }

    public function authenticate() {
        
       //   $this->session->sess_destroy();
        $user_name = $this->input->post('uname');
        $password = $this->input->post('pword');

        $user = $this->authlib->login($user_name, $password);

        if ($user != false) {
            if ($user == 'pending') {

                echo '<script type="text/javascript">alert("Still not confirm your Tutor request.Please try in several hours ");';

                echo "window.location.href= '/Codeigniter_first/index.php' ; ";
                echo '</script>';
            } else {
	            //echo $user['user_name'];
	            $user_type = $user['user_type'];
                if ($user_type == '3') {
                    redirect('/adminHome/load');
                } else {
                    //echo $user['user_name'];
                    redirect('/welcome/loggin');
                }
            }
        } else if ($user == false) {
            var_dump($user);
            $data['errmsg'] = 'Unable to login - please try again';
            echo '<script type="text/javascript">alert("Unable to login - please try again");</script>';
            $data['header'] = '/includes/header_login';
            $data['main_content'] = 'login_view';

            $this->load->view('includes/template', $data);
        }
    }
}

?>