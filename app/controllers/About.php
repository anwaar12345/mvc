<?php

class About extends Controller{

public function __construct()
{
    //  echo "About Page";
}

public function index(){

    $this->view('about');


}



public function about($id)
{
    echo "about method".$id;
}


}

?>
