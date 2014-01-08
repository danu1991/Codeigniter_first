<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of rest
 *
 * @author ENVY i7
 */
class Home extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model('user');
        
    }
 
    
    
}
?>
