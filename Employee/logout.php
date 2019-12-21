<?php
session_start();
unset($_SESSION["eemail"]);
unset($_SESSION["esuccess"]);
header("Location:EmpLogin.html");
?>