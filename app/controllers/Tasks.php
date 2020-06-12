<?php

class Tasks extends Controller{

public function __construct()
{
    // echo "Files Page";
        if(!isLoggedIn()){
            redirect('users/login');
        }

        $this->postModel = $this->model('Task');


}

public function index(){

    $tasks = $this->postModel->getTasks();
    
    $data = [
        'tasks' => $tasks,    
    ];
    $this->view('tasks',$data);

}

public function edit($id)
{
   
die($id);


}

public function add()
{

$data = [

'Tasks' => 'Task Add Page',

];

    $this->view('add',$data);


}

}

?>
