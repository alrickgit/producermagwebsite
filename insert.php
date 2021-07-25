<?php
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];

    if(!empty($username) || !empty($password) || !empty($fname) || !empty($email) || !empty($lname))
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
            $query= mysqli_query($conn,"SELECT email,username FROM accounts WHERE email ='$email' or username='$username'");

            if(mysqli_num_rows($query)>0){
                echo "<script> alert('Email or Username Already Registered'); window.location.href='registrationform.html';</script>";
                
            }

            else{
                $sql="INSERT Into accounts (id,fname,lname,email,username,password) values('','$fname','$lname', '$email', '$username', '$password')";

                if(mysqli_query($conn,$sql))
                {
                    echo "Data Inserted Successfully";
                    header('location:loginform.html');
                    
                }
                else{
                    echo "<script> alert('Please try again'); window.location.href='registrationform.html';</script>";
                    
                }
            }
        }

    }

    else
    {
        echo "All fields are required";
        die();
    }

?>