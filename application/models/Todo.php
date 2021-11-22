<?php

class Application_Model_Todo
{
    public function __construct() { 
        $db = Zend_Registry::get('db');
        $db->getConnection();
        Zend_Db_Table::setDefaultAdapter($db);
    }

    public function getAllTodo() : Array{
        $db = Zend_Db_Table::getDefaultAdapter();
        $sql = $db->select()->from("todo");

        $rows = $db->fetchAll($sql);
        
        return $rows;
    }

    public function addTodo(String $todo){
        $db = Zend_Db_Table::getDefaultAdapter();
        $db->insert("todo", [
            "todo" => $todo,
            "is_check" => 0
        ]);

    }

    public function supTodo($id){
        $db = Zend_Db_Table::getDefaultAdapter();
        $db->delete("todo","id_todo = {$id} ",);
    }
}

