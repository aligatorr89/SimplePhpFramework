<?php

require 'form/val.php';

class Form {

    private $_postData = array();
    private $_currentItem = null;
    private $_error = array();
    private $_val = null;

    function __construct() {
        $this->_val = new Val();
    }

    public function post($field) {
        $this->_postData[$field] = $_POST[$field];
        $this->_currentItem = $field;
        return $this;
    }

    /**
     * 
     * @param int $filter
     * @return Form object
     */
    public function clean($filter) {
        $cleaned = filter_var($this->_postData[$this->_currentItem], $filter);
        if ($cleaned != $this->_postData[$this->_currentItem]) {
            $this->_error[$this->_currentItem . ' field'] = ' has unallowed characters';
        }
        if ($cleaned == null) {
            $this->_error[$this->_currentItem . ' field'] = ' has unallowed characters';
        }
        return $this;
    }

    public function val($validateFunc, $arg = null) {
        if ($arg == null) {
            $error = $this->_val->{$validateFunc}($this->_postData[$this->_currentItem]);
        } else {
            $error = $this->_val->{$validateFunc}($this->_postData[$this->_currentItem], $arg);
        }
        if ($error) {
            $this->_error[$this->_currentItem] = $error;
        }
        return $this;
    }

    public function submit() {
        if (empty($this->_error)) {
            return $this->_postData;
        } else {
            $error = '';
            foreach ($this->_error as $key => $value) {
                $error .= $key . $value . "\n";
            }
            throw new Exception($error);
        }
    }
    
    public function submit_text() {
        $text = filter_var($this->_postData[$this->_currentItem], FILTER_SANITIZE_SPECIAL_CHARS);
        return $text;
    }

}
