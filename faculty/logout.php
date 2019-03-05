<?php 
    include("DatabaseFiles/cn.php");
    session_destroy();
    header("location:login.php");
?>