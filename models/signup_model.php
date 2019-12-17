<?php

    //require form api file
    require "../api/form_api.php";
    $form = new formApi();

    //get all form variables
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $pwd1 = $_POST['pwd1'];
    $pwd2 = $_POST['pwd2'];
    
    //setup account
    if($form->checkEmpty($fname,$lname,$email,$pwd1,$pwd2)){
        echo " Please fill all fields ";
    }else if($form->notValidEmail($email)){
        echo " Please add a valid email ";
    }else if($form->notValidPwd($pwd1)){
        echo "Please enter  valid password";
    }else if($form->noPwdMatch($pwd1, $pwd2)){
        echo "passwords do not match";
    }else if($form->emailExist($email)){
        echo "This email already exists";
    }else{
       echo $form->createAccount($fname,$lname,$email,$pwd1);
    }
?> 