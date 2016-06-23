<?php

class Register_Model extends Model {

    function __construct() {
        parent:: __construct();
    }

    public function run() {
        try {
            $form = new Form();
            $form->post('email')->clean(FILTER_SANITIZE_EMAIL)->clean(FILTER_VALIDATE_EMAIL);
            $form->post('password')->clean(FILTER_SANITIZE_STRING)->val('min_length', 6)
                    ->val('max_length', 20)->val('onlyAlphaNumeric');  
            $data = $form->submit();
            $where = array('email' => $data['email']);
            if ($this->db->register(DB_LOGIN_TABLE, $data, $where)) {
                header('Location: ../login');
                exit;
            } else {
                setcookie('reg_email_error', 'Email already exists', time() + 1, "/");
                header('Location: ../register');
                exit;
            }
        } catch (Exception $ex) {
            setcookie('reg_exception', $ex->getMessage(), time() + 1, "/");
            header('Location: ../register');
        }
    }

}
