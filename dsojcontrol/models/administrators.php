<?php

    //require signupapi file
    require "../api/AdministratorsApi.php";
    $adminApi = new administratorsApi();

    //get all form variables
    
    $email = $_POST['email'];
    $activity = $_POST['activity'];

    if($activity == 1){
        //block
       echo  $adminApi->block($email,0);
    }else if($activity == 0){
       echo  $adminApi->unblock($email,1);
    }
    
    
    
?> 