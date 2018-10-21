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

    $user_name = $_POST["name"];
    $user_email = $_POST["email"];
    $user_mother_name = $_POST["mother_name"];
    $user_father_name = $_POST["father_name"];
    $user_address = $_POST["address"];
    $user_blood_group = $_POST["blood_group"];
    $user_mob_no = $_POST["mob_no"];
    $user_gMob_no = $_POST["gMob_no"];
    $user_roll = $_POST["roll_no"];
    $user_reg = $_POST["reg_no"];
    $user_pass =  md5($_POST["password"]);
    $user_session = $_POST["session"];
    $user_dob = $_POST["dob"];
  	$user = "student";

	
	$query2= "select * from student_information where email='".$user_email."';";
	$res1 = mysqli_query($con,$query2);	


	$query3= "select * from student_information where roll_no='".$user_roll."';";
	$res2 = mysqli_query($con,$query3);

	if(mysqli_num_rows($res1)>0 || mysqli_num_rows($res2)>0)
	{
		echo "Email or Roll already existing.";
	}
    else
    {
    	$query= "insert into student_information (name,father_name,mother_name,address,blood_group,roll_no,registration_no,dob,session,mob_no,email,guardian_mob_no,image) values('".$user_name."','".$user_father_name."',
	'".$user_mother_name."','".$user_address."','".$user_blood_group."','".$user_roll."','".$user_reg."','".$user_dob."','".$user_session."','".$user_mob_no."','".$user_email."','".$user_gMob_no."','img');";




	$query1 = "insert into login(email,password,session,user)values('".$user_email."','".$user_pass."','".$user_session."','".$user."');";

	if(mysqli_query($con,$query) && mysqli_query($con,$query1))
	{
		echo "Registration successful";
	}
	else
	{
		echo "Registration is not successful";
	}
		
	
   mysqli_close($con);

    }
	
?>


