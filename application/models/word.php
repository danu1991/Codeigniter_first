<?php

class word extends CI_Model {
    private $wordlist;
    function __construct()
    {
        parent::__construct();
        $this->wordlist = array('apple','applet','appropriate','applicable','aplenty');
    }
    public function match($partword)
    {
        $matching_words = array();
        foreach ($this->wordlist as $w) {
            if (preg_match("/$partword/",$w)) {
                $matching_words[] = $w;
            }
        }
        return $matching_words;
    }
}

?>
