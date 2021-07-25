<?php
    $choice= $_POST['choice'];
    $damount= $_POST['damount'];


    if(!empty($choice) || !empty($damount))
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
            // $query1= mysqli_query($conn,"SELECT donations FROM artists WHERE artist_id='$choice'");
            // $sql1="UPDATE artists SET donations=donations+'$damount' WHERE artist_id='$choice'";
            // mysqli_query($conn,$sql1);
            $query2="CALL donate($choice,$damount);";
            mysqli_query($conn,$query2);

            echo "<script>alert('Thank you for donating!'); window.location.href='homepage1.html';</script>";
            die();
        }
    }
    else
    {
        echo "<script>alert('Please enter a valid amount'); window.location.href='donate.html';</script>";
        die();
    }
?>
