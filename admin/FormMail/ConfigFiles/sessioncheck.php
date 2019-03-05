<?php
session_start();
if($_SESSION['user']== "" || $_SESSION['user']== null)
{
	header("location:index.php");
} 
?>