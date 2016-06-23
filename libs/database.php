<?php

class Database extends PDO {

    function __construct($type, $user, $host, $database, $password) {
        try {
            parent:: __construct(
                    DB_TYPE . ':host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD);
            //$conn = new PDO(DB_TYPE . ':host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD);
            //array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
            parent:: setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $ex) {
            echo 'Connection failed: ' . $ex->getMessage();
        }
    }

    public function insert($table, $data) {
        $fieldNames = implode(',', array_keys($data));
        $fieldValues = ':' . implode(', :', array_keys($data));
        $sql = $this->prepare("INSERT INTO $table ($fieldNames) VALUES ($fieldValues)");
        //$sql->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        foreach ($data as $key => $value) {
            $sql->bindValue(":$key", $value);
        }
        return $sql->execute();
    }

    public function select($table, $data, $where = array()) {
        $fieldNames = implode(', ', array_keys($data));
        $whereName = array_keys($where);
        $length = count($whereName);
        switch ($length) {
            case 0:
                $sql = $this->prepare("SELECT $fieldNames FROM $table WHERE 1");
                break;
            case 1:
                $sql = $this->prepare("SELECT $fieldNames FROM $table WHERE $whereName[0] = :$whereName[0]");
                break;
            case 2:
                $sql = $this->prepare("SELECT $fieldNames FROM $table WHERE $whereName[0] = :$whereName[0] "
                        . "AND $whereName[1] = :$whereName[1]");
                break;
        }
        foreach ($where as $key => $value) {
            $sql->bindValue("$key", $value);
        }
        $sql->execute(); //da enko tudi ce nc ne dobi
        return $sql;
    }

    public function delete($table, $where) {
        $whereName = array_keys($where);
        $count = count($whereName);
        switch ($count) {
            case 0:
                $sql = $this->prepare("DELETE FROM $table WHERE 1");
                break;
            case 1:
                $sql = $this->prepare("DELETE FROM $table WHERE $whereName[0] = :$whereName[0]");
                break;
            case 2:
                $sql = $this->prepare("DELETE FROM $table WHERE $whereName[0]] = :$whereName[0] AND $whereName[1] = :$whereName[1]");
                break;
        }
        foreach ($where as $key => $value) {
            $sql->bindValue("$key", $value);
        }
        $sql->execute();
    }

    public function register($table, $data, $where = array()) {
        $result = $this->select($table, $data, $where);
        if (!$result->rowCount()) {
            return $this->insert($table, $data);
        } else {
            return false;
        }
    }

    public function login($table, $data, $where = array()) {
        return $this->select($table, $data, $where)->rowCount();
    }

}
