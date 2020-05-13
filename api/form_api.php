<?php

     //include database
     require "../lib/database.php";
     class formApi extends Database{
         private $stmt;
         private $stmt1;
         private $stmt2;
         private $user_stmt;
         private $token;
         private $name;
 
         //declare constructor
         public function __construct(){
            //echo "processor on";
            //start session
            session_start();
         }

         public function checkEmpty($fname,$lname,$email,$pwd1,$pwd2){
            //check if any is empty
            if($fname == '' || $lname == '' || $email == '' || $pwd1 == '' || $pwd2 == ''){
                return true;
            }
         }

         public function contactEmpty($name,$email,$message){
             if($name == '' || $email == '' || $message == ''){
                 return true;
             }
         }

         public function notValidEmail($email){
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                return true;
              }
         }

         public function notValidPwd($pwd1){
            if (strlen($pwd1) < 6){
                return true;
            }
         }

         public function noPwdMatch($pwd1, $pwd2){
             if($pwd1 != $pwd2){
                 return true;
             }
         }
         public function wrongPwd($email,$pwd){
             $pwd = md5($pwd);
            $this->stmt = $this->connect()->prepare("SELECT * FROM users WHERE email = ? AND pwd = ? ");
            try{
                $this->stmt->execute([$email,$pwd]);
                $rowCount = $this->stmt->rowCount();
                if($rowCount < 1){
                    return true;
                }
             }catch(PDOException $e){
                 return $e->getMessage();
             }
         }

         public function emailExist($email){
            $this->stmt = $this->connect()->prepare("SELECT * FROM users WHERE email = ? ");
            try{
                $this->stmt->execute([$email]);
                $rowCount = $this->stmt->rowCount();
                if($rowCount > 0){
                    return true;
                }else{
                    return false;
                }
             }catch(PDOException $e){
                 return $e->getMessage();
             }
         }

         //check if user has subscribed
         public function subExist($email){
            $this->stmt = $this->connect()->prepare("SELECT * FROM subscriptions WHERE email = ? ");
            try{
                $this->stmt->execute([$email]);
                $rowCount = $this->stmt->rowCount();
                if($rowCount > 0){
                    return true;
                }else{
                    return false;
                }
             }catch(PDOException $e){
                 return $e->getMessage();
             }
         }

         public function createAccount($fname,$lname,$email,$pwd1){
             //encrypt password
             $pwd = md5($pwd1);
             $this->stmt = $this->connect()->prepare("INSERT INTO users 
             (fname, lname, email,pwd,poster_rank) 
             VALUES 
             ('$fname','$lname','$email','$pwd','member')");
             try{
                $this->stmt->execute();
                //assign session email
                $_SESSION['email'] = $email;
                return "proceed";
             }catch(PDOException $e){
                 return $e->getMessage();
             }
         }

         //create subscription
         public function createSubscription($email){
              $this->stmt = $this->connect()->prepare("INSERT INTO subscriptions 
              (email) 
              VALUES 
              ('$email')");
              try{
                 $this->stmt->execute();
                 return "proceed";
              }catch(PDOException $e){
                  return $e->getMessage();
              }
         }

         //send message
         public function sendMessage($name,$email,$message){
            $this->stmt = $this->connect()->prepare("INSERT INTO messages 
            (name,email,message) 
            VALUES 
            ('$name','$email','$message')");
            try{
               $this->stmt->execute();
               return "proceed";
            }catch(PDOException $e){
                return $e->getMessage();
            }
       }
    }
?>