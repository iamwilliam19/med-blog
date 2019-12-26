<?php

    //require signupapi file
    require "../api/AdministratorsApi.php";
    $adminApi = new administratorsApi();

    //get all form variables
    
     $id = $_POST['id'];

     echo $adminApi->deletePost($id);
    
    
    
?> 