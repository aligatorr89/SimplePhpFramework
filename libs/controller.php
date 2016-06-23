<?php

class Controller {

    function __construct() {
        $this->view = new View();
    }

    public function loadModel($name) {
        $file = 'models/' . $name . '_model.php';
        if (file_exists($file)) {
            require $file;
            $modelName = $name . '_Model';
            $this->model = new $modelName();
        } else {
            return false;
        }
    }

}
