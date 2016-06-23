<?php

class Main extends Controller {

    private $_sqlData = null;

    function __construct() {
        parent::__construct();
        Auth::notLogged();
    }

    public function index() {
        $this->view->render('header');
        $this->view->render('main/index');
        $this->view->render('footer');
    }
    public function logout() {
        Session::destroy();
        header('Location: ../login');
    }
    
    public function notepad($add = false) {
        $this->_sqlData = $this->model->loadNotes();
        if ($add == 'add') {
            $this->model->addNote();
        } elseif ($add > 0) {
            $this->model->deleteNote($add);
        }
        $this->view->render('header');
        $this->view->render('main/table1');
        $this->view->renderTableData($this->_sqlData);
        $this->view->render('main/table2');
        $this->view->render('footer');
    }

}
