<?php
class dict extends CI_Controller {
    public function index()
    {
        $this->load->view('dictview');
    }
 
    public function lookup()
    {
        
        $typed = $this->input->get('t');
        if ($typed == null || $typed == '') {
            echo 'not ound'; // send back nothing if we got nothing
            
           exit;
        }
        $this->load->model('words');
        $wordlist = $this->words->match($typed);
        $this->load->view('wordview',array('words' => $wordlist));
    }
}

?>
