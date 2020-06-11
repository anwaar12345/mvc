<?php

class User{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }


//register method 

public function register($data)
{
    $this->db->query('INSERT INTO `users`(`name`, `email`, `password`,`profile`) VALUES ( :name, :email, :password, :profile)');
    $this->db->bind(':name',$data['name']);
    $this->db->bind(':email',$data['email']);
    $this->db->bind(':password',$data['password']);
    $this->db->bind(':profile',$data['profile']);
    if($this->db->execute()){
        return true;
    }else{
        return false;
    }
}
//login

public function login($email,$password)
{
$this->db->query('SELECT * FROM `users` where email = :email');
$this->db->bind(':email',$email);
$row = $this->db->single();
$hashedPass = $row->password;    
if(password_verify($password,$hashedPass)){
 return $row;
}else{
    return false;
}

}



public function findUserByEmail($email)
{

$this->db->query('SELECT * FROM `users` where email= :email');
$this->db->bind(':email',$email);
$row = $this->db->single();

if($this->db->rowCount() > 0){
    return true;
}else{
    return false;
}

}


}


?>