<?php

    require '../vendor/autoload.php';


    //require form api file
    require "../api/posting_api.php";
    $postApi = new apiProcessor();

    //get all form variables
    $title = $_POST['title'];
    $cat = $_POST['category'];
    $post = $_POST['post'];


    //check for images in post
    //Create a new DOMDocument object.
    $htmlDom = new DOMDocument;
    
    //Load the HTML string into our DOMDocument object.
    $htmlDom->loadHTML($post);
    
    //Extract all img elements / tags from the HTML.
    $imageTags = $htmlDom->getElementsByTagName('img');
    
    if(count($imageTags) > 0){
            //Create an array to add extracted images to.
        $extractedImages = array();
        
        //Loop through the image tags that DOMDocument found.
        foreach($imageTags as $imageTag){
        
            //Get the src attribute of the image.
            $imgSrc = $imageTag->getAttribute('src');
        
            //Get the alt text of the image.
            $altText = $imageTag->getAttribute('alt');
        
            //Get the title text of the image, if it exists.
            $titleText = $imageTag->getAttribute('title');
        
            //Add the image details to our $extractedImages array.
            $extractedImages[] = array(
                'src' => $imgSrc,
                'alt' => $altText,
                'title' => $titleText
            );
        }

        
    
        //get first array
        $counter = 0;
        foreach($extractedImages as $image){
            $counter++;
            if($counter == 1){
                $mainImage = $image['src'];
            }
        }

        

    }
    
    
    
    //validate post values
    if(strlen(trim($title)) < 1){
        echo "Please enter a valid title";
    }else if($cat == "select"){
        echo "Please select a category ";
    }else if(strlen(trim($post)) < 1){
        echo "Please write a Post";
    }else if(count($imageTags) < 1){
        echo "Please add an image to your post";
    }else{
      echo  $postApi->uploadPost($title,$cat,$post,$mainImage);
    }
?> 