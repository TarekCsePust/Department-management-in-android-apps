<?php

	$host="localhost";
	$db = "cse_of_pust";
	$pass="";
	$user = "root";

	//$day = "saturday";
	//$session = $_POST["session"];
	$email = $_POST["email"];
	$password = $_POST["pass"];
	//$email = "jk";
	//$password = "dk";
	$con = mysqli_connect($host,$user,$pass,$db);
	if(!$con)
	{
		echo "Database not connected";
	}

	$query= "select * from login where email='".$email."' and password='".$password."';";
	$result = mysqli_query($con,$query);
	$response = array();
	if(mysqli_num_rows($result)>0)
	{
		$text = "";
		while ($row = mysqli_fetch_array($result))
    	{
    		array(array_push($response,array("Email"=>$row["email"],"Session"=>$row["session"])));
    	}

       $logindata = array("login"=>$response);
       echo json_encode($logindata);
	}
	else
	{
		echo "Email or password is wrong.";
	}
   
  


?>