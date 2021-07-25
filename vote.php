<?php
    $fchoice= $_POST['fchoice'];
    $schoice = $_POST['schoice'];
    $tchoice = $_POST['tchoice'];

    if(!empty($fchoice) || !empty($schoice) || !empty($tchoice))
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
            $query1= mysqli_query($conn,"SELECT vote_no FROM artists WHERE artist_id='$fchoice'");
            $sql1="UPDATE artists SET vote_no=vote_no+1 WHERE artist_id='$fchoice'";
            mysqli_query($conn,$sql1);

            $query2= mysqli_query($conn,"SELECT vote_no FROM artists WHERE artist_id='$schoice'");
            $sql2="UPDATE artists SET vote_no=vote_no+1 WHERE artist_id='$schoice'";
            mysqli_query($conn,$sql2);

            $query3= mysqli_query($conn,"SELECT vote_no FROM artists WHERE artist_id='$tchoice'");
            $sql3="UPDATE artists SET vote_no=vote_no+1 WHERE artist_id='$tchoice'";
            mysqli_query($conn,$sql3);

            header('location:thankyou.html');
            die();
        }
    }
    else
    {
        die();
    }
?>
