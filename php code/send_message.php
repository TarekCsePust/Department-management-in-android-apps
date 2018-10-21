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

	$msg = $_POST["message"];
	$title = $_POST["title"];
	$session = $_POST["session"];
	$sent_by = $_POST["from"];

    
    $query1 = "insert into message(title,text,sent_by,sent_to)values('".$title."','".$msg."','".$sent_by."','".$session."');";
     mysqli_query($con,$query1);

	$path_fcm = 'https://fcm.googleapis.com/fcm/send';

	$server_key = "AAAAs6Uzip0:APA91bEhlTrQsrDVcexad5Wvdtjk1a4t2h5MvwJrCt0TJHBSKHxfpIW6_nNNFd1tdhittJ7Gvl9QWeInoHtwbt0DA33Hw4oR5A9Z5sFGQBxj_jUze3XFMgbHbFYHKt3ji279AETvYDyv";
	
	$sql = "select token from login where session='".$session."';";
	$result = mysqli_query($con,$sql);
	

/*$query= "select * from contact;"; 
	$result = mysqli_query($con,$query);
	$response = array();
    while ($row = mysqli_fetch_array($result))
    {
    	array_push($response,array("Name"=>$row["name"],"ID"=>$row["id"]));
    	
    }*/
















	
	
		while ($row = mysqli_fetch_array($result)) {
			
			$key = $row["token"];


			$headers = array(
			'Authorization:key = ' .$server_key,
			'Content-Type:application/json' 
			);

			$fields = array("to"=>$key,"notification"=>array('title'=>$title,'body'=>$msg));

			$pay_load = json_encode($fields);

			$curl_session = curl_init();

			curl_setopt($curl_session,CURLOPT_URL,$path_fcm);
			curl_setopt($curl_session,CURLOPT_POST,true);
			curl_setopt($curl_session,CURLOPT_HTTPHEADER,$headers);
			curl_setopt($curl_session,CURLOPT_RETURNTRANSFER,true);
			curl_setopt($curl_session,CURLOPT_SSL_VERIFYPEER,false);
			curl_setopt($curl_session,CURLOPT_IPRESOLVE,CURL_IPRESOLVE_V4);
	
			curl_setopt($curl_session,CURLOPT_POSTFIELDS,$pay_load);

			$res =  curl_exec($curl_session);
			curl_close($curl_session);


	}

	
    mysqli_close($con);
	

	//echo json_encode($tokens);
	//echo "\n\n";
	//echo json_encode($key);

/*	$headers = array(
		'Authorization:key = ' .$server_key,
		'Content-Type:application/json' 
	);

	$fields = array("to"=>$key,"notification"=>array('title'=>$title,'body'=>$msg));

	$pay_load = json_encode($fields);

	$curl_session = curl_init();

	curl_setopt($curl_session,CURLOPT_URL,$path_fcm);
	curl_setopt($curl_session,CURLOPT_POST,true);
	curl_setopt($curl_session,CURLOPT_HTTPHEADER,$headers);
	curl_setopt($curl_session,CURLOPT_RETURNTRANSFER,true);
	curl_setopt($curl_session,CURLOPT_SSL_VERIFYPEER,false);
	curl_setopt($curl_session,CURLOPT_IPRESOLVE,CURL_IPRESOLVE_V4);
	
	curl_setopt($curl_session,CURLOPT_POSTFIELDS,$pay_load);

	$result =  curl_exec($curl_session);*/
	//curl_close($curl_session);
	//mysqli_close($con);

?>