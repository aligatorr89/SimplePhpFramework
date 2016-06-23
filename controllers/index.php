<?php

class Index extends Controller{

    function __construct() {
        parent::__construct();
        Auth::logged();
        
    }

    public function index() {
        $this->view->render('header');
        $this->view->render('index/index');
        $this->view->render('footer');
    }
    
    public function blah() {
        echo 'tryy';
    }

}
