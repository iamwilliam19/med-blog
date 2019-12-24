<?php
     if(isset($_SESSION['email'])){
         $email = $_SESSION['email'];
     }
    require "./api/administratorsApi.php";
    $adminApi = new administratorsApi();

    $adminList = $adminApi->getMessages();
    

?>



<!-- ============================================================== -->
 <!-- pageheader  -->
 <!-- ============================================================== -->
                    
 <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
         <div class="page-header">
             <h2 class="pageheader-title">Messages </h2>
                <p class="pageheader-text">Nulla euismod urna eros, sit amet scelerisque torton lectus vel mauris facilisis faucibus at enim quis massa lobortis rutrum.</p>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index" class="breadcrumb-link">Dashboard</a></li>
                                 <li class="breadcrumb-item active" aria-current="page">messages</li>
                            </ol>
                        </nav>
                    </div>
                    </div>
         </div>
                    
                    <!-- ============================================================== -->
                    <!-- end pageheader  -->
                    <!-- ============================================================== -->


                    <!--================================================================-->
                    <!-- staff table -->
                    <!-- ===============================================================-->
                    
                    <div class="">
                            <!-- ============================================================== -->
                      
                            <!-- ============================================================== -->

                                          <!-- recent orders  -->
                            <!-- ============================================================== -->
                            <div class="formError"></div>
                            <div class=" col-12">
                                <div class="card">
                                    <h5 class="card-header">Inbox</h5>
                                    <div class="card-body p-0">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead class="bg-light">
                                                    <tr class="border-0">
                                                        <th class="border-0">#</th>
                                                        <th class="border-0">Sent by</th>
                                                        <th class="border-0">Email</th>
                                                        <th class="border-0">Sent on</th>
                                                        <th class="border-0">Activity</th>
                                                        
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php 
                                                    foreach($adminList as $admin):
                                                        if($admin['status'] == 0){
                                                            $statusStyle = "<span class='badge-dot badge-brand mr-1'></span>";
                                                           
                                                        }else{
                                                           
                                                            $statusStyle = "";
                                                        }

                                                        
                                                ?>
                                                    <tr>
                                                        
                                                        
                                                        <td>1 </td>
                                                        <td><?php echo $admin['name'] ?></td>
                                                        <td><?php echo $admin['email'] ?></td>
                                                        <td><?php echo $admin['time'] ?></td>
                                                        <td><a href="message_detail?id=<?php echo $admin['id'] ?>" class=" btn  btn-outline-light">view</a> <?php echo $statusStyle ?></td>
                                                    </tr>
                                                    <?php 
                                                        endforeach;
                                                    ?>
                                                    
                                                    <tr>
                                                        <td colspan="9"><a href="#" class="btn btn-outline-light float-right">View Details</a></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>



                    <!--================================================================-->
                    <!-- staff table ends -->
                    <!-- ===============================================================-->