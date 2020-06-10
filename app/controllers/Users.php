<?php

 class Users extends Controller{

public function __construct()
{
    # code...
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
    }
    if(empty($data['password'])){
        $data['password_err'] = "Please insert Password";
    }elseif(strlen($data['password']) < 6 ){
        $data['password_err'] = "Password Should be Atr Least 6 Characters";
    }

    if(empty($data['confirm_password'])){
        $data['confirmpass_err'] = "Please Enter Confirm Password value";
    }else{
        if($data['password']!=$data['confirm_password']){
            $data['confirmpass_err'] = "Passwords Dont Match";
        }
    }

   if(empty($data['name_err']) && empty($data['email_err']) && $data['password_err'] && $data['confirmpass_err']){
       die('success');
   }else{
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




 }


?>