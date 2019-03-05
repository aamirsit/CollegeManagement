<?php include("DatabaseFiles/cn.php");
	if(isset($_POST['eid'],$_POST['pass'])) {

		$eid=$_POST['eid'];
		$pass=$_POST['pass'];

		$checkdata=" SELECT * FROM student_tbl WHERE username='$eid' AND password='$pass'";

		$query=mysql_query($checkdata);

		if(mysql_num_rows($query)>0) {

			$r1=mysql_fetch_object(mysql_query(" SELECT * FROM student_tbl WHERE username='$eid' AND password='$pass'"));
			
			if($r1->approve == "Y"){
				$y=mysql_fetch_object(mysql_query("select * from year_tbl order by yid DESC LIMIT 1"));
             	$year=$y->year;
				$_SESSION["year"] = $year;
				$s=mysql_fetch_object(mysql_query("select * from student_sem_tbl where studid=".$r1->studid." AND year='".$year."' order by sem DESC LIMIT 1"));
                $sem = $s->sem;
                $_SESSION["ssem"] = $sem; 
                $smid= $s->smid;
                $_SESSION["smid"] = $smid;
				$id=$r1->studid;
				$_SESSION["studid"] = $id;
	  			echo "1";
	  		}else{
	  			echo "2";
	  		}

 		}else{

  			echo "0";

 		}
}


?>