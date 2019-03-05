<?php
	include("DatabaseFiles/cn.php");
	$roll = $_POST["roll"];
	$r=mysql_fetch_object(mysql_query("select * from student_tbl where rollno=".$roll));
	echo $r->rollno.":".$r->fname.":".$r->lname.":".$r->gender.":".$r->dob.":".$r->admissionyear.":".$r->enrollid.":".$r->photo.":".$r->studid;
?>