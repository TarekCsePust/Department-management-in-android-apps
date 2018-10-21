<?php

	$host="localhost";
	$db = "cse_of_pust";
	$pass="";
	$user = "root";
	$roll = $_POST["roll"];
	//$roll ="140112";
	$sem_no = $_POST["semester_no"];
	//$sem_no ="5";
	$con = mysqli_connect($host,$user,$pass,$db);
	if(!$con)
	{
		echo "Database not connected";
	}

	$query= "select * from result where roll='".$roll."' and semester_no='".$sem_no."';";
	$result = mysqli_query($con,$query);
	$response = array();
    while ($row = mysqli_fetch_array($result))
    {
    	array(array_push($response,array("Course"=>$row["course_code"],"Grade"=>$row["grade"])));
    	
    }

    $query1= "select * from total_result where roll='".$roll."' and semester_no='".$sem_no."';";
    $result1 = mysqli_query($con,$query1);
    $text = "";
     while ($row = mysqli_fetch_array($result1))
    {
    	$text = $row["cgpa"];
    	
    }
    $routin = array("result"=>$response,"cgpa"=>$text);
    echo json_encode($routin);
  



?>