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

   //check for post request
   if($_SERVER['REQUEST_METHOD']== 'POST'){

    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

    $data = [
        'name' => trim($_POST['name']),
        'email' => trim($_POST['email']),
        'password' => trim($_POST['password']),
        'confirm_password' => trim($_POST['confirm_password']),
        'profile' => $_FILES['profile']['name'],
        'profile_move'=> $_FILES['profile']['tmp_name'],
        'name_err' => '',
        'email_err' => '',
        'password_err' => '',
        'confirmpass_err' => ''
    ];

    //validation
    if(empty($data['name'])){
        $data['name_err'] = "Please insert Name";
    }
    if(empty($data['email'])){
        $data['email_err'] = "Please insert Email";
    }else{
        // for checking Email Exists or not
        if($this->userModel->findUserByEmail($data['email'])){
            $data['email_err'] = "Email Already Exists";
            
        }

    }
    
    if(empty($data['password'])){
        $data['password_err'] = "Please insert Password";
    }elseif(strlen($data['password']) < 6 ){
        $data['password_err'] = "Password Should be At Least 6 Characters";
    }

    if(empty($data['confirm_password'])){
        $data['confirmpass_err'] = "Please Enter Confirm Password value";
    }else{
        if($data['password']!=$data['confirm_password']){
            $data['confirmpass_err'] = "Passwords Do not Match";
        }
    }

    if(empty($data['profile'])){
        $data['profile_err'] = "Please Upload Profile Picture";
    }

    // echo '../../';
    // print_r($data);exit;
    // $root = 
    $location = dirname(APPROOT)."\public\images"."\\$data[profile]";
    if(empty($data['name_err']) && empty($data['email_err']) && empty($data['password_err']) && empty($data['confirmpass_err']) && empty($data['profile_err']) && move_uploaded_file($data['profile_move'],$location)){
    
     
    //hash  the password

    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
    //register user
    if($this->userModel->register($data)){
        flash('register_success','You have Registered Successfully');
        redirect('users/login');
    }else{
        die("Some Errors Occured");
    }

   }else{
    //    print_r($data);exit;
    $this->view('add',$data);

   }



   }else{
       
    $data = [
        'name' => '',
        'email' => '',
        'password' => '',
        'confirm_password' => '',
        'profile' => '',
        'profile_err' => '',
        'name_err' => '',
        'email_err' => '',
        'password_err' => '',
        'confirmpass_err' => ''
    ];

    $this->view('add',$data);


   }



}

}

?>
