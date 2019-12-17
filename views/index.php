<?php
    require "api/post_api.php";
    require "api/poster_api.php";
    //instantiate class
    $postHandler = new apiProcessor();
    $myHandler = new posterProcessor();
    //check set parameters
    if (!isset($_GET['poster_id']) && !isset($_GET['category'])) {
        //fetch all posts
        $posts = $postHandler->postFetcher();
    }else if(isset($_GET['poster_id'])){
        //fetch post based on poster
        $posts = $postHandler->posterPostFetcher($_GET['poster_id']);
    }else if(isset($_GET['category'])){
        //fetch post based on category
        $posts = $postHandler->categoryPostFetcher($_GET['category']);
    }
    
    //check if user is online
    if(isset($_SESSION['email']) && $_SESSION['email'] != ''){
        $email = $_SESSION['email'];
        //get my rank and detail
        $identity = $myHandler->fetchPoster($email);
        $rank = $identity->poster_rank;
        
        if($rank == 'admin' || $rank == 'director'){
            //get admin details
            $proImage = $identity->image;
            $proName = $identity->fname . ' ' .$identity->lname;
            $proBio = $identity->bio;
            $proId = $identity->id;
            $proEmail = $identity->email;
        }else if($rank == 'member'){
            //fetch director details 
            $dirIdentity = $myHandler->fetchDirector();
            $proImage = $dirIdentity->image;
            $proName = $dirIdentity->fname . ' ' .$dirIdentity->lname;
            $proBio = $dirIdentity->bio;
            $proId = $dirIdentity->id;
            $proEmail = $dirIdentity->email;
        }
    }else{
        $email = '';
        //assign empty sting to rank
        $rank = '';
         //fetch director details 
         $dirIdentity = $myHandler->fetchDirector();
         $proImage = $dirIdentity->image;
         $proName = $dirIdentity->fname . ' ' .$dirIdentity->lname;
         $proBio = $dirIdentity->bio;
         $proId = $dirIdentity->id;
         $proEmail = $dirIdentity->email;
    }

    
    


?>



<section class="blogBox">
    <div class="blogLeft">
        <div class="blogProImage">
            <img src="<?php echo $proImage ?>" alt="image of <?php echo $proName ?>" />
        </div>
        <div class="proName "><?php echo $proName ?></div>
        <div class="proDescription">
        <?php echo $proBio ?>
        </div>
        <?php 
            //check if am logged in and an admin
            if($rank == 'admin' && $email == $proEmail):
        ?>
        <div class="proEditLink">
            <a href="profile_edit?id=<?php echo $proId ?>">Edit Profile</a>
        </div>
        <?php 
            endif;
        ?>
        
            <div class="firstBearer">
                <ul>
                <?php 
                
                    //check if am logged in and an admin
                    if(($rank == 'admin' || $rank == 'director') && $email == $proEmail):
                ?>
                    <a href="index?poster_id=<?php echo $proId ?>"><li><strong>My Posts</strong></li></a>
                    <?php 
                        endif;
                    ?>
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

            <?php 
                //check if am logged in and an admin
                if(($rank == 'admin' || $rank == 'director') && $email == $proEmail):
            ?>

            <a href="post"> <div class="ui button" id="newBut"> New Post  </div></a>
            <?php
                endif;
            ?>
    </div>

    <!--right blog page -->

    <div class="blogRight">
        <div class="ui three doubling stackable  cards">
        <?php 
            foreach ($posts as $post):
        ?>
            <a href="detail?id=<?php echo $post['id'] ?>"  class="ui card">
                <div class="ui image">
                    <img src="<?php echo $post['image'] ?>" />
                </div>
                <div class="content">
                    <div class="header" id="boxtitle">
                       <?php echo $post['title'] ?>
                    </div>
                    <div class="meta" id="boxmeta">
                        By <?php echo $post['poster'] ?> | <?php echo $post['day'] .' '. $post['month'] .' '. $post['year']?>
                    </div>
                    <div class="description">
                        <div class="blogContent">
                            <?php echo substr($post['content'], 0, 100) ?>
                        </div>
                    </div>
                </div>
                
                    <div class="readMore">Read More</div>
                
            </a>
        <?php
            endforeach;
        ?>
            
        </div>
    </div>

    <div style="clear:both"></div>
</section>

