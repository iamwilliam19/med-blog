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
    

    //get the post details
    $post = $postHandler->detailFetcher($id);
    
   
    //check if user is online
    if (isset($_SESSION['email']) && $_SESSION['email'] != "") {
        $email = $_SESSION['email'];
       
         //get my rank and detail
        $myIdentity = $posterHandler->fetchMe($email);
        $myRank = $myIdentity->poster_rank;
        $myId = $myIdentity->id;
        $myName = $myIdentity->fname . ' '. $myIdentity->lname;
        $myImage = $myIdentity->image;
        $myBio = $myIdentity->bio;
    }else{
        $email = '';
        $myRank = '';
    }
    
?>

<section class="blogBox">
    <div class="blogLeft">
        <div class="blogProImage">
            <img src="<?php echo $myImage ?>" alt="<?php echo "image of ". $myName ?>" />
        </div>
        <div class="proName "><?php echo $myName ?> </div>
        <div class="proDescription">
            <?php echo  substr($myBio, 0, 100);
             if(strlen($myBio) > 100) {echo  "...";}
            ?>
        </div>
        <div class="proEditLink">
            <a href="detail">Edit Profile</a>
        </div>
        
            <div class="firstBearer">
                <ul>
                    
                    <a href="detail"><li><strong>My Posts</strong></li></a>
                    <a href="detail"><li><strong>Recent Posts</strong></li></a>
                    <li class="except "><strong>Post Fields</strong><i class="ui dropdown icon pushRight"></i></li>
                    
                </ul>
            </div>

            
    

            <div class="secondBearer">
                <ul>
                   <a href="detail"> <li><strong>All</strong></li></a>
                   <a href="detail"><li><strong>Anatomy</strong></li></a>
                   <a href="detail"><li><strong>Pharmacology</strong></li></a>
                   <a href="detail"><li><strong>Physiology</strong></li></a>
                   <a href="detail"><li><strong>Medical Biochemistry</strong></li></a>
                </ul>
            </div>

            <?php 
                //check if am logged in and an admin
                if($myRank == 'admin' || $myRank == 'director'):
            ?>
            <a href="post?id=<?php echo $myId ?>"> <div class="ui button" id="newBut"> New Post  </div></a>
            <?php endif; ?>

            
        
    </div>

    <!--right blog page -->

    <div class="blogRight">
        <div class="ui medium header">Write a post</div>
        <div class="ui hidden error  message" id="errorMessage"></div> 
        <div class="ui hidden success  message" id="successMessage"></div> 
        <form class="ui form" id="myForm">

        
            <div class="field">
                <label for ="title" ><h3>Title</h3></label>
                <div class="input">
                    <input type="text" value="<?php echo $post->title ?>" placeholder=" write a title" id="title"/>
                </div>
            </div>

            <div class="field">
                <label for ="category" ><h3>Category</h3></label>
                <select class="ui dropdown" id="category">
                    <option value="select">Select</option>
                    <option value="anatomy">Anatomy</option>
                    <option value="pharmacology">Pharmcology</option>
                    <option value="physiology">Physiology</option>
                    <option value="mbc">Medical Biochemistry</option>
                </select>
            </div>

            <input type="hidden" id="hiddenInput" />
            <div class="field">
                <label for ="text" ><h3>Text</h3> </label>
                <textarea id="summernote"></textarea>
            </div>

            <button type="submit" class="ui right floated button" id="changeButton" onclick="savePost(event)">
                Post 
            </button>

            <script>
           
$('#summernote').summernote('code','<?php echo $post->content ?>',{
        placeholder: 'Write Your Post',
        tabsize: 2,
        height: 300,
        callbacks: {
        onImageUpload : function(files, editor, welEditable) {
 
             for(var i = files.length - 1; i >= 0; i--) {
                    sendFile(files[i], this)
            }
        }
        },

        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'forecolor','backcolor','italic','superscript','subscript','clear']],
          
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture', 'video','hr']],
          ['misc', [ 'fullscreen','undo', 'redo','help']],
          
        ],
        
        popover: {
            image: [
            ['image', ['resizeFull', 'resizeHalf', 'resizeQuarter', 'resizeNone']],
            ['float', ['floatLeft', 'floatRight', 'floatNone']],
            ['remove', ['removeMedia']]
            ],
            link: [
                ['link', ['linkDialogShow', 'unlink']]
            ],
           
        }
      });       

           

      //upload image
            const sendFile = (file, el)=> {
        var form_data = new FormData();
        form_data.append('file', file);
        $.ajax({
            data: form_data,
            type: "POST",
            url: 'models/editor-upload.php',
            cache: false,
            contentType: false,
            processData: false,
            success: function(url) {
                
                let myUrl = url.substr(1);
                $(el).summernote('editor.insertImage', myUrl);
                
            }
        });
        }

                
                const savePost = (e) =>{
                    e.preventDefault();
                    let btn = e.target;
                    let error = document.getElementById('errorMessage');
                    let successNote = document.getElementById('successMessage');
                    let title = document.getElementById('title');
                    let cat = document.getElementById('category');
                    let content = document.getElementById('summernote');
                    
                    
                   
                    
                   //add hidden to error box
                   if(!error.classList.contains("ui")){
                        error.classList.add('ui');
                    }else if(!error.classList.contains("hidden")){
                        error.classList.add('hidden');
                    }else if(!error.classList.contains("error")){
                        error.classList.add('error');
                    }else if(!error.classList.contains("message")){
                        error.classList.add('message');
                    }

                    //add hidden to error box
                   if(!successNote.classList.contains("ui")){
                        successNote.classList.add('ui');
                    }else if(!successNote.classList.contains("hidden")){
                        successNote.classList.add('hidden');
                    }else if(!successNote.classList.contains("success")){
                        successNote.successNote.add('success');
                    }else if(!successNote.classList.contains("message")){
                        successNote.classList.add('message');
                    }
                    
                    
                    //validate title
                   if(title.value.length == 0){
                        error.classList.remove('hidden');
                        error.textContent = "Please enter a title";
                   }else if(cat.value == "select"){
                        error.classList.remove('hidden');
                        error.textContent = "Please select a category";
                   }else if(content.value.length  < 1){
                        error.classList.remove('hidden');
                        error.textContent = "Please write a post";
                   }else {
                       //add sending
                        
                        btn.classList.remove('button');
                        btn.classList.add('loading');
                        btn.classList.add('button');
                       //submit post
                       let xhttp;
                        if(window.XMLHttpRequest){
                        xhttp = new XMLHttpRequest();
                        }else{
                        xhttp = new ActiveXObject("Microsoft.XMLHTTP");
                        }
                        xhttp.onreadystatechange = function() {
                        let data;
                        if(this.readyState == 4 && this.status == 200){
                            //continue
                            data = this.responseText;
                            if(data.length > 1){
                            error.classList.remove('hidden');
                            error.textContent = data;
                            //remove loading icon
                            btn.classList.remove('loading');

                            }else{
                            //ensure error message box is hidden
                            if(!error.classList.contains("ui")){
                                error.classList.add('ui');
                            }else if(!error.classList.contains("hidden")){
                                error.classList.add('hidden');
                            }else if(!error.classList.contains("error")){
                                error.classList.add('error');
                            }else if(!error.classList.contains("message")){
                                error.classList.add('message');
                            }

                            //remove loading icon
                           
                            btn.classList.remove('loading');

                            //show loading success
                            successNote.classList.remove('hidden');
                            successNote.textContent = "Post uploaded successfully";
                           
                            //reset form 
                            document.getElementById('myForm').reset();
                            $('#summernote').summernote('code', '');
                            
                            }
                        }else if(this.readyState == 4 && this.status != 200){
                            //reject
                            error.classList.remove('hidden');
                            error.textContent = "opps an error occured, please check your network connection and try again !!";
                        }
                        };
                        xhttp.open("POST", "models/post_model.php", true);
                        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                        xhttp.send("title="+title.value.trim()+"&category="+cat.value+"&post="+content.value);
                   }
                }
            </script>

           
        </form>
    </div>
    </div>

    <div style="clear:both"></div>
</section>

            <?php } ?>