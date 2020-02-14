<?php

    require '../vendor/autoload.php';


    //require form api file
    require "../api/posting_api.php";
    $postApi = new apiProcessor();

    //get all form variables
    $title = $_POST['title'];
    $cat = $_POST['category'];
    $post = $_POST['post'];
    
    
    
    //validate post values
    if($title == ""){
        echo "Please enter a valid title";
    }else if($cat == "select"){
        echo "Please select a category ";
    }else{
      echo  $postApi->uploadPost($title,$cat,$post);
    }
?> 