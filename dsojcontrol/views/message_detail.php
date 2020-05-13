<?php
     if(isset($_SESSION['email'])){
         $email = $_SESSION['email'];
     }
    require "./api/administratorsApi.php";
    $adminApi = new administratorsApi();

    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }else{
?>
    <script>
        location.replace("page404");
    </script>
<?php
    }

    $adminApi->updateStatus($id);
    $message = $adminApi->fetchMessage($id);
    

?>

<!-- ============================================================== -->
 <!-- pageheader  -->
 <!-- ============================================================== -->
                    
 <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
         <div class="page-header">
             <h2 class="pageheader-title">Message Detail </h2>
                <p class="pageheader-text">Nulla euismod urna eros, sit amet scelerisque torton lectus vel mauris facilisis faucibus at enim quis massa lobortis rutrum.</p>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index" class="breadcrumb-link">Dashboard</a> <a href="messages" class="breadcrumb-link"> messages</a></li>
                                 <li class="breadcrumb-item active" aria-current="page">  detail > <?php echo $message->name. " | ". $message->time ?> </li>
                            </ol>
                        </nav>
                    </div>
                    </div>
         </div>
                    
                    <!-- ============================================================== -->
                    <!-- end pageheader  -->
                    <!-- ============================================================== -->


 <!--================================================================-->
                    <!-- message body -->
<!-- ===============================================================-->

<div class="messageBody">
    <?php echo $message->message; ?>
</div>
 <!--================================================================-->
                    <!-- message body ends -->
<!-- ===============================================================-->



                    
                    