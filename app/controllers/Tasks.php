<?php

class Tasks extends Controller{

public function __construct()
{
    // echo "Files Page";
        if(!isLoggedIn()){
            redirect('users/login');
        }



}

public function index(){

    $data = [
        'title' => $_SESSION['name'],
       
    ];
    $this->view('hello',$data);

}


}

?>
