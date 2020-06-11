<?php

class Files extends Controller{

public function __construct()
{
    // echo "Files Page";

}

public function index(){

    $data = [
        'title' => $_SESSION['name'],
       
    ];
    $this->view('hello',$data);

}


}

?>
