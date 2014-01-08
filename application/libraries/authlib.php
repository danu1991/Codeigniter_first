<?php
class Authlib {
 
    function __construct()
    {
        // get a reference to the CI super-object, so we can
        // access models etc. (because we don't extend a core
        // CI class)
        $this->ci = &get_instance();
 
        $this->ci->load->model('user');
 
    }
 
    public function register($email,$user,$pwd,$conf_pwd,$gender, $user_type)
    { 
        if ($user == '' ) {
            return 'choose a user name';
        }else  if ($pwd == '' ) {
            return "Choose a password";
        }if ($pwd != $conf_pwd) {
            return "Passwords do not match";
        } else if ($email == '' ) {
            return "Choose your email";
        } 
//    else if (!checkdate($mm,$dd,$yyyy)) {
//     return "please enter given birthday format";
//}
        
        return $this->ci->user->register($email,$user,$pwd,$gender, $user_type);
    }

    public function login($user,$pwd)
{
    if ($user == '' || $pwd == '') {
        return false;
    }
    return $this->ci->user->login($user,$pwd);
}
   


public function is_loggedin()
{
    return $this->ci->user->is_loggedin();
}

}
?>