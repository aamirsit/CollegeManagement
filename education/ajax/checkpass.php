<?php 
	include("DatabaseFiles/cn.php");

	if(isset($_REQUEST["pass"])){
		$pass = $_REQUEST["pass"];
		$stud = $_SESSION["studid"];

		$checkdata=" SELECT * FROM student_tbl WHERE password='$pass'AND studid=".$stud;

		$query=mysql_query($checkdata);

		if(mysql_num_rows($query)>0) {
  			echo "1";
 		}
 		else
		{
  			echo "0";
 		}
	}else{
		echo "thinga";
	}

?>