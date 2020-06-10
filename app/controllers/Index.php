<?php

class index extends Controller{

public function __construct()
{
    echo "Default Page";
}

public function index(){

$this->view('starter');

}


}

?>
