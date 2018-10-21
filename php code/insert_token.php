<?php

	$host="localhost";
	$db = "cse_of_pust";
	$pass="";
	$user = "root";
	$con = mysqli_connect($host,$user,$pass,$db);
	if(!$con)
	{
		echo "Database not connected";
	}

   
   $user_email = $_POST["email"];
    $user_token = $_POST["token"];
   

	//$user_email = "r@gmail.com";
   // $user_token = "tarek";

    $query = "update login set token='".$user_token."' where email='".$user_email."';";
    $result = mysqli_query($con,$query);
    if($result)
    {
    	echo "Notification is on";
    }
    else
    {
    	echo "Notification is of";
    }
	
	
   mysqli_close($con);

    
	
?>


