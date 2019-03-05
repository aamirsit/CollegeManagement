<?php
	include("DatabaseFiles/cn.php");
	session_destroy();
	echo "<script>location.href='../login.php'</script>";
?>