<?php 
    //require signupapi file
    require "../api/form_api.php";
    $form = new formApi();

    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    
    //validatre info
    if($form->contactEmpty($name,$email,$message)){
        echo "please fill all fields";
    }else if($form->notValidEmail($email)){
        echo "please enter a valid email";
    }else {
        echo $form->sendMessage($name,$email,$message);
    }

?>