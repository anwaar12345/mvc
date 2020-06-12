<?php
// error_reporting(0);
class Tasks extends Controller{

public function __construct()
{
    // echo "Files Page";
        if(!isLoggedIn()){
            redirect('users/login');
        }

        $this->taskModel = $this->model('Task');


}

public function index(){

    $tasks = $this->taskModel->getTasks();
    
    $data = [
        'tasks' => $tasks,    
    ];
    $this->view('tasks',$data);

}

public function details($id)
{
   die($id);


}

public function delete($id)
{

    if($this->taskModel->deleteTask($id)) {

        flash('Task_removed','You have Deleted Task Successfully');
        redirect('tasks');
        
    }else{
        die("Some Thing Went Wrong");
    }

}

public function add()
{

   //check for post request
   if($_SERVER['REQUEST_METHOD']== 'POST'){

    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

    $data = [
        'uid' => trim($_POST['uid']),
        'title' => trim($_POST['title']),
        'status' => trim($_POST['status']),
        'descrip' => trim($_POST['descrip']),
        'workhr' => trim($_POST['workhr']),
        'crby' => trim($_POST['crby']),
        'priority' => trim($_POST['priority']),
        'attachment' => $_FILES['attachment']['name'],
        'attachment_move' => $_FILES['attachment']['tmp_name'],
        'title_err' => '',
        'status_err' => '',
        'descrip_err' => '',
        'workhr_err' => '',
        'crby_err' => '',
        'priority_err' => '',
        'attachment_err' => ''
    ];
// print_r($data['workhr_err']);exit;
    //validation
    if(empty($data['title'])){
        $data['title_err'] = "Please insert task Title";
    }
    
    if(empty($data['status'])){
        $data['status_err'] = "Please Select Status";
    }

    if(empty($data['descrip'])){
        $data['descrip_err'] = "Please Provide Description for Task";
    }

    if(empty($data['workhr'])){
        $data['workhr_err'] = "Please Provide Work Hour";
    }


    if(empty($data['crby'])){
        $data['crby_err'] = "Please Provide Author Name";
    }

    if(empty($data['priority'])){
        $data['priority_err'] = "Please Tell Priority";
    }


    if(empty($data['attachment'])){
        $data['attachment_err'] = "Please Upload Attachment";
    }


    // // echo '../../';
    // print_r($data);exit;
    // // $root = 
    $location = dirname(APPROOT)."\public\images"."\\$data[attachment]";

    
    if(empty($data['title_err']) && empty($data['status_err']) && empty($data['descrip_err']) && empty($data['workhr_err']) && empty($data['crby_err']) && empty($data['priority_err']) && empty($data['attachment_err']) && move_uploaded_file($data['attachment_move'],$location)){

    //register user
    if($this->taskModel->saveTask($data)){
        flash('Task_added','You have Added Task Successfully');
        redirect('tasks');
    }else{
        die("Some Errors Occured");
    }

   }else{
    //    print_r($data);exit;
    $this->view('add',$data);

   }



   }else{
       
    $data = [
        'uid' => '',
        'title' => '',
        'status' => '',
        'descrip' => '',
        'workhr' => '',
        'profile' => '',
        'crby' => '',
        'priority' => '',
        'attachment' => '',
        'profile_err' => '',
        'title_err' => '',
        'status_err' => '',
        'descrip_err' => '',
        'workhr_err' => '',
        'crby_err' =>'', 
        'priority_err' => '',
        'attachment_err' => ''
    ];

    $this->view('add',$data);


   }



}

}

?>
