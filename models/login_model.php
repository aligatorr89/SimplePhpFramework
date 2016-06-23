<?php

class Login_Model extends Model {

    function __construct() {
        parent:: __construct();
    }

    public function run() {
        try {
            $form = new Form();
            $form->post('email')->clean(FILTER_SANITIZE_EMAIL)->val('min_length', 8)->val('max_length', 35);
            $form->post('password')->clean(FILTER_SANITIZE_STRING)->val('onlyAlphaNumeric')->val('min_length', 6)->val('max_length', 20);
            $data = $form->submit();
            $where = $data;
            if ($this->db->login(DB_LOGIN_TABLE, $data, $where)) {
                Session::init();
                Session::set('loggedIn', true);
                Session::set('user', $data['email']);
                header('Location: ../main');
            } else {
                setcookie('error', 'Wrong username or password', time() + 1, "/");
                header('Location: ../login');
            } 
        } catch (Exception $ex) {
            setcookie('exception', $ex->getMessage(), time() + 1, "/");
            header('Location: ../login');
        }
    }

}
