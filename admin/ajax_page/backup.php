<?php
	include("DatabaseFiles/cn.php");
	$filename=$db->backup_table('*');
    echo "Database Backup Successfully";
?>