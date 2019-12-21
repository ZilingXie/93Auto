<?php
	session_start();
	
	echo "<!DOCTYPE html>";
    echo "<HTML><BODY><table>";
	require_once"/home/capstone/Auto/data_files/database.php";
	
	$lname = $_POST["lname"];
	$_lname = dbescape($lname);
	
	$fname = $_POST["fname"];
	$_fname = dbescape($fname);
	
	$email = $_POST["email"];
	$_email = dbescape($email);
	
	// $_lname = "Ziling";
	// $_fname = "Xie";
	// $_email = "xieziling88@gmail.com";
	
	$query1="SELECT * FROM Users WHERE fname='$_fname'";
	$check1=dbquery($query1);
	if ($check1->num_rows==0)die("fname Not Found");
	
	$query2="SELECT * FROM Users WHERE lname='$_lname'";
	$check2=dbquery($query2);
	if ($check2->num_rows==0)die("lname Not Found");
		
	$query3="SELECT * FROM Users WHERE Email='$_email'";
	$check3=dbquery($query3);
	if ($check3->num_rows==0)die("Email Not Found");

	mail1($_email,$_lname,$fname);
	
	 function mail1($email,$_lname,$_fname)
	  {
		  
		  $_SESSION["email"]=$_email;
		  $theurl = "http://weblab.salemstate.edu/~Auto/93Web/UserAccount/resetpwd.html?email=$_email";
		  mail("$email", "Verification Link", $theurl);
		  
		   echo "Please check email $email for rest password";
	  }
		  