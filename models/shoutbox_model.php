<?php

class Shoutbox_Model extends Model {

    function __construct() {
        parent::__construct();
    }

    public function addShout() {
        $form = new Form();
        $email = Session::get('user');
        $shout = $form->post('shout')->submit_text(FILTER_SANITIZE_SPECIAL_CHARS);
        $what = array('email' => $email, 'shout' => $shout);
        $this->db->insert(DB_SHOUT_TABLE, $what);
        echo json_encode($what);
    }

    public function loadShouts() {
        $loadShouts = $this->db->select(DB_SHOUT_TABLE, array('email' => null, 'shout' => null, 'shoutid' => null))->
                fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($loadShouts);
    }

    public function deleteShout() {
        //$form = new Form();
        //$what = $form->post('shoutid')->submit();
        $where = array('shoutid' => $_POST['shoutid']);
        $this->db->delete(DB_SHOUT_TABLE, $where);
    }

}
