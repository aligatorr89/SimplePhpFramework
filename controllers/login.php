<?php

class Login extends Controller {

    function __construct() {
        parent::__construct();
        Auth::logged();
        
    }

    public function index() {
        $this->view->render('header');
        $this->view->render('login/index');
        $this->view->render('footer');
    }

    public function run() {
        $this->model->run();
    }

}
