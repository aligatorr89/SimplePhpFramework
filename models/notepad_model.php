<?php

class Notepad_Model extends Model {

    function __construct() {
        parent::__construct();
    }
    
    public function loadNotes() {
        $what = array('date' => null, 'note' => null, 'noteid' => null);
        $where = array('user' => $_SESSION['user']);
        $notes = $this->db->select(DB_NOTES_TABLE, $what, $where)->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($notes);
    }


    public function addNote() {
        $note = new Form();
        $note = $note->post('note')->submit_text();
        $what = array('user' => $_SESSION['user'], 'note' => $note, 'date' => date('Y-d-m H:i:s '));
        $this->db->insert(DB_NOTES_TABLE, $what);
        echo json_encode($what);
    }
    
    public function deleteNote() {
        $noteid = $_POST['noteid'];
        $where = array('noteid' => $noteid);
        $this->db->delete(DB_NOTES_TABLE, $where);
    }

}