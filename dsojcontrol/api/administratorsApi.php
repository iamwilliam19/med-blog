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
        
    }
    
?>