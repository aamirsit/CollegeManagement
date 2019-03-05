<?php include("DatabaseFiles/cn.php");

	if(isset($_POST['enroll'])) {

	$enroll=$_POST["enroll"];

	$q=mysql_fetch_object(mysql_query("select * from student_tbl where enrollid='".$enroll."'"));

	echo $q->rollno.":".$q->fname.":".$q->lname.":".$q->gender.":".$q->dob.":".$q->admissionyear.":".$q->enrollid.":".$q->photo.":".$q->studid;
}else{
	echo "Record not found";
}

?>