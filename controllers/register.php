<?php

class Register extends Controller {

    function __construct() {
        parent:: __construct();
        Auth::logged();
    }

    public function index() {
        $this->view->render('header');
        $this->view->render('register/index');
        $this->view->render('footer');
    }

    function run() {
        $this->model->run();
    }
}
