<?php
// error_reporting(0);
class Admin extends Controller{

public function __construct()
{
    // echo "Files Page";
        if(!isLoggedIn()){
            redirect('users/login');
        }

        //$this->taskModel = $this->model('Admin');


}

public function index(){

   
    // $tasks = $this->taskModel->getTasks();
    
    // $data = [
    //     'tasks' => $tasks,    
    // ];
    $this->view('Admin/admin');

}


}

?>
