<?php

class Val {

    function __construct() {
        
    }

    public function min_length($input, $n) {
        if (strlen($input) < $n) {
            return " must be at least $n characters long! ";
        }
        return false;
    }

    public function max_length($input, $n) {
        if (strlen($input) > $n) {
            return " must be less than $n characters long! ";
        }
        return false;
    }

    public function onlyAlphaNumeric($input) {
        if (preg_match("/^[a-zA-Z0-9]*$/", $input) == 0)  {
            return " only alpha-numeric characters allowed!";
        }
        return false;
    }

}
