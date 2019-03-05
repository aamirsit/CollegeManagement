<?php include("DatabaseFiles/cn.php");
	$val = $_REQUEST["password"];

	$q=mysql_fetch_object(mysql_query("select * from login_tbl where fid=".$_SESSION["fid"]));

	if($q->password==$val){
		echo "Correct";
	}else{
		echo "Passsowrd In-correct";
	}
?>