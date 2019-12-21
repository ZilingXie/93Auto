<?php
session_start();
unset($_SESSION["aemail"]);
unset($_SESSION["asuccess"]);
header("Location:AdminLogin.html");
?>