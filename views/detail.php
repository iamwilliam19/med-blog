<?php 

    if(!isset($_GET['id'])){
        //load error page
        header("location: ./page404");

    }else{

    $id = $_GET['id'];
    require "api/post_api.php";
    require "api/poster_api.php";

    

    //instantiate class
    $postHandler = new apiProcessor();
    $posterHandler = new posterProcessor();
    $post = $postHandler->detailFetcher($id);
    $poster = $posterHandler->fetchPoster($post->poster_email);
   
    //check if user is online
    if (isset($_SESSION['email']) && $_SESSION['email'] != "") {
        $email = $_SESSION['email'];
         //get my rank and detail
        $myIdentity = $posterHandler->fetchMe($email);
        $myRank = $myIdentity->poster_rank;
        $myId = $myIdentity->id;
    }else{
        $email = '';
        $myRank = '';
    }
    
?>

<section class="blogBox">
    <div class="blogLeft">
        <div class="blogProImage">
            <img src="<?php echo $poster->image  ?>" />
        </div>
        <div class="proName "><?php echo $poster->fname. ' ' . $poster->lname  ?></div>
        <div class="proDescription">
        <?php echo $poster->bio  ?>
        </div>
        <?php 
            //check if I am the poster
            if($poster->email == $email):
        ?>
        <div class="proEditLink">
            <a href="profile_edit?email=<?php echo $poster->email  ?>">Edit Profile</a>
        </div>

        <?php endif; ?>
        
            <div class="firstBearer">
                <ul>
                <?php 
                    //check if am logged in and an admin
                    if($myRank == 'admin'):
                ?>

                    <a href="index?poster_id=<?php echo $myId ?>"><li><strong>My Posts</strong></li></a>

                <?php endif; ?>
                    <a href="index"><li><strong>Recent Posts</strong></li></a>
                    <li class="except "><strong>Post Fields</strong><i class="ui dropdown icon pushRight"></i></li>
                    
                </ul>
            </div>

            
    

            <div class="secondBearer">
                <ul>
                   <a href="index"> <li><strong>All</strong></li></a>
                   <a href="index?category=anatomy"><li><strong>Anatomy</strong></li></a>
                   <a href="index?category=pharmacology"><li><strong>Pharmacology</strong></li></a>
                   <a href="index?category=physiology"><li><strong>Physiology</strong></li></a>
                   <a href="index?category=mbc"><li><strong>Medical Biochemistry</strong></li></a>
                </ul>
            </div>

            <br />
            <i class="ui like icon"></i> 120 
            <i class=" ui comment icon" id="padIcon"></i> 129
            <?php 
                //check if am logged in and an admin
                if($myRank == 'admin'):
            ?>
            <a href="detail"> <div class="ui button" id="newBut"> New Post  </div></a>
            <?php endif; ?>
        
    </div>

    <!--right blog page -->

    <div class="blogRight">
        <div class="ui text container" id="topPad">
        
            <div class="ui header"> <?php echo $post->title ?></div>
            <div class="customMeta">By <?php echo $post->poster ?> | <?php echo $post->day .' '. $post->month .' '. $post->year?></div>
            <div class="customMeta">Post Field: <?php echo $post->category ?></div>

            <div class="ui fluid image" id="imageBase">
               
                <img src="<?php echo $post->image ?>" alt="<?php echo "Image of ".$post->title ?>" />
            </div>

            <?php echo $post->content ?>
            <br />
            <br />
            <i class="ui like icon"></i> 120 
            <i class=" ui comment icon" id="padIcon"></i> 129

            <div class="ui small header">Comments</div>

            <!--comments start-->
            <div class="ui comments">
                <!--main comment starts-->
                <div class="comment">
                    <div class=" avatar" id="avatar">
                        <img src="images/js.jpg" alt="" />
                    </div>

                    <div class="content">
                        <a class="author">William Ikeji</a>
                        <div class="metadata">1 hr ago</div>
                        <div class="text"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi asperiores doloribus unde quod omnis, facere quo quaerat voluptatibus. Maiores harum quo dolores ab sit ipsam maxime, quas odit veritatis aliquam. </div>
                         <div class="actions">   
                            <i class="ui reply icon"></i> 120
                            <i class="ui like icon" id="padIcon"></i> 2
                        </div>
                    </div>

                    <!-- sub comment start-->
                    <div class="comments">
                                <!--one comment end-->
                        <div class="comment">
                            <div class=" avatar">
                                <img src="images/js.jpg" alt="" />
                            </div>

                            <div class="content">
                                <a class="author">William Ikeji</a>
                                <div class="metadata">1 hr ago</div>
                                <div class="text"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi asperiores doloribus unde quod omnis, facere quo quaerat voluptatibus. Maiores harum quo dolores ab sit ipsam maxime, quas odit veritatis aliquam. </div>
                                <div class="actions">   
                                    <i class="ui reply icon"></i> 120
                                    <i class="ui like icon" id="padIcon"></i> 2
                                </div>
                            </div>
                        </div>
                        <!--one comment end-->
                    </div>
                    <!-- sub comments end-->
                </div>
                <!--main comment end-->
            </div>
            <!--comments end-->

        </div>
    </div>

    <div style="clear:both"></div>
</section>

<?php 

    }
?>