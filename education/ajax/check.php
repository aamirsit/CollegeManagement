<?php include("DatabaseFiles/cn.php");

	if(isset($_POST['enrollment'])) {

		$name=$_POST['enrollment'];

		$checkdata=" SELECT * FROM student_tbl WHERE enrollid='$name' AND username IS NULL;";

		$query=mysql_query($checkdata);

		if(mysql_num_rows($query)>0) {
  			echo "1";
 		}
 		else
		{
  			echo "0";
 		}
}


?>