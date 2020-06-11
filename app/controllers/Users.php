<?php

 class Users extends Controller{

public function __construct()
{
    $this->userModel = $this->model('User');
}

public function register()
{
   //check for post request
   if($_SERVER['REQUEST_METHOD']== 'POST'){

    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

    $data = [
        'name' => trim($_POST['name']),
        'email' => trim($_POST['email']),
        'password' => trim($_POST['password']),
        'confirm_password' => trim($_POST['confirm_password']),
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

   if(empty($data['name_err']) && empty($data['email_err']) && empty($data['password_err']) && empty($data['confirmpass_err'])){
        
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
       $this->view('users/register',$data);
   }



   }else{
       
    $data = [
        'name' => '',
        'email' => '',
        'password' => '',
        'confirm_password' => '',
        'name_err' => '',
        'email_err' => '',
        'password_err' => '',
        'confirmpass_err' => ''
    ];

    $this->view('users/register',$data);


   }

}


public function login()
{
   //check for post request
   if($_SERVER['REQUEST_METHOD']== 'POST'){

    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

    $data = [
        'email' => trim($_POST['email']),
        'password' => trim($_POST['password']),
        'email_err' => '',
        'password_err' => ''
    ];

    //validation
    if(empty($data['email'])){
        $data['email_err'] = "Please insert Email";
    }
    if(empty($data['password'])){
        $data['password_err'] = "Please insert Password";
    }
    if($this->userModel->findUserByEmail($data['email'])){
        
    }else{
        $data['email_err'] = "User Not Found";
    }


   if(empty($data['name_err']) && empty($data['email_err'])){
        $userLogedIn = $this->userModel->login($data['email'],$data['password']);
        if($userLogedIn){
            //session will be maintain
            $this->createSession($userLogedIn);
            redirect('users/file');
            exit;
        }else{
            $data['password_err'] = "Invalid Password";
            $this->view('users/login',$data);     
        }

   }else{
    //    print_r($data);exit;
       $this->view('users/login',$data);
   }




   





}else{
       
    $data = [
        'email' => '',
        'password' => '',
        'email_err' => '',
        'password_err' => '',
        
    ];




    $this->view('users/login',$data);


   }

}

public function createSession($user)
{
    $_SESSION['user_id'] = $user->id;
    $_SESSION['email'] = $user->email;
    $_SESSION['name'] = $user->name;
   
}

public function logout()
{
 unset($_SESSION['user_id']);
 unset($_SESSION['email']);
 unset($_SESSION['name']);
 session_destroy();
 redirect('users/login');
}
 }


?>