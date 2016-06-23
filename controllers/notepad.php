<?php

class Notepad extends Controller {
    
    function __construct() {
        parent::__construct();
        Auth::notLogged();
    }
    
    public function index() {
        $this->view->render('header');
        $this->view->render('notepad/index');
        $this->view->render('footer');
    }
    
    public function loadNotes() {
        $this->model->loadNotes();
    }
    
    public function addNote() {
        $this->model->addNote();
    }
    
    public function deleteNote() {
        $this->model->deleteNote();
    }
    
    

}