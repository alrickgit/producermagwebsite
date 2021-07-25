<?php
 $username = $_POST['username'];
 $password = $_POST['password'];
 $email = $_POST['email'];

 if(!empty($username) || !empty($password) || !empty($email))
 {
     $host = "localhost";
     $dbUsername = "root";
     $dbPassword = "";
     $dbname = "webdesign";
 
     //create connection
 
     $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

     if (mysqli_connect_error())
     {
         die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
     }
     else{
            // $username =mysqli_real_escape_string($conn,$_POST['username']);
            // $password =mysqli_real_escape_string($conn,$_POST['password']);
            
            // $password= md5($password);
            $query= "SELECT * FROM accounts WHERE username = '$username' and password='$password'";
            $results=mysqli_query($conn,$query);

            if(mysqli_num_rows($results)){
                 
                $_SESSION['username']=$username;
                header('location:votingpage.html');

            }
            else{
                echo "<script>alert('Wrong credentials Please try again!'); window.location.href='loginform.html';</script>";
                die();
            }

         }

 }

 else
 {
     echo "All fields are required";
     die();
 }
?>