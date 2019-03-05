<?php 
	include("../DatabaseFiles/cn.php");
	if(isset($_REQUEST["dele"])) {
		$table="faculty_tbl";
		$pk="fid";
		$nm="faculty";

		$db->delete($table,$pk,$_REQUEST["dele"]);
		$db->delete("faculty_sem_tbl",$pk,$_REQUEST["dele"]);
		$db->delete("login_tbl",$pk,$_REQUEST["dele"]);

		echo "deleted";
	}
?>