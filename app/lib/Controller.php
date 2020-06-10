<?php
class Controller{

public function model($modal)
{
   require_once '../app/modals/'. $modal.'.php';

   return new $modal();
}

public function view($view, $data = [])
{
    if(file_exists('../app/views/'.$view.'.php')){
        require_once '../app/views/'.$view.'.php';
    }else{
        die("View not Found");
    }
}

}
?>