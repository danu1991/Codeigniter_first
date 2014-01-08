<?php

class Module extends CI_Model {
 
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
 
    public function enroll($args)
    {
        if (!isset($args['id']) || !isset($args['module'])) {
            // no student ID or module code given
            return false;
        }
        // we should do some error checking here to check the module and
        // the student exist, and that the student hasn't previously enrolled
         
        // add student to module
        $this->db->insert('enrollments',array('module_code' => $args['module'],'id' => $args['id']));
        // return the results as an array - in which each selected row appears as an array
        return true;
    }
}    
        
?>
