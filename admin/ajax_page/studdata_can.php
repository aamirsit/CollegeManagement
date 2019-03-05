<?php 
	include("../DatabaseFiles/cn.php");
	if(isset($_REQUEST["dele"])) {
		$table="student_tbl";
		$pk="studid";
        $col=array('approve');
        $val=array('N');
		$db->update($table,$pk,$_REQUEST["dele"],$col,$val);
		echo "Canceled";
	}
?>