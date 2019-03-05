<?php 
	session_start();
	require("ConfigFiles/config.inc.php"); 
	require("Database.class.php");  
	$db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE); 
	$db->connect(); 
    if(!isset($_SESSION["fid"]))
    {
        echo "<script>location.href='login.php'</script>";
    }
?>