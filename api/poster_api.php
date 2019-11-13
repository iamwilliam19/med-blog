<?php

    //include database
    
    class posterProcessor extends Database
    {
        private $stmt;
        private $stmt1;
        private $stmt2;
        private $user_stmt;
        private $token;
        private $name;

        //declare constructor
        public function __construct()
        {
                //echo "processor on";
            if (isset($_SESSION['token'])) {
                $this->token = $_SESSION['token'];
                $this->stmt = $this->connect()->prepare("SELECT * FROM users WHERE uname = ?  ");
                $this->stmt->execute([$this->token]);
                $detail = $this->stmt->fetchObject();
                $this->name = $detail->fname.' '. $detail->lname;
            } else {
                $this->token = '';
                }
        }

        public function fetchPoster($email){
            $this->stmt = $this->connect()->prepare("SELECT * FROM users WHERE email = ?");

            try{
                $this->stmt->execute([$email]);
                return $this->stmt->fetchObject();
            }catch(PDOException $e){
                return $e->getMEssage();
            }
        }

        public function fetchDirector(){
            $this->stmt = $this->connect()->prepare("SELECT * FROM users WHERE position = 'director' ");

            try{
                $this->stmt->execute();
                return $this->stmt->fetchObject();
            }catch(PDOException $e){
                return $e->getMessage();
            }
        }

        public function fetchMe($email){
            $this->stmt = $this->connect()->prepare("SELECT * FROM users WHERE email = ?");

            try{
                $this->stmt->execute([$email]);
                return $this->stmt->fetchObject();
            }catch(PDOException $e){
                return $e->getMEssage();
            }
        }

        
    }