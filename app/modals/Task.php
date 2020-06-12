<?php

class Task{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

public function getTasks()
{
    $this->db->query('SELECT * FROM `posts`');
    $results = $this->db->resultSet();
    return $results;
}

    
}

?>