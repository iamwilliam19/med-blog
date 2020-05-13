<?php
     if(isset($_SESSION['email'])){
         $email = $_SESSION['email'];
     }

     
    require "./api/administratorsApi.php";
    $adminApi = new administratorsApi();

    $admin = $adminApi->getAdminDetails($email);
    

?>



<!-- ============================================================== -->
 <!-- pageheader  -->
 <!-- ============================================================== -->
                    
 <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
         <div class="page-header">
             <h2 class="pageheader-title">Account  </h2>
                <p class="pageheader-text">Nulla euismod urna eros, sit amet scelerisque torton lectus vel mauris facilisis faucibus at enim quis massa lobortis rutrum.</p>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index" class="breadcrumb-link">Dashboard</a></li>
                                 <li class="breadcrumb-item active" aria-current="page">Profile</li>
                            </ol>
                        </nav>
                    </div>
                    </div>
         </div>
                    
<!-- ============================================================== -->
<!-- end pageheader  -->
<!-- ============================================================== -->



<!-- ============================================================== -->
<!-- profil starts --->
<!--- ============================================================= -->

<div class="adminProfileBox">
    <div class="adminProImage">
        <img src="<?php echo '../'.$admin->image ?>" alt="Profile image of <?php echo $admin->fname. ' '. $admin->lname ?>">
    </div>

    <!-- ============================================================== -->
    <ul>
        <li><span>Last name:</span><span><?php echo $admin->lname ?></span></li>
        <div style="clear:both"></div>

        <li><span>First name:</span><span><?php echo $admin->fname ?></span></li>
        <div style="clear:both"></div>

        <li><span>Email:</span><span><?php echo $admin->email ?></span></li>
        <div style="clear:both"></div>

        <li><span>Bio:</span><span ><div class="adminBio">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa fugit dignissimos
        </div></span></li>
        <div style="clear:both"></div>
    </ul>

    <a href="adminEdit"><div class="adminProEdit">Edit</div></a>
                            
</div>