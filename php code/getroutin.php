<?php

	$host="localhost";
	$db = "cse_of_pust";
	$pass="";
	$user = "root";
	$day = $_POST["day"];
	//$day = "saturday";
	$session = $_POST["session"];
	$con = mysqli_connect($host,$user,$pass,$db);
	if(!$con)
	{
		echo "Database not connected";
	}

	$query= "select * from routin where day='".$day."' and session='".$session."';";
	$result = mysqli_query($con,$query);
	$response = array();
    while ($row = mysqli_fetch_array($result))
    {
    	array(array_push($response,array("Course"=>$row["course_name"],"Teacher"=>$row["teacher_name"],"Start"=>$row["start_time"],
    		"End"=>$row["ending_time"])));
    	
    }

    $routin = array("routin"=>$response);
    echo json_encode($routin);
  


?>