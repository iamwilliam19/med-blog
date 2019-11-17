<?php
  
?>


<!--header begins-->
<header>
  <div class="ui padded grid">
    <div class="four wide center aligned computer only column">
     <a href="index"> <div class="ui large top  header " id="logo" >ReachMedica</div></a>
    </div>

    <div class="four wide center aligned tablet only column">
    <a href="index"> <div class="ui large top  header " id="logo" >ReachMedica</div></a>
    </div>

    <div class="ten wide left aligned mobile only column">
    <a href="index"> <div class="ui large  header " id="logo" >ReachMedica</div></a>
    </div>
    <div class="seven wide computer only column">
      <nav class="ui right floated secondary  menu">
        <a class=" active item" href="index">Blog</a>
        <a class="item" href="aboutus">About us</a>
        <a class="item" href="contactus">Contact us</a>
        <a class="item" href="faq">FAQ</a>
      </nav>
    </div>
    <div class="six wide tablet only column">
      <nav class="ui right floated secondary  menu">
        <a class=" active item">Blog</a>
        <a class="item" href="aboutus">About us</a>
        <a class="item" href="contactus">Contact us</a>
        <a class="item" href="faq">FAQ</a>
      </nav>
    </div>
    <div class="five wide right aligned computer only column">
    <?php
    
    if(!isset($_SESSION['email']) ){
      
    ?>
      <a href="login" class="ui button " id="changeButton" >Login</a>
      <a href="signup" class="ui button" id="changeButton">Sign up</a>
    <?php }else if (isset($_SESSION['email'])){
    ?>
      <div class="ui button" id="changeButton" onclick="logout(event)" >Sign out</div>
    <?php } ?>
    </div>

    <div class="six wide right aligned tablet only column">
      <a href="login" class="ui button " id="changeButton" >Login</a>
      <a href="signup" class="ui button" id="changeButton">Sign up</a>
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
  <div class="ui padded container">
    <aside class="ui sidebar vertical menu">
      <div class="item" href="index">Blog</div>
      <div class="item" href="aboutus">About us</div>
      <div class="item" href="contactus">Contact us</div>
      <div class="item" href="faq">FAQ</div>
      <a href="login" class="item">Login</a>
      <a href="signup" class="item">Sign up</a>
    </aside>