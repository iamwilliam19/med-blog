<?php

    //include database
    require "../lib/database.php";
    class apiProcessor extends Database{
        private $stmt;
        private $poster_id;
        private $rank;
        private $user_stmt;
        private $email;
        private $name;
        private $month;
        private $day;
        private $year;

        

        //declare constructor
        public function __construct(){
           //echo "processor on";
           session_start();

           //set time
           date_default_timezone_set('Africa/Lagos');
            $this->month = date('m');
            $this->year = date('y');
            $this->day = date("d");
           
           if(isset($_SESSION['email'])){
                $this->email = $_SESSION['email'];
                $this->stmt = $this->connect()->prepare("SELECT * FROM users WHERE email = ?  ");
                $this->stmt->execute([$this->email]);
                $detail = $this->stmt->fetchObject();
                $this->name = $detail->fname.' '. $detail->lname;
                $this->rank = $detail->poster_rank;
                $this->poster_id = $detail->id;

            }else{
                $this->email = '';
            }
        }

        public function uploadPost($title,$cat,$post){
            $this->stmt = $this->connect()->prepare("INSERT INTO posts 
            (title, content, category, poster,poster_email,poster_rank,poster_id,day,month,year)
            VALUES
            ('$title', '$post', '$cat', '$this->name','$this->email','$this->rank','$this->poster_id','$this->day','$this->month','$this->year')
            ");
            try{
                $this->stmt->execute();
            }catch(PDOException $e){
                //return error message
                return $e->getMessage();
            }
        }
        



    }
?>