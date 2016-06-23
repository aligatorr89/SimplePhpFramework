<?php

class Shoutbox extends Controller{

    function __construct() {
        parent::__construct();
        Auth::notLogged();
    }
    
    public function index() {
        $this->view->render('header');
        $this->view->render('shoutbox/index');
        $this->view->render('footer');
        
        
    }
    
    public function shout() {
        $this->model->shout();
    }
    
    public function loadShouts() {
        $this->model->loadShouts();
    }
    
    public function addShout() {
        $this->model->addShout();
    }
    
    public function deleteShout() {
        $this->model->deleteShout();
    }

}