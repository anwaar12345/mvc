<?php

class Task{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

public function getTasksall()
{
    $this->db->query('SELECT * FROM `posts`');
    $results = $this->db->resultSet();
    return $results;
}


public function getUserTasks($user_id)
{
    $this->db->query("SELECT * FROM `posts` where user_id='$user_id'");
    $results = $this->db->resultSet();
    return $results;
}

public function getSingleTask($id)
{
    $this->db->query("SELECT * FROM `posts` where id='$id'");
    $results = $this->db->single();
    return $results;
}




public function viewTask($id)
{
    $this->db->query("SELECT * FROM `posts` where id='$id'");
    $results = $this->db->resultSet();
    return $results;
    
}



public function saveTask($data)
{
    $this->db->query('INSERT INTO `posts`( `user_id`, `title`, `status`, `descrip`, `duration`, `created_by`, `priority`, `attachment`) VALUES (:uid,:title,:status,:descrip,:workhr,:crby,:priority,:attachment)');
    $this->db->bind(':uid',$data['uid']);
    $this->db->bind(':title',$data['title']);
    $this->db->bind(':status',$data['status']);
    $this->db->bind(':descrip',$data['descrip']);
    $this->db->bind(':workhr',$data['workhr']);
    $this->db->bind(':crby',$data['crby']);
    $this->db->bind(':priority',$data['priority']);
    $this->db->bind(':attachment',$data['attachment']);
    if($this->db->execute()){
        return true;
    }else{
        return false;
    }
}

public function deleteTask($id)
{
    $this->db->query('DELETE FROM `posts` WHERE id =:id');
    $this->db->bind(':id',$id);
    
    if($this->db->execute()){
        return true;
    }else{
        return false;
    }
}
    
}

?>