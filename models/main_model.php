<?php

class Main_Model extends Model {

    function __construct() {
        parent::__construct();
    }

    public function loadNotes() {
        $what = array('date' => null, 'note' => null, 'noteid' => null);
        $where = array('user' => $_SESSION['user']);
        $notes = $this->db->select(DB_NOTES_TABLE, $what, $where)->fetchAll(PDO::FETCH_ASSOC);
        return $notes;
    }

    public function addNote() {
        $form = new Form();
        $note = $form->post('note')->submit_text();
        $what = array('date' => date('Y-d-m H:i:s'), 'note' => $note, 'user' => $_SESSION['user']);
        if ($this->db->insert(DB_NOTES_TABLE, $what)){
            //echo json_encode($what);
        }
        //header('Location: ../notepad');
    }
    
    public function deleteNote($noteId) {
        $where = array('noteid' => $noteId);
        $this->db->delete(DB_NOTES_TABLE, $where);
        header('Location: ../notepad');
    }
    
}
