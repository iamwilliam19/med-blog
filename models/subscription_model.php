<?php
    //require form api file
    require "../api/form_api.php";
    $form = new formApi();
    $email = $_POST['email'];
    if($form->notValidEmail($email)){
        echo "please enter a valid email";
    }else if($form->subExist($email)){
       echo "oops!! it seems you have subscribed already";
    }else{
        echo $form->createSubscription($email);
    }
?>