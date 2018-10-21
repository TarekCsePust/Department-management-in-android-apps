<?php

	$host="localhost";
	$db = "androidpb92";
	$pass="";
	$user = "root";
	$con = mysqli_connect($host,$user,$pass,$db);
	if(!$con)
	{
		echo "Database not connected";
	}

    $user_name = $_POST["name"];
    $user_email = $_POST["email"];
	$query= "insert into user values('".$user_name."','".$user_email."');";
	if(mysqli_query($con,$query))
	{
		echo "Insertion success";
	}
	else
	{
		echo "Insertion is not success";
	}

   mysqli_close($con);

?>