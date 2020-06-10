<?php

class Files extends Controller{

public function __construct()
{
    // echo "Files Page";

}

public function index(){

    $data = [
        'title' => 'The Posts Page',
       
    ];
    $this->view('hello',$data);

}


}

?>
