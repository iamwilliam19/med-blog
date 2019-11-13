<?php

    //include database
    require "lib/database.php";
    class apiProcessor extends Database{
        private $stmt;
        private $stmt1;
        private $stmt2;
        private $user_stmt;
        private $token;
        private $name;

        //declare constructor
        public function __construct(){
           //echo "processor on";
           if(isset($_SESSION['token'])){
                $this->token = $_SESSION['token'];
                $this->stmt = $this->connect()->prepare("SELECT * FROM users WHERE uname = ?  ");
                $this->stmt->execute([$this->token]);
                $detail = $this->stmt->fetchObject();
                $this->name = $detail->fname.' '. $detail->lname;
            }else{
                $this->token = '';
            }
        }

        //declare post fetcher
        public function postFetcher() {
            $this->stmt = $this->connect()->prepare("SELECT * FROM posts order by id DESC ");

            try{
                //execute
                $this->stmt->execute();
                //fetch posts
                return $this->stmt->fetchAll();
            }catch(PDOException $e){
                //return error message
                return $e->getMessage();
            }
        }

        //declare poster post fetcher
        public function posterPostFetcher($id){
            $this->stmt = $this->connect()->prepare("SELECT * FROM posts WHERE poster_id = ? order by id DESC ");

            try{
                //execute
                $this->stmt->execute([$id]);
                //count rows
                $row = $this->stmt->rowCount();
                //check if there are matches
                if ($row > 0) {
                    //fetch posts
                    return $this->stmt->fetchAll();
                }else{
                    //load error page
                    header("location: ./page404");
                }
            }catch(PDOException $e){
                //return error message
                return $e->getMessage();
            }
        }

        //declare categor fetcher
        public function categoryPostFetcher($category){
            $this->stmt = $this->connect()->prepare("SELECT * FROM posts WHERE category = ? order by id DESC ");

            try{
                //execute
                $this->stmt->execute([$category]);
                //count rows
                $row = $this->stmt->rowCount();
                //check if there are matches
                if ($row > 0) {
                    //fetch posts
                    return $this->stmt->fetchAll();
                }else{
                    //load error page
                    header("location: ./page404");
                }
            }catch(PDOException $e){
                //return error message
                return $e->getMessage();
            }
        }

        //declare detail fetcher
        public function detailFetcher($id){
            $this->stmt = $this->connect()->prepare("SELECT * FROM posts WHERE  id = ?  ");

            try{
                //execute
                $this->stmt->execute([$id]);
                //fetch post
                return $this->stmt->fetchObject();
            }catch(PDOException $e){
                //return error message
                return $e->getMessage();
            }
        }



    }
?>