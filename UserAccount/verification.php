<?php

	session_start();
	
	echo "<!DOCTYPE html>";
    echo "<HTML><BODY><table>";
	require_once "/home/capstone/Auto/data_files/database.php";
	
		$uid = $_REQUEST['userid'];
		$_uid = dbescape($uid);
		
		$verify = $_REQUEST['validate'];
		//echo "$verify";
		//echo  ",,,,,";
		//$_SESSION["uid"]=$_uid;
		//echo $_SESSION["uid"];
		
		
		$query1="SELECT * FROM Users WHERE U_ID='$_uid'";
		$query2=dbquery($query1);
		$query3= $query2->fetch_object();
		$result1=$query3->U_ID;
		
		if ($result1!=$uid)die("User Error");
		
		$check1 = "SELECT * FROM Users WHERE U_ID='$_uid'";
		$check2= dbquery($check1);
		$check3= $check2->fetch_object();
		$check4 = $check3-> Verified;
		//echo "$g";
		//echo ",,,,,";
		if($check4!=$verify)die("Varification Error");
		
		
		$update1="UPDATE Users SET Verified = '1'  WHERE U_ID='$_uid'";
		$update2=dbquery($update1);
		header("Location:verifyshow.php");     
		
	echo "</form>";
?>