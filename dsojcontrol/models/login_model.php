<?php

    //require signupapi file
    require "../api/form_api.php";
    $form = new formApi();

    //get all form variables
    
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];
    
    
    //login account
     if($form->notValidEmail($email)){
        echo " Please add a valid email!! ";
    }else if(!$form->emailExist($email)){
        echo " Email does not exist !! ";
    }else if($form->wrongPwd($email, $pwd)){
        echo  "password does not match email";
    }else{
        //set session email
        $_SESSION['email'] = $email;
        echo "proceed";
    }
?> 