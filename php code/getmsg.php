<?php

	$host="localhost";
	$db = "cse_of_pust";
	$pass="";
	$user = "root";
	//$day = $_POST["day"];
	//$day = "saturday";
	//$session = $_POST["session"];
	$session = "2013-2014";
	$con = mysqli_connect($host,$user,$pass,$db);
	if(!$con)
	{
		echo "Database not connected";
	}

	$query= "select * from message where sent_to='".$session."';";
	$result = mysqli_query($con,$query);
	$response = array();
    while ($row = mysqli_fetch_array($result))
    {
    	array(array_push($response,array("Title"=>$row["title"],"Text"=>$row["text"],"From"=>$row["sent_by"])));
    	
    }

    $msg = array("message"=>$response);
    echo json_encode($msg);
  


?>