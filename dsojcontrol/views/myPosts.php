<?php
     if(isset($_SESSION['email'])){
         $email = $_SESSION['email'];
     }
    require "./api/administratorsApi.php";
    $adminApi = new administratorsApi();

    $posts = $adminApi->getMyPosts($email);
    

?>



<!-- ============================================================== -->
 <!-- pageheader  -->
 <!-- ============================================================== -->
                    
 <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
         <div class="page-header">
             <h2 class="pageheader-title">My Posts Analysis </h2>
                <p class="pageheader-text">Nulla euismod urna eros, sit amet scelerisque torton lectus vel mauris facilisis faucibus at enim quis massa lobortis rutrum.</p>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index" class="breadcrumb-link">Dashboard</a></li>
                                 <li class="breadcrumb-item active" aria-current="page">My Posts</li>
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
                                    <h5 class="card-header">Recent Orders</h5>
                                    <div class="card-body p-0">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead class="bg-light">
                                                    <tr class="border-0">
                                                        <th class="border-0">#</th>
                                                        
                                                        <th class="border-0">Title</th>
                                                        <th class="border-0">Posted By</th>
                                                        <th class="border-0">Postetd On</th>
                                                        <th class="border-0">Category</th>
                                                        <th class="border-0">Views</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php 
                                                    foreach($posts as $post):
                                                       /* if($admin['status'] == 0){
                                                            $status = 'Offline';
                                                            $statusStyle = "label-danger";
                                                        }else{
                                                            $status = "Online";
                                                            $statusStyle = "label-success";
                                                        }

                                                        if($admin['activity'] == 0){
                                                            $activity = 'Unblock';
                                                        }else{
                                                            $activity = "Block";
                                                        }*/
                                                        
                                                ?>
                                                    <tr>
                                                        
                                                        
                                                        <td>1 </td>
                                                        
                                                        <td><?php echo $post['title'] ?></td>
                                                        <td><?php echo $post['poster'] ?></td>
                                                        <td><?php echo $post['day']. ' | '.$post['month']. ' | '. $post['year'] ?></td>
                                                        <td><?php echo $post['category'] ?></td>
                                                        <td><?php echo $post['views'] ?></td>
                                                        <td><div class=" btn  btn-outline-light" data-id = '<?php echo $post['id'] ?>' onclick="deletePost(event)" >Delete</div> </td>
                                                        <td><a href="editPost?id=<?php echo $post['id']  ?>" class=" btn  btn-outline-light"> Edit</a> </td>
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