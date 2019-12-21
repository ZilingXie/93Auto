<?php
	session_start();
    require_once "/home/capstone/Auto/data_files/database.php";

    $email = $_POST["email"];
    $_email = dbescape($email);
    $pwd = $_POST["pwd"];
    $_pwd = dbescape($pwd);

    $query1="SELECT * FROM Admin WHERE Email='$_email'";
	$result1=dbquery($query1);
	if ($result1->num_rows==0)die("Email Not Found");
    
    $query2="SELECT * FROM Admin WHERE Email='$_email'";
	$check2=dbquery($query2);
	$fetch2= $check2->fetch_object();
	$result2=$fetch2->Password;

	if($result2!=$_pwd)die("Wrong Password");
    
    $_SESSION['aemail'] = $_email;
    $_SESSION['asuccess'] = 'You are logged in.</br>';

    header("Location:Admin.php");  
?>
