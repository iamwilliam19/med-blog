<?php

    //include database
    require "../lib/database.php";
    class administratorsApi extends Database{
        private  $stmt;
        //declare constructor
         public function __construct(){
            //echo "processor on";
            //start session
            //session_start();
         }

         public function getAdminList($email){
             $this->stmt = $this->connect()->prepare("SELECT * FROM users WHERE NOT email = ? order By id  DESC ");
             try{
                 $this->stmt->execute([$email]);
                 $list = $this->stmt->fetchAll();
                 return $list;
             }catch(PDOException $e){
                 return $e->getMessage();
             }
         }

         public function block($email,$activity){
            $this->stmt = $this->connect()->prepare(" UPDATE users SET activity = '$activity' WHERE email = '$email' ");
            try{
                $this->stmt->execute();
                return "Unblock";
            }catch(PDOException $e){
                return $e->getMessage();
            }
         }

         public function unblock($email,$activity){
            $this->stmt = $this->connect()->prepare(" UPDATE users SET activity = '$activity' WHERE email = '$email' ");
            try{
                $this->stmt->execute();
                return "Block";
            }catch(PDOException $e){
                return $e->getMessage();
            }
         }

         public function getMessages(){
            $this->stmt = $this->connect()->prepare(" SELECT * FROM messages order by id DESC ");
            try{
                $this->stmt->execute();
                return $this->stmt->fetchAll();
            }catch(PDOException $e){
                return $e->getMessage();
            }
         }



         public function fetchMessage($id){
            $this->stmt = $this->connect()->prepare(" SELECT * FROM messages WHERE id = ? ");
            try{
                $this->stmt->execute([$id]);
                return $this->stmt->fetchObject();
            }catch(PDOException $e){
                return $e->getMessage();
            }
         }

         public function updateStatus($id){
            $this->stmt = $this->connect()->prepare(" UPDATE messages SET status = '1' WHERE id = '$id' " );
            try{
                $this->stmt->execute();
                
            }catch(PDOException $e){
                return $e->getMessage();
            }
         }

         public function getAllPosts(){
            $this->stmt = $this->connect()->prepare(" SELECT * FROM posts order by id DESC");
            try{
                $this->stmt->execute();
                return $this->stmt->fetchAll();
            }catch(PDOException $e){
                return $e->getMessage();
            }
         }

         public function deletePost($id){
            $this->stmt = $this->connect()->prepare(" DELETE FROM posts WHERE id = ? " );
            try{
                $this->stmt->execute([$id]);
                return "Proceed";
                
            }catch(PDOException $e){
                return $e->getMessage();
            }
         }
        
    }
    
?>