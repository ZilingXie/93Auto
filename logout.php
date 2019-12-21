<?php
session_start();
unset($_SESSION["email"]);
unset($_SESSION["success"]);
header("Location:index.html");
?>