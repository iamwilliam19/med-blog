<?php
  //get page url
    $url = $_SERVER['REQUEST_URI'];
    if($url == '/med-blog/med-blog/index'){
      $index = 'active';
    }else{
      $index = '';
    }
    if($url == '/med-blog/med-blog/blog'){
      $blog = "active";
    }else{
      $blog = '';
    }
     if( $url == '/med-blog/med-blog/aboutus'){
      $aboutus = 'active';
    }else{
      $aboutus = '';
    }
    if($url == '/med-blog/med-blog/contactus'){
      $contactus = "active";
    }else{
      $contactus = '';
    }
    if($url == '/med-blog/med-blog/faq'){
      $faq = 'active';
    }else{
      $faq = '';
    }
?>


<!--header begins-->
<header>
  <div class="ui padded grid">
    <div class="three wide center aligned computer only column">
     <a href="index"> <div class="ui large top  header " id="logo" >ReachMedica</div></a>
    </div>

    <div class="three wide center aligned tablet only column">
    <a href="index"> <div class="ui large top  header " id="logo" >ReachMedica</div></a>
    </div>

    <div class="ten wide left aligned mobile only column">
    <a href="index"> <div class="ui large  header " id="logo" >ReachMedica</div></a>
    </div>
    <div class="eight wide computer only column">
      <nav class="ui right floated secondary  menu">
      <a class=" <?php echo $index ?> item" href="./views/index.php">Home</a>
        <a class=" <?php echo $blog ?> item" href="blog">Blog</a>
        <a class=" <?php echo $aboutus ?> item" href="aboutus">About us</a>
        <a class="<?php echo $contactus ?> item" href="contactus">Contact us</a>
       
      </nav>
    </div>
    <div class="eight wide tablet only column">
      <nav class="ui right floated secondary  menu">
      <a class=" <?php echo $index ?> item" href="index">Home</a>
      <a class=" <?php echo $blog ?> item" href="blog">Blog</a>
        <a class=" <?php echo $aboutus ?> item" href="aboutus">About us</a>
        <a class="<?php echo $contactus ?> item" href="contactus">Contact us</a>
        
      </nav>
    </div>
    <div class="five wide right aligned computer only column">
    <?php
    
    if(isset($_SESSION['email']) ){
      
    ?>
     <div class="ui button" id="changeButton" onclick="logout(event)" >Sign out</div>
    <?php }else{
    ?>
     <a href="login" class="ui  button " id="changeButton" >Login</a>
      <a href="signup" class="ui button" id="changeButton">Sign up</a>
    <?php } ?>
    </div>

    <div class="five wide right aligned tablet only column">
    <?php
    
    if(isset($_SESSION['email']) ){
    
    ?>
     <div class="ui button" id="changeButton" onclick="logout(event)" >Sign out</div>
    <?php }else{
    ?>
     <a href="login" class="ui  button " id="changeButton" >Login</a>
      <a href="signup" class="ui button" id="changeButton">Sign up</a>
    <?php } ?>
    </div>

    <div class="six wide right aligned mobile only column">
      <div class="ui icon button " id="changeButton" >
        <i class="ui list icon menubut"></i>
      </div>
      
    </div>
<div>
  <div class="ui clearing"></div>

  
</header>


<main class="main">
  <div class="ui container">
    <aside class="ui sidebar vertical menu">
      <a class=" <?php echo $index ?> item" href="index">Blog</a>
      <a class=" <?php echo $aboutus ?> item" href="aboutus">About us</a>
      <a class="<?php echo $contactus ?> item" href="contactus">Contact us</a>
      <a class="<?php echo $faq ?> item" href="faq">FAQ</a>
      <a href="login" class="item">Login</a>
      <a href="signup" class="item">Sign up</a>
    </aside>